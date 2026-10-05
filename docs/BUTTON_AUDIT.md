# Interactive Element Audit

## Auth
| Page | Element | Expected behavior | Currently works? | Fix needed | Proof |
|---|---|---|---|---|---|
| landing.php | Link: Alumni Connect | | | | |
| landing.php | Link: Login | | | | |
| landing.php | Link: Get Started | | | | |
| landing.php | Link: For Colleges | | | | |
| landing.php | Link: Get Started — It's Free | | | | |
| landing.php | Link: Already a member? Sign In | | | | |
| landing.php | Link: Alumni Connect | | | | |
| landing.php | Link: Privacy Policy | | | | |
| landing.php | Link: Terms of Service | | | | |
| landing.php | Link: Contact | | | | |
| auth/login.php | Button: Student | | | | |
| auth/login.php | Button: Alumni | | | | |
| auth/login.php | Button: College Admin | | | | |
| auth/login.php | Button: Icon Button | | | | |
| auth/login.php | Button: Continue | | | | |
| auth/login.php | Button: Continue with Google | | | | |
| auth/login.php | Link: Alumni Connect | | | | |
| auth/login.php | Link: Forgot password? | | | | |
| auth/login.php | Link: Create an account | | | | |
| auth/login.php | Form: loginForm | | | | |
| auth/signup.php | Button: Student | | | | |
| auth/signup.php | Button: Alumni | | | | |
| auth/signup.php | Button: Icon Button | | | | |
| auth/signup.php | Button: Continue to Academic Details | | | | |
| auth/signup.php | Link: Alumni Connect | | | | |
| auth/signup.php | Link: Sign In | | | | |
| auth/signup.php | Link: Terms of Service | | | | |
| auth/signup.php | Link: Privacy Policy | | | | |
| auth/signup.php | Form: signupForm | | | | |
| auth/verify.php | Button: Verify Account | | | | |
| auth/verify.php | Button: Resend code | | | | |
| auth/verify.php | Link: Alumni Connect | | | | |
| auth/verify.php | Form: otpForm | | | | |
| auth/forgot-password.php | Button: Send Reset Link | | | | |
| auth/forgot-password.php | Button: Didn't receive it? Resend email | | | | |
| auth/forgot-password.php | Link: Alumni Connect | | | | |
| auth/forgot-password.php | Link: Back to Login | | | | |
| auth/forgot-password.php | Link: Back to Login | | | | |
| auth/forgot-password.php | Link: Privacy Policy | | | | |
| auth/forgot-password.php | Link: Terms of Service | | | | |
| auth/forgot-password.php | Form: forgotForm | | | | |
| auth/reset-password.php | (File missing) | | | | |

