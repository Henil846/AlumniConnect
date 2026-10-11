<?php
require 'app/Core/Database.php';
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__ . '/../.env');

$pdo = App\Core\Database::getConnection();
$tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'")->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $table) {
    echo "TABLE: $table\n";
    $cols = $pdo->query("PRAGMA table_info($table)")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cols as $col) {
        echo "  " . $col['name'] . " (" . $col['type'] . ")\n";
    }
}
