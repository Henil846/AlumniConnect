<?php
/**
 * Helper to fetch test entity IDs for browser smoke testing without shell quoting issues.
 */
$db = $argv[1] ?? __DIR__ . '/../database/test.sqlite';
if (!file_exists($db)) {
    $db = __DIR__ . '/../database/database.sqlite';
}

$pdo = new PDO("sqlite:$db");
$sessionId = $pdo->query("SELECT id FROM mentorship_sessions WHERE mentor_id = (SELECT id FROM users WHERE email='alumni@alumni.test') LIMIT 1")->fetchColumn() ?: '1';
$reportId = $pdo->query("SELECT id FROM reports WHERE status='pending' LIMIT 1")->fetchColumn() ?: '1';

echo json_encode([
    'session_id' => (string)$sessionId,
    'report_id' => (string)$reportId
]);
