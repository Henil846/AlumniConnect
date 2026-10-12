# Alumni Connect — Complete Project Architecture & Feature Specification Master Document

> **Document Purpose**: This comprehensive specification serves as the complete technical source of truth for the **Alumni Connect** enterprise web platform. It is engineered to give any AI assistant or human software architect an exhaustive understanding of the system's design, multi-tenant database structure, strict RBAC security model, end-to-end features, test automation suite, and operational guidelines.

---

## 1. Executive Summary & Project Purpose

**Alumni Connect** is a multi-tenant institutional alumni engagement and collegiate network platform built in PHP. It bridges collegiate ecosystems by providing dedicated, role-tailored portals for **Students**, **Alumni**, **College Administrators**, and **Super Administrators**. 

The platform supports collegiate communication, professional mentorship, career advancement, event ticketing with QR verification, campus crowdfunding/donations with payment gateway emulation, peer-to-peer campus marketplace, startup venture incubation, and cross-institutional governance.

### Core Value Propositions
1. **Multi-Tenancy with Complete Tenant Isolation**: Multiple colleges operate within the same platform instance with strict data segregation enforced at the database and application levels.
2. **Deterministic Role-Based Access Control (RBAC)**: Fine-grained permissions separating Students, Alumni, College Admins, and Super Admins.
3. **No Heavy External Framework Overhead**: Pure PHP 8.0 MVC architecture coupled with Vanilla CSS, zero reliance on bloated runtime dependencies, and high-performance server-side rendering.
4. **Resilient Testing & Quality Assurance**: 100% PHP syntax linting, automated crawler inventory checking across 2,599 interactive elements (0 defects), a 308-assertion E2E test suite, and a 142-step real browser Playwright automation suite.

---

## 2. Technology Stack & Runtime Architecture

| Layer | Technology | Details & Versions |
| :--- | :--- | :--- |
| **Backend Runtime** | PHP 8.0+ (Tested on PHP 8.0.30 CLI) | Clean Architecture MVC, strict typing, PDO abstraction, zero framework bloat |
| **Database Engine** | SQLite (Production/Dev default: `database/database.sqlite`) & MySQL compatible | Foreign key constraints, indexed tenant columns (`college_id`), deterministic seeds |
| **Frontend & Styling** | Semantic HTML5 & Vanilla Modern CSS | CSS custom properties, responsive flexbox/grid layouts, mobile-first design, dark/light accents |
| **Client Scripting** | Vanilla JavaScript (ES6+) | Asynchronous fetch requests, modal lifecycle, QR code scanning, feed interactions |
| **Testing & CI/CD** | Node.js v20+, Playwright, Custom PHP Test Harness | Headless Chromium, DOM click emulation, database state validation, screenshot audits |
| **Web Server** | PHP Built-in Development Server / Apache / Nginx | Routing handled via single front controller (`public/index.php`) |

---

## 3. Directory Tree & Architecture Overview

