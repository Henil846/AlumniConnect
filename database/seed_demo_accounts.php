<?php
require_once __DIR__ . '/../app/Core/Env.php';
require_once __DIR__ . '/../app/Core/Database.php';

App\Core\Env::load(__DIR__ . '/../.env');

// DEV-ONLY GUARD: Block execution in production environments
if (getenv('APP_ENV') === 'production' || ($_ENV['APP_ENV'] ?? '') === 'production') {
    fwrite(STDERR, "FATAL: Seed scripts and demo data generation are strictly disabled in production mode (APP_ENV=production).\n");
    exit(1);
}

$pdo = App\Core\Database::getConnection();

echo "=== Seeding Demo Accounts and Dashboard Data (DEV ONLY) ===\n";

$passHash = password_hash('Password123!', PASSWORD_BCRYPT);

// 1. Ensure Colleges 1 and 2 exist
$colleges = [
    [
        'id' => 1,
        'name' => 'Indian Institute of Technology Bombay',
        'city' => 'Mumbai',
        'state' => 'Maharashtra',
        'status' => 'active',
        'plan' => 'Enterprise',
        'slug' => 'iit-bombay'
    ],
    [
        'id' => 2,
        'name' => 'BITS Pilani',
        'city' => 'Pilani',
        'state' => 'Rajasthan',
        'status' => 'active',
        'plan' => 'Growth',
        'slug' => 'bits-pilani'
    ]
];

