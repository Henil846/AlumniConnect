<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

// Check Startup Hub
$startup = $pdo->query("SELECT * FROM startups WHERE name='Test Startup'")->fetch(PDO::FETCH_ASSOC);
echo "Startup 'Test Startup' found: " . ($startup ? 'YES' : 'NO') . "\n";

// Check Career Center
$career = $pdo->query("SELECT * FROM career_resources WHERE title='Test Resource'")->fetch(PDO::FETCH_ASSOC);
echo "Career Resource 'Test Resource' found: " . ($career ? 'YES' : 'NO') . "\n";
