<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Validators\AuthValidator;
use App\Services\JwtService;
use App\Services\LogMailer;

class AuthController {
    private $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }
    public function showSignup() {
        $csrf = bin2hex(random_bytes(32));
        $_COOKIE['csrf_token'] = $csrf;
        setcookie('csrf_token', $csrf, time() + 3600, '/', '', false, true);
        return View::render('auth/signup', ['title' => 'Create Account — Alumni Connect', 'csrf' => $csrf, 'extraScript' => '/assets/js/signup.js'], 'auth');
    }

    public function processSignup() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
            return;
        }

        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $email = $_POST['email'] ?? '';
        if ($this->userRepo->isRateLimited('signup', $email, $ip, 5)) {
            http_response_code(429);
            echo json_encode(['success' => false, 'message' => 'Too many registration attempts. Please try again later.']);
            return;
        }

        $errors = AuthValidator::validateSignup($_POST);
        
        if (!empty($errors)) {
            $this->userRepo->logAttempt('signup', $email, $ip);
            echo json_encode(['success' => false, 'errors' => $errors]);
            return;
        }

        $existingUser = $this->userRepo->findByEmail($_POST['email']);
        if ($existingUser) {
            $this->userRepo->logAttempt('signup', $email, $ip);
            echo json_encode(['success' => false, 'message' => 'Email already registered.']);
            return;
        }

        $user = new User([
            'full_name' => $_POST['fullName'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]),
            'role' => $_POST['role'],
            'college_id' => !empty($_POST['college_id']) ? intval($_POST['college_id']) : 1,
            'is_verified' => 0
        ]);

        $user = $this->userRepo->create($user);

        // Generate OTP
        $otp = sprintf('%06d', mt_rand(100000, 999999));
        $this->userRepo->createEmailVerification($user->id, $otp);

        LogMailer::send($user->email, 'Verify Your Email', "Your OTP is: $otp\nLink: /verify?email=" . urlencode($user->email));

        echo json_encode(['success' => true, 'message' => 'Account created! Please check your email for OTP.', 'redirect' => '/verify?email=' . urlencode($user->email)]);
    }

    public function showLogin() {
        $csrf = bin2hex(random_bytes(32));
        $_COOKIE['csrf_token'] = $csrf;
        setcookie('csrf_token', $csrf, time() + 3600, '/', '', false, true);
        return View::render('auth/login', ['title' => 'Sign In — Alumni Connect', 'csrf' => $csrf], 'auth');
    }

    public function processLogin() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
            return;
        }

        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $email = $_POST['email'] ?? '';

        if ($this->userRepo->checkRateLimit($email, $ip)) {
            http_response_code(429);
            echo json_encode(['success' => false, 'message' => 'Too many failed login attempts. Try again later.']);
            return;
        }

        $errors = AuthValidator::validateLogin($_POST);
        
        if (!empty($errors)) {
            echo json_encode(['success' => false, 'errors' => $errors]);
            return;
        }

        $user = $this->userRepo->findByEmail($_POST['email']);
        if (!$user || !password_verify($_POST['password'], $user->password)) {
            $this->userRepo->logLoginAttempt($email, $ip);
            try {
                $pdo = \App\Core\Database::getConnection();
                $stmt = $pdo->prepare("INSERT INTO audit_log (event_type, actor_id, actor_email, ip_address, details) VALUES ('login_failed', NULL, ?, ?, 'Failed login attempt: invalid credentials')");
                $stmt->execute([$email, $ip]);
            } catch (\Throwable $t) {}
            echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
            return;
        }

        if (!$user->is_verified) {
            echo json_encode(['success' => false, 'message' => 'Please verify your email before logging in.']);
            return;
        }

        // Check if institution or user is suspended
        if (($user->status ?? 'active') === 'suspended') {
            echo json_encode(['success' => false, 'message' => 'Your account has been suspended.']);
            return;
        }

        if ($user->college_id) {
            $pdo = \App\Core\Database::getConnection();
            $colStatus = $pdo->query("SELECT status FROM colleges WHERE id = " . intval($user->college_id))->fetchColumn();
            if ($colStatus === 'suspended' && $user->role !== 'super_admin') {
                http_response_code(403);
                $isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
                       || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)
                       || (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false);
                if ($isAjax) {
                    echo json_encode(['success' => false, 'message' => 'Your institution has been suspended.']);
                } else {
                    die("Your institution has been suspended.");
                }
                return;
            }
        }

        $this->userRepo->clearLoginAttempts($email);
        try {
            $pdo = \App\Core\Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO audit_log (event_type, actor_id, actor_email, ip_address, details) VALUES ('user_login', ?, ?, ?, ?)");
            $stmt->execute([$user->id, $user->email, $ip, 'Successful login for role: ' . $user->role]);
        } catch (\Throwable $t) {}

        // Regenerate session id on login to prevent session fixation
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_regenerate_id(true);

        $token = JwtService::encode([
            'id' => $user->id,
            'role' => $user->role,
            'college_id' => $user->college_id,
            'exp' => time() + (86400 * 7) // 7 days
        ]);

        $refreshToken = bin2hex(random_bytes(32));
        $this->userRepo->createSession($user->id, $refreshToken);

        // Set cookies with HttpOnly, SameSite=Lax, and conditional Secure flag
        $isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
        setcookie('auth_token', $token, [
            'expires' => time() + (86400 * 7),
            'path' => '/',
            'domain' => '',
            'secure' => $isSecure,
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
        setcookie('refresh_token', $refreshToken, [
            'expires' => time() + (86400 * 30),
            'path' => '/',
            'domain' => '',
            'secure' => $isSecure,
            'httponly' => true,
            'samesite' => 'Lax'
        ]);

        if (empty($_COOKIE['csrf_token'])) {
            $csrf = bin2hex(random_bytes(32));
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

        // Determine role-based landing page or safe return URL
        $redirect = '/dashboard';
        $returnUrl = $_POST['return'] ?? ($_GET['return'] ?? '');
        if ($returnUrl && strpos($returnUrl, '/') === 0 && strpos($returnUrl, '//') !== 0) {
            $redirect = $returnUrl;
        } elseif ($user->role === 'super_admin') {
            $redirect = '/super-admin/dashboard';
        } elseif ($user->role === 'college_admin' || $user->role === 'admin') {
            $redirect = '/admin/dashboard';
        }

        $isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
               || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)
               || (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false);

        if ($isAjax) {
            echo json_encode(['success' => true, 'message' => 'Login successful', 'redirect' => $redirect]);
        } else {
            header("Location: $redirect");
            exit;
        }
    }

    public function logout() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        if (isset($_COOKIE['refresh_token'])) {
            $this->userRepo->invalidateSession($_COOKIE['refresh_token']);
        }
        setcookie('auth_token', '', time() - 3600, '/');
        setcookie('refresh_token', '', time() - 3600, '/');
        header('Location: /login');
        exit;
    }

    public function logoutAllDevices() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        // Assume user id is decoded from token (not fully implemented here, just demonstrating the DB call)
        $token = $_COOKIE['auth_token'] ?? '';
        $payload = JwtService::decode($token);
        if ($payload && isset($payload['id'])) {
            $this->userRepo->invalidateAllSessions($payload['id']);
        }
        setcookie('auth_token', '', time() - 3600, '/');
        setcookie('refresh_token', '', time() - 3600, '/');
        header('Location: /login');
        exit;
    }

    public function showVerify() {
        $csrf = $_COOKIE['csrf_token'] ?? bin2hex(random_bytes(32));
        $_COOKIE['csrf_token'] = $csrf;
        setcookie('csrf_token', $csrf, [
            'expires' => time() + 3600,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
        return View::render('auth/verify', ['title' => 'Verify Email', 'csrf' => $csrf], 'auth');
    }

    public function processVerify() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
            return;
        }
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $email = $_POST['email'] ?? '';
        $otp = $_POST['otp'] ?? '';

        if ($this->userRepo->isRateLimited('verify', $email, $ip, 5)) {
            http_response_code(429);
            echo json_encode(['success' => false, 'message' => 'Too many verification attempts. Please try again later.']);
            return;
        }

        $user = $this->userRepo->findByEmail($email);
        if ($user && $this->userRepo->verifyEmail($user->id, $otp)) {
            echo json_encode(['success' => true, 'message' => 'Verified successfully!', 'redirect' => '/login']);
        } else {
            $this->userRepo->logAttempt('verify', $email, $ip);
            echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP.']);
        }
    }

    public function showForgotPassword() {
        return View::render('auth/forgot-password', ['title' => 'Forgot Password'], 'auth');
    }

    public function processForgotPassword() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
            return;
        }
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $email = $_POST['email'] ?? '';

        if ($this->userRepo->isRateLimited('forgot_password', $email, $ip, 5)) {
            http_response_code(429);
            echo json_encode(['success' => false, 'message' => 'Too many password reset requests. Please try again later.']);
            return;
        }
        $this->userRepo->logAttempt('forgot_password', $email, $ip);

        $user = $this->userRepo->findByEmail($email);
        if ($user) {
            $token = bin2hex(random_bytes(32));
            $this->userRepo->createPasswordReset($email, $token);
            LogMailer::send($email, 'Password Reset', "Reset link: /reset-password?token=" . urlencode($token));
        }
        // Always return true to prevent email enumeration
        echo json_encode(['success' => true, 'message' => 'If an account exists, a reset link was sent.']);
    }

    public function showResetPassword() {
        return View::render('auth/reset-password', ['title' => 'Reset Password'], 'auth');
    }

    public function processResetPassword() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
            return;
        }
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $token = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($this->userRepo->isRateLimited('reset_password', $token, $ip, 5)) {
            http_response_code(429);
            echo json_encode(['success' => false, 'message' => 'Too many password reset attempts. Please try again later.']);
            return;
        }

        if (strlen($password) < 8) {
            echo json_encode(['success' => false, 'message' => 'Password too short.']);
            return;
        }
        if ($this->userRepo->usePasswordReset($token, password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]))) {
            echo json_encode(['success' => true, 'message' => 'Password reset successfully.', 'redirect' => '/login']);
        } else {
            $this->userRepo->logAttempt('reset_password', $token, $ip);
            echo json_encode(['success' => false, 'message' => 'Invalid or expired token.']);
        }
    }
}
