<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Create report
$stmt = $pdo->prepare("INSERT INTO reports (reporter_id, reported_item_type, reported_item_id, reason) VALUES (?, ?, ?, ?)");
$stmt->execute([2, 'user', 1, 'Inappropriate behavior']);
$reportId = $pdo->lastInsertId();

// Resolve report
$pdo->prepare("UPDATE reports SET status = 'resolved' WHERE id = ?")->execute([$reportId]);

// Save settings
$stmt = $pdo->prepare("INSERT INTO user_settings (user_id, email_notifications, profile_visibility) VALUES (?, ?, ?)");
$stmt->execute([1, 0, 'hidden']);

// Verify
$reports = $pdo->query("SELECT * FROM reports WHERE id = $reportId AND status = 'resolved'")->fetchAll(PDO::FETCH_ASSOC);
$settings = $pdo->query("SELECT * FROM user_settings WHERE user_id = 1 AND email_notifications = 0")->fetchAll(PDO::FETCH_ASSOC);

if (count($reports) > 0 && count($settings) > 0) {
    echo "\nAdmin & Settings DB sanity check passed!\n";
} else {
    echo "\nAdmin & Settings DB sanity check failed!\n";
}
