<?php
namespace App\Core;

class Auth {
    private static $user = null;

    public static function setUser($userData) {
        self::$user = (object)$userData;
    }

    public static function user() {
        return self::$user;
    }

    public static function id() {
        return self::$user ? self::$user->id : null;
    }

    public static function check() {
        return self::$user !== null;
    }
}
