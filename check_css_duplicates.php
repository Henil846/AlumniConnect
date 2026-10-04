<?php
require_once 'vendor/autoload.php';
use Sabberworm\CSS\Parser;

function extractCss($content) {
    preg_match_all('/<style>(.*?)<\/style>/is', $content, $matches);
    return implode("\n", $matches[1]);
}

$layoutCss = extractCss(file_get_contents('resources/views/layouts/app.php'));
$layoutParser = new Parser($layoutCss);
$layoutDoc = $layoutParser->parse();
$layoutSelectors = [];
foreach ($layoutDoc->getAllDeclarationBlocks() as $block) {
    foreach ($block->getSelectors() as $selector) {
        $sel = trim($selector->getSelector());
        if (!isset($layoutSelectors[$sel])) {
            $layoutSelectors[$sel] = [];
        }
        $layoutSelectors[$sel][] = 'layout';
    }
}

$filesToCheck = [
    'resources/views/pages/ads.php',
    'resources/views/pages/donations.php',
    'resources/views/pages/events.php',
    'resources/views/pages/events-admin.php',
    'resources/views/pages/community.php',
    'resources/views/pages/rewards.php',
    'resources/views/pages/notifications.php',
    'resources/views/pages/marketplace.php',
    'resources/views/pages/startup-hub.php',
    'resources/views/pages/business-directory.php',
    'resources/views/pages/career-center.php'
];

$conflicts = [];
foreach ($filesToCheck as $file) {
    $css = extractCss(file_get_contents($file));
    if (empty(trim($css))) continue;
    
    $parser = new Parser($css);
    $doc = $parser->parse();
    
    $pageSelectors = [];
    foreach ($doc->getAllDeclarationBlocks() as $block) {
        foreach ($block->getSelectors() as $selector) {
            $sel = trim($selector->getSelector());
            
            // Duplicate inside page
            if (isset($pageSelectors[$sel])) {
                $conflicts[$file][] = "[Page internal duplicate] " . $sel;
            }
            $pageSelectors[$sel] = true;
            
            // Duplicate between layout and page
            if (isset($layoutSelectors[$sel])) {
                // Ignore general tags or keyframes if they are basic, but log them
                if (preg_match('/^[a-zA-Z]+$/', $sel)) continue; // ignore raw tags like body, html, a, p
                $conflicts[$file][] = "[Layout vs Page conflict] " . $sel;
            }
        }
    }
}

echo "CSS Conflicts Found:\n";
print_r($conflicts);
