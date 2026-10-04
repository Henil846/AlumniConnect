<?php
namespace App\Middleware;

class RateLimitMiddleware {
    public static function handle($limit = 5, $window = 60) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $cacheFile = __DIR__ . '/../../storage/rate_limits.json';
        if (!is_dir(dirname($cacheFile))) {
            mkdir(dirname($cacheFile), 0777, true);
        }

        $data = [];
        if (file_exists($cacheFile)) {
            $data = json_decode(file_get_contents($cacheFile), true) ?: [];
        }

        $now = time();
        $attempts = $data[$ip] ?? [];
        $attempts = array_filter($attempts, function($time) use ($now, $window) {
            return $time > ($now - $window);
        });

        if (count($attempts) >= $limit) {
            header('HTTP/1.1 429 Too Many Requests');
            echo json_encode(['success' => false, 'message' => 'Too many requests. Please try again later.']);
            exit;
        }

        $attempts[] = $now;
        $data[$ip] = $attempts;
        file_put_contents($cacheFile, json_encode($data));
    }
}
