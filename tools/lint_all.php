<?php
$dir = dirname(__DIR__);
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
$failed = 0;
$checked = 0;

$dirCounts = [];

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $path = $file->getRealPath();
        // Skip vendor if exists
        if (strpos($path, 'vendor') !== false) continue;
        
        $relPath = str_replace($dir . DIRECTORY_SEPARATOR, '', $path);
        $subDir = dirname($relPath);
        if ($subDir === '.') $subDir = '[root]';
        $dirCounts[$subDir] = ($dirCounts[$subDir] ?? 0) + 1;

        $checked++;
        $output = [];
        $exitCode = 0;
        exec('"C:\\xampp\\php\\php.exe" -l ' . escapeshellarg($path), $output, $exitCode);
        
        if ($exitCode !== 0) {
            echo "FAILED: $path\n" . implode("\n", $output) . "\n";
            $failed++;
        }
    }
}

echo "Scanned PHP directories breakdown:\n";
ksort($dirCounts);
foreach ($dirCounts as $d => $count) {
    printf("  - %-35s : %d files\n", $d, $count);
}
echo "\nTotal Checked: $checked PHP files.\n";
if ($failed === 0) {
    echo "SUCCESS: 100% of PHP files passed syntax check (0 errors).\n";
} else {
    echo "ERROR: $failed files failed syntax check.\n";
    exit(1);
}
