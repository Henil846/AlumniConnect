<?php
namespace App\Middleware;

use App\Services\JwtService;

class AuthMiddleware {
    public static function handle() {
        if (!isset($_COOKIE['auth_token'])) {
            $uri = $_SERVER['REQUEST_URI'] ?? '';
            $returnParam = ($uri && $uri !== '/' && $uri !== '/login' && $uri !== '/logout') ? '?return=' . urlencode($uri) : '';
            header('Location: /login' . $returnParam);
            exit;
        }

        $payload = JwtService::decode($_COOKIE['auth_token']);
        if (!$payload) {
            $uri = $_SERVER['REQUEST_URI'] ?? '';
            $returnParam = ($uri && $uri !== '/' && $uri !== '/login' && $uri !== '/logout') ? '?return=' . urlencode($uri) : '';
            header('Location: /login' . $returnParam);
            exit;
        }

        // Ensure CSRF token exists
        if (!isset($_COOKIE['csrf_token'])) {
            $isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
            setcookie('csrf_token', $csrf, [
                'expires' => time() + (86400 * 7),
                'path' => '/',
                'domain' => '',
                'secure' => $isSecure,
                'httponly' => true,
                'samesite' => 'Lax'
            ]);
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
