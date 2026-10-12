<?php
$dbPath = __DIR__ . '/../database/database.sqlite';
if (!file_exists($dbPath)) {
    die("Database not found at $dbPath\n");
}
$pdo = new PDO('sqlite:' . $dbPath);
$tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'")->fetchAll(PDO::FETCH_COLUMN);
$targets = ['mentor_', 'side_img', 'Elena', 'Marcus'];
$results = [];

foreach ($tables as $t) {
    $cols = $pdo->query("PRAGMA table_info($t)")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cols as $c) {
        $col = $c['name'];
        foreach ($targets as $tgt) {
            $escapedTgt = str_replace(['%', '_'], ['\%', '\_'], $tgt);
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM $t WHERE CAST($col AS TEXT) LIKE ? ESCAPE '\'");
            $stmt->execute(["%$escapedTgt%"]);
            $cnt = $stmt->fetchColumn();
            if ($cnt > 0) {
                // Fetch sample matching values
                $sampleStmt = $pdo->prepare("SELECT CAST($col AS TEXT) FROM $t WHERE CAST($col AS TEXT) LIKE ? ESCAPE '\' LIMIT 3");
                $sampleStmt->execute(["%$escapedTgt%"]);
                $samples = $sampleStmt->fetchAll(PDO::FETCH_COLUMN);
                $results[] = sprintf(
                    "Table: %-20s | Column: %-15s | Pattern: %-10s | Count: %-3d | Samples: %s",
                    $t, $col, $tgt, $cnt, implode('; ', $samples)
                );
            }
        }
    }
}

if (empty($results)) {
    echo "NO_MATCHES_FOUND\n";
} else {
    echo implode("\n", $results) . "\n";
}
