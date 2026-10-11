<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class CareerCenterController {
    public function index() {
        $pdo = Database::getConnection();
        
        $type = $_GET['type'] ?? '';
        
        $sql = "SELECT * FROM career_resources";
        $params = [];
        if ($type) {
            $sql .= " WHERE resource_type = ?";
            $params[] = $type;
        }
        $sql .= " ORDER BY created_at DESC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $resources = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('career-center', [
            'title' => 'Career Center & Resources',
            'activePage' => 'career-center',
            'resources' => $resources,
            'type' => $type,
            
        ], 'app');
    }

    public function create() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $title = $_POST['title'] ?? '';
        $link = $_POST['link'] ?? '';
        $type = $_POST['resource_type'] ?? 'article';
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        if ($title && $link) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO career_resources (title, link, resource_type, college_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $link, $type, $collegeId]);
        }

        header("Location: /career-center?added=1");
        exit;
    }
}
