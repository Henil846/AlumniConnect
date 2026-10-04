<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

function makeRequest($url, $method = 'GET', $data = [], $cookies = []) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if (is_array($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        }
    }
    if (!empty($cookies)) {
        $cookieStr = [];
        foreach($cookies as $k => $v) $cookieStr[] = "$k=$v";
        curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookieStr));
    }
    $response = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);
    
    $new_cookies = [];
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $header, $matches);
    foreach($matches[1] as $item) {
        parse_str($item, $cookie);
        foreach($cookie as $k => $v) {
            $new_cookies[$k] = $v;
        }
    }
    return ['code' => curl_getinfo($ch, CURLINFO_HTTP_CODE), 'body' => $body, 'cookies' => $new_cookies];
}

$base = "http://localhost:8000";
$res = makeRequest("$base/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
$loginData = ['email' => 'user1@test.com', 'password' => 'Password123!', 'csrf_token' => $csrfToken];
$res = makeRequest("$base/login", 'POST', $loginData, ['csrf_token' => $csrfToken]);
$authToken = $res['cookies']['auth_token'] ?? '';
$cookies = ['csrf_token' => $csrfToken, 'auth_token' => $authToken];

if (!$authToken) die("Failed to login\n");
echo "Logged in successfully.\n\n";

// Get user ID
$user = $pdo->query("SELECT * FROM users WHERE email='user1@test.com'")->fetch(PDO::FETCH_ASSOC);
$userId = $user['id'];

// 1. Mentorship
$pdo->query("DELETE FROM mentorship_sessions WHERE mentee_id=$userId");
$res = makeRequest("$base/mentorship/book", 'POST', ['mentor_id' => 2, 'csrf_token' => $csrfToken], $cookies);
$row = $pdo->query("SELECT * FROM mentorship_sessions WHERE mentee_id=$userId")->fetch(PDO::FETCH_ASSOC);
echo "Mentorship Book HTTP Code: " . $res['code'] . "\n";
echo "Mentorship DB row exists: " . ($row ? 'YES' : 'NO') . " (Mentee ID: {$row['mentee_id']})\n\n";

// 2. Referrals
$pdo->query("DELETE FROM referral_requests WHERE student_id=$userId");
$res = makeRequest("$base/referral-request/submit", 'POST', ['alumni_id' => 2, 'csrf_token' => $csrfToken], $cookies);
$row = $pdo->query("SELECT * FROM referral_requests WHERE student_id=$userId")->fetch(PDO::FETCH_ASSOC);
echo "Referral Request HTTP Code: " . $res['code'] . "\n";
echo "Referral Request DB row exists: " . ($row ? 'YES' : 'NO') . " (Student ID: {$row['student_id']})\n\n";

// 3. Events RSVP
$pdo->query("DELETE FROM event_registrations WHERE user_id=$userId");
$res = makeRequest("$base/events/rsvp", 'POST', ['event_id' => 1, 'csrf_token' => $csrfToken], $cookies);
$row = $pdo->query("SELECT * FROM event_registrations WHERE user_id=$userId")->fetch(PDO::FETCH_ASSOC);
echo "Events RSVP HTTP Code: " . $res['code'] . "\n";
echo "Events RSVP DB row exists: " . ($row ? 'YES' : 'NO') . " (User ID: {$row['user_id']})\n\n";

// 4. Community Post
$pdo->query("DELETE FROM posts WHERE user_id=$userId");
$res = makeRequest("$base/community/post", 'POST', ['content' => 'Test Post From CLI', 'csrf_token' => $csrfToken], $cookies);
$row = $pdo->query("SELECT * FROM posts WHERE user_id=$userId AND content='Test Post From CLI'")->fetch(PDO::FETCH_ASSOC);
echo "Community Post HTTP Code: " . $res['code'] . "\n";
echo "Community Post DB row exists: " . ($row ? 'YES' : 'NO') . " (User ID: {$row['user_id']})\n\n";

// 5. Community Like
if ($row) {
    $postId = $row['id'];
    $pdo->query("DELETE FROM post_likes WHERE user_id=$userId");
    $res = makeRequest("$base/community/like", 'POST', ['post_id' => $postId, 'csrf_token' => $csrfToken], $cookies);
    $like = $pdo->query("SELECT * FROM post_likes WHERE user_id=$userId AND post_id=$postId")->fetch(PDO::FETCH_ASSOC);
    echo "Community Like HTTP Code: " . $res['code'] . "\n";
    echo "Community Like DB row exists: " . ($like ? 'YES' : 'NO') . " (User ID: {$like['user_id']})\n\n";
}

// 6. Messages
$pdo->query("DELETE FROM messages WHERE sender_id=$userId");
$res = makeRequest("$base/messages/send", 'POST', ['receiver_id' => 2, 'content' => 'Test msg from CLI', 'csrf_token' => $csrfToken], $cookies);
$row = $pdo->query("SELECT * FROM messages WHERE sender_id=$userId")->fetch(PDO::FETCH_ASSOC);
echo "Message Send HTTP Code: " . $res['code'] . "\n";
echo "Message DB row exists: " . ($row ? 'YES' : 'NO') . " (Sender ID: {$row['sender_id']})\n\n";

// 7. Directory GET (no POST forms in Directory)
$res = makeRequest("$base/directory", 'GET', [], $cookies);
echo "Directory GET HTTP Code: " . $res['code'] . "\n\n";

// Marketplace
$res = makeRequest("$base/marketplace/create", 'POST', ['title' => 'Test', 'price' => 10, 'category' => 'books', 'csrf_token' => $csrfToken], $cookies);
echo "Marketplace POST HTTP Code: " . $res['code'] . "\n";

// Settings
$res = makeRequest("$base/settings/update", 'POST', ['profile_visibility' => 'public', 'csrf_token' => $csrfToken], $cookies);
echo "Settings POST HTTP Code: " . $res['code'] . "\n";

echo "All tests complete.\n";
