<?php
$htmlFiles = glob("*.html");
$phpFiles = [];

function scanViews($dir, &$phpFiles) {
    foreach (glob("$dir/*") as $item) {
        if (is_dir($item)) {
            scanViews($item, $phpFiles);
        } else if (pathinfo($item, PATHINFO_EXTENSION) === 'php') {
            $phpFiles[] = basename($item, '.php');
        }
    }
}
scanViews("resources/views", $phpFiles);

$unported = [];
foreach ($htmlFiles as $file) {
    $base = basename($file, '.html');
    if (!in_array($base, $phpFiles)) {
        // Check for specific mappings
        $mapped = false;
        if ($base == 'manage-referrals' && in_array('referral-request', $phpFiles)) $mapped = true;
        if ($base == 'job-board-management' && in_array('jobs', $phpFiles)) $mapped = true;
        if ($base == 'mentorship-dashboard' && in_array('mentorship', $phpFiles)) $mapped = true;
        if ($base == 'alumni-dashboard' && in_array('dashboard', $phpFiles)) $mapped = true;

        if (!$mapped) {
            $unported[] = $file;
        }
    }
}

echo "Unported HTML files:\n";
print_r($unported);
