<?php
require 'app/Core/Env.php';
App\Core\Env::load('.env');
require 'app/Core/Database.php';
$pdo = App\Core\Database::getConnection();

$tables = [
    'users' => 'CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT, full_name VARCHAR(255), email VARCHAR(255), password VARCHAR(255), role VARCHAR(50), college_id INTEGER, is_verified BOOLEAN, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)',
    'colleges' => 'CREATE TABLE colleges (id INTEGER PRIMARY KEY AUTOINCREMENT, name VARCHAR(255), domain VARCHAR(255), logo_url VARCHAR(255), created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)',
    'mentorship_sessions' => 'CREATE TABLE mentorship_sessions (id INTEGER PRIMARY KEY AUTOINCREMENT, mentor_id INTEGER, mentee_id INTEGER, scheduled_time DATETIME, status VARCHAR(50), meeting_link VARCHAR(255), notes TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)',
    'jobs' => 'CREATE TABLE jobs (id INTEGER PRIMARY KEY AUTOINCREMENT, title VARCHAR(255), company VARCHAR(255), location VARCHAR(255), type VARCHAR(50), description TEXT, requirements TEXT, link VARCHAR(255), posted_by INTEGER, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)',
    'events' => 'CREATE TABLE events (id INTEGER PRIMARY KEY AUTOINCREMENT, title VARCHAR(255), description TEXT, date DATETIME, location VARCHAR(255), type VARCHAR(50), link VARCHAR(255), created_by INTEGER, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)',
];

foreach ($tables as $name => $sql) {
    try {
        $pdo->exec($sql);
        echo "Created $name\n";
    } catch (Exception $e) {
        echo "Failed $name: " . $e->getMessage() . "\n";
    }
}
