<?php
require 'app/Core/Env.php';
App\Core\Env::load('.env');
require 'app/Core/Database.php';

$sql = file_get_contents('alumni_connect_export.sql');

// Remove MySQL specific settings
$sql = preg_replace('/SET FOREIGN_KEY_CHECKS\s*=\s*\d+;/i', '', $sql);
$sql = preg_replace('/ENGINE=InnoDB[^;]+;/i', ';', $sql);
$sql = preg_replace('/AUTO_INCREMENT=\d+/i', '', $sql);
$sql = preg_replace('/`/', '"', $sql);

// Fix AUTO_INCREMENT for SQLite
$sql = preg_replace('/(int(?:\(\d+\))?)\s+NOT NULL\s+AUTO_INCREMENT/i', 'INTEGER PRIMARY KEY AUTOINCREMENT', $sql);

// Remove the redundant PRIMARY KEY constraint at the end of CREATE TABLE
$sql = preg_replace('/,\s*PRIMARY KEY\s*\("[^"]+"\)/i', '', $sql);

// Replace int(11) with INTEGER
$sql = preg_replace('/int\(\d+\)/i', 'INTEGER', $sql);
$sql = preg_replace('/ int\b/i', ' INTEGER', $sql);
$sql = preg_replace('/"id" int\b/i', '"id" INTEGER', $sql);

// Remove other MySQL enums and collations
$sql = preg_replace('/CHARACTER SET utf8mb4 COLLATE utf8mb4_\w+/i', '', $sql);
$sql = preg_replace('/COLLATE utf8mb4_\w+/i', '', $sql);
$sql = preg_replace('/DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP/i', 'DEFAULT CURRENT_TIMESTAMP', $sql);
$sql = preg_replace('/ENUM\([^)]+\)/i', 'VARCHAR(50)', $sql);

file_put_contents('sqlite_import.sql', $sql);
echo "Saved sqlite_import.sql\n";

$pdo = App\Core\Database::getConnection();
$pdo->exec("PRAGMA foreign_keys = OFF;");

// First drop the tables we created
// $pdo->exec("DROP TABLE IF EXISTS users;");
// $pdo->exec("DROP TABLE IF EXISTS colleges;");
// $pdo->exec("DROP TABLE IF EXISTS mentorship_sessions;");
// $pdo->exec("DROP TABLE IF EXISTS jobs;");
// $pdo->exec("DROP TABLE IF EXISTS events;");

// Split into statements, removing DROP TABLE
$sql = preg_replace('/DROP TABLE IF EXISTS [^;]+;/i', '', $sql);
$statements = explode(';', $sql);
$success = 0;
foreach ($statements as $statement) {
    $statement = trim($statement);
    if (empty($statement)) continue;
    
    try {
        $pdo->exec($statement);
        $success++;
    } catch (PDOException $e) {
        echo "Failed to execute: \n$statement\nError: " . $e->getMessage() . "\n\n";
        $fail++;
    }
}

echo "Successfully executed $success statements, failed $fail!\n";
