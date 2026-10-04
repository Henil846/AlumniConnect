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
        $stmt2 = $pdo->prepare("SELECT count(*) as count FROM mentorship_sessions WHERE mentee_id = ?");
        $stmt2->execute([$userId]);
        $mentorshipCount = $stmt2->fetch(\PDO::FETCH_OBJ)->count;

        $stmt3 = $pdo->prepare("SELECT count(*) as count FROM referral_requests WHERE student_id = ?");
        $stmt3->execute([$userId]);
        $referralsCount = $stmt3->fetch(\PDO::FETCH_OBJ)->count;

        return View::render('dashboard', [
            'title' => 'Dashboard — Alumni Connect',
            'activePage' => 'dashboard',
            'user' => $user,
            'mentorshipCount' => $mentorshipCount,
            'referralsCount' => $referralsCount,
            'extraCss' => '/assets/css/dashboard.css'
        ], 'app');
    }
}
