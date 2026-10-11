# Alumni Connect — Demo Accounts & Access Matrix

All demo accounts share the password:
```text
Password123!
```

---

## 1. College 1: Indian Institute of Technology Bombay (College ID: 1)

| Role | Email | Password | Primary Accessible Dashboard / Features |
|---|---|---|---|
| **Student** | `student@alumni.test` | `Password123!` | `/dashboard`: Student Dashboard, Directory, Jobs, Mentorship, Events RSVP, Community, Messages, Marketplace, Donations. |
| **Alumni** | `alumni@alumni.test` | `Password123!` | `/dashboard`: Alumni Dashboard, Mentorship Management, Peer Referrals Review, Job Posting, Business & Startup Hubs. |
| **College Admin** | `admin@alumni.test` | `Password123!` | `/admin/dashboard`: College Admin Dashboard, User Management, Events Check-In & Certificate Generation, Moderation Queue, College Analytics. |
| **Super Admin** | `superadmin@alumni.test` | `Password123!` | `/super-admin/dashboard`: Global SaaS Overview, Multi-Institution Onboarding & Tier Management, Global Revenue Analytics & CSV Export, Ad Banners. |

---

## 2. College 2: BITS Pilani (College ID: 2 - Tenant Isolation Test Accounts)

| Role | Email | Password | Primary Accessible Dashboard / Features |
|---|---|---|---|
| **Student (C2)** | `student2@alumni.test` | `Password123!` | Scoped strictly to College 2 events, jobs, mentors, and community posts. Blocked from College 1 data. |
| **Alumni (C2)** | `alumni2@alumni.test` | `Password123!` | Scoped strictly to College 2 mentorship and directory listings. |
| **College Admin (C2)** | `admin2@alumni.test` | `Password123!` | `/admin/dashboard`: College 2 admin view, cannot access College 1 records or moderation items. |

---

## 3. How to Test & Verify in Browser

1. Start the server (if not already running):
   ```powershell
   cd "d:\OneDrive\Desktop\WT Project\Alumni-Connect-master"
   & "C:\xampp\php\php.exe" -S localhost:8000 -t public public/index.php
   ```
2. Navigate to `http://localhost:8000/login`
3. Enter any of the above email addresses and `Password123!`
4. Verify dynamic redirection to the corresponding dashboard.
