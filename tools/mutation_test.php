<?php
/**
 * Alumni Connect — Dynamic Data & Database Mutation Test Suite
 * 
 * 1. Scans resources/views/ for hardcoded placeholders, static metric numbers,
 *    and dummy data strings.
 * 2. Executes database mutation tests against active routes to prove that
 *    views render real live data from SQLite and react dynamically to changes.
 */

$projectDir = realpath(__DIR__ . '/..');
$devDbPath = $projectDir . '/database/database.sqlite';
$testDbPath = $projectDir . '/database/test.sqlite';
copy($devDbPath, $testDbPath);
putenv("DB_PATH=$testDbPath");
$_ENV['DB_PATH'] = $testDbPath;

register_shutdown_function(function() use ($testDbPath) {
    if (file_exists($testDbPath)) {
        @unlink($testDbPath);
    }
});

require_once $projectDir . '/app/Core/Env.php';
require_once $projectDir . '/app/Core/Database.php';

App\Core\Env::load($projectDir . '/.env');
$pdo = App\Core\Database::getConnection();

$baseUrl = "http://127.0.0.1:8000";

// Ensure clean rate limits state for automated testing
@unlink($projectDir . '/storage/rate_limits.json');
$pdo->exec("DELETE FROM login_attempts");

echo "========================================================\n";
echo "   DYNAMIC DATA AUDIT & DB MUTATION TEST HARNESS        \n";
echo "========================================================\n\n";

// --------------------------------------------------------------------------
// PART 1: STATIC VIEW TEMPLATE HARDCODED CONTENT SCAN
// --------------------------------------------------------------------------
echo "--- 1. Scanning resources/views/ for Potential Hardcoded Content ---\n";

$viewsDir = $projectDir . '/resources/views';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewsDir));
$phpFiles = [];

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $phpFiles[] = $file->getPathname();
    }
}

$patterns = [
    'Placeholder Names' => '/\b(John\s+Doe|Jane\s+Doe|Lorem\s+ipsum|Acme\s+Corp|TechCorp)\b/i',
    'Hardcoded Metric Numbers' => '/<(?:span|div|h[1-6]|p)[^>]*class=["\'][^"\']*(?:stat|count|metric|number|amount)[^"\']*["\'][^>]*>\s*(?:[₹$€£]\s*)?[0-9,]+(?:\.[0-9]{2})?\s*<\//i',
];

$findings = [];
foreach ($phpFiles as $filePath) {
    $relPath = str_replace($projectDir . DIRECTORY_SEPARATOR, '', $filePath);
    $relPath = str_replace('\\', '/', $relPath);
    $lines = file($filePath);
    
    foreach ($lines as $lineNum => $line) {
        foreach ($patterns as $label => $regex) {
            if (preg_match($regex, $line, $matches)) {
                $findings[] = [
                    'file' => $relPath,
                    'line' => $lineNum + 1,
                    'type' => $label,
                    'match' => trim($matches[0]),
                    'snippet' => trim($line)
                ];
            }
        }
    }
}

echo "Total view files scanned: " . count($phpFiles) . "\n";
echo "Hardcoded patterns detected: " . count($findings) . "\n\n";

if (!empty($findings)) {
    echo sprintf("%-45s | %-5s | %-20s | %s\n", "File", "Line", "Pattern Type", "Snippet");
    echo str_repeat("-", 100) . "\n";
    foreach ($findings as $f) {
        $shortSnippet = mb_substr($f['snippet'], 0, 40);
        echo sprintf("%-45s | %-5d | %-20s | %s\n", $f['file'], $f['line'], $f['type'], $shortSnippet);
    }
    echo "\n";
} else {
    echo "  [OK] No suspicious placeholder or hardcoded metric patterns found.\n\n";
}

// --------------------------------------------------------------------------
// PART 2: DATABASE MUTATION TESTS
// --------------------------------------------------------------------------
echo "--- 2. Executing Real-Time Database Mutation Tests ---\n";

function mut_http($url, $method = 'GET', $data = [], $cookies = []) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Test-DB: database/test.sqlite']);

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }

    if (!empty($cookies)) {
        $cList = [];
        foreach ($cookies as $k => $v) $cList[] = "$k=$v";
        curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cList));
    }

    $raw = curl_exec($ch);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $header = substr($raw, 0, $headerSize);
    $body = substr($raw, $headerSize);

    $newCookies = [];
    if (preg_match_all('/^Set-Cookie:\s*([^;]+)/mi', $header, $matches)) {
        foreach ($matches[1] as $cStr) {
            parse_str($cStr, $parsed);
            foreach ($parsed as $k => $v) $newCookies[$k] = $v;
        }
    }

    $location = null;
    if (preg_match('/^Location:\s*(.+)$/mi', $header, $locMatches)) {
        $location = trim($locMatches[1]);
    }

    curl_close($ch);
    return [
        'code' => $code,
        'header' => $header,
        'body' => $body,
        'cookies' => array_merge($cookies, $newCookies),
        'location' => $location
    ];
}

function mut_login($baseUrl, $email, $password) {
    $res = mut_http("$baseUrl/login");
    $csrf = $res['cookies']['csrf_token'] ?? '';
    
    $loginRes = mut_http("$baseUrl/login", 'POST', [
        'email' => $email,
        'password' => $password,
        'csrf_token' => $csrf
    ], ['csrf_token' => $csrf]);

    return $loginRes['cookies'];
}

