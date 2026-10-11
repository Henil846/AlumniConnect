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

    public function edit() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $startupId = (int)($_POST['startup_id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $pitch = trim($_POST['elevator_pitch'] ?? '');
        $stage = trim($_POST['funding_stage'] ?? '');
        $website = trim($_POST['website'] ?? '');
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM startups WHERE id = ?");
        $stmt->execute([$startupId]);
        $startup = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$startup) {
            http_response_code(404);
            die("Startup not found");
        }
        if ($startup->college_id != $collegeId || $startup->user_id != $userId) {
            http_response_code(403);
            die("Forbidden: Cannot edit startup owned by another user");
        }
        if (!empty($name)) {
            $pdo->prepare("UPDATE startups SET name = ?, elevator_pitch = ?, funding_stage = ?, website = ? WHERE id = ?")
                ->execute([$name, $pitch ?: $startup->elevator_pitch, $stage ?: $startup->funding_stage, $website ?: $startup->website, $startupId]);
        }
        header("Location: /startup-hub?updated=1");
        exit;
    }

    public function delete() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $startupId = (int)($_POST['startup_id'] ?? 0);
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $role = \App\Core\Auth::user()->role ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM startups WHERE id = ?");
        $stmt->execute([$startupId]);
        $startup = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$startup) {
            http_response_code(404);
            die("Startup not found");
        }
        if ($startup->college_id != $collegeId || ($startup->user_id != $userId && $role !== 'admin' && $role !== 'college_admin')) {
            http_response_code(403);
            die("Forbidden: Cannot delete startup owned by another user");
        }
        $pdo->prepare("DELETE FROM startups WHERE id = ?")->execute([$startupId]);
        header("Location: /startup-hub?deleted=1");
        exit;
    }
}
