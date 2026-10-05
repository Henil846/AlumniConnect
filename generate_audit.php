<?php
$dir = __DIR__ . '/resources/views/pages';
$markdown = "# Interactive Element Audit\n\n";

$groups = [
    'Auth' => ['landing.php', 'auth/login.php', 'auth/signup.php', 'auth/verify.php', 'auth/forgot-password.php', 'auth/reset-password.php'],
    'Student/Alumni' => ['dashboard.php', 'profile.php', 'profile-view.php', 'directory.php', 'mentorship.php', 'referral-request.php', 'jobs.php', 'events.php', 'community.php', 'messages.php', 'marketplace.php', 'donations.php', 'business-directory.php', 'startup-hub.php', 'career-center.php', 'notifications.php', 'rewards.php', 'settings.php', 'search.php'],
    'College Admin' => ['admin/dashboard.php', 'admin/moderation.php', 'admin/payments.php', 'admin/analytics.php', 'events-admin.php'],
    'Super Admin' => ['super-admin/dashboard.php', 'super-admin/institutions.php', 'super-admin/revenue.php', 'super-admin/analytics.php', 'super-admin/settings.php', 'ads.php']
];

foreach ($groups as $group => $files) {
    $markdown .= "## " . $group . "\n";
    $markdown .= "| Page | Element | Expected behavior | Currently works? | Fix needed | Proof |\n";
    $markdown .= "|---|---|---|---|---|---|\n";
    
    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        if (!file_exists($path)) {
            $markdown .= "| " . $file . " | (File missing) | | | | |\n";
            continue;
        }
        
        $content = file_get_contents($path);
        
        // Find buttons
        preg_match_all('/<button[^>]*>(.*?)<\/button>/is', $content, $buttons, PREG_SET_ORDER);
        foreach ($buttons as $match) {
            $tag = $match[0];
            $text = trim(strip_tags($match[1]));
            if (!$text) $text = 'Icon Button';
            $text = preg_replace('/\s+/', ' ', $text);
            $markdown .= "| " . $file . " | Button: " . $text . " | | | | |\n";
        }
        
        // Find links
        preg_match_all('/<a[^>]*>(.*?)<\/a>/is', $content, $links, PREG_SET_ORDER);
        foreach ($links as $match) {
            $tag = $match[0];
            $text = trim(strip_tags($match[1]));
            if (!$text) $text = 'Icon Link';
            $text = preg_replace('/\s+/', ' ', $text);
            // Ignore css links or pure anchor targets if they are empty
            if ($text) {
                $markdown .= "| " . $file . " | Link: " . $text . " | | | | |\n";
            }
        }
        
        // Find forms
        preg_match_all('/<form[^>]*>/is', $content, $forms, PREG_SET_ORDER);
        foreach ($forms as $match) {
            $tag = $match[0];
            preg_match('/id=[\"\'](.*?)[\"\']/', $tag, $idMatch);
            $id = isset($idMatch[1]) ? $idMatch[1] : 'Form';
            $markdown .= "| " . $file . " | Form: " . $id . " | | | | |\n";
        }
        
        // Find clickable divs
        preg_match_all('/<div[^>]*onclick[^>]*>(.*?)<\/div>/is', $content, $divs, PREG_SET_ORDER);
        foreach ($divs as $match) {
            $tag = $match[0];
            $text = trim(strip_tags(substr($match[1], 0, 50)));
            $text = preg_replace('/\s+/', ' ', $text);
            $markdown .= "| " . $file . " | Clickable Div: " . $text . "... | | | | |\n";
        }
    }
    $markdown .= "\n";
}
if (!is_dir(__DIR__ . '/docs')) mkdir(__DIR__ . '/docs', 0777, true);
file_put_contents(__DIR__ . '/docs/BUTTON_AUDIT.md', $markdown);
echo "Generated docs/BUTTON_AUDIT.md successfully.\n";
