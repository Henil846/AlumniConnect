<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

try {
    // Add capacity if not exists
    $pdo->exec("ALTER TABLE events ADD COLUMN capacity INT DEFAULT 100;");
} catch(Exception $e) { }

try {
    // Gallery table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS event_gallery (
            id INT AUTO_INCREMENT PRIMARY KEY,
            event_id INT NOT NULL,
            file_path VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
        );
    ");
    echo "Events admin tables setup complete.\n";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
