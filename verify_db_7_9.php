<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

$user = $pdo->query("SELECT * FROM users WHERE email='user1@test.com'")->fetch(PDO::FETCH_ASSOC);
if ($user) {
    $settings = $pdo->query("SELECT * FROM user_settings WHERE user_id=" . $user['id'])->fetch(PDO::FETCH_ASSOC);
    if ($settings) {
        echo "User profile visibility: " . $settings['profile_visibility'] . "\n";
        echo "User email notifications: " . $settings['email_notifications'] . "\n";
    } else {
        echo "User settings not found\n";
    }
}
