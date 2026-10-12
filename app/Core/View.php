<?php
namespace App\Core;

class View {
    public static function avatarUrl($name = 'User', $avatar = null) {
        if (!empty($avatar) && strpos($avatar, 'mentor_') === false && strpos($avatar, 'side_img') === false) {
            return $avatar;
        }
        $initials = strtoupper(substr(trim($name ?: 'U'), 0, 2));
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"><rect width="64" height="64" fill="#1a2340" rx="32"/><text x="50%" y="54%" text-anchor="middle" dominant-baseline="middle" fill="#ffffff" font-family="Inter,sans-serif" font-size="22" font-weight="700">' . htmlspecialchars($initials) . '</text></svg>';
        return 'data:image/svg+xml;utf8,' . rawurlencode($svg);
    }

    public static function csrfToken(): string {
        if (empty($_COOKIE['csrf_token'])) {
            $csrf = bin2hex(random_bytes(32));
            $isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
            setcookie('csrf_token', $csrf, [
                'expires' => time() + (86400 * 30),
                'path' => '/',
                'domain' => '',
                'secure' => $isSecure,
                'httponly' => false,
                'samesite' => 'Lax'
            ]);
            $_COOKIE['csrf_token'] = $csrf;
        }
        return (string)$_COOKIE['csrf_token'];
    }

    public static function render($view, $data = [], $layout = 'app') {
        extract($data);
        
        $viewFile = __DIR__ . "/../../resources/views/pages/{$view}.php";
        if (file_exists($viewFile)) {
            ob_start();
            require $viewFile;
            $content = ob_get_clean();
            
            $layoutFile = __DIR__ . "/../../resources/views/layouts/{$layout}.php";
            if (file_exists($layoutFile)) {
                require $layoutFile;
            } else {
                echo $content;
            }
        } else {
            die("View $view not found.");
        }
    }
}