foreach ($colleges as $c) {
    $exists = $pdo->prepare("SELECT id FROM colleges WHERE id = ?");
    $exists->execute([$c['id']]);
    if ($exists->fetch()) {
        $up = $pdo->prepare("UPDATE colleges SET name = ?, city = ?, state = ?, status = ?, plan = ?, slug = ? WHERE id = ?");
        $up->execute([$c['name'], $c['city'], $c['state'], $c['status'], $c['plan'], $c['slug'], $c['id']]);
    } else {
        $ins = $pdo->prepare("INSERT INTO colleges (id, name, city, state, status, plan, slug) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $ins->execute([$c['id'], $c['name'], $c['city'], $c['state'], $c['status'], $c['plan'], $c['slug']]);
    }
}

// 2. Demo Users
$users = [
    // College 1
    [
        'email' => 'student@alumni.test',
        'full_name' => 'Aarav Patel',
        'password' => $passHash,
        'role' => 'student',
        'college_id' => 1,
        'is_verified' => 1,
        'department' => 'Computer Science',
        'industry' => 'Technology',
        'location' => 'Mumbai',
        'about_me' => '3rd-year CS undergrad passionate about distributed systems and cloud platforms.',
        'skills' => json_encode(['Python', 'PHP', 'React', 'Docker', 'SQL']),
        'linkedin' => 'linkedin.com/in/aarav-patel',
        'github' => 'github.com/aaravpatel'
    ],
    [
        'email' => 'alumni@alumni.test',
        'full_name' => 'Pooja Iyer',
        'password' => $passHash,
        'role' => 'alumni',
        'college_id' => 1,
        'is_verified' => 1,
        'department' => 'Computer Science',
        'industry' => 'Engineering',
        'location' => 'Bengaluru',
        'about_me' => 'Staff Software Engineer at Microsoft. Class of 2019. Available for mentorship & referrals.',
        'skills' => json_encode(['System Design', 'Go', 'Kubernetes', 'Cloud Architecture', 'Mentorship']),
        'linkedin' => 'linkedin.com/in/poojaiyer',
        'github' => 'github.com/poojaiyer'
    ],
    [
        'email' => 'admin@alumni.test',
        'full_name' => 'Dean K. Sharma',
        'password' => $passHash,
        'role' => 'college_admin',
        'college_id' => 1,
        'is_verified' => 1,
        'department' => 'Alumni Relations',
        'industry' => 'Education Administration',
        'location' => 'Mumbai',
        'about_me' => 'Director of Alumni Affairs and Corporate Relations at IIT Bombay.',
        'skills' => json_encode(['Administration', 'Fundraising', 'Event Planning']),
        'linkedin' => 'linkedin.com/in/dean-sharma',
        'github' => null
    ],
    [
        'email' => 'superadmin@alumni.test',
        'full_name' => 'Antigravity SuperAdmin',
        'password' => $passHash,
        'role' => 'super_admin',
        'college_id' => 1,
        'is_verified' => 1,
        'department' => 'Platform Operations',
        'industry' => 'SaaS Administration',
        'location' => 'HQ',
        'about_me' => 'Global Platform Administrator with full institutional management access.',
        'skills' => json_encode(['Multi-Tenancy', 'Security', 'Billing', 'Analytics']),
        'linkedin' => null,
        'github' => null
    ],
    // College 2 (for tenant isolation verification)
    [
        'email' => 'student2@alumni.test',
        'full_name' => 'Rohan Mehta',
        'password' => $passHash,
        'role' => 'student',
        'college_id' => 2,
        'is_verified' => 1,
        'department' => 'Electrical Engineering',
        'industry' => 'Hardware',
        'location' => 'Pilani',
        'about_me' => 'BITS Pilani sophomore interested in IoT and Embedded Systems.',
        'skills' => json_encode(['C++', 'Verilog', 'Robotics']),
        'linkedin' => 'linkedin.com/in/rohanmehta',
        'github' => 'github.com/rohanmehta'
    ],
    [
        'email' => 'alumni2@alumni.test',
        'full_name' => 'Ananya Verma',
        'password' => $passHash,
        'role' => 'alumni',
        'college_id' => 2,
        'is_verified' => 1,
        'department' => 'Mechanical Engineering',
        'industry' => 'Automotive',
        'location' => 'Pune',
        'about_me' => 'Senior EV Powertrain Lead at Tata Motors. BITS Pilani Alum.',
        'skills' => json_encode(['EV Systems', 'Thermal Modeling', 'Mentorship']),
        'linkedin' => 'linkedin.com/in/ananyaverma',
        'github' => null
    ],
    [
        'email' => 'admin2@alumni.test',
        'full_name' => 'Prof. S. Rangan',
        'password' => $passHash,
        'role' => 'college_admin',
        'college_id' => 2,
        'is_verified' => 1,
        'department' => 'Alumni Relations',
        'industry' => 'Education Administration',
        'location' => 'Pilani',
        'about_me' => 'College Administrator for BITS Pilani network.',
        'skills' => json_encode(['Alumni Management']),
        'linkedin' => null,
        'github' => null
    ]
];

$userMap = [];
foreach ($users as $u) {
    $existing = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $existing->execute([$u['email']]);
    $row = $existing->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $up = $pdo->prepare("UPDATE users SET full_name = ?, password = ?, role = ?, college_id = ?, is_verified = ?, department = ?, industry = ?, location = ?, about_me = ?, skills = ?, linkedin = ?, github = ? WHERE id = ?");
        $up->execute([$u['full_name'], $u['password'], $u['role'], $u['college_id'], $u['is_verified'], $u['department'], $u['industry'], $u['location'], $u['about_me'], $u['skills'], $u['linkedin'], $u['github'], $row['id']]);
        $userMap[$u['email']] = $row['id'];
    } else {
        $ins = $pdo->prepare("INSERT INTO users (full_name, email, password, role, college_id, is_verified, department, industry, location, about_me, skills, linkedin, github) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $ins->execute([$u['full_name'], $u['email'], $u['password'], $u['role'], $u['college_id'], $u['is_verified'], $u['department'], $u['industry'], $u['location'], $u['about_me'], $u['skills'], $u['linkedin'], $u['github']]);
        $userMap[$u['email']] = $pdo->lastInsertId();
    }
}

$c1StudentId = $userMap['student@alumni.test'];
$c1AlumniId = $userMap['alumni@alumni.test'];
$c1AdminId = $userMap['admin@alumni.test'];
$c2StudentId = $userMap['student2@alumni.test'];
$c2AlumniId = $userMap['alumni2@alumni.test'];

// 3. Sample Events
$events = [
    [
        'title' => 'Annual Alumni Tech Summit 2026',
        'type' => 'In-Person',
        'date' => date('Y-m-d H:i:s', strtotime('+14 days')),
        'location' => 'IIT Bombay Main Auditorium, Powai, Mumbai',
        'description' => 'Connect with industry leaders, founders, and fellow alumni shaping the future of Indian tech.',
        'speakers' => 'Pooja Iyer (Staff SWE, Microsoft), Dr. K. Radhakrishnan (Former Chairman, ISRO)',
        'capacity' => 250,
        'college_id' => 1
    ],
    [
        'title' => 'Career Transitions to AI & ML Webinar',
        'type' => 'Online',
        'date' => date('Y-m-d H:i:s', strtotime('+7 days')),
        'location' => 'Virtual / Zoom Live',
        'description' => 'A practical roadmap for software engineers transitioning into GenAI and Applied Machine Learning roles.',
        'speakers' => 'Vikram Shenoy (AI Research Scientist)',
        'capacity' => 500,
        'college_id' => 1
    ],
    [
        'title' => 'BITS Pilani Founders Showcase 2026',
        'type' => 'Hybrid',
        'date' => date('Y-m-d H:i:s', strtotime('+20 days')),
        'location' => 'Pilani Campus & Live Stream',
        'description' => 'Showcasing the top 15 alumni-founded startups seeking seed & pre-series A funding.',
        'speakers' => 'BITS Angel Network Partners',
        'capacity' => 150,
        'college_id' => 2
    ]
];

foreach ($events as $ev) {
    $chk = $pdo->prepare("SELECT id FROM events WHERE title = ? AND college_id = ?");
    $chk->execute([$ev['title'], $ev['college_id']]);
    if (!$chk->fetch()) {
        $ins = $pdo->prepare("INSERT INTO events (title, type, date, location, description, speakers, capacity, college_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $ins->execute([$ev['title'], $ev['type'], $ev['date'], $ev['location'], $ev['description'], $ev['speakers'], $ev['capacity'], $ev['college_id']]);
    }
}

// 4. Sample Jobs
$jobs = [
    [
        'title' => 'Senior Backend Engineer (Distributed Systems)',
        'company' => 'Microsoft India',
        'location' => 'Bengaluru / Hybrid',
        'industry' => 'Engineering',
        'type' => 'Full-time',
        'salary_range' => '₹32,00,000 - ₹48,00,000',
        'description' => 'Looking for an experienced engineer to scale our Azure real-time telemetry streaming pipelines.',
        'requirements' => '4+ years of backend development in Go, Java, or C#. Strong background in distributed message brokers (Kafka/EventHubs).',
        'college_id' => 1
    ],
    [
        'title' => 'Product Management Associate',
        'company' => 'Zomato',
        'location' => 'Gurugram / On-site',
        'industry' => 'Product Design',
        'type' => 'Full-time',
        'salary_range' => '₹18,00,000 - ₹24,00,000',
        'description' => 'Join the quick-commerce discovery pod to optimize user search and checkout conversion.',
        'requirements' => '1-3 years experience in product analytics, UX optimization, or consulting.',
        'college_id' => 1
    ],
    [
        'title' => 'Embedded Systems & Firmware Engineer',
        'company' => 'Ather Energy',
        'location' => 'Bengaluru / On-site',
        'industry' => 'Hardware',
        'type' => 'Full-time',
        'salary_range' => '₹20,00,000 - ₹30,00,000',
        'description' => 'Design battery management system (BMS) firmware for next-gen electric two-wheelers.',
        'requirements' => 'Proficiency in C/C++, RTOS, CAN bus protocols, and hardware debugging.',
        'college_id' => 2
    ]
];

foreach ($jobs as $jb) {
    $chk = $pdo->prepare("SELECT id FROM jobs WHERE title = ? AND college_id = ?");
    $chk->execute([$jb['title'], $jb['college_id']]);
    if (!$chk->fetch()) {
        $ins = $pdo->prepare("INSERT INTO jobs (title, company, location, industry, type, salary_range, description, requirements, college_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $ins->execute([$jb['title'], $jb['company'], $jb['location'], $jb['industry'], $jb['type'], $jb['salary_range'], $jb['description'], $jb['requirements'], $jb['college_id']]);
    }
}

// 5. Sample Campaigns and Donations
$campaigns = [
    [
        'title' => 'Alumni Endowed Scholarship Fund 2026',
        'description' => 'Providing need-blind tuition assistance and hostel support for deserving undergraduate students.',
        'goal_amount' => 5000000.00,
        'raised_amount' => 1850000.00,
        'created_by' => $c1AdminId,
        'college_id' => 1
    ],
    [
        'title' => 'Campus DeepTech Innovation Lab',
        'description' => 'Modernizing campus semiconductor and robotics prototyping labs with cutting-edge equipment.',
        'goal_amount' => 2500000.00,
        'raised_amount' => 920000.00,
        'created_by' => $c1AdminId,
        'college_id' => 1
    ]
];

foreach ($campaigns as $camp) {
    $chk = $pdo->prepare("SELECT id FROM campaigns WHERE title = ? AND college_id = ?");
    $chk->execute([$camp['title'], $camp['college_id']]);
    if (!$chk->fetch()) {
        $ins = $pdo->prepare("INSERT INTO campaigns (title, description, goal_amount, raised_amount, created_by, college_id) VALUES (?, ?, ?, ?, ?, ?)");
        $ins->execute([$camp['title'], $camp['description'], $camp['goal_amount'], $camp['raised_amount'], $camp['created_by'], $camp['college_id']]);
    }
}

$c1CampId = $pdo->query("SELECT id FROM campaigns WHERE college_id = 1 LIMIT 1")->fetchColumn();
if ($c1CampId) {
    $chkDon = $pdo->prepare("SELECT id FROM donations WHERE campaign_id = ?");
    $chkDon->execute([$c1CampId]);
    if (!$chkDon->fetch()) {
        $insDon = $pdo->prepare("INSERT INTO donations (user_id, campaign_id, amount, status, transaction_id, college_id) VALUES (?, ?, ?, 'completed', ?, ?)");
        $insDon->execute([$c1AlumniId, $c1CampId, 50000.00, 'TXN_DEMO_SEED_01', 1]);
    }
}

// 6. Community Posts
$posts = [
    [
        'user_id' => $c1AlumniId,
        'content' => 'Excited to announce that Microsoft Bengaluru is hiring 10+ new grads and interns this cycle! Drop a referral request or message me if you are looking to build high-scale cloud software.',
        'college_id' => 1
    ],
    [
        'user_id' => $c1StudentId,
        'content' => 'Just published our team project on AI-powered campus resource scheduling! Grateful to all alumni mentors who gave feedback during our sprint reviews.',
        'college_id' => 1
    ]
];

foreach ($posts as $p) {
    $chkPost = $pdo->prepare("SELECT id FROM posts WHERE content = ? AND college_id = ?");
    $chkPost->execute([$p['content'], $p['college_id']]);
    if (!$chkPost->fetch()) {
        $ins = $pdo->prepare("INSERT INTO posts (user_id, content, college_id) VALUES (?, ?, ?)");
        $ins->execute([$p['user_id'], $p['content'], $p['college_id']]);
    }
}

// 7. Marketplace, Businesses, Startups, Career Resources
$marketItems = [
    [
        'user_id' => $c1AlumniId,
        'title' => 'Operating Systems: Three Easy Pieces (Hardcover)',
        'description' => 'Mint condition textbook, ideal for OS course. Pick up at Powai campus or courier.',
        'price' => 450.00,
        'item_condition' => 'like-new',
        'category' => 'books',
        'status' => 'active',
        'college_id' => 1
    ]
];
foreach ($marketItems as $m) {
    $chkM = $pdo->prepare("SELECT id FROM marketplace_items WHERE title = ? AND college_id = ?");
    $chkM->execute([$m['title'], $m['college_id']]);
    if (!$chkM->fetch()) {
        $ins = $pdo->prepare("INSERT INTO marketplace_items (user_id, title, description, price, item_condition, category, status, college_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $ins->execute([$m['user_id'], $m['title'], $m['description'], $m['price'], $m['item_condition'], $m['category'], $m['status'], $m['college_id']]);
    }
}

$businesses = [
    [
        'user_id' => $c1AlumniId,
        'name' => 'ByteCraft Cloud Solutions',
        'description' => 'Specialized cloud migration & FinOps advisory founded by IIT Bombay alumni.',
        'website' => 'https://bytecraft.example.com',
        'category' => 'Technology',
        'college_id' => 1
    ]
];
foreach ($businesses as $b) {
    $chkB = $pdo->prepare("SELECT id FROM businesses WHERE name = ? AND college_id = ?");
    $chkB->execute([$b['name'], $b['college_id']]);
    if (!$chkB->fetch()) {
        $ins = $pdo->prepare("INSERT INTO businesses (user_id, name, description, website, category, college_id) VALUES (?, ?, ?, ?, ?, ?)");
        $ins->execute([$b['user_id'], $b['name'], $b['description'], $b['website'], $b['category'], $b['college_id']]);
    }
}

$startups = [
    [
        'user_id' => $c1AlumniId,
        'name' => 'NeuroRoute AI',
        'elevator_pitch' => 'Autonomous freight optimization using reinforcement learning for Indian logistics networks.',
        'funding_stage' => 'Seed',
        'website' => 'https://neuroroute.example.com',
        'college_id' => 1
    ]
];
foreach ($startups as $s) {
    $chkS = $pdo->prepare("SELECT id FROM startups WHERE name = ? AND college_id = ?");
    $chkS->execute([$s['name'], $s['college_id']]);
    if (!$chkS->fetch()) {
        $ins = $pdo->prepare("INSERT INTO startups (user_id, name, elevator_pitch, funding_stage, website, college_id) VALUES (?, ?, ?, ?, ?, ?)");
        $ins->execute([$s['user_id'], $s['name'], $s['elevator_pitch'], $s['funding_stage'], $s['website'], $s['college_id']]);
    }
}

$careerResources = [
    [
        'title' => 'Software Engineering Behavioral & System Design Guide (2026)',
        'link' => 'https://github.com/donnemartin/system-design-primer',
        'resource_type' => 'guide',
        'college_id' => 1
    ]
];
foreach ($careerResources as $cr) {
    $chkCr = $pdo->prepare("SELECT id FROM career_resources WHERE title = ? AND college_id = ?");
    $chkCr->execute([$cr['title'], $cr['college_id']]);
    if (!$chkCr->fetch()) {
        $ins = $pdo->prepare("INSERT INTO career_resources (title, link, resource_type, college_id) VALUES (?, ?, ?, ?)");
        $ins->execute([$cr['title'], $cr['link'], $cr['resource_type'], $cr['college_id']]);
    }
}

// 8. Advertisements
$ads = [
    [
        'sponsor_name' => 'Google Cloud for Startups',
        'image_url' => 'https://images.unsplash.com/photo-1579546929518-9e396f3cc809?w=600&auto=format&fit=crop',
        'link_url' => 'https://cloud.google.com/startup',
        'status' => 'active',
        'college_id' => 1
    ]
];
foreach ($ads as $a) {
    $chkAd = $pdo->prepare("SELECT id FROM advertisements WHERE sponsor_name = ?");
    $chkAd->execute([$a['sponsor_name']]);
    if (!$chkAd->fetch()) {
        $ins = $pdo->prepare("INSERT INTO advertisements (sponsor_name, image_url, link_url, status, college_id) VALUES (?, ?, ?, ?, ?)");
        $ins->execute([$a['sponsor_name'], $a['image_url'], $a['link_url'], $a['status'], $a['college_id']]);
    }
}

// 9. Moderation Reports
$reports = [
    [
        'reporter_id' => $c1StudentId,
        'reported_item_type' => 'post',
        'reported_item_id' => 1,
        'reason' => 'Duplicate content verification requested.',
        'status' => 'pending',
        'college_id' => 1
    ]
];
foreach ($reports as $rep) {
    $chkR = $pdo->prepare("SELECT id FROM reports WHERE reporter_id = ? AND reason = ?");
    $chkR->execute([$rep['reporter_id'], $rep['reason']]);
    if (!$chkR->fetch()) {
        $ins = $pdo->prepare("INSERT INTO reports (reporter_id, reported_item_type, reported_item_id, reason, status, college_id) VALUES (?, ?, ?, ?, ?, ?)");
        $ins->execute([$rep['reporter_id'], $rep['reported_item_type'], $rep['reported_item_id'], $rep['reason'], $rep['status'], $rep['college_id']]);
    }
}

// 10. Sample Notifications
$notifs = [
    [
        'user_id' => $c1StudentId,
        'type' => 'system',
        'message' => 'Welcome to Alumni Connect! Complete your profile to match with top mentors.',
        'is_read' => 0,
        'college_id' => 1
    ],
    [
        'user_id' => $c1AlumniId,
        'type' => 'system',
        'message' => 'Welcome back, Pooja! You have 3 new alumni connections in Bengaluru.',
        'is_read' => 0,
        'college_id' => 1
    ],
    [
        'user_id' => $c1AdminId,
        'type' => 'moderation',
        'message' => 'New moderation item submitted for review.',
        'is_read' => 0,
        'college_id' => 1
    ]
];
foreach ($notifs as $ntf) {
    $chkN = $pdo->prepare("SELECT id FROM notifications WHERE user_id = ? AND message = ?");
    $chkN->execute([$ntf['user_id'], $ntf['message']]);
    if (!$chkN->fetch()) {
        $ins = $pdo->prepare("INSERT INTO notifications (user_id, type, message, is_read, college_id) VALUES (?, ?, ?, ?, ?)");
        $ins->execute([$ntf['user_id'], $ntf['type'], $ntf['message'], $ntf['is_read'], $ntf['college_id']]);
    }
}

// 10. Badges & User Badges
$badges = [
    ['name' => 'Campus Pioneer', 'description' => 'Early adopter of the Alumni Connect platform.', 'icon' => 'award', 'points' => 50],
    ['name' => 'Distinguished Mentor', 'description' => 'Completed mentorship sessions with students.', 'icon' => 'star', 'points' => 100],
    ['name' => 'Community Champion', 'description' => 'Active contributor in campus community discussions.', 'icon' => 'heart', 'points' => 75],
];
foreach ($badges as $b) {
    $exists = $pdo->prepare("SELECT id FROM badges WHERE name = ?");
    $exists->execute([$b['name']]);
    if (!$exists->fetch()) {
        $ins = $pdo->prepare("INSERT INTO badges (name, description, icon, points) VALUES (?, ?, ?, ?)");
        $ins->execute([$b['name'], $b['description'], $b['icon'], $b['points']]);
    }
}
$b1Id = $pdo->query("SELECT id FROM badges LIMIT 1")->fetchColumn();
$studentId = $pdo->query("SELECT id FROM users WHERE email = 'student@alumni.test'")->fetchColumn();
if ($b1Id && $studentId) {
    $hasB = $pdo->prepare("SELECT id FROM user_badges WHERE user_id = ? AND badge_id = ?");
    $hasB->execute([$studentId, $b1Id]);
    if (!$hasB->fetch()) {
        $pdo->prepare("INSERT INTO user_badges (user_id, badge_id, college_id) VALUES (?, ?, 1)")->execute([$studentId, $b1Id]);
    }
}

// 11. User Settings
$allUsers = $pdo->query("SELECT id, college_id FROM users")->fetchAll(PDO::FETCH_OBJ);
foreach ($allUsers as $u) {
    $exists = $pdo->prepare("SELECT user_id FROM user_settings WHERE user_id = ?");
    $exists->execute([$u->id]);
    if (!$exists->fetch()) {
        $pdo->prepare("INSERT INTO user_settings (user_id, email_notifications, profile_visibility, college_id) VALUES (?, 1, 'public', ?)")->execute([$u->id, $u->college_id]);
    }
}

echo "Demo accounts and initial dataset successfully seeded!\n";
