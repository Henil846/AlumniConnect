<?php
require 'app/Core/Env.php';
App\Core\Env::load('.env');
require 'app/Core/Database.php';

$pdo = App\Core\Database::getConnection();

// Create the table just in case it doesn't exist
$pdo->exec('CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role VARCHAR(50),
    college_id INTEGER,
    is_verified BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    about_me TEXT,
    department VARCHAR(255),
    industry VARCHAR(255),
    location VARCHAR(255)
)');

$password = password_hash('password123', PASSWORD_DEFAULT);

$pdo->exec("INSERT INTO users (full_name, email, password, role, is_verified) VALUES ('Admin User', 'admin@example.com', '$password', 'super_admin', 1)");
$pdo->exec("INSERT INTO users (full_name, email, password, role, is_verified, college_id) VALUES ('Alumni User', 'alumni@example.com', '$password', 'alumni', 1, 1)");

echo "Test users created!\n";
