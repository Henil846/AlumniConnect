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
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        // Basic analytics
        $userCount = $pdo->prepare("SELECT COUNT(*) FROM users WHERE college_id = ?");
        $userCount->execute([$collegeId]);
        $userCount = $userCount->fetchColumn();
        
        $donationTotal = $pdo->prepare("SELECT SUM(amount) FROM donations d JOIN campaigns c ON d.campaign_id = c.id WHERE d.status='completed' AND c.college_id = ?");
        $donationTotal->execute([$collegeId]);
        $donationTotal = $donationTotal->fetchColumn();
        
        return View::render('admin/dashboard', [
            'title' => 'Admin Dashboard',
            'activePage' => 'admin-dashboard',
            'userCount' => $userCount,
            'donationTotal' => $donationTotal,
            
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
            $collegeId = \App\Core\Auth::user()->college_id ?? null;
            $stmt = $pdo->prepare("UPDATE reports SET status = 'resolved' WHERE id = ? AND college_id = ?");
            $stmt->execute([$id, $collegeId]);
        }
        header("Location: /admin/moderation");
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
            'title' => 'Payments & Revenue',
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
            'title' => 'Analytics',
            'activePage' => 'admin-analytics',
            'views' => $views,
            
        ], 'app');
    }
}
