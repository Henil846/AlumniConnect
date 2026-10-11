<?php
/**
 * Alumni Connect — Comprehensive Automated End-to-End Test Suite
 * Exercises full write-flows over HTTP against the running local server
 * and asserts real SQLite database persistence, tenant isolation, and security controls.
 */

$projectDir = realpath(__DIR__ . '/..');
require_once $projectDir . '/app/Core/Env.php';
require_once $projectDir . '/app/Core/Database.php';

App\Core\Env::load($projectDir . '/.env');
$pdo = App\Core\Database::getConnection();

$baseUrl = "http://127.0.0.1:8000";

// Ensure clean rate limits state for automated testing
@unlink($projectDir . '/storage/rate_limits.json');
$pdo->exec("DELETE FROM login_attempts");

$totalTests = 0;
$passedTests = 0;
$failedTests = 0;

$roleStats = [
    'General / Auth' => ['total' => 0, 'passed' => 0, 'failed' => 0],
    'Student' => ['total' => 0, 'passed' => 0, 'failed' => 0],
    'Alumni' => ['total' => 0, 'passed' => 0, 'failed' => 0],
    'College Admin' => ['total' => 0, 'passed' => 0, 'failed' => 0],
    'Super Admin' => ['total' => 0, 'passed' => 0, 'failed' => 0],
    'Multi-Tenant Isolation' => ['total' => 0, 'passed' => 0, 'failed' => 0],
    'Security / CSRF / Rate-Limit' => ['total' => 0, 'passed' => 0, 'failed' => 0],
];
$currentSuiteRole = 'General / Auth';

function set_test_role($role) {
    global $currentSuiteRole;
    $currentSuiteRole = $role;
}

function e2e_assert($condition, $message) {
    global $totalTests, $passedTests, $failedTests, $roleStats, $currentSuiteRole;
    $totalTests++;
    $roleStats[$currentSuiteRole]['total']++;
    if ($condition) {
        $passedTests++;
        $roleStats[$currentSuiteRole]['passed']++;
        echo "  [PASS] $message\n";
    } else {
        $failedTests++;
        $roleStats[$currentSuiteRole]['failed']++;
        echo "  [FAIL] $message\n";
    }
}

