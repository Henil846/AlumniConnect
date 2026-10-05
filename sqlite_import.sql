-- Database Export



DROP TABLE IF EXISTS "advertisements";
CREATE TABLE "advertisements" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "sponsor_name" varchar(255) DEFAULT NULL,
  "image_url" varchar(255) DEFAULT NULL,
  "link_url" varchar(255) DEFAULT NULL,
  "status" varchar(50) DEFAULT 'active',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

INSERT INTO "advertisements" ("id", "sponsor_name", "image_url", "link_url", "status", "created_at") VALUES ('1', 'Test Sponsor', 'http://example.com/img.jpg', 'http://example.com', 'active', '2026-10-04 18:06:40');
INSERT INTO "advertisements" ("id", "sponsor_name", "image_url", "link_url", "status", "created_at") VALUES ('2', 'Subagent Sponsor', 'http://sponsor.com/img.png', 'http://sponsor.com', 'active', '2026-10-04 19:03:19');

DROP TABLE IF EXISTS "badges";
CREATE TABLE "badges" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "name" varchar(100) DEFAULT NULL,
  "description" text,
  "icon" varchar(255) DEFAULT NULL
) ;

INSERT INTO "badges" ("id", "name", "description", "icon") VALUES ('1', 'Early Adopter', 'Joined the platform early.', '🚀');
INSERT INTO "badges" ("id", "name", "description", "icon") VALUES ('2', 'Top Contributor', 'Posts frequently in community.', '🌟');

DROP TABLE IF EXISTS "businesses";
CREATE TABLE "businesses" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "name" varchar(255) DEFAULT NULL,
  "description" text,
  "website" varchar(255) DEFAULT NULL,
  "category" varchar(100) DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "businesses" ("id", "user_id", "name", "description", "website", "category", "created_at", "college_id") VALUES ('1', '1', 'Alumni Tech Solutions', 'IT Consulting for Alumni', 'https://alumnitech.example.com', 'tech', '2026-10-04 17:59:07', '1');
INSERT INTO "businesses" ("id", "user_id", "name", "description", "website", "category", "created_at", "college_id") VALUES ('2', '4', 'Test Tech', 'A test business', 'http://test.com', 'tech', '2026-10-04 18:55:46', '1');

DROP TABLE IF EXISTS "campaigns";
CREATE TABLE "campaigns" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "title" varchar(255) DEFAULT NULL,
  "description" text,
  "goal_amount" decimal(10,2) DEFAULT NULL,
  "raised_amount" decimal(10,2) DEFAULT '0.00',
  "created_by" INTEGER DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "campaigns" ("id", "title", "description", "goal_amount", "raised_amount", "created_by", "created_at", "college_id") VALUES ('1', 'Scholarship Fund', 'Help students in need.', '10000.00', '600.00', '1', '2026-10-04 17:58:00', '1');

DROP TABLE IF EXISTS "career_resources";
CREATE TABLE "career_resources" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "title" varchar(255) DEFAULT NULL,
  "link" varchar(255) DEFAULT NULL,
  "resource_type" varchar(50) DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "career_resources" ("id", "title", "link", "resource_type", "created_at", "college_id") VALUES ('1', 'How to Ace the Coding Interview', 'https://example.com/interview', 'interview', '2026-10-04 18:01:28', '1');
INSERT INTO "career_resources" ("id", "title", "link", "resource_type", "created_at", "college_id") VALUES ('2', 'Test Resource', 'http://testresource.com', 'resume', '2026-10-04 18:59:42', '1');

DROP TABLE IF EXISTS "colleges";
CREATE TABLE "colleges" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "name" varchar(255) NOT NULL,
  "city" varchar(100) NOT NULL,
  "state" varchar(100) NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('1', 'Indian Institute of Technology Bombay', 'Mumbai', 'Maharashtra', '2026-10-03 20:04:18');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('2', 'Indian Institute of Technology Delhi', 'New Delhi', 'Delhi', '2026-10-03 20:04:18');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('3', 'Birla Institute of Technology and Science', 'Pilani', 'Rajasthan', '2026-10-03 20:04:18');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('4', 'National Institute of Technology Trichy', 'Tiruchirappalli', 'Tamil Nadu', '2026-10-03 20:04:18');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('5', 'Vellore Institute of Technology', 'Vellore', 'Tamil Nadu', '2026-10-03 20:04:18');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('6', 'College A', 'City', 'State', '2026-10-04 20:06:23');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('7', 'College B', 'City', 'State', '2026-10-04 20:06:23');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('8', 'College A', 'City', 'State', '2026-10-04 20:06:47');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('9', 'College B', 'City', 'State', '2026-10-04 20:06:47');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('10', 'College A', 'City', 'State', '2026-10-04 20:07:10');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('11', 'College B', 'City', 'State', '2026-10-04 20:07:10');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('12', 'College A', 'City', 'State', '2026-10-04 20:07:46');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('13', 'College B', 'City', 'State', '2026-10-04 20:07:46');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('20', 'College A Search', 'City', 'State', '2026-10-04 20:41:45');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('21', 'College B Search', 'City', 'State', '2026-10-04 20:41:45');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('22', 'College A Search', 'City', 'State', '2026-10-04 20:46:22');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('23', 'College B Search', 'City', 'State', '2026-10-04 20:46:22');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('24', 'College A Search', 'City', 'State', '2026-10-04 20:47:20');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('25', 'College B Search', 'City', 'State', '2026-10-04 20:47:20');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('26', 'College A Search', 'City', 'State', '2026-10-04 20:49:48');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('27', 'College B Search', 'City', 'State', '2026-10-04 20:49:48');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('28', 'College A Search', 'City', 'State', '2026-10-04 20:50:33');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('29', 'College B Search', 'City', 'State', '2026-10-04 20:50:33');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('30', 'College A Search', 'City', 'State', '2026-10-04 20:51:12');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('31', 'College B Search', 'City', 'State', '2026-10-04 20:51:12');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('38', 'College A Search', 'City', 'State', '2026-10-04 21:38:32');
INSERT INTO "colleges" ("id", "name", "city", "state", "created_at") VALUES ('39', 'College B Search', 'City', 'State', '2026-10-04 21:38:32');

