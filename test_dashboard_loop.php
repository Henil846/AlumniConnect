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

echo "Testing Dashboard Flow...\n\n";

// 1. Get CSRF Token from Login Page
$res = makeRequest("$base_url/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
echo "1. Fetched CSRF Token: $csrfToken\n";

// 2. Login
$loginData = [
    'email' => 'phptest@college.edu',
    'password' => 'Password123!',
    'csrf_token' => $csrfToken
];
$res = makeRequest("$base_url/login", 'POST', $loginData, ['csrf_token' => $csrfToken]);
$loginJson = json_decode($res['body'], true);
if (!isset($loginJson['success']) || !$loginJson['success']) {
    die("Login failed! " . $res['body'] . "\n");
}
$authToken = $res['cookies']['auth_token'] ?? '';
echo "2. Login Successful. Auth Token Received.\n";

// 3. Fetch Dashboard with Auth Cookie
$res = makeRequest("$base_url/dashboard", 'GET', [], ['auth_token' => $authToken]);
$html = $res['body'];

// Assertions
if (strpos($html, 'Good Morning, PHP') !== false) {
    echo "3. Dashboard Rendered Correctly! Found 'Good Morning, PHP'.\n";
} else {
    die("Failed to find 'Good Morning, PHP' on Dashboard.\n");
}

if (strpos($html, 'Your Next Steps') !== false) {
    echo "4. Dashboard Rendered Correctly! Found 'Your Next Steps'.\n";
} else {
    die("Failed to find 'Your Next Steps' on Dashboard.\n");
}

echo "\nDASHBOARD MODULE TESTS PASSED SUCCESSFULLY!\n";
