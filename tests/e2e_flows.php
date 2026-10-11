<?php
/**
 * Alumni Connect — Automated End-to-End Test Suite
 * Exercises full write-flows over HTTP against the running local server
 * and asserts real SQLite database persistence and tenant isolation.
 */

$projectDir = realpath(__DIR__ . '/..');
require_once $projectDir . '/app/Core/Env.php';
require_once $projectDir . '/app/Core/Database.php';

App\Core\Env::load($projectDir . '/.env');
$pdo = App\Core\Database::getConnection();

$baseUrl = "http://127.0.0.1:8000";

// Ensure clean rate limits state for automated testing
@unlink($projectDir . '/storage/rate_limits.json');

$totalTests = 0;
$passedTests = 0;
$failedTests = 0;

function e2e_assert($condition, $message) {
    global $totalTests, $passedTests, $failedTests;
    $totalTests++;
    if ($condition) {
        $passedTests++;
        echo "  [PASS] $message\n";
    } else {
        $failedTests++;
        echo "  [FAIL] $message\n";
    }
}

function e2e_http($url, $method = 'GET', $data = [], $cookies = []) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }

    if (!empty($cookies)) {
        $cList = [];
        foreach ($cookies as $k => $v) $cList[] = "$k=$v";
        curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cList));
    }

    $raw = curl_exec($ch);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $header = substr($raw, 0, $headerSize);
    $body = substr($raw, $headerSize);

    $newCookies = [];
    if (preg_match_all('/^Set-Cookie:\s*([^;]+)/mi', $header, $matches)) {
        foreach ($matches[1] as $cStr) {
            parse_str($cStr, $parsed);
            foreach ($parsed as $k => $v) $newCookies[$k] = $v;
        }
    }

    $location = null;
    if (preg_match('/^Location:\s*(.+)$/mi', $header, $locMatches)) {
        $location = trim($locMatches[1]);
    }

    curl_close($ch);
    return [
        'code' => $code,
        'header' => $header,
        'body' => $body,
        'cookies' => array_merge($cookies, $newCookies),
        'location' => $location
    ];
}

function e2e_login($baseUrl, $email, $password) {
    $res = e2e_http("$baseUrl/login");
    $csrf = $res['cookies']['csrf_token'] ?? '';
    
    $loginRes = e2e_http("$baseUrl/login", 'POST', [
        'email' => $email,
        'password' => $password,
        'csrf_token' => $csrf
    ], ['csrf_token' => $csrf]);

    return [
        'cookies' => $loginRes['cookies'],
        'csrf' => $loginRes['cookies']['csrf_token'] ?? $csrf,
        'location' => $loginRes['location'],
        'code' => $loginRes['code']
    ];
}

echo "========================================================\n";
echo "      ALUMNI CONNECT — END-TO-END AUTOMATED FLOWS       \n";
echo "========================================================\n\n";

// --------------------------------------------------------------------------
// 1. ROLE-BASED LOGIN & LANDING DESTINATIONS
// --------------------------------------------------------------------------
echo "--- 1. Testing Role-Based Logins and Landing Pages ---\n";

$rolesToTest = [
    'student' => ['email' => 'student@alumni.test', 'expected' => '/dashboard'],
    'alumni' => ['email' => 'alumni@alumni.test', 'expected' => '/dashboard'],
    'college_admin' => ['email' => 'admin@alumni.test', 'expected' => '/admin/dashboard'],
    'super_admin' => ['email' => 'superadmin@alumni.test', 'expected' => '/super-admin/dashboard'],
];

$sessions = [];
foreach ($rolesToTest as $role => $info) {
    $auth = e2e_login($baseUrl, $info['email'], 'Password123!');
    $sessions[$role] = $auth;
    $landed = $auth['location'] === $info['expected'];
    e2e_assert($landed, "Role '$role' successfully logs in and redirects to '{$info['expected']}' (Location: {$auth['location']})");
}

$studentCookies = $sessions['student']['cookies'];
$studentCsrf = $sessions['student']['csrf'];

$alumniCookies = $sessions['alumni']['cookies'];
$alumniCsrf = $sessions['alumni']['csrf'];

$adminCookies = $sessions['college_admin']['cookies'];
$adminCsrf = $sessions['college_admin']['csrf'];

$superCookies = $sessions['super_admin']['cookies'];
$superCsrf = $sessions['super_admin']['csrf'];

