<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Seed badges if empty
$pdo->exec("INSERT IGNORE INTO badges (id, name, description, icon) VALUES (1, 'Early Adopter', 'Joined the platform early.', '🚀')");
$pdo->exec("INSERT IGNORE INTO badges (id, name, description, icon) VALUES (2, 'Top Contributor', 'Posts frequently in community.', '🌟')");

// Award badge
$stmt = $pdo->prepare("INSERT INTO user_badges (user_id, badge_id) VALUES (?, ?)");
$stmt->execute([1, 1]);

// Verify
$badges = $pdo->query("SELECT * FROM user_badges WHERE user_id = 1 AND badge_id = 1")->fetchAll(PDO::FETCH_ASSOC);

if (count($badges) > 0) {
    echo "\nRewards DB sanity check passed!\n";
} else {
    echo "\nRewards DB sanity check failed!\n";
}
