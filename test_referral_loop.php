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
    
    $newCookies = [];
    $status_code = 0;
    if (isset($http_response_header)) {
        preg_match('{HTTP\/\S*\s(\d{3})}', $http_response_header[0], $match);
        $status_code = $match[1];
        foreach ($http_response_header as $hdr) {
            if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
                parse_str($matches[1], $cookieData);
                foreach ($cookieData as $k => $v) {
                    $newCookies[$k] = $v;
                }
            }
        }
    }

    return ['body' => $result, 'cookies' => $newCookies, 'status' => $status_code];
}

echo "Testing Referrals Module...\n\n";

// Login to get token
$res = makeRequest("$base_url/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
$loginData = ['email' => 'phptest@college.edu', 'password' => 'Password123!', 'csrf_token' => $csrfToken];
$res = makeRequest("$base_url/login", 'POST', $loginData, ['csrf_token' => $csrfToken]);
$authToken = $res['cookies']['auth_token'] ?? '';

// 1. Fetch /referral-request
echo "1. Fetching /referral-request...\n";
$res = makeRequest("$base_url/referral-request", 'GET', [], ['auth_token' => $authToken]);
$html = $res['body'];
$status = $res['status'];

if ($status != 200) {
    die("Failed: Referral page returned status $status\n");
}
echo "   - Referral page loaded (HTTP 200)\n";

if (strpos($html, 'Request a Referral') !== false && strpos($html, 'upload-box') !== false) {
    echo "   - Referral HTML Payload verified.\n";
} else {
    die("Failed: Missing expected HTML markers in /referral-request\n");
}

// 2. Scan for broken links (href="#")
echo "2. Scanning for obviously broken links (href=\"#\")...\n";
$broken_links = substr_count($html, 'href="#"');
if ($broken_links > 0) {
    echo "   - [WARNING] Found $broken_links broken links (href=\"#\") in the referral view.\n";
} else {
    echo "   - No obvious broken links found.\n";
}

// 3. Verify CSS / JS Assets load (HTTP 200)
echo "3. Verifying Assets...\n";
preg_match_all('/(?:href|src)="([^"]+\.(?:css|js))"/', $html, $matches);
$assets = array_unique($matches[1]);
$assets_passed = true;
foreach ($assets as $asset) {
    if (strpos($asset, 'http') === 0) continue;
    $url = ltrim($asset, '/');
    $asset_res = makeRequest("$base_url/$url");
    if ($asset_res['status'] != 200) {
        echo "   - [ERROR] Asset failed to load: $asset (HTTP {$asset_res['status']})\n";
        $assets_passed = false;
    } else {
        echo "   - Asset loaded: $asset (HTTP 200)\n";
    }
}

if (!$assets_passed) {
    die("Failed: One or more static assets returned 404.\n");
}

echo "\nREFERRALS MODULE TESTS PASSED SUCCESSFULLY!\n";
