<?php
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("CLI only\n");
}

require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();
print_r($pdo->query('DESCRIBE users')->fetchAll(PDO::FETCH_ASSOC));
print_r($pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC));
