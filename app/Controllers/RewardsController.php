<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class RewardsController {
    public function index() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) {
            header("Location: /login");
            exit;
        }

        $pdo = Database::getConnection();
        
        $stmt = $pdo->prepare("SELECT b.*, ub.awarded_at FROM user_badges ub JOIN badges b ON ub.badge_id = b.id WHERE ub.user_id = ? ORDER BY ub.awarded_at DESC");
        $stmt->execute([$userId]);
        $earnedBadges = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        $stmt2 = $pdo->prepare("SELECT * FROM badges WHERE id NOT IN (SELECT badge_id FROM user_badges WHERE user_id = ?)");
        $stmt2->execute([$userId]);
        $unearnedBadges = $stmt2->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('rewards', [
            'title' => 'Rewards & Badges',
            'activePage' => 'rewards',
            'earnedBadges' => $earnedBadges,
            'unearnedBadges' => $unearnedBadges,
            
        ], 'app');
    }

    public function award() {
        // Admin-only in real life, but we'll mock it for testing
        $userId = \App\Core\Auth::id() ?? null;
        $badgeId = $_POST['badge_id'] ?? null;

        if ($userId && $badgeId) {
            $pdo = Database::getConnection();
            // Check if already has badge
            $stmt = $pdo->prepare("SELECT id FROM user_badges WHERE user_id = ? AND badge_id = ?");
            $stmt->execute([$userId, $badgeId]);
            if (!$stmt->fetch()) {
                $stmt = $pdo->prepare("INSERT INTO user_badges (user_id, badge_id) VALUES (?, ?)");
                $stmt->execute([$userId, $badgeId]);
            }
        }

        header("Location: /rewards?awarded=1");
        exit;
    }
}
