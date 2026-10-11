# Alumni Connect — Interactive Element & Route Audit Inventory

**Generated:** 2026-10-11 16:48:22
**Runtime:** PHP 8.0.30

## Summary Metrics

- **Total Elements Audited:** 1388
- **Functional Elements (Passing):** 1388
- **Defects / Gaps Detected:** 0
- **Hardcoded View Strings:** 0
- **Unlinked Defined Routes:** 42

## Breakdown by Element Type and Role

| Role | Links | Forms | Buttons | Fetch / XHR Endpoints | Total Audited Elements |
|---|---|---|---|---|---|
| **student** | 322 | 69 | 185 | 20 | **596** |
| **alumni** | 306 | 67 | 180 | 19 | **572** |
| **college_admin** | 54 | 18 | 32 | 5 | **109** |
| **super_admin** | 60 | 25 | 34 | 0 | **119** |
| **Total (All Roles)** | **742** | **179** | **431** | **44** | **1396** |

## Defect Inventory (Pending Fixes)

*Zero defects detected across all 4 roles.*

## Hardcoded View Strings Detected

*Zero hardcoded placeholder strings detected across all views.*

## Unlinked Routes in `routes/web.php`

- `GET /verify`
- `GET /forgot-password`
- `GET /reset-password`
- `GET /profile/{id}`
- `GET /manage-referrals`
- `GET /events-admin/certificate`
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
- `POST /mentorship/cancel`
- `POST /referral-request/update-status`
- `POST /jobs/create`
- `POST /jobs/delete`
- `POST /jobs/edit`
- `POST /events/cancel`
- `POST /events-admin/create`
- `POST /events-admin/edit`
- `POST /events-admin/delete`
- `POST /community/comment`
- `POST /community/delete`
- `POST /community/edit`
- `POST /community/poll-vote`
- `POST /community/report`
- `POST /community/comment/delete`
- `POST /messages/send`
- `POST /messages/delete`
- `POST /marketplace/delete`
- `POST /marketplace/edit`
- `POST /payment/callback`
- `POST /business-directory/edit`
- `POST /business-directory/delete`
- `POST /startup-hub/edit`
- `POST /startup-hub/delete`
- `POST /ads/disable`
- `POST /admin/users/role`

## Full Audit Roster (All Elements)

