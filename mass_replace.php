<?php
$files = glob('app/Controllers/*.php');
foreach($files as $file) {
    $content = file_get_contents($file);
    $content = preg_replace('/\$_REQUEST\[\'user_id\'\]/', '\App\Core\Auth::id()', $content);
    $content = preg_replace('/\$_REQUEST\[\'user_role\'\]/', '\App\Core\Auth::user()->role', $content);
    $content = preg_replace('/\$_SESSION\[\'user_id\'\]/', '\App\Core\Auth::id()', $content);
    $content = preg_replace('/\$_SESSION\[\'role\'\]/', '\App\Core\Auth::user()->role', $content);
    file_put_contents($file, $content);
}
echo 'Replaced user_id references.';
