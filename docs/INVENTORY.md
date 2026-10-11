# Alumni Connect — Interactive Element & Route Audit Inventory

**Generated:** 2026-10-11 14:53:18
**Runtime:** PHP 8.0.30

## Summary Metrics

- **Total Elements Audited:** 1298
- **Functional Elements (Passing):** 1298
- **Defects / Gaps Detected:** 0
- **Hardcoded View Strings:** 0
- **Unlinked Defined Routes:** 21

## Defect Inventory (Pending Fixes)

| Role | Page | Element | Expected Behaviour | Current Status |
|---|---|---|---|---|

## Hardcoded View Strings Detected

| View File | Hardcoded Placeholder |
|---|---|

## Unlinked Routes in `routes/web.php`

- `GET /verify`
- `GET /forgot-password`
- `GET /reset-password`
- `GET /profile/{id}`
- `GET /gallery`
- `GET /messages/stream`
- `GET /payment/checkout`
- `GET /rewards`
- `GET /ads`
- `GET /terms`
- `POST /logout-all`
- `POST /verify`
- `POST /forgot-password`
- `POST /reset-password`
- `POST /referral-request/update-status`
- `POST /jobs/create`
- `POST /events-admin/create`
- `POST /community/comment`
- `POST /messages/send`
- `POST /payment/callback`
- `POST /admin/users/role`

## Full Audit Roster (All Elements)

