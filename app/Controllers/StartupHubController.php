<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class StartupHubController {
    public function index() {
        $pdo = Database::getConnection();
        
        $stage = $_GET['stage'] ?? '';
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $sql = "SELECT s.*, u.full_name as founder_name FROM startups s JOIN users u ON s.user_id = u.id WHERE s.college_id = ?";
        $params = [$collegeId];
        if ($stage) {
            $sql .= " AND s.funding_stage = ?";
            $params[] = $stage;
        }
        $sql .= " ORDER BY s.created_at DESC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $startups = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('startup-hub', [
            'title' => 'Startup Hub',
            'activePage' => 'startups',
            'startups' => $startups,
            'stage' => $stage,
            'extraCss' => '/assets/css/extended.css'
        ], 'app');
    }

    public function create() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $name = $_POST['name'] ?? '';
        $pitch = $_POST['elevator_pitch'] ?? '';
        $stage = $_POST['funding_stage'] ?? 'pre-seed';
        $website = $_POST['website'] ?? '';

        if ($name && $pitch) {
            $pdo = Database::getConnection();
            $collegeId = \App\Core\Auth::user()->college_id ?? null;
            $stmt = $pdo->prepare("INSERT INTO startups (user_id, name, elevator_pitch, funding_stage, website, college_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$userId, $name, $pitch, $stage, $website, $collegeId]);
        }

        header("Location: /startup-hub?added=1");
        exit;
    }
}
