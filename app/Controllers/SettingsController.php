<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class SettingsController {
    public function index() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM user_settings WHERE user_id = ?");
        $stmt->execute([$userId]);
        $settings = $stmt->fetch(\PDO::FETCH_OBJ);
        
        return View::render('settings', [
            'title' => 'Account Settings',
            'activePage' => 'settings',
            'settings' => $settings,
            
        ], 'app');
    }

    public function update() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $emailNotif = isset($_POST['email_notifications']) ? 1 : 0;
        $profileVis = $_POST['profile_visibility'] ?? 'public';

        $pdo = Database::getConnection();
        
        $stmt = $pdo->prepare("SELECT * FROM user_settings WHERE user_id = ?");
        $stmt->execute([$userId]);
        
        if ($stmt->fetch()) {
            $update = $pdo->prepare("UPDATE user_settings SET email_notifications = ?, profile_visibility = ? WHERE user_id = ?");
            $update->execute([$emailNotif, $profileVis, $userId]);
        } else {
            $insert = $pdo->prepare("INSERT INTO user_settings (user_id, email_notifications, profile_visibility) VALUES (?, ?, ?)");
            $insert->execute([$userId, $emailNotif, $profileVis]);
        }

        header("Location: /settings?saved=1");
        exit;
    }
}