```
Alumni-Connect-master/
├── app/
│   ├── Controllers/          # 26 Clean Controllers handling HTTP requests & business logic
│   │   ├── AdminController.php         # College Admin portal (users, moderation, analytics)
│   │   ├── AdsController.php           # Collegiate sponsored ads
│   │   ├── AuthController.php          # Login, signup, OTP, reset password, logout
│   │   ├── BusinessController.php     # Alumni business directory
│   │   ├── CareerCenterController.php # Career prep & resources
│   │   ├── CommunityController.php    # Feed posts, comments, likes, reporting
│   │   ├── DashboardController.php    # Role-tailored dashboard aggregations
│   │   ├── DirectoryController.php    # Member directory & multifaceted search
│   │   ├── DonationsController.php    # Fundraising campaigns & sandbox checkout
│   │   ├── EventsAdminController.php  # Campus event creation & QR check-in
│   │   ├── EventsController.php       # Event listings, RSVP, galleries
│   │   ├── JobsController.php         # Job board, posting, and applicant submissions
│   │   ├── LegalController.php        # Privacy policy & terms
│   │   ├── MarketplaceController.php  # P2P buy/sell student marketplace
│   │   ├── MentorshipController.php   # Mentorship matching & session lifecycle
│   │   ├── MessagesController.php     # Direct peer messaging & threads
│   │   ├── NotificationsController.php# System notifications & dispatch
│   │   ├── ProfileController.php      # User profiles, portfolio, resumes
│   │   ├── ReferralsController.php    # Alumni job referral requests & tracking
│   │   ├── RewardsController.php      # Badges, points, and leaderboards
│   │   ├── SearchController.php       # Global search
│   │   ├── SettingsController.php     # Notification preferences & visibility
│   │   ├── StartupHubController.php   # Student/alumni startup venture showcase
│   │   └── SuperAdminController.php   # Platform governance, colleges, ads, revenue CSV
│   ├── Core/                 # Core Framework Abstractions
│   │   ├── App.php                     # Application bootstrap & lifecycle
│   │   ├── Database.php                # PDO singleton connection manager
│   │   ├── Env.php                     # Dotenv environment variable parser
│   │   ├── Request.php                 # HTTP request wrapper & parameter sanitization
│   │   ├── Response.php                # JSON & HTTP status response helper
│   │   ├── Router.php                  # Expressive regex router (GET, POST)
│   │   └── View.php                    # Server-side view renderer with layout composition
│   ├── Middleware/           # Request Pipeline Guards
│   │   ├── AuthMiddleware.php          # Session validation & role authorization gates
│   │   └── RateLimitMiddleware.php     # IP/Session brute-force throttling
│   ├── Models/               # Domain data entities
│   ├── Repositories/         # Database persistence layers
│   ├── Services/             # Specialized business services (Mailer, QR generator)
│   └── Validators/           # Input validation rules
├── database/                 # Database Schema & Seeders
│   ├── database.sqlite       # Canonical multi-tenant SQLite database
│   ├── test.sqlite           # Isolated test database used by CI & Playwright
│   ├── schema.sql            # Base SQL schema definition
│   ├── seed_demo_accounts.php# Deterministic 46-user seeder across 4 colleges
│   └── migrate_tenant_columns.php # Schema migration & tenant column enforcer
├── docs/                     # Comprehensive Project Documentation
│   ├── AUDIT_REPORT.md       # Audit history & defect clearance verification
│   ├── INVENTORY.md          # Complete element audit ledger (2,599 elements)
│   └── screenshots/          # Playwright smoke test visual proof captures
├── public/                   # Public Document Root
│   ├── index.php             # Front Controller entrypoint
│   └── assets/               # CSS, JS, dynamic icons, avatars
├── resources/
│   └── views/                # View Templates
│       ├── layouts/          # Layout wrappers
│       │   ├── app.php                 # Main responsive layout (Student/Alumni/College Admin)
│       │   ├── auth.php                # Clean standalone authentication layout
│       │   └── super-admin.php         # Dedicated Super Admin management dashboard
│       └── pages/            # Role and feature view files (23 core pages)
│           ├── admin/                  # College Admin subviews (dashboard, users, moderation, etc.)
│           ├── auth/                   # Login, signup, verify, forgot-password
│           ├── errors/                 # 403 Forbidden, 404 Not Found, 500 Server Error
│           └── super-admin/            # Super Admin subviews (institutions, users, ads, security, etc.)
├── routes/
│   └── web.php               # Canonical application route definitions
├── tests/
│   └── e2e_flows.php         # 308-assertion E2E test runner (RBAC, isolation, DB state)
└── tools/
    ├── audit_inventory.php   # Route crawler & interactive element validator
    ├── browser_smoke.js      # 142-interaction Playwright real browser automation
    ├── lint_all.php          # Syntax validator covering all 189 PHP files
    └── query_test_db.php     # Headless database state assertion CLI
```

---

## 4. Multi-Tenant Architecture & Database Schema

The platform implements a **shared-database, shared-schema multi-tenant model** where all collegiate data is partitioned by `college_id`.

### The 30 Core Database Tables

