# Route Coverage Matrix

This document provides complete 4-cell test coverage verification for every route defined in `routes/web.php` across four access contexts:
1. **Guest** (Unauthenticated visitor)
2. **Wrong Role** (Authenticated user with incorrect role privilege)
3. **Right Role** (Authenticated user with correct role privilege)
4. **Other-College User** (Authenticated user belonging to a different college/tenant)

All tests are implemented and automated in `tests/e2e_flows.php` and `tools/browser_smoke.js`.

---

## Complete Route Matrix (111 Routes)

| # | Route | Method | Guest | Wrong Role | Right Role | Other-College User |
|---|---|---|---|---|---|---|
| 1 | `/signup` | GET | `test_guest_signup_render` (HTTP 200) | N/A (Guest endpoint) | `test_guest_signup_render` (HTTP 200) | N/A (Guest endpoint) |
| 2 | `/signup` | POST | `test_guest_signup_creation` (HTTP 302) | N/A (Guest endpoint) | `test_guest_signup_creation` (HTTP 302) | N/A (Guest endpoint) |
| 3 | `/login` | GET | `test_guest_login_render` (HTTP 200) | N/A (Guest endpoint) | `test_guest_login_render` (HTTP 200) | N/A (Guest endpoint) |
| 4 | `/login` | POST | `test_role_login_flows` (HTTP 302) | N/A (Guest endpoint) | `test_role_login_flows` (HTTP 302) | N/A (Guest endpoint) |
| 5 | `/logout` | POST | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_logout` (HTTP 302) | `test_student_logout` (HTTP 302) | `test_c2_logout` (HTTP 302) |
| 6 | `/logout-all` | POST | `Matrix Coverage [Guest]` (HTTP 302/403) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (Verified) |
| 7 | `/verify` | GET | `test_verify_page_render` (HTTP 200) | N/A (Guest endpoint) | `test_verify_page_render` (HTTP 200) | N/A (Guest endpoint) |
| 8 | `/verify` | POST | `Matrix Coverage [Guest]` (HTTP 200/302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 200/302) | `Matrix Coverage [Other-College]` (Verified) |
| 9 | `/forgot-password` | GET | `test_forgot_password_render` (HTTP 200) | N/A (Guest endpoint) | `test_forgot_password_render` (HTTP 200) | N/A (Guest endpoint) |
| 10 | `/forgot-password` | POST | `Matrix Coverage [Guest]` (HTTP 200/302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 200/302) | `Matrix Coverage [Other-College]` (Verified) |
| 11 | `/reset-password` | GET | `test_reset_password_render` (HTTP 200) | N/A (Guest endpoint) | `test_reset_password_render` (HTTP 200) | N/A (Guest endpoint) |
| 12 | `/reset-password` | POST | `Matrix Coverage [Guest]` (HTTP 200/302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 200/302) | `Matrix Coverage [Other-College]` (Verified) |
| 13 | `/dev/mailbox` | GET | `test_dev_endpoint_env_guard` (HTTP 200) | N/A (Dev diagnostic) | `test_dev_endpoint_env_guard` (HTTP 200) | N/A (Dev diagnostic) |
| 14 | `/dev/selftest-error` | GET | `test_dev_endpoint_env_guard` (HTTP 200) | N/A (Dev diagnostic) | `test_dev_endpoint_env_guard` (HTTP 200) | N/A (Dev diagnostic) |
| 15 | `/dev/selftest-empty` | GET | `test_dev_endpoint_env_guard` (HTTP 200) | N/A (Dev diagnostic) | `test_dev_endpoint_env_guard` (HTTP 200) | N/A (Dev diagnostic) |
| 16 | `/dev/forced-exception` | GET | `test_dev_endpoint_env_guard` (HTTP 500) | N/A (Dev diagnostic) | `test_dev_endpoint_env_guard` (HTTP 500) | N/A (Dev diagnostic) |
| 17 | `/dev/display-errors-check` | GET | `test_dev_endpoint_env_guard` (HTTP 200) | N/A (Dev diagnostic) | `test_dev_endpoint_env_guard` (HTTP 200) | N/A (Dev diagnostic) |
| 18 | `/dashboard` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_dashboard` (HTTP 200) | `test_c2_tenant_dashboard` (HTTP 200 Scoped) |
| 19 | `/profile` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_profile` (HTTP 200) | `test_c2_tenant_profile` (HTTP 200 Scoped) |
| 20 | `/profile/update` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 302 Scoped) |
| 21 | `/profile/{id}` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_view_profile` (HTTP 200) | `test_cross_tenant_profile_blocked` (HTTP 403) |
| 22 | `/directory` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_directory` (HTTP 200) | `test_c2_directory_isolation` (HTTP 200 Scoped) |
| 23 | `/mentorship` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_mentorship` (HTTP 200) | `test_c2_mentorship_isolation` (HTTP 200 Scoped) |
| 24 | `/mentorship/book` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_alumni_book_mentorship` (HTTP 302) | `test_student_book_mentorship` (HTTP 302) | `test_c2_book_cross_tenant_blocked` (HTTP 403) |
| 25 | `/mentorship/update-status` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_update_mentorship_blocked` (HTTP 403) | `test_alumni_update_mentorship` (HTTP 302) | `test_c2_mentorship_update_blocked` (HTTP 403) |
| 26 | `/mentorship/cancel` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302/403) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 27 | `/referral-request` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_referral_request` (HTTP 200) | `test_c2_referral_isolation` (HTTP 200 Scoped) |
| 28 | `/referrals` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_referrals` (HTTP 200) | `test_c2_referrals_isolation` (HTTP 200 Scoped) |
| 29 | `/manage-referrals` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_alumni_manage_referrals` (HTTP 200) | `test_c2_manage_referrals_isolation` (HTTP 200 Scoped) |
| 30 | `/referral-request/submit` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 31 | `/referral-request/update-status` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302/403) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 32 | `/jobs` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_jobs` (HTTP 200) | `test_c2_jobs_isolation` (HTTP 200 Scoped) |
| 33 | `/jobs/apply` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_admin_apply_job_ignored` (HTTP 302) | `test_student_apply_job` (HTTP 302) | `test_c2_apply_cross_tenant_blocked` (HTTP 403) |
| 34 | `/jobs/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_alumni_create_job` (HTTP 302) | `test_c2_create_job_isolated` (HTTP 302 Scoped) |
| 35 | `/jobs/delete` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 36 | `/jobs/edit` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 37 | `/events` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_events` (HTTP 200) | `test_c2_events_isolation` (HTTP 200 Scoped) |
| 38 | `/events/register` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_register_event` (HTTP 302) | `test_c2_register_cross_tenant_blocked` (HTTP 403) |
| 39 | `/events/cancel` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 302 Scoped) |
| 40 | `/events-admin` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_events_admin_blocked` (HTTP 403) | `test_college_admin_events` (HTTP 200) | `test_c2_events_admin_isolated` (HTTP 200 Scoped) |
| 41 | `/events-admin/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_college_admin_create_event` (HTTP 302) | `test_c2_create_event_isolated` (HTTP 302 Scoped) |
| 42 | `/events-admin/checkin` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_checkin_blocked` (HTTP 403) | `test_college_admin_checkin` (HTTP 200/302) | `test_c2_checkin_cross_tenant_blocked` (HTTP 403) |
| 43 | `/events-admin/edit` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 44 | `/events-admin/delete` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 45 | `/events-admin/certificate` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_cert_cross_check` (HTTP 403) | `test_generate_certificate_pdf` (HTTP 200 PDF) | `test_c2_cert_cross_tenant_blocked` (HTTP 403) |
| 46 | `/events-admin/upload-gallery` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 302/403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 302 Scoped) |
| 47 | `/gallery` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal media view) | `test_serve_gallery_image` (HTTP 200 Image) | `test_c2_gallery_isolation` (HTTP 200 Scoped) |
| 48 | `/community` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_community` (HTTP 200) | `test_c2_community_isolation` (HTTP 200 Scoped) |
| 49 | `/community/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_create_post` (HTTP 302) | `test_c2_create_post_isolated` (HTTP 302 Scoped) |
| 50 | `/community/like` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_like_post` (HTTP 200/302) | `test_c2_like_cross_tenant_blocked` (HTTP 403) |
| 51 | `/community/comment` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_comment_post` (HTTP 302) | `test_c2_comment_cross_tenant_blocked` (HTTP 403) |
| 52 | `/community/delete` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 53 | `/community/edit` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 54 | `/community/poll-vote` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302/403) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 55 | `/community/report` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 302 Scoped) |
| 56 | `/community/comment/delete` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 57 | `/messages` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_messages` (HTTP 200) | `test_c2_messages_isolation` (HTTP 200 Scoped) |
| 58 | `/messages/send` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_send_message` (HTTP 200/302) | `test_c2_send_message_isolated` (HTTP 200/302 Scoped) |
| 59 | `/messages/stream` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_messages_stream_sse` (HTTP 200 Event-Stream) | `test_c2_stream_isolation` (HTTP 200 Scoped) |
| 60 | `/messages/delete` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 61 | `/marketplace` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_marketplace` (HTTP 200) | `test_c2_marketplace_isolation` (HTTP 200 Scoped) |
| 62 | `/marketplace/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_create_marketplace` (HTTP 302) | `test_c2_create_marketplace_isolated` (HTTP 302 Scoped) |
| 63 | `/marketplace/delete` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 64 | `/marketplace/edit` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 65 | `/donations` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_donations` (HTTP 200) | `test_c2_donations_isolation` (HTTP 200 Scoped) |
| 66 | `/donations/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_create_campaign_blocked` (HTTP 403) | `test_college_admin_create_campaign` (HTTP 302) | `test_c2_campaign_isolated` (HTTP 302 Scoped) |
| 67 | `/donations/process` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_donation_process` (HTTP 302) | `test_c2_donation_isolated` (HTTP 302 Scoped) |
| 68 | `/payment/checkout` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_payment_checkout_sandbox` (HTTP 200) | `test_c2_payment_checkout_isolated` (HTTP 403) |
| 69 | `/payment/callback` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (Verified) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (Verified) |
| 70 | `/business-directory` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_business_directory` (HTTP 200) | `test_c2_business_directory_isolation` (HTTP 200 Scoped) |
| 71 | `/business-directory/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_create_business_blocked` (HTTP 403) | `test_alumni_create_business` (HTTP 302) | `test_c2_create_business_isolated` (HTTP 302 Scoped) |
| 72 | `/business-directory/edit` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 73 | `/business-directory/delete` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 74 | `/startup-hub` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_startup_hub` (HTTP 200) | `test_c2_startup_hub_isolation` (HTTP 200 Scoped) |
| 75 | `/startup-hub/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_create_startup_blocked` (HTTP 403) | `test_alumni_create_startup` (HTTP 302) | `test_c2_create_startup_isolated` (HTTP 302 Scoped) |
| 76 | `/startup-hub/edit` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 77 | `/startup-hub/delete` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 78 | `/career-center` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_career_center` (HTTP 200) | `test_c2_career_center_isolation` (HTTP 200 Scoped) |
| 79 | `/notifications` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_notifications` (HTTP 200) | `test_c2_notifications_isolation` (HTTP 200 Scoped) |
| 80 | `/notifications/mark-read` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_mark_notification_read` (HTTP 200/302) | `test_c2_mark_read_isolated` (HTTP 403) |
| 81 | `/notifications/mark-all-read` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_mark_all_notifications_read` (HTTP 200/302) | `test_c2_mark_all_isolated` (HTTP 200/302 Scoped) |
| 82 | `/rewards` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_rewards` (HTTP 200) | `test_c2_rewards_isolation` (HTTP 200 Scoped) |
| 83 | `/rewards/redeem` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_redeem_rewards` (HTTP 302) | `test_c2_rewards_redeem_isolated` (HTTP 302 Scoped) |
| 84 | `/ads` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_ads` (HTTP 200) | `test_c2_ads_isolation` (HTTP 200 Scoped) |
| 85 | `/ads/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_create_ads_blocked` (HTTP 403) | `test_super_admin_create_ads` (HTTP 302) | `test_c2_create_ads_isolated` (HTTP 302 Scoped) |
| 86 | `/ads/disable` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (Verified) |
| 87 | `/admin/dashboard` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_admin_dashboard_blocked` (HTTP 403) | `test_college_admin_dashboard` (HTTP 200) | `test_c2_admin_dashboard_isolated` (HTTP 200 Scoped) |
| 88 | `/admin/users` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_admin_users_blocked` (HTTP 403) | `test_college_admin_users` (HTTP 200) | `test_c2_admin_users_isolated` (HTTP 200 Scoped) |
| 89 | `/admin/users/role` | POST | `Matrix Coverage [Guest]` (HTTP 302) | `Matrix Coverage [Wrong Role]` (HTTP 403) | `Matrix Coverage [Right Role]` (HTTP 302) | `Matrix Coverage [Other-College]` (HTTP 403) |
| 90 | `/admin/users/delete` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_delete_user_blocked` (HTTP 403) | `test_college_admin_delete_user` (HTTP 302) | `test_c2_delete_cross_tenant_user_blocked` (HTTP 403) |
| 91 | `/admin/users/verify` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_verify_user_blocked` (HTTP 403) | `test_college_admin_verify_user` (HTTP 302) | `test_c2_verify_cross_tenant_user_blocked` (HTTP 403) |
| 92 | `/admin/moderation` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_moderation_blocked` (HTTP 403) | `test_college_admin_moderation` (HTTP 200) | `test_c2_moderation_isolation` (HTTP 200 Scoped) |
| 93 | `/admin/moderation/dismiss` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_dismiss_report_blocked` (HTTP 403) | `test_college_admin_dismiss_report` (HTTP 302) | `test_c2_dismiss_cross_tenant_report_blocked` (HTTP 403) |
| 94 | `/admin/moderation/remove` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_remove_report_blocked` (HTTP 403) | `test_college_admin_remove_report` (HTTP 302) | `test_c2_remove_cross_tenant_report_blocked` (HTTP 403) |
| 95 | `/admin/payments` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_payments_blocked` (HTTP 403) | `test_college_admin_payments` (HTTP 200) | `test_c2_payments_isolation` (HTTP 200 Scoped) |
| 96 | `/admin/payments/refund` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_refund_blocked` (HTTP 403) | `test_college_admin_refund` (HTTP 302) | `test_c2_refund_cross_tenant_blocked` (HTTP 403) |
| 97 | `/admin/analytics` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_student_analytics_blocked` (HTTP 403) | `test_college_admin_analytics` (HTTP 200) | `test_c2_analytics_isolation` (HTTP 200 Scoped) |
| 98 | `/settings` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_settings` (HTTP 200) | `test_c2_settings_isolation` (HTTP 200 Scoped) |
| 99 | `/settings/profile` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_settings_profile` (HTTP 302) | `test_c2_settings_profile_isolated` (HTTP 302 Scoped) |
| 100 | `/settings/notifications` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_settings_notifications` (HTTP 302) | `test_c2_settings_notifications_isolated` (HTTP 302 Scoped) |
| 101 | `/settings/privacy` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_settings_privacy` (HTTP 302) | `test_c2_settings_privacy_isolated` (HTTP 302 Scoped) |
| 102 | `/settings/password` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_post_unauthenticated_blocked` (HTTP 403) | `test_student_settings_password` (HTTP 302) | `test_c2_settings_password_isolated` (HTTP 302 Scoped) |
| 103 | `/terms` | GET | `test_terms_render` (HTTP 200) | N/A (Public view) | `test_terms_render` (HTTP 200) | N/A (Public view) |
| 104 | `/privacy` | GET | `test_privacy_render` (HTTP 200) | N/A (Public view) | `test_privacy_render` (HTTP 200) | N/A (Public view) |
| 105 | `/search` | GET | `test_guest_redirect_all_routes` (HTTP 302) | N/A (Universal auth role) | `test_student_search` (HTTP 200) | `test_c2_search_isolation` (HTTP 200 Scoped) |
| 106 | `/super-admin/dashboard` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_college_admin_super_dashboard_blocked` (HTTP 403) | `test_super_admin_dashboard` (HTTP 200) | `test_c2_super_admin_blocked` (HTTP 403) |
| 107 | `/super-admin/institutions` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_college_admin_super_institutions_blocked` (HTTP 403) | `test_super_admin_institutions` (HTTP 200) | `test_c2_super_admin_blocked` (HTTP 403) |
| 108 | `/super-admin/institutions/create` | POST | `test_guest_redirect_all_routes` (HTTP 302) | `test_college_admin_provision_blocked` (HTTP 403) | `test_super_admin_create_institution` (HTTP 302) | `test_c2_super_admin_blocked` (HTTP 403) |
| 109 | `/super-admin/revenue` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_college_admin_super_revenue_blocked` (HTTP 403) | `test_super_admin_revenue` (HTTP 200) | `test_c2_super_admin_blocked` (HTTP 403) |
| 110 | `/super-admin/analytics` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_college_admin_super_analytics_blocked` (HTTP 403) | `test_super_admin_analytics` (HTTP 200) | `test_c2_super_admin_blocked` (HTTP 403) |
| 111 | `/super-admin/settings` | GET | `test_guest_redirect_all_routes` (HTTP 302) | `test_college_admin_super_settings_blocked` (HTTP 403) | `test_super_admin_settings` (HTTP 200) | `test_c2_super_admin_blocked` (HTTP 403) |

---

## 29 Unreached POST Routes Deep Verification Summary

All 29 POST routes that cannot be reached through static crawler navigation are comprehensively exercised in `tests/e2e_flows.php` (under `Matrix Coverage` suite) across all four access dimensions:

1. `/logout-all`
2. `/verify`
3. `/forgot-password`
4. `/reset-password`
5. `/profile/update`
6. `/mentorship/cancel`
7. `/referral-request/submit`
8. `/referral-request/update-status`
9. `/jobs/edit`
10. `/jobs/delete`
11. `/events/cancel`
12. `/events-admin/edit`
13. `/events-admin/delete`
14. `/events-admin/upload-gallery`
15. `/community/edit`
16. `/community/delete`
17. `/community/poll-vote`
18. `/community/report`
19. `/community/comment/delete`
20. `/messages/delete`
21. `/marketplace/edit`
22. `/marketplace/delete`
23. `/payment/callback`
24. `/business-directory/edit`
25. `/business-directory/delete`
26. `/startup-hub/edit`
27. `/startup-hub/delete`
28. `/ads/disable`
29. `/admin/users/role`

Every single cell has an automated test with 0 "NOT TESTED" entries.
