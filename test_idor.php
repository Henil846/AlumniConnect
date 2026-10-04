<?php
require 'app/Core/Database.php';
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
$pdo = App\Core\Database::getConnection();

// --- SETUP DATA ---
$pdo->exec("INSERT INTO colleges (name, city, state) VALUES ('College A HTTP', 'City', 'State'), ('College B HTTP', 'City', 'State')");
$collegeAId = $pdo->lastInsertId();
$collegeBId = $collegeAId + 1;

$pwdHash = password_hash('Pass123!', PASSWORD_BCRYPT);
$emailA = 'usera_http_' . time() . '@a.edu';
$emailB = 'userb_http_' . time() . '@b.edu';

$pdo->exec("INSERT INTO users (full_name, email, password, college_id, role, is_verified) VALUES ('User A', '$emailA', '$pwdHash', $collegeAId, 'alumni', 1)");
$userAId = $pdo->lastInsertId();

$pdo->exec("INSERT INTO users (full_name, email, password, college_id, role, is_verified) VALUES ('User B', '$emailB', '$pwdHash', $collegeBId, 'alumni', 1)");
$userBId = $pdo->lastInsertId();

$pdo->exec("INSERT INTO jobs (title, company, location, type, industry, salary_range, description, college_id) VALUES ('Job A', 'Comp A', 'Loc A', 'Full-time', 'Tech', '100k', 'Desc', $collegeAId)");
$jobAId = $pdo->lastInsertId();

$pdo->exec("INSERT INTO jobs (title, company, location, type, industry, salary_range, description, college_id) VALUES ('Job B', 'Comp B', 'Loc B', 'Full-time', 'Tech', '100k', 'Desc', $collegeBId)");
$jobBId = $pdo->lastInsertId();


// --- HTTP CLIENT ---
$base_url = 'http://localhost:8000';
function makeRequest($url, $method = 'GET', $data = [], $cookies = []) {
    $options = [
        'http' => [
            'method'  => $method,
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'ignore_errors' => true
        ]
    ];
    if ($method === 'POST') {
        $options['http']['content'] = http_build_query($data);
    }
    
    $cookieHeader = '';
    foreach ($cookies as $key => $val) {
        $cookieHeader .= "$key=$val; ";
    }
    if ($cookieHeader) {
        $options['http']['header'] .= "Cookie: $cookieHeader\r\n";
    }

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    $status = 200;
    if (isset($http_response_header[0])) {
        preg_match('#HTTP/\d+\.\d+ (\d+)#', $http_response_header[0], $match);
        $status = intval($match[1]);
    }

    $newCookies = [];
    foreach ($http_response_header as $hdr) {
        if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
            parse_str($matches[1], $cookieData);
            foreach ($cookieData as $k => $v) {
                $newCookies[$k] = $v;
            }
        }
    }

    return ['body' => $result, 'cookies' => array_merge($cookies, $newCookies), 'status' => $status];
}

echo "=== Testing IDOR Write Paths ===\n";

// 1. Get CSRF Token
$res = makeRequest("$base_url/login");
$csrfToken = $res['cookies']['csrf_token'] ?? '';
$cookies = $res['cookies'];

// 2. Login as User A
$loginData = ['email' => $emailA, 'password' => 'Pass123!', 'csrf_token' => $csrfToken];
$res = makeRequest("$base_url/login", 'POST', $loginData, $cookies);
$cookies = $res['cookies']; // Now has JWT

// 3. Apply for Job A (Same college)
$res = makeRequest("$base_url/jobs/apply", 'POST', ['job_id' => $jobAId, 'csrf_token' => $csrfToken], $cookies);
echo "Apply Job A (Same College): HTTP " . $res['status'] . "\n";
if ($res['status'] === 403) echo "FAIL: Should have succeeded.\n";

$inserted = $pdo->query("SELECT college_id FROM job_applications WHERE job_id = $jobAId ORDER BY id DESC LIMIT 1")->fetchColumn();
echo "-> Inserted job_application row has college_id: " . ($inserted ?: 'NULL') . "\n";
if ($inserted != $collegeAId) echo "FAIL: Row does not have the correct college_id.\n";

// 4. Apply for Job B (Different college)
$res = makeRequest("$base_url/jobs/apply", 'POST', ['job_id' => $jobBId, 'csrf_token' => $csrfToken], $cookies);
echo "Apply Job B (Different College): HTTP " . $res['status'] . "\n";
if ($res['status'] !== 403) echo "FAIL: Should have been 403 Forbidden.\n";

// 5. Message User A (Self / Same College)
$res = makeRequest("$base_url/messages/send", 'POST', ['receiver_id' => $userAId, 'content' => 'Hello', 'csrf_token' => $csrfToken], $cookies);
echo "Message User A (Same College): HTTP " . $res['status'] . "\n";

$insertedMsg = $pdo->query("SELECT college_id FROM messages WHERE receiver_id = $userAId ORDER BY id DESC LIMIT 1")->fetchColumn();
echo "-> Inserted message row has college_id: " . ($insertedMsg ?: 'NULL') . "\n";
if ($insertedMsg != $collegeAId) echo "FAIL: Message row does not have the correct college_id.\n";

// 6. Message User B (Different College)
$res = makeRequest("$base_url/messages/send", 'POST', ['receiver_id' => $userBId, 'content' => 'Hello', 'csrf_token' => $csrfToken], $cookies);
echo "Message User B (Different College): HTTP " . $res['status'] . "\n";
if ($res['status'] !== 403) echo "FAIL: Should have been 403 Forbidden.\n";

// --- CLEANUP ---
$pdo->exec("DELETE FROM job_applications WHERE job_id IN ($jobAId, $jobBId)");
$pdo->exec("DELETE FROM messages WHERE sender_id = $userAId");
$pdo->exec("DELETE FROM jobs WHERE id IN ($jobAId, $jobBId)");
$pdo->exec("DELETE FROM users WHERE id IN ($userAId, $userBId)");
$pdo->exec("DELETE FROM colleges WHERE id IN ($collegeAId, $collegeBId)");

echo "\nDone!\n";
