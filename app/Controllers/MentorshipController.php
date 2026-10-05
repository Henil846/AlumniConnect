<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class MentorshipController {
    public function index() {
        $pdo = Database::getConnection();
        
        // Fetch users who are considered mentors. 
        $sql = "SELECT * FROM users WHERE role = 'alumni'";
        $params = [];
        
        if (!empty($_GET['industry'])) {
            $sql .= " AND industry = ?";
            $params[] = $_GET['industry'];
        }
        
        $sql .= " ORDER BY created_at ASC LIMIT 10";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $mentors = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return View::render('mentorship', [
            'title' => 'Mentorship — Alumni Connect',
            'activePage' => 'mentorship',
            'mentors' => $mentors,
            
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
                $pdo->exec("CREATE TABLE IF NOT EXISTS mentorship_sessions (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    mentor_id INT NOT NULL,
                    mentee_id INT NOT NULL,
                    status VARCHAR(50) DEFAULT 'pending',
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )");
                
                $stmt = $pdo->prepare("INSERT INTO mentorship_sessions (mentor_id, mentee_id, college_id) VALUES (?, ?, ?)");
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
                    $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id) VALUES (?, 'mentorship', ?, ?)");
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
        
        if ($sessionId && in_array($status, ['accepted', 'rejected', 'rescheduled'])) {
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
                $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id) VALUES (?, 'mentorship_update', ?, ?)");
                $notifStmt->execute([$menteeId, "$mentorName has $status your mentorship session request.", $collegeId]);
            } else {
                http_response_code(403);
                die("Unauthorized to update this session");
            }
        }
        
        header('Location: /mentorship?updated=1');
        exit;
    }
}
