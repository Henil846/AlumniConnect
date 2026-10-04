<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Page views / Analytics
$pdo->exec("CREATE TABLE IF NOT EXISTS page_views (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_url VARCHAR(255),
    user_id INT,
    viewed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Moderation / Reports
$pdo->exec("CREATE TABLE IF NOT EXISTS reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reporter_id INT,
    reported_item_type VARCHAR(50), -- e.g., 'user', 'post', 'item'
    reported_item_id INT,
    reason TEXT,
    status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Settings / User Preferences
$pdo->exec("CREATE TABLE IF NOT EXISTS user_settings (
    user_id INT PRIMARY KEY,
    email_notifications TINYINT(1) DEFAULT 1,
    profile_visibility VARCHAR(50) DEFAULT 'public',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");

echo "Database tables created successfully for Analytics, Moderation, and Settings!\n";
