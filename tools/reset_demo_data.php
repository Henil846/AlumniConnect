<?php
/**
 * Alumni Connect — Demo Database Reset Utility
 * 
 * Rebuilds a pristine SQLite development database from scratch
 * using schema initialization, migrations, and canonical demo seeders.
 * 
 * GUARDS:
 * - Blocked if executed from web server (CLI execution only).
 * - Blocked if APP_ENV=production.
 */

if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    die("FORBIDDEN: Database reset utility may only be executed via CLI.\n");
}

$projectDir = realpath(__DIR__ . '/..');
require_once $projectDir . '/app/Core/Env.php';
require_once $projectDir . '/app/Core/Database.php';

App\Core\Env::load($projectDir . '/.env');

if (App\Core\Env::get('APP_ENV', 'development') === 'production') {
    fwrite(STDERR, "FATAL: Resetting demo data is strictly disabled in production mode (APP_ENV=production).\n");
    exit(1);
}

echo "========================================================\n";
echo "       ALUMNI CONNECT — RESET DEMO DATABASE            \n";
echo "========================================================\n\n";

$dbPath = $projectDir . '/database/database.sqlite';
$backupPath = $projectDir . '/database/database.sqlite.bak';

// 1. Create safety backup if database exists
if (file_exists($dbPath)) {
    copy($dbPath, $backupPath);
    echo "[1/4] Created safety backup at database/database.sqlite.bak\n";
}

// 2. Remove old sqlite file to guarantee clean state
App\Core\Database::resetConnection();
@unlink($dbPath);
@unlink($dbPath . '-wal');
@unlink($dbPath . '-shm');
echo "[2/4] Removed existing database file.\n";

