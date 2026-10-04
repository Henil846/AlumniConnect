<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Check Marketplace
$item = $pdo->query("SELECT * FROM marketplace_items WHERE title='Test Desk'")->fetch(PDO::FETCH_ASSOC);
echo "Marketplace item found: " . ($item ? 'YES' : 'NO') . "\n";

// Check Donations
$donations = $pdo->query("SELECT * FROM donations WHERE amount=100")->fetchAll(PDO::FETCH_ASSOC);
echo "Donation of 100 found: " . (count($donations) > 0 ? 'YES' : 'NO') . "\n";

// Check Business Directory
$business = $pdo->query("SELECT * FROM businesses WHERE name='Test Tech'")->fetch(PDO::FETCH_ASSOC);
echo "Business 'Test Tech' found: " . ($business ? 'YES' : 'NO') . "\n";
