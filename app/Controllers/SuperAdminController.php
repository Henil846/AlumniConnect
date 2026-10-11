<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class SuperAdminController {
    
    private function checkAccess() {
        $userRole = \App\Core\Auth::user()->role ?? '';
        if ($userRole !== 'super_admin') {
            http_response_code(403);
            try {
                \App\Core\View::render('errors/403', ['title' => 'Access Forbidden — Alumni Connect', 'activePage' => ''], 'super-admin');
            } catch (\Throwable $t) {
                echo "Unauthorized: Super Admin access required.";
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
        $this->checkAccess();
        $pdo = Database::getConnection();

        $stats = [
            'total_institutions' => (int)$pdo->query("SELECT COUNT(*) FROM colleges")->fetchColumn(),
            'total_users' => (int)$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
            'total_students' => (int)$pdo->query("SELECT COUNT(*) FROM users WHERE role = 'student'")->fetchColumn(),
            'total_alumni' => (int)$pdo->query("SELECT COUNT(*) FROM users WHERE role = 'alumni'")->fetchColumn(),
            'active_jobs' => (int)$pdo->query("SELECT COUNT(*) FROM jobs WHERE status = 'active'")->fetchColumn(),
            'total_revenue' => (float)$pdo->query("SELECT COALESCE(SUM(amount), 0) FROM donations WHERE status = 'completed'")->fetchColumn(),
            'active_campaigns' => (int)$pdo->query("SELECT COUNT(*) FROM campaigns")->fetchColumn(),
            'placement_rate' => '88%',
        ];

        $pendingUsers = $pdo->query("SELECT u.*, c.name as college_name FROM users u LEFT JOIN colleges c ON u.college_id = c.id ORDER BY u.created_at DESC LIMIT 5")->fetchAll(\PDO::FETCH_OBJ);
        $recentDonations = $pdo->query("SELECT d.*, u.full_name as user_name, c.title as campaign_title FROM donations d LEFT JOIN users u ON d.user_id = u.id LEFT JOIN campaigns c ON d.campaign_id = c.id ORDER BY d.created_at DESC LIMIT 5")->fetchAll(\PDO::FETCH_OBJ);

        return View::render('super-admin/dashboard', [
            'title' => 'Super Admin Dashboard — Alumni Connect',
            'activePage' => 'super-admin-dashboard',
            'stats' => $stats,
            'pendingUsers' => $pendingUsers,
            'recentDonations' => $recentDonations,
        ], 'super-admin');
    }

    public function analytics() {
        $this->checkAccess();
        $pdo = Database::getConnection();

        $totalUsers = (int)$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
        $totalDonations = (float)$pdo->query("SELECT COALESCE(SUM(amount), 0) FROM donations WHERE status = 'completed'")->fetchColumn();
        $activeMentors = (int)$pdo->query("SELECT COUNT(*) FROM users WHERE role = 'alumni'")->fetchColumn();
        $colleges = $pdo->query("SELECT * FROM colleges ORDER BY name ASC")->fetchAll(\PDO::FETCH_OBJ);

        return View::render('super-admin/analytics', [
            'title' => 'Platform Analytics — Alumni Connect',
            'activePage' => 'super-admin-analytics',
            'totalUsers' => $totalUsers,
            'totalDonations' => $totalDonations,
            'activeMentors' => $activeMentors,
            'colleges' => $colleges,
        ], 'super-admin');
    }

    public function institutions() {
        $this->checkAccess();
        $pdo = Database::getConnection();
        
        $institutions = $pdo->query("SELECT c.*, COUNT(u.id) as user_count FROM colleges c LEFT JOIN users u ON c.id = u.college_id GROUP BY c.id ORDER BY c.id ASC")->fetchAll(\PDO::FETCH_OBJ);

        $totalColleges = count($institutions);
        $totalUsers = (int)$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
        $totalDonations = (float)$pdo->query("SELECT COALESCE(SUM(amount), 0) FROM donations WHERE status = 'completed'")->fetchColumn();

        return View::render('super-admin/institutions', [
            'title' => 'Manage Institutions — Alumni Connect',
            'activePage' => 'super-admin-institutions',
            'institutions' => $institutions,
            'totalColleges' => $totalColleges,
            'totalUsers' => $totalUsers,
            'totalDonations' => $totalDonations,
        ], 'super-admin');
    }

    public function createInstitution() {
        $this->checkAccess();
        $this->validateCsrf();

        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $name)));
        $plan = trim($_POST['plan'] ?? 'Starter');
        $city = trim($_POST['city'] ?? 'Bengaluru');
        $state = trim($_POST['state'] ?? 'Karnataka');
        $adminEmail = trim($_POST['admin_email'] ?? '');
        $adminName = trim($_POST['admin_name'] ?? '');
        $adminPassword = $_POST['admin_password'] ?? 'Password123!';

        if (empty($name)) {
            header("Location: /super-admin/institutions?error=Institution+name+required");
            exit;
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO colleges (name, slug, plan, status, city, state) VALUES (?, ?, ?, 'active', ?, ?)");
        $stmt->execute([$name, $slug, $plan, $city, $state]);
        $collegeId = $pdo->lastInsertId();

        // If admin email provided, create college admin account
        if (!empty($adminEmail)) {
            $hashed = password_hash($adminPassword, PASSWORD_DEFAULT);
            $uStmt = $pdo->prepare("INSERT INTO users (email, password, full_name, role, college_id, status) VALUES (?, ?, ?, 'college_admin', ?, 'active')");
            $uStmt->execute([$adminEmail, $hashed, $adminName ?: ($name . ' Admin'), $collegeId]);
        }

        header("Location: /super-admin/institutions?created=1");
        exit;
    }

    public function updateInstitutionStatus() {
        $this->checkAccess();
        $this->validateCsrf();

        $id = (int)($_POST['id'] ?? 0);
        $status = $_POST['status'] === 'suspended' ? 'suspended' : 'active';

        if ($id > 0) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE colleges SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);
        }

        header("Location: /super-admin/institutions?updated=1");
        exit;
    }

    public function updateInstitutionTier() {
        $this->checkAccess();
        $this->validateCsrf();

        $id = (int)($_POST['id'] ?? $_POST['college_id'] ?? 0);
        $plan = in_array($_POST['plan'] ?? '', ['Starter', 'Growth', 'Enterprise']) ? $_POST['plan'] : 'Starter';

        if ($id > 0) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE colleges SET plan = ? WHERE id = ?");
            $stmt->execute([$plan, $id]);
        }

        header("Location: /super-admin/institutions?tier_updated=1");
        exit;
    }

    public function verifyUser() {
        $this->checkAccess();
        $this->validateCsrf();

        $userId = (int)($_POST['user_id'] ?? 0);
        if ($userId > 0) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE users SET status = 'active' WHERE id = ?");
            $stmt->execute([$userId]);
        }

        header("Location: /super-admin/dashboard?verified=1");
        exit;
    }

    public function declineUser() {
        $this->checkAccess();
        $this->validateCsrf();

        $userId = (int)($_POST['user_id'] ?? 0);
        if ($userId > 0) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE users SET status = 'suspended' WHERE id = ?");
            $stmt->execute([$userId]);
        }

        header("Location: /super-admin/dashboard?declined=1");
        exit;
    }

    public function revenue() {
        $this->checkAccess();
        $pdo = Database::getConnection();
        
        $transactions = $pdo->query("SELECT d.*, u.full_name as user_name, c.title as campaign_title, col.name as college_name FROM donations d JOIN users u ON d.user_id = u.id JOIN campaigns c ON d.campaign_id = c.id LEFT JOIN colleges col ON d.college_id = col.id ORDER BY d.created_at DESC")->fetchAll(\PDO::FETCH_OBJ);

        // CSV Export flow
        if (isset($_GET['export']) && $_GET['export'] === 'csv') {
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=donations_report_' . date('Ymd_His') . '.csv');
            
            $output = fopen('php://output', 'w');
            fputcsv($output, ['ID', 'Donor Name', 'Amount', 'Currency', 'Campaign Title', 'College', 'Transaction ID', 'Status', 'Date']);

            foreach ($transactions as $t) {
                fputcsv($output, [
                    $t->id,
                    $t->user_name,
                    $t->amount,
                    $t->currency ?? 'USD',
                    $t->campaign_title,
                    $t->college_name ?? 'N/A',
                    $t->transaction_id ?? 'N/A',
                    $t->status,
                    $t->created_at
                ]);
            }
            fclose($output);
            exit;
        }

        $totalRevenue = (float)$pdo->query("SELECT COALESCE(SUM(amount), 0) FROM donations WHERE status = 'completed'")->fetchColumn();
        $totalDonors = (int)$pdo->query("SELECT COUNT(DISTINCT user_id) FROM donations WHERE status = 'completed'")->fetchColumn();

        return View::render('super-admin/revenue', [
            'title' => 'Revenue & Payments — Alumni Connect',
            'activePage' => 'super-admin-revenue',
            'transactions' => $transactions,
            'totalRevenue' => $totalRevenue,
            'totalDonors' => $totalDonors,
        ], 'super-admin');
    }

    public function settings() {
        $this->checkAccess();
        return View::render('super-admin/settings', [
            'title' => 'Platform Settings — Alumni Connect',
            'activePage' => 'super-admin-settings',
        ], 'super-admin');
    }
}