// --------------------------------------------------------------------------
// 2. STUDENT WRITE FLOWS
// --------------------------------------------------------------------------
echo "\n--- 2. Testing Student Write Flows ---\n";

// A. Event RSVP
$event = $pdo->query("SELECT id, title FROM events WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($event) {
    $res = e2e_http("$baseUrl/events/register", 'POST', [
        'csrf_token' => $studentCsrf,
        'event_id' => $event->id
    ], $studentCookies);
    $studentId = $pdo->query("SELECT id FROM users WHERE email = 'student@alumni.test'")->fetchColumn();
    $rsvpRow = $pdo->query("SELECT id FROM event_registrations WHERE event_id = {$event->id} AND user_id = $studentId")->fetchColumn();
    e2e_assert($rsvpRow > 0, "Student RSVP persisted in event_registrations (event_id: {$event->id})");
}

// B. Job Application
$job = $pdo->query("SELECT id, title FROM jobs WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($job) {
    $res = e2e_http("$baseUrl/jobs/apply", 'POST', [
        'csrf_token' => $studentCsrf,
        'job_id' => $job->id
    ], $studentCookies);
    $appRow = $pdo->query("SELECT id FROM job_applications WHERE job_id = {$job->id} AND user_id = $studentId")->fetchColumn();
    e2e_assert($appRow > 0, "Student job application persisted in job_applications (job_id: {$job->id})");
}

// C. Mentorship Booking
$alumniId = $pdo->query("SELECT id FROM users WHERE email = 'alumni@alumni.test'")->fetchColumn();
if ($alumniId) {
    $res = e2e_http("$baseUrl/mentorship/book", 'POST', [
        'csrf_token' => $studentCsrf,
        'mentor_id' => $alumniId
    ], $studentCookies);
    $sessionId = $pdo->query("SELECT id FROM mentorship_sessions WHERE mentor_id = $alumniId AND mentee_id = $studentId ORDER BY id DESC LIMIT 1")->fetchColumn();
    e2e_assert($sessionId > 0, "Student mentorship booking persisted in mentorship_sessions (session_id: $sessionId)");
}

// D. Referral Request
if ($alumniId) {
    $res = e2e_http("$baseUrl/referral-request/submit", 'POST', [
        'csrf_token' => $studentCsrf,
        'alumni_id' => $alumniId,
        'message' => 'E2E Automated Referral Request Test'
    ], $studentCookies);
    $refId = $pdo->query("SELECT id FROM referral_requests WHERE alumni_id = $alumniId AND student_id = $studentId ORDER BY id DESC LIMIT 1")->fetchColumn();
    e2e_assert($refId > 0, "Student referral request persisted in referral_requests (request_id: $refId)");
}

// E. Community Post, Like & Comment
$uniquePostText = "Automated E2E Community Post " . time();
$res = e2e_http("$baseUrl/community/post", 'POST', [
    'csrf_token' => $studentCsrf,
    'content' => $uniquePostText
], $studentCookies);
$createdPost = $pdo->query("SELECT id FROM posts WHERE content = '$uniquePostText'")->fetch(PDO::FETCH_OBJ);
e2e_assert($createdPost !== false, "Student community post created in posts table");

if ($createdPost) {
    // Like
    $res = e2e_http("$baseUrl/community/like", 'POST', [
        'csrf_token' => $studentCsrf,
        'post_id' => $createdPost->id
    ], $studentCookies);
    $likeCount = (int)$pdo->query("SELECT COUNT(*) FROM post_likes WHERE post_id = {$createdPost->id} AND user_id = $studentId")->fetchColumn();
    e2e_assert($likeCount > 0, "Student like persisted in post_likes table");

    // Comment
    $uniqueComment = "E2E Comment " . time();
    $res = e2e_http("$baseUrl/community/comment", 'POST', [
        'csrf_token' => $studentCsrf,
        'post_id' => $createdPost->id,
        'content' => $uniqueComment
    ], $studentCookies);
    $commentCount = (int)$pdo->query("SELECT COUNT(*) FROM post_comments WHERE post_id = {$createdPost->id} AND content = '$uniqueComment'")->fetchColumn();
    e2e_assert($commentCount > 0, "Student comment persisted in post_comments table");
}

