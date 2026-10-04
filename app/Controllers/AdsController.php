<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class AdsController {
    public function index() {
        $userId = \App\Core\Auth::id() ?? null;
        // In reality this might be public or admin, let's say it's an admin panel view to manage ads, 
        // or a public page to view sponsors. We'll make it an ads directory.
        $pdo = Database::getConnection();
        
        $stmt = $pdo->query("SELECT * FROM advertisements WHERE status = 'active' ORDER BY created_at DESC");
        $ads = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('ads', [
            'title' => 'Sponsors & Advertisements',
            'activePage' => 'ads',
            'ads' => $ads,
            
        ], 'app');
    }

    public function create() {
        // Mock admin creation
        $sponsor = $_POST['sponsor_name'] ?? '';
        $link = $_POST['link_url'] ?? '';
        $image = $_POST['image_url'] ?? 'https://via.placeholder.com/300x150';

        if ($sponsor && $link) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO advertisements (sponsor_name, image_url, link_url) VALUES (?, ?, ?)");
            $stmt->execute([$sponsor, $image, $link]);
        }

        header("Location: /ads?added=1");
        exit;
    }
}
