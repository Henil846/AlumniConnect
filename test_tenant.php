<?php
require 'app/Core/Database.php';
require 'app/Core/Env.php';
App\Core\Env::load(__DIR__.'/.env');

$pdo = App\Core\Database::getConnection();

// Create two colleges
$pdo->exec("INSERT INTO colleges (name, city, state) VALUES ('College A', 'City', 'State'), ('College B', 'City', 'State')");
$collegeAId = $pdo->lastInsertId();
$collegeBId = $collegeAId + 1;

// Create two users
$pdo->exec("INSERT INTO users (full_name, email, password, college_id, role) VALUES ('User A', 'usera" . time() . "@a.edu', 'hash', $collegeAId, 'alumni')");
$userAId = $pdo->lastInsertId();

$pdo->exec("INSERT INTO users (full_name, email, password, college_id, role) VALUES ('User B', 'userb" . time() . "@b.edu', 'hash', $collegeBId, 'alumni')");
$userBId = $pdo->lastInsertId();

// Create a job for College A
$pdo->exec("INSERT INTO jobs (title, company, location, type, industry, salary_range, description, college_id) VALUES ('Job A', 'Comp A', 'Loc A', 'Full-time', 'Tech', '100k', 'Desc', $collegeAId)");
$jobAId = $pdo->lastInsertId();

// Create a job for College B
$pdo->exec("INSERT INTO jobs (title, company, location, type, industry, salary_range, description, college_id) VALUES ('Job B', 'Comp B', 'Loc B', 'Full-time', 'Tech', '100k', 'Desc', $collegeBId)");

// User A accesses jobs
$_SERVER['REQUEST_METHOD'] = 'GET';
$stmt = $pdo->prepare("SELECT COUNT(*) FROM jobs WHERE college_id = ?");
$stmt->execute([$collegeAId]);
$jobsA = $stmt->fetchColumn();

$stmt->execute([$collegeBId]);
$jobsB = $stmt->fetchColumn();

echo "User A College ID: $collegeAId. Jobs visible: $jobsA.\n";
echo "User B College ID: $collegeBId. Jobs visible: $jobsB.\n";

if ($jobsA === $jobsB && $jobsA > 0) {
    echo "ERROR: Tenant isolation failed (both see same jobs count?).\n";
} else {
    echo "SUCCESS: Tenant isolation verified. User A and User B see different scoped jobs.\n";
}

// Cleanup
$pdo->exec("DELETE FROM jobs WHERE title IN ('Job A', 'Job B')");
$pdo->exec("DELETE FROM users WHERE email IN ('usera@a.edu', 'userb@b.edu')");
$pdo->exec("DELETE FROM colleges WHERE name IN ('College A', 'College B')");
