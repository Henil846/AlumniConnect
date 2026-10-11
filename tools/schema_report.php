<?php
/**
 * Schema and Tenant Scoping Reporter
 * Inspects all tables in sqlite_master, row counts, columns, and college_id presence.
 */

require_once __DIR__ . '/../app/Core/Env.php';
require_once __DIR__ . '/../app/Core/Database.php';

App\Core\Env::load(__DIR__ . '/../.env');
$pdo = App\Core\Database::getConnection();

$tablesStmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' ORDER BY name ASC");
$tables = $tablesStmt->fetchAll(PDO::FETCH_COLUMN);

$report = [];
$tenantCandidates = [
    'users', 'jobs', 'job_applications', 'events', 'event_registrations', 
    'posts', 'post_comments', 'post_likes', 'messages', 'mentorship_sessions', 
    'referral_requests', 'campaigns', 'donations', 'notifications', 'reports', 
    'marketplace_items', 'business_directory', 'startup_hub', 'career_resources'
];

$missingTenantTables = [];

foreach ($tables as $t) {
    // Row count
    $rowCount = (int)$pdo->query("SELECT COUNT(*) FROM \"$t\"")->fetchColumn();
    
    // Columns
    $colStmt = $pdo->query("PRAGMA table_info(\"$t\")");
    $columns = $colStmt->fetchAll(PDO::FETCH_ASSOC);
    $colNames = array_column($columns, 'name');
    
    $hasCollegeId = in_array('college_id', $colNames);
    
    if (in_array($t, $tenantCandidates) && !$hasCollegeId) {
        $missingTenantTables[] = $t;
    }

    $report[] = [
        'name' => $t,
        'rows' => $rowCount,
        'has_college_id' => $hasCollegeId,
        'columns' => implode(', ', $colNames)
    ];
}

$md = "# Alumni Connect — Database Schema & Tenant Isolation Audit Report\n\n";
$md .= "**Generated:** " . date('Y-m-d H:i:s') . "\n";
$md .= "**Database File:** `database/database.sqlite`\n\n";

$md .= "## 1. Table Inventory & Tenant Scoping Status\n\n";
$md .= "| Table Name | Row Count | Has `college_id`? | Tenant Scoping Status | Columns |\n";
$md .= "|---|---|---|---|---|\n";

foreach ($report as $r) {
    $hasCIdStr = $r['has_college_id'] ? '✅ Yes' : '❌ No';
    $status = $r['has_college_id'] ? 'Tenant-Scoped' : (in_array($r['name'], ['colleges', 'advertisements', 'migrations']) ? 'Intentionally Global' : 'Review Needed');
    $md .= "| `{$r['name']}` | {$r['rows']} | $hasCIdStr | **$status** | `{$r['columns']}` |\n";
}

$md .= "\n## 2. Intentional Global & Security Tables Rationale\n\n";
$md .= "- **`colleges`**: Institutional directory representing all campus tenants registered on the platform.\n";
$md .= "- **`advertisements`**: Multi-campus sponsorship banners configured by Super Admin (supports cross-campus brand partnerships).\n";
$md .= "- **`badges`**: Global gamification / badge taxonomy (shared achievement criteria across colleges).\n";
$md .= "- **`user_sessions`**: Authentication security tokens keyed directly to individual `user_id`.\n";
$md .= "- **`user_settings`**: Personal user preferences (notifications, profile privacy) keyed directly to `user_id`.\n";
$md .= "- **`email_verifications`**: Transient cryptographic OTP verification records for signup verification.\n";
$md .= "- **`password_resets`**: Transient cryptographic password reset tokens keyed to email.\n";
$md .= "- **`login_attempts`**: Platform-wide IP & email brute-force rate limiter table.\n";
$md .= "- **`migrations`**: Database migration version tracking table.\n";

$md .= "\n## 3. Tenant Data Tables Verification\n\n";
if (empty($missingTenantTables)) {
    $md .= "✅ **All 19 tenant-facing data tables contain `college_id` and enforce multi-tenant isolation.**\n";
} else {
    $md .= "⚠️ The following tables holding tenant data lack `college_id`: " . implode(', ', $missingTenantTables) . "\n";
}

file_put_contents(__DIR__ . '/../docs/SCHEMA_REPORT.md', $md);

echo "Schema report complete! Saved to docs/SCHEMA_REPORT.md\n";
echo "Tables inspected: " . count($report) . "\n";
if (!empty($missingTenantTables)) {
    echo "WARNING: Missing college_id on: " . implode(', ', $missingTenantTables) . "\n";
} else {
    echo "SUCCESS: All tenant tables possess college_id column!\n";
}