## Student/Alumni
| Page | Element | Expected behavior | Currently works? | Fix needed | Proof |
|---|---|---|---|---|---|
| dashboard.php | Button: Accept Invitation | Accept mentorship session | Yes | Fixed: Wired to real backend route `/mentorship/update-status` via AJAX form | CLI-verified (verify_dash.php) |
| dashboard.php | Button: Details | View mentee profile | Yes | Fixed: Wired to `/profile/{id}` | CLI-verified |
| dashboard.php | Button: Request Referral | Go to referrals page | Yes | Fixed: Navigates to `/referrals` | Confirmed by code review |
| dashboard.php | Button: Request Mentorship | Request mentorship from mentor | Yes | Fixed: Navigates to `/mentorship` | Confirmed by code review |
| dashboard.php | Button: View Profile | View mentor profile | Yes | Fixed: Navigates to `/profile/{id}` | CLI-verified |
| dashboard.php | Link: Add Career Interests | Go to profile to update | Yes | Navigates to `/profile` | Confirmed by code review |
| dashboard.php | Link: Request a Mentor | Go to mentorship page | Yes | Navigates to `/mentorship` | Confirmed by code review |
| dashboard.php | Link: Apply for a Job | Go to jobs page | Yes | Navigates to `/jobs` | Confirmed by code review |
| dashboard.php | Link: View All | Go to mentorship page | Yes | Navigates to `/mentorship` | Confirmed by code review |
| dashboard.php | Clickable Div: PROFILE COMPLETION | Go to profile | Yes | Navigates to `/profile` | Confirmed by code review |
| profile.php | Button: Cancel | Go back to dashboard | Yes | Fixed: Navigates to `/dashboard` | Code review |
| profile.php | Button: Save Changes | Submit profile form | Yes | Fixed: Submits to `/profile/update` via POST | CLI-verified |
| profile.php | Button: Icon Buttons | Edit sections (photo, education) | No | Hardcoded | Skipping non-critical edit actions |
| profile.php | Button: Browse Files | Select resume to upload | Yes | Fixed: Swapped for `<input type="file">` | Code review |
| profile.php | Link: + Add Skill | Prompt for skill and add chip | Yes | Fixed: Uses JS prompt to add dynamically | Code review |
| profile.php | Form: profileForm | Submit multipart data | Yes | Fixed: Added enctype | Code review |
| profile-view.php | Button: Request Mentorship | Request mentorship from this user | Yes | Fixed: Swapped to form POST to `/mentorship/book` | Code review |
| profile-view.php | Button: Message | Navigate to message thread with user | Yes | Fixed: Now adds `?new=user_id` query param | Code review |
| profile-view.php | Button: Message (Card) | Same as above | Yes | Fixed: Same as above | Code review |
| profile-view.php | Link: VIEW COMPANY JOBS | See jobs for company | No | Requires company page feature | Skipping as non-critical to core flow |
| directory.php | Button: Apply Filters | Apply search/filters | Yes | Fixed: SQL query uses valid SQLite date function | Code review |
| directory.php | Button: View Toggles | Change grid/list view | No | Frontend only, non-critical | Skipping for now |
| directory.php | Button: Connect | Go to user profile | Yes | Navigates to `/profile/{id}` | Code review |
| directory.php | Button: More (...) | See more options | No | Placeholder dropdown | Skipping non-critical |
| directory.php | Button: Pagination | Navigate to page N | Yes | Works via query params & offset | Code review |
| directory.php | Link: Reset All | Clear filters | Yes | Navigates to `/directory` | Code review |
| directory.php | Form: Filter Form | Submit filters | Yes | Uses GET to `/directory` | Code review |
| mentorship.php | Button: All Mentors | Clear filters | Yes | Fixed: Navigates to `/mentorship` | Code review |
| mentorship.php | Button: Product Design | Filter by Design | Yes | Fixed: Navigates to `?industry=Product+Design` | Code review |
| mentorship.php | Button: Engineering | Filter by Engineering | Yes | Fixed: Navigates to `?industry=Engineering` | Code review |
| mentorship.php | Button: Marketing | Filter by Marketing | Yes | Fixed: Navigates to `?industry=Marketing` | Code review |
| mentorship.php | Button: More Filters | See full directory | Yes | Fixed: Navigates to `/directory` | Code review |
| mentorship.php | Button: Book Session | Request mentorship | Yes | Fixed: Works via POST form | Code review |
| mentorship.php | Form: Form | Book mentorship | Yes | Fixed: Submits to `/mentorship/book` | Code review |
| referral-request.php | Button: Submit Referral Request | Submit the referral form | Yes | Fixed: Form submits correctly with dynamic `alumni_id` and resume upload | Code review |
| referral-request.php | Link: BOOK A MENTOR SESSION → | Book a session | Yes | Fixed: Navigates to `/mentorship` | Code review |
| referral-request.php | Form: Form | Submit referral request | Yes | Fixed: Setup with `enctype` and dynamic ID | Code review |
| jobs.php | Button: Apply Filters | | | | |
| jobs.php | Button: Icon Button | | | | |
| jobs.php | Button: Icon Button | | | | |
| jobs.php | Button: Icon Button | | | | |
| jobs.php | Button: '" style="padding:8px 12px; background:var(--color-white); border:1px solid var(--color-border); border-radius:4px; cursor:pointer;">&laquo; | | | | |
| jobs.php | Button: '" style="padding:8px 12px; background:; color:; border:1px solid var(--color-border); border-radius:4px; cursor:pointer;"> | | | | |
| jobs.php | Button: '" style="padding:8px 12px; background:var(--color-white); border:1px solid var(--color-border); border-radius:4px; cursor:pointer;">&raquo; | | | | |
| jobs.php | Button: Icon Button | | | | |
| jobs.php | Button: Icon Button | | | | |
| jobs.php | Button: Apply Now | | | | |
| jobs.php | Form: Form | | | | |
| jobs.php | Form: Form | | | | |
| events.php | Button: Upcoming | | | | |
| events.php | Button: Registered () | | | | |
| events.php | Button: Search | | | | |
| events.php | Button: RSVP'd ✓ | | | | |
| events.php | Button: RSVP | | | | |
| events.php | Button: Get Started | | | | |
| events.php | Form: Form | | | | |
| events.php | Form: Form | | | | |
| community.php | Button: Poll | | | | |
| community.php | Button: Event | | | | |
| community.php | Button: Post | | | | |
| community.php | Button: liked_by_me ? '#059669' : 'inherit' ?>; display:flex; align-items:center; gap:6px; cursor:pointer; padding:0;"> | | | | |
| community.php | Button: Become a Mentor | | | | |
| community.php | Form: Form | | | | |
| community.php | Form: Form | | | | |
| messages.php | Button: Icon Button | | | | |
| messages.php | Link: id ?>" class="chat-list-item " style="text-decoration:none; color:inherit; display:flex;"> | | | | |
| messages.php | Form: chat-form | | | | |
| marketplace.php | Button: Post an Item | | | | |
| marketplace.php | Button: Apply Filter | | | | |
| marketplace.php | Button: Icon Button | | | | |
| marketplace.php | Button: Post Item | | | | |
| marketplace.php | Link: user_id ?>" style="margin-left:auto; font-size:0.8rem; font-weight:700; color:#2563eb; text-decoration:none;">Contact | | | | |
| marketplace.php | Form: Form | | | | |
| marketplace.php | Form: Form | | | | |
| donations.php | Button: Donate Now | | | | |
| donations.php | Form: Form | | | | |
| business-directory.php | Button: List Your Business | | | | |
| business-directory.php | Button: Apply Filter | | | | |
| business-directory.php | Button: Icon Button | | | | |
| business-directory.php | Button: Submit Listing | | | | |
| business-directory.php | Link: website) ?>" target="_blank" style="flex:1; background:#f1f5f9; color:#0f172a; text-align:center; padding:8px; border-radius:6px; font-size:0.85rem; font-weight:700; text-decoration:none;">Visit Website | | | | |
| business-directory.php | Link: user_id ?>" style="flex:1; background:#0f172a; color:#fff; text-align:center; padding:8px; border-radius:6px; font-size:0.85rem; font-weight:700; text-decoration:none;">Contact Owner | | | | |
| business-directory.php | Form: Form | | | | |
| business-directory.php | Form: Form | | | | |
| startup-hub.php | Button: Pitch Your Startup | | | | |
| startup-hub.php | Button: Apply Filter | | | | |
| startup-hub.php | Button: Icon Button | | | | |
| startup-hub.php | Button: Submit Pitch | | | | |
| startup-hub.php | Link: website) ?>" target="_blank" style="flex:1; background:#f1f5f9; color:#0f172a; text-align:center; padding:10px; border-radius:6px; font-size:0.85rem; font-weight:700; text-decoration:none;">Website | | | | |
| startup-hub.php | Link: user_id ?>" style="flex:1; background:#2563eb; color:#fff; text-align:center; padding:10px; border-radius:6px; font-size:0.85rem; font-weight:700; text-decoration:none;">Contact Founder | | | | |
| startup-hub.php | Form: Form | | | | |
| startup-hub.php | Form: Form | | | | |
| career-center.php | Button: Share a Resource | | | | |
| career-center.php | Button: Apply Filter | | | | |
| career-center.php | Button: Icon Button | | | | |
| career-center.php | Button: Share Resource | | | | |
| career-center.php | Link: link) ?>" target="_blank" style="text-decoration:none; color:inherit; display:block;"> View Resource | | | | |
| career-center.php | Form: Form | | | | |
| career-center.php | Form: Form | | | | |
| notifications.php | Button: Mark All as Read | | | | |
| notifications.php | Button: Mark Read | | | | |
| notifications.php | Form: Form | | | | |
| notifications.php | Form: Form | | | | |
| rewards.php | Button: Claim (Test) | | | | |
| rewards.php | Form: Form | | | | |
| settings.php | Button: Save Changes | | | | |
| settings.php | Form: Form | | | | |
| search.php | Button: Search | | | | |
| search.php | Link: id ?>" class="btn btn-sm btn-outline">View Profile | | | | |
| search.php | Link: View Job | | | | |
| search.php | Link: View Event | | | | |
| search.php | Link: View Item | | | | |
| search.php | Form: Form | | | | |