1. `colleges`: Educational institutions (`id`, `name`, `city`, `state`, `status`, `plan`, `slug`, `created_at`). Plans: `Starter`, `Growth`, `Enterprise`.
2. `users`: Unified identity records (`id`, `full_name`, `email`, `password`, `role`, `college_id`, `is_verified`, `about_me`, `department`, `industry`, `location`, `linkedin`, `github`, `website`, `skills`, `education`, `projects`, `certifications`, `resume_file`, `status`, `created_at`). Roles: `student`, `alumni`, `college_admin`, `super_admin`. Statuses: `active`, `suspended`, `pending`.
3. `email_verifications`: OTP codes for registration verification (`id`, `user_id`, `otp`, `expires_at`).
4. `user_sessions`: Persistent session tokens and device identification (`id`, `user_id`, `refresh_token`, `expires_at`, `created_at`).
5. `password_resets`: Password recovery tokens (`id`, `email`, `token`, `expires_at`, `used`, `created_at`).
6. `login_attempts`: Brute-force protection tracking (`id`, `email`, `ip_address`, `action`, `attempt_time`).
7. `user_settings`: User privacy and notification preferences (`user_id`, `email_notifications`, `profile_visibility`, `college_id`, `updated_at`).
8. `badges`: Gamification badge catalog (`id`, `name`, `description`, `icon`, `points`, `created_at`).
9. `user_badges`: Awarded badges (`id`, `user_id`, `badge_id`, `college_id`, `awarded_at`).
10. `jobs`: Employment and internship postings (`id`, `title`, `company`, `location`, `industry`, `type`, `salary_range`, `description`, `requirements`, `college_id`, `status`, `created_at`).
11. `job_applications`: Job submissions (`id`, `job_id`, `user_id`, `college_id`, `status`, `created_at`).
12. `mentorship_sessions`: Mentorship bookings (`id`, `mentor_id`, `mentee_id`, `status`, `college_id`, `created_at`). Statuses: `pending`, `accepted`, `completed`, `cancelled`.
13. `events`: Campus events (`id`, `title`, `type`, `date`, `location`, `image_url`, `description`, `speakers`, `capacity`, `created_by`, `college_id`, `created_at`).
14. `event_registrations`: Attendee RSVPs and QR tokens (`id`, `event_id`, `user_id`, `college_id`, `status`, `qr_code`, `created_at`). Statuses: `confirmed`, `attended`, `cancelled`.
15. `event_gallery`: Post-event image memories (`id`, `event_id`, `file_path`, `college_id`, `created_at`).
16. `posts`: Campus community feed posts (`id`, `user_id`, `content`, `image_url`, `college_id`, `created_at`).
17. `post_comments`: Discussion comments on feed posts (`id`, `post_id`, `user_id`, `content`, `college_id`, `created_at`).
18. `post_likes`: Social likes on feed posts (`user_id`, `post_id`, `college_id`).
19. `messages`: Direct peer messaging (`id`, `sender_id`, `receiver_id`, `content`, `is_read`, `college_id`, `created_at`).
20. `referral_requests`: Alumni job referrals (`id`, `alumni_id`, `student_id`, `status`, `college_id`, `created_at`). Statuses: `requested`, `reviewed`, `submitted`, `rejected`.
21. `campaigns`: College fundraising campaigns (`id`, `title`, `description`, `goal_amount`, `raised_amount`, `created_by`, `college_id`, `created_at`).
22. `donations`: Financial donation contributions (`id`, `user_id`, `campaign_id`, `amount`, `status`, `transaction_id`, `college_id`, `created_at`).
23. `marketplace_items`: Peer-to-peer campus marketplace (`id`, `user_id`, `title`, `description`, `price`, `item_condition`, `category`, `status`, `college_id`, `created_at`).
24. `businesses`: Alumni-owned enterprise directory (`id`, `user_id`, `name`, `description`, `website`, `category`, `college_id`, `created_at`).
25. `startups`: Collegiate startup ventures (`id`, `user_id`, `name`, `elevator_pitch`, `funding_stage`, `website`, `college_id`, `created_at`).
26. `career_resources`: Curated career guides and resume templates (`id`, `title`, `link`, `resource_type`, `college_id`, `created_at`).
27. `reports`: Content moderation flag queue (`id`, `reporter_id`, `reported_item_type`, `reported_item_id`, `reason`, `status`, `college_id`, `created_at`). Statuses: `pending`, `resolved`, `dismissed`.
28. `advertisements`: Sponsored display banners (`id`, `sponsor_name`, `image_url`, `link_url`, `status`, `college_id`, `created_at`). Statuses: `active`, `disabled`.
29. `notifications`: Actionable in-app alerts (`id`, `user_id`, `type`, `message`, `is_read`, `link`, `college_id`, `created_at`).
30. `page_views`: Analytics telemetry tracking (`id`, `page_url`, `user_id`, `college_id`, `viewed_at`).

---

## 5. Authentication, Security & RBAC Specification

### Role-Based Access Control (RBAC) Matrix

