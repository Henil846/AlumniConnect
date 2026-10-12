<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\User;

class UserRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch();
        return $data ? new User($data) : null;
    }

    public function create(User $user) {
        $stmt = $this->pdo->prepare("INSERT INTO users (full_name, email, password, role, college_id, is_verified) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $user->full_name,
            $user->email,
            $user->password,
            $user->role,
            $user->college_id,
            $user->is_verified ? 1 : 0
        ]);
        $user->id = $this->pdo->lastInsertId();
        return $user;
    }

    public function createEmailVerification($userId, $otp) {
        $stmt = $this->pdo->prepare("INSERT INTO email_verifications (user_id, otp, expires_at) VALUES (?, ?, datetime('now', '+1 hour'))");
        $stmt->execute([$userId, $otp]);
    }

    public function verifyEmail($userId, $otp) {
        $stmt = $this->pdo->prepare("SELECT * FROM email_verifications WHERE user_id = ? AND otp = ? AND expires_at > datetime('now')");
        $stmt->execute([$userId, $otp]);
        if ($stmt->fetch()) {
            $this->pdo->prepare("UPDATE users SET is_verified = 1 WHERE id = ?")->execute([$userId]);
            $this->pdo->prepare("DELETE FROM email_verifications WHERE user_id = ?")->execute([$userId]);
            return true;
        }
        return false;
    }

    public function createSession($userId, $refreshToken) {
        $stmt = $this->pdo->prepare("INSERT INTO user_sessions (user_id, refresh_token, expires_at) VALUES (?, ?, datetime('now', '+30 days'))");
        $stmt->execute([$userId, $refreshToken]);
    }

    public function invalidateSession($refreshToken) {
        $this->pdo->prepare("DELETE FROM user_sessions WHERE refresh_token = ?")->execute([$refreshToken]);
    }

    public function invalidateAllSessions($userId) {
        $this->pdo->prepare("DELETE FROM user_sessions WHERE user_id = ?")->execute([$userId]);
    }

    public function createPasswordReset($email, $token) {
        $hashedToken = hash('sha256', $token);
        $this->pdo->prepare("DELETE FROM password_resets WHERE email = ?")->execute([$email]);
        $this->pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, datetime('now', '+15 minutes'))")->execute([$email, $hashedToken]);
    }

    public function getValidPasswordReset($token) {
        $hashedToken = hash('sha256', $token);
        $stmt = $this->pdo->prepare("SELECT * FROM password_resets WHERE token = ? AND used = 0 AND expires_at > datetime('now')");
        $stmt->execute([$hashedToken]);
        return $stmt->fetch();
    }

    public function usePasswordReset($token, $newPasswordHash) {
        $hashedToken = hash('sha256', $token);
        $reset = $this->getValidPasswordReset($token);
        if ($reset) {
            $this->pdo->prepare("UPDATE users SET password = ? WHERE email = ?")->execute([$newPasswordHash, $reset['email']]);
            $this->pdo->prepare("DELETE FROM password_resets WHERE token = ?")->execute([$hashedToken]);
            return true;
        }
        return false;
    }

    public function logLoginAttempt($email, $ip) {
        $this->logAttempt('login', $email, $ip);
    }

    public function checkRateLimit($email, $ip) {
        return $this->isRateLimited('login', $email, $ip, 5);
    }

    public function clearLoginAttempts($email) {
        $this->pdo->prepare("DELETE FROM login_attempts WHERE email = ? OR email LIKE ?")->execute([$email, "login:$email"]);
    }

    public function logAttempt($action, $identifier, $ip) {
        try {
            $this->pdo->prepare("INSERT INTO login_attempts (email, ip_address, action) VALUES (?, ?, ?)")->execute([$identifier ?: $ip, $ip, $action]);
        } catch (\Throwable $e) {
            $this->pdo->prepare("INSERT INTO login_attempts (email, ip_address) VALUES (?, ?)")->execute([$action . ':' . ($identifier ?: $ip), $ip]);
        }
    }

    public function isRateLimited($action, $identifier, $ip, $maxAttempts = 5) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM login_attempts WHERE action = ? AND (email = ? OR ip_address = ?) AND attempt_time > datetime('now', '-15 minutes')");
            $stmt->execute([$action, $identifier ?: $ip, $ip]);
            $row = $stmt->fetch();
            if ($row && $row['count'] >= $maxAttempts) {
                return true;
            }
        } catch (\Throwable $e) {}

        $key = $action . ':' . ($identifier ?: $ip);
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM login_attempts WHERE (email = ? OR (ip_address = ? AND email LIKE ?)) AND attempt_time > datetime('now', '-15 minutes')");
        $stmt->execute([$key, $ip, $action . ':%']);
        $row = $stmt->fetch();
        return $row && ($row['count'] >= $maxAttempts);
    }
}
