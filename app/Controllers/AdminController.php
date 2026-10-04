<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class AdminController {
    private function checkAdmin() {
        $role = \App\Core\Auth::user()->role ?? null;
        if ($role !== 'admin') {
            die("Unauthorized - Admin only");
        }
    }

    public function dashboard() {
        $this->checkAdmin();
        $pdo = Database::getConnection();
        
        // Basic analytics
        $userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
        $donationTotal = $pdo->query("SELECT SUM(amount) FROM donations WHERE status='completed'")->fetchColumn();
        
        return View::render('admin/dashboard', [
            'title' => 'Super Admin Dashboard',
            'activePage' => 'admin-dashboard',
            'userCount' => $userCount,
            'donationTotal' => $donationTotal,
            
        ], 'app');
    }

    public function moderation() {
        $this->checkAdmin();
        $pdo = Database::getConnection();
        
        $reports = $pdo->query("SELECT * FROM reports ORDER BY created_at DESC")->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('admin/moderation', [
            'title' => 'Moderation & Reports',
            'activePage' => 'admin-moderation',
            'reports' => $reports,
            
        ], 'app');
    }

    public function resolveReport() {
        $this->checkAdmin();
        $id = $_POST['id'] ?? null;
        if ($id) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE reports SET status = 'resolved' WHERE id = ?");
            $stmt->execute([$id]);
        }
        header("Location: /admin/moderation");
        exit;
    }

    public function payments() {
        $this->checkAdmin();
        $pdo = Database::getConnection();
        
        $payments = $pdo->query("SELECT * FROM donations ORDER BY created_at DESC")->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('admin/payments', [
            'title' => 'Payments & Revenue',
            'activePage' => 'admin-payments',
            'payments' => $payments,
            
        ], 'app');
    }

    public function analytics() {
        $this->checkAdmin();
        $pdo = Database::getConnection();
        
        $views = $pdo->query("SELECT page_url, COUNT(*) as count FROM page_views GROUP BY page_url ORDER BY count DESC LIMIT 10")->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('admin/analytics', [
            'title' => 'Analytics',
            'activePage' => 'admin-analytics',
            'views' => $views,
            
        ], 'app');
    }
}