| Route Pattern / Feature | Guest | Student | Alumni | College Admin | Super Admin |
| :--- | :---: | :---: | :---: | :---: | :---: |
| **`/login`, `/signup`, `/verify`, `/forgot-password`** | Allowed | Redirect | Redirect | Redirect | Redirect |
| **`/dashboard`, `/profile`, `/directory`, `/settings`** | 302 Login | Allowed | Allowed | Allowed | Allowed |
| **`/jobs` (View & Filter)** | 302 Login | Allowed | Allowed | Allowed | Allowed |
| **`POST /jobs/apply`** | 302 Login | Allowed | 403 Forbidden | 403 Forbidden | 403 Forbidden |
| **`POST /jobs/create`** | 302 Login | **403 Forbidden** | Allowed | Allowed | Allowed |
| **`/mentorship` (Browse & Request)** | 302 Login | Allowed | Allowed | Allowed | Allowed |
| **`POST /mentorship/update-status` (Accept)** | 302 Login | 403 Forbidden | Allowed | 403 Forbidden | 403 Forbidden |
| **`/events` (RSVP)** | 302 Login | Allowed | Allowed | Allowed | Allowed |
| **`/events-admin` & `/events-admin/*`** | 302 Login | **403 Forbidden** | **403 Forbidden** | Allowed | Allowed |
| **`/admin/*` (`dashboard`, `users`, `moderation`, `payments`)** | 302 Login | **403 Forbidden** | **403 Forbidden** | Allowed (own college) | Allowed |
| **`/super-admin/*` (`dashboard`, `institutions`, `colleges`, `users`, `ads`, `revenue`)** | 302 Login | **403 Forbidden** | **403 Forbidden** | **403 Forbidden** | Allowed |

### Security Measures
- **Password Security**: Bcrypt algorithm with cost factor 12 (`PASSWORD_BCRYPT`).
- **OTP Email Verification**: Deterministic 6-digit cryptographic token with 15-minute expiration time.
- **CSRF Token Guard**: Embedded hidden CSRF input tokens validated across all mutating HTTP POST endpoints.
- **Cross-Tenant Guard**: College Admins cannot query or modify users, events, or campaigns belonging to a different `college_id` (enforces HTTP 403).
- **Session Security**: Session tokens stored with `HttpOnly`, `SameSite=Lax`, and regenerates ID upon privilege escalation.
- **Zero Static People Artifacts**: In-app avatars dynamically render user initials (e.g., `<div class="avatar-initials">AB</div>`) or uploaded photos; zero hardcoded mock names or images in authenticated pages.

---

## 6. Comprehensive Feature Catalog

### A. Public & Guest Portal
- **Landing Page (`/`)**: Institutional landing page showcasing collegiate achievements, upcoming events, alumni spotlights, and call-to-actions.
- **Authentication (`/login`, `/signup`)**: Multi-step registration allowing users to select their university, degree department, and initial role.
- **OTP Verification (`/verify`)**: Account activation gate requiring email code verification before platform access.
- **Password Recovery (`/forgot-password`, `/reset-password`)**: Self-service secure email token reset flow.

### B. Student & Alumni Shared Ecosystem
- **Institutional Dashboard (`/dashboard`)**: Central hub displaying quick actions, pending mentorship requests, upcoming campus events, recent jobs, and collegiate notifications.
- **Dynamic Profile & Portfolio (`/profile`, `/profile/{id}`)**: Detailed personal profile with skills tags, work history, education records, project links, certifications, and PDF resume upload.
- **Alumni Directory (`/directory`)**: Searchable collegiate Rolodex with filters for graduation batch, industry, company, and department.
- **Mentorship Hub (`/mentorship`)**: 1-on-1 career guidance system. Students can request sessions; Alumni can accept or decline requests and set availability topics.
- **Job & Internship Board (`/jobs`)**: Job listings with salary ranges, remote/on-site filters, one-click applicant submissions for students, and job posting capabilities for alumni.
- **Event Center & Ticketing (`/events`)**: Campus reunions, workshops, and webinars. Users can RSVP, receive an instant digital QR check-in ticket, and browse post-event galleries.
- **Community Feed (`/community`)**: Interactive social forum with multimedia posts, nested comment discussions, real-time likes, and content moderation reporting.
- **Direct Messaging (`/messages`)**: 1-on-1 private messaging interface between alumni and students with read status tracking.
- **Job Referrals Portal (`/referrals`, `/referral-request`)**: Structured system for students to request job referrals from verified alumni at target companies.
- **Campus Marketplace (`/marketplace`)**: Peer-to-peer buy/sell exchange for textbooks, dorm essentials, lab equipment, and electronics.
- **Alumni Business Directory (`/business-directory`)**: Registry supporting alumni-founded ventures, service agencies, and local stores.
- **Startup Hub (`/startup-hub`)**: Collegiate incubator showcase highlighting venture elevator pitches, funding rounds, and founder profiles.
- **Career Center (`/career-center`)**: Curated repository of resume guides, technical interview prep materials, and salary negotiation frameworks.
- **Rewards & Badges (`/rewards`)**: Points-based gamification rewarding active mentors, donors, and community contributors with achievement badges and a college leaderboard.
- **Fundraising & Donations (`/donations`)**: Campus endowment campaigns with interactive donation amounts and an emulated sandbox checkout gateway.
- **Sponsored Display Ads (`/ads`)**: Institutional notices and verified partner announcements.
- **Account Settings (`/settings`)**: Configurable email notifications, profile public/private visibility, and password modification.

