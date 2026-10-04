<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

try {
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS events (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            type VARCHAR(100) NOT NULL, /* Networking, Workshop, Webinar, Social */
            date DATETIME NOT NULL,
            location VARCHAR(255) NOT NULL,
            image_url VARCHAR(255),
            description TEXT,
            speakers TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        
        CREATE TABLE IF NOT EXISTS event_registrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            event_id INT NOT NULL,
            user_id INT NOT NULL,
            status VARCHAR(100) DEFAULT 'registered', /* registered, attended */
            qr_code VARCHAR(255), /* Unique hash for check-in */
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        );
    ");
    
    $count = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
    if ($count == 0) {
        // Date formatting: Next week, Next month etc.
        $d1 = date('Y-m-d H:i:s', strtotime('+3 days 18:00:00'));
        $d2 = date('Y-m-d H:i:s', strtotime('+10 days 14:00:00'));
        $d3 = date('Y-m-d H:i:s', strtotime('+15 days 09:00:00'));
        
        $pdo->exec("
            INSERT INTO events (title, type, date, location, image_url, description, speakers) VALUES 
            ('Tech Innovators Mixer', 'Networking', '$d1', 'Downtown Tech Hub, Seattle', '/assets/img/signup_side_img.png', 'Connect with leading alumni in the tech space.', 'Sarah Jenkins'),
            ('Resume Building Workshop', 'Workshop', '$d2', 'Virtual (Zoom)', '/assets/img/login_side_img.png', 'Learn how to craft a standout resume.', 'HR Team'),
            ('Annual Alumni Gala', 'Social', '$d3', 'Grand Hotel, NY', '/assets/img/signup_side_img.png', 'Our biggest event of the year.', 'President')
        ");
    }
    
    echo "Events tables created and seeded.\n";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
