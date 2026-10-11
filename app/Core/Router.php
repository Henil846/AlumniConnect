<?php
namespace App\Core;

class Router {
    private static $routes = [];

    public static function get($uri, $callback) {
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback) {
        self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch($uri, $method) {
        $uri = strtok($uri, '?');
        
        // Prevent stack traces & ensure display_errors is 0
        ini_set('display_errors', '0');
        set_exception_handler(function(\Throwable $e) {
            http_response_code(500);
            error_log($e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
            
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => false,
                    'message' => 'An internal server error occurred.'
                ]);
                exit;
            }

            $errorView = __DIR__ . '/../../resources/views/pages/errors/500.php';
            if (file_exists($errorView)) {
                require $errorView;
            } else {
                echo "<!DOCTYPE html><html><head><title>500 Internal Server Error</title></head><body><h1>500 Internal Server Error</h1><p>An unexpected error occurred.</p></body></html>";
            }
            exit;
        });

        // Add Global Security Headers
        header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' https://fonts.googleapis.com https://fonts.gstatic.com");
        header("X-Frame-Options: DENY");
        header("X-Content-Type-Options: nosniff");
        header("Referrer-Policy: strict-origin-when-cross-origin");

        // Exact match
        if (isset(self::$routes[$method][$uri])) {
            $callback = self::$routes[$method][$uri];
            return self::invoke($callback);
        }

        // Regex match
        if (isset(self::$routes[$method])) {
            foreach (self::$routes[$method] as $route => $callback) {
                // Convert {id} or {name} to regex capture groups
                $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_-]+)', $route);
                $pattern = '@^' . $pattern . '$@D';
                if (preg_match($pattern, $uri, $matches)) {
                    array_shift($matches); // remove full match
                    return self::invoke($callback, $matches);
                }
            }
        }
        
        http_response_code(404);
        try {
            return \App\Core\View::render('errors/404', ['title' => 'Page Not Found — Alumni Connect', 'activePage' => ''], 'app');
        } catch (\Throwable $t) {
            echo "<!DOCTYPE html><html><head><title>404 Not Found</title></head><body style=\"font-family:sans-serif;text-align:center;padding:50px;\"><h1>404 Not Found</h1><p>The page you requested could not be found.</p><a href=\"/dashboard\">Go to Dashboard</a></body></html>";
        }
    }

    private static function invoke($callback, $params = []) {
        if (is_array($callback)) {
            $controller = new $callback[0]();
            $method = $callback[1];
            return call_user_func_array([$controller, $method], $params);
        }
        return call_user_func_array($callback, $params);
    }
}