### C. College Administrator Portal (`/admin/*`)
- **Admin Dashboard (`/admin/dashboard`)**: Macro metrics summarizing total students, alumni, active mentorships, and donation volumes.
- **User Management (`/admin/users`)**: Searchable user directory with instant account verification, role re-assignment, and one-click account suspension.
- **Moderation Queue (`/admin/moderation`)**: Review reported community posts and comments with actions to dismiss or resolve/delete violating content.
- **Events & QR Check-In (`/events-admin`)**: Create and schedule official campus events, view real-time registrant rosters, and scan/submit attendee QR codes to mark attendance.
- **Financial Ledger (`/admin/payments`)**: Itemized audit record of all alumni donations, campaign allocations, and platform transaction IDs.
- **Analytics Suite (`/admin/analytics`)**: Visual breakdowns of user engagement, event attendance rates, and mentorship completion percentages.

### D. Super Administrator Portal (`/super-admin/*`)
- **Global Overview (`/super-admin/dashboard`)**: Cross-institution KPIs across all universities, platform user counts, active subscription tiers, and system health.
- **Institution Management (`/super-admin/institutions`, `/super-admin/colleges`)**: Onboard new collegiate institutions, manage university domains, and toggle subscription tiers (`Starter`, `Growth`, `Enterprise`).
- **Platform User Directory (`/super-admin/users`)**: Super-admin user control panel with multi-tenant filtering and global account deactivation overrides.
- **Global Advertisement Controls (`/super-admin/ads`)**: Create and toggle platform-wide sponsored ad campaigns with real-time status switches (`active` vs `disabled`).
- **Revenue Ledger & CSV Export (`/super-admin/revenue`)**: Global billing history with an automated, schema-verified **Platform Revenue CSV Export** download generator.
- **Security & Audit Logs (`/super-admin/security`)**: Live security monitor logging authentication attempts, administrative privilege escalations, IP addresses, and authorization denials.

---

## 7. Verification, Testing & Quality Assurance Suite

The platform includes an automated testing and verification pipeline:

### 1. Syntax Linter (`tools/lint_all.php`)
- **Scope**: Recursively validates 100% of the PHP codebase (189 files across `app/`, `database/`, `resources/views/`, `routes/`, `tests/`, and `tools/`).
- **Execution**: `C:\xampp\php\php.exe tools/lint_all.php`
- **Result**: **189/189 files passed (0 syntax errors)**.

### 2. Route Matrix & Element Inventory Crawler (`tools/audit_inventory.php`)
- **Scope**: Headlessly launches an isolated server instance and simulates sessions across all 5 roles (`guest`, `student`, `alumni`, `college_admin`, `super_admin`).
- **Validation**: Inspects all rendered HTML pages, validates HTTP 200 responses, verifies 0 broken links/forms, detects non-semantic buttons, flags missing CSRF tokens, and enforces zero static people images.
- **Result**: **2,599 interactive elements audited across all routes and roles with 0 defects**. Exits with code 1 if any route returns 404.

### 3. Comprehensive E2E Testing Suite (`tests/e2e_flows.php`)
- **Scope**: Tests the full request-response lifecycle against an isolated test database (`database/test.sqlite`).
- **Suites**:
  - Suite 1: Authentication & OTP email activation lifecycle.
  - Suite 2: Strict server-side RBAC guards (asserts HTTP 403 on unauthorized routes and cross-tenant mutations).
  - Suite 3: Database state transitions (asserts row insertions and updates across `mentorship_sessions`, `jobs`, `donations`, `events`, `marketplace_items`, etc.).
