<?php
$c = file_get_contents(__DIR__ . '/../routes/web.php');
preg_match_all('/Router::(get|post)\(\s*[\'"]([^\'"]+)[\'"]/i', $c, $m);
$routes = [];
foreach ($m[0] as $i => $raw) {
    $method = strtoupper($m[1][$i]);
    $path = $m[2][$i];
    $routes[] = ['method' => $method, 'path' => $path];
    echo "$method $path\n";
}
echo "\nTotal Routes: " . count($routes) . "\n";
file_put_contents(__DIR__ . '/routes_list.json', json_encode($routes, JSON_PRETTY_PRINT));
