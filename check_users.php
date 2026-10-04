<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();
print_r($pdo->query('DESCRIBE users')->fetchAll(PDO::FETCH_ASSOC));
print_r($pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC));
