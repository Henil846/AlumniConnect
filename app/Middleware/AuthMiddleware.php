<?php
namespace App\Middleware;

use App\Services\JwtService;

class AuthMiddleware {
    public static function handle() {
        if (!isset($_COOKIE['auth_token'])) {
            header('Location: /login');
            exit;
        }

        $payload = JwtService::decode($_COOKIE['auth_token']);
        if (!$payload) {
            header('Location: /login');
            exit;
        }

        // Ensure CSRF token exists
        if (!isset($_COOKIE['csrf_token'])) {
            $csrf = bin2hex(random_bytes(32));
            setcookie('csrf_token', $csrf, time() + (86400 * 7), '/', '', false, true);
            $_COOKIE['csrf_token'] = $csrf;
        }

        // CSRF validation for POST/PUT/DELETE
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
                header('HTTP/1.0 403 Forbidden');
                echo "Unauthorized (CSRF middleware failure due to missing/invalid CSRF token in form payload)";
                exit;
            }
        }

        // Store securely in Auth singleton, do NOT expose via $_REQUEST
        \App\Core\Auth::setUser([
            'id' => $payload['id'],
            'role' => $payload['role'],
            'college_id' => $payload['college_id'] ?? null
        ]);
    }
}
