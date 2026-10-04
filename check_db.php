<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();
echo "POSTS:\n";
print_r($pdo->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC));
echo "\nMESSAGES:\n";
print_r($pdo->query("SELECT * FROM messages")->fetchAll(PDO::FETCH_ASSOC));
