<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class MarketplaceController {
    public function index() {
        $pdo = Database::getConnection();
        
        $category = $_GET['category'] ?? '';
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        $sql = "SELECT m.*, u.full_name as author_name FROM marketplace_items m JOIN users u ON m.user_id = u.id WHERE m.status = 'available' AND m.college_id = ?";
        $params = [$collegeId];
        if ($category) {
            $sql .= " AND m.category = ?";
            $params[] = $category;
        }
        $sql .= " ORDER BY m.created_at DESC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $items = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('marketplace', [
            'title' => 'Marketplace — Alumni Connect',
            'activePage' => 'marketplace',
            'items' => $items,
            'category' => $category,
            
        ], 'app');
    }

    public function create() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? 0;
        $condition = $_POST['item_condition'] ?? 'used';
        $category = $_POST['category'] ?? 'other';

        if ($title && $description) {
            $pdo = Database::getConnection();
            $collegeId = \App\Core\Auth::user()->college_id ?? null;
            $stmt = $pdo->prepare("INSERT INTO marketplace_items (user_id, title, description, price, item_condition, category, college_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$userId, $title, $description, $price, $condition, $category, $collegeId]);
        }

        header("Location: /marketplace?posted=1");
        exit;
    }
}
