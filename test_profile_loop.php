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
    if (isset($http_response_header)) {
        foreach ($http_response_header as $hdr) {
            if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
                parse_str($matches[1], $cookieData);
                foreach ($cookieData as $k => $v) {
                    $newCookies[$k] = $v;
                }
            }
        }
    }

    return ['body' => $result, 'cookies' => $newCookies];
}

echo "Testing Profile Routes...\n\n";

// Login to get token
$res = makeRequest("$base_url/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
$loginData = ['email' => 'phptest@college.edu', 'password' => 'Password123!', 'csrf_token' => $csrfToken];
$res = makeRequest("$base_url/login", 'POST', $loginData, ['csrf_token' => $csrfToken]);
$authToken = $res['cookies']['auth_token'] ?? '';

// 1. Fetch /profile
$res = makeRequest("$base_url/profile", 'GET', [], ['auth_token' => $authToken]);
$html = $res['body'];
if (strpos($html, 'Edit Professional Profile') !== false && strpos($html, 'PHP Tester') !== false) {
    echo "1. /profile Rendered Correctly!\n";
} else {
    die("Failed /profile\n");
}

// 2. Fetch /profile/1 (Assume ID 1 is an admin or valid user)
$res = makeRequest("$base_url/profile/1", 'GET', [], ['auth_token' => $authToken]);
$html = $res['body'];
if (strpos($html, 'Joined') !== false) {
    echo "2. /profile/1 Rendered Correctly!\n";
} else {
    die("Failed /profile/1\n");
}

echo "\nPROFILE MODULE TESTS PASSED SUCCESSFULLY!\n";
