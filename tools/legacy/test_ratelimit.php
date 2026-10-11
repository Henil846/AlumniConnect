<?php
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("CLI only\n");
}

function hitLogin() {
    $ch = curl_init("http://localhost:8000/login");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $code;
}

echo "Hammering login endpoint (POST)...\n";
for ($i=0; $i<10; $i++) {
    $code = hitLogin();
    echo "Request $i: HTTP $code\n";
    if ($code == 429) {
        echo "Rate limit triggered on request $i!\n";
        break;
    }
}
