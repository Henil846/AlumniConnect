<?php
$ch = curl_init('http://localhost:8000/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'email' => 'alumni@example.com',
    'password' => 'password123',
    'csrf_token' => 'test' // Will fail CSRF, but if 500 happens before CSRF, we'll see it
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Cookie: csrf_token=test'
]);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: " . $httpcode . "\n";
echo "Response: " . $response . "\n";
