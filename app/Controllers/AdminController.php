<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class AdminController {
    private function checkAdmin() {
        $role = \App\Core\Auth::user()->role ?? null;
        if ($role !== 'admin' && $role !== 'college_admin') {
            http_response_code(403);
            try {
                \App\Core\View::render('errors/403', ['title' => 'Access Forbidden — Alumni Connect', 'activePage' => ''], 'app');
            } catch (\Throwable $t) {
                echo "Unauthorized - Admin only";
            }
            exit;
        }
    }

    private function validateCsrf() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
    }

    public function dashboard() {
        $this->checkAdmin();
        $pdo = Database::getConnection();
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        // Scoped analytics
        $userCountStmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE college_id = ?");
        $userCountStmt->execute([$collegeId]);
        $userCount = (int)$userCountStmt->fetchColumn();

        $studentCountStmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE college_id = ? AND role = 'student'");
        $studentCountStmt->execute([$collegeId]);
        $studentCount = (int)$studentCountStmt->fetchColumn();

        $alumniCountStmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE college_id = ? AND role = 'alumni'");
        $alumniCountStmt->execute([$collegeId]);
        $alumniCount = (int)$alumniCountStmt->fetchColumn();
        
        $donationStmt = $pdo->prepare("SELECT COALESCE(SUM(amount), 0) FROM donations d JOIN campaigns c ON d.campaign_id = c.id WHERE d.status='completed' AND c.college_id = ?");
        $donationStmt->execute([$collegeId]);
        $donationTotal = (float)$donationStmt->fetchColumn();

        $recentUsersStmt = $pdo->prepare("SELECT * FROM users WHERE college_id = ? ORDER BY created_at DESC LIMIT 5");
        $recentUsersStmt->execute([$collegeId]);
        $recentUsers = $recentUsersStmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('admin/dashboard', [
            'title' => 'College Admin Dashboard — Alumni Connect',
            'activePage' => 'admin-dashboard',
            'userCount' => $userCount,
            'studentCount' => $studentCount,
            'alumniCount' => $alumniCount,
            'donationTotal' => $donationTotal,
            'recentUsers' => $recentUsers,
        ], 'app');
    }

    public function moderation() {
        $this->checkAdmin();
        $pdo = Database::getConnection();
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        $stmt = $pdo->prepare("SELECT * FROM reports WHERE college_id = ? ORDER BY created_at DESC");
        $stmt->execute([$collegeId]);
        $reports = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('admin/moderation', [
            'title' => 'Moderation & Reports — Alumni Connect',
            'activePage' => 'admin-moderation',
            'reports' => $reports,
        ], 'app');
    }

    public function resolveReport() {
        $this->checkAdmin();
        $this->validateCsrf();

        $id = $_POST['id'] ?? null;
        if ($id) {
            $pdo = Database::getConnection();
            $collegeId = \App\Core\Auth::user()->college_id ?? null;
            
            // Fetch report details
            $repStmt = $pdo->prepare("SELECT reporter_id, reported_item_type FROM reports WHERE id = ? AND college_id = ?");
            $repStmt->execute([$id, $collegeId]);
            $rep = $repStmt->fetch(\PDO::FETCH_OBJ);

            $stmt = $pdo->prepare("UPDATE reports SET status = 'resolved' WHERE id = ? AND college_id = ?");
            $stmt->execute([$id, $collegeId]);

            // Notify reporter
            if ($rep && $rep->reporter_id) {
                $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, link) VALUES (?, 'moderation', ?, ?, '/community')");
                $notifStmt->execute([$rep->reporter_id, "Your report for item ({$rep->reported_item_type}) has been reviewed and resolved by administrators.", $collegeId]);
            }
        }
        header("Location: /admin/moderation?resolved=1");
        exit;
    }

    public function payments() {
        $this->checkAdmin();
        $pdo = Database::getConnection();
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        $stmt = $pdo->prepare("SELECT d.* FROM donations d JOIN campaigns c ON d.campaign_id = c.id WHERE c.college_id = ? ORDER BY d.created_at DESC");
        $stmt->execute([$collegeId]);
        $payments = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('admin/payments', [
            'title' => 'Payments & Revenue — Alumni Connect',
            'activePage' => 'admin-payments',
            'payments' => $payments,
        ], 'app');
    }

    public function analytics() {
        $this->checkAdmin();
        $pdo = Database::getConnection();
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        $stmt = $pdo->prepare("SELECT page_url, COUNT(*) as count FROM page_views WHERE college_id = ? GROUP BY page_url ORDER BY count DESC LIMIT 10");
        $stmt->execute([$collegeId]);
        $views = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('admin/analytics', [
            'title' => 'Analytics — Alumni Connect',
            'activePage' => 'admin-analytics',
            'views' => $views,
        ], 'app');
    }

    public function updateUserStatus() {
        $this->checkAdmin();
        $this->validateCsrf();

        $userId = (int)($_POST['user_id'] ?? 0);
        $status = in_array($_POST['status'] ?? '', ['active', 'pending', 'suspended']) ? $_POST['status'] : 'active';
        $isVerified = isset($_POST['is_verified']) ? (int)$_POST['is_verified'] : null;
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        if ($userId > 0 && $collegeId) {
            $pdo = Database::getConnection();
            $check = $pdo->prepare("SELECT id FROM users WHERE id = ? AND college_id = ?");
            $check->execute([$userId, $collegeId]);
            if (!$check->fetch()) {
                http_response_code(403);
                die("Forbidden: User does not belong to this college");
            }
            if ($isVerified !== null) {
                $stmt = $pdo->prepare("UPDATE users SET status = ?, is_verified = ? WHERE id = ? AND college_id = ?");
                $stmt->execute([$status, $isVerified, $userId, $collegeId]);
            } else {
                $stmt = $pdo->prepare("UPDATE users SET status = ? WHERE id = ? AND college_id = ?");
                $stmt->execute([$status, $userId, $collegeId]);
            }
        }

        header("Location: /admin/dashboard?user_updated=1");
        exit;
    }

    public function updateUserRole() {
        $this->checkAdmin();
        $this->validateCsrf();

        $userId = (int)($_POST['user_id'] ?? 0);
        $role = in_array($_POST['role'] ?? '', ['student', 'alumni', 'college_admin']) ? $_POST['role'] : 'student';
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        if ($userId > 0 && $collegeId) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ? AND college_id = ?");
            $stmt->execute([$role, $userId, $collegeId]);
        }

        header("Location: /admin/dashboard?role_updated=1");
        exit;
    }
}
