<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
$logDir = dirname(__DIR__) . '/storage/logs';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0777, true);
}
ini_set('error_log', $logDir . '/php_error.log');

// Basic Autoloader
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// If running in CLI (like bin/console), skip the web routing part
if (php_sapi_name() === 'cli') {
    return;
}

// Basic router for raw PHP application
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    if (preg_match('#^/(uploads|assets/uploads)/.*\.(php|phtml|phar|sh|py|cgi|asp|jsp)$#i', $uri)) {
        http_response_code(403);
        die("Direct script execution in upload directory forbidden.");
    }
    return false;
}

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}

require_once __DIR__ . '/../routes/web.php';
