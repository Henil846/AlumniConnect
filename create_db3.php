<?php
$host = '127.0.0.1';
$port = '3306';
$username = 'root';
$password = 'Admin@1234';
try {
    $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS alumni_connect;");
    echo "Database created successfully with password Admin@1234.\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
