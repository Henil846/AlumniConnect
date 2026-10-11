# Historical & Legacy Scripts Archive

> **NOTICE:** The scripts in this directory (`tools/legacy/`) are historical one-off development, scratch, diagnostic, and early migration scripts created during preliminary development iterations.
>
> - **Status:** DEPRECATED & UNSUPPORTED.
> - **Production Readiness:** NOT part of the runtime application.
> - **Security:** All scripts in this directory are strictly guarded with `php_sapi_name() === 'cli'` checks and are located completely outside the web server document root (`public/`).
> - **Official Test Suite:** All functional, integration, role, security, and multi-tenant testing is officially maintained and executed via `tests/e2e_flows.php` and `tools/browser_smoke.js`.
> - **Official Database Seeding:** Clean database initialization and deterministic multi-campus demo data generation are officially handled by `database/seed_demo_accounts.php` and `tools/reset_demo_data.php`.
