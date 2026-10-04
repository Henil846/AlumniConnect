<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Create resource
$stmt = $pdo->prepare("INSERT INTO career_resources (title, link, resource_type) VALUES (?, ?, ?)");
$stmt->execute(['How to Ace the Coding Interview', 'https://example.com/interview', 'interview']);

// Verify
$resources = $pdo->query("SELECT * FROM career_resources WHERE title = 'How to Ace the Coding Interview'")->fetchAll(PDO::FETCH_ASSOC);

if (count($resources) > 0) {
    echo "\nCareer Center DB sanity check passed!\n";
} else {
    echo "\nCareer Center DB sanity check failed!\n";
}
