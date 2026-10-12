<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class AdsController {
    public function index() {
        $userId = \App\Core\Auth::id() ?? null;
        // In reality this might be public or admin, let's say it's an admin panel view to manage ads, 
        // or a public page to view sponsors. We'll make it an ads directory.
        $pdo = Database::getConnection();
        
        $stmt = $pdo->query("SELECT * FROM advertisements WHERE status = 'active' ORDER BY created_at DESC");
        $ads = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('ads', [
            'title' => 'Sponsors & Advertisements',
            'activePage' => 'ads',
            'ads' => $ads,
            
        ], 'app');
    }

    public function create() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $role = \App\Core\Auth::user()->role ?? null;
        if ($role !== 'super_admin' && $role !== 'admin' && $role !== 'college_admin') {
            http_response_code(403);
            die("Forbidden: Only administrators can create advertisements.");
        }
        $sponsor = trim($_POST['sponsor_name'] ?? '');
        $link = trim($_POST['link_url'] ?? '');
        $image = trim($_POST['image_url'] ?? '/assets/img/campus_cover.png');
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        if ($sponsor && $link) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO advertisements (sponsor_name, image_url, link_url, status, college_id) VALUES (?, ?, ?, 'active', ?)");
            $stmt->execute([$sponsor, $image, $link, $collegeId]);
        }

        header("Location: /ads?added=1");
        exit;
    }

    public function disable() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $role = \App\Core\Auth::user()->role ?? null;
        if ($role !== 'super_admin' && $role !== 'admin' && $role !== 'college_admin') {
            http_response_code(403);
            die("Forbidden: Only administrators can manage advertisements.");
        }
        $id = (int)($_POST['id'] ?? 0);
        $status = ($_POST['status'] ?? 'disabled') === 'active' ? 'active' : 'disabled';
        if ($id > 0) {
            $pdo = Database::getConnection();
            $pdo->prepare("UPDATE advertisements SET status = ? WHERE id = ?")->execute([$status, $id]);
        }
        header("Location: /ads?status_updated=1");
        exit;
    }
}
