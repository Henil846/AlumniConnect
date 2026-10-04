<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Create startup
$stmt = $pdo->prepare("INSERT INTO startups (user_id, name, elevator_pitch, funding_stage, website) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([1, 'NextGen AI', 'Revolutionizing alumni networks with AI', 'seed', 'https://nextgenai.example.com']);

// Verify
$startups = $pdo->query("SELECT * FROM startups WHERE name = 'NextGen AI'")->fetchAll(PDO::FETCH_ASSOC);

if (count($startups) > 0) {
    echo "\nStartup DB sanity check passed!\n";
} else {
    echo "\nStartup DB sanity check failed!\n";
}
