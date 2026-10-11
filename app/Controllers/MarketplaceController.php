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
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
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

    public function delete() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $itemId = (int)($_POST['item_id'] ?? 0);
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $role = \App\Core\Auth::user()->role ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM marketplace_items WHERE id = ?");
        $stmt->execute([$itemId]);
        $item = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$item) {
            http_response_code(404);
            die("Item not found");
        }
        if ($item->college_id != $collegeId || ($item->user_id != $userId && $role !== 'admin' && $role !== 'college_admin')) {
            http_response_code(403);
            die("Forbidden: Cannot delete item");
        }
        $pdo->prepare("DELETE FROM marketplace_items WHERE id = ?")->execute([$itemId]);
        header("Location: /marketplace?deleted=1");
        exit;
    }

    public function edit() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $itemId = (int)($_POST['item_id'] ?? 0);
        $title = trim($_POST['title'] ?? '');
        $price = (float)($_POST['price'] ?? 0);
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM marketplace_items WHERE id = ?");
        $stmt->execute([$itemId]);
        $item = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$item) {
            http_response_code(404);
            die("Item not found");
        }
        if ($item->college_id != $collegeId || $item->user_id != $userId) {
            http_response_code(403);
            die("Forbidden: Cannot edit item");
        }
        if (!empty($title)) {
            $pdo->prepare("UPDATE marketplace_items SET title = ?, price = ? WHERE id = ?")->execute([$title, $price, $itemId]);
        }
        header("Location: /marketplace?updated=1");
        exit;
    }
}
