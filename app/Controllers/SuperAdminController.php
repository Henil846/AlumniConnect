<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class SuperAdminController {
    
    private function checkAccess() {
        $userRole = \App\Core\Auth::user()->role ?? '';
        if ($userRole !== 'super_admin') {
            http_response_code(403);
            die("Unauthorized: Super Admin access required.");
        }
    }

    public function dashboard() {
        $this->checkAccess();
        $pdo = Database::getConnection();

        $stats = [
            'total_institutions' => $pdo->query("SELECT COUNT(*) FROM colleges")->fetchColumn(),
            'total_users' => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
            'total_revenue' => $pdo->query("SELECT COALESCE(SUM(amount), 0) FROM donations")->fetchColumn(),
            'active_campaigns' => $pdo->query("SELECT COUNT(*) FROM campaigns")->fetchColumn()
        ];

        return View::render('super-admin/dashboard', [
            'title' => 'Super Admin Dashboard',
            'activePage' => 'super-admin-dashboard',
            'stats' => $stats,
            'extraCss' => '/assets/css/super-admin.css'
        ], 'super-admin');
    }

    public function analytics() {
        $this->checkAccess();
        // Return dummy analytics data for now
        return View::render('super-admin/analytics', [
            'title' => 'Platform Analytics',
            'activePage' => 'super-admin-analytics',
            'extraCss' => '/assets/css/super-admin.css'
        ], 'super-admin');
    }

    public function institutions() {
        $this->checkAccess();
        $pdo = Database::getConnection();
        
        $institutions = $pdo->query("SELECT c.*, COUNT(u.id) as user_count FROM colleges c LEFT JOIN users u ON c.id = u.college_id GROUP BY c.id")->fetchAll(\PDO::FETCH_OBJ);

        return View::render('super-admin/institutions', [
            'title' => 'Manage Institutions',
            'activePage' => 'super-admin-institutions',
            'institutions' => $institutions,
            'extraCss' => '/assets/css/super-admin.css'
        ], 'super-admin');
    }

    public function revenue() {
        $this->checkAccess();
        $pdo = Database::getConnection();
        
        $transactions = $pdo->query("SELECT d.*, u.full_name as user_name, c.title as campaign_title FROM donations d JOIN users u ON d.user_id = u.id JOIN campaigns c ON d.campaign_id = c.id ORDER BY d.created_at DESC")->fetchAll(\PDO::FETCH_OBJ);

        return View::render('super-admin/revenue', [
            'title' => 'Revenue & Payments',
            'activePage' => 'super-admin-revenue',
            'transactions' => $transactions,
            'extraCss' => '/assets/css/super-admin.css'
        ], 'super-admin');
    }

    public function settings() {
        $this->checkAccess();
        return View::render('super-admin/settings', [
            'title' => 'Platform Settings',
            'activePage' => 'super-admin-settings',
            'extraCss' => '/assets/css/super-admin.css'
        ], 'super-admin');
    }
}