// F. Send Message
$msgContent = "E2E Message " . time();
$res = e2e_http("$baseUrl/messages/send", 'POST', [
    'csrf_token' => $studentCsrf,
    'receiver_id' => $alumniId,
    'content' => $msgContent
], $studentCookies);
$msgRow = $pdo->query("SELECT id FROM messages WHERE sender_id = $studentId AND receiver_id = $alumniId AND content = '$msgContent'")->fetchColumn();
e2e_assert($msgRow > 0, "Student direct message persisted in messages table");

// G. Donations & Sandbox Payment Gateway
$campaign = $pdo->query("SELECT id, raised_amount FROM campaigns WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($campaign) {
    $beforeRaised = (float)$campaign->raised_amount;
    $res = e2e_http("$baseUrl/donations/donate", 'POST', [
        'csrf_token' => $studentCsrf,
        'campaign_id' => $campaign->id,
        'amount' => 500
    ], $studentCookies);
    
    // Parse txn_id and sig from checkout redirect
    $loc = $res['location'] ?? '';
    parse_str(parse_url($loc, PHP_URL_QUERY), $queryArgs);
    $txnId = $queryArgs['txn_id'] ?? null;
    $sig = $queryArgs['sig'] ?? null;
    e2e_assert(!empty($txnId) && !empty($sig), "Donation checkout generated secure HMAC signature and transaction ID ($txnId)");

    if ($txnId && $sig) {
        // Complete payment callback
        $cbRes = e2e_http("$baseUrl/payment/callback", 'POST', [
            'csrf_token' => $studentCsrf,
            'txn_id' => $txnId,
            'status' => 'success',
            'sig' => $sig
        ], $studentCookies);
        
        $donationStatus = $pdo->query("SELECT status FROM donations WHERE transaction_id = '$txnId'")->fetchColumn();
        $afterRaised = (float)$pdo->query("SELECT raised_amount FROM campaigns WHERE id = {$campaign->id}")->fetchColumn();
        if ($donationStatus !== 'completed') {
            echo "    [DEBUG] Callback result: Code {$cbRes['code']}, Body: {$cbRes['body']}\n";
        }
        e2e_assert($donationStatus === 'completed', "Donation transaction updated to 'completed' in database");
        e2e_assert($afterRaised >= $beforeRaised + 500, "Campaign raised_amount updated from $beforeRaised to $afterRaised");
    }
}

// H. Marketplace Listing
$itemTitle = "E2E Calculus Textbook " . time();
$res = e2e_http("$baseUrl/marketplace/create", 'POST', [
    'csrf_token' => $studentCsrf,
    'title' => $itemTitle,
    'description' => 'Calculus 3rd Edition in excellent condition',
    'price' => 350,
    'item_condition' => 'like-new',
    'category' => 'books'
], $studentCookies);
$marketRow = $pdo->query("SELECT id FROM marketplace_items WHERE title = '$itemTitle' AND user_id = $studentId")->fetchColumn();
e2e_assert($marketRow > 0, "Student marketplace item persisted in marketplace_items table");

// --------------------------------------------------------------------------
// 3. ALUMNI WRITE FLOWS
// --------------------------------------------------------------------------
echo "\n--- 3. Testing Alumni Write Flows ---\n";

// A. Accept Mentorship Session
if (!empty($sessionId)) {
    $res = e2e_http("$baseUrl/mentorship/update-status", 'POST', [
        'csrf_token' => $alumniCsrf,
        'session_id' => $sessionId,
        'status' => 'accepted'
    ], $alumniCookies);
    $updatedSessionStatus = $pdo->query("SELECT status FROM mentorship_sessions WHERE id = $sessionId")->fetchColumn();
    e2e_assert($updatedSessionStatus === 'accepted', "Alumni accepted mentorship session (status updated to 'accepted')");
}

// B. Post a Job Listing
$newJobTitle = "Staff Software Engineer " . time();
$res = e2e_http("$baseUrl/jobs/create", 'POST', [
    'csrf_token' => $alumniCsrf,
    'title' => $newJobTitle,
    'company' => 'Acme Labs',
    'location' => 'Bengaluru, India',
    'type' => 'Full-time',
    'industry' => 'Technology',
    'salary_range' => '₹24L - ₹32L',
    'description' => 'Build high-scale systems',
    'requirements' => '5+ years experience'
], $alumniCookies);
$postedJob = $pdo->query("SELECT id, college_id FROM jobs WHERE title = '$newJobTitle'")->fetch(PDO::FETCH_OBJ);
e2e_assert($postedJob !== false && $postedJob->college_id == 1, "Alumni posted job listing persisted with college_id=1");

