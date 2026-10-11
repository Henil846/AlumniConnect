<?php
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("CLI only\n");
}

$pdo = new PDO('sqlite:database/database.sqlite');
print_r($pdo->query('PRAGMA table_info(users)')->fetchAll(PDO::FETCH_ASSOC));
print_r($pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC));
