<?php
require 'app/Core/Database.php';
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');

$pdo = App\Core\Database::getConnection();

$tablesToIsolate = [
    'jobs' => ['owner_col' => null],
    'events' => ['owner_col' => null],
    'posts' => ['owner_col' => 'user_id'],
    'messages' => ['owner_col' => 'sender_id'],
    'marketplace_items' => ['owner_col' => 'user_id'],
    'businesses' => ['owner_col' => 'user_id'],
    'startups' => ['owner_col' => 'user_id'],
    'campaigns' => ['owner_col' => 'created_by'],
    'career_resources' => ['owner_col' => null],
    'notifications' => ['owner_col' => 'user_id'],
    'event_registrations' => ['owner_col' => 'user_id'],
    'mentorship_sessions' => ['owner_col' => 'mentor_id'],
    'referral_requests' => ['owner_col' => 'student_id']
];

foreach ($tablesToIsolate as $table => $config) {
    echo "Processing $table...\n";
    // Check if college_id exists
    $cols = $pdo->query("SHOW COLUMNS FROM $table LIKE 'college_id'")->fetchAll();
    if (empty($cols)) {
        echo "  Adding college_id to $table...\n";
        $pdo->exec("ALTER TABLE $table ADD COLUMN college_id INT NULL");
    }

    // Backfill
    if ($config['owner_col']) {
        $ownerCol = $config['owner_col'];
        $pdo->exec("
            UPDATE $table t
            JOIN users u ON t.$ownerCol = u.id
            SET t.college_id = u.college_id
            WHERE t.college_id IS NULL
        ");
        echo "  Backfilled $table from users table using $ownerCol.\n";
    } else {
        // Global seeded data with no owner, default to college_id = 1
        $pdo->exec("UPDATE $table SET college_id = 1 WHERE college_id IS NULL");
        echo "  Backfilled $table with default college_id = 1.\n";
    }

    // Make NOT NULL (first ensure no nulls exist)
    $pdo->exec("UPDATE $table SET college_id = 1 WHERE college_id IS NULL");
    // SQLite uses different syntax, but we are using MySQL.
    try {
        $pdo->exec("ALTER TABLE $table MODIFY COLUMN college_id INT NOT NULL");
        echo "  Made college_id NOT NULL.\n";
    } catch (\PDOException $e) {
        echo "  Failed to make NOT NULL (maybe foreign key constraints): " . $e->getMessage() . "\n";
    }
}
echo "Migration complete.\n";
