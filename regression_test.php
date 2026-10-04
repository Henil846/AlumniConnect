<?php
function makeRequest($url, $method = 'GET', $data = [], $cookies = []) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }
    if (!empty($cookies)) {
        $cookieStr = [];
        foreach($cookies as $k => $v) $cookieStr[] = "$k=$v";
        curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookieStr));
    }
    $response = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);
    
    $new_cookies = [];
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $header, $matches);
    foreach($matches[1] as $item) {
        parse_str($item, $cookie);
        foreach($cookie as $k => $v) {
            $new_cookies[$k] = $v;
        }
    }
    
    return [
        'code' => curl_getinfo($ch, CURLINFO_HTTP_CODE),
        'body' => $body,
        'cookies' => $new_cookies
    ];
}

$base = "http://localhost:8000";

echo "Starting Regression Tests...\n";

// 1. Get signup/login page to grab CSRF token
$res = makeRequest("$base/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
echo "CSRF Token grabbed: " . substr($csrfToken, 0, 10) . "...\n";

// 2. Login
$loginData = [
    'email' => 'phptest@college.edu',
    'password' => 'Password123!',
    'csrf_token' => $csrfToken
];
$res = makeRequest("$base/login", 'POST', $loginData, ['csrf_token' => $csrfToken]);
$authToken = $res['cookies']['auth_token'] ?? '';
if ($authToken) {
    echo "Login: PASS\n";
} else {
    echo "Login: FAIL\n";
    print_r($res);
    exit;
}

$cookies = [
    'csrf_token' => $csrfToken,
    'auth_token' => $authToken
];

// 3. Dashboard
$res = makeRequest("$base/dashboard", 'GET', [], $cookies);
if ($res['code'] == 200 && strpos($res['body'], 'Dashboard') !== false) {
    echo "Dashboard load: PASS\n";
} else {
    echo "Dashboard load: FAIL (" . $res['code'] . ")\n";
}

// 4. Profile Save (POST)
$profileData = [
    'csrf_token' => $csrfToken,
    'full_name' => 'PHP Tester User',
    'graduation_year' => '2024',
    'major' => 'Computer Science',
    'industry' => 'Tech',
    'location' => 'San Francisco',
    'bio' => 'Test bio'
];
$res = makeRequest("$base/profile/update", 'POST', $profileData, $cookies);
if ($res['code'] == 302) {
    echo "Profile Save: PASS\n";
} else {
    echo "Profile Save: FAIL (" . $res['code'] . ")\n";
}

// 5. Jobs apply (POST)
$jobData = [
    'csrf_token' => $csrfToken,
    'job_id' => 1
];
$res = makeRequest("$base/jobs/apply", 'POST', $jobData, $cookies);
if ($res['code'] == 302) {
    echo "Jobs Apply: PASS\n";
} else {
    echo "Jobs Apply: FAIL (" . $res['code'] . ")\n";
}

// 6. Marketplace post (POST)
$marketplaceData = [
    'csrf_token' => $csrfToken,
    'title' => 'Test Item',
    'description' => 'Test',
    'price' => '10',
    'item_condition' => 'new',
    'category' => 'other'
];
$res = makeRequest("$base/marketplace/create", 'POST', $marketplaceData, $cookies);
if ($res['code'] == 302) {
    echo "Marketplace Post: PASS\n";
} else {
    echo "Marketplace Post: FAIL (" . $res['code'] . ")\n";
}

echo "Regression checks complete.\n";
