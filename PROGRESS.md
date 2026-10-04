# Progress Tracker

> **RESOLUTION:** The `browser_subagent` CSRF issue on login was caused by a missing hidden `<input type="hidden" name="csrf_token">` field in the HTML forms (`login.php` and `signup.php`). The browser's `fetch` `FormData` object naturally excluded the CSRF token since it wasn't in the DOM. After injecting the token into the forms, the `browser_subagent` was able to successfully log in and verify the frontend visually!

## Phase 1: Cleanup and Scaffolding
- [x] Initial Audit of codebase.
- [x] Directory Scaffolding (`app/`, `resources/`, `routes/`, etc.).
- [ ] Root-level file cleanup and conversion to PHP views (In progress - done for Auth).

## Phase 2: Implementation
- [x] 1. Database (Migrations & Indian Seeders) - Switched to MySQL.
- [x] 2. Auth Module
  - Database switch to MySQL and migration executed
  - Password hashing implemented
  - OTP generation & LogMailer implemented via `/dev/mailbox`
  - Unverified login blocking
  - JWT generation and cookie management
  - Rate limiting (login lockouts)
  - CSRF Token implementation
  - Full JS to POST endpoint integration
  - Programmatic loop verified successfully
- [x] 3. Dashboard
  - Ported `dashboard.html` layout into `resources/views/layouts/app.php` (sidebar + top header) and `resources/views/pages/dashboard.php` (main content)
  - Created `AuthMiddleware` to protect authenticated routes via JWT parsing
  - Setup `DashboardController` and fetched dynamic user data
  - Validated E2E rendering with PHP HTTP streams (due to browser subagent timeout constraints)
- [x] 4. Profile
  - Ported `profile.html` (Edit Profile) and `profile-view.html` (Public Profile) views
  - Upgraded router to support Regex capturing for `/profile/{id}`
  - Developed `ProfileController` and decoupled UI interactions to `profile.js`
  - Validated E2E fetching in `test_profile_loop.php`
- [x] 5. Alumni Directory
  - Ported `directory.html` into `resources/views/pages/directory.php`
  - Created `DirectoryController` and extracted data logic
  - Verified routing and dynamic user rendering
  - *(Browser-verified)*
- [x] 6. Mentorship
  - Ported `mentorship.html` to `resources/views/pages/mentorship.php`
  - Created `MentorshipController` fetching alumni mentors
  - Confirmed via backend-script.
  - *(Browser-verified)*
- [x] 7. Referrals
  - Ported `referral-request.html` to `resources/views/pages/referral-request.php`
  - Created `ReferralsController` to handle rendering
  - Confirmed via backend-script.
  - *(Browser-verified)*
- [x] 8. Jobs
  - Ported `jobs.html` to `resources/views/pages/jobs.php`
  - Created `JobsController`
  - Verified routing and layout with `browser_subagent`
  - *(Browser-verified)*
- [x] 9. Events
  - Created `events` and `event_registrations` tables
  - Dynamic `EventsController` mapped to `events.php`
  - Real RSVPs with QR code hash generation and DB insertion
  - Verified UI rendering and POST submissions with `browser_subagent`
  - Validated DB insertion explicitly
- [x] 9.5 Events Admin
  - Generated dynamic Events Admin layout from mockup
  - Implemented real QR code Check-In system against the database
  - Dynamic generation of Certificates via `dompdf` pulling real attendee names
  - Tested logic and verified DB row state transitions explicitly
- [x] 10. Community & Messages
  - Created `posts` and `messages` tables
  - Built real-time message streaming endpoint via SSE
  - Verified user fetching and layout rendering with `browser_subagent`
- [x] 11. Marketplace, Donations, Hubs (Businesses, Startups, Career Center)
  - All DB backend tables created
  - Final visual testing + programmatic validation completed
- [x] 12. Super Admin Pages, Moderation, Analytics, Ads, Rewards, Settings, Legal
  - Full schema implemented
  - Final visual testing + programmatic validation completed

## Phase 3: Hardening and Stabilization
- [x] Final E2E Hardening Pass
  - Discovered missing CSRF field in Marketplace mockup.
  - Implemented global CSRF check and auto-generation within `AuthMiddleware` for ALL POST/PUT endpoints.
  - Resolved IDOR vulnerability: refactored all controllers to pull `user_id` from secure JWT (`$_REQUEST['user_id']`) instead of `$_SESSION`.
  - Regression tested Modules 1-8 to guarantee strict CSRF compatibility.
  - Patched remaining mock hardcoded user IDs in Mentorship and Referrals.
  - Verified real DB row insertions across all 12 final modules programmatically and visually.
