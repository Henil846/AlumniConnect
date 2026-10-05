<?php
require 'vendor/autoload.php';
require 'app/Core/Database.php';

$pdo = App\Core\Database::getConnection();
$tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

$sql = "-- Database Export\n\n";
$sql .= "SET FOREIGN_KEY_CHECKS = 0;\n\n";

foreach ($tables as $table) {
    // Schema
    $createTable = $pdo->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
    $sql .= "DROP TABLE IF EXISTS `$table`;\n";
    $sql .= $createTable['Create Table'] . ";\n\n";

    // Data
    $rows = $pdo->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            $keys = array_keys($row);
            $values = array_map(function($val) use ($pdo) {
                if ($val === null) return 'NULL';
                return $pdo->quote($val);
            }, array_values($row));
            
            $sql .= "INSERT INTO `$table` (`" . implode("`, `", $keys) . "`) VALUES (" . implode(", ", $values) . ");\n";
        }
        $sql .= "\n";
    }
}

$sql .= "SET FOREIGN_KEY_CHECKS = 1;\n";

file_put_contents('alumni_connect_export.sql', $sql);
echo "Database successfully exported to alumni_connect_export.sql\n";
