<?php
require 'vendor/autoload.php';
require 'app/Core/Database.php';

function post($url, $data, $cookie = '') {
    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\nCookie: $cookie\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
            'ignore_errors' => true
        ]
    ];
    $context  = stream_context_create($options);
    return file_get_contents("http://localhost:8000$url", false, $context);
}
function get($url) {
    return file_get_contents("http://localhost:8000$url");
}

echo "--- 1. Testing landing.php ---\n";
$landing = get('/');
if (strpos($landing, '150000') !== false) {
    echo "FAIL: landing.php still has hardcoded 150000.\n";
} else {
    echo "PASS: landing.php does not contain hardcoded stats.\n";
}

echo "\n--- 2. Testing verify.php ---\n";
$pdo = App\Core\Database::getConnection();
$email = 'verifytest' . time() . '@example.com';
// Create unverified user directly in DB
$pdo->exec("INSERT INTO users (full_name, email, password, role, college_id, is_verified) VALUES ('Verify Test', '$email', 'hash', 'alumni', 1, 0)");
$userId = $pdo->lastInsertId();
$otp = '123456';
$pdo->exec("INSERT INTO email_verifications (user_id, otp, expires_at) VALUES ($userId, '$otp', DATE_ADD(NOW(), INTERVAL 15 MINUTE))");

$res = post('/verify', ['email' => $email, 'otp' => $otp]);
$data = json_decode($res, true);
if ($data && $data['success'] === true) {
    $isVerified = $pdo->query("SELECT is_verified FROM users WHERE id = $userId")->fetchColumn();
    if ($isVerified == 1) {
        echo "PASS: verify.php successfully validated OTP and marked user verified.\n";
    } else {
        echo "FAIL: DB shows is_verified = $isVerified\n";
    }
} else {
    echo "FAIL: /verify returned error. " . $res . "\n";
}

echo "\n--- 3. Testing forgot-password.php ---\n";
// Request forgot password
$res = post('/forgot-password', ['email' => $email]);
$data = json_decode($res, true);
if ($data && $data['success'] === true) {
    echo "PASS: /forgot-password endpoint executed.\n";
    
    // Check mailbox for the token
    $mailbox = get('/dev/mailbox');
    if (preg_match('/reset-password\?token=([a-f0-9]+)/', $mailbox, $m)) {
        $token = $m[1];
        echo "PASS: Reset token found in mailbox: $token\n";
        
        // Use token to reset password
        $res = post('/reset-password', ['token' => $token, 'password' => 'NewPassword123!']);
        $data = json_decode($res, true);
        if ($data && $data['success'] === true) {
            // Verify DB changed
            $newHash = $pdo->query("SELECT password FROM users WHERE id = $userId")->fetchColumn();
            if (password_verify('NewPassword123!', $newHash)) {
                echo "PASS: /reset-password actually changed the password in DB.\n";
            } else {
                echo "FAIL: Password hash in DB does not match 'NewPassword123!'.\n";
            }
        } else {
            echo "FAIL: /reset-password returned error. " . $res . "\n";
        }
    } else {
        echo "FAIL: Reset token not found in mailbox.\n";
    }
} else {
    echo "FAIL: /forgot-password returned error. " . $res . "\n";
}
