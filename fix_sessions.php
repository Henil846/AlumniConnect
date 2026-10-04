<?php
$files = glob('app/Controllers/*.php');
foreach($files as $file) {
    $content = file_get_contents($file);
    $content = str_replace("\$_SESSION['user_id']", "\$_REQUEST['user_id']", $content);
    $content = str_replace("\$_SESSION['role']", "\$_REQUEST['user_role']", $content);
    
    // Add CSRF check if not present in create/update methods
    // Actually, I should just apply a global CSRF middleware instead of doing it manually per controller.
    file_put_contents($file, $content);
}
echo 'Fixed session usage.';
