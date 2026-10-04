<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();
$regs = $pdo->query("SELECT * FROM event_registrations")->fetchAll(PDO::FETCH_ASSOC);
echo "Event Registrations count: " . count($regs) . "\n";
print_r($regs);
