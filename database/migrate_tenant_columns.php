<?php
require_once __DIR__ . '/../app/Core/Env.php';
require_once __DIR__ . '/../app/Core/Database.php';

App\Core\Env::load(__DIR__ . '/../.env');
$pdo = App\Core\Database::getConnection();

function hasColumn(PDO $pdo, string $table, string $column): bool {
    $cols = $pdo->query("PRAGMA table_info($table)")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cols as $c) {
        if (strtolower($c['name']) === strtolower($column)) {
            return true;
        }
    }
    return false;
}

echo "=== Running Database Tenant Columns Migration ===\n";

// 1. Messages table
if (!hasColumn($pdo, 'messages', 'college_id')) {
    echo "Adding college_id to messages...\n";
    $pdo->exec("ALTER TABLE messages ADD COLUMN college_id INTEGER");
    // Backfill college_id from sender
    $pdo->exec("UPDATE messages SET college_id = (SELECT college_id FROM users WHERE users.id = messages.sender_id) WHERE college_id IS NULL");
} else {
    echo "messages already has college_id.\n";
}

// 2. Donations table
if (!hasColumn($pdo, 'donations', 'college_id')) {
    echo "Adding college_id to donations...\n";
    $pdo->exec("ALTER TABLE donations ADD COLUMN college_id INTEGER");
    // Backfill from campaigns or users
    $pdo->exec("UPDATE donations SET college_id = (SELECT college_id FROM campaigns WHERE campaigns.id = donations.campaign_id) WHERE college_id IS NULL");
    $pdo->exec("UPDATE donations SET college_id = (SELECT college_id FROM users WHERE users.id = donations.user_id) WHERE college_id IS NULL");
} else {
    echo "donations already has college_id.\n";
}

// 3. Reports table
if (!hasColumn($pdo, 'reports', 'college_id')) {
    echo "Adding college_id to reports...\n";
    $pdo->exec("ALTER TABLE reports ADD COLUMN college_id INTEGER");
    $pdo->exec("UPDATE reports SET college_id = (SELECT college_id FROM users WHERE users.id = reports.reporter_id) WHERE college_id IS NULL");
} else {
    echo "reports already has college_id.\n";
}

// 4. Page views table
if (!hasColumn($pdo, 'page_views', 'college_id')) {
    echo "Adding college_id to page_views...\n";
    $pdo->exec("ALTER TABLE page_views ADD COLUMN college_id INTEGER");
    $pdo->exec("UPDATE page_views SET college_id = (SELECT college_id FROM users WHERE users.id = page_views.user_id) WHERE college_id IS NULL");
} else {
    echo "page_views already has college_id.\n";
}

// 5. Advertisements table
if (!hasColumn($pdo, 'advertisements', 'college_id')) {
    echo "Adding college_id to advertisements...\n";
    $pdo->exec("ALTER TABLE advertisements ADD COLUMN college_id INTEGER");
} else {
    echo "advertisements already has college_id.\n";
}

// 6. Colleges table status and plan
if (!hasColumn($pdo, 'colleges', 'status')) {
    echo "Adding status to colleges...\n";
    $pdo->exec("ALTER TABLE colleges ADD COLUMN status VARCHAR(50) DEFAULT 'active'");
    $pdo->exec("UPDATE colleges SET status = 'active' WHERE status IS NULL");
} else {
    echo "colleges already has status.\n";
}

if (!hasColumn($pdo, 'colleges', 'plan')) {
    echo "Adding plan to colleges...\n";
    $pdo->exec("ALTER TABLE colleges ADD COLUMN plan VARCHAR(50) DEFAULT 'Enterprise'");
    $pdo->exec("UPDATE colleges SET plan = 'Enterprise' WHERE plan IS NULL");
} else {
    echo "colleges already has plan.\n";
}

