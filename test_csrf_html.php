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
    return ['body' => $body, 'cookies' => $new_cookies];
}

$res = makeRequest('http://localhost:8000/login');
$csrf = $res['cookies']['csrf_token'] ?? '';
echo "Initial CSRF: $csrf\n";

$loginData = ['email' => 'phptest@college.edu', 'password' => 'Password123!', 'csrf_token' => $csrf];
$res2 = makeRequest('http://localhost:8000/login', 'POST', $loginData, ['csrf_token' => $csrf]);
$auth = $res2['cookies']['auth_token'] ?? '';
echo "Auth Token: " . substr($auth, 0, 10) . "...\n";

$marketplace = makeRequest('http://localhost:8000/marketplace', 'GET', [], ['csrf_token' => $csrf, 'auth_token' => $auth]);
preg_match('/name="csrf_token" value="(.*?)"/', $marketplace['body'], $m);
echo 'CSRF in marketplace HTML: ' . ($m[1] ?? 'NOT FOUND') . "\n";
