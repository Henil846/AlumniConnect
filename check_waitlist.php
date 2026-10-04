<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();
print_r($pdo->query("SELECT user_id, status FROM event_registrations WHERE event_id=4")->fetchAll(PDO::FETCH_ASSOC));
