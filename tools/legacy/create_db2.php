<?php
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("CLI only\n");
}

$host = '127.0.0.1';
$port = '3306';
$username = 'root';
$password = 'root';
try {
    $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS alumni_connect;");
    echo "Database created successfully with password root.\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
