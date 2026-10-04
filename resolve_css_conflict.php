<?php

$filesToCheck = [
    'resources/views/pages/ads.php',
    'resources/views/pages/donations.php',
    'resources/views/pages/events.php',
    'resources/views/pages/events-admin.php',
    'resources/views/pages/community.php',
    'resources/views/pages/rewards.php',
    'resources/views/pages/notifications.php',
];

$blockToRemove = <<<CSS
.avatar-stack {
  display: flex;
}
.avatar-stack img {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid var(--color-white);
  margin-left: -10px;
}
.avatar-stack img:first-child { margin-left: 0; }
CSS;

foreach ($filesToCheck as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        $content = str_replace($blockToRemove, '', $content);
        // Also let's find any <img ...> inside <div class="avatar-stack"> and add class="avatar"
        // But honestly just updating app.php is safer for the HTML.
        file_put_contents($file, $content);
        echo "Removed block from $file\n";
    }
}

// Update app.php to support img tags in avatar-stack
$appPhp = 'resources/views/layouts/app.php';
if (file_exists($appPhp)) {
    $appContent = file_get_contents($appPhp);
    $appContent = str_replace('.avatar-stack .avatar {', '.avatar-stack .avatar, .avatar-stack img {', $appContent);
    $appContent = str_replace('.avatar-stack .avatar:first-child {', '.avatar-stack .avatar:first-child, .avatar-stack img:first-child {', $appContent);
    file_put_contents($appPhp, $appContent);
    echo "Updated app.php to handle avatar-stack img tags.\n";
}
