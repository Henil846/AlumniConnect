<?php
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("CLI only\n");
}

require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();
$apps = $pdo->query("SELECT * FROM job_applications")->fetchAll(PDO::FETCH_ASSOC);
echo "Job Applications count: " . count($apps) . "\n";
print_r($apps);
