<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

$pdo->query("UPDATE users SET role='admin' WHERE email='user1@test.com'");
echo "Role updated to admin\n";
