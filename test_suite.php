<?php
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
require 'app/Core/Database.php';

function assertTest($condition, $message) {
    if ($condition) {
        echo "[PASS] $message\n";
    } else {
        echo "[FAIL] $message\n";
    }
}

function runInSubprocess($code) {
    $tmp = tempnam(sys_get_temp_dir(), 'test_php');
    $projectDir = __DIR__;
    file_put_contents($tmp, "<?php\nchdir('$projectDir');\nrequire 'app/Core/Env.php';\nApp\\Core\\Env::load('$projectDir/.env');\nrequire 'app/Core/Database.php';\nrequire 'app/Core/Auth.php';\n" . $code);
    $output = shell_exec("C:\\xampp\\php\\php.exe " . escapeshellarg($tmp));
    unlink($tmp);
    return trim($output);
}

echo "=== ALUMNI CONNECT TEST SUITE ===\n\n";
$pdo = App\Core\Database::getConnection();

// --- 1. RBAC Test ---
echo "Testing RBAC (AdminController)...\n";
$out = runInSubprocess("require 'app/Controllers/AdminController.php'; \$c = new App\\Controllers\\AdminController(); \$c->dashboard();");
assertTest(strpos($out, "Unauthorized") !== false, "RBAC blocks unauthenticated users from admin dashboard.");

// --- 2. Indian Currency Formatting Test ---
echo "Testing INR Currency Formatting...\n";
require_once 'app/Core/CurrencyHelper.php';
$formatted = App\Core\CurrencyHelper::formatINR(150000);
assertTest($formatted === '₹1,50,000.00', "Currency formatting defaults to Indian format (₹1,50,000.00).");

// --- 3. Tenant Isolation & Write-Path IDOR Test ---
echo "Testing Tenant Isolation & Write-Path IDOR...\n";
$rand = rand(1000, 9999);
$pdo->exec("INSERT INTO users (full_name, email, password, role, college_id) VALUES ('College A', 'a_$rand@test.com', 'test', 'alumni', 1)");
$userIdA = $pdo->lastInsertId();
$pdo->exec("INSERT INTO users (full_name, email, password, role, college_id) VALUES ('College B', 'b_$rand@test.com', 'test', 'alumni', 2)");
$userIdB = $pdo->lastInsertId();
$pdo->exec("INSERT INTO jobs (title, company, location, type, industry, college_id) VALUES ('College B Job', 'B Inc', 'Remote', 'Full', 'Tech', 2)");
$jobIdB = $pdo->lastInsertId();

$out = runInSubprocess("
    \App\Core\Auth::setUser(['id' => $userIdA, 'role' => 'alumni', 'college_id' => 1]);
    \$_POST['csrf_token'] = 'test';
    \$_COOKIE['csrf_token'] = 'test';
    \$_POST['job_id'] = $jobIdB;
    require 'app/Controllers/JobsController.php';
    \$c = new App\\Controllers\\JobsController();
    \$c->apply();
");
if (strpos($out, "Unauthorized to apply") === false) echo "OUT (Jobs IDOR):\n$out\n";
assertTest(strpos($out, "Unauthorized to apply") !== false, "Write-path IDOR blocked cross-college job application.");

// --- 4. Notification Hooks Test ---
echo "Testing Notification Hooks (Mentorship)...\n";
runInSubprocess("
    \App\Core\Auth::setUser(['id' => $userIdA, 'role' => 'alumni', 'college_id' => 1]);
    \$_POST['csrf_token'] = 'test';
    \$_COOKIE['csrf_token'] = 'test';
    \$_POST['mentor_id'] = $userIdA;
    require 'app/Controllers/MentorshipController.php';
    \$c = new App\\Controllers\\MentorshipController();
    \$c->book();
");
$notifCollege = $pdo->query("SELECT college_id FROM notifications WHERE user_id = $userIdA AND type = 'mentorship' ORDER BY id DESC LIMIT 1")->fetchColumn();
if ($notifCollege != 1) echo "FAIL: Mentorship notification has wrong college_id: " . ($notifCollege ?: 'NULL') . "\n";
assertTest($notifCollege == 1, "Notification hook successfully generated a real DB row with correct college_id on mentorship booking.");

// --- 5. CSRF & Security Test ---
echo "Testing CSRF Protection...\n";
$out = runInSubprocess("
    session_start();
    \App\Core\Auth::setUser(['id' => $userIdA, 'role' => 'alumni', 'college_id' => 1]);
    \$_POST['csrf_token'] = 'bad_token';
    \$_COOKIE['csrf_token'] = 'good_token';
    require 'app/Controllers/MentorshipController.php';
    \$c = new App\\Controllers\\MentorshipController();
    \$c->book();
");
assertTest(strpos($out, "CSRF validation failed") !== false, "CSRF validation successfully blocked mismatched tokens.");

echo "\nDone.\n";
