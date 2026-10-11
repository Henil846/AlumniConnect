<?php
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("CLI only\n");
}

echo "<h1>PHP is working!</h1>";
echo "Vendor folder exists: " . (is_dir(__DIR__ . '/vendor') ? "YES" : "NO") . "<br>";
echo "Autoload exists: " . (file_exists(__DIR__ . '/vendor/autoload.php') ? "YES" : "NO") . "<br>";
