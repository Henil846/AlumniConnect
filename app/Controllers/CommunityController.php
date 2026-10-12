<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class CommunityController {
    public function index() {
        $user = \App\Core\Auth::user();
        if (!$user) {
            header("Location: /login?return=/community");
            exit;
        }

        $pdo = Database::getConnection();
        $userId = $user->id;
        $collegeId = $user->college_id;

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
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $content = $_POST['content'] ?? '';
        
        $imageUrl = null;
        if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
                http_response_code(422);
                die("Image exceeds maximum allowed size of 5MB");
            }
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['image']['tmp_name']);
            finfo_close($finfo);
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (in_array($mime, ['image/jpeg', 'image/png', 'image/gif', 'image/webp']) && in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $filename = 'post_' . time() . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $target = __DIR__ . '/../../public/assets/uploads/' . $filename;
                if (!is_dir(dirname($target))) {
                    mkdir(dirname($target), 0777, true);
                }
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $imageUrl = '/assets/uploads/' . $filename;
                }
            } else {
                http_response_code(422);
                die("Invalid image file type");
            }
        }

        $pdo = Database::getConnection();
        $collegeId = \App\Core\Auth::user()?->college_id ?? null;
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
        
        $collegeId = \App\Core\Auth::user()?->college_id ?? null;
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
            
            $collegeId = \App\Core\Auth::user()?->college_id ?? null;
            $check = $pdo->prepare("SELECT id FROM posts WHERE id = ? AND college_id = ?");
            $check->execute([$postId, $collegeId]);
            if (!$check->fetch()) {
                http_response_code(403);
                die("Unauthorized to comment on this post");
            }
            
            $stmt = $pdo->prepare("INSERT INTO post_comments (post_id, user_id, content, college_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$postId, $userId, $content, $collegeId]);
        }
        
        header("Location: /community");
        exit;
    }

    public function deletePost() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $postId = (int)($_POST['post_id'] ?? 0);
        $collegeId = \App\Core\Auth::user()?->college_id ?? null;
        $role = \App\Core\Auth::user()?->role ?? null;
        
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$postId]);
        $post = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$post) {
            http_response_code(404);
            die("Post not found");
        }
        if ($post->college_id != $collegeId || ($post->user_id != $userId && $role !== 'admin' && $role !== 'college_admin')) {
            http_response_code(403);
            die("Forbidden: Cannot delete post");
        }
        $pdo->prepare("DELETE FROM posts WHERE id = ?")->execute([$postId]);
        $pdo->prepare("DELETE FROM post_comments WHERE post_id = ?")->execute([$postId]);
        $pdo->prepare("DELETE FROM post_likes WHERE post_id = ?")->execute([$postId]);
        header("Location: /community?deleted=1");
        exit;
    }

    public function editPost() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $postId = (int)($_POST['post_id'] ?? 0);
        $content = trim($_POST['content'] ?? '');
        $collegeId = \App\Core\Auth::user()?->college_id ?? null;
        
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$postId]);
        $post = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$post) {
            http_response_code(404);
            die("Post not found");
        }
        if ($post->college_id != $collegeId || $post->user_id != $userId) {
            http_response_code(403);
            die("Forbidden: Cannot edit post");
        }
        if (!empty($content)) {
            $pdo->prepare("UPDATE posts SET content = ? WHERE id = ?")->execute([$content, $postId]);
        }
        header("Location: /community?updated=1");
        exit;
    }

    public function pollVote() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $postId = (int)($_POST['post_id'] ?? 0);
        $option = trim($_POST['option'] ?? 'Option A');
        $collegeId = \App\Core\Auth::user()?->college_id ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT id FROM posts WHERE id = ? AND college_id = ?");
        $stmt->execute([$postId, $collegeId]);
        if (!$stmt->fetch()) {
            http_response_code(403);
            die("Forbidden: Cannot vote on cross-college poll");
        }
        header("Location: /community?voted=1");
        exit;
    }

    public function deleteComment() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $commentId = (int)($_POST['comment_id'] ?? 0);
        $collegeId = \App\Core\Auth::user()?->college_id ?? null;
        $role = \App\Core\Auth::user()?->role ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT c.*, p.college_id as post_college_id FROM post_comments c JOIN posts p ON c.post_id = p.id WHERE c.id = ?");
        $stmt->execute([$commentId]);
        $comment = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$comment) {
            http_response_code(404);
            die("Comment not found");
        }
        if ($comment->post_college_id != $collegeId || ($comment->user_id != $userId && $role !== 'admin' && $role !== 'college_admin')) {
            http_response_code(403);
            die("Forbidden: Cannot delete comment");
        }
        $pdo->prepare("DELETE FROM post_comments WHERE id = ?")->execute([$commentId]);
        header("Location: /community?comment_deleted=1");
        exit;
    }

    public function report() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        $collegeId = \App\Core\Auth::user()?->college_id ?? null;
        
        $itemType = trim($_POST['reported_item_type'] ?? 'post');
        $itemId = (int)($_POST['reported_item_id'] ?? 0);
        $reason = trim($_POST['reason'] ?? 'Violation of community guidelines');
        $reportedUserId = (int)($_POST['reported_user_id'] ?? 0);

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO reports (reporter_id, reported_item_type, reported_item_id, reason, status, college_id) VALUES (?, ?, ?, ?, 'pending', ?)");
        $stmt->execute([$userId, $itemType, $itemId, $reason, $collegeId]);

        // Trigger notification to the college admin
        $adminStmt = $pdo->prepare("SELECT id FROM users WHERE college_id = ? AND role = 'college_admin' LIMIT 1");
        $adminStmt->execute([$collegeId]);
        $adminId = $adminStmt->fetchColumn();
        if ($adminId) {
            $reporterName = \App\Core\Auth::user()?->full_name ?? 'A user';
            $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, link) VALUES (?, 'moderation', ?, ?, '/admin/moderation')");
            $notifStmt->execute([$adminId, "New content report submitted by $reporterName.", $collegeId]);
        }

        header("Location: /community?reported=1");
        exit;
    }
}
