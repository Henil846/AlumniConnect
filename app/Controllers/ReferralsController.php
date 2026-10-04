<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class ReferralsController {
    public function index() {
        return View::render('referral-request', [
            'title' => 'Request a Referral — Alumni Connect',
            'activePage' => 'referral-request',
            'extraCss' => '/assets/css/extended.css'
        ], 'app');
    }

    public function submit() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die('CSRF validation failed.');
        }

        $alumniId = $_POST['alumni_id'] ?? null;
        if ($alumniId) {
            $pdo = Database::getConnection();
            try {
                $pdo->exec("CREATE TABLE IF NOT EXISTS referral_requests (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    alumni_id INT NOT NULL,
                    student_id INT NOT NULL,
                    status VARCHAR(50) DEFAULT 'pending',
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )");
                
                $stmt = $pdo->prepare("INSERT INTO referral_requests (alumni_id, student_id, college_id) VALUES (?, ?, ?)");
                $studentId = \App\Core\Auth::id() ?? null;
                $collegeId = \App\Core\Auth::user()->college_id ?? null;
                if ($studentId) {
                    $check = $pdo->prepare("SELECT id FROM users WHERE id = ? AND college_id = ?");
                    $check->execute([$alumniId, $collegeId]);
                    if (!$check->fetch()) {
                        http_response_code(403);
                        die("Unauthorized to request referral from this user");
                    }
                    $stmt->execute([$alumniId, $studentId, $collegeId]);
                    
                    // Generate Notification for Alumni
                    $studentName = \App\Core\Auth::user()->full_name ?? 'Someone';
                    $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id) VALUES (?, 'referral', ?, ?)");
                    $notifStmt->execute([$alumniId, "$studentName requested a referral from you.", $collegeId]);
                }
            } catch (\PDOException $e) {}
        }
        
        header('Location: /referral-request?submitted=1');
        exit;
    }

    public function updateStatus() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die('CSRF validation failed.');
        }

        $requestId = $_POST['request_id'] ?? null;
        $status = $_POST['status'] ?? null;
        $alumniId = \App\Core\Auth::id() ?? null;
        
        if ($requestId && in_array($status, ['approved', 'rejected'])) {
            $pdo = Database::getConnection();
            
            // Verify ownership
            $stmt = $pdo->prepare("SELECT student_id FROM referral_requests WHERE id = ? AND alumni_id = ?");
            $stmt->execute([$requestId, $alumniId]);
            $studentId = $stmt->fetchColumn();
            
            if ($studentId) {
                $pdo->prepare("UPDATE referral_requests SET status = ? WHERE id = ?")->execute([$status, $requestId]);
                
                // Generate Notification for Student
                $alumniName = \App\Core\Auth::user()->full_name ?? 'An alumni';
                $collegeId = \App\Core\Auth::user()->college_id ?? null;
                $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id) VALUES (?, 'referral_update', ?, ?)");
                $notifStmt->execute([$studentId, "$alumniName has $status your referral request.", $collegeId]);
            } else {
                http_response_code(403);
                die("Unauthorized to update this request");
            }
        }
        
        header('Location: /referral-request?updated=1');
        exit;
    }
}
