<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class ProfileController {
    public function index() {
        $userId = \App\Core\Auth::id() ?? null;
        
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        return View::render('profile', [
            'title' => 'My Profile — Alumni Connect',
            'activePage' => 'profile',
            'user' => $user,
            
            'extraJs' => '/assets/js/profile.js'
        ], 'app');
    }

    public function update() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
            return;
        }

        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }

        $aboutMe = $_POST['about_me'] ?? '';
        $linkedin = $_POST['linkedin'] ?? null;
        $github = $_POST['github'] ?? null;
        $website = $_POST['website'] ?? null;
        $skills = isset($_POST['skills']) && is_array($_POST['skills']) ? json_encode($_POST['skills']) : null;
        
        $pdo = Database::getConnection();
        
        $resumeFile = null;
        if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/uploads/resumes/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filename = time() . '_' . basename($_FILES['resume']['name']);
            $targetPath = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['resume']['tmp_name'], $targetPath)) {
                $resumeFile = '/uploads/resumes/' . $filename;
            }
        }
        
        if ($resumeFile) {
            $stmt = $pdo->prepare("UPDATE users SET about_me = ?, linkedin = ?, github = ?, website = ?, skills = ?, resume_file = ? WHERE id = ?");
            $stmt->execute([$aboutMe, $linkedin, $github, $website, $skills, $resumeFile, $userId]);
        } else {
            $stmt = $pdo->prepare("UPDATE users SET about_me = ?, linkedin = ?, github = ?, website = ?, skills = ? WHERE id = ?");
            $stmt->execute([$aboutMe, $linkedin, $github, $website, $skills, $userId]);
        }

        echo json_encode(['success' => true, 'message' => 'Profile updated successfully']);
    }

    public function viewProfile($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        if (!$user) {
            header("HTTP/1.0 404 Not Found");
            echo "User not found.";
            exit;
        }

        return View::render('profile-view', [
            'title' => htmlspecialchars($user->full_name) . ' — Alumni Connect',
            'activePage' => 'directory',
            'user' => $user,
            
        ], 'app');
    }
}
