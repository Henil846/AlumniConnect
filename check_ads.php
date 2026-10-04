<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Create ad
$stmt = $pdo->prepare("INSERT INTO advertisements (sponsor_name, image_url, link_url) VALUES (?, ?, ?)");
$stmt->execute(['Test Sponsor', 'http://example.com/img.jpg', 'http://example.com']);

// Verify
$ads = $pdo->query("SELECT * FROM advertisements WHERE sponsor_name = 'Test Sponsor'")->fetchAll(PDO::FETCH_ASSOC);

if (count($ads) > 0) {
    echo "\nAds DB sanity check passed!\n";
} else {
    echo "\nAds DB sanity check failed!\n";
}
