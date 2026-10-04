<?php
namespace App\Core;

class Env {
    private static $vars = [];
    private static $loaded = false;

    public static function load($path) {
        if (!file_exists($path)) return;
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            list($name, $value) = explode('=', $line, 2);
            self::$vars[trim($name)] = trim($value);
        }
        self::$loaded = true;
    }

    public static function get($key, $default = null) {
        if (!self::$loaded) {
            self::load(__DIR__ . '/../../.env');
        }
        return self::$vars[$key] ?? $default;
    }
}