DROP TABLE IF EXISTS "donations";
CREATE TABLE "donations" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "campaign_id" INTEGER DEFAULT NULL,
  "amount" decimal(10,2) DEFAULT NULL,
  "status" varchar(50) DEFAULT 'completed',
  "transaction_id" varchar(255) DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

INSERT INTO "donations" ("id", "user_id", "campaign_id", "amount", "status", "transaction_id", "created_at") VALUES ('1', '1', '1', '500.00', 'completed', 'TXN_12345', '2026-10-04 17:58:00');
INSERT INTO "donations" ("id", "user_id", "campaign_id", "amount", "status", "transaction_id", "created_at") VALUES ('2', '4', '1', '100.00', 'completed', 'TXN_6AC2537772787', '2026-10-04 18:54:07');

DROP TABLE IF EXISTS "email_verifications";
CREATE TABLE "email_verifications" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER NOT NULL,
  "otp" varchar(10) NOT NULL,
  "expires_at" timestamp NOT NULL,
  KEY "user_id" ("user_id"),
  CONSTRAINT "email_verifications_ibfk_1" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE CASCADE
) ;

INSERT INTO "email_verifications" ("id", "user_id", "otp", "expires_at") VALUES ('2', '6', '134347', '2026-10-04 02:23:20');
INSERT INTO "email_verifications" ("id", "user_id", "otp", "expires_at") VALUES ('3', '7', '382402', '2026-10-04 02:29:10');
INSERT INTO "email_verifications" ("id", "user_id", "otp", "expires_at") VALUES ('4', '19', '571129', '2026-10-04 21:34:28');

DROP TABLE IF EXISTS "event_gallery";
CREATE TABLE "event_gallery" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "event_id" INTEGER NOT NULL,
  "file_path" varchar(255) NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY "event_id" ("event_id"),
  CONSTRAINT "event_gallery_ibfk_1" FOREIGN KEY ("event_id") REFERENCES "events" ("id") ON DELETE CASCADE
) ;

INSERT INTO "event_gallery" ("id", "event_id", "file_path", "created_at") VALUES ('1', '4', 'gallery_4_1791110324.png', '2026-10-04 16:08:44');

DROP TABLE IF EXISTS "event_registrations";
CREATE TABLE "event_registrations" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "event_id" INTEGER NOT NULL,
  "user_id" INTEGER NOT NULL,
  "status" varchar(100) DEFAULT 'registered',
  "qr_code" varchar(255) DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL,
  KEY "event_id" ("event_id"),
  KEY "user_id" ("user_id"),
  CONSTRAINT "event_registrations_ibfk_1" FOREIGN KEY ("event_id") REFERENCES "events" ("id") ON DELETE CASCADE,
  CONSTRAINT "event_registrations_ibfk_2" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE CASCADE
) ;

INSERT INTO "event_registrations" ("id", "event_id", "user_id", "status", "qr_code", "created_at", "college_id") VALUES ('1', '3', '3', 'attended', '42c7c9e2024e881b1a17fe5ac1ee5c29', '2026-10-04 00:45:59', '1');
INSERT INTO "event_registrations" ("id", "event_id", "user_id", "status", "qr_code", "created_at", "college_id") VALUES ('3', '4', '5', 'waitlisted', '2f44d8865ac204250a8fe55eb35b73c9', '2026-10-04 01:20:38', '1');

DROP TABLE IF EXISTS "events";
CREATE TABLE "events" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "title" varchar(255) NOT NULL,
  "type" varchar(100) NOT NULL,
  "date" datetime NOT NULL,
  "location" varchar(255) NOT NULL,
  "image_url" varchar(255) DEFAULT NULL,
  "description" text,
  "speakers" text,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "capacity" INTEGER DEFAULT '100',
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "events" ("id", "title", "type", "date", "location", "image_url", "description", "speakers", "created_at", "capacity", "college_id") VALUES ('1', 'Tech Innovators Mixer', 'Networking', '2026-10-06 18:00:00', 'Downtown Tech Hub, Seattle', '/assets/img/signup_side_img.png', 'Connect with leading alumni in the tech space.', 'Sarah Jenkins', '2026-10-04 00:40:25', '100', '1');
INSERT INTO "events" ("id", "title", "type", "date", "location", "image_url", "description", "speakers", "created_at", "capacity", "college_id") VALUES ('2', 'Resume Building Workshop', 'Workshop', '2026-10-13 14:00:00', 'Virtual (Zoom)', '/assets/img/login_side_img.png', 'Learn how to craft a standout resume.', 'HR Team', '2026-10-04 00:40:25', '100', '1');
INSERT INTO "events" ("id", "title", "type", "date", "location", "image_url", "description", "speakers", "created_at", "capacity", "college_id") VALUES ('3', 'Annual Alumni Gala', 'Social', '2026-10-18 09:00:00', 'Grand Hotel, NY', '/assets/img/signup_side_img.png', 'Our biggest event of the year.', 'President', '2026-10-04 00:40:25', '100', '1');
INSERT INTO "events" ("id", "title", "type", "date", "location", "image_url", "description", "speakers", "created_at", "capacity", "college_id") VALUES ('4', 'Capacity Test Event', 'Networking', '2026-12-01 00:00:00', 'Test Hall', '/assets/img/test.jpg', 'Test Description', NULL, '2026-10-04 01:10:02', '1', '1');

DROP TABLE IF EXISTS "job_applications";
CREATE TABLE "job_applications" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "job_id" INTEGER NOT NULL,
  "user_id" INTEGER NOT NULL,
  "status" varchar(100) DEFAULT 'applied',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL DEFAULT '1',
  KEY "job_id" ("job_id"),
  KEY "user_id" ("user_id"),
  CONSTRAINT "job_applications_ibfk_1" FOREIGN KEY ("job_id") REFERENCES "jobs" ("id") ON DELETE CASCADE,
  CONSTRAINT "job_applications_ibfk_2" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE CASCADE
) ;

