<?php
namespace App\Validators;

class AuthValidator {
    public static function validateSignup($data) {
        $errors = [];
        if (empty($data['fullName'])) {
            $errors['fullName'] = "Full name is required.";
        }
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Valid email is required.";
        }
        if (empty($data['password']) || strlen($data['password']) < 8) {
            $errors['password'] = "Password must be at least 8 characters.";
        }
        if (empty($data['role']) || !in_array($data['role'], ['student', 'alumni'])) {
            $errors['role'] = "Invalid role selected.";
        }
        return $errors;
    }

    public static function validateLogin($data) {
        $errors = [];
        if (empty($data['email'])) {
            $errors['email'] = "Email is required.";
        }
        if (empty($data['password'])) {
            $errors['password'] = "Password is required.";
        }
        return $errors;
    }
}
