<?php
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("CLI only\n");
}

require 'vendor/autoload.php';
require 'app/Core/Database.php';
$pdo = App\Core\Database::getConnection();
$hash = password_hash('BrowserPass123!', PASSWORD_DEFAULT);
$pdo->exec("INSERT INTO users (full_name, email, password, role, college_id, is_verified) VALUES ('Browser Test', 'browser@example.com', '$hash', 'alumni', 1, 1)");
echo "User created.\n";