INSERT INTO "job_applications" ("id", "job_id", "user_id", "status", "created_at", "college_id") VALUES ('1', '1', '3', 'applied', '2026-10-04 00:35:10', '1');
INSERT INTO "job_applications" ("id", "job_id", "user_id", "status", "created_at", "college_id") VALUES ('2', '1', '3', 'applied', '2026-10-04 18:32:33', '1');
INSERT INTO "job_applications" ("id", "job_id", "user_id", "status", "created_at", "college_id") VALUES ('3', '1', '3', 'applied', '2026-10-04 18:47:24', '1');

DROP TABLE IF EXISTS "jobs";
CREATE TABLE "jobs" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "title" varchar(255) NOT NULL,
  "company" varchar(255) NOT NULL,
  "location" varchar(255) NOT NULL,
  "industry" varchar(255) NOT NULL,
  "type" varchar(100) NOT NULL,
  "salary_range" varchar(100) DEFAULT NULL,
  "description" text,
  "requirements" text,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('1', 'Senior UI Designer', 'BlueWave Technologies', 'San Francisco, CA (Remote)', 'Technology', 'Full-time', '$140k - $180k', 'Looking for a Senior UI Designer to lead the visual evolution...', '5+ years experience, Figma', '2026-10-04 00:31:36', '1');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('2', 'Investment Analyst', 'Goldstone Capital', 'New York City, NY', 'Financial Services', 'Full-time', '$110k - $150k', 'Analyze investments...', 'Strong math skills', '2026-10-04 00:31:36', '1');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('3', 'Creative Strategist', 'Vivid Collective', 'London, UK', 'Creative Arts', 'Hybrid', '£70k - £90k', 'Be creative...', 'Agency experience', '2026-10-04 00:31:36', '1');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('12', 'GlobalTerm1791126705', 'Company A', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:41:45', '20');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('13', 'GlobalTerm1791126705', 'Company B', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:41:45', '21');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('14', 'GlobalTerm1791126982', 'Company A', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:46:22', '22');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('15', 'GlobalTerm1791126982', 'Company B', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:46:22', '23');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('16', 'GlobalTerm1791127040', 'Company A', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:47:20', '24');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('17', 'GlobalTerm1791127040', 'Company B', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:47:20', '25');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('18', 'GlobalTerm1791127188', 'Company A', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:49:48', '26');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('19', 'GlobalTerm1791127188', 'Company B', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:49:48', '27');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('20', 'GlobalTerm1791127233', 'Company A', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:50:33', '28');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('21', 'GlobalTerm1791127233', 'Company B', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:50:33', '29');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('22', 'GlobalTerm1791127272', 'Company A', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:51:12', '30');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('23', 'GlobalTerm1791127272', 'Company B', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 20:51:12', '31');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('24', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full-time', NULL, NULL, NULL, '2026-10-04 21:25:29', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('25', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full-time', NULL, NULL, NULL, '2026-10-04 21:26:02', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('26', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full-time', NULL, NULL, NULL, '2026-10-04 21:26:37', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('27', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full', NULL, NULL, NULL, '2026-10-04 21:27:57', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('28', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full', NULL, NULL, NULL, '2026-10-04 21:29:14', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('29', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full', NULL, NULL, NULL, '2026-10-04 21:29:53', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('30', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full', NULL, NULL, NULL, '2026-10-04 21:30:31', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('31', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full', NULL, NULL, NULL, '2026-10-04 21:32:23', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('38', 'College B Job', 'B Inc', 'Remote', 'Tech', 'Full', NULL, NULL, NULL, '2026-10-04 21:38:17', '2');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('39', 'GlobalTerm1791130113', 'Company A', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 21:38:33', '38');
INSERT INTO "jobs" ("id", "title", "company", "location", "industry", "type", "salary_range", "description", "requirements", "created_at", "college_id") VALUES ('40', 'GlobalTerm1791130113', 'Company B', 'Loc', 'Tech', 'Full-time', '100k', 'Desc', NULL, '2026-10-04 21:38:33', '39');

DROP TABLE IF EXISTS "login_attempts";
CREATE TABLE "login_attempts" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "email" varchar(255) NOT NULL,
  "ip_address" varchar(45) NOT NULL,
  "attempt_time" timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

INSERT INTO "login_attempts" ("id", "email", "ip_address", "attempt_time") VALUES ('1', 'user3@example.com', '::1', '2026-10-04 01:21:27');
INSERT INTO "login_attempts" ("id", "email", "ip_address", "attempt_time") VALUES ('2', 'user3@example.com', '::1', '2026-10-04 01:22:06');
INSERT INTO "login_attempts" ("id", "email", "ip_address", "attempt_time") VALUES ('3', 'user2@example.com', '::1', '2026-10-04 01:26:07');
INSERT INTO "login_attempts" ("id", "email", "ip_address", "attempt_time") VALUES ('4', 'student1@example.com', '::1', '2026-10-04 01:29:52');
INSERT INTO "login_attempts" ("id", "email", "ip_address", "attempt_time") VALUES ('5', 'Password123!', '::1', '2026-10-04 17:09:37');

DROP TABLE IF EXISTS "marketplace_items";
CREATE TABLE "marketplace_items" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "title" varchar(255) DEFAULT NULL,
  "description" text,
  "price" decimal(10,2) DEFAULT NULL,
  "item_condition" varchar(50) DEFAULT NULL,
  "category" varchar(100) DEFAULT NULL,
  "status" varchar(50) DEFAULT 'available',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "marketplace_items" ("id", "user_id", "title", "description", "price", "item_condition", "category", "status", "created_at", "college_id") VALUES ('1', '1', 'Used iPhone 13', 'Good condition, no scratches.', '450.00', 'good', 'electronics', 'available', '2026-10-04 17:56:56', '1');
INSERT INTO "marketplace_items" ("id", "user_id", "title", "description", "price", "item_condition", "category", "status", "created_at", "college_id") VALUES ('2', '3', 'Test Item', 'Test', '10.00', 'new', 'other', 'available', '2026-10-04 18:32:33', '1');
INSERT INTO "marketplace_items" ("id", "user_id", "title", "description", "price", "item_condition", "category", "status", "created_at", "college_id") VALUES ('3', '3', 'Test Item', 'Test', '10.00', 'new', 'other', 'available', '2026-10-04 18:47:24', '1');
INSERT INTO "marketplace_items" ("id", "user_id", "title", "description", "price", "item_condition", "category", "status", "created_at", "college_id") VALUES ('4', '4', 'Test Desk', 'A desk', '50.00', 'good', 'furniture', 'available', '2026-10-04 18:52:52', '1');

DROP TABLE IF EXISTS "mentorship_sessions";
CREATE TABLE "mentorship_sessions" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "mentor_id" INTEGER NOT NULL,
  "mentee_id" INTEGER NOT NULL,
  "status" varchar(50) DEFAULT 'pending',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "mentorship_sessions" ("id", "mentor_id", "mentee_id", "status", "created_at", "college_id") VALUES ('4', '2', '4', 'pending', '2026-10-04 19:28:07', '2');
INSERT INTO "mentorship_sessions" ("id", "mentor_id", "mentee_id", "status", "created_at", "college_id") VALUES ('5', '36', '35', 'pending', '2026-10-04 21:21:23', '1');
INSERT INTO "mentorship_sessions" ("id", "mentor_id", "mentee_id", "status", "created_at", "college_id") VALUES ('6', '53', '53', 'pending', '2026-10-04 21:32:24', '1');
INSERT INTO "mentorship_sessions" ("id", "mentor_id", "mentee_id", "status", "created_at", "college_id") VALUES ('7', '61', '61', 'pending', '2026-10-04 21:38:17', '1');

DROP TABLE IF EXISTS "messages";
CREATE TABLE "messages" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "sender_id" INTEGER NOT NULL,
  "receiver_id" INTEGER NOT NULL,
  "content" text NOT NULL,
  "attachment_url" varchar(255) DEFAULT NULL,
  "is_read" tinyINTEGER DEFAULT '0',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL,
  KEY "sender_id" ("sender_id"),
  KEY "receiver_id" ("receiver_id"),
  CONSTRAINT "messages_ibfk_1" FOREIGN KEY ("sender_id") REFERENCES "users" ("id") ON DELETE CASCADE,
  CONSTRAINT "messages_ibfk_2" FOREIGN KEY ("receiver_id") REFERENCES "users" ("id") ON DELETE CASCADE
) ;

INSERT INTO "messages" ("id", "sender_id", "receiver_id", "content", "attachment_url", "is_read", "created_at", "college_id") VALUES ('3', '4', '2', 'Test msg from CLI', NULL, '0', '2026-10-04 19:28:07', '1');

DROP TABLE IF EXISTS "notifications";
CREATE TABLE "notifications" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "type" varchar(50) DEFAULT NULL,
  "message" text,
  "is_read" tinyINTEGER DEFAULT '0',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "notifications" ("id", "user_id", "type", "message", "is_read", "created_at", "college_id") VALUES ('1', '1', 'system', 'Welcome to Alumni Connect!', '1', '2026-10-04 18:02:26', '1');
INSERT INTO "notifications" ("id", "user_id", "type", "message", "is_read", "created_at", "college_id") VALUES ('2', '36', 'mentorship', 'Student User booked a mentorship session with you.', '0', '2026-10-04 21:21:23', '1');
INSERT INTO "notifications" ("id", "user_id", "type", "message", "is_read", "created_at", "college_id") VALUES ('3', '35', 'mentorship_update', 'Alumni User has accepted your mentorship session request.', '0', '2026-10-04 21:21:23', '1');
INSERT INTO "notifications" ("id", "user_id", "type", "message", "is_read", "created_at", "college_id") VALUES ('4', '53', 'mentorship', 'Someone booked a mentorship session with you.', '0', '2026-10-04 21:32:24', '1');
INSERT INTO "notifications" ("id", "user_id", "type", "message", "is_read", "created_at", "college_id") VALUES ('5', '57', 'job_update', 'Your application for \'Job A\' has been received.', '0', '2026-10-04 21:37:33', '34');
INSERT INTO "notifications" ("id", "user_id", "type", "message", "is_read", "created_at", "college_id") VALUES ('6', '59', 'job_update', 'Your application for \'Job A\' has been received.', '0', '2026-10-04 21:37:54', '36');
INSERT INTO "notifications" ("id", "user_id", "type", "message", "is_read", "created_at", "college_id") VALUES ('7', '61', 'mentorship', 'Someone booked a mentorship session with you.', '0', '2026-10-04 21:38:17', '1');

DROP TABLE IF EXISTS "page_views";
CREATE TABLE "page_views" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "page_url" varchar(255) DEFAULT NULL,
  "user_id" INTEGER DEFAULT NULL,
  "viewed_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

DROP TABLE IF EXISTS "password_resets";
CREATE TABLE "password_resets" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "email" varchar(255) NOT NULL,
  "token" varchar(255) NOT NULL,
  "expires_at" timestamp NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "used" tinyINTEGER DEFAULT '0',
  UNIQUE KEY "token" ("token")
) ;

INSERT INTO "password_resets" ("id", "email", "token", "expires_at", "created_at", "used") VALUES ('1', 'verifytest1791133220@example.com', 'fcbdf54dbfcd21f2ab989b8c178ef39f54fedff012fcaecf4bb4fa5b00d85776', '2026-10-04 23:30:20', '2026-10-04 22:30:20', '1');

DROP TABLE IF EXISTS "post_comments";
CREATE TABLE "post_comments" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "post_id" INTEGER NOT NULL,
  "user_id" INTEGER NOT NULL,
  "content" text NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY "post_id" ("post_id"),
  KEY "user_id" ("user_id"),
  CONSTRAINT "post_comments_ibfk_1" FOREIGN KEY ("post_id") REFERENCES "posts" ("id") ON DELETE CASCADE,
  CONSTRAINT "post_comments_ibfk_2" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE CASCADE
) ;

DROP TABLE IF EXISTS "post_likes";
CREATE TABLE "post_likes" (
  "user_id" INTEGER NOT NULL,
  "post_id" INTEGER NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("user_id","post_id"),
  KEY "post_id" ("post_id"),
  CONSTRAINT "post_likes_ibfk_1" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE CASCADE,
  CONSTRAINT "post_likes_ibfk_2" FOREIGN KEY ("post_id") REFERENCES "posts" ("id") ON DELETE CASCADE
) ;

INSERT INTO "post_likes" ("user_id", "post_id", "created_at") VALUES ('4', '3', '2026-10-04 19:28:07');

DROP TABLE IF EXISTS "posts";
CREATE TABLE "posts" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER NOT NULL,
  "content" text NOT NULL,
  "image_url" varchar(255) DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL,
  KEY "user_id" ("user_id"),
  CONSTRAINT "posts_ibfk_1" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE CASCADE
) ;

INSERT INTO "posts" ("id", "user_id", "content", "image_url", "created_at", "college_id") VALUES ('3', '4', 'Test Post From CLI', NULL, '2026-10-04 19:28:07', '1');

DROP TABLE IF EXISTS "referral_requests";
CREATE TABLE "referral_requests" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "alumni_id" INTEGER NOT NULL,
  "student_id" INTEGER NOT NULL,
  "status" varchar(50) DEFAULT 'pending',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "referral_requests" ("id", "alumni_id", "student_id", "status", "created_at", "college_id") VALUES ('3', '2', '4', 'pending', '2026-10-04 19:28:07', '1');

DROP TABLE IF EXISTS "reports";
CREATE TABLE "reports" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "reporter_id" INTEGER DEFAULT NULL,
  "reported_item_type" varchar(50) DEFAULT NULL,
  "reported_item_id" INTEGER DEFAULT NULL,
  "reason" text,
  "status" varchar(50) DEFAULT 'pending',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

INSERT INTO "reports" ("id", "reporter_id", "reported_item_type", "reported_item_id", "reason", "status", "created_at") VALUES ('1', '2', 'user', '1', 'Inappropriate behavior', 'resolved', '2026-10-04 18:10:23');

DROP TABLE IF EXISTS "startups";
CREATE TABLE "startups" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "name" varchar(255) DEFAULT NULL,
  "elevator_pitch" text,
  "funding_stage" varchar(100) DEFAULT NULL,
  "website" varchar(255) DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "college_id" INTEGER NOT NULL
) ;

