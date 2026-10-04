<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class CommunityController {
    public function index() {
        $pdo = Database::getConnection();
        $userId = \App\Core\Auth::id() ?? null; // Adjust according to AuthMiddleware

        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        $stmt = $pdo->prepare("
            SELECT p.*, u.full_name, u.role, u.college_id as user_college_id,
            (SELECT COUNT(*) FROM post_likes WHERE post_id = p.id) as likes_count,
            (SELECT COUNT(*) FROM post_likes WHERE post_id = p.id AND user_id = ?) as liked_by_me,
            (SELECT COUNT(*) FROM post_comments WHERE post_id = p.id) as comments_count
            FROM posts p
            JOIN users u ON p.user_id = u.id
            WHERE p.college_id = ?
            ORDER BY p.created_at DESC
        ");
        $stmt->execute([$userId, $collegeId]);
        $posts = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return View::render('community', [
            'title' => 'Alumni Community — Alumni Connect',
            'activePage' => 'community',
            'posts' => $posts,
            
        ], 'app');
    }

    public function createPost() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $content = $_POST['content'] ?? '';
        
        $imageUrl = null;
        if (!empty($_FILES['image']['name'])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['image']['tmp_name']);
            if (in_array($mime, ['image/jpeg', 'image/png', 'image/gif'])) {
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = 'post_' . time() . '_' . rand(100,999) . '.' . $ext;
                $target = __DIR__ . '/../../../public/assets/uploads/' . $filename;
                if (!is_dir(dirname($target))) {
                    mkdir(dirname($target), 0777, true);
                }
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $imageUrl = '/assets/uploads/' . $filename;
                }
            }
        }

        $pdo = Database::getConnection();
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $stmt = $pdo->prepare("INSERT INTO posts (user_id, content, image_url, college_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $content, $imageUrl, $collegeId]);

        header("Location: /community");
        exit;
    }

    public function toggleLike() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $postId = $_POST['post_id'] ?? null;

        $pdo = Database::getConnection();
        
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $check = $pdo->prepare("SELECT id FROM posts WHERE id = ? AND college_id = ?");
        $check->execute([$postId, $collegeId]);
        if (!$check->fetch()) {
            http_response_code(403);
            die("Unauthorized to like this post");
        }

        $stmt = $pdo->prepare("SELECT * FROM post_likes WHERE user_id = ? AND post_id = ?");
        $stmt->execute([$userId, $postId]);
        if ($stmt->fetch()) {
            $pdo->prepare("DELETE FROM post_likes WHERE user_id = ? AND post_id = ?")->execute([$userId, $postId]);
        } else {
            $pdo->prepare("INSERT INTO post_likes (user_id, post_id) VALUES (?, ?)")->execute([$userId, $postId]);
        }

        header("Location: /community");
        exit;
    }

    public function addComment() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $postId = $_POST['post_id'] ?? null;
        $content = $_POST['content'] ?? '';

        if ($content && $postId) {
            $pdo = Database::getConnection();
            
            $collegeId = \App\Core\Auth::user()->college_id ?? null;
            $check = $pdo->prepare("SELECT id FROM posts WHERE id = ? AND college_id = ?");
            $check->execute([$postId, $collegeId]);
            if (!$check->fetch()) {
                http_response_code(403);
                die("Unauthorized to comment on this post");
            }
            
            $stmt = $pdo->prepare("INSERT INTO post_comments (post_id, user_id, content) VALUES (?, ?, ?)");
            $stmt->execute([$postId, $userId, $content]);
        }
        
        header("Location: /community");
        exit;
    }
}
