<?php
/**
 * Alumni Connect — Database Seeder Wrapper
 * 
 * Invokes the canonical deterministic multi-tenant seeder.
 * 
 * GUARDS:
 * - Blocked if executed in production (APP_ENV=production).
 */

require_once __DIR__ . '/../app/Core/Env.php';
App\Core\Env::load(__DIR__ . '/../.env');

if (getenv('APP_ENV') === 'production' || ($_ENV['APP_ENV'] ?? '') === 'production') {
    fwrite(STDERR, "FATAL: Seed scripts and demo data generation are strictly disabled in production mode (APP_ENV=production).\n");
    exit(1);
}

require __DIR__ . '/seed_demo_accounts.php';
