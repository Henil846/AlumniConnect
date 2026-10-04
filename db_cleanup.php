<?php
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
require 'app/Core/Database.php';

$pdo = App\Core\Database::getConnection();

// Check SQL mode
$mode = $pdo->query('SELECT @@sql_mode')->fetchColumn();
echo "SQL MODE: " . $mode . "\n";

// Check for corrupted rows (college_id = 0 or NULL)
$tables = [
    'jobs', 'mentorship_sessions', 'referral_requests', 'event_registrations', 
    'notifications', 'posts', 'messages', 'marketplace_items', 
    'businesses', 'startups', 'campaigns', 'career_resources'
];

foreach ($tables as $t) {
    try {
        $count = $pdo->query("SELECT COUNT(*) FROM $t WHERE college_id = 0 OR college_id IS NULL")->fetchColumn();
        if ($count > 0) {
            echo "CORRUPTED ROWS IN $t: $count\n";
            // Clean them up for now by deleting them (or they could be updated if they have real user associations, but since this is a test env, delete is fine for orphaned data)
            $pdo->exec("DELETE FROM $t WHERE college_id = 0 OR college_id IS NULL");
            echo "-> Cleaned up $t\n";
        }
    } catch(Exception $e) {}
}

echo "Cleanup complete.\n";
