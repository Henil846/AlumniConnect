<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Create notification
$stmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message) VALUES (?, ?, ?)");
$stmt->execute([1, 'system', 'Welcome to Alumni Connect!']);
$notifId = $pdo->lastInsertId();

// Mark as read
$pdo->prepare("UPDATE notifications SET is_read = 1 WHERE id = ?")->execute([$notifId]);

// Verify
$notifs = $pdo->query("SELECT * FROM notifications WHERE id = $notifId")->fetchAll(PDO::FETCH_ASSOC);

if (count($notifs) > 0 && $notifs[0]['is_read'] == 1) {
    echo "\nNotifications DB sanity check passed!\n";
} else {
    echo "\nNotifications DB sanity check failed!\n";
}
