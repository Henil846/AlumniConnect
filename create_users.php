<?php
require 'app/Core/Env.php';
App\Core\Env::load('.env');
require 'app/Core/Database.php';

$pdo = App\Core\Database::getConnection();
$pdo->exec('DROP TABLE IF EXISTS users');

$sql = 'CREATE TABLE users (
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
)';

$pdo->exec($sql);
echo "Users table created successfully!\n";
