<?php
use App\Core\Database;

$pdo = Database::getConnection();

// Seed Colleges
$colleges = [
    ['name' => 'Indian Institute of Technology Bombay', 'city' => 'Mumbai', 'state' => 'Maharashtra'],
    ['name' => 'Indian Institute of Technology Delhi', 'city' => 'New Delhi', 'state' => 'Delhi'],
    ['name' => 'Birla Institute of Technology and Science', 'city' => 'Pilani', 'state' => 'Rajasthan'],
    ['name' => 'National Institute of Technology Trichy', 'city' => 'Tiruchirappalli', 'state' => 'Tamil Nadu'],
    ['name' => 'Vellore Institute of Technology', 'city' => 'Vellore', 'state' => 'Tamil Nadu']
];

$stmt = $pdo->prepare("INSERT INTO colleges (name, city, state) VALUES (?, ?, ?)");
foreach ($colleges as $college) {
    $stmt->execute([$college['name'], $college['city'], $college['state']]);
}

// Seed Users
$users = [
    [
        'full_name' => 'Rahul Sharma',
        'email' => 'rahul@example.com',
        'password' => password_hash('password123', PASSWORD_DEFAULT),
        'role' => 'student',
        'college_id' => 1,
        'is_verified' => 1
    ],
    [
        'full_name' => 'Priya Patel',
        'email' => 'priya@example.com',
        'password' => password_hash('password123', PASSWORD_DEFAULT),
        'role' => 'alumni',
        'college_id' => 2,
        'is_verified' => 1
    ]
];

$stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, role, college_id, is_verified) VALUES (?, ?, ?, ?, ?, ?)");
foreach ($users as $user) {
    $stmt->execute([$user['full_name'], $user['email'], $user['password'], $user['role'], $user['college_id'], $user['is_verified']]);
}

echo "Database seeded with Indian demo data successfully.\n";
