<?php
$dbPath = __DIR__ . '/../database/database.sqlite';
$bakPath = __DIR__ . '/../database/database.sqlite.bak';

$db1 = new PDO("sqlite:$dbPath");
$db2 = new PDO("sqlite:$bakPath");

$tables = $db1->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' ORDER BY name")->fetchAll(PDO::FETCH_COLUMN);

printf("%-25s | %-16s | %-16s\n", "Table Name", "database.sqlite", "database.sqlite.bak");
echo str_repeat("-", 63) . PHP_EOL;

foreach ($tables as $t) {
    $c1 = (int)$db1->query("SELECT COUNT(*) FROM \"$t\"")->fetchColumn();
    $c2 = (int)$db2->query("SELECT COUNT(*) FROM \"$t\"")->fetchColumn();
    printf("%-25s | %-16d | %-16d\n", $t, $c1, $c2);
}