INSERT INTO "startups" ("id", "user_id", "name", "elevator_pitch", "funding_stage", "website", "created_at", "college_id") VALUES ('1', '1', 'NextGen AI', 'Revolutionizing alumni networks with AI', 'seed', 'https://nextgenai.example.com', '2026-10-04 18:00:20', '1');
INSERT INTO "startups" ("id", "user_id", "name", "elevator_pitch", "funding_stage", "website", "created_at", "college_id") VALUES ('2', '4', 'Test Startup', 'A test startup', 'pre-seed', 'http://teststartup.com', '2026-10-04 18:58:39', '1');

DROP TABLE IF EXISTS "user_badges";
CREATE TABLE "user_badges" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER DEFAULT NULL,
  "badge_id" INTEGER DEFAULT NULL,
  "awarded_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

INSERT INTO "user_badges" ("id", "user_id", "badge_id", "awarded_at") VALUES ('1', '1', '1', '2026-10-04 18:05:27');
INSERT INTO "user_badges" ("id", "user_id", "badge_id", "awarded_at") VALUES ('2', '4', '1', '2026-10-04 19:02:03');

DROP TABLE IF EXISTS "user_sessions";
CREATE TABLE "user_sessions" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "user_id" INTEGER NOT NULL,
  "refresh_token" varchar(255) NOT NULL,
  "expires_at" timestamp NOT NULL,
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY "refresh_token" ("refresh_token"),
  KEY "user_id" ("user_id"),
  CONSTRAINT "user_sessions_ibfk_1" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE CASCADE
) ;

INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('1', '3', '7081efef0aa79645fae2fa36f6e6ec82c0fc1d449517b62067c2596bb4a694c7', '2026-11-02 20:06:34', '2026-10-03 20:06:34');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('2', '3', '7d24a81593f4ac4f02b43a688c67182442d1e3535c455587d2b2d8a51d3009ca', '2026-11-02 23:14:17', '2026-10-03 23:14:17');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('3', '3', 'da91f40e5217f0e374dab8e190cda397d17977bd9e6a3137679e8f7c38fe4a9a', '2026-11-02 23:17:09', '2026-10-03 23:17:09');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('4', '3', 'fa665086e53953f3554f50ec5b5cc0bb8448d0ce6fa42f2e85973d7d16f587ad', '2026-11-02 23:28:28', '2026-10-03 23:28:28');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('5', '3', '5cbc16c23e3e5ff5389a5c19de35d64eee9d87a274f3929227c866556da5910a', '2026-11-02 23:44:11', '2026-10-03 23:44:11');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('6', '3', 'e334ea80c237d72449bb52578083b74c546a602defef9f41737718fa0258ddda', '2026-11-02 23:45:56', '2026-10-03 23:45:56');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('7', '3', 'f3bb3d3e0f66935a17c5f1cab384d893cb6740c13367c9ac252b1dc305cf90a7', '2026-11-02 23:52:45', '2026-10-03 23:52:45');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('8', '3', 'ef08080a0fd0b90ff923ca47de387a6b63aad5d003da8fd0db1fe0597275551f', '2026-11-02 23:58:14', '2026-10-03 23:58:14');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('9', '3', '9bd3ccbd29c169f579419056752e311559abc05b76a7c948162bc03451494198', '2026-11-03 00:06:38', '2026-10-04 00:06:38');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('10', '3', '79ac73365b262330d91155ddb8e30670a958363be1033284382c4811dad6679d', '2026-11-03 00:08:06', '2026-10-04 00:08:06');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('11', '3', 'dd9d7ed8c136f2eca3a8dd0ec8854ac06580336c1e5ca286401f9f1c4b1ca985', '2026-11-03 00:10:22', '2026-10-04 00:10:22');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('12', '3', '69add49825fe8730c050e356e54c582f31568aad83b9912f2655bb6ea54acf71', '2026-11-03 00:11:58', '2026-10-04 00:11:58');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('13', '3', '3642523ffe1d242712a2606fba84545f62fba416a99c5f9aa55c6e26ae8dee72', '2026-11-03 00:14:21', '2026-10-04 00:14:21');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('14', '3', 'a9d39cca1b3f62f8f7b06a2cc362e498d2d0213c3e9f89db45bc574be0ead75a', '2026-11-03 00:21:00', '2026-10-04 00:21:00');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('15', '3', '7cc58855f296456e3e4b2ed4df548f272501780edae6caba7e473aaea0a639c5', '2026-11-03 00:23:07', '2026-10-04 00:23:07');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('16', '3', '796b96f4bae65e7d186184df8bb26b2efab3567b1f165642d8d8b97de4eacb40', '2026-11-03 00:24:50', '2026-10-04 00:24:50');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('17', '3', '1b608bbb3e70e7ca29ea83c248435bee6d8a4deec51a1ffc43e8dac580a07af0', '2026-11-03 00:33:31', '2026-10-04 00:33:31');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('18', '3', '4cd36f22fdb6b0e868ac7f2705c337ec446c458627e801322efab8137a69f766', '2026-11-03 00:42:11', '2026-10-04 00:42:11');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('19', '3', '6d9be2bf3141c64a1f1ec8c3baa286e5585bf57a8f8e682e6bf70a03e9a19662', '2026-11-03 00:44:29', '2026-10-04 00:44:29');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('20', '3', 'dfafe98de8b35699137636f706da34a2cdf3ed64183b011d0aa9af5ec0b92aee', '2026-11-03 00:57:46', '2026-10-04 00:57:46');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('21', '3', '3b2155e0e51e1c0b0bf7fcf982c3a465f7610b56a3ff907d63a97e557ee40f4e', '2026-11-03 01:01:24', '2026-10-04 01:01:24');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('22', '4', 'f6d17a0b7908500e6a1443f262c6848cd4b33b7497d90418fa4257d5e3e87f48', '2026-11-03 01:10:58', '2026-10-04 01:10:58');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('24', '4', '460e82100934a2898bd7f016d5716a31cbb064e572eb5749822bb36f57e52323', '2026-11-03 01:31:12', '2026-10-04 01:31:12');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('25', '5', '45b3d6bb51fc8e6cba5f7745079538ae7ab101772f14390a3ef2071f9215ed02', '2026-11-03 01:33:02', '2026-10-04 01:33:02');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('26', '4', '01cad9c7f5d981954377c9d2db366daf5834f204c2ae0f6a09445e40259794d1', '2026-11-03 16:05:09', '2026-10-04 16:05:09');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('27', '4', '71ffcc9a631c895d572bc7eca6e95a1412eb65ba1f82dddd459de469770fcc9b', '2026-11-03 16:19:30', '2026-10-04 16:19:30');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('28', '4', '34691072405c9cecbe0e88ba6aacf12c00880246458bc72608bf7f22c97184a9', '2026-11-03 16:45:44', '2026-10-04 16:45:44');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('29', '4', '6de83c9bc1376ee6ba8654d86740fc93f8925b470732e8f05d85af04d61c184d', '2026-11-03 16:58:29', '2026-10-04 16:58:29');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('30', '4', 'dbfb6d072269e565b9beec4eb768b31ec5f66b447525cf2917f497171829233c', '2026-11-03 17:12:36', '2026-10-04 17:12:36');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('31', '4', 'c29478719191a7b36fafa5d0b4b26503dcf69cf1105acc63e8d4205fb6ea2c66', '2026-11-03 17:20:09', '2026-10-04 17:20:09');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('32', '4', 'e820205589115f95fc63928a3a5b16a668dc0b60c370a2afe357c46dcb3ca757', '2026-11-03 17:22:09', '2026-10-04 17:22:09');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('33', '3', 'd781ee2fafc8ac48584af6bd08581cbd9d52820584ff2a7f95c0d1cf03b84565', '2026-11-03 18:31:32', '2026-10-04 18:31:32');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('34', '3', '76cd12dca042bd4393bf2ab8572094d2ace4acac864f39147ab0b4731ea1ad3e', '2026-11-03 18:32:33', '2026-10-04 18:32:33');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('35', '3', '9f6162bb0692b558bce31d67f91b5e61d3a41dd050a2f347dd5fbb35901183e3', '2026-11-03 18:47:23', '2026-10-04 18:47:23');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('36', '3', '1c00b5d23dbfd9a5d49642c83fb218221249535f8d318f4e3db2316df9bca2ef', '2026-11-03 18:48:26', '2026-10-04 18:48:26');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('38', '4', 'ccf35a4042fc8f2ff36133ee797f4dcefa3593a9a40afc3781b5bdc802d26bb9', '2026-11-03 19:17:02', '2026-10-04 19:17:02');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('39', '4', '39890d16612282df564c21c0e8e2a9d0997258e5d2c9743ffec56d53696eec3c', '2026-11-03 19:25:22', '2026-10-04 19:25:22');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('40', '4', '402cd76c4e9c8a72ce89eb7b408a6e95005bd822be9186f97315bf92da47247a', '2026-11-03 19:28:07', '2026-10-04 19:28:07');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('41', '4', 'c40870cac6ffafe3f319b8658adaa90590b34e68fd3ac216aecf4eb91f2be7c2', '2026-11-03 19:37:08', '2026-10-04 19:37:08');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('44', '22', 'cafc3c5f3362954fb5b0875d345e2bb594ee02832ea53e00de99029099a85893', '2026-11-03 20:46:22', '2026-10-04 20:46:22');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('45', '23', '5eff2c17223eebb295cec2b3b1f502e5b16b7dc9dddbad4200ffe7a8f7eea29f', '2026-11-03 20:46:22', '2026-10-04 20:46:22');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('46', '24', '11b408ae796fe72ec142df68be520b051ac0757fbf6adb4b0f9403ad57bc2b8c', '2026-11-03 20:47:20', '2026-10-04 20:47:20');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('47', '25', 'fa03c1e9a5aadfd9c14451f02ebb1504bb74e1cc2fb68558b2bb76ef3501467d', '2026-11-03 20:47:21', '2026-10-04 20:47:21');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('48', '26', '68973a54f3558650a4d10d8b0b9f8fbffe1adc6db85e82727b2331ab2eca22a3', '2026-11-03 20:49:48', '2026-10-04 20:49:48');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('49', '27', 'a9107f8a5e62c4b17287b86e02a8196c1b0d50c56bacff6a0692d1283bc9db98', '2026-11-03 20:49:49', '2026-10-04 20:49:49');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('50', '28', '34780a68a57bf5ec1fd3ccf470e4b308ab846656bc35c1364cf7ec3ba4b634d2', '2026-11-03 20:50:33', '2026-10-04 20:50:33');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('51', '29', 'ad2c167bab1771a168e668344c7bd3f7caa37a92515358db3c01d926b0a16c68', '2026-11-03 20:50:34', '2026-10-04 20:50:34');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('52', '30', 'b3cfaeb2dbc6bb02c1a1defa4de45ecb921d1728bf733812021e196c3e314cf1', '2026-11-03 20:51:13', '2026-10-04 20:51:13');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('53', '31', '0fd109dbac494fc07985d98b6e92e7aebd5f00acb015dd8c178a604376b444f6', '2026-11-03 20:51:13', '2026-10-04 20:51:13');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('57', '63', '65ac1fc3fae1ed07a9f96a0fe380609494e0b3c7d006db33b37ff42e8df56141', '2026-11-03 21:38:33', '2026-10-04 21:38:33');
INSERT INTO "user_sessions" ("id", "user_id", "refresh_token", "expires_at", "created_at") VALUES ('58', '64', '14a22731626337c704f0257b3e553e4cd5fec9940d143e139645f533b6248d12', '2026-11-03 21:38:33', '2026-10-04 21:38:33');

