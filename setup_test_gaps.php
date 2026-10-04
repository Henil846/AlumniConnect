<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Add test event with capacity 1
$pdo->exec("INSERT INTO events (title, date, location, type, description, image_url, capacity) VALUES ('Capacity Test Event', '2026-12-01', 'Test Hall', 'Networking', 'Test Description', '/assets/img/test.jpg', 1)");
$eventId = $pdo->lastInsertId();
echo "Inserted test event with ID: $eventId\n";

// Add test users
$pwd = password_hash('Password123!', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO users (full_name, email, password, is_verified) VALUES ('User One', 'user1@test.com', '$pwd', 1) ON DUPLICATE KEY UPDATE id=id");
$pdo->exec("INSERT INTO users (full_name, email, password, is_verified) VALUES ('User Two', 'user2@test.com', '$pwd', 1) ON DUPLICATE KEY UPDATE id=id");
echo "Users inserted.\n";

// Write a valid JPG (1x1 transparent)
$validImg = base64_decode("iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=");
file_put_contents('C:\Users\HENIL\test_valid.jpg', $validImg);

// Write a fake JPG
file_put_contents('C:\Users\HENIL\test_bad.jpg', "<?php echo 'malicious code'; ?>");
echo "Test files written.\n";
