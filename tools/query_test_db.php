<?php
$sql = $argv[1] ?? '';
if (!$sql) { echo json_encode([]); exit; }
$pdo = new PDO('sqlite:' . __DIR__ . '/../database/test.sqlite');
$stmt = $pdo->query($sql);
echo json_encode($stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : []);
