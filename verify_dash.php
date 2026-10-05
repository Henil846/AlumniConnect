<?php
require 'app/Core/Env.php';
App\Core\Env::load('.env');
require 'app/Services/JwtService.php';
$payload = ['id' => 68, 'role' => 'alumni', 'college_id' => 1];
$token = App\Services\JwtService::encode($payload);

$ch = curl_init('http://localhost:8000/dashboard');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE, 'auth_token=' . $token);
$res = curl_exec($ch);
if (strpos($res, 'Student User') !== false) {
    echo "Verified: Dynamic data loads!\n";
} else {
    echo 'Failed: could not find Student User in response';
}
