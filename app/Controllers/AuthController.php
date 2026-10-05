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
            echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
            return;
        }

        $errors = AuthValidator::validateSignup($_POST);
        
        if (!empty($errors)) {
            echo json_encode(['success' => false, 'errors' => $errors]);
            return;
        }

        $existingUser = $this->userRepo->findByEmail($_POST['email']);
        if ($existingUser) {
            echo json_encode(['success' => false, 'message' => 'Email already registered.']);
            return;
        }

        $user = new User([
            'full_name' => $_POST['fullName'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'role' => $_POST['role'],
            'college_id' => 1, // Defaulting to 1 for now or get from request
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
            echo json_encode(['success' => false, 'message' => 'CSRF validation failed.']);
            return;
        }

        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $email = $_POST['email'] ?? '';

        if ($this->userRepo->checkRateLimit($email, $ip)) {
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
            echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
            return;
        }

        if (!$user->is_verified) {
            echo json_encode(['success' => false, 'message' => 'Please verify your email before logging in.']);
            return;
        }

        $this->userRepo->clearLoginAttempts($email);

        $token = JwtService::encode([
            'id' => $user->id,
            'role' => $user->role,
            'college_id' => $user->college_id,
            'exp' => time() + (86400 * 7) // 7 days
        ]);

        $refreshToken = bin2hex(random_bytes(32));
        $this->userRepo->createSession($user->id, $refreshToken);

        // Set cookies
        setcookie('auth_token', $token, time() + (86400 * 7), '/', '', false, true);
        setcookie('refresh_token', $refreshToken, time() + (86400 * 30), '/', '', false, true);

        echo json_encode(['success' => true, 'message' => 'Login successful', 'redirect' => '/dashboard']);
    }

    public function logout() {
        if (isset($_COOKIE['refresh_token'])) {
            $this->userRepo->invalidateSession($_COOKIE['refresh_token']);
        }
        setcookie('auth_token', '', time() - 3600, '/');
        setcookie('refresh_token', '', time() - 3600, '/');
        header('Location: /login');
        exit;
    }

    public function logoutAllDevices() {
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
        return View::render('auth/verify', ['title' => 'Verify Email'], 'auth');
    }

    public function processVerify() {
        $email = $_POST['email'] ?? '';
        $otp = $_POST['otp'] ?? '';
        $user = $this->userRepo->findByEmail($email);
        if ($user && $this->userRepo->verifyEmail($user->id, $otp)) {
            echo json_encode(['success' => true, 'message' => 'Verified successfully!', 'redirect' => '/login']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP.']);
        }
    }

    public function showForgotPassword() {
        return View::render('auth/forgot-password', ['title' => 'Forgot Password'], 'auth');
    }

    public function processForgotPassword() {
        $email = $_POST['email'] ?? '';
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
        $token = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';
        if (strlen($password) < 8) {
            echo json_encode(['success' => false, 'message' => 'Password too short.']);
            return;
        }
        if ($this->userRepo->usePasswordReset($token, password_hash($password, PASSWORD_DEFAULT))) {
            echo json_encode(['success' => true, 'message' => 'Password reset successfully.', 'redirect' => '/login']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid or expired token.']);
        }
    }
}
