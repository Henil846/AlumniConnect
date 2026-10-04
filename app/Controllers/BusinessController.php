<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class BusinessController {
    public function index() {
        $pdo = Database::getConnection();
        
        $category = $_GET['category'] ?? '';
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $sql = "SELECT b.*, u.full_name as owner_name FROM businesses b JOIN users u ON b.user_id = u.id WHERE b.college_id = ?";
        $params = [$collegeId];
        if ($category) {
            $sql .= " AND b.category = ?";
            $params[] = $category;
        }
        $sql .= " ORDER BY b.created_at DESC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $businesses = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('business-directory', [
            'title' => 'Alumni Business Directory',
            'activePage' => 'business',
            'businesses' => $businesses,
            'category' => $category,
            
        ], 'app');
    }

    public function create() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $website = $_POST['website'] ?? '';
        $category = $_POST['category'] ?? 'other';

        if ($name && $description) {
            $pdo = Database::getConnection();
            $collegeId = \App\Core\Auth::user()->college_id ?? null;
            $stmt = $pdo->prepare("INSERT INTO businesses (user_id, name, description, website, category, college_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$userId, $name, $description, $website, $category, $collegeId]);
        }

        header("Location: /business-directory?added=1");
        exit;
    }
}
