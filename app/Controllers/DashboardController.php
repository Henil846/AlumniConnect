<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class DashboardController {
    public function index() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) {
            header('Location: /login');
            exit;
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        // Fetch counts for Dashboard
        $stmt2 = $pdo->prepare("SELECT count(*) as count FROM mentorship_sessions WHERE mentee_id = ? OR mentor_id = ?");
        $stmt2->execute([$userId, $userId]);
        $mentorshipCount = $stmt2->fetch(\PDO::FETCH_OBJ)->count;

        $stmt3 = $pdo->prepare("SELECT count(*) as count FROM referral_requests WHERE student_id = ? OR alumni_id = ?");
        $stmt3->execute([$userId, $userId]);
        $referralsCount = $stmt3->fetch(\PDO::FETCH_OBJ)->count;
        
        // Fetch pending mentorship requests received
        $stmt_mentors = $pdo->prepare("
            SELECT m.*, u.full_name, u.industry 
            FROM mentorship_sessions m 
            JOIN users u ON m.mentee_id = u.id 
            WHERE m.mentor_id = ? AND m.status = 'pending' 
            LIMIT 3
        ");
        $stmt_mentors->execute([$userId]);
        $mentorshipRequests = $stmt_mentors->fetchAll(\PDO::FETCH_OBJ);
        
        // Fetch top mentors (alumni)
        $stmt_top = $pdo->query("SELECT id, full_name, industry, department FROM users WHERE role = 'alumni' LIMIT 5");
        $topMentors = $stmt_top->fetchAll(\PDO::FETCH_OBJ);
        
        // Fetch referral requests received
        $stmt_ref = $pdo->prepare("
            SELECT r.*, u.full_name 
            FROM referral_requests r 
            JOIN users u ON r.student_id = u.id 
            WHERE r.alumni_id = ? AND r.status = 'pending' 
            LIMIT 3
        ");
        $stmt_ref->execute([$userId]);
        $referralRequestsData = $stmt_ref->fetchAll(\PDO::FETCH_OBJ);

        return View::render('dashboard', [
            'title' => 'Dashboard — Alumni Connect',
            'activePage' => 'dashboard',
            'user' => $user,
            'mentorshipCount' => $mentorshipCount,
            'referralsCount' => $referralsCount,
            'mentorshipRequests' => $mentorshipRequests,
            'topMentors' => $topMentors,
            'referralRequestsData' => $referralRequestsData,
        ], 'app');
    }
}