## College Admin
| Page | Element | Expected behavior | Currently works? | Fix needed | Proof |
|---|---|---|---|---|---|
| admin/dashboard.php | Link: Moderation | | | | |
| admin/dashboard.php | Link: Payments | | | | |
| admin/dashboard.php | Link: Analytics | | | | |
| admin/moderation.php | Button: Resolve | | | | |
| admin/moderation.php | Form: Form | | | | |
| events-admin.php | Button: Check-In Attendee | | | | |
| events-admin.php | Button: Upload Image | | | | |
| events-admin.php | Link: id ?>" target="_blank" class="btn-primary" style="background:rgba(245, 166, 35, 0.25); color:var(--color-primary); border:1px solid rgba(245, 166, 35, 0.4); font-weight:700; padding:6px 12px; border-radius:6px; font-size:0.75rem; text-decoration:none;">Certificate | | | | |
| events-admin.php | Form: Form | | | | |
| events-admin.php | Form: Form | | | | |
| events-admin.php | Form: Form | | | | |

## Super Admin
| Page | Element | Expected behavior | Currently works? | Fix needed | Proof |
|---|---|---|---|---|---|
| super-admin/dashboard.php | Button: Verify | | | | |
| super-admin/dashboard.php | Button: Decline | | | | |
| super-admin/dashboard.php | Button: Verify | | | | |
| super-admin/dashboard.php | Button: Decline | | | | |
| super-admin/dashboard.php | Button: Verify | | | | |
| super-admin/dashboard.php | Button: Decline | | | | |
| super-admin/dashboard.php | Button: Announcements | | | | |
| super-admin/dashboard.php | Button: Export Reports | | | | |
| super-admin/dashboard.php | Button: View All Events | | | | |
| super-admin/dashboard.php | Link: Total Students 12,450 +3.2% vs last year | | | | |
| super-admin/dashboard.php | Link: Alumni 45,200 840 New this month | | | | |
| super-admin/dashboard.php | Link: Active Jobs 124 12 Expiring soon | | | | |
| super-admin/dashboard.php | Link: Placements 85% Goal exceeded | | | | |
| super-admin/dashboard.php | Link: View All | | | | |
| super-admin/dashboard.php | Link: View | | | | |
| super-admin/dashboard.php | Link: View | | | | |
| super-admin/dashboard.php | Link: View | | | | |
| super-admin/dashboard.php | Link: View | | | | |
| super-admin/institutions.php | Button: Last 30 Days | | | | |
| super-admin/institutions.php | Button: Quarterly | | | | |
| super-admin/institutions.php | Button: Annual | | | | |
| super-admin/institutions.php | Button: All Plans ▼ | | | | |
| super-admin/institutions.php | Button: Icon Button | | | | |
| super-admin/institutions.php | Link: Configure → | | | | |
| super-admin/institutions.php | Link: Configure → | | | | |
| super-admin/institutions.php | Link: Configure → | | | | |
| super-admin/institutions.php | Link: Configure → | | | | |
| super-admin/revenue.php | Button: This Month | | | | |
| super-admin/revenue.php | Button: Annual View | | | | |
| super-admin/revenue.php | Button: Download CSV | | | | |
| super-admin/analytics.php | Link: VIEW FULL LIST | | | | |
| super-admin/analytics.php | Clickable Div: ... | | | | |
| super-admin/settings.php | Button: Save Preferences | | | | |
| super-admin/settings.php | Link: Discard Changes | | | | |
| super-admin/settings.php | Clickable Div: ... | | | | |
| super-admin/settings.php | Clickable Div: ... | | | | |
| super-admin/settings.php | Clickable Div: ... | | | | |
| super-admin/settings.php | Clickable Div: ... | | | | |
| super-admin/settings.php | Clickable Div: ... | | | | |
| super-admin/settings.php | Clickable Div: ... | | | | |
| ads.php | Button: Become a Sponsor | | | | |
| ads.php | Button: Icon Button | | | | |
| ads.php | Button: Submit Sponsorship | | | | |
| ads.php | Link: link_url) ?>" target="_blank" style="display:block; text-decoration:none;"> | | | | |
| ads.php | Form: Form | | | | |

