<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();
try {
    $pdo->exec('ALTER TABLE users ADD COLUMN department VARCHAR(255) DEFAULT NULL, ADD COLUMN industry VARCHAR(255) DEFAULT NULL, ADD COLUMN location VARCHAR(255) DEFAULT NULL');
    echo "Added columns.\n";
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}
try {
    $pdo->exec("UPDATE users SET department = 'Computer Science' WHERE email = 'phptest@college.edu'");
    echo "Updated department.\n";
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}
