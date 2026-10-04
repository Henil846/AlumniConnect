<?php
require 'app/Core/Database.php';
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
$pdo = App\Core\Database::getConnection();

// --- 1. SETUP TEST DATA ---
$pdo->exec("INSERT INTO colleges (name, city, state) VALUES ('College A Search', 'City', 'State'), ('College B Search', 'City', 'State')");
$collegeAId = $pdo->lastInsertId();
$collegeBId = $collegeAId + 1;

$pwdHash = password_hash('Pass123!', PASSWORD_BCRYPT);
$emailA = 'usera_search_' . time() . '@a.edu';
$emailAdmin = 'superadmin_' . time() . '@admin.com';

// College A User (Alumni)
$pdo->exec("INSERT INTO users (full_name, email, password, college_id, role, is_verified) VALUES ('User A Search', '$emailA', '$pwdHash', $collegeAId, 'alumni', 1)");
$userAId = $pdo->lastInsertId();

// Super Admin
$pdo->exec("INSERT INTO users (full_name, email, password, college_id, role, is_verified) VALUES ('Super Admin', '$emailAdmin', '$pwdHash', NULL, 'super_admin', 1)");

// Insert matching search terms into jobs for both colleges
$searchTerm = "GlobalTerm" . time();
$pdo->exec("INSERT INTO jobs (title, company, location, type, industry, salary_range, description, college_id) VALUES ('$searchTerm', 'Company A', 'Loc', 'Full-time', 'Tech', '100k', 'Desc', $collegeAId)");
$pdo->exec("INSERT INTO jobs (title, company, location, type, industry, salary_range, description, college_id) VALUES ('$searchTerm', 'Company B', 'Loc', 'Full-time', 'Tech', '100k', 'Desc', $collegeBId)");

$base_url = 'http://localhost:8000';
function makeRequest($url, $method = 'GET', $data = [], $cookies = []) {
    $options = [
        'http' => [
            'method'  => $method,
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'ignore_errors' => true
        ]
    ];
    if ($method === 'POST') {
        $options['http']['content'] = http_build_query($data);
    }
    
    $cookieHeader = '';
    foreach ($cookies as $key => $val) {
        $cookieHeader .= "$key=$val; ";
    }
    if ($cookieHeader) {
        $options['http']['header'] .= "Cookie: $cookieHeader\r\n";
    }

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    $status = 200;
    if (isset($http_response_header[0])) {
        preg_match('#HTTP/\d+\.\d+ (\d+)#', $http_response_header[0], $match);
        $status = intval($match[1]);
    }

    $newCookies = [];
    if (!empty($http_response_header)) {
        foreach ($http_response_header as $hdr) {
            if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
                parse_str($matches[1], $cookieData);
                foreach ($cookieData as $k => $v) {
                    $newCookies[$k] = $v;
                }
            }
        }
    }

    return ['body' => $result, 'cookies' => array_merge($cookies, $newCookies), 'status' => $status];
}

echo "--- GLOBAL SEARCH TEST ---\n";

// Login User A
$res = makeRequest("$base_url/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
$cookies = $res['cookies'];
$res = makeRequest("$base_url/login", 'POST', ['email' => $emailA, 'password' => 'Pass123!', 'csrf_token' => $csrfToken], $cookies);
$cookiesA = $res['cookies'];

$resSearch = makeRequest("$base_url/search?q=" . urlencode($searchTerm), 'GET', [], $cookiesA);
$response = $resSearch['body'];

if (strpos($response, 'Company A') !== false && strpos($response, 'Company B') === false) {
    echo "SUCCESS: Search correctly isolated to College A (Company A found, Company B excluded).\n";
} else {
    echo "FAILED: Search did not isolate properly. Status: " . $resSearch['status'] . "\n";
}

echo "\n--- SUPER ADMIN TEST ---\n";
// Test 1: Alumni accessing super-admin route
$resAdminBlock = makeRequest("$base_url/super-admin/dashboard", 'GET', [], $cookiesA);
if ($resAdminBlock['status'] === 403) {
    echo "SUCCESS: Alumni correctly blocked from super-admin (HTTP 403).\n";
} else {
    echo "FAILED: Alumni got HTTP " . $resAdminBlock['status'] . " accessing super-admin.\n";
}

// Test 2: Super Admin accessing super-admin route
$res = makeRequest("$base_url/login");
$csrfTokenAdmin = $res['cookies']['csrf_token'] ?? '';
$cookiesAdmin = $res['cookies'];
$res = makeRequest("$base_url/login", 'POST', ['email' => $emailAdmin, 'password' => 'Pass123!', 'csrf_token' => $csrfTokenAdmin], $cookiesAdmin);
$cookiesAdmin = $res['cookies'];

$resAdminAccess = makeRequest("$base_url/super-admin/dashboard", 'GET', [], $cookiesAdmin);
if ($resAdminAccess['status'] === 200) {
    echo "SUCCESS: Super Admin allowed access (HTTP 200).\n";
    
    $totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    if (strpos($resAdminAccess['body'], number_format($totalUsers)) !== false || strpos($resAdminAccess['body'], (string)$totalUsers) !== false) {
         echo "SUCCESS: Super Admin dashboard shows aggregated platform-wide user count ($totalUsers).\n";
    } else {
         echo "FAILED: Dashboard didn't seem to show the correct platform-wide count.\n";
    }
} else {
    echo "FAILED: Super Admin got HTTP " . $resAdminAccess['status'] . ".\n";
    echo "Body: " . $resAdminAccess['body'] . "\n";
}

echo "Done.\n";