// C. Review / Approve Referral Request
if (!empty($refId)) {
    $res = e2e_http("$baseUrl/referral-request/update-status", 'POST', [
        'csrf_token' => $alumniCsrf,
        'request_id' => $refId,
        'status' => 'approved'
    ], $alumniCookies);
    $refStatus = $pdo->query("SELECT status FROM referral_requests WHERE id = $refId")->fetchColumn();
    e2e_assert($refStatus === 'approved', "Alumni approved referral request (status updated to 'approved')");
}

// --------------------------------------------------------------------------
// 4. COLLEGE ADMIN WRITE FLOWS
// --------------------------------------------------------------------------
echo "\n--- 4. Testing College Admin Write Flows ---\n";

// A. Create an Event
$newEventTitle = "Annual Alumni Leadership Conclave " . time();
$res = e2e_http("$baseUrl/events-admin/create", 'POST', [
    'csrf_token' => $adminCsrf,
    'title' => $newEventTitle,
    'description' => 'Keynote addresses and breakout networking rooms',
    'date' => date('Y-m-d H:i:s', strtotime('+30 days')),
    'location' => 'Main Auditorium',
    'type' => 'Networking'
], $adminCookies);
$createdEvent = $pdo->query("SELECT id, college_id FROM events WHERE title = '$newEventTitle'")->fetch(PDO::FETCH_OBJ);
e2e_assert($createdEvent !== false && $createdEvent->college_id == 1, "College admin created event persisted with college_id=1");

// B. Check in Attendee via QR Code
$qrCode = "QR_E2E_" . uniqid();
$pdo->prepare("INSERT INTO event_registrations (event_id, user_id, qr_code, status, college_id) VALUES (?, ?, ?, 'registered', 1)")
    ->execute([$event ? $event->id : 1, $studentId, $qrCode]);
$regId = $pdo->lastInsertId();

$res = e2e_http("$baseUrl/events-admin/checkin", 'POST', [
    'csrf_token' => $adminCsrf,
    'qr_code' => $qrCode
], $adminCookies);
$checkedInStatus = $pdo->query("SELECT status FROM event_registrations WHERE id = $regId")->fetchColumn();
e2e_assert($checkedInStatus === 'attended', "College admin QR checkin updated registration status to 'attended'");

// C. Moderation Queue Resolution
$pdo->prepare("INSERT INTO reports (reporter_id, reported_item_type, reported_item_id, reason, status, college_id) VALUES (?, 'post', 1, 'Inappropriate tone', 'pending', 1)")
    ->execute([$studentId]);
$reportId = $pdo->lastInsertId();

$res = e2e_http("$baseUrl/admin/moderation/resolve", 'POST', [
    'csrf_token' => $adminCsrf,
    'id' => $reportId
], $adminCookies);
$reportStatus = $pdo->query("SELECT status FROM reports WHERE id = $reportId")->fetchColumn();
e2e_assert($reportStatus === 'resolved', "College admin moderation action resolved report in database");

// D. RBAC 403 on Super Admin Routes
$adminSuperAccess = e2e_http("$baseUrl/super-admin/dashboard", 'GET', [], $adminCookies);
e2e_assert($adminSuperAccess['code'] === 403, "College admin forbidden (HTTP 403) from Super Admin dashboard");

// --------------------------------------------------------------------------
// 5. SUPER ADMIN WRITE FLOWS
// --------------------------------------------------------------------------
echo "\n--- 5. Testing Super Admin Write Flows ---\n";

// A. Create Institution
$instName = "National Institute of Technology " . rand(100, 999);
$res = e2e_http("$baseUrl/super-admin/institutions/create", 'POST', [
    'csrf_token' => $superCsrf,
    'name' => $instName,
    'city' => 'Warangal',
    'state' => 'Telangana',
    'plan' => 'Starter'
], $superCookies);
$instRow = $pdo->query("SELECT id, plan, status FROM colleges WHERE name = '$instName'")->fetch(PDO::FETCH_OBJ);
if ($instRow === false) {
    echo "    [DEBUG] Create Inst Code: {$res['code']}, Body: {$res['body']}\n";
}
e2e_assert($instRow !== false, "Super admin onboarded new institution ($instName)");

