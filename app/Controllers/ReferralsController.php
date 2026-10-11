<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class ReferralsController {
    public function index() {
        $pdo = Database::getConnection();
        $alumniId = $_GET['alumni_id'] ?? null;
        $alumni = null;
        if ($alumniId) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ? AND role = 'alumni'");
            $stmt->execute([$alumniId]);
            $alumni = $stmt->fetch(\PDO::FETCH_OBJ);
        }

        return View::render('referral-request', [
            'title' => 'Request a Referral — Alumni Connect',
            'activePage' => 'referral-request',
            'alumni' => $alumni
        ], 'app');
    }

    public function submit() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die('CSRF validation failed.');
        }

        $alumniId = $_POST['alumni_id'] ?? null;
        if ($alumniId) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO referral_requests (alumni_id, student_id, status, college_id) VALUES (?, ?, 'requested', ?)");
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
                $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, link) VALUES (?, 'referral', ?, ?, '/referral-request')");
                $notifStmt->execute([$alumniId, "$studentName requested a referral from you.", $collegeId]);
            }
        }
        
        header('Location: /referral-request?submitted=1');
        exit;
    }

    public function updateStatus() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die('CSRF validation failed.');
        }

        $requestId = $_POST['request_id'] ?? null;
        $status = $_POST['status'] ?? null;
        $alumniId = \App\Core\Auth::id() ?? null;
        
        // Map legacy 'approved' to canonical 'submitted'
        if ($status === 'approved') {
            $status = 'submitted';
        }
        
        $validStatuses = ['requested', 'reviewed', 'submitted', 'rejected'];
        if ($requestId && in_array($status, $validStatuses)) {
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
                $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, link) VALUES (?, 'referral_update', ?, ?, '/referral-request')");
                $notifStmt->execute([$studentId, "$alumniName has updated your referral request to '$status'.", $collegeId]);
            } else {
                http_response_code(403);
                die("Unauthorized to update this request");
            }
        }
        
        header('Location: /referral-request?updated=1');
        exit;
    }
}
