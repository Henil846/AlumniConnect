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

echo "Starting Admin/Analytics Tests...\n";

// Get token
$res = makeRequest("$base/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
$loginData = ['email' => 'user1@test.com', 'password' => 'Password123!', 'csrf_token' => $csrfToken];
$res = makeRequest("$base/login", 'POST', $loginData, ['csrf_token' => $csrfToken]);
$authToken = $res['cookies']['auth_token'] ?? '';
$cookies = ['csrf_token' => $csrfToken, 'auth_token' => $authToken];

if (!$authToken) {
    echo "Failed to login as user1@test.com\n";
    exit;
}

// Admin Mod
$res = makeRequest("$base/admin", 'GET', [], $cookies);
echo "Admin Dashboard code: " . $res['code'] . "\n";
if (strpos($res['body'], 'Admin') !== false) {
    echo "Admin page loaded successfully.\n";
} else {
    echo "Admin page load failed.\n";
}

// Moderation test (assume there is a post to reject)
$modData = ['csrf_token' => $csrfToken, 'action' => 'reject', 'type' => 'marketplace', 'id' => 1];
$res = makeRequest("$base/admin/moderate", 'POST', $modData, $cookies);
echo "Moderation post code: " . $res['code'] . "\n";

// Analytics
$res = makeRequest("$base/admin/analytics", 'GET', [], $cookies);
echo "Analytics Dashboard code: " . $res['code'] . "\n";
if (strpos($res['body'], 'Analytics') !== false || strpos($res['body'], 'Platform') !== false) {
    echo "Analytics page loaded successfully.\n";
} else {
    echo "Analytics page load failed.\n";
}

echo "Admin checks complete.\n";
