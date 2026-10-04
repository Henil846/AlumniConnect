<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Create test item
$stmt = $pdo->prepare("INSERT INTO marketplace_items (user_id, title, description, price, item_condition, category) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([1, 'Used iPhone 13', 'Good condition, no scratches.', 450.00, 'good', 'electronics']);

// Fetch
$items = $pdo->query("SELECT * FROM marketplace_items")->fetchAll(PDO::FETCH_ASSOC);
print_r($items);

if (count($items) > 0) {
    echo "\nMarketplace DB sanity check passed!\n";
} else {
    echo "\nMarketplace DB sanity check failed!\n";
}
