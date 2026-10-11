<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class NotificationsController {
    public function index() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) {
            header("Location: /login");
            exit;
        }

        $pdo = Database::getConnection();
        
        $stmt = $pdo->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        $notifications = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('notifications', [
            'title' => 'Notifications',
            'activePage' => 'notifications',
            'notifications' => $notifications,
            
        ], 'app');
    }

    private function validateCsrf() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
    }

    public function markRead() {
        $this->validateCsrf();
        $userId = \App\Core\Auth::id() ?? null;
        $id = $_POST['id'] ?? null;

        if ($userId && $id) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE id = ? AND user_id = ?");
            $stmt->execute([$id, $userId]);
        }

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => true]);
            exit;
        }

        header("Location: /notifications");
        exit;
    }

    public function markAllRead() {
        $this->validateCsrf();
        $userId = \App\Core\Auth::id() ?? null;

        if ($userId) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE user_id = ?");
            $stmt->execute([$userId]);
        }

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => true]);
            exit;
        }

        header("Location: /notifications");
        exit;
    }
}
