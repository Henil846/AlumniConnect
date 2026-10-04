<?php

// 1. Port missing HTML to PHP views
$htmlFiles = [
    'index.html' => 'resources/views/pages/landing.php',
    'verify.html' => 'resources/views/pages/auth/verify.php',
    'forgot-password.html' => 'resources/views/pages/auth/forgot-password.php'
];

foreach ($htmlFiles as $html => $php) {
    if (file_exists($html)) {
        $content = file_get_contents($html);
        file_put_contents($php, $content);
        unlink($html);
        echo "Converted $html to $php\n";
    }
}
// Clean up all remaining HTML files
$allHtml = glob('*.html');
foreach($allHtml as $h) { unlink($h); echo "Deleted $h\n"; }

// 2. Map CSS files to layouts
$layouts = [
    'resources/views/layouts/app.php' => ['public/assets/css/styles.css', 'public/assets/css/app.css'],
    'resources/views/layouts/auth.php' => ['public/assets/css/styles.css', 'public/assets/css/auth.css'],
    'resources/views/layouts/super-admin.php' => ['public/assets/css/styles.css', 'public/assets/css/super-admin.css']
];

foreach ($layouts as $layout => $cssFiles) {
    if (file_exists($layout)) {
        $content = file_get_contents($layout);
        $cssContent = "";
        foreach ($cssFiles as $css) {
            if (file_exists($css)) {
                $cssContent .= "\n/* Embedded from " . basename($css) . " */\n" . file_get_contents($css);
            }
        }
        
        // Remove link tags
        $content = preg_replace('/<link\s+rel="stylesheet"\s+href="[^"]+\/css\/(styles|app|auth|super-admin)\.css"[^>]*>/i', '', $content);
        
        // Inject style block before </head>
        $styleBlock = "<style>\n" . $cssContent . "\n</style>\n</head>";
        $content = str_replace('</head>', $styleBlock, $content);
        
        file_put_contents($layout, $content);
        echo "Updated layout $layout\n";
    }
}

// 3. Map CSS files to specific views
$pageCss = [
    'public/assets/css/dashboard.css' => ['resources/views/pages/dashboard.php'],
    'public/assets/css/directory.css' => ['resources/views/pages/directory.php'],
    'public/assets/css/mentorship.css' => ['resources/views/pages/mentorship.php'],
    'public/assets/css/profile.css' => ['resources/views/pages/profile.php'],
    'public/assets/css/profile-view.css' => ['resources/views/pages/profile-view.php'],
    'public/assets/css/hub-market.css' => ['resources/views/pages/marketplace.php', 'resources/views/pages/startup-hub.php', 'resources/views/pages/business-directory.php', 'resources/views/pages/career-center.php'],
    'public/assets/css/extended.css' => ['resources/views/pages/ads.php', 'resources/views/pages/donations.php', 'resources/views/pages/events.php', 'resources/views/pages/events-admin.php', 'resources/views/pages/community.php', 'resources/views/pages/rewards.php', 'resources/views/pages/notifications.php'],
    'public/assets/css/admin-chat.css' => ['resources/views/pages/messages.php'],
    'public/assets/css/landing.css' => ['resources/views/pages/landing.php']
];

foreach ($pageCss as $css => $views) {
    if (file_exists($css)) {
        $cssContent = "\n<style>\n/* Embedded from " . basename($css) . " */\n" . file_get_contents($css) . "\n</style>\n";
        foreach ($views as $view) {
            if (file_exists($view)) {
                $content = file_get_contents($view);
                // Prepend to view
                $content = $cssContent . $content;
                file_put_contents($view, $content);
                echo "Embedded " . basename($css) . " into $view\n";
            }
        }
    }
}

// 4. Remove ALL $extraCss logic from app.php layout and controllers
$appLayout = 'resources/views/layouts/app.php';
$content = file_get_contents($appLayout);
$content = preg_replace('/<\?php\s+if\(isset\(\$extraCss\)\):\s*\?>\s*<link\s+rel="stylesheet"\s+href="<\?=\s*htmlspecialchars\(\$extraCss\)\s*\?>"\s*\/>\s*<\?php\s+endif;\s*\?>/is', '', $content);
file_put_contents($appLayout, $content);
echo "Removed \$extraCss block from app.php\n";

// Remove 'extraCss' from all controllers
$controllers = glob('app/Controllers/*.php');
foreach ($controllers as $ctrl) {
    $content = file_get_contents($ctrl);
    if (strpos($content, "'extraCss'") !== false) {
        $content = preg_replace("/'extraCss'\s*=>\s*'[^']+',?/", '', $content);
        file_put_contents($ctrl, $content);
        echo "Cleaned up extraCss from $ctrl\n";
    }
}

// 5. Delete all CSS files in public/assets/css
$cssFiles = glob('public/assets/css/*.css');
foreach ($cssFiles as $css) {
    unlink($css);
    echo "Deleted $css\n";
}

echo "Done mapping styles!\n";
