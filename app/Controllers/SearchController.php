<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class SearchController {
    public function index() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $query = trim($_GET['q'] ?? '');
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        $results = [
            'alumni' => [],
            'jobs' => [],
            'events' => [],
            'marketplace' => []
        ];

        if (!empty($query)) {
            $pdo = Database::getConnection();
            $likeQuery = '%' . $query . '%';
            
            // Search Alumni
            $stmt = $pdo->prepare("SELECT id, full_name, role, department FROM users WHERE college_id = ? AND role = 'alumni' AND (full_name LIKE ? OR department LIKE ?) LIMIT 5");
            $stmt->execute([$collegeId, $likeQuery, $likeQuery]);
            $results['alumni'] = $stmt->fetchAll(\PDO::FETCH_OBJ);

            // Search Jobs
            $stmt = $pdo->prepare("SELECT id, title, company, location FROM jobs WHERE college_id = ? AND (title LIKE ? OR company LIKE ?) LIMIT 5");
            $stmt->execute([$collegeId, $likeQuery, $likeQuery]);
            $results['jobs'] = $stmt->fetchAll(\PDO::FETCH_OBJ);

            // Search Events
            $stmt = $pdo->prepare("SELECT id, title, date, location FROM events WHERE college_id = ? AND (title LIKE ? OR location LIKE ?) LIMIT 5");
            $stmt->execute([$collegeId, $likeQuery, $likeQuery]);
            $results['events'] = $stmt->fetchAll(\PDO::FETCH_OBJ);

            // Search Marketplace
            $stmt = $pdo->prepare("SELECT id, title, price, category FROM marketplace_items WHERE college_id = ? AND (title LIKE ? OR category LIKE ?) LIMIT 5");
            $stmt->execute([$collegeId, $likeQuery, $likeQuery]);
            $results['marketplace'] = $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        return View::render('search', [
            'title' => 'Search Results — Alumni Connect',
            'activePage' => 'search',
            'query' => $query,
            'results' => $results,
            
        ], 'app');
    }
}
