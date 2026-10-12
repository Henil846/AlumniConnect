<?php
require_once __DIR__ . '/../app/Core/Env.php';
require_once __DIR__ . '/../app/Core/Database.php';

App\Core\Env::load(__DIR__ . '/../.env');
$pdo = App\Core\Database::getConnection();

$pdo->exec("CREATE TABLE IF NOT EXISTS audit_log (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    event_type TEXT NOT NULL,
    actor_id INTEGER,
    actor_email TEXT,
    ip_address TEXT,
    details TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Insert initial demo seed records if table is empty
$count = (int)$pdo->query("SELECT COUNT(*) FROM audit_log")->fetchColumn();
if ($count === 0) {
    $stmt = $pdo->prepare("INSERT INTO audit_log (event_type, actor_id, actor_email, ip_address, details, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute(['user_login', 1, 'superadmin@alumni.test', '127.0.0.1', 'Super admin authenticated from admin console', date('Y-m-d H:i:s', strtotime('-2 hours'))]);
    $stmt->execute(['user_login', 2, 'admin@alumni.test', '127.0.0.1', 'College admin authenticated for IIT Bombay', date('Y-m-d H:i:s', strtotime('-1 hour'))]);
    $stmt->execute(['tier_updated', 1, 'superadmin@alumni.test', '127.0.0.1', 'Institution tier changed: IIT Bombay updated to Enterprise plan', date('Y-m-d H:i:s', strtotime('-45 minutes'))]);
    $stmt->execute(['user_status_updated', 1, 'superadmin@alumni.test', '127.0.0.1', 'User account verified and activated', date('Y-m-d H:i:s', strtotime('-30 minutes'))]);
    $stmt->execute(['login_failed', null, 'attacker@unknown.test', '192.168.1.105', 'Invalid password attempt detected', date('Y-m-d H:i:s', strtotime('-15 minutes'))]);
}
echo "audit_log table initialized successfully. Total rows: " . $pdo->query("SELECT COUNT(*) FROM audit_log")->fetchColumn() . "\n";