if ($instRow) {
    // B. Change Tier
    $res = e2e_http("$baseUrl/super-admin/institutions/tier", 'POST', [
        'csrf_token' => $superCsrf,
        'college_id' => $instRow->id,
        'plan' => 'Enterprise'
    ], $superCookies);
    $updatedTier = $pdo->query("SELECT plan FROM colleges WHERE id = {$instRow->id}")->fetchColumn();
    e2e_assert($updatedTier === 'Enterprise', "Super admin upgraded institution tier to 'Enterprise'");
}

// C. Create Advertisement Banner
$adTitle = "E2E Sponsorship " . time();
$res = e2e_http("$baseUrl/ads/create", 'POST', [
    'csrf_token' => $superCsrf,
    'sponsor_name' => $adTitle,
    'link_url' => 'https://example.com/sponsor',
    'image_url' => '/assets/img/login_side_img.png'
], $superCookies);
$adRow = $pdo->query("SELECT id FROM advertisements WHERE sponsor_name = '$adTitle'")->fetchColumn();
e2e_assert($adRow > 0, "Super admin advertisement banner persisted in advertisements table");

// D. Revenue CSV Export
$csvRes = e2e_http("$baseUrl/super-admin/revenue?export=csv", 'GET', [], $superCookies);
$isCsv = strpos($csvRes['header'], 'text/csv') !== false;
$hasLines = count(explode("\n", trim($csvRes['body']))) > 1;
e2e_assert($csvRes['code'] === 200 && $isCsv && $hasLines, "Super admin revenue CSV export generated valid multi-row CSV file");

// E. Student Forbidden on Super Admin Routes
$studentSuperAccess = e2e_http("$baseUrl/super-admin/institutions", 'GET', [], $studentCookies);
e2e_assert($studentSuperAccess['code'] === 403, "Student role forbidden (HTTP 403) from Super Admin institutions route");

// --------------------------------------------------------------------------
// 6. TENANT ISOLATION ASSERTIONS
// --------------------------------------------------------------------------
echo "\n--- 6. Testing Tenant Isolation (Multi-Colleges) ---\n";

// College 2 Student
$c2Login = e2e_login($baseUrl, 'student2@alumni.test', 'Password123!');
$c2Cookies = $c2Login['cookies'];
$c2Csrf = $c2Login['csrf'];

// Cross-tenant job application attempt: College 2 student attempts applying to College 1 job
if ($job) {
    $res = e2e_http("$baseUrl/jobs/apply", 'POST', [
        'csrf_token' => $c2Csrf,
        'job_id' => $job->id // College 1 job
    ], $c2Cookies);
    e2e_assert($res['code'] === 403, "Cross-tenant job application blocked with HTTP 403");
}

// Cross-tenant message attempt: College 2 student attempts messaging College 1 user
$res = e2e_http("$baseUrl/messages/send", 'POST', [
    'csrf_token' => $c2Csrf,
    'receiver_id' => $studentId, // College 1 student
    'content' => 'Malicious cross-tenant attempt'
], $c2Cookies);
e2e_assert($res['code'] === 403, "Cross-tenant direct messaging blocked with HTTP 403");

// Cross-tenant donation attempt: College 2 student attempts donating to College 1 campaign
if ($campaign) {
    $res = e2e_http("$baseUrl/donations/donate", 'POST', [
        'csrf_token' => $c2Csrf,
        'campaign_id' => $campaign->id, // College 1 campaign
        'amount' => 100
    ], $c2Cookies);
    e2e_assert($res['code'] === 403, "Cross-tenant campaign donation blocked with HTTP 403");
}

// --------------------------------------------------------------------------
// 7. NOTIFICATION HOOKS ASSERTIONS
// --------------------------------------------------------------------------
echo "\n--- 7. Testing Notification Triggers ---\n";

$notificationTypes = [
    'mentorship' => 'Mentorship booking hook',
    'mentorship_update' => 'Mentorship accept hook',
    'job_update' => 'Job application hook',
    'referral' => 'Referral request hook',
    'referral_update' => 'Referral status change hook',
    'donation' => 'Donation receipt hook',
    'moderation' => 'Moderation action hook'
];

foreach ($notificationTypes as $type => $label) {
    $count = (int)$pdo->query("SELECT COUNT(*) FROM notifications WHERE type = '$type'")->fetchColumn();
    e2e_assert($count > 0, "$label recorded real notification row in DB (count: $count)");
}

echo "\n========================================================\n";
echo "TEST RESULTS: $passedTests Passed / $totalTests Total | Failed: $failedTests\n";
echo "========================================================\n";

if ($failedTests > 0) {
    exit(1);
}
