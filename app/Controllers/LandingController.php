<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class LandingController {
    public function index() {
        $pdo = Database::getConnection();
        
        $stats = [
            'alumni' => $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'alumni'")->fetchColumn(),
            'institutions' => $pdo->query("SELECT COUNT(DISTINCT college_id) FROM users")->fetchColumn(),
            'mentors' => $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'alumni' AND id IN (SELECT DISTINCT mentor_id FROM mentorship_sessions)")->fetchColumn(),
        ];
        
        // If there are less than 50 institutions (it's early), default to a baseline or the real number
        // We'll pass the stats directly to the view.
        
        // Render landing without the standard app layout.
        // It's a self-contained page.
        require __DIR__ . '/../../resources/views/pages/landing.php';
    }
}
