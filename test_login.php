<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'app/Core/Env.php';
App\Core\Env::load('.env');
require 'app/Core/Database.php';

require 'app/Models/User.php';
require 'app/Repositories/UserRepository.php';

$repo = new App\Repositories\UserRepository();

$ip = '127.0.0.1';
$email = 'alumni@example.com';

echo "Checking rate limit...\n";
if ($repo->checkRateLimit($email, $ip)) {
    echo "Rate limited!\n";
}

echo "Finding by email...\n";
$user = $repo->findByEmail($email);
if (!$user) {
    echo "User not found.\n";
} else {
    echo "User found: " . $user->full_name . "\n";
}

echo "Clearing login attempts...\n";
$repo->clearLoginAttempts($email);

echo "Creating session...\n";
try {
    $repo->createSession($user->id, 'dummy_token_123');
    echo "Session created.\n";
} catch (Exception $e) {
    echo "Error creating session: " . $e->getMessage() . "\n";
}
