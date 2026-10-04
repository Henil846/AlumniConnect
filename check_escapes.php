<?php
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('resources/views'));
$count = 0;
foreach ($files as $file) {
    if ($file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        preg_match_all('/<\?=\s*([^>]+)\?>/', $content, $matches);
        foreach ($matches[1] as $m) {
            $m = trim($m);
            if (!str_starts_with($m, 'htmlspecialchars') && !str_starts_with($m, 'nl2br(htmlspecialchars') && !str_starts_with($m, '$activePage') && !str_starts_with($m, '$title') && !str_starts_with($m, '$extraCss')) {
                echo $file->getPathname() . ": " . $m . "\n";
                $count++;
            }
        }
    }
}
echo "Total unescaped usages: $count\n";
