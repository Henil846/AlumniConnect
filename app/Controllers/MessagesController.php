<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class MessagesController {
    public function index() {
        $pdo = Database::getConnection();
        $userId = \App\Core\Auth::id() ?? null;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id != ?");
        $stmt->execute([$userId]);
        $users = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $selectedUserId = $_GET['user_id'] ?? ($users[0]->id ?? null);
        $selectedUser = null;
        $messages = [];
        if ($selectedUserId) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$selectedUserId]);
            $selectedUser = $stmt->fetch(\PDO::FETCH_OBJ);

            $stmt = $pdo->prepare("
                SELECT * FROM messages 
                WHERE (sender_id = ? AND receiver_id = ?) 
                   OR (sender_id = ? AND receiver_id = ?)
                ORDER BY created_at ASC
            ");
            $stmt->execute([$userId, $selectedUserId, $selectedUserId, $userId]);
            $messages = $stmt->fetchAll(\PDO::FETCH_OBJ);
            
            // Mark as read
            $pdo->prepare("UPDATE messages SET is_read = 1 WHERE sender_id = ? AND receiver_id = ?")
                ->execute([$selectedUserId, $userId]);
        }

        return View::render('messages', [
            'title' => 'Messages — Alumni Connect',
            'activePage' => 'messages',
            'users' => $users,
            'selectedUser' => $selectedUser,
            'messages' => $messages,
            'currentUserId' => $userId,
            
        ], 'app');
    }

    public function send() {
        $senderId = \App\Core\Auth::id() ?? null;
        if (!$senderId) die("Unauthorized");
        
        $receiverId = $_POST['receiver_id'] ?? null;
        $content = $_POST['content'] ?? '';

        if ($receiverId && $content) {
            $pdo = Database::getConnection();
            $collegeId = \App\Core\Auth::user()->college_id ?? null;
            $check = $pdo->prepare("SELECT id FROM users WHERE id = ? AND college_id = ?");
            $check->execute([$receiverId, $collegeId]);
            if (!$check->fetch()) {
                http_response_code(403);
                die("Unauthorized to message this user");
            }
            $stmt = $pdo->prepare("INSERT INTO messages (sender_id, receiver_id, content, college_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$senderId, $receiverId, $content, $collegeId]);
        }
        
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => true]);
            exit;
        }

        header("Location: /messages?user_id=" . $receiverId);
        exit;
    }

    public function stream() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");
        
        $otherId = $_GET['user_id'] ?? null;
        if (!$otherId) die("Missing user_id parameter");
        
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');

        // Simple polling approach for SSE
        $pdo = Database::getConnection();
        
        // Fetch last message ID
        $stmt = $pdo->prepare("
            SELECT MAX(id) FROM messages 
            WHERE (sender_id = ? AND receiver_id = ?) 
               OR (sender_id = ? AND receiver_id = ?)
        ");
        $stmt->execute([$userId, $otherId, $otherId, $userId]);
        $lastId = $stmt->fetchColumn() ?: 0;

        while (true) {
            $stmt = $pdo->prepare("
                SELECT * FROM messages 
                WHERE id > ? AND (
                    (sender_id = ? AND receiver_id = ?) OR 
                    (sender_id = ? AND receiver_id = ?)
                )
                ORDER BY id ASC
            ");
            $stmt->execute([$lastId, $userId, $otherId, $otherId, $userId]);
            $newMessages = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if ($newMessages) {
                foreach ($newMessages as $msg) {
                    echo "data: " . json_encode($msg) . "\n\n";
                    $lastId = max($lastId, $msg['id']);
                }
                ob_flush();
                flush();
            }

            sleep(2); // Wait 2s before polling again

            // Check connection is still alive
            if (connection_aborted()) {
                break;
            }
        }
    }
}