| Role | Page | Element | Expected Behaviour | Current Status |
|---|---|---|---|---|
| student | /dashboard | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Add Career InterestsHelps match jobs ... (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Request a MentorConnect with alumni i... (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: Apply for a Job3 new matches for your... (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: View All (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /dashboard | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /dashboard | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /dashboard | Form: mentorshipActionForm (action=&quot;/mentorship/update-status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /dashboard | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: Request Referral (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: Request Mentorship (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: View Profile (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: Request Mentorship (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Button: View Profile (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /dashboard | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /profile | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Add Career Interests (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: Add Mentorship Preferences (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /profile | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /profile | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /profile | Form: profileForm (action=&quot;/profile/update&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /profile | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /profile | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /profile | Button: Cancel (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /profile | Button: Save Changes (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: + Add Skill (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: Browse Files (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: + Add Education (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /profile | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /directory | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: Reset All (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /directory | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /directory | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /directory | Form: [unnamed] (action=&quot;/directory&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /directory | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: Apply Filters (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: Connect (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: Connect (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: Connect (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: Connect (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Button: 1 (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /directory | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /mentorship | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /mentorship | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /mentorship | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /mentorship | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: All Mentors (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: Product Design (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: Engineering (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: Marketing (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: Full Directory (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /mentorship | Button: Book Session (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /mentorship | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /referral-request | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: Go to Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: BOOK A MENTOR SESSION → (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /referral-request | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /referral-request | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /referral-request | Form: [unnamed] (action=&quot;/referral-request/submit&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /referral-request | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /referral-request | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /referral-request | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /referral-request | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /referral-request | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /referral-request | Button: Submit Referral Request (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /referral-request | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /jobs | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /jobs | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /jobs | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /jobs | Form: [unnamed] (action=&quot;/jobs&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /jobs | Form: [unnamed] (action=&quot;/jobs/apply&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /jobs | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: Apply Filters (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: 1 (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /jobs | Button: Apply Now (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /jobs | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /events | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /events | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /events | Form: [unnamed] (action=&quot;/events&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /events | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /events | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /events | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /events | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /events | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /events | Button: Upcoming (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /events | Button: Registered (0) (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /events | Button: Search (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /events | Button: RSVP (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /events | Button: RSVP (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /events | Button: Get Started (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /events | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /community | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /community | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /community | Form: [unnamed] (action=&quot;/community/post&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /community | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /community | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /community | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /community | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /community | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /community | Button: Poll (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /community | Button: Event (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /community | Button: Post (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /community | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /community | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /community | Button: Become a Mentor (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /community | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /messages | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Pooja Iyer ALUMNI (href=&quot;/messages?user_id=2&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Dean K. Sharma COLLEGE_ADMIN (href=&quot;/messages?user_id=3&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: Antigravity SuperAdmin SUPER_ADMIN (href=&quot;/messages?user_id=4&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /messages | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /messages | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /messages | Form: chat-form (action=&quot;&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF present)) |
| student | /messages | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /messages | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /messages | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /messages | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /messages | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /messages | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /messages | Script fetch: /messages/send | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /messages | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /marketplace | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /marketplace | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /marketplace | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /marketplace | Form: [unnamed] (action=&quot;/marketplace&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /marketplace | Form: [unnamed] (action=&quot;/marketplace/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /marketplace | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /marketplace | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /marketplace | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /marketplace | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /marketplace | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /marketplace | Button: Post an Item (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /marketplace | Button: Apply Filter (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /marketplace | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /marketplace | Button: Post Item (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /marketplace | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /donations | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /donations | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /donations | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /donations | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /donations | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /donations | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /donations | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /donations | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /donations | Button: Donate Now (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /donations | Button: Donate Now (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /donations | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /business-directory | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: Contact Owner (href=&quot;/messages?user_id=2&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /business-directory | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /business-directory | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /business-directory | Form: [unnamed] (action=&quot;/business-directory&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /business-directory | Form: [unnamed] (action=&quot;/business-directory/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /business-directory | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /business-directory | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /business-directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /business-directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /business-directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /business-directory | Button: List Your Business (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /business-directory | Button: Apply Filter (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /business-directory | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /business-directory | Button: Submit Listing (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /business-directory | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /startup-hub | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: Contact Founder (href=&quot;/messages?user_id=2&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /startup-hub | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /startup-hub | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /startup-hub | Form: [unnamed] (action=&quot;/startup-hub&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /startup-hub | Form: [unnamed] (action=&quot;/startup-hub/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /startup-hub | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /startup-hub | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /startup-hub | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /startup-hub | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /startup-hub | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /startup-hub | Button: Pitch Your Startup (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /startup-hub | Button: Apply Filter (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /startup-hub | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /startup-hub | Button: Submit Pitch (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /startup-hub | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /career-center | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /career-center | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /career-center | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /career-center | Form: [unnamed] (action=&quot;/career-center&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /career-center | Form: [unnamed] (action=&quot;/career-center/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /career-center | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /career-center | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /career-center | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /career-center | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /career-center | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /career-center | Button: Share a Resource (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /career-center | Button: Apply Filter (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /career-center | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /career-center | Button: Share Resource (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /career-center | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /notifications | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /notifications | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-all-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /notifications | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /notifications | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /notifications | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /notifications | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /notifications | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /notifications | Button: Mark All as Read (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /notifications | Button: Mark Read (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /notifications | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /rewards | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /rewards | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /rewards | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /rewards | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /rewards | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /rewards | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /rewards | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /rewards | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /rewards | Button: Claim (Test) (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /rewards | Button: Claim (Test) (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /rewards | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /ads | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /ads | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /ads | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /ads | Form: [unnamed] (action=&quot;/ads/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /ads | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /ads | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /ads | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /ads | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /ads | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /ads | Button: Become a Sponsor (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /ads | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /ads | Button: Submit Sponsorship (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /ads | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /settings | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /settings | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /settings | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /settings | Form: [unnamed] (action=&quot;/settings/update&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /settings | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /settings | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /settings | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /settings | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /settings | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /settings | Button: Save Changes (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /settings | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| student | /search | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| student | /search | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| student | /search | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /search | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| student | /search | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /search | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /search | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /search | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /search | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| student | /search | Button: Search (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| student | /search | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /dashboard | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Add Career InterestsHelps match jobs ... (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Request a MentorConnect with alumni i... (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: Apply for a Job3 new matches for your... (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: View All (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /dashboard | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /dashboard | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /dashboard | Form: mentorshipActionForm (action=&quot;/mentorship/update-status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /dashboard | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: Request Referral (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: Request Mentorship (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: View Profile (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: Request Mentorship (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Button: View Profile (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /dashboard | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /profile | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Add Career Interests (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: Add Mentorship Preferences (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /profile | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /profile | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /profile | Form: profileForm (action=&quot;/profile/update&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /profile | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /profile | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /profile | Button: Cancel (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /profile | Button: Save Changes (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: + Add Skill (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: Browse Files (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: + Add Education (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /profile | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /directory | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: Reset All (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /directory | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /directory | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /directory | Form: [unnamed] (action=&quot;/directory&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /directory | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: Apply Filters (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: Connect (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: Connect (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: Connect (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: Connect (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Button: 1 (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /directory | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /mentorship | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /mentorship | Form: [unnamed] (action=&quot;/mentorship/book&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /mentorship | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /mentorship | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: All Mentors (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: Product Design (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: Engineering (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: Marketing (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: Full Directory (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /mentorship | Button: Book Session (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /mentorship | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /referral-request | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: Go to Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: BOOK A MENTOR SESSION → (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /referral-request | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /referral-request | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /referral-request | Form: [unnamed] (action=&quot;/referral-request/submit&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /referral-request | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /referral-request | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /referral-request | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /referral-request | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /referral-request | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /referral-request | Button: Submit Referral Request (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /referral-request | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /jobs | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /jobs | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /jobs | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /jobs | Form: [unnamed] (action=&quot;/jobs&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /jobs | Form: [unnamed] (action=&quot;/jobs/apply&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /jobs | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: Apply Filters (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: 1 (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /jobs | Button: Apply Now (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /jobs | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /events | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /events | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Form: [unnamed] (action=&quot;/events/register&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /events | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /events | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /events | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /events | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /events | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /events | Button: Upcoming (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /events | Button: Registered (0) (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /events | Button: Search (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /events | Button: RSVP (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /events | Button: RSVP (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /events | Button: Get Started (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /events | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /community | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /community | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/post&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Form: [unnamed] (action=&quot;/community/like&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /community | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /community | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /community | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /community | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /community | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /community | Button: Poll (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /community | Button: Event (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /community | Button: Post (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /community | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /community | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /community | Button: Become a Mentor (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /community | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /messages | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Aarav Patel STUDENT (href=&quot;/messages?user_id=1&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Dean K. Sharma COLLEGE_ADMIN (href=&quot;/messages?user_id=3&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: Antigravity SuperAdmin SUPER_ADMIN (href=&quot;/messages?user_id=4&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /messages | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /messages | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /messages | Form: chat-form (action=&quot;&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF present)) |
| alumni | /messages | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /messages | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /messages | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /messages | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /messages | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /messages | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /messages | Script fetch: /messages/send | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /messages | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /marketplace | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /marketplace | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /marketplace | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /marketplace | Form: [unnamed] (action=&quot;/marketplace&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /marketplace | Form: [unnamed] (action=&quot;/marketplace/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /marketplace | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /marketplace | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /marketplace | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /marketplace | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /marketplace | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /marketplace | Button: Post an Item (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /marketplace | Button: Apply Filter (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /marketplace | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /marketplace | Button: Post Item (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /marketplace | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /donations | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /donations | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /donations | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /donations | Form: [unnamed] (action=&quot;/donations/donate&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /donations | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /donations | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /donations | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /donations | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /donations | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /donations | Button: Donate Now (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /donations | Button: Donate Now (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /donations | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /business-directory | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: Contact Owner (href=&quot;/messages?user_id=2&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /business-directory | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /business-directory | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /business-directory | Form: [unnamed] (action=&quot;/business-directory&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /business-directory | Form: [unnamed] (action=&quot;/business-directory/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /business-directory | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /business-directory | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /business-directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /business-directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /business-directory | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /business-directory | Button: List Your Business (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /business-directory | Button: Apply Filter (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /business-directory | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /business-directory | Button: Submit Listing (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /business-directory | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /startup-hub | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: Contact Founder (href=&quot;/messages?user_id=2&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /startup-hub | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /startup-hub | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /startup-hub | Form: [unnamed] (action=&quot;/startup-hub&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /startup-hub | Form: [unnamed] (action=&quot;/startup-hub/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /startup-hub | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /startup-hub | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /startup-hub | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /startup-hub | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /startup-hub | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /startup-hub | Button: Pitch Your Startup (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /startup-hub | Button: Apply Filter (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /startup-hub | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /startup-hub | Button: Submit Pitch (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /startup-hub | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /career-center | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /career-center | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /career-center | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /career-center | Form: [unnamed] (action=&quot;/career-center&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /career-center | Form: [unnamed] (action=&quot;/career-center/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /career-center | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /career-center | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /career-center | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /career-center | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /career-center | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /career-center | Button: Share a Resource (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /career-center | Button: Apply Filter (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /career-center | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /career-center | Button: Share Resource (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /career-center | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /notifications | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-all-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Form: [unnamed] (action=&quot;/notifications/mark-read&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /notifications | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /notifications | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /notifications | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /notifications | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /notifications | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /notifications | Button: Mark All as Read (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /notifications | Button: Mark Read (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /notifications | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /rewards | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Form: [unnamed] (action=&quot;/rewards/award&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /rewards | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /rewards | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /rewards | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /rewards | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /rewards | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /rewards | Button: Claim (Test) (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /rewards | Button: Claim (Test) (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /rewards | Button: Claim (Test) (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /rewards | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /ads | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /ads | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /ads | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /ads | Form: [unnamed] (action=&quot;/ads/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /ads | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /ads | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /ads | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /ads | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /ads | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /ads | Button: Become a Sponsor (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /ads | Button: [Icon Button] (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /ads | Button: Submit Sponsorship (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /ads | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| alumni | /settings | Link: Alumni Connect Modern Collegiate (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Home (href=&quot;/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Profile (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Alumni Directory (href=&quot;/directory&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Mentorship (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Jobs (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Events (href=&quot;/events&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Community (href=&quot;/community&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Messages (href=&quot;/messages&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Referrals (href=&quot;/referral-request&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Marketplace (href=&quot;/marketplace&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Donations (href=&quot;/donations&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| alumni | /settings | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /settings | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| alumni | /settings | Form: [unnamed] (action=&quot;/settings/update&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| alumni | /settings | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /settings | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /settings | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /settings | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /settings | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| alumni | /settings | Button: Save Changes (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| alumni | /settings | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| college_admin | /admin/dashboard | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Events Management (href=&quot;/events-admin&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Donation Records (href=&quot;/admin/payments&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: Analytics &amp; Reports (href=&quot;/admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Form: [unnamed] (action=&quot;/admin/users/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/dashboard | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/dashboard | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/dashboard | Button: Suspend (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/dashboard | Button: Suspend (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/dashboard | Button: Suspend (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/dashboard | Button: Suspend (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/dashboard | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| college_admin | /admin/moderation | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/moderation | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/moderation | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /admin/moderation | Form: [unnamed] (action=&quot;/admin/moderation/resolve&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/moderation | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/moderation | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/moderation | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/moderation | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/moderation | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/moderation | Button: Resolve (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/moderation | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| college_admin | /admin/payments | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/payments | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/payments | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /admin/payments | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/payments | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/payments | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/payments | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/payments | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/payments | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| college_admin | /admin/analytics | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /admin/analytics | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /admin/analytics | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /admin/analytics | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/analytics | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /admin/analytics | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/analytics | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/analytics | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /admin/analytics | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| college_admin | /events-admin | Link: Alumni Connect Modern Collegiate (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Admin Dashboard (href=&quot;/admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Moderation Queue (href=&quot;/admin/moderation&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Events Admin (href=&quot;/events-admin&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Payments (href=&quot;/admin/payments&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Analytics (href=&quot;/admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Settings (href=&quot;/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: Help Center (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: [Icon/Image Link] (href=&quot;/profile&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Link: View all notifications (href=&quot;/notifications&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/events-admin&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/events-admin/checkin&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /events-admin | Form: [unnamed] (action=&quot;/events-admin/upload-gallery&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| college_admin | /events-admin | Button: Support Growth (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /events-admin | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /events-admin | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /events-admin | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /events-admin | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| college_admin | /events-admin | Button: Check-In Attendee (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /events-admin | Button: Upload Image (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| college_admin | /events-admin | Script fetch: /notifications/mark-all-read | Endpoint registered in routes/web.php | PASS (PASS (Endpoint registered)) |
| super_admin | /super-admin/dashboard | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Support (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Total Students 2 Active across network (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Alumni 2 Registered members (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Active Jobs 3 Opportunities open (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Total Revenue $50,000.00 Processed lo... (href=&quot;/super-admin/revenue&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View All Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View (href=&quot;/events-admin&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View (href=&quot;/mentorship&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: View (href=&quot;/jobs&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/dashboard | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
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
| super_admin | /super-admin/dashboard | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/dashboard | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/dashboard | Button: Verify (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Decline (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Verify (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Decline (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Verify (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Decline (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Verify (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Decline (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Verify (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Decline (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/dashboard | Button: Announcements (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/dashboard | Button: Export Reports (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/dashboard | Button: View All Events (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/analytics | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Support (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: VIEW FULL LIST (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/analytics | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/analytics | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| super_admin | /super-admin/analytics | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/analytics | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/analytics | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/institutions | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Support (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Configure → (href=&quot;/super-admin/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/create&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/tier&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Form: [unnamed] (action=&quot;/super-admin/institutions/status&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/institutions | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/institutions | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/institutions | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/institutions | Button: + Onboard Institution (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/institutions | Button: Save &amp; Create (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/institutions | Button: ● Active (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/institutions | Button: ● Active (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/revenue | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Support (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Download CSV Export (href=&quot;/super-admin/revenue?export=csv&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Export to CSV (href=&quot;/super-admin/revenue?export=csv&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/revenue | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/revenue | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| super_admin | /super-admin/revenue | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/revenue | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/revenue | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/revenue | Button: All Time (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/settings | Link: AlumniConnect Platform Administration (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Dashboard (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Institutions (href=&quot;/super-admin/institutions&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Analytics (href=&quot;/super-admin/analytics&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Revenue (href=&quot;/super-admin/revenue&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Settings (href=&quot;/super-admin/settings&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Support (href=&quot;/help&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Discard Changes (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: System Status (href=&quot;/super-admin/dashboard&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Link: Data Privacy (href=&quot;/privacy&quot;) | Reachable clean page (HTTP 200 or 302) | PASS (HTTP 200) |
| super_admin | /super-admin/settings | Form: [unnamed] (action=&quot;/logout&quot; method=&quot;POST&quot;) | Active route in web.php with CSRF token | PASS (Valid (POST, CSRF present)) |
| super_admin | /super-admin/settings | Form: [unnamed] (action=&quot;/search&quot; method=&quot;GET&quot;) | Active route in web.php with CSRF token | PASS (Valid (GET, CSRF N/A)) |
| super_admin | /super-admin/settings | Button: Logout (type=&quot;submit&quot;) | Functional click handler or form submission | PASS (PASS (Form submit)) |
| super_admin | /super-admin/settings | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/settings | Button: [Icon Button] (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
| super_admin | /super-admin/settings | Button: Save Preferences (type=&quot;button&quot;) | Functional click handler or form submission | PASS (PASS (Active handler)) |
