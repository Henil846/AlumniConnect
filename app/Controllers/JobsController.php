<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class JobsController {
    public function index() {
        $pdo = Database::getConnection();
        
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $sql = "SELECT * FROM jobs WHERE college_id = ?";
        $countSql = "SELECT COUNT(*) as total FROM jobs WHERE college_id = ?";
        $params = [$collegeId];

        if (!empty($_GET['industry']) && is_array($_GET['industry'])) {
            $placeholders = str_repeat('?,', count($_GET['industry']) - 1) . '?';
            $sql .= " AND industry IN ($placeholders)";
            $params = array_merge($params, $_GET['industry']);
        }

        if (!empty($_GET['type']) && is_array($_GET['type'])) {
            $placeholders = str_repeat('?,', count($_GET['type']) - 1) . '?';
            $sql .= " AND type IN ($placeholders)";
            $params = array_merge($params, $_GET['type']);
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
        $jobs = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute($params);
        $totalJobs = $countStmt->fetch(\PDO::FETCH_OBJ)->total;
        $totalPages = ceil($totalJobs / $perPage);
        
        // Handle selected job details
        $selectedJobId = $_GET['job_id'] ?? ($jobs[0]->id ?? null);
        $selectedJob = null;
        if ($selectedJobId) {
            $stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = ? AND college_id = ?");
            $stmt->execute([$selectedJobId, $collegeId]);
            $selectedJob = $stmt->fetch(\PDO::FETCH_OBJ);
        }

        return View::render('jobs', [
            'title' => 'Jobs & Opportunities — Alumni Connect',
            'activePage' => 'jobs',
            'jobs' => $jobs,
            'selectedJob' => $selectedJob,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            
        ], 'app');
    }

    public function apply() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die("CSRF Token Verification Failed");
        }
        
        $jobId = $_POST['job_id'];
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $pdo = Database::getConnection();
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        $stmt = $pdo->prepare("SELECT id FROM jobs WHERE id = ? AND college_id = ?");
        $stmt->execute([$jobId, $collegeId]);
        if (!$stmt->fetch()) {
            http_response_code(403);
            die("Unauthorized to apply for this job");
        }

        $stmt = $pdo->prepare("INSERT INTO job_applications (job_id, user_id, college_id) VALUES (?, ?, ?)");
        $stmt->execute([$jobId, $userId, $collegeId]);

        // Generate Notification for Applicant
        $jobTitle = $pdo->query("SELECT title FROM jobs WHERE id = " . intval($jobId))->fetchColumn() ?: 'a job';
        $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id) VALUES (?, 'job_update', ?, ?)");
        $notifStmt->execute([$userId, "Your application for '$jobTitle' has been received.", $collegeId]);

        header("Location: /jobs?applied=1");
        exit;
    }
}
