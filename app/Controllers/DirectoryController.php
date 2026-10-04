<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class DirectoryController {
    public function index() {
        $pdo = Database::getConnection();
        
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $sql = "SELECT * FROM users WHERE college_id = ?";
        $countSql = "SELECT COUNT(*) as total FROM users WHERE college_id = ?";
        $params = [$collegeId];

        if (!empty($_GET['batch'])) {
            $sql .= " AND YEAR(created_at) = ?";
            $params[] = $_GET['batch'];
        }

        if (!empty($_GET['industry'])) {
            $sql .= " AND industry LIKE ?";
            $params[] = '%' . $_GET['industry'] . '%';
        }

        if (!empty($_GET['location'])) {
            $sql .= " AND location LIKE ?";
            $params[] = '%' . $_GET['location'] . '%';
        }

        if (!empty($_GET['department']) && is_array($_GET['department'])) {
            $placeholders = str_repeat('?,', count($_GET['department']) - 1) . '?';
            $sql .= " AND department IN ($placeholders)";
            $params = array_merge($params, $_GET['department']);
        }

        $sql .= " ORDER BY created_at DESC";
        $countSql .= " ORDER BY created_at DESC";
        
        // Pagination logic
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $perPage = 20;
        $offset = ($page - 1) * $perPage;
        
        $sql .= " LIMIT $perPage OFFSET $offset";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $alumni = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute($params);
        $totalAlumni = $countStmt->fetch(\PDO::FETCH_OBJ)->total;
        $totalPages = ceil($totalAlumni / $perPage);

        return View::render('directory', [
            'title' => 'Alumni Directory — Alumni Connect',
            'activePage' => 'directory',
            'alumni' => $alumni,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'extraCss' => '/assets/css/directory.css'
        ], 'app');
    }
}
