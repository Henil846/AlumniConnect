# Development Plan

## Phase 1: Audit and Cleanup
- [x] Audit existing file structure (everything is currently at root).
- [ ] Convert root-level HTML/CSS/JS files into PHP views in `resources/views/`.
- [ ] Move shared UI components into `resources/views/layouts/` and `resources/views/partials/`.
- [ ] Setup `public/assets/` for CSS, JS, and Images.
- [ ] Delete original root-level files once fully ported.

## Phase 2: Module Implementation (End-to-End)
For each module, the following steps will be executed:
- Create Models, Repository, Validator, Controller.
- Implement PHP Views from the old HTML.
- Setup Routes in `routes/web.php` and `routes/api.php`.
- Wire to real database.
- Browser manual verification.

**Module Build Order:**
1. **Database:** Migrations and seeders for Indian demo data (Colleges, companies, INR).
2. **Auth Module:** Signup, Login (JWT), Verification, Forgot Password.
3. **Dashboard:** Dynamic cards/stats from DB based on role/college.
4. **Profile:** Editable fields, privacy settings.
5. **Alumni Directory:** Server-side search/filter/pagination.
6. **Mentorship:** Booking, accept/reject, ratings.
7. **Referrals:** Request/approve/reject flow with notifications.
8. **Jobs:** Post/apply/applicant-tracking.
9. **Events:** Registration, QR check-in, certificates.
10. **Community & Messages:** Posts/comments/likes and SSE-based chat.
11. **Marketplaces, Donations, Directories, Hubs:** DB-backed CRUD.
12. **Super Admin Pages:** Analytics, institutions, revenue, settings.
