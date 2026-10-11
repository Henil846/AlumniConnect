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

        $college = null;
        if ($user && $user->college_id) {
            $cStmt = $pdo->prepare("SELECT * FROM colleges WHERE id = ?");
            $cStmt->execute([$user->college_id]);
            $college = $cStmt->fetch(\PDO::FETCH_OBJ);
        }

        // Compute dynamic profile completion
        $fields = ['full_name', 'email', 'about_me', 'department', 'industry', 'location', 'linkedin', 'skills', 'resume_file'];
        $filled = 0;
        foreach ($fields as $f) {
            if (!empty($user->$f)) $filled++;
        }
        $profileCompletion = (int)round(($filled / count($fields)) * 100);

        return View::render('profile', [
            'title' => 'My Profile — Alumni Connect',
            'activePage' => 'profile',
            'user' => $user,
            'college' => $college,
            'profileCompletion' => $profileCompletion,
            'extraJs' => '/assets/js/profile.js'
        ], 'app');
    }

    public function update() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
                return;
            }
            die('CSRF validation failed.');
        }

        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                echo json_encode(['success' => false, 'message' => 'Unauthorized']);
                return;
            }
            header('Location: /login');
            exit;
        }

        $fullName = $_POST['full_name'] ?? null;
        $aboutMe = $_POST['about_me'] ?? ($_POST['bio'] ?? null);
        $department = $_POST['department'] ?? ($_POST['major'] ?? null);
        $industry = $_POST['industry'] ?? null;
        $location = $_POST['location'] ?? null;
        $linkedin = $_POST['linkedin'] ?? null;
        $github = $_POST['github'] ?? null;
        $website = $_POST['website'] ?? null;
        $skills = isset($_POST['skills']) && is_array($_POST['skills']) ? json_encode($_POST['skills']) : null;
        
        $pdo = Database::getConnection();
        
        $resumeFile = null;
        if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
            if ($_FILES['resume']['size'] > 5 * 1024 * 1024) {
                http_response_code(422);
                die("Resume exceeds maximum allowed size of 5MB");
            }
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['resume']['tmp_name']);
            finfo_close($finfo);
            $allowedMimes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            if (!in_array($mime, $allowedMimes)) {
                http_response_code(422);
                die("Invalid file type: expected PDF or Word document");
            }
            $ext = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, ['pdf', 'doc', 'docx'])) {
                http_response_code(422);
                die("Invalid resume file extension");
            }
            $uploadDir = __DIR__ . '/../../public/uploads/resumes/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filename = 'resume_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $targetPath = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['resume']['tmp_name'], $targetPath)) {
                $resumeFile = '/uploads/resumes/' . $filename;
            }
        }
        
        $fields = [];
        $params = [];
        if ($fullName !== null) { $fields[] = "full_name = ?"; $params[] = $fullName; }
        if ($aboutMe !== null) { $fields[] = "about_me = ?"; $params[] = $aboutMe; }
        if ($department !== null) { $fields[] = "department = ?"; $params[] = $department; }
        if ($industry !== null) { $fields[] = "industry = ?"; $params[] = $industry; }
        if ($location !== null) { $fields[] = "location = ?"; $params[] = $location; }
        if ($linkedin !== null) { $fields[] = "linkedin = ?"; $params[] = $linkedin; }
        if ($github !== null) { $fields[] = "github = ?"; $params[] = $github; }
        if ($website !== null) { $fields[] = "website = ?"; $params[] = $website; }
        if ($skills !== null) { $fields[] = "skills = ?"; $params[] = $skills; }
        if ($resumeFile !== null) { $fields[] = "resume_file = ?"; $params[] = $resumeFile; }
        
        if (!empty($fields)) {
            $params[] = $userId;
            $stmt = $pdo->prepare("UPDATE users SET " . implode(', ', $fields) . " WHERE id = ?");
            $stmt->execute($params);
        }

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => true, 'message' => 'Profile updated successfully']);
            exit;
        }

        header("Location: /profile?updated=1");
        exit;
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

        // Enforce cross-tenant isolation: cannot view user from another college unless super_admin or CROSS_TENANT_PROFILES=true
        $crossTenantAllowed = filter_var(\App\Core\Env::get('CROSS_TENANT_PROFILES', 'false'), FILTER_VALIDATE_BOOLEAN);
        $myCollegeId = \App\Core\Auth::user()->college_id ?? null;
        $myRole = \App\Core\Auth::user()->role ?? null;
        if (!$crossTenantAllowed && $myRole !== 'super_admin' && $user->college_id != $myCollegeId) {
            http_response_code(403);
            die("Forbidden: Cross-tenant profile access denied");
        }

        return View::render('profile-view', [
            'title' => htmlspecialchars($user->full_name) . ' — Alumni Connect',
            'activePage' => 'directory',
            'user' => $user,
            
        ], 'app');
    }
}
