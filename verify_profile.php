<?php
require 'app/Core/Env.php';
App\Core\Env::load('.env');
require 'app/Services/JwtService.php';

$payload = ['id' => 68, 'role' => 'alumni', 'college_id' => 1];
$token = App\Services\JwtService::encode($payload);

$ch = curl_init('http://localhost:8000/profile/update');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE, 'auth_token=' . $token . '; csrf_token=test_token');
curl_setopt($ch, CURLOPT_POST, true);

$data = [
    'csrf_token' => 'test_token',
    'about_me' => 'Dynamic about me via CLI script',
    'linkedin' => 'linkedin.com/in/alumni68',
    'github' => 'github.com/alumni68',
    'website' => 'alumni68.com',
    'skills' => ['PHP', 'JavaScript', 'SQLite']
];

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$res = curl_exec($ch);
echo "Response from API: $res\n";

require 'app/Core/Database.php';
$pdo = App\Core\Database::getConnection();
$stmt = $pdo->prepare("SELECT about_me, linkedin, skills FROM users WHERE id = 68");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "DB Check: \n";
print_r($row);
