<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();
$userId = 4;
$stmt = $pdo->prepare("SELECT id, full_name as name, role FROM users WHERE id != ?");
$stmt->execute([$userId]);
$users = $stmt->fetchAll(\PDO::FETCH_OBJ);
print_r($users);
