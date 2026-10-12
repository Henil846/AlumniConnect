<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class MentorshipController {
    public function index() {
        $pdo = Database::getConnection();
        
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        // Fetch users who are considered mentors within the same college. 
        $sql = "SELECT * FROM users WHERE role = 'alumni' AND college_id = ?";
        $params = [$collegeId];
        
        if (!empty($_GET['industry'])) {
            $sql .= " AND industry = ?";
            $params[] = $_GET['industry'];
        }
        
        $sql .= " ORDER BY created_at ASC LIMIT 10";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $mentors = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $incomingRequests = [];
        if (\App\Core\Auth::user() && \App\Core\Auth::user()->role === 'alumni') {
            $reqStmt = $pdo->prepare("SELECT ms.*, u.full_name as mentee_name FROM mentorship_sessions ms JOIN users u ON ms.mentee_id = u.id WHERE ms.mentor_id = ? AND ms.status = 'pending'");
            $reqStmt->execute([\App\Core\Auth::id()]);
            $incomingRequests = $reqStmt->fetchAll(\PDO::FETCH_OBJ);
        }

        return View::render('mentorship', [
            'title' => 'Mentorship — Alumni Connect',
            'activePage' => 'mentorship',
            'mentors' => $mentors,
            'incomingRequests' => $incomingRequests,
        ], 'app');
    }

    public function book() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die('CSRF validation failed.');
        }

        $mentorId = $_POST['mentor_id'] ?? null;
        if ($mentorId) {
            $pdo = Database::getConnection();
            try {
                $stmt = $pdo->prepare("INSERT INTO mentorship_sessions (mentor_id, mentee_id, status, college_id) VALUES (?, ?, 'pending', ?)");
                $menteeId = \App\Core\Auth::id() ?? null;
                $collegeId = \App\Core\Auth::user()->college_id ?? null;
                
                if ($menteeId) {
                    $check = $pdo->prepare("SELECT id FROM users WHERE id = ? AND college_id = ?");
                    $check->execute([$mentorId, $collegeId]);
                    if (!$check->fetch()) {
                        http_response_code(403);
                        die("Unauthorized to book this mentor");
                    }
                    $stmt->execute([$mentorId, $menteeId, $collegeId]);
                    
                    // Generate Notification for Mentor
                    $menteeName = \App\Core\Auth::user()->full_name ?? 'Someone';
                    $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, link) VALUES (?, 'mentorship', ?, ?, '/mentorship')");
                    $notifStmt->execute([$mentorId, "$menteeName booked a mentorship session with you.", $collegeId]);
                }
            } catch (\PDOException $e) {}
        }
        
        header('Location: /mentorship?booked=1');
        exit;
    }

    public function updateStatus() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die('CSRF validation failed.');
        }

        $sessionId = $_POST['session_id'] ?? null;
        $status = $_POST['status'] ?? null;
        $mentorId = \App\Core\Auth::id() ?? null;
        
        if ($sessionId && in_array($status, ['accepted', 'declined', 'rejected', 'rescheduled', 'completed'])) {
            $pdo = Database::getConnection();
            
            // Verify ownership
            $stmt = $pdo->prepare("SELECT mentee_id FROM mentorship_sessions WHERE id = ? AND mentor_id = ?");
            $stmt->execute([$sessionId, $mentorId]);
            $menteeId = $stmt->fetchColumn();
            
            if ($menteeId) {
                $pdo->prepare("UPDATE mentorship_sessions SET status = ? WHERE id = ?")->execute([$status, $sessionId]);
                
                // Generate Notification for Mentee
                $mentorName = \App\Core\Auth::user()->full_name ?? 'Your mentor';
                $collegeId = \App\Core\Auth::user()->college_id ?? null;
                $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, link) VALUES (?, 'mentorship_update', ?, ?, '/mentorship')");
                $notifStmt->execute([$menteeId, "$mentorName has $status your mentorship session request.", $collegeId]);
            } else {
                http_response_code(403);
                die("Unauthorized to update this session");
            }
        }
        
        header('Location: /mentorship?updated=1');
        exit;
    }

    public function cancel() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die('CSRF validation failed.');
        }
        $sessionId = (int)($_POST['session_id'] ?? 0);
        $userId = \App\Core\Auth::id() ?? null;
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("SELECT * FROM mentorship_sessions WHERE id = ?");
        $stmt->execute([$sessionId]);
        $session = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$session || ($session->mentee_id != $userId && $session->mentor_id != $userId)) {
            http_response_code(403);
            die("Unauthorized to cancel this session");
        }
        $pdo->prepare("UPDATE mentorship_sessions SET status = 'cancelled' WHERE id = ?")->execute([$sessionId]);
        
        $targetUser = ($session->mentee_id == $userId) ? $session->mentor_id : $session->mentee_id;
        $cancellerName = \App\Core\Auth::user()->full_name ?? 'Someone';
        $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, link) VALUES (?, 'mentorship_cancel', ?, ?, '/mentorship')");
        $notifStmt->execute([$targetUser, "$cancellerName cancelled the mentorship session.", $collegeId]);

        header("Location: /mentorship?cancelled=1");
        exit;
    }
}
