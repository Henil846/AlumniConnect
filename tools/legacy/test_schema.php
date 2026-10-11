<?php
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("CLI only\n");
}

require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
require 'app/Core/Database.php';
$pdo = App\Core\Database::getConnection();
$res = $pdo->query('DESCRIBE jobs')->fetchAll(PDO::FETCH_ASSOC);
print_r($res);
