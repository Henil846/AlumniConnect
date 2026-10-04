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

    public function markRead() {
        $userId = \App\Core\Auth::id() ?? null;
        $id = $_POST['id'] ?? null;

        if ($userId && $id) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE id = ? AND user_id = ?");
            $stmt->execute([$id, $userId]);
        }

        header("Location: /notifications");
        exit;
    }

    public function markAllRead() {
        $userId = \App\Core\Auth::id() ?? null;

        if ($userId) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE user_id = ?");
            $stmt->execute([$userId]);
        }

        header("Location: /notifications");
        exit;
    }
}
