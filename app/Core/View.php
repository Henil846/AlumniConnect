<?php
namespace App\Core;

class View {
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
