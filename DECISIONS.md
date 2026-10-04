# Architecture and Decision Log

## Application Structure
- **Backend:** Raw PHP with a custom router (no framework like Laravel, per the scaffolding plan implied by the setup).
- **Architecture:** MVC Pattern (Models, Views, Controllers) with Repositories and Services.
- **Frontend:** Server-side rendered PHP views using layout and partial abstractions. HTML structure is ported directly from the original static `.html` files.

## Environment & Localization
- **Database:** Switched from SQLite to MySQL via PDO. This was necessary to support multi-tenant row scoping, FULLTEXT search (for Alumni directory), and concurrent writes (for chat/notifications) in the future.
  - **Connection Details:** Connected to a standalone background MySQL instance already running on port 3306 (user `root`, password `Admin@1234`), as XAMPP's MariaDB was failing to start due to port conflict.
- **Data Initialization:** Seeders must use Indian demo data (Indian colleges, companies, names).
- **Currency:** All financial operations must use INR natively.

## Implementation Strategy
- **End-to-End Module Focus:** Instead of building horizontal slices (e.g. all services, then all controllers), features will be built vertically module-by-module. This ensures that every layer (DB -> Model -> Repository -> Service -> Controller -> View) works fully for a given feature before moving on.

## Security & Hardening
- **Tenant Isolation:** Enforced natively via `college_id` foreign keys on all data tables (jobs, events, posts, users, campaigns, marketplace, etc). Write-path controllers verify college ownership before executing POST mutations to prevent IDOR attacks across colleges.
- **Payment Sandbox Limitation & Webhook Security:** A custom simulated `SandboxGateway` flow was created with a basic HMAC signature check appended to the checkout URL (`/payment/checkout?txn_id=...&sig=...`). This successfully prevents a user from forging a payment completion for a transaction they don't own by directly POSTing to `/payment/callback`. 
**CRITICAL LIMITATION**: This sandbox HMAC pattern does *not* prevent a user from self-approving their *own* pending transaction. Because the checkout redirect exposes the valid signature to the client's browser to power the mock UI, a user can grab that signature and submit a `status=success` directly. When real Razorpay/Stripe keys are implemented in the future, the integration **MUST** use the provider's official server-to-server webhook verification. The provider computes and sends a signature header using a secret that is never exposed to the client, preventing all forgery (including self-approval). The current sandbox pattern is strictly a placeholder for testing UI flows.
