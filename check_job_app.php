<?php
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
require 'app/Core/Database.php';

$pdo = App\Core\Database::getConnection();
print_r($pdo->query('DESCRIBE job_applications')->fetchAll(PDO::FETCH_ASSOC));
