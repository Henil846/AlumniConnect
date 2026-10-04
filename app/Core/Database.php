<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static $pdo = null;

    public static function getConnection() {
        if (self::$pdo === null) {
            $connection = Env::get('DB_CONNECTION', 'sqlite');
            $database = Env::get('DB_DATABASE', __DIR__ . '/../../database/database.sqlite');
            
            try {
                if ($connection === 'sqlite') {
                    // Make path absolute if it's relative
                    if (strpos($database, '/') !== 0 && strpos($database, ':\\') !== 1) {
                        $database = __DIR__ . '/../../' . $database;
                    }
                    // Ensure directory exists
                    $dir = dirname($database);
                    if (!file_exists($dir)) {
                        mkdir($dir, 0777, true);
                    }
                    self::$pdo = new PDO("sqlite:" . $database);
                } else {
                    // Fallback to MySQL if configured
                    $host = Env::get('DB_HOST', '127.0.0.1');
                    $port = Env::get('DB_PORT', '3306');
                    $username = Env::get('DB_USERNAME', 'root');
                    $password = Env::get('DB_PASSWORD', '');
                    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
                    self::$pdo = new PDO($dsn, $username, $password);
                }
                
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
