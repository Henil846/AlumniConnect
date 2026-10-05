<?php
require __DIR__ . '/app/Core/Env.php';
App\Core\Env::load(__DIR__ . '/.env');
require __DIR__ . '/app/Core/Database.php';

echo "Reading alumni_connect_export.sql...\n";
$sql = file_get_contents(__DIR__ . '/alumni_connect_export.sql');

// Fix SQLite Syntax
$sql = preg_replace('/SET FOREIGN_KEY_CHECKS\s*=\s*\d+;/', '', $sql);
$sql = preg_replace('/ENGINE=InnoDB[^;]+;/', ';', $sql);
$sql = preg_replace('/AUTO_INCREMENT=\d+/', '', $sql);
$sql = preg_replace('/`/', '"', $sql);

// Convert AUTO_INCREMENT and remove the redundant PRIMARY KEY constraint at the end
$sql = preg_replace('/(int(?:\(\d+\))?)\s*NOT NULL\s*AUTO_INCREMENT/i', 'INTEGER PRIMARY KEY AUTOINCREMENT', $sql);
$sql = preg_replace('/,\s*PRIMARY KEY\s*\("id"\)/i', '', $sql);

// Fix INT definitions
$sql = preg_replace('/"id" int\b/i', '"id" INTEGER', $sql);
$sql = preg_replace('/ int\b/i', ' INTEGER', $sql);
$sql = preg_replace('/int\(\d+\)/i', 'INTEGER', $sql);

// Remove specific MySQL enums and collations
$sql = preg_replace('/CHARACTER SET utf8mb4 COLLATE utf8mb4_\w+/i', '', $sql);
$sql = preg_replace('/COLLATE utf8mb4_\w+/i', '', $sql);
$sql = preg_replace('/DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP/i', 'DEFAULT CURRENT_TIMESTAMP', $sql);
$sql = preg_replace('/ENUM\([^)]+\)/i', 'VARCHAR(50)', $sql);

// Split into statements
$statements = explode(';', $sql);

try {
    $pdo = App\Core\Database::getConnection();
    $pdo->exec("PRAGMA foreign_keys = OFF;");
    
    echo "Executing statements on SQLite...\n";
    $success = 0;
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (empty($statement)) continue;
        
        try {
            $pdo->exec($statement);
            $success++;
        } catch (PDOException $e) {
            echo "Failed to execute: \n$statement\nError: " . $e->getMessage() . "\n\n";
        }
    }
    
    echo "\nSuccessfully executed $success statements!\n";
    
    // Check if users table exists
    $count = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    echo "Users table has $count rows.\n";
    
} catch (Exception $e) {
    echo "Fatal Error: " . $e->getMessage() . "\n";
}