function e2e_http($url, $method = 'GET', $data = [], $cookies = [], $files = []) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if (!empty($files)) {
            $postFields = $data;
            foreach ($files as $name => $path) {
                $postFields[$name] = new \CURLFile($path);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
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

function e2e_login($baseUrl, $email, $password, $returnUrl = null) {
    $res = e2e_http("$baseUrl/login");
    $csrf = $res['cookies']['csrf_token'] ?? '';
    
    $postData = [
        'email' => $email,
        'password' => $password,
        'csrf_token' => $csrf
    ];
    if ($returnUrl) {
        $postData['return'] = $returnUrl;
    }

    $loginRes = e2e_http("$baseUrl/login", 'POST', $postData, ['csrf_token' => $csrf]);

    return [
        'cookies' => $loginRes['cookies'],
        'csrf' => $loginRes['cookies']['csrf_token'] ?? $csrf,
        'location' => $loginRes['location'],
        'code' => $loginRes['code'],
        'body' => $loginRes['body']
    ];
}

echo "========================================================\n";
echo "      ALUMNI CONNECT — FULL AUDIT & VERIFICATION SUITE  \n";
echo "========================================================\n\n";

// --------------------------------------------------------------------------
// 1. ROLE-BASED LOGIN, LANDING PAGES & RETURN URL
// --------------------------------------------------------------------------
set_test_role('General / Auth');
echo "--- 1. Testing Role-Based Logins and Return URL Routing ---\n";

// Unauthenticated protected page access must redirect to login with return parameter
$loggedOutRes = e2e_http("$baseUrl/marketplace");
e2e_assert(
    $loggedOutRes['code'] === 302 && strpos($loggedOutRes['location'], '/login') === 0 && strpos($loggedOutRes['location'], 'return') !== false,
    "Logged-out access to protected /marketplace redirects to /login with return parameter"
);

// Login with return URL redirects back to the protected page
$returnAuth = e2e_login($baseUrl, 'student@alumni.test', 'Password123!', '/marketplace');
e2e_assert(
    $returnAuth['location'] === '/marketplace',
    "Login with return parameter redirects back to original requested page (/marketplace)"
);

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
    e2e_assert($landed, "Role '$role' successfully logs in and redirects to '{$info['expected']}'");
}

$studentCookies = $sessions['student']['cookies'];
$studentCsrf = $sessions['student']['csrf'];
$studentId = (int)$pdo->query("SELECT id FROM users WHERE email = 'student@alumni.test'")->fetchColumn();

$alumniCookies = $sessions['alumni']['cookies'];
$alumniCsrf = $sessions['alumni']['csrf'];
$alumniId = (int)$pdo->query("SELECT id FROM users WHERE email = 'alumni@alumni.test'")->fetchColumn();

$adminCookies = $sessions['college_admin']['cookies'];
$adminCsrf = $sessions['college_admin']['csrf'];

$superCookies = $sessions['super_admin']['cookies'];
$superCsrf = $sessions['super_admin']['csrf'];

// --------------------------------------------------------------------------
// 2. STUDENT WRITE FLOWS & LIFECYCLES
// --------------------------------------------------------------------------
set_test_role('Student');
echo "\n--- 2. Testing Student Write Flows & Item Lifecycles ---\n";

// A. Event RSVP & Notification
$event = $pdo->query("SELECT id, title FROM events WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($event) {
    $res = e2e_http("$baseUrl/events/register", 'POST', [
        'csrf_token' => $studentCsrf,
        'event_id' => $event->id
    ], $studentCookies);
    $rsvpRow = $pdo->query("SELECT id FROM event_registrations WHERE event_id = {$event->id} AND user_id = $studentId")->fetchColumn();
    e2e_assert($rsvpRow > 0, "Student RSVP persisted in event_registrations (event_id: {$event->id})");

    $notif = $pdo->query("SELECT * FROM notifications WHERE user_id = $studentId AND type = 'event_reminder' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
    e2e_assert($notif && $notif->college_id == 1 && $notif->link === '/events', "RSVP triggered notification with recipient=$studentId, college_id=1, link='/events'");
}

// B. Job Application & Notification
$job = $pdo->query("SELECT id, title FROM jobs WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($job) {
    $res = e2e_http("$baseUrl/jobs/apply", 'POST', [
        'csrf_token' => $studentCsrf,
        'job_id' => $job->id
    ], $studentCookies);
    $appRow = $pdo->query("SELECT id FROM job_applications WHERE job_id = {$job->id} AND user_id = $studentId")->fetchColumn();
    e2e_assert($appRow > 0, "Student job application persisted in job_applications (job_id: {$job->id})");

    $notif = $pdo->query("SELECT * FROM notifications WHERE user_id = $studentId AND type = 'job_update' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
    e2e_assert($notif && $notif->college_id == 1 && $notif->link === '/jobs', "Job application triggered notification with recipient=$studentId, college_id=1, link='/jobs'");
}

// C. Mentorship Booking & Notification
if ($alumniId) {
    $res = e2e_http("$baseUrl/mentorship/book", 'POST', [
        'csrf_token' => $studentCsrf,
        'mentor_id' => $alumniId
    ], $studentCookies);
    $sessionId = $pdo->query("SELECT id FROM mentorship_sessions WHERE mentor_id = $alumniId AND mentee_id = $studentId ORDER BY id DESC LIMIT 1")->fetchColumn();
    e2e_assert($sessionId > 0, "Student mentorship booking persisted in mentorship_sessions (session_id: $sessionId)");

    $notif = $pdo->query("SELECT * FROM notifications WHERE user_id = $alumniId AND type = 'mentorship' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
    e2e_assert($notif && $notif->college_id == 1 && $notif->link === '/mentorship', "Mentorship booking triggered notification to mentor=$alumniId, college_id=1, link='/mentorship'");
}

// D. Referral Request & Notification
if ($alumniId) {
    $res = e2e_http("$baseUrl/referral-request/submit", 'POST', [
        'csrf_token' => $studentCsrf,
        'alumni_id' => $alumniId,
        'message' => 'E2E Automated Referral Request Test'
    ], $studentCookies);
    $refId = $pdo->query("SELECT id FROM referral_requests WHERE alumni_id = $alumniId AND student_id = $studentId ORDER BY id DESC LIMIT 1")->fetchColumn();
    e2e_assert($refId > 0, "Student referral request persisted in referral_requests (request_id: $refId)");

    $notif = $pdo->query("SELECT * FROM notifications WHERE user_id = $alumniId AND type = 'referral' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
    e2e_assert($notif && $notif->college_id == 1 && in_array($notif->link, ['/referral-request', '/manage-referrals']), "Referral request triggered notification to alumni=$alumniId, college_id=1, link='/referral-request'");
}

// E. Community Post: Create, Edit, Poll Vote, Comment, Like, Unlike, Delete
$uniquePostText = "Automated E2E Community Post " . time();
$res = e2e_http("$baseUrl/community/post", 'POST', [
    'csrf_token' => $studentCsrf,
    'content' => $uniquePostText
], $studentCookies);
$createdPost = $pdo->query("SELECT id FROM posts WHERE content = '$uniquePostText'")->fetch(PDO::FETCH_OBJ);
e2e_assert($createdPost !== false, "Student community post created in posts table (id: {$createdPost->id})");

if ($createdPost) {
    // Edit own post
    $editedContent = $uniquePostText . " [EDITED]";
    $res = e2e_http("$baseUrl/community/edit", 'POST', [
        'csrf_token' => $studentCsrf,
        'post_id' => $createdPost->id,
        'content' => $editedContent
    ], $studentCookies);
    $updatedPostContent = $pdo->query("SELECT content FROM posts WHERE id = {$createdPost->id}")->fetchColumn();
    e2e_assert($updatedPostContent === $editedContent, "Author successfully edited own community post in database");

    // Poll voting
    $res = e2e_http("$baseUrl/community/poll-vote", 'POST', [
        'csrf_token' => $studentCsrf,
        'post_id' => $createdPost->id,
        'option' => 'Option Alpha'
    ], $studentCookies);
    e2e_assert($res['code'] === 302, "Student successfully cast vote in community poll");

    // Comment
    $uniqueComment = "E2E Comment " . time();
    $res = e2e_http("$baseUrl/community/comment", 'POST', [
        'csrf_token' => $studentCsrf,
        'post_id' => $createdPost->id,
        'content' => $uniqueComment
    ], $studentCookies);
    $commentCount = (int)$pdo->query("SELECT COUNT(*) FROM post_comments WHERE post_id = {$createdPost->id} AND content = '$uniqueComment'")->fetchColumn();
    e2e_assert($commentCount > 0, "Student comment persisted in post_comments table");

    // Like
    $res = e2e_http("$baseUrl/community/like", 'POST', [
        'csrf_token' => $studentCsrf,
        'post_id' => $createdPost->id
    ], $studentCookies);
    $likeCount = (int)$pdo->query("SELECT COUNT(*) FROM post_likes WHERE post_id = {$createdPost->id} AND user_id = $studentId")->fetchColumn();
    e2e_assert($likeCount === 1, "Student like persisted in post_likes table");

    // Unlike
    $res = e2e_http("$baseUrl/community/like", 'POST', [
        'csrf_token' => $studentCsrf,
        'post_id' => $createdPost->id
    ], $studentCookies);
    $unlikeCount = (int)$pdo->query("SELECT COUNT(*) FROM post_likes WHERE post_id = {$createdPost->id} AND user_id = $studentId")->fetchColumn();
    e2e_assert($unlikeCount === 0, "Subsequent like toggle removed like from post_likes table (unlike confirmed)");

    // Delete own post
    $res = e2e_http("$baseUrl/community/delete", 'POST', [
        'csrf_token' => $studentCsrf,
        'post_id' => $createdPost->id
    ], $studentCookies);
    $postAfterDel = $pdo->query("SELECT COUNT(*) FROM posts WHERE id = {$createdPost->id}")->fetchColumn();
    e2e_assert($postAfterDel == 0, "Author successfully deleted own post from posts table");
}

// F. Marketplace Listing Lifecycle (Create, Edit, Delete)
$itemTitle = "E2E Calculus Textbook " . time();
$res = e2e_http("$baseUrl/marketplace/create", 'POST', [
    'csrf_token' => $studentCsrf,
    'title' => $itemTitle,
    'description' => 'Calculus 3rd Edition in excellent condition',
    'price' => 350,
    'item_condition' => 'like-new',
    'category' => 'books'
], $studentCookies);
$marketItemId = (int)$pdo->query("SELECT id FROM marketplace_items WHERE title = '$itemTitle' AND user_id = $studentId")->fetchColumn();
e2e_assert($marketItemId > 0, "Student marketplace item persisted in marketplace_items table (id: $marketItemId)");

if ($marketItemId) {
    // Edit own listing
    $updatedItemTitle = $itemTitle . " (Updated Edition)";
    $res = e2e_http("$baseUrl/marketplace/edit", 'POST', [
        'csrf_token' => $studentCsrf,
        'item_id' => $marketItemId,
        'title' => $updatedItemTitle,
        'price' => 400
    ], $studentCookies);
    $afterEditTitle = $pdo->query("SELECT title FROM marketplace_items WHERE id = $marketItemId")->fetchColumn();
    e2e_assert($afterEditTitle === $updatedItemTitle, "Owner successfully updated marketplace listing title and price");

    // Delete own listing
    $res = e2e_http("$baseUrl/marketplace/delete", 'POST', [
        'csrf_token' => $studentCsrf,
        'item_id' => $marketItemId
    ], $studentCookies);
    $itemAfterDel = $pdo->query("SELECT COUNT(*) FROM marketplace_items WHERE id = $marketItemId")->fetchColumn();
    e2e_assert($itemAfterDel == 0, "Owner successfully deleted marketplace listing from database");
}

// G. Direct Messaging & Read Receipt
$msgContent = "E2E Direct Message " . time();
$res = e2e_http("$baseUrl/messages/send", 'POST', [
    'csrf_token' => $studentCsrf,
    'receiver_id' => $alumniId,
    'content' => $msgContent
], $studentCookies);
$msgRow = $pdo->query("SELECT id, is_read FROM messages WHERE sender_id = $studentId AND receiver_id = $alumniId AND content = '$msgContent'")->fetch(PDO::FETCH_OBJ);
e2e_assert($msgRow && $msgRow->is_read == 0, "Direct message sent with unread status (is_read=0)");

// Recipient reads conversation
$viewConv = e2e_http("$baseUrl/messages?user_id=$studentId", 'GET', [], $alumniCookies);
$msgReadStatus = $pdo->query("SELECT is_read FROM messages WHERE id = {$msgRow->id}")->fetchColumn();
e2e_assert($msgReadStatus == 1, "Viewing recipient conversation marked message as read (read receipt confirmed: is_read=1)");

// New conversation initiation link from profile
$profilePage = e2e_http("$baseUrl/profile/$alumniId", 'GET', [], $studentCookies);
e2e_assert(strpos($profilePage['body'], "/messages?user_id=$alumniId") !== false, "Profile page renders direct conversation link to /messages?user_id=$alumniId");

// H. Donations, HMAC Tampering Protection & Replay Prevention
$campaign = $pdo->query("SELECT id, raised_amount FROM campaigns WHERE college_id = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
if ($campaign) {
    $beforeRaised = (float)$campaign->raised_amount;
    $res = e2e_http("$baseUrl/donations/donate", 'POST', [
        'csrf_token' => $studentCsrf,
        'campaign_id' => $campaign->id,
        'amount' => 500
    ], $studentCookies);
    
    $loc = $res['location'] ?? '';
    parse_str(parse_url($loc, PHP_URL_QUERY), $queryArgs);
    $txnId = $queryArgs['txn_id'] ?? null;
    $sig = $queryArgs['sig'] ?? null;
    e2e_assert(!empty($txnId) && !empty($sig), "Donation checkout generated secure HMAC signature and transaction ID ($txnId)");

    if ($txnId && $sig) {
        // Tampered signature must be rejected with 403
        $tamperRes = e2e_http("$baseUrl/payment/callback", 'POST', [
            'csrf_token' => $studentCsrf,
            'txn_id' => $txnId,
            'status' => 'success',
            'sig' => 'tampered_bogus_signature_hash_value'
        ], $studentCookies);
        e2e_assert($tamperRes['code'] === 403, "Payment callback with tampered HMAC signature rejected with HTTP 403");

        // Legitimate callback succeeds and updates progress total
        $cbRes = e2e_http("$baseUrl/payment/callback", 'POST', [
            'csrf_token' => $studentCsrf,
            'txn_id' => $txnId,
            'status' => 'success',
            'sig' => $sig
        ], $studentCookies);
        $donationStatus = $pdo->query("SELECT status FROM donations WHERE transaction_id = '$txnId'")->fetchColumn();
        $afterRaised = (float)$pdo->query("SELECT raised_amount FROM campaigns WHERE id = {$campaign->id}")->fetchColumn();
        e2e_assert($donationStatus === 'completed', "Donation transaction updated to 'completed' in database");
        e2e_assert($afterRaised >= $beforeRaised + 500, "Campaign raised_amount increased from $beforeRaised to $afterRaised");

        // Replayed callback must NOT double-count the amount
        $replayRes = e2e_http("$baseUrl/payment/callback", 'POST', [
            'csrf_token' => $studentCsrf,
            'txn_id' => $txnId,
            'status' => 'success',
            'sig' => $sig
        ], $studentCookies);
        $raisedAfterReplay = (float)$pdo->query("SELECT raised_amount FROM campaigns WHERE id = {$campaign->id}")->fetchColumn();
        e2e_assert($raisedAfterReplay === $afterRaised, "Replayed callback did NOT double-count campaign total (replay protection confirmed)");
    }
}

// I. Notification Mark-Read and Mark-All-Read
$pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, is_read, link) VALUES (?, 'test_notif_1', 'Test Notification 1', 1, 0, '/dashboard')")->execute([$studentId]);
$n1 = $pdo->lastInsertId();
$pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, is_read, link) VALUES (?, 'test_notif_2', 'Test Notification 2', 1, 0, '/dashboard')")->execute([$studentId]);
$n2 = $pdo->lastInsertId();

$res = e2e_http("$baseUrl/notifications/mark-read", 'POST', [
    'csrf_token' => $studentCsrf,
    'id' => $n1
], $studentCookies);
$n1Status = $pdo->query("SELECT is_read FROM notifications WHERE id = $n1")->fetchColumn();
$n2Status = $pdo->query("SELECT is_read FROM notifications WHERE id = $n2")->fetchColumn();
e2e_assert($n1Status == 1 && $n2Status == 0, "Mark-read endpoint updated individual notification to is_read=1 while leaving others unread");

$res = e2e_http("$baseUrl/notifications/mark-all-read", 'POST', [
    'csrf_token' => $studentCsrf
], $studentCookies);
$unreadCount = (int)$pdo->query("SELECT COUNT(*) FROM notifications WHERE user_id = $studentId AND is_read = 0")->fetchColumn();
e2e_assert($unreadCount === 0, "Mark-all-read endpoint updated all student notifications to is_read=1");

// --------------------------------------------------------------------------
// 3. ALUMNI WRITE FLOWS
// --------------------------------------------------------------------------
set_test_role('Alumni');
echo "\n--- 3. Testing Alumni Write Flows & Session State Transitions ---\n";

// A. Mentorship Session Lifecycle: Accept, Decline, Cancel
// Accept session
if (!empty($sessionId)) {
    $res = e2e_http("$baseUrl/mentorship/update-status", 'POST', [
        'csrf_token' => $alumniCsrf,
        'session_id' => $sessionId,
        'status' => 'accepted'
    ], $alumniCookies);
    $status = $pdo->query("SELECT status FROM mentorship_sessions WHERE id = $sessionId")->fetchColumn();
    e2e_assert($status === 'accepted', "Alumni accepted mentorship session (status: 'accepted')");

    $notif = $pdo->query("SELECT * FROM notifications WHERE user_id = $studentId AND type = 'mentorship_update' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
    e2e_assert($notif && $notif->link === '/mentorship', "Mentorship accept triggered notification with link='/mentorship'");

    // Decline another session
    $pdo->prepare("INSERT INTO mentorship_sessions (mentor_id, mentee_id, status, college_id) VALUES (?, ?, 'pending', 1)")->execute([$alumniId, $studentId]);
    $declineSessionId = $pdo->lastInsertId();
    $res = e2e_http("$baseUrl/mentorship/update-status", 'POST', [
        'csrf_token' => $alumniCsrf,
        'session_id' => $declineSessionId,
        'status' => 'declined'
    ], $alumniCookies);
    $declineStatus = $pdo->query("SELECT status FROM mentorship_sessions WHERE id = $declineSessionId")->fetchColumn();
    e2e_assert($declineStatus === 'declined', "Alumni declined mentorship session (status: 'declined')");

    // Cancel session
    $res = e2e_http("$baseUrl/mentorship/cancel", 'POST', [
        'csrf_token' => $alumniCsrf,
        'session_id' => $sessionId
    ], $alumniCookies);
    $cancelStatus = $pdo->query("SELECT status FROM mentorship_sessions WHERE id = $sessionId")->fetchColumn();
    e2e_assert($cancelStatus === 'cancelled', "Alumni cancelled mentorship session (status: 'cancelled')");

    $notif = $pdo->query("SELECT * FROM notifications WHERE user_id = $studentId AND type = 'mentorship_cancel' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
    e2e_assert($notif && $notif->link === '/mentorship', "Mentorship cancellation triggered notification to mentee with link='/mentorship'");
}

// B. Job Listing Lifecycle: Create, Edit, Delete
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
e2e_assert($postedJob !== false && $postedJob->college_id == 1, "Alumni posted job listing persisted with college_id=1 (id: {$postedJob->id})");

if ($postedJob) {
    // Edit job
    $updatedJobTitle = $newJobTitle . " (Lead)";
    $res = e2e_http("$baseUrl/jobs/edit", 'POST', [
        'csrf_token' => $alumniCsrf,
        'job_id' => $postedJob->id,
        'title' => $updatedJobTitle
    ], $alumniCookies);
    $jobTitleAfterEdit = $pdo->query("SELECT title FROM jobs WHERE id = {$postedJob->id}")->fetchColumn();
    e2e_assert($jobTitleAfterEdit === $updatedJobTitle, "Alumni updated job listing title in database");

    // Student forbidden from editing job
    $forbiddenEdit = e2e_http("$baseUrl/jobs/edit", 'POST', [
        'csrf_token' => $studentCsrf,
        'job_id' => $postedJob->id,
        'title' => 'Malicious Student Edit'
    ], $studentCookies);
    e2e_assert($forbiddenEdit['code'] === 403, "Student forbidden (HTTP 403) from editing alumni job listing");

    // Delete job
    $res = e2e_http("$baseUrl/jobs/delete", 'POST', [
        'csrf_token' => $adminCsrf,
        'job_id' => $postedJob->id
    ], $adminCookies);
    $jobAfterDel = $pdo->query("SELECT COUNT(*) FROM jobs WHERE id = {$postedJob->id}")->fetchColumn();
    e2e_assert($jobAfterDel == 0, "Authorized admin deleted job listing from database");
}

// C. Review / Approve Referral Request & Notification
if (!empty($refId)) {
    $res = e2e_http("$baseUrl/referral-request/update-status", 'POST', [
        'csrf_token' => $alumniCsrf,
        'request_id' => $refId,
        'status' => 'approved'
    ], $alumniCookies);
    $refStatus = $pdo->query("SELECT status FROM referral_requests WHERE id = $refId")->fetchColumn();
    e2e_assert($refStatus === 'approved', "Alumni approved referral request (status: 'approved')");

    $notif = $pdo->query("SELECT * FROM notifications WHERE user_id = $studentId AND type = 'referral_update' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
    e2e_assert($notif && $notif->link === '/referral-request', "Referral approval triggered notification with link='/referral-request'");
}

// --------------------------------------------------------------------------
// 4. COLLEGE ADMIN WRITE FLOWS & SECURITY
// --------------------------------------------------------------------------
set_test_role('College Admin');
echo "\n--- 4. Testing College Admin Lifecycle & Security Controls ---\n";

// A. User Verify / Deactivate within own college only
// College Admin deactivates own student
$res = e2e_http("$baseUrl/admin/users/status", 'POST', [
    'csrf_token' => $adminCsrf,
    'user_id' => $studentId,
    'status' => 'suspended'
], $adminCookies);
$stStatus = $pdo->query("SELECT status FROM users WHERE id = $studentId")->fetchColumn();
e2e_assert($stStatus === 'suspended', "College admin deactivated student account in own college");

// Reactivate student
$res = e2e_http("$baseUrl/admin/users/status", 'POST', [
    'csrf_token' => $adminCsrf,
    'user_id' => $studentId,
    'status' => 'active'
], $adminCookies);
$stStatus = $pdo->query("SELECT status FROM users WHERE id = $studentId")->fetchColumn();
e2e_assert($stStatus === 'active', "College admin reactivated student account in own college");

// College Admin forbidden from touching College 2 user
$c2User = $pdo->query("SELECT id FROM users WHERE college_id = 2 LIMIT 1")->fetchColumn();
if ($c2User) {
    $res = e2e_http("$baseUrl/admin/users/status", 'POST', [
        'csrf_token' => $adminCsrf,
        'user_id' => $c2User,
        'status' => 'suspended'
    ], $adminCookies);
    e2e_assert($res['code'] === 403, "College admin forbidden (HTTP 403) from modifying user in College 2");
}

// B. Event Lifecycle: Create, Edit, Delete
$newEventTitle = "Annual Alumni Conclave " . time();
$res = e2e_http("$baseUrl/events-admin/create", 'POST', [
    'csrf_token' => $adminCsrf,
    'title' => $newEventTitle,
    'description' => 'Keynote addresses and breakout rooms',
    'date' => date('Y-m-d H:i:s', strtotime('+30 days')),
    'location' => 'Main Auditorium',
    'type' => 'Networking'
], $adminCookies);
$createdEvent = $pdo->query("SELECT id, college_id FROM events WHERE title = '$newEventTitle'")->fetch(PDO::FETCH_OBJ);
e2e_assert($createdEvent !== false && $createdEvent->college_id == 1, "College admin created event persisted with college_id=1");

if ($createdEvent) {
    // Edit event
    $editedEventTitle = $newEventTitle . " (Confirmed)";
    $res = e2e_http("$baseUrl/events-admin/edit", 'POST', [
        'csrf_token' => $adminCsrf,
        'event_id' => $createdEvent->id,
        'title' => $editedEventTitle
    ], $adminCookies);
    $evTitleAfter = $pdo->query("SELECT title FROM events WHERE id = {$createdEvent->id}")->fetchColumn();
    e2e_assert($evTitleAfter === $editedEventTitle, "College admin updated event title in database");

    // Student forbidden from editing event
    $res = e2e_http("$baseUrl/events-admin/edit", 'POST', [
        'csrf_token' => $studentCsrf,
        'event_id' => $createdEvent->id,
        'title' => 'Student Tamper'
    ], $studentCookies);
    e2e_assert($res['code'] === 403, "Student forbidden (HTTP 403) from editing event");

    // Delete event
    $res = e2e_http("$baseUrl/events-admin/delete", 'POST', [
        'csrf_token' => $adminCsrf,
        'event_id' => $createdEvent->id
    ], $adminCookies);
    $evAfterDel = $pdo->query("SELECT COUNT(*) FROM events WHERE id = {$createdEvent->id}")->fetchColumn();
    e2e_assert($evAfterDel == 0, "College admin deleted event from database");
}

// C. Check in Attendee via QR Code
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

// D. Certificate PDF Generation
$certRes = e2e_http("$baseUrl/events-admin/certificate?reg_id=$regId", 'GET', [], $adminCookies);
$isRealPdf = strpos($certRes['body'], '%PDF') === 0;
e2e_assert($certRes['code'] === 200 && $isRealPdf, "Certificate generator output valid PDF starting with '%PDF'");

// E. Gallery Upload rejects spoofed file extension
$tempPhpScript = tempnam(sys_get_temp_dir(), 'hack') . '.php';
file_put_contents($tempPhpScript, "<?php phpinfo(); ?>");
$uploadRes = e2e_http("$baseUrl/events-admin/upload-gallery", 'POST', [
    'csrf_token' => $adminCsrf,
    'event_id' => $event ? $event->id : 1
], $adminCookies, ['gallery_image' => $tempPhpScript]);
@unlink($tempPhpScript);
e2e_assert(
    strpos($uploadRes['location'], 'error=Invalid+File') !== false || $uploadRes['code'] === 403,
    "Gallery upload rejected PHP script disguised or spoofed as upload file"
);

// F. Moderation Queue Resolution & Notification
$pdo->prepare("INSERT INTO reports (reporter_id, reported_item_type, reported_item_id, reason, status, college_id) VALUES (?, 'post', 1, 'Inappropriate tone', 'pending', 1)")
    ->execute([$studentId]);
$reportId = $pdo->lastInsertId();

$res = e2e_http("$baseUrl/admin/moderation/resolve", 'POST', [
    'csrf_token' => $adminCsrf,
    'id' => $reportId
], $adminCookies);
$reportStatus = $pdo->query("SELECT status FROM reports WHERE id = $reportId")->fetchColumn();
e2e_assert($reportStatus === 'resolved', "College admin moderation action resolved report in database");

$notif = $pdo->query("SELECT * FROM notifications WHERE user_id = $studentId AND type = 'moderation' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
e2e_assert($notif && $notif->link === '/community', "Moderation resolution notified reporter with link='/community'");

// G. RBAC 403 on Super Admin Dashboard
$adminSuperAccess = e2e_http("$baseUrl/super-admin/dashboard", 'GET', [], $adminCookies);
e2e_assert($adminSuperAccess['code'] === 403, "College admin forbidden (HTTP 403) from Super Admin dashboard");

// --------------------------------------------------------------------------
// 5. SUPER ADMIN WRITE FLOWS & PLATFORM CONTROLS
// --------------------------------------------------------------------------
set_test_role('Super Admin');
echo "\n--- 5. Testing Super Admin Multi-Tenant Governance ---\n";

// A. Create Institution
$instName = "Birla Institute of Tech " . rand(100, 999);
$res = e2e_http("$baseUrl/super-admin/institutions/create", 'POST', [
    'csrf_token' => $superCsrf,
    'name' => $instName,
    'city' => 'Pilani',
    'state' => 'Rajasthan',
    'plan' => 'Starter'
], $superCookies);
$instRow = $pdo->query("SELECT id, plan, status FROM colleges WHERE name = '$instName'")->fetch(PDO::FETCH_OBJ);
e2e_assert($instRow !== false, "Super admin onboarded new institution ($instName)");

if ($instRow) {
    // B. Tier Change
    $res = e2e_http("$baseUrl/super-admin/institutions/tier", 'POST', [
        'csrf_token' => $superCsrf,
        'college_id' => $instRow->id,
        'plan' => 'Enterprise'
    ], $superCookies);
    $updatedTier = $pdo->query("SELECT plan FROM colleges WHERE id = {$instRow->id}")->fetchColumn();
    e2e_assert($updatedTier === 'Enterprise', "Super admin upgraded institution tier to 'Enterprise'");

    // C. Suspend Institution & Verify Users Blocked
    $res = e2e_http("$baseUrl/super-admin/institutions/status", 'POST', [
        'csrf_token' => $superCsrf,
        'id' => $instRow->id,
        'status' => 'suspended'
    ], $superCookies);
    $instStatus = $pdo->query("SELECT status FROM colleges WHERE id = {$instRow->id}")->fetchColumn();
    e2e_assert($instStatus === 'suspended', "Super admin suspended institution in database");

    // Create a user in this suspended institution and verify login blocked
    $tempEmail = 'user_' . uniqid() . '@suspended.test';
    $tempPass = password_hash('Password123!', PASSWORD_DEFAULT);
    $pdo->prepare("INSERT INTO users (full_name, email, password, role, college_id, is_verified, status) VALUES ('Test User', ?, ?, 'student', ?, 1, 'active')")
        ->execute([$tempEmail, $tempPass, $instRow->id]);
    
    $blockedLogin = e2e_login($baseUrl, $tempEmail, 'Password123!');
    if ($blockedLogin['code'] !== 403 && strpos($blockedLogin['body'], 'institution has been suspended') === false) {
        echo "    [DEBUG blockedLogin] Code: {$blockedLogin['code']}, Loc: {$blockedLogin['location']}, Body: {$blockedLogin['body']}\n";
    }
    e2e_assert(
        $blockedLogin['code'] === 403 || strpos($blockedLogin['body'], 'institution has been suspended') !== false,
        "User from suspended institution is blocked from logging into the platform"
    );

    // Re-activate institution
    $pdo->prepare("UPDATE colleges SET status = 'active' WHERE id = ?")->execute([$instRow->id]);
}

// D. Advertisements: Create, Render, Disable, Verify Removed
$uniqueAdSponsor = "SuperBrand Enterprise " . time();
$res = e2e_http("$baseUrl/ads/create", 'POST', [
    'csrf_token' => $superCsrf,
    'sponsor_name' => $uniqueAdSponsor,
    'link_url' => 'https://example.com/sponsor',
    'image_url' => '/assets/img/login_side_img.png'
], $superCookies);
$adId = (int)$pdo->query("SELECT id FROM advertisements WHERE sponsor_name = '$uniqueAdSponsor'")->fetchColumn();
e2e_assert($adId > 0, "Super admin advertisement banner persisted in database (id: $adId)");

// Verify ad renders on /ads page
$adsPage = e2e_http("$baseUrl/ads", 'GET', [], $studentCookies);
e2e_assert(strpos($adsPage['body'], $uniqueAdSponsor) !== false, "Active advertisement renders on target /ads page");

// Disable ad
$res = e2e_http("$baseUrl/ads/disable", 'POST', [
    'csrf_token' => $superCsrf,
    'id' => $adId,
    'status' => 'disabled'
], $superCookies);
$adStatus = $pdo->query("SELECT status FROM advertisements WHERE id = $adId")->fetchColumn();
e2e_assert($adStatus === 'disabled', "Super admin disabled advertisement (status: 'disabled')");

// Verify disabled ad stops rendering on /ads page
$adsPageAfter = e2e_http("$baseUrl/ads", 'GET', [], $studentCookies);
e2e_assert(strpos($adsPageAfter['body'], $uniqueAdSponsor) === false, "Disabled advertisement stops rendering on /ads page");

// E. Revenue CSV Export has header row and data rows
$csvRes = e2e_http("$baseUrl/super-admin/revenue?export=csv", 'GET', [], $superCookies);
$isCsv = strpos($csvRes['header'], 'text/csv') !== false;
$csvLines = explode("\n", trim($csvRes['body']));
$hasHeaderAndData = count($csvLines) >= 2;
e2e_assert($csvRes['code'] === 200 && $isCsv && $hasHeaderAndData, "Super admin revenue CSV export generated valid multi-row CSV file with header and data rows");

// --------------------------------------------------------------------------
// 6. MULTI-TENANT ISOLATION ASSERTIONS
// --------------------------------------------------------------------------
set_test_role('Multi-Tenant Isolation');
echo "\n--- 6. Testing Multi-Tenant Isolation (Cross-College Barriers) ---\n";

@unlink($projectDir . '/storage/rate_limits.json');
$c2Login = e2e_login($baseUrl, 'student2@alumni.test', 'Password123!');
if ($c2Login['location'] !== '/dashboard') {
    echo "    [DEBUG c2Login] Code: {$c2Login['code']}, Loc: {$c2Login['location']}, Body: {$c2Login['body']}\n";
}
$c2Cookies = $c2Login['cookies'];
$c2Csrf = $c2Login['csrf'];

// Cross-tenant job application attempt
if ($job) {
    $res = e2e_http("$baseUrl/jobs/apply", 'POST', [
        'csrf_token' => $c2Csrf,
        'job_id' => $job->id
    ], $c2Cookies);
    e2e_assert($res['code'] === 403, "Cross-tenant job application blocked with HTTP 403");
}

// Cross-tenant direct message attempt
$res = e2e_http("$baseUrl/messages/send", 'POST', [
    'csrf_token' => $c2Csrf,
    'receiver_id' => $studentId,
    'content' => 'Malicious cross-tenant attempt'
], $c2Cookies);
e2e_assert($res['code'] === 403, "Cross-tenant direct messaging blocked with HTTP 403");

// Cross-tenant donation attempt
if ($campaign) {
    $res = e2e_http("$baseUrl/donations/donate", 'POST', [
        'csrf_token' => $c2Csrf,
        'campaign_id' => $campaign->id,
        'amount' => 100
    ], $c2Cookies);
    e2e_assert($res['code'] === 403, "Cross-tenant campaign donation blocked with HTTP 403");
}

// Direct-ID tampering: College 2 student attempts deleting College 1 post
$c1Post = $pdo->query("SELECT id FROM posts WHERE college_id = 1 LIMIT 1")->fetchColumn();
if ($c1Post) {
    $res = e2e_http("$baseUrl/community/delete", 'POST', [
        'csrf_token' => $c2Csrf,
        'post_id' => $c1Post
    ], $c2Cookies);
    e2e_assert($res['code'] === 403, "Direct-ID tampering: College 2 student blocked from deleting College 1 post (HTTP 403)");
}

// Direct-ID tampering: College 2 student attempts voting on College 1 poll
if ($c1Post) {
    $res = e2e_http("$baseUrl/community/poll-vote", 'POST', [
        'csrf_token' => $c2Csrf,
        'post_id' => $c1Post,
        'option' => 'Option Tamper'
    ], $c2Cookies);
    e2e_assert($res['code'] === 403, "Direct-ID tampering: College 2 student blocked from voting on College 1 poll (HTTP 403)");
}

// --------------------------------------------------------------------------
// 7. SECURITY, FORM VALIDATION, CSRF & RATE-LIMITING
// --------------------------------------------------------------------------
set_test_role('Security / CSRF / Rate-Limit');
echo "\n--- 7. Testing Form Validation, CSRF Blanket Coverage & Rate Limiting ---\n";

// A. Validation keeps input and reports error
$badLogin = e2e_http("$baseUrl/login", 'POST', [
    'csrf_token' => $studentCsrf,
    'email' => '',
    'password' => ''
], ['csrf_token' => $studentCsrf]);
$loginJson = json_decode($badLogin['body'], true);
e2e_assert(
    isset($loginJson['errors']) || (isset($loginJson['success']) && $loginJson['success'] === false),
    "Bad login submission returns validation error structure"
);

// B. CSRF Enforcement on All POST Routes
@unlink($projectDir . '/storage/rate_limits.json');
$pdo->exec("DELETE FROM login_attempts");
preg_match_all("/Router::post\(\s*'([^']+)'/", file_get_contents($projectDir . '/routes/web.php'), $matches);
$postRoutes = array_unique($matches[1]);
$allCsrfBlocked = true;
$testedCsrfCount = 0;

foreach ($postRoutes as $pRoute) {
    // Send POST with NO CSRF token and no cookies
    $res = e2e_http("$baseUrl$pRoute", 'POST', ['test' => 1]);
    $testedCsrfCount++;
    // Must return 403 Forbidden or redirect to login (if AuthMiddleware checks cookie first)
    if ($res['code'] !== 403 && $res['code'] !== 302) {
        $allCsrfBlocked = false;
        echo "    [CSRF LEAK] Route $pRoute returned HTTP {$res['code']} instead of 403/302!\n";
    }
}
e2e_assert($allCsrfBlocked && $testedCsrfCount > 15, "CSRF verification enforced across all $testedCsrfCount POST routes in web.php (all returned 403 or auth redirect)");

// C. Rate Limiting: 6th Failed Login in window returns HTTP 429
$attackEmail = "attacker_" . time() . "@test.com";
$pdo->prepare("DELETE FROM login_attempts WHERE email = ?")->execute([$attackEmail]);

for ($i = 1; $i <= 5; $i++) {
    $res = e2e_http("$baseUrl/login", 'POST', [
        'email' => $attackEmail,
        'password' => 'WrongPassword!',
        'csrf_token' => $studentCsrf
    ], ['csrf_token' => $studentCsrf]);
}
// The 6th attempt must trigger rate limiter
$sixthAttempt = e2e_http("$baseUrl/login", 'POST', [
    'email' => $attackEmail,
    'password' => 'WrongPassword!',
    'csrf_token' => $studentCsrf
], ['csrf_token' => $studentCsrf]);

e2e_assert($sixthAttempt['code'] === 429, "6th consecutive failed login attempt returned HTTP 429 (Too Many Requests)");
$pdo->prepare("DELETE FROM login_attempts WHERE email = ?")->execute([$attackEmail]);
@unlink(__DIR__ . '/../storage/rate_limits.json');

// D. 500 Error Page & Stack Trace Prevention
$excRes = e2e_http("$baseUrl/dev/forced-exception");
$has500Code = ($excRes['code'] === 500);
$hasStyledContent = (strpos($excRes['body'], '500 — Server Error') !== false);
$leaksTrace = (strpos($excRes['body'], 'Stack trace:') !== false || strpos($excRes['body'], 'Forced test exception') !== false || strpos($excRes['body'], '#0 ') !== false);
e2e_assert($has500Code && $hasStyledContent && !$leaksTrace, "Forced exception rendered styled 500 page with zero stack trace/internal leakage (HTTP 500)");

// E. display_errors disabled verification on live web server
$deRes = e2e_http("$baseUrl/dev/display-errors-check");
$deData = json_decode($deRes['body'], true);
$displayErrorsOff = (isset($deData['display_errors']) && in_array($deData['display_errors'], ['0', '', 'Off', 'off'], true));
e2e_assert($displayErrorsOff, "display_errors is confirmed Off ('0') on running web server runtime");

echo "\n========================================================\n";
echo "TEST RESULTS: $passedTests Passed / $totalTests Total | Failed: $failedTests\n";
echo "========================================================\n";

echo "\n--- Summary By Role / Area ---\n";
foreach ($roleStats as $r => $s) {
    echo sprintf("  %-30s : %2d Passed / %2d Total (%d Failed)\n", $r, $s['passed'], $s['total'], $s['failed']);
}

if ($failedTests > 0) {
    exit(1);
}
