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
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
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

    public function edit() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $bizId = (int)($_POST['business_id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $website = trim($_POST['website'] ?? '');
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM businesses WHERE id = ?");
        $stmt->execute([$bizId]);
        $biz = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$biz) {
            http_response_code(404);
            die("Business not found");
        }
        if ($biz->college_id != $collegeId || $biz->user_id != $userId) {
            http_response_code(403);
            die("Forbidden: Cannot edit business owned by another user");
        }
        if (!empty($name)) {
            $pdo->prepare("UPDATE businesses SET name = ?, description = ?, website = ? WHERE id = ?")
                ->execute([$name, $description ?: $biz->description, $website ?: $biz->website, $bizId]);
        }
        header("Location: /business-directory?updated=1");
        exit;
    }

    public function delete() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $bizId = (int)($_POST['business_id'] ?? 0);
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $role = \App\Core\Auth::user()->role ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM businesses WHERE id = ?");
        $stmt->execute([$bizId]);
        $biz = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$biz) {
            http_response_code(404);
            die("Business not found");
        }
        if ($biz->college_id != $collegeId || ($biz->user_id != $userId && $role !== 'admin' && $role !== 'college_admin')) {
            http_response_code(403);
            die("Forbidden: Cannot delete business owned by another user");
        }
        $pdo->prepare("DELETE FROM businesses WHERE id = ?")->execute([$bizId]);
        header("Location: /business-directory?deleted=1");
        exit;
    }
}