$studentCookies = mut_login($baseUrl, 'student@alumni.test', 'Password123!');
$adminCookies = mut_login($baseUrl, 'admin@alumni.test', 'Password123!');
$superCookies = mut_login($baseUrl, 'superadmin@alumni.test', 'Password123!');

$mutationTests = 0;
$mutationPassed = 0;

function assert_mutation($condition, $message) {
    global $mutationTests, $mutationPassed;
    $mutationTests++;
    if ($condition) {
        $mutationPassed++;
        echo "  [PASS] $message\n";
    } else {
        echo "  [FAIL] $message\n";
    }
}

// Mutation A: User Name Mutation on Dashboard
$origName = $pdo->query("SELECT full_name FROM users WHERE email = 'student@alumni.test'")->fetchColumn();
$mutName = "Aarav_MUTATED_" . rand(1000, 9999);
$pdo->prepare("UPDATE users SET full_name = ? WHERE email = 'student@alumni.test'")->execute([$mutName]);
$dashHtml = mut_http("$baseUrl/dashboard", 'GET', [], $studentCookies)['body'];
$nameRendered = strpos($dashHtml, $mutName) !== false;
$pdo->prepare("UPDATE users SET full_name = ? WHERE email = 'student@alumni.test'")->execute([$origName]);
assert_mutation($nameRendered, "User name mutation '$mutName' dynamically rendered on /dashboard");

// Mutation B: Event Title Mutation on /events and /events-admin
$eventRow = $pdo->query("SELECT id, title FROM events WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($eventRow) {
    $origTitle = $eventRow->title;
    $mutTitle = "GLOBAL_CONCLAVE_MUTATED_" . rand(1000, 9999);
    $pdo->prepare("UPDATE events SET title = ? WHERE id = ?")->execute([$mutTitle, $eventRow->id]);
    
    $eventsHtml = mut_http("$baseUrl/events", 'GET', [], $studentCookies)['body'];
    $adminEventsHtml = mut_http("$baseUrl/events-admin", 'GET', [], $adminCookies)['body'];
    $renderedStudent = strpos($eventsHtml, $mutTitle) !== false;
    $renderedAdmin = strpos($adminEventsHtml, $mutTitle) !== false;
    
    $pdo->prepare("UPDATE events SET title = ? WHERE id = ?")->execute([$origTitle, $eventRow->id]);
    assert_mutation($renderedStudent, "Event title mutation '$mutTitle' dynamically rendered on student /events");
    assert_mutation($renderedAdmin, "Event title mutation '$mutTitle' dynamically rendered on admin /events-admin");
}

// Mutation C: Campaign Goal & Raised Amount on /donations
$campRow = $pdo->query("SELECT id, title, raised_amount FROM campaigns WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($campRow) {
    $origCampTitle = $campRow->title;
    $mutCampTitle = "ENDOWMENT_FUND_MUTATED_" . rand(1000, 9999);
    $pdo->prepare("UPDATE campaigns SET title = ? WHERE id = ?")->execute([$mutCampTitle, $campRow->id]);
    
    $donHtml = mut_http("$baseUrl/donations", 'GET', [], $studentCookies)['body'];
    $campRendered = strpos($donHtml, $mutCampTitle) !== false;
    
    $pdo->prepare("UPDATE campaigns SET title = ? WHERE id = ?")->execute([$origCampTitle, $campRow->id]);
    assert_mutation($campRendered, "Campaign title mutation '$mutCampTitle' dynamically rendered on /donations");
}

// Mutation D: Job Title Mutation on /jobs
$jobRow = $pdo->query("SELECT id, title FROM jobs WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($jobRow) {
    $origJobTitle = $jobRow->title;
    $mutJobTitle = "CHIEF_ARCHITECT_MUTATED_" . rand(1000, 9999);
    $pdo->prepare("UPDATE jobs SET title = ? WHERE id = ?")->execute([$mutJobTitle, $jobRow->id]);
    
    $jobsHtml = mut_http("$baseUrl/jobs", 'GET', [], $studentCookies)['body'];
    $jobRendered = strpos($jobsHtml, $mutJobTitle) !== false;
    
    $pdo->prepare("UPDATE jobs SET title = ? WHERE id = ?")->execute([$origJobTitle, $jobRow->id]);
    assert_mutation($jobRendered, "Job title mutation '$mutJobTitle' dynamically rendered on /jobs");
}

// Mutation E: College Name Mutation on Super Admin /super-admin/institutions
$colRow = $pdo->query("SELECT id, name FROM colleges WHERE id = 1")->fetch(PDO::FETCH_OBJ);
if ($colRow) {
    $origColName = $colRow->name;
    $mutColName = "INSTITUTE_OF_ADVANCED_STUDIES_MUTATED_" . rand(1000, 9999);
    $pdo->prepare("UPDATE colleges SET name = ? WHERE id = 1")->execute([$mutColName]);
    
    $instHtml = mut_http("$baseUrl/super-admin/institutions", 'GET', [], $superCookies)['body'];
    $colRendered = strpos($instHtml, $mutColName) !== false;
    
    $pdo->prepare("UPDATE colleges SET name = ? WHERE id = 1")->execute([$origColName]);
    assert_mutation($colRendered, "Institution name mutation '$mutColName' dynamically rendered on /super-admin/institutions");
}

echo "\n========================================================\n";
echo "MUTATION TEST RESULTS: $mutationPassed Passed / $mutationTests Total\n";
echo "========================================================\n";

if ($mutationPassed < $mutationTests) {
    exit(1);
}
