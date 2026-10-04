<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Create campaign
$stmt = $pdo->prepare("INSERT INTO campaigns (title, description, goal_amount, created_by) VALUES (?, ?, ?, ?)");
$stmt->execute(['Scholarship Fund', 'Help students in need.', 10000.00, 1]);
$campaignId = $pdo->lastInsertId();

// Create donation
$stmt = $pdo->prepare("INSERT INTO donations (user_id, campaign_id, amount, status, transaction_id) VALUES (?, ?, ?, 'completed', ?)");
$stmt->execute([1, $campaignId, 500.00, 'TXN_12345']);

// Update campaign
$pdo->prepare("UPDATE campaigns SET raised_amount = raised_amount + ? WHERE id = ?")->execute([500.00, $campaignId]);

// Verify
$campaigns = $pdo->query("SELECT * FROM campaigns WHERE id = $campaignId")->fetchAll(PDO::FETCH_ASSOC);
$donations = $pdo->query("SELECT * FROM donations WHERE campaign_id = $campaignId")->fetchAll(PDO::FETCH_ASSOC);

if (count($campaigns) > 0 && count($donations) > 0 && $campaigns[0]['raised_amount'] == 500) {
    echo "\nDonations DB sanity check passed!\n";
} else {
    echo "\nDonations DB sanity check failed!\n";
}
