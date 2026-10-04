<?php
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
require 'app/Core/Database.php';

$pdo = App\Core\Database::getConnection();

try {
    $pdo->exec('ALTER TABLE job_applications ADD COLUMN college_id INT NOT NULL DEFAULT 1');
    echo "Added college_id to job_applications.\n";
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $pdo->exec('ALTER TABLE messages ADD COLUMN college_id INT NOT NULL DEFAULT 1');
    echo "Added college_id to messages.\n";
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}