// Initialize base tables
$pdo = new PDO("sqlite:" . $dbPath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$ddlStatements = [
'CREATE TABLE IF NOT EXISTS "colleges" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "name" varchar(255) NOT NULL,
  "city" varchar(100) NOT NULL,
  "state" varchar(100) NOT NULL,
  "status" VARCHAR(50) DEFAULT "active",
  "plan" VARCHAR(50) DEFAULT "Enterprise",
  "slug" VARCHAR(100),
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "users" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "full_name" VARCHAR(255),
  "email" VARCHAR(255) UNIQUE,
  "password" VARCHAR(255),
  "role" VARCHAR(50),
  "college_id" INTEGER,
  "is_verified" BOOLEAN DEFAULT 1,
  "about_me" TEXT,
  "department" VARCHAR(255),
  "industry" VARCHAR(255),
  "location" VARCHAR(255),
  "linkedin" VARCHAR(255),
  "github" VARCHAR(255),
  "website" VARCHAR(255),
  "skills" TEXT,
  "education" TEXT,
  "projects" TEXT,
  "certifications" TEXT,
  "resume_file" VARCHAR(255),
  "status" VARCHAR(50) DEFAULT "active",
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "events" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "title" varchar(255) NOT NULL,
  "type" varchar(100) NOT NULL,
  "date" datetime NOT NULL,
  "location" varchar(255) NOT NULL,
  "image_url" varchar(255) DEFAULT NULL,
  "description" text,
  "speakers" text,
  "capacity" INTEGER DEFAULT 100,
  "created_by" INTEGER,
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "event_registrations" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "event_id" INTEGER NOT NULL,
  "user_id" INTEGER NOT NULL,
  "college_id" INTEGER NOT NULL,
  "status" VARCHAR(50) DEFAULT "registered",
  "qr_code" VARCHAR(255),
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "event_gallery" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "event_id" INTEGER NOT NULL,
  "file_path" VARCHAR(255) NOT NULL,
  "college_id" INTEGER,
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "jobs" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "title" varchar(255) NOT NULL,
  "company" varchar(255) NOT NULL,
  "location" varchar(255) NOT NULL,
  "industry" varchar(255) NOT NULL,
  "type" varchar(100) NOT NULL,
  "salary_range" varchar(100) DEFAULT NULL,
  "description" text,
  "requirements" text,
  "college_id" INTEGER NOT NULL,
  "status" VARCHAR(50) DEFAULT "active",
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "job_applications" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "job_id" INTEGER NOT NULL,
  "user_id" INTEGER NOT NULL,
  "college_id" INTEGER NOT NULL,
  "status" VARCHAR(50) DEFAULT "applied",
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "mentorship_sessions" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "mentor_id" INTEGER NOT NULL,
  "mentee_id" INTEGER NOT NULL,
  "status" varchar(50) DEFAULT "pending",
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "referral_requests" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "alumni_id" INTEGER NOT NULL,
  "student_id" INTEGER NOT NULL,
  "status" varchar(50) DEFAULT "requested",
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "posts" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER NOT NULL,
  "content" TEXT,
  "image_url" VARCHAR(255),
  "college_id" INTEGER,
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "post_comments" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "post_id" INTEGER NOT NULL,
  "user_id" INTEGER NOT NULL,
  "content" TEXT,
  "college_id" INTEGER,
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "post_likes" (
  "user_id" INTEGER,
  "post_id" INTEGER,
  "college_id" INTEGER,
  PRIMARY KEY ("user_id", "post_id")
)',

'CREATE TABLE IF NOT EXISTS "marketplace_items" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "title" varchar(255) DEFAULT NULL,
  "description" text,
  "price" decimal(10,2) DEFAULT NULL,
  "item_condition" varchar(50) DEFAULT NULL,
  "category" varchar(100) DEFAULT NULL,
  "status" varchar(50) DEFAULT "available",
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "businesses" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "name" varchar(255) DEFAULT NULL,
  "description" text,
  "website" varchar(255) DEFAULT NULL,
  "category" varchar(100) DEFAULT NULL,
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "startups" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "name" varchar(255) DEFAULT NULL,
  "elevator_pitch" text,
  "funding_stage" varchar(100) DEFAULT NULL,
  "website" varchar(255) DEFAULT NULL,
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "career_resources" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "title" varchar(255) DEFAULT NULL,
  "link" varchar(255) DEFAULT NULL,
  "resource_type" varchar(50) DEFAULT NULL,
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "campaigns" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "title" varchar(255) DEFAULT NULL,
  "description" text,
  "goal_amount" decimal(10,2) DEFAULT NULL,
  "raised_amount" decimal(10,2) DEFAULT "0.00",
  "created_by" INTEGER DEFAULT NULL,
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "donations" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "campaign_id" INTEGER DEFAULT NULL,
  "amount" decimal(10,2) DEFAULT NULL,
  "status" varchar(50) DEFAULT "completed",
  "transaction_id" varchar(255) DEFAULT NULL,
  "college_id" INTEGER,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "messages" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "sender_id" INTEGER NOT NULL,
  "receiver_id" INTEGER NOT NULL,
  "content" TEXT,
  "is_read" BOOLEAN DEFAULT 0,
  "college_id" INTEGER,
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "notifications" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "type" varchar(50) DEFAULT NULL,
  "message" text,
  "is_read" tinyINTEGER DEFAULT 0,
  "link" VARCHAR(255) DEFAULT "",
  "college_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "reports" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "reporter_id" INTEGER DEFAULT NULL,
  "reported_item_type" varchar(50) DEFAULT NULL,
  "reported_item_id" INTEGER DEFAULT NULL,
  "reason" text,
  "status" varchar(50) DEFAULT "pending",
  "college_id" INTEGER,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "advertisements" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "sponsor_name" VARCHAR(255) NOT NULL,
  "image_url" VARCHAR(255),
  "link_url" VARCHAR(255),
  "status" VARCHAR(50) DEFAULT "active",
  "college_id" INTEGER,
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "page_views" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "page_url" varchar(255) DEFAULT NULL,
  "user_id" INTEGER DEFAULT NULL,
  "college_id" INTEGER,
  "viewed_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "login_attempts" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "email" varchar(255) NOT NULL,
  "ip_address" varchar(45) NOT NULL,
  "attempt_time" timestamp NULL DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "user_sessions" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER NOT NULL,
  "refresh_token" VARCHAR(255) NOT NULL UNIQUE,
  "expires_at" TIMESTAMP NOT NULL,
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "email_verifications" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER NOT NULL,
  "otp" VARCHAR(10) NOT NULL,
  "expires_at" TIMESTAMP NOT NULL
)',

'CREATE TABLE IF NOT EXISTS "password_resets" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "email" VARCHAR(255) NOT NULL,
  "token" VARCHAR(255) NOT NULL UNIQUE,
  "expires_at" TIMESTAMP NOT NULL,
  "used" BOOLEAN DEFAULT 0,
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "user_settings" (
  "user_id" INTEGER PRIMARY KEY,
  "email_notifications" BOOLEAN DEFAULT 1,
  "profile_visibility" VARCHAR(50) DEFAULT "public",
  "college_id" INTEGER,
  "updated_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "badges" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "name" VARCHAR(255) NOT NULL,
  "description" TEXT,
  "icon" VARCHAR(100),
  "points" INTEGER DEFAULT 10,
  "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)',

'CREATE TABLE IF NOT EXISTS "user_badges" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER NOT NULL,
  "badge_id" INTEGER NOT NULL,
  "college_id" INTEGER,
  "awarded_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)'
];

foreach ($ddlStatements as $stmt) {
    $pdo->exec($stmt);
}

// 4. Run canonical demo seeder
echo "[4/4] Seeding canonical demo accounts and multi-campus dataset...\n";
require $projectDir . '/database/seed_demo_accounts.php';

echo "\nSUCCESS: Demo database cleanly rebuilt at database/database.sqlite!\n";
