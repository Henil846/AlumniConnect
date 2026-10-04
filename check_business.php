<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Create business
$stmt = $pdo->prepare("INSERT INTO businesses (user_id, name, description, website, category) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([1, 'Alumni Tech Solutions', 'IT Consulting for Alumni', 'https://alumnitech.example.com', 'tech']);

// Verify
$businesses = $pdo->query("SELECT * FROM businesses WHERE name = 'Alumni Tech Solutions'")->fetchAll(PDO::FETCH_ASSOC);

if (count($businesses) > 0) {
    echo "\nBusiness DB sanity check passed!\n";
} else {
    echo "\nBusiness DB sanity check failed!\n";
}
