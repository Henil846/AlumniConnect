<?php
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
    
    // get cookies from response headers
    $newCookies = [];
    foreach ($http_response_header as $hdr) {
        if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
            parse_str($matches[1], $cookieData);
            foreach ($cookieData as $k => $v) {
                $newCookies[$k] = $v;
            }
        }
    }

    return ['body' => $result, 'cookies' => $newCookies];
}

echo "Testing Auth Loop...\n\n";

// 1. Get CSRF Token from Signup Page
$res = makeRequest("$base_url/signup");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
echo "1. Fetched CSRF Token from /signup: $csrfToken\n";

// 2. Signup
$signupData = [
    'fullName' => 'PHP Tester',
    'email' => 'phptest@college.edu',
    'password' => 'Password123!',
    'role' => 'student',
    'csrf_token' => $csrfToken
];
$res = makeRequest("$base_url/signup", 'POST', $signupData, ['csrf_token' => $csrfToken]);
$signupJson = json_decode($res['body'], true);
echo "2. Signup Response: " . $res['body'] . "\n";
if (!isset($signupJson['success']) || !$signupJson['success']) {
    die("Signup failed!\n");
}

// 3. Login Before Verify
$res = makeRequest("$base_url/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
$loginData = [
    'email' => 'phptest@college.edu',
    'password' => 'Password123!',
    'csrf_token' => $csrfToken
];
$res = makeRequest("$base_url/login", 'POST', $loginData, ['csrf_token' => $csrfToken]);
$loginJson = json_decode($res['body'], true);
echo "3. Login Before Verify Response: " . $res['body'] . "\n";
if (isset($loginJson['success']) && $loginJson['success']) {
    die("Login should have failed but succeeded!\n");
}
echo "   (Expected failure confirmed)\n";

// 4. Fetch OTP from Mailbox
$res = makeRequest("$base_url/dev/mailbox");
$mailbox = $res['body'];
preg_match('/OTP is: (\d{6})/', $mailbox, $matches);
$otp = $matches[1] ?? '';
echo "4. Fetched OTP from mailbox: $otp\n";
if (!$otp) {
    die("Failed to fetch OTP!\n");
}

// 5. Verify
$verifyData = [
    'email' => 'phptest@college.edu',
    'otp' => $otp
];
$res = makeRequest("$base_url/verify", 'POST', $verifyData);
$verifyJson = json_decode($res['body'], true);
echo "5. Verify Response: " . $res['body'] . "\n";
if (!isset($verifyJson['success']) || !$verifyJson['success']) {
    die("Verification failed!\n");
}

// 6. Login After Verify
$res = makeRequest("$base_url/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
$loginData['csrf_token'] = $csrfToken;
$res = makeRequest("$base_url/login", 'POST', $loginData, ['csrf_token' => $csrfToken]);
$loginJson = json_decode($res['body'], true);
echo "6. Login After Verify Response: " . $res['body'] . "\n";
if (!isset($loginJson['success']) || !$loginJson['success']) {
    die("Login failed!\n");
}

echo "\nTokens Received:\n";
print_r($res['cookies']);
echo "\nALL TESTS PASSED SUCCESSFULLY!\n";
