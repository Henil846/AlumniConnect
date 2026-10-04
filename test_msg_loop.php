<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

$userId = 4;
$selectedUserId = 5;

$stmt = $pdo->prepare("SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY created_at ASC");
$stmt->execute([$userId, $selectedUserId, $selectedUserId, $userId]);
$messages = $stmt->fetchAll(\PDO::FETCH_OBJ);

$currentUserId = $userId;
foreach ($messages as $msg) {
    $isMine = ($msg->sender_id == $currentUserId);
    echo "IsMine: $isMine | Content: " . nl2br(htmlspecialchars($msg->content)) . "\n";
    echo "Date: " . date('g:i A', strtotime($msg->created_at)) . "\n";
}