DROP TABLE IF EXISTS "user_settings";
CREATE TABLE "user_settings" (
  "user_id" INTEGER NOT NULL,
  "email_notifications" tinyINTEGER DEFAULT '1',
  "profile_visibility" varchar(50) DEFAULT 'public',
  "updated_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

INSERT INTO "user_settings" ("user_id", "email_notifications", "profile_visibility", "updated_at") VALUES ('1', '0', 'hidden', '2026-10-04 18:10:23');
INSERT INTO "user_settings" ("user_id", "email_notifications", "profile_visibility", "updated_at") VALUES ('4', '0', 'public', '2026-10-04 19:28:08');

DROP TABLE IF EXISTS "users";
CREATE TABLE "users" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "full_name" varchar(255) NOT NULL,
  "email" varchar(255) NOT NULL,
  "password" varchar(255) NOT NULL,
  "role" varchar(50) NOT NULL DEFAULT 'student',
  "college_id" INTEGER DEFAULT NULL,
  "is_verified" tinyINTEGER DEFAULT '0',
  "created_at" timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  "about_me" text,
  "department" varchar(255) DEFAULT NULL,
  "industry" varchar(255) DEFAULT NULL,
  "location" varchar(255) DEFAULT NULL,
  UNIQUE KEY "email" ("email"),
  KEY "college_id" ("college_id"),
  CONSTRAINT "users_ibfk_1" FOREIGN KEY ("college_id") REFERENCES "colleges" ("id")
) ;

INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('1', 'Rahul Sharma', 'rahul@example.com', '$2y$10$JyJ6LFvqe8whxTcaJ0DM2uLq/ENdEzrlI3i/5moS0uZi15eFpAq5S', 'student', '1', '1', '2026-10-03 20:04:19', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('2', 'Priya Patel', 'priya@example.com', '$2y$10$YXJK4tKwjudCG1nGj6sobu.LXkTgYK5phQFQX/70M9L29dSLdO5Vu', 'alumni', '2', '1', '2026-10-03 20:04:19', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('3', 'PHP Tester', 'phptest@college.edu', '$2y$10$DScKyR8iK.j7Ap82qA2uwOUR/rAyrHIG5MvnsFWrU.RrLngMP9UAK', 'student', '1', '1', '2026-10-03 20:06:33', '', 'Computer Science', NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('4', 'User One', 'user1@test.com', '$2y$10$yx.wFsRNYiX1x9FiqWEhLeKlk6SAvuLDqv6sFLBR3X9SbZhZsIiOm', 'admin', NULL, '1', '2026-10-04 01:10:02', 'Passionate Computer Science student...', NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('5', 'User Two', 'user2@test.com', '$2y$10$yx.wFsRNYiX1x9FiqWEhLeKlk6SAvuLDqv6sFLBR3X9SbZhZsIiOm', 'student', NULL, '1', '2026-10-04 01:10:02', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('6', 'User Three', 'user3@example.com', '$2y$10$xTqhNUhO9F5AzOBUa7dGse4YWHRhmLup.Ying7e.R6QKw5re5wn.y', 'alumni', '1', '0', '2026-10-04 01:23:20', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('7', 'User Three', 'user3_new@example.com', '$2y$10$ajVjCDYgbA60c0JFO6ZwaeOQdKdAsBh1DftmYgjHwVPT23CljFkzW', 'alumni', '1', '0', '2026-10-04 01:29:10', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('11', 'User A', 'usera1791124666@a.edu', 'hash', 'alumni', '12', '0', '2026-10-04 20:07:46', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('12', 'User B', 'userb1791124666@b.edu', 'hash', 'alumni', '13', '0', '2026-10-04 20:07:46', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('19', 'Henil Patel', 'hdpatel846@gmail.com', '$2y$10$flvkQjzt8beM0lBjFu5W8.DisLsR5Ojj7u7M8aEjLEjNbDH59SS6S', 'student', '1', '0', '2026-10-04 20:34:28', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('20', 'User A Search', 'usera_search_1791126705@a.edu', '$2y$10$XhOk47CXx/emzk3fy14soOjEdw00M/ileLNldt4xeUTMokXLpR.S6', 'alumni', '20', '1', '2026-10-04 20:41:45', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('21', 'Super Admin', 'superadmin_1791126705@admin.com', '$2y$10$XhOk47CXx/emzk3fy14soOjEdw00M/ileLNldt4xeUTMokXLpR.S6', 'super_admin', NULL, '1', '2026-10-04 20:41:45', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('22', 'User A Search', 'usera_search_1791126982@a.edu', '$2y$10$/6jtUb1qC9EiixXImnZGaeob35dn2NgceclgTBBFnIvShLSOn6APG', 'alumni', '22', '1', '2026-10-04 20:46:22', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('23', 'Super Admin', 'superadmin_1791126982@admin.com', '$2y$10$/6jtUb1qC9EiixXImnZGaeob35dn2NgceclgTBBFnIvShLSOn6APG', 'super_admin', NULL, '1', '2026-10-04 20:46:22', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('24', 'User A Search', 'usera_search_1791127040@a.edu', '$2y$10$HwwLAu1U3hQp2F.vb/9LHO4mn8WwiTV6g4/gLvdNLrvXqc/m.Q.TC', 'alumni', '24', '1', '2026-10-04 20:47:20', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('25', 'Super Admin', 'superadmin_1791127040@admin.com', '$2y$10$HwwLAu1U3hQp2F.vb/9LHO4mn8WwiTV6g4/gLvdNLrvXqc/m.Q.TC', 'super_admin', NULL, '1', '2026-10-04 20:47:20', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('26', 'User A Search', 'usera_search_1791127188@a.edu', '$2y$10$d2D3mlpkiXeQ0y3SJyrHYu0drj8tbtJqg1KWeezQz8lANABwrI7wu', 'alumni', '26', '1', '2026-10-04 20:49:48', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('27', 'Super Admin', 'superadmin_1791127188@admin.com', '$2y$10$d2D3mlpkiXeQ0y3SJyrHYu0drj8tbtJqg1KWeezQz8lANABwrI7wu', 'super_admin', NULL, '1', '2026-10-04 20:49:48', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('28', 'User A Search', 'usera_search_1791127233@a.edu', '$2y$10$4pCJJzDKs5RgRLDBJWdy/ehwJx.IefnrlFUxMFlhR38YqXj.ZoEd2', 'alumni', '28', '1', '2026-10-04 20:50:33', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('29', 'Super Admin', 'superadmin_1791127233@admin.com', '$2y$10$4pCJJzDKs5RgRLDBJWdy/ehwJx.IefnrlFUxMFlhR38YqXj.ZoEd2', 'super_admin', NULL, '1', '2026-10-04 20:50:33', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('30', 'User A Search', 'usera_search_1791127272@a.edu', '$2y$10$h1ZFZyT/woG68cDkfEJMlerg7SUX/brjaq1y5Z3ZlUEHxZNRuy0ke', 'alumni', '30', '1', '2026-10-04 20:51:12', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('31', 'Super Admin', 'superadmin_1791127272@admin.com', '$2y$10$h1ZFZyT/woG68cDkfEJMlerg7SUX/brjaq1y5Z3ZlUEHxZNRuy0ke', 'super_admin', NULL, '1', '2026-10-04 20:51:12', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('32', 'Student User', 'student_notif@example.com', 'test', 'student', '1', '0', '2026-10-04 21:19:21', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('33', 'Alumni User', 'alumni_notif@example.com', 'test', 'alumni', '1', '0', '2026-10-04 21:19:21', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('35', 'Student User', 'student_3178@example.com', 'test', 'student', '1', '0', '2026-10-04 21:21:23', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('36', 'Alumni User', 'alumni_3178@example.com', 'test', 'alumni', '1', '0', '2026-10-04 21:21:23', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('37', 'College A User', 'a_3534@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:24:51', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('38', 'College B User', 'b_3534@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:24:51', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('39', 'College A User', 'a_2664@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:25:29', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('40', 'College B User', 'b_2664@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:25:29', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('41', 'College A User', 'a_7461@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:26:02', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('42', 'College B User', 'b_7461@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:26:02', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('43', 'College A User', 'a_5809@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:26:37', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('44', 'College B User', 'b_5809@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:26:37', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('45', 'College A', 'a_1746@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:27:57', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('46', 'College B', 'b_1746@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:27:57', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('47', 'College A', 'a_8859@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:29:14', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('48', 'College B', 'b_8859@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:29:14', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('49', 'College A', 'a_9669@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:29:53', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('50', 'College B', 'b_9669@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:29:53', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('51', 'College A', 'a_9647@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:30:31', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('52', 'College B', 'b_9647@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:30:31', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('53', 'College A', 'a_5435@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:32:23', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('54', 'College B', 'b_5435@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:32:23', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('61', 'College A', 'a_7434@test.com', 'test', 'alumni', '1', '0', '2026-10-04 21:38:17', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('62', 'College B', 'b_7434@test.com', 'test', 'alumni', '2', '0', '2026-10-04 21:38:17', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('63', 'User A Search', 'usera_search_1791130113@a.edu', '$2y$10$D7dc02abi29v71aJ8JGe4.ZejQzZznVXA2raAbfwItAP7MZgXQmNC', 'alumni', '38', '1', '2026-10-04 21:38:33', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('64', 'Super Admin', 'superadmin_1791130113@admin.com', '$2y$10$D7dc02abi29v71aJ8JGe4.ZejQzZznVXA2raAbfwItAP7MZgXQmNC', 'super_admin', NULL, '1', '2026-10-04 21:38:33', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('65', 'Verify Test', 'verifytest1791133220@example.com', '$2y$10$/hZKya4Lakm7N76k2waycOaxofEi8XyMzbv3fHE03prSgsHV4YNFS', 'alumni', '1', '1', '2026-10-04 22:30:20', NULL, NULL, NULL, NULL);
INSERT INTO "users" ("id", "full_name", "email", "password", "role", "college_id", "is_verified", "created_at", "about_me", "department", "industry", "location") VALUES ('66', 'Browser Test', 'browser@example.com', '$2y$10$ohTRQmVRYlKVIRHEAS2ARurJX6dEEuWFHTaSrXoXW9KHT2zwB.eLu', 'alumni', '1', '1', '2026-10-04 22:36:46', NULL, NULL, NULL, NULL);