if (!hasColumn($pdo, 'colleges', 'slug')) {
    echo "Adding slug to colleges...\n";
    $pdo->exec("ALTER TABLE colleges ADD COLUMN slug VARCHAR(100)");
    $colleges = $pdo->query("SELECT id, name FROM colleges")->fetchAll(PDO::FETCH_ASSOC);
    $upStmt = $pdo->prepare("UPDATE colleges SET slug = ? WHERE id = ?");
    foreach ($colleges as $c) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $c['name']), '-'));
        $upStmt->execute([$slug, $c['id']]);
    }
} else {
    echo "colleges already has slug.\n";
}

// 7. Jobs table status
if (!hasColumn($pdo, 'jobs', 'status')) {
    echo "Adding status to jobs...\n";
    $pdo->exec("ALTER TABLE jobs ADD COLUMN status VARCHAR(50) DEFAULT 'active'");
    $pdo->exec("UPDATE jobs SET status = 'active' WHERE status IS NULL");
} else {
    echo "jobs already has status.\n";
}

// 8. Users table status
if (!hasColumn($pdo, 'users', 'status')) {
    echo "Adding status to users...\n";
    $pdo->exec("ALTER TABLE users ADD COLUMN status VARCHAR(50) DEFAULT 'active'");
    $pdo->exec("UPDATE users SET status = 'active' WHERE status IS NULL");
} else {
    echo "users already has status.\n";
}

// 9. post_comments table
if (!hasColumn($pdo, 'post_comments', 'college_id')) {
    echo "Adding college_id to post_comments...\n";
    $pdo->exec("ALTER TABLE post_comments ADD COLUMN college_id INTEGER");
    $pdo->exec("UPDATE post_comments SET college_id = (SELECT college_id FROM posts WHERE posts.id = post_comments.post_id) WHERE college_id IS NULL");
} else {
    echo "post_comments already has college_id.\n";
}

// 10. post_likes table
if (!hasColumn($pdo, 'post_likes', 'college_id')) {
    echo "Adding college_id to post_likes...\n";
    $pdo->exec("ALTER TABLE post_likes ADD COLUMN college_id INTEGER");
    $pdo->exec("UPDATE post_likes SET college_id = (SELECT college_id FROM posts WHERE posts.id = post_likes.post_id) WHERE college_id IS NULL");
} else {
    echo "post_likes already has college_id.\n";
}

// 11. event_gallery table
if (!hasColumn($pdo, 'event_gallery', 'college_id')) {
    echo "Adding college_id to event_gallery...\n";
    $pdo->exec("ALTER TABLE event_gallery ADD COLUMN college_id INTEGER");
    $pdo->exec("UPDATE event_gallery SET college_id = (SELECT college_id FROM events WHERE events.id = event_gallery.event_id) WHERE college_id IS NULL");
} else {
    echo "event_gallery already has college_id.\n";
}

// 12. user_badges table
if (!hasColumn($pdo, 'user_badges', 'college_id')) {
    echo "Adding college_id to user_badges...\n";
    $pdo->exec("ALTER TABLE user_badges ADD COLUMN college_id INTEGER");
    $pdo->exec("UPDATE user_badges SET college_id = (SELECT college_id FROM users WHERE users.id = user_badges.user_id) WHERE college_id IS NULL");
} else {
    echo "user_badges already has college_id.\n";
}

// 13. notifications link column
if (!hasColumn($pdo, 'notifications', 'link')) {
    echo "Adding link to notifications...\n";
    $pdo->exec("ALTER TABLE notifications ADD COLUMN link VARCHAR(255) DEFAULT ''");
    $pdo->exec("UPDATE notifications SET link = CASE 
        WHEN type LIKE 'mentorship%' THEN '/mentorship'
        WHEN type LIKE 'job%' THEN '/jobs'
        WHEN type = 'referral' THEN '/manage-referrals'
        WHEN type = 'referral_update' THEN '/referral-request'
        WHEN type = 'donation' THEN '/donations'
        WHEN type = 'moderation' THEN '/community'
        WHEN type LIKE 'event%' THEN '/events'
        WHEN type = 'message' THEN '/messages'
        ELSE '/dashboard'
    END WHERE link IS NULL OR link = ''");
} else {
    echo "notifications already has link.\n";
}

echo "Migration finished successfully.\n";

