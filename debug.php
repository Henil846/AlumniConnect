<?php
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
require 'app/Core/Database.php';
$pdo = App\Core\Database::getConnection();
try {
    $pdo->query("SELECT COUNT(*) FROM campaigns");
    echo "campaigns ok\n";
} catch(Exception $e) { echo "campaigns error: " . $e->getMessage() . "\n"; }

try {
    $pdo->query("SELECT COUNT(*) FROM donations");
    echo "donations ok\n";
} catch(Exception $e) { echo "donations error: " . $e->getMessage() . "\n"; }
