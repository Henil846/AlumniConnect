<?php
require 'app/Core/Database.php';
$pdo = App\Core\Database::getConnection();
try {
    $pdo->exec("UPDATE users SET department = 'Computer Science' WHERE email = 'phptest@college.edu'");
    echo "Updated department.\n";
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}