| Role | Page | Element | Expected Behaviour | Current Status |
|---|---|---|---|---|
| student | /dashboard | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Add Career InterestsHelps match jobs ... (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Request a MentorConnect with alumni i... (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Apply for a Job3 new matches for your... (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: View All (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /dashboard | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /dashboard | Form: mentorshipActionForm (action=&quot;/mentorship/update-status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /profile | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Add Career Interests (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Add Mentorship Preferences (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /profile | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /profile | Form: profileForm (action=&quot;/profile/update&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /directory | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Reset All (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /directory | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /directory | Form: [unnamed] (action=&quot;/directory&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /mentorship | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /referral-request | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Go to Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: BOOK A MENTOR SESSION → (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /referral-request | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /referral-request | Form: [unnamed] (action=&quot;/referral-request/submit&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /jobs | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /jobs | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /jobs | Form: [unnamed] (action=&quot;/jobs&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /jobs | Form: [unnamed] (action=&quot;/jobs/apply&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /events | Form: [unnamed] (action=&quot;/events&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /events | Form: [unnamed] (action=&quot;/events/cancel&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /community | Form: [unnamed] (action=&quot;/community/post&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /messages | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Rahul Sharma STUDENT (href=&quot;/messages?user_id=1&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Priya Patel ALUMNI (href=&quot;/messages?user_id=2&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: PHP Tester User STUDENT (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User One ADMIN (href=&quot;/messages?user_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User Two STUDENT (href=&quot;/messages?user_id=5&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User Three ALUMNI (href=&quot;/messages?user_id=6&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User Three ALUMNI (href=&quot;/messages?user_id=7&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A ALUMNI (href=&quot;/messages?user_id=11&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User B ALUMNI (href=&quot;/messages?user_id=12&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Henil Patel STUDENT (href=&quot;/messages?user_id=19&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=20&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=21&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=22&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=23&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=24&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=25&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=26&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=27&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=28&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=29&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=30&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=31&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Student User STUDENT (href=&quot;/messages?user_id=32&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Alumni User ALUMNI (href=&quot;/messages?user_id=33&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Student User STUDENT (href=&quot;/messages?user_id=35&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Alumni User ALUMNI (href=&quot;/messages?user_id=36&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A User ALUMNI (href=&quot;/messages?user_id=37&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B User ALUMNI (href=&quot;/messages?user_id=38&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A User ALUMNI (href=&quot;/messages?user_id=39&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B User ALUMNI (href=&quot;/messages?user_id=40&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A User ALUMNI (href=&quot;/messages?user_id=41&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B User ALUMNI (href=&quot;/messages?user_id=42&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A User ALUMNI (href=&quot;/messages?user_id=43&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B User ALUMNI (href=&quot;/messages?user_id=44&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=45&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=46&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=47&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=48&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=49&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=50&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=51&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=52&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=53&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=54&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=61&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=62&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=63&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=64&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Verify Test ALUMNI (href=&quot;/messages?user_id=65&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Browser Test ALUMNI (href=&quot;/messages?user_id=66&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Admin User SUPER_ADMIN (href=&quot;/messages?user_id=67&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Alumni User ALUMNI (href=&quot;/messages?user_id=68&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=69&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=70&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A ALUMNI (href=&quot;/messages?user_id=71&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User B ALUMNI (href=&quot;/messages?user_id=72&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=73&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=74&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User A ALUMNI (href=&quot;/messages?user_id=75&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: User B ALUMNI (href=&quot;/messages?user_id=76&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Pooja Iyer ALUMNI (href=&quot;/messages?user_id=80&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Dean K. Sharma COLLEGE_ADMIN (href=&quot;/messages?user_id=81&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Antigravity SuperAdmin SUPER_ADMIN (href=&quot;/messages?user_id=82&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Rohan Mehta STUDENT (href=&quot;/messages?user_id=83&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Ananya Verma ALUMNI (href=&quot;/messages?user_id=84&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Prof. S. Rangan COLLEGE_ADMIN (href=&quot;/messages?user_id=85&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=86&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=87&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=88&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=89&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /messages | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /messages | Form: chat-form (action=&quot;&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF present)) |
| student | /marketplace | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Contact (href=&quot;/messages?user_id=1&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /marketplace | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /marketplace | Form: [unnamed] (action=&quot;/marketplace&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /marketplace | Form: [unnamed] (action=&quot;/marketplace/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /donations | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /donations | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /business-directory | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Contact Owner (href=&quot;/messages?user_id=80&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Contact Owner (href=&quot;/messages?user_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Contact Owner (href=&quot;/messages?user_id=1&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /business-directory | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /business-directory | Form: [unnamed] (action=&quot;/business-directory&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /business-directory | Form: [unnamed] (action=&quot;/business-directory/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /startup-hub | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Contact Founder (href=&quot;/messages?user_id=80&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Contact Founder (href=&quot;/messages?user_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Contact Founder (href=&quot;/messages?user_id=1&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /startup-hub | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /startup-hub | Form: [unnamed] (action=&quot;/startup-hub&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /startup-hub | Form: [unnamed] (action=&quot;/startup-hub/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /career-center | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /career-center | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /career-center | Form: [unnamed] (action=&quot;/career-center&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /career-center | Form: [unnamed] (action=&quot;/career-center/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-all-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /rewards | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /rewards | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /ads | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /ads | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /ads | Form: [unnamed] (action=&quot;/ads/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /settings | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /settings | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /settings | Form: [unnamed] (action=&quot;/settings/update&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /search | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /search | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /search | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /dashboard | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Add Career InterestsHelps match jobs ... (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Request a MentorConnect with alumni i... (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Apply for a Job3 new matches for your... (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: View All (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /dashboard | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /dashboard | Form: mentorshipActionForm (action=&quot;/mentorship/update-status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /profile | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Add Career Interests (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Add Mentorship Preferences (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /profile | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /profile | Form: profileForm (action=&quot;/profile/update&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /directory | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Reset All (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /directory | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /directory | Form: [unnamed] (action=&quot;/directory&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /mentorship | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /referral-request | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Go to Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: BOOK A MENTOR SESSION → (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /referral-request | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /referral-request | Form: [unnamed] (action=&quot;/referral-request/submit&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /jobs | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /jobs | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /jobs | Form: [unnamed] (action=&quot;/jobs&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /jobs | Form: [unnamed] (action=&quot;/jobs/apply&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/post&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /messages | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Rahul Sharma STUDENT (href=&quot;/messages?user_id=1&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Priya Patel ALUMNI (href=&quot;/messages?user_id=2&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: PHP Tester User STUDENT (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User One ADMIN (href=&quot;/messages?user_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User Two STUDENT (href=&quot;/messages?user_id=5&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User Three ALUMNI (href=&quot;/messages?user_id=6&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User Three ALUMNI (href=&quot;/messages?user_id=7&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A ALUMNI (href=&quot;/messages?user_id=11&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User B ALUMNI (href=&quot;/messages?user_id=12&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Henil Patel STUDENT (href=&quot;/messages?user_id=19&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=20&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=21&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=22&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=23&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=24&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=25&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=26&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=27&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=28&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=29&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=30&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=31&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Student User STUDENT (href=&quot;/messages?user_id=32&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Alumni User ALUMNI (href=&quot;/messages?user_id=33&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Student User STUDENT (href=&quot;/messages?user_id=35&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Alumni User ALUMNI (href=&quot;/messages?user_id=36&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A User ALUMNI (href=&quot;/messages?user_id=37&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B User ALUMNI (href=&quot;/messages?user_id=38&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A User ALUMNI (href=&quot;/messages?user_id=39&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B User ALUMNI (href=&quot;/messages?user_id=40&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A User ALUMNI (href=&quot;/messages?user_id=41&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B User ALUMNI (href=&quot;/messages?user_id=42&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A User ALUMNI (href=&quot;/messages?user_id=43&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B User ALUMNI (href=&quot;/messages?user_id=44&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=45&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=46&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=47&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=48&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=49&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=50&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=51&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=52&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=53&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=54&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=61&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=62&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A Search ALUMNI (href=&quot;/messages?user_id=63&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Super Admin SUPER_ADMIN (href=&quot;/messages?user_id=64&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Verify Test ALUMNI (href=&quot;/messages?user_id=65&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Browser Test ALUMNI (href=&quot;/messages?user_id=66&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Admin User SUPER_ADMIN (href=&quot;/messages?user_id=67&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Alumni User ALUMNI (href=&quot;/messages?user_id=68&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=69&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=70&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A ALUMNI (href=&quot;/messages?user_id=71&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User B ALUMNI (href=&quot;/messages?user_id=72&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=73&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=74&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User A ALUMNI (href=&quot;/messages?user_id=75&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: User B ALUMNI (href=&quot;/messages?user_id=76&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Aarav Patel STUDENT (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Dean K. Sharma COLLEGE_ADMIN (href=&quot;/messages?user_id=81&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Antigravity SuperAdmin SUPER_ADMIN (href=&quot;/messages?user_id=82&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Rohan Mehta STUDENT (href=&quot;/messages?user_id=83&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Ananya Verma ALUMNI (href=&quot;/messages?user_id=84&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Prof. S. Rangan COLLEGE_ADMIN (href=&quot;/messages?user_id=85&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=86&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=87&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College A ALUMNI (href=&quot;/messages?user_id=88&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: College B ALUMNI (href=&quot;/messages?user_id=89&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /messages | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /messages | Form: chat-form (action=&quot;&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF present)) |
| alumni | /marketplace | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=79&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=3&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Contact (href=&quot;/messages?user_id=1&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /marketplace | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /marketplace | Form: [unnamed] (action=&quot;/marketplace&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /marketplace | Form: [unnamed] (action=&quot;/marketplace/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /donations | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /donations | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /business-directory | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Contact Owner (href=&quot;/messages?user_id=80&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Contact Owner (href=&quot;/messages?user_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Contact Owner (href=&quot;/messages?user_id=1&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /business-directory | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /business-directory | Form: [unnamed] (action=&quot;/business-directory&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /business-directory | Form: [unnamed] (action=&quot;/business-directory/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /startup-hub | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Contact Founder (href=&quot;/messages?user_id=80&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Contact Founder (href=&quot;/messages?user_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Contact Founder (href=&quot;/messages?user_id=1&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /startup-hub | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /startup-hub | Form: [unnamed] (action=&quot;/startup-hub&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /startup-hub | Form: [unnamed] (action=&quot;/startup-hub/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /career-center | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /career-center | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /career-center | Form: [unnamed] (action=&quot;/career-center&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /career-center | Form: [unnamed] (action=&quot;/career-center/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-all-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /ads | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /ads | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /ads | Form: [unnamed] (action=&quot;/ads/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /settings | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Home (href=&quot;/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Profile (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Jobs (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Events (href=&quot;/events&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Community (href=&quot;/community&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Messages (href=&quot;/messages&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Donations (href=&quot;/donations&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /settings | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /settings | Form: [unnamed] (action=&quot;/settings/update&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Events Management (href=&quot;/events-admin&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Donation Records (href=&quot;/admin/payments&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Analytics &amp; Reports (href=&quot;/admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/moderation | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/moderation | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /admin/moderation | Form: [unnamed] (action=&quot;/admin/moderation/resolve&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/payments | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/payments | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /admin/analytics | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/analytics | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /events-admin | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Settings (href=&quot;/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Help Center (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Certificate (href=&quot;/events-admin/certificate?reg_id=4&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Certificate (href=&quot;/events-admin/certificate?reg_id=6&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Certificate (href=&quot;/events-admin/certificate?reg_id=8&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Certificate (href=&quot;/events-admin/certificate?reg_id=10&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Certificate (href=&quot;/events-admin/certificate?reg_id=12&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/events-admin&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/events-admin/checkin&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/events-admin/upload-gallery&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Support (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Total Students 8 Active across network (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Alumni 51 Registered members (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Active Jobs 42 Opportunities open (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Total Revenue $2,600.00 Processed loc... (href=&quot;/super-admin/revenue&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View All Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View (href=&quot;/events-admin&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View (href=&quot;/mentorship&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View (href=&quot;/jobs&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/verify&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/decline&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/verify&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/decline&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/verify&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/decline&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/verify&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/decline&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/verify&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/dashboard | Form: [unnamed] (action=&quot;/super-admin/users/decline&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/analytics | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Support (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: VIEW FULL LIST (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/analytics | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| super_admin | /super-admin/institutions | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Support (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/revenue | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Support (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Download CSV Export (href=&quot;/super-admin/revenue?export=csv&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Export to CSV (href=&quot;/super-admin/revenue?export=csv&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/revenue | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| super_admin | /super-admin/settings | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Support (href=&quot;/help&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Discard Changes (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/settings | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
