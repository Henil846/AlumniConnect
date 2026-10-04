<?php
require 'app/Core/Database.php';
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');

$pdo = App\Core\Database::getConnection();
$tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $table) {
    echo "TABLE: $table\n";
    $cols = $pdo->query("DESCRIBE $table")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cols as $col) {
        echo "  " . $col['Field'] . "\n";
    }
}
