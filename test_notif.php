<?php
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');
require 'app/Core/Database.php';
require 'app/Core/Auth.php';

$pdo = App\Core\Database::getConnection();

// Create two dummy users in College 1
$rand = rand(1000, 9999);
$pdo->exec("INSERT INTO users (full_name, email, password, role, college_id) VALUES ('Student User', 'student_$rand@example.com', 'test', 'student', 1)");
$studentId = $pdo->lastInsertId();

$pdo->exec("INSERT INTO users (full_name, email, password, role, college_id) VALUES ('Alumni User', 'alumni_$rand@example.com', 'test', 'alumni', 1)");
$alumniId = $pdo->lastInsertId();

// Mock auth session as Student
$_SESSION['user_id'] = $studentId;
$_SESSION['user_role'] = 'student';

// Simulate Mentorship Booking
$_POST['csrf_token'] = 'test';
$_COOKIE['csrf_token'] = 'test';
$_POST['mentor_id'] = $alumniId;

echo "--- Simulating Mentorship Booking by Student ---\n";
// Call the logic directly to avoid header redirects breaking the script
$collegeId = 1;
$stmt = $pdo->prepare("INSERT INTO mentorship_sessions (mentor_id, mentee_id, college_id) VALUES (?, ?, ?)");
$stmt->execute([$alumniId, $studentId, $collegeId]);
$menteeName = 'Student User';
$notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id) VALUES (?, 'mentorship', ?, ?)");
$notifStmt->execute([$alumniId, "$menteeName booked a mentorship session with you.", $collegeId]);
$sessionId = $pdo->lastInsertId();

// Simulate Mentorship Update Status by Alumni
echo "--- Simulating Mentorship Session Accepted by Alumni ---\n";
$mentorName = 'Alumni User';
$notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id) VALUES (?, 'mentorship_update', ?, ?)");
$notifStmt->execute([$studentId, "$mentorName has accepted your mentorship session request.", $collegeId]);

echo "\n--- Notifications Table State ---\n";
$res = $pdo->query("SELECT user_id, type, message, college_id FROM notifications WHERE user_id IN ($studentId, $alumniId) ORDER BY id DESC LIMIT 2")->fetchAll(PDO::FETCH_ASSOC);
print_r($res);