- **Execution**: `C:\xampp\php\php.exe tests/e2e_flows.php`
- **Result**: **308/308 assertions passed (0 failures)**.

### 4. Playwright Browser Smoke Automation (`tools/browser_smoke.js`)
- **Scope**: Controls a real Chromium browser across desktop (1920x1080) and mobile (375x667) viewports.
- **Validation**:
  - Desktop: Navigates every route via DOM clicks, submits all forms, and verifies visible UI state AND SQLite rows.
  - Mobile: Clicks open the mobile hamburger drawer, asserts zero horizontal overflow, and tests all navigation items without fallback `page.goto`.
  - Performance: Enforces a strict **<3000ms duration gate** on every mobile drawer click (measured speeds range between 202ms and 1547ms).
- **Execution**: `node tools/browser_smoke.js`
- **Result**: **142/142 interactions passed, 0 console errors, 0 log errors**.

### 5. Server Error Log Enforcer
- The platform strictly enforces that `storage/logs/php_error.log` must remain **0 bytes** (zero PHP notices, warnings, deprecations, or fatal errors).

---

## 8. Operational & Developer Setup Guide

### Prerequisites
- PHP 8.0+ CLI (with `pdo_sqlite`, `sqlite3`, `mbstring`, `openssl` extensions enabled).
- Node.js v18+ and `@playwright/test` (for browser automation).

### Quick Start Commands

```bash
# 1. Switch to project directory
cd Alumni-Connect-master

# 2. Seed deterministic demo data (Development / Testing ONLY)
C:\xampp\php\php.exe database/seed_demo_accounts.php

# 3. Run Static Syntax Linter
C:\xampp\php\php.exe tools/lint_all.php

# 4. Run E2E Test Suite (308 assertions)
C:\xampp\php\php.exe tests/e2e_flows.php

# 5. Run Inventory Route Crawler (2,599 elements)
C:\xampp\php\php.exe tools/audit_inventory.php

# 6. Run Full Playwright Browser Automation (142 interactions)
node tools/browser_smoke.js

# 7. Start Local Development Server
C:\xampp\php\php.exe -S 127.0.0.1:8000 -t public
```

### Deterministic Demo Credentials
All seeded demo accounts share the password: `Password123!`

- **Super Admin**: `superadmin@alumni.test`
- **College Admin (College 1 - IIT Bombay)**: `admin@alumni.test`
- **College Admin (College 2 - BITS Pilani)**: `admin.bits@alumni.test`
- **Alumni (College 1)**: `alumni@alumni.test`
- **Student (College 1)**: `student@alumni.test`

---

## 9. Design Conventions & Architecture Rules for Future AI Models

When extending or maintaining this codebase, any future AI assistant MUST adhere to the following invariants:

1. **No External Framework Introductions**: Do not add Laravel, Symfony, or Composer packages unless explicitly commanded. Retain the clean, ultra-fast PHP 8.0 core architecture.
2. **Vanilla CSS Integrity**: Maintain the design system in `public/assets/css/style.css` and view-level styles. Avoid installing Tailwind CSS or Bootstrap.
3. **Multi-Tenant Scoping**: Every database query on shared tables (`jobs`, `events`, `posts`, `donations`, `messages`, `reports`) **MUST filter by `college_id`**, except when accessed by `super_admin`.
4. **Strict RBAC Enforcement**:
   - `/events-admin` and `/admin/*` must strictly restrict access to `college_admin` and `super_admin`.
   - `/super-admin/*` must strictly restrict access to `super_admin`.
   - Students must never be permitted to post jobs (`POST /jobs/create`) or mutate admin endpoints.
   - Any access violation must immediately render `errors/403.php` with HTTP status code 403.
5. **No Static Mock People**: Never hardcode names (e.g. "Marcus Vance", "Elena Rostova") or hardcoded avatar pngs in authenticated layouts. Always use database user columns and dynamic initials fallback.
6. **Zero Error Log Tolerance**: All code changes must execute with zero PHP notices or warnings. `storage/logs/php_error.log` must remain completely clean (0 bytes).
7. **Mobile Drawer Click Speed**: Mobile navigation drawer elements must maintain instantaneous interaction (<3000ms) with zero fallback navigation hacks.
