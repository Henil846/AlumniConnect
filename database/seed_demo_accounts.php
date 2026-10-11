<?php
/**
 * Alumni Connect — Deterministic Rich Demo Data Seeder
 * 
 * Generates a realistic, deterministic multi-tenant dataset for local development:
 * - 4 Colleges (IIT Bombay, BITS Pilani, NIT Trichy, IIT Delhi)
 * - 44 Users across 4 roles (Super Admin, College Admins, Students, Alumni)
 *   All users share the deterministic password: Password123!
 * - 18 Jobs across multiple industries and salary tiers
 * - 12 Events (upcoming & past) with attendee registrations
 * - 22 Community Feed Posts with comments, likes, and poll options
 * - 14 Mentorship Sessions (pending, accepted, completed, cancelled)
 * - 12 Referral Requests spanning all 4 canonical statuses:
 *   (requested, reviewed, submitted, rejected)
 * - 4 Donation Campaigns with completed donation transactions
 * - 12 Marketplace Items
 * - 8 Alumni Businesses
 * - 6 Startups (Bootstrapped, Pre-seed, Seed, Series A)
 * - 6 Career Resources
 * - 6 Moderation Queue Reports (pending, resolved, dismissed)
 * - 4 Advertisements (active, disabled)
 * - User Badges and Notification triggers
 * 
 * GUARDS:
 * - Blocked if executed in production (APP_ENV=production).
 */

require_once __DIR__ . '/../app/Core/Env.php';
require_once __DIR__ . '/../app/Core/Database.php';

App\Core\Env::load(__DIR__ . '/../.env');

if (getenv('APP_ENV') === 'production' || ($_ENV['APP_ENV'] ?? '') === 'production') {
    fwrite(STDERR, "FATAL: Seed scripts and demo data generation are strictly disabled in production mode (APP_ENV=production).\n");
    exit(1);
}

$pdo = App\Core\Database::getConnection();

echo "=== Seeding Deterministic Rich Demo Data (DEV / TEST ONLY) ===\n";

$passHash = password_hash('Password123!', PASSWORD_BCRYPT);

// -------------------------------------------------------------
// 1. COLLEGES (4 institutions)
// -------------------------------------------------------------
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
        'name' => 'Birla Institute of Technology and Science, Pilani',
        'city' => 'Pilani',
        'state' => 'Rajasthan',
        'status' => 'active',
        'plan' => 'Growth',
        'slug' => 'bits-pilani'
    ],
    [
        'id' => 3,
        'name' => 'National Institute of Technology Trichy',
        'city' => 'Tiruchirappalli',
        'state' => 'Tamil Nadu',
        'status' => 'active',
        'plan' => 'Starter',
        'slug' => 'nit-trichy'
    ],
    [
        'id' => 4,
        'name' => 'Indian Institute of Technology Delhi',
        'city' => 'New Delhi',
        'state' => 'Delhi',
        'status' => 'active',
        'plan' => 'Growth',
        'slug' => 'iit-delhi'
    ]
];

foreach ($colleges as $c) {
    $stmt = $pdo->prepare("SELECT id FROM colleges WHERE id = ?");
    $stmt->execute([$c['id']]);
    if ($stmt->fetch()) {
        $up = $pdo->prepare("UPDATE colleges SET name = ?, city = ?, state = ?, status = ?, plan = ?, slug = ? WHERE id = ?");
        $up->execute([$c['name'], $c['city'], $c['state'], $c['status'], $c['plan'], $c['slug'], $c['id']]);
    } else {
        $ins = $pdo->prepare("INSERT INTO colleges (id, name, city, state, status, plan, slug) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $ins->execute([$c['id'], $c['name'], $c['city'], $c['state'], $c['status'], $c['plan'], $c['slug']]);
    }
}
echo "  [✓] 4 Colleges verified/updated\n";

// -------------------------------------------------------------
// 2. USERS (44 deterministic accounts)
// -------------------------------------------------------------
$users = [
    // --- Super Admin ---
    [
        'email' => 'superadmin@alumni.test',
        'full_name' => 'Antigravity SuperAdmin',
        'role' => 'super_admin',
        'college_id' => 1,
        'department' => 'Platform Operations',
        'industry' => 'SaaS Administration',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Global Platform Administrator with full institutional management access and billing analytics.',
        'skills' => json_encode(['Multi-Tenancy', 'Security Auditing', 'Billing', 'Analytics', 'System Architecture']),
        'linkedin' => 'https://linkedin.com/in/superadmin-alumni',
        'github' => 'https://github.com/superadmin'
    ],

    // --- College Admins (1 per college) ---
    [
        'email' => 'admin@alumni.test',
        'full_name' => 'Dean K. Sharma',
        'role' => 'college_admin',
        'college_id' => 1,
        'department' => 'Alumni Relations',
        'industry' => 'Higher Education',
        'location' => 'Mumbai, Maharashtra',
        'about_me' => 'Dean of Alumni Affairs and Corporate Relations at IIT Bombay.',
        'skills' => json_encode(['Administration', 'Endowments', 'Event Planning', 'Governance']),
        'linkedin' => 'https://linkedin.com/in/dean-sharma-iitb',
        'github' => null
    ],
    [
        'email' => 'admin2@alumni.test',
        'full_name' => 'Prof. S. Rangan',
        'role' => 'college_admin',
        'college_id' => 2,
        'department' => 'Alumni Relations',
        'industry' => 'Higher Education',
        'location' => 'Pilani, Rajasthan',
        'about_me' => 'Director of Institutional Development at BITS Pilani.',
        'skills' => json_encode(['Alumni Management', 'Mentorship Programs', 'Corporate Partnerships']),
        'linkedin' => 'https://linkedin.com/in/prof-rangan-bits',
        'github' => null
    ],
    [
        'email' => 'admin3@alumni.test',
        'full_name' => 'Dr. M. Sundaram',
        'role' => 'college_admin',
        'college_id' => 3,
        'department' => 'Training & Placement',
        'industry' => 'Higher Education',
        'location' => 'Tiruchirappalli, Tamil Nadu',
        'about_me' => 'Head of Corporate Alliances & Alumni Relations at NIT Trichy.',
        'skills' => json_encode(['Campus Placement', 'Alumni Outreach', 'Career Guidance']),
        'linkedin' => 'https://linkedin.com/in/dr-sundaram-nitt',
        'github' => null
    ],
    [
        'email' => 'admin4@alumni.test',
        'full_name' => 'Prof. Rajesh Verma',
        'role' => 'college_admin',
        'college_id' => 4,
        'department' => 'Alumni Affairs',
        'industry' => 'Higher Education',
        'location' => 'New Delhi, Delhi',
        'about_me' => 'Dean of External Relations at IIT Delhi.',
        'skills' => json_encode(['Alumni Relations', 'Fundraising', 'Industry Collaborations']),
        'linkedin' => 'https://linkedin.com/in/prof-verma-iitd',
        'github' => null
    ],

    // --- College 1: Students (10 students) ---
    [
        'email' => 'student@alumni.test',
        'full_name' => 'Aarav Patel',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Computer Science',
        'industry' => 'Software & Internet',
        'location' => 'Mumbai, Maharashtra',
        'about_me' => '3rd-year CS undergrad passionate about distributed systems, backend engineering, and cloud platforms.',
        'skills' => json_encode(['Python', 'PHP', 'Go', 'Docker', 'PostgreSQL', 'Kubernetes']),
        'linkedin' => 'https://linkedin.com/in/aarav-patel-iitb',
        'github' => 'https://github.com/aaravpatel'
    ],
    [
        'email' => 'ananya.sharma@iitb.test',
        'full_name' => 'Ananya Sharma',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Electrical Engineering',
        'industry' => 'Semiconductors',
        'location' => 'Mumbai, Maharashtra',
        'about_me' => 'Final-year EE major researching digital signal processing and FPGA accelerators.',
        'skills' => json_encode(['Verilog', 'SystemVerilog', 'MATLAB', 'C++', 'FPGA']),
        'linkedin' => 'https://linkedin.com/in/ananya-sharma-iitb',
        'github' => 'https://github.com/ananyasharma'
    ],
    [
        'email' => 'rohit.verma@iitb.test',
        'full_name' => 'Rohit Verma',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Mechanical Engineering',
        'industry' => 'Robotics',
        'location' => 'Pune, Maharashtra',
        'about_me' => 'Robotics Club Lead at IIT Bombay, building autonomous quadrupeds.',
        'skills' => json_encode(['ROS2', 'SolidWorks', 'Python', 'Kinematics', 'Computer Vision']),
        'linkedin' => 'https://linkedin.com/in/rohit-verma-robotics',
        'github' => 'https://github.com/rohitverma'
    ],
    [
        'email' => 'sneha.deshmukh@iitb.test',
        'full_name' => 'Sneha Deshmukh',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Chemical Engineering',
        'industry' => 'CleanTech',
        'location' => 'Nagpur, Maharashtra',
        'about_me' => 'Undergrad working on green hydrogen energy catalysts and sustainable membranes.',
        'skills' => json_encode(['Aspen Plus', 'Data Analysis', 'Process Simulation', 'Python']),
        'linkedin' => 'https://linkedin.com/in/sneha-deshmukh',
        'github' => null
    ],
    [
        'email' => 'karan.malhotra@iitb.test',
        'full_name' => 'Karan Malhotra',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Computer Science',
        'industry' => 'Artificial Intelligence',
        'location' => 'New Delhi, Delhi',
        'about_me' => '2nd-year CS enthusiast focusing on generative models, LLM fine-tuning, and NLP.',
        'skills' => json_encode(['PyTorch', 'Transformers', 'FastAPI', 'Python', 'Vector DBs']),
        'linkedin' => 'https://linkedin.com/in/karan-malhotra-ai',
        'github' => 'https://github.com/karanmalhotra'
    ],
    [
        'email' => 'ishita.sen@iitb.test',
        'full_name' => 'Ishita Sen',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Aerospace Engineering',
        'industry' => 'Space Technology',
        'location' => 'Kolkata, West Bengal',
        'about_me' => 'Student satellite team lead designing telemetry payloads and orbital mechanics simulations.',
        'skills' => json_encode(['Orbital Mechanics', 'C++', 'Python', 'Simulink', 'CAD']),
        'linkedin' => 'https://linkedin.com/in/ishita-sen-aero',
        'github' => null
    ],
    [
        'email' => 'aditya.nair@iitb.test',
        'full_name' => 'Aditya Nair',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Civil Engineering',
        'industry' => 'Infrastructure',
        'location' => 'Kochi, Kerala',
        'about_me' => 'Interested in smart city infrastructure modeling, GIS, and structural health monitoring.',
        'skills' => json_encode(['GIS', 'AutoCAD', 'Structural Analysis', 'Python']),
        'linkedin' => 'https://linkedin.com/in/aditya-nair-civil',
        'github' => null
    ],
    [
        'email' => 'diya.banerjee@iitb.test',
        'full_name' => 'Diya Banerjee',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Metallurgical Engineering',
        'industry' => 'Advanced Materials',
        'location' => 'Hyderabad, Telangana',
        'about_me' => 'Exploring high-entropy alloys for aerospace thermal protection systems.',
        'skills' => json_encode(['Material Characterization', 'SEM/TEM', 'Python', 'X-ray Diffraction']),
        'linkedin' => 'https://linkedin.com/in/diya-banerjee',
        'github' => null
    ],
    [
        'email' => 'varun.joshi@iitb.test',
        'full_name' => 'Varun Joshi',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Computer Science',
        'industry' => 'FinTech',
        'location' => 'Ahmedabad, Gujarat',
        'about_me' => 'Competitive programmer (Codeforces Candidate Master) and systems enthusiast.',
        'skills' => json_encode(['Algorithms', 'C++', 'Data Structures', 'Linux Systems']),
        'linkedin' => 'https://linkedin.com/in/varun-joshi-cs',
        'github' => 'https://github.com/varunjoshi'
    ],
    [
        'email' => 'tanvi.kulkarni@iitb.test',
        'full_name' => 'Tanvi Kulkarni',
        'role' => 'student',
        'college_id' => 1,
        'department' => 'Biosciences & Bioengineering',
        'industry' => 'BioTech',
        'location' => 'Nashik, Maharashtra',
        'about_me' => 'Computational biology researcher analyzing RNA sequencing datasets with ML pipelines.',
        'skills' => json_encode(['Bioinformatics', 'R', 'Python', 'Nextflow', 'Genomics']),
        'linkedin' => 'https://linkedin.com/in/tanvi-kulkarni-bio',
        'github' => null
    ],

    // --- College 2: Students (6 students) ---
    [
        'email' => 'student2@alumni.test',
        'full_name' => 'Rohan Mehta',
        'role' => 'student',
        'college_id' => 2,
        'department' => 'Electrical Engineering',
        'industry' => 'Hardware & Embedded',
        'location' => 'Pilani, Rajasthan',
        'about_me' => 'BITS Pilani sophomore building smart IoT sensor nodes and firmware drivers.',
        'skills' => json_encode(['C++', 'Verilog', 'FreeRTOS', 'KiCAD', 'ARM Cortex']),
        'linkedin' => 'https://linkedin.com/in/rohanmehta-bits',
        'github' => 'https://github.com/rohanmehta'
    ],
    [
        'email' => 'neha.gupta@bits.test',
        'full_name' => 'Neha Gupta',
        'role' => 'student',
        'college_id' => 2,
        'department' => 'Computer Science',
        'industry' => 'Full-Stack Web',
        'location' => 'Jaipur, Rajasthan',
        'about_me' => 'Active open-source contributor in React and TypeScript ecosystems.',
        'skills' => json_encode(['TypeScript', 'React', 'Node.js', 'PostgreSQL', 'TailwindCSS']),
        'linkedin' => 'https://linkedin.com/in/neha-gupta-bits',
        'github' => 'https://github.com/nehagupta'
    ],
    [
        'email' => 'siddharth.rao@bits.test',
        'full_name' => 'Siddharth Rao',
        'role' => 'student',
        'college_id' => 2,
        'department' => 'Mechanical Engineering',
        'industry' => 'Automotive',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Formula Student BITS race team suspension lead.',
        'skills' => json_encode(['ANSYS', 'CATIA', 'Dynamics Simulation', 'MATLAB']),
        'linkedin' => 'https://linkedin.com/in/siddharth-rao-bits',
        'github' => null
    ],
    [
        'email' => 'prachi.singh@bits.test',
        'full_name' => 'Prachi Singh',
        'role' => 'student',
        'college_id' => 2,
        'department' => 'Economics & Computer Science',
        'industry' => 'Quantitative Finance',
        'location' => 'Lucknow, Uttar Pradesh',
        'about_me' => 'Dual degree major interested in econometric modeling and algorithmic trading.',
        'skills' => json_encode(['Python', 'Stata', 'Quantitative Modeling', 'Pandas', 'SQL']),
        'linkedin' => 'https://linkedin.com/in/prachi-singh-bits',
        'github' => null
    ],
    [
        'email' => 'manish.tiwari@bits.test',
        'full_name' => 'Manish Tiwari',
        'role' => 'student',
        'college_id' => 2,
        'department' => 'Chemical Engineering',
        'industry' => 'Process Automation',
        'location' => 'Kanpur, Uttar Pradesh',
        'about_me' => 'Working on battery recycling chemistry and continuous reactor design.',
        'skills' => json_encode(['Process Engineering', 'Safety Analysis', 'MATLAB']),
        'linkedin' => 'https://linkedin.com/in/manish-tiwari-bits',
        'github' => null
    ],
    [
        'email' => 'ritika.patil@bits.test',
        'full_name' => 'Ritika Patil',
        'role' => 'student',
        'college_id' => 2,
        'department' => 'Civil Engineering',
        'industry' => 'Urban Planning',
        'location' => 'Indore, Madhya Pradesh',
        'about_me' => 'Studying water distribution network modeling and GIS optimization.',
        'skills' => json_encode(['EPANET', 'GIS', 'AutoCAD', 'Urban Design']),
        'linkedin' => 'https://linkedin.com/in/ritika-patil-bits',
        'github' => null
    ],

    // --- College 3: Students (3 students) ---
    [
        'email' => 'kavya.ramakrishnan@nitt.test',
        'full_name' => 'Kavya Ramakrishnan',
        'role' => 'student',
        'college_id' => 3,
        'department' => 'Instrumentation & Control',
        'industry' => 'Industrial Automation',
        'location' => 'Chennai, Tamil Nadu',
        'about_me' => 'Passionate about SCADA systems, PLC programming, and sensor fusion.',
        'skills' => json_encode(['PLC', 'LabVIEW', 'Control Systems', 'C']),
        'linkedin' => 'https://linkedin.com/in/kavya-ramakrishnan',
        'github' => null
    ],
    [
        'email' => 'arjun.menon@nitt.test',
        'full_name' => 'Arjun Menon',
        'role' => 'student',
        'college_id' => 3,
        'department' => 'Computer Science',
        'industry' => 'Cybersecurity',
        'location' => 'Kozhikode, Kerala',
        'about_me' => 'CTF player and security researcher specializing in binary exploitation and web application testing.',
        'skills' => json_encode(['Network Security', 'Ghidra', 'Python', 'Linux Kernel', 'Burp Suite']),
        'linkedin' => 'https://linkedin.com/in/arjun-menon-sec',
        'github' => 'https://github.com/arjunmenon'
    ],
    [
        'email' => 'deepak.selvam@nitt.test',
        'full_name' => 'Deepak Selvam',
        'role' => 'student',
        'college_id' => 3,
        'department' => 'Production Engineering',
        'industry' => 'Manufacturing',
        'location' => 'Madurai, Tamil Nadu',
        'about_me' => 'Interested in lean manufacturing, Six Sigma methodologies, and digital twins.',
        'skills' => json_encode(['Lean', 'Six Sigma', 'CNC Programming', 'SolidWorks']),
        'linkedin' => 'https://linkedin.com/in/deepak-selvam',
        'github' => null
    ],

    // --- College 4: Students (3 students) ---
    [
        'email' => 'priya.choudhary@iitd.test',
        'full_name' => 'Priya Choudhary',
        'role' => 'student',
        'college_id' => 4,
        'department' => 'Computer Science',
        'industry' => 'Machine Learning',
        'location' => 'New Delhi, Delhi',
        'about_me' => 'Junior CS major working on computer vision for autonomous drone navigation.',
        'skills' => json_encode(['PyTorch', 'OpenCV', 'Python', 'C++', 'Deep Learning']),
        'linkedin' => 'https://linkedin.com/in/priya-choudhary-iitd',
        'github' => 'https://github.com/priyachoudhary'
    ],
    [
        'email' => 'vikram.kapoor@iitd.test',
        'full_name' => 'Vikram Kapoor',
        'role' => 'student',
        'college_id' => 4,
        'department' => 'Mathematics & Computing',
        'industry' => 'FinTech & Cryptography',
        'location' => 'Gurugram, Haryana',
        'about_me' => 'Exploring zero-knowledge proofs, cryptography, and high-frequency trading data structures.',
        'skills' => json_encode(['Number Theory', 'Rust', 'C++', 'Python', 'Applied Cryptography']),
        'linkedin' => 'https://linkedin.com/in/vikram-kapoor-iitd',
        'github' => 'https://github.com/vikramkapoor'
    ],
    [
        'email' => 'shreya.pandey@iitd.test',
        'full_name' => 'Shreya Pandey',
        'role' => 'student',
        'college_id' => 4,
        'department' => 'Textile Technology',
        'industry' => 'Smart Textiles & Nano-composites',
        'location' => 'Noida, Uttar Pradesh',
        'about_me' => 'Working on conductive wearable smart textiles and biomedical sensing fabrics.',
        'skills' => json_encode(['Polymer Chemistry', 'Wearables', 'Material Science']),
        'linkedin' => 'https://linkedin.com/in/shreya-pandey-iitd',
        'github' => null
    ],

    // --- College 1: Alumni (10 alumni) ---
    [
        'email' => 'alumni@alumni.test',
        'full_name' => 'Pooja Iyer',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Computer Science',
        'industry' => 'Cloud Platforms & Distributed Systems',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Staff Software Engineer at Microsoft. Class of 2019. Passionate about mentoring students and giving job referrals.',
        'skills' => json_encode(['Distributed Systems', 'Go', 'Kubernetes', 'Cloud Architecture', 'Mentorship']),
        'linkedin' => 'https://linkedin.com/in/poojaiyer',
        'github' => 'https://github.com/poojaiyer'
    ],
    [
        'email' => 'rahul.mehra@alumni.test',
        'full_name' => 'Rahul Mehra',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Computer Science',
        'industry' => 'FinTech & Payments',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'VP of Product at Razorpay. Class of 2016. Angel investor and product management coach.',
        'skills' => json_encode(['Product Strategy', 'FinTech', 'User Growth', 'Mentorship', 'Leadership']),
        'linkedin' => 'https://linkedin.com/in/rahul-mehra-razorpay',
        'github' => null
    ],
    [
        'email' => 'divya.krishnan@alumni.test',
        'full_name' => 'Divya Krishnan',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Computer Science',
        'industry' => 'Artificial Intelligence',
        'location' => 'Hyderabad, Telangana',
        'about_me' => 'Principal Engineer at Google India. Class of 2018. Leading LLM serving optimization teams.',
        'skills' => json_encode(['Large Language Models', 'TensorFlow', 'High-Performance Computing', 'C++']),
        'linkedin' => 'https://linkedin.com/in/divya-krishnan-google',
        'github' => 'https://github.com/divyakrishnan'
    ],
    [
        'email' => 'sameer.kulkarni@alumni.test',
        'full_name' => 'Sameer Kulkarni',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Electrical Engineering',
        'industry' => 'Venture & Startups',
        'location' => 'Mumbai, Maharashtra',
        'about_me' => 'Co-Founder & CTO at FintechLabs (Acquired). Class of 2015. Always glad to review student pitches.',
        'skills' => json_encode(['Startup Incubation', 'Venture Capital', 'Architecture', 'Team Scaling']),
        'linkedin' => 'https://linkedin.com/in/sameer-kulkarni-founder',
        'github' => 'https://github.com/sameerkulkarni'
    ],
    [
        'email' => 'meera.joshi@alumni.test',
        'full_name' => 'Meera Joshi',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Mechanical Engineering',
        'industry' => 'E-Commerce Analytics',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Senior Data Scientist at Flipkart. Class of 2020. Specializing in recommendation systems.',
        'skills' => json_encode(['Recommendation Systems', 'Python', 'Spark', 'SQL', 'A/B Testing']),
        'linkedin' => 'https://linkedin.com/in/meera-joshi-data',
        'github' => null
    ],
    [
        'email' => 'ashwin.swaminathan@alumni.test',
        'full_name' => 'Ashwin Swaminathan',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Civil Engineering',
        'industry' => 'Venture Capital',
        'location' => 'Mumbai, Maharashtra',
        'about_me' => 'Investment Director at Peak XV Partners. Class of 2014. Focused on Indian enterprise SaaS.',
        'skills' => json_encode(['Venture Capital', 'Due Diligence', 'FinTech', 'SaaS Metrics']),
        'linkedin' => 'https://linkedin.com/in/ashwin-swaminathan-vc',
        'github' => null
    ],
    [
        'email' => 'radhika.desai@alumni.test',
        'full_name' => 'Radhika Desai',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Computer Science',
        'industry' => 'Logistics & Quick Commerce',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Engineering Manager at Swiggy. Class of 2017. Leading rider dispatch routing engines.',
        'skills' => json_encode(['Engineering Management', 'System Design', 'Kafka', 'Java', 'Microservices']),
        'linkedin' => 'https://linkedin.com/in/radhika-desai-swiggy',
        'github' => null
    ],
    [
        'email' => 'nilesh.bhat@alumni.test',
        'full_name' => 'Nilesh Bhat',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Electrical Engineering',
        'industry' => 'Semiconductor Design',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Hardware Architect at Qualcomm India. Class of 2019. Snapdragon low-power sub-systems.',
        'skills' => json_encode(['SoC Architecture', 'Verilog', 'VLSI Design', 'ARM']),
        'linkedin' => 'https://linkedin.com/in/nilesh-bhat-qualcomm',
        'github' => null
    ],
    [
        'email' => 'akash.saxena@alumni.test',
        'full_name' => 'Akash Saxena',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Computer Science',
        'industry' => 'FinTech & Mobile',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Frontend Tech Lead at PhonePe. Class of 2021. React Native and mobile performance specialist.',
        'skills' => json_encode(['React Native', 'TypeScript', 'Mobile Performance', 'JavaScript']),
        'linkedin' => 'https://linkedin.com/in/akash-saxena-phonepe',
        'github' => 'https://github.com/akashsaxena'
    ],
    [
        'email' => 'zoya.khan@alumni.test',
        'full_name' => 'Zoya Khan',
        'role' => 'alumni',
        'college_id' => 1,
        'department' => 'Chemical Engineering',
        'industry' => 'E-Commerce Operations',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Director of Supply Chain & Fulfillment at Meesho. Class of 2018.',
        'skills' => json_encode(['Supply Chain', 'Operations', 'Process Optimization', 'Analytics']),
        'linkedin' => 'https://linkedin.com/in/zoya-khan-meesho',
        'github' => null
    ],

    // --- College 2: Alumni (5 alumni) ---
    [
        'email' => 'alumni2@alumni.test',
        'full_name' => 'Ananya Verma',
        'role' => 'alumni',
        'college_id' => 2,
        'department' => 'Mechanical Engineering',
        'industry' => 'Electric Mobility',
        'location' => 'Pune, Maharashtra',
        'about_me' => 'Senior EV Powertrain Lead at Tata Motors. Class of 2018. BITS Pilani Alum.',
        'skills' => json_encode(['EV Powertrain', 'Battery Management', 'Thermal Modeling', 'Mentorship']),
        'linkedin' => 'https://linkedin.com/in/ananyaverma-ev',
        'github' => null
    ],
    [
        'email' => 'harsh.vardhan@bitsalum.test',
        'full_name' => 'Harsh Vardhan',
        'role' => 'alumni',
        'college_id' => 2,
        'department' => 'Electrical Engineering',
        'industry' => 'CleanTech Startups',
        'location' => 'Gurugram, Haryana',
        'about_me' => 'Founder & CEO at SolarGrid AI. Class of 2016. Building autonomous microgrid balancing software.',
        'skills' => json_encode(['CleanTech', 'Entrepreneurship', 'Smart Grids', 'Fundraising']),
        'linkedin' => 'https://linkedin.com/in/harsh-vardhan-solar',
        'github' => null
    ],
    [
        'email' => 'kriti.agarwal@bitsalum.test',
        'full_name' => 'Kriti Agarwal',
        'role' => 'alumni',
        'college_id' => 2,
        'department' => 'Computer Science',
        'industry' => 'Design & UX',
        'location' => 'Bengaluru, Karnataka',
        'about_me' => 'Lead Product Designer at CRED. Class of 2020. Specializing in frictionless financial micro-interactions.',
        'skills' => json_encode(['Figma', 'Product Design', 'Design Systems', 'UX Research']),
        'linkedin' => 'https://linkedin.com/in/kriti-agarwal-cred',
        'github' => null
    ],
    [
        'email' => 'vivek.nambiar@bitsalum.test',
        'full_name' => 'Vivek Nambiar',
        'role' => 'alumni',
        'college_id' => 2,
        'department' => 'Computer Science',
        'industry' => 'Cloud Security',
        'location' => 'Hyderabad, Telangana',
        'about_me' => 'Principal Security Architect at AWS India. Class of 2017.',
        'skills' => json_encode(['AWS Security', 'Zero Trust', 'Cloud Compliance', 'DevSecOps']),
        'linkedin' => 'https://linkedin.com/in/vivek-nambiar-aws',
        'github' => null
    ],
    [
        'email' => 'pallavi.shukla@bitsalum.test',
        'full_name' => 'Pallavi Shukla',
        'role' => 'alumni',
        'college_id' => 2,
        'department' => 'Economics & Mathematics',
        'industry' => 'Quantitative Trading',
        'location' => 'Gurugram, Haryana',
        'about_me' => 'Quantitative Strategist at Tower Research Capital. Class of 2019.',
        'skills' => json_encode(['Statistical Arbitrage', 'C++', 'Python', 'Time Series Analysis']),
        'linkedin' => 'https://linkedin.com/in/pallavi-shukla-quant',
        'github' => null
    ],

    // --- College 3: Alumni (2 alumni) ---
    [
        'email' => 'suresh.kannan@nittalum.test',
        'full_name' => 'Suresh Kannan',
        'role' => 'alumni',
        'college_id' => 3,
        'department' => 'Computer Science',
        'industry' => 'SaaS Software',
        'location' => 'Chennai, Tamil Nadu',
        'about_me' => 'Director of Engineering at Freshworks. Class of 2015. Leading Customer Service Cloud platforms.',
        'skills' => json_encode(['SaaS Architecture', 'Engineering Leadership', 'Ruby on Rails', 'AWS']),
        'linkedin' => 'https://linkedin.com/in/suresh-kannan-freshworks',
        'github' => null
    ],
    [
        'email' => 'lakshmi.narayan@nittalum.test',
        'full_name' => 'Lakshmi Narayan',
        'role' => 'alumni',
        'college_id' => 3,
        'department' => 'Mechanical Engineering',
        'industry' => 'Enterprise Platforms',
        'location' => 'Tenkasi, Tamil Nadu',
        'about_me' => 'Head of Supply Chain Products at Zoho. Class of 2017.',
        'skills' => json_encode(['Enterprise Applications', 'Product Management', 'Supply Chain']),
        'linkedin' => 'https://linkedin.com/in/lakshmi-narayan-zoho',
        'github' => null
    ],

    // --- College 4: Alumni (2 alumni) ---
    [
        'email' => 'tarun.oberoi@iitdalum.test',
        'full_name' => 'Tarun Oberoi',
        'role' => 'alumni',
        'college_id' => 4,
        'department' => 'Mechanical Engineering',
        'industry' => 'Management Consulting',
        'location' => 'New Delhi, Delhi',
        'about_me' => 'Partner at Bain & Company. Class of 2013. Advising PE funds and tech conglomerates across APAC.',
        'skills' => json_encode(['Corporate Strategy', 'M&A', 'Private Equity', 'Due Diligence']),
        'linkedin' => 'https://linkedin.com/in/tarun-oberoi-bain',
        'github' => null
    ],
    [
        'email' => 'anjali.bhargava@iitdalum.test',
        'full_name' => 'Anjali Bhargava',
        'role' => 'alumni',
        'college_id' => 4,
        'department' => 'Computer Science',
        'industry' => 'Artificial Intelligence & Search',
        'location' => 'Gurugram, Haryana',
        'about_me' => 'Head of Machine Learning Research at Zomato. Class of 2018.',
        'skills' => json_encode(['Machine Learning', 'Search & Ranking', 'GenAI', 'PyTorch']),
        'linkedin' => 'https://linkedin.com/in/anjali-bhargava-zomato',
        'github' => null
    ]
];

$userMap = [];
foreach ($users as $u) {
    $existing = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $existing->execute([$u['email']]);
    $row = $existing->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $up = $pdo->prepare("UPDATE users SET full_name = ?, password = ?, role = ?, college_id = ?, is_verified = 1, department = ?, industry = ?, location = ?, about_me = ?, skills = ?, linkedin = ?, github = ?, status = 'active' WHERE id = ?");
        $up->execute([$u['full_name'], $passHash, $u['role'], $u['college_id'], $u['department'], $u['industry'], $u['location'], $u['about_me'], $u['skills'], $u['linkedin'], $u['github'], $row['id']]);
        $userMap[$u['email']] = (int)$row['id'];
    } else {
        $ins = $pdo->prepare("INSERT INTO users (full_name, email, password, role, college_id, is_verified, department, industry, location, about_me, skills, linkedin, github, status) VALUES (?, ?, ?, ?, ?, 1, ?, ?, ?, ?, ?, ?, ?, 'active')");
        $ins->execute([$u['full_name'], $u['email'], $passHash, $u['role'], $u['college_id'], $u['department'], $u['industry'], $u['location'], $u['about_me'], $u['skills'], $u['linkedin'], $u['github']]);
        $userMap[$u['email']] = (int)$pdo->lastInsertId();
    }
}
echo "  [✓] " . count($users) . " Deterministic users verified/updated (all passwords set to Password123!)\n";

$c1StudentId = $userMap['student@alumni.test'];
$c1AlumniId = $userMap['alumni@alumni.test'];
$c1AdminId = $userMap['admin@alumni.test'];
$c2StudentId = $userMap['student2@alumni.test'];
$c2AlumniId = $userMap['alumni2@alumni.test'];
$c2AdminId = $userMap['admin2@alumni.test'];
$c3StudentId = $userMap['kavya.ramakrishnan@nitt.test'];
$c3AlumniId = $userMap['suresh.kannan@nittalum.test'];
$c4StudentId = $userMap['priya.choudhary@iitd.test'];
$c4AlumniId = $userMap['anjali.bhargava@iitdalum.test'];

// -------------------------------------------------------------
// 3. JOBS (18 listings across College 1 and College 2)
// -------------------------------------------------------------
$jobs = [
    // College 1
    [
        'title' => 'Senior Backend Engineer (Distributed Systems)',
        'company' => 'Microsoft India',
        'location' => 'Bengaluru, Karnataka (Hybrid)',
        'industry' => 'Engineering',
        'type' => 'Full-time',
        'salary_range' => '₹34,00,000 - ₹52,00,000',
        'description' => 'Scale Azure high-throughput telemetry pipelines handling over 10M events per second with sub-50ms latency.',
        'requirements' => '4+ years backend development in Go, C#, or Java. In-depth understanding of distributed consensus, Kafka, and ACID properties.',
        'college_id' => 1
    ],
    [
        'title' => 'Product Management Associate',
        'company' => 'Zomato',
        'location' => 'Gurugram, Haryana (On-site)',
        'industry' => 'Product Design',
        'type' => 'Full-time',
        'salary_range' => '₹18,00,000 - ₹24,00,000',
        'description' => 'Drive quick-commerce search and catalog discoverability pods to enhance conversion and cart value.',
        'requirements' => '1-3 years experience in product analytics, UX optimization, or consulting. Strong analytical chops in SQL and Mixpanel.',
        'college_id' => 1
    ],
    [
        'title' => 'Staff Machine Learning Infrastructure Engineer',
        'company' => 'Google India',
        'location' => 'Hyderabad, Telangana (Hybrid)',
        'industry' => 'Artificial Intelligence',
        'type' => 'Full-time',
        'salary_range' => '₹48,00,000 - ₹68,00,000',
        'description' => 'Build high-performance GPU serving clusters and low-latency KV caches for Gemini inference in production.',
        'requirements' => '6+ years in distributed systems or ML infra. Deep expertise in CUDA kernels, vLLM/TensorRT-LLM, and cluster schedulers.',
        'college_id' => 1
    ],
    [
        'title' => 'Staff Full-Stack Engineer',
        'company' => 'Razorpay',
        'location' => 'Bengaluru, Karnataka (Hybrid)',
        'industry' => 'FinTech',
        'type' => 'Full-time',
        'salary_range' => '₹36,00,000 - ₹54,00,000',
        'description' => 'Architect merchant onboarding workflows and multi-currency checkout gateways with 99.999% uptime guarantees.',
        'requirements' => '5+ years experience building highly concurrent web platforms with Go, PHP, or Node.js and modern frontend frameworks.',
        'college_id' => 1
    ],
    [
        'title' => 'Quantitative Research Analyst',
        'company' => 'AlphaGrep Securities',
        'location' => 'Mumbai, Maharashtra (On-site)',
        'industry' => 'Finance',
        'type' => 'Full-time',
        'salary_range' => '₹38,00,000 - ₹65,00,000',
        'description' => 'Develop statistical arbitrage signals and automated market making models across global equity derivatives.',
        'requirements' => 'B.Tech/Dual degree in CS, EE, or Mathematics. Stellar mathematical modeling skills and mastery of modern C++ / Python.',
        'college_id' => 1
    ],
    [
        'title' => 'Senior Product Designer',
        'company' => 'Swiggy',
        'location' => 'Bengaluru, Karnataka (Hybrid)',
        'industry' => 'Product Design',
        'type' => 'Full-time',
        'salary_range' => '₹22,00,000 - ₹34,00,000',
        'description' => 'Lead consumer experience design for Swiggy Instamart and dine-out reservation features across mobile applications.',
        'requirements' => '3+ years product design experience. Strong portfolio demonstrating complex mobile user flows and design systems.',
        'college_id' => 1
    ],
    [
        'title' => 'Cloud Solutions Architect',
        'company' => 'Amazon Web Services (AWS)',
        'location' => 'Mumbai, Maharashtra (Hybrid)',
        'industry' => 'Cloud Platforms',
        'type' => 'Full-time',
        'salary_range' => '₹32,00,000 - ₹46,00,000',
        'description' => 'Partner with Indian unicorns to architect resilient, scalable multi-region architectures on AWS cloud infrastructure.',
        'requirements' => 'AWS Certified Solutions Architect Professional. Deep knowledge of microservices, serverless, and cloud cost optimization.',
        'college_id' => 1
    ],
    [
        'title' => 'Senior Data Analyst (Growth Pod)',
        'company' => 'Flipkart',
        'location' => 'Bengaluru, Karnataka (On-site)',
        'industry' => 'E-Commerce',
        'type' => 'Full-time',
        'salary_range' => '₹16,00,000 - ₹26,00,000',
        'description' => 'Analyze Big Billion Days traffic funnels, customer cohort retention, and promotional attribution models.',
        'requirements' => '2-4 years experience in consumer internet analytics. Mastery of SQL, Python, Tableau, and causal inference techniques.',
        'college_id' => 1
    ],
    [
        'title' => 'Frontend Software Engineer',
        'company' => 'PhonePe',
        'location' => 'Bengaluru, Karnataka (Hybrid)',
        'industry' => 'FinTech',
        'type' => 'Full-time',
        'salary_range' => '₹22,00,000 - ₹32,00,000',
        'description' => 'Create snappy, lightweight React Native payment widgets deployed to over 400M registered users nationwide.',
        'requirements' => '2+ years frontend development experience. Strong command of JavaScript/TypeScript, WebSockets, and CSS performance.',
        'college_id' => 1
    ],
    [
        'title' => 'Associate Consultant — Tech & Strategy',
        'company' => 'McKinsey & Company',
        'location' => 'Mumbai, Maharashtra (On-site)',
        'industry' => 'Consulting',
        'type' => 'Full-time',
        'salary_range' => '₹25,00,000 - ₹35,00,000',
        'description' => 'Advise C-level executives on AI transformations, cloud modernization, and digital operating models.',
        'requirements' => 'Top engineering graduates with demonstrated leadership, strong communication, and strategic problem-solving skills.',
        'college_id' => 1
    ],

    // College 2
    [
        'title' => 'Embedded Systems & Firmware Engineer',
        'company' => 'Ather Energy',
        'location' => 'Bengaluru, Karnataka (On-site)',
        'industry' => 'Hardware',
        'type' => 'Full-time',
        'salary_range' => '₹20,00,000 - ₹30,00,000',
        'description' => 'Design battery management system (BMS) firmware and CAN bus telemetry for next-gen electric two-wheelers.',
        'requirements' => 'Proficiency in C/C++, RTOS, CAN bus protocols, microcontrollers, and hardware oscilloscope debugging.',
        'college_id' => 2
    ],
    [
        'title' => 'Senior EV Powertrain Thermal Engineer',
        'company' => 'Tata Motors Electric',
        'location' => 'Pune, Maharashtra (On-site)',
        'industry' => 'Automotive',
        'type' => 'Full-time',
        'salary_range' => '₹22,00,000 - ₹34,00,000',
        'description' => 'Thermal simulation and fluid dynamics modeling for high-voltage battery packs in fast-charging conditions.',
        'requirements' => 'Degree in Mechanical/Thermal Engineering. 3+ years experience with CFD analysis tools and EV battery packs.',
        'college_id' => 2
    ],
    [
        'title' => 'Security Operations & DevSecOps Engineer',
        'company' => 'CRED',
        'location' => 'Bengaluru, Karnataka (Hybrid)',
        'industry' => 'FinTech',
        'type' => 'Full-time',
        'salary_range' => '₹26,00,000 - ₹40,00,000',
        'description' => 'Protect high-trust payment architectures with automated vulnerability scanning, container security, and IAM hardening.',
        'requirements' => 'Strong experience with AWS Security Hub, Kubernetes CIS benchmarks, Terraform, and red team/blue team methodologies.',
        'college_id' => 2
    ],
    [
        'title' => 'Deep Learning Research Scientist',
        'company' => 'Intel India Labs',
        'location' => 'Bengaluru, Karnataka (Hybrid)',
        'industry' => 'Semiconductors',
        'type' => 'Full-time',
        'salary_range' => '₹30,00,000 - ₹48,00,000',
        'description' => 'Optimize quantized transformer inference for next-generation Intel Gaudi and Core Ultra silicon architectures.',
        'requirements' => 'M.Tech/PhD or equivalent research in deep learning quantization, pruning, and OpenVINO optimization frameworks.',
        'college_id' => 2
    ],
    [
        'title' => 'Hardware Verification Engineer',
        'company' => 'Texas Instruments',
        'location' => 'Bengaluru, Karnataka (On-site)',
        'industry' => 'Hardware',
        'type' => 'Full-time',
        'salary_range' => '₹22,00,000 - ₹35,00,000',
        'description' => 'Write UVM testbenches and SystemVerilog assertions for ultra-low-power mixed-signal microcontroller cores.',
        'requirements' => '2+ years in ASIC verification. Strong background in SystemVerilog, UVM, and coverage-driven verification.',
        'college_id' => 2
    ],
    [
        'title' => 'Growth & Monetization Manager',
        'company' => 'InMobi',
        'location' => 'Bengaluru, Karnataka (Hybrid)',
        'industry' => 'AdTech',
        'type' => 'Full-time',
        'salary_range' => '₹24,00,000 - ₹36,00,000',
        'description' => 'Lead programmatic ad mediation yield optimization and publisher monetization strategies across global markets.',
        'requirements' => '3+ years in digital advertising, performance marketing, or publisher growth. Deep familiarity with SSP/DSP ecosystems.',
        'college_id' => 2
    ],
    [
        'title' => 'Autonomous Grid Systems Software Intern',
        'company' => 'SolarGrid AI',
        'location' => 'Gurugram, Haryana (Remote/Hybrid)',
        'industry' => 'CleanTech',
        'type' => 'Internship',
        'salary_range' => '₹8,00,000 - ₹12,00,000',
        'description' => 'Build time-series forecasting pipelines for distributed solar generation and battery charging schedules.',
        'requirements' => 'Current pre-final/final year student in EE, CS, or Data Science. Proficiency with Python, Scikit-learn, and time-series.',
        'college_id' => 2
    ],
    [
        'title' => 'Site Reliability Engineer (Core Services)',
        'company' => 'Atlassian India',
        'location' => 'Bengaluru, Karnataka (Remote)',
        'industry' => 'Cloud Platforms',
        'type' => 'Full-time',
        'salary_range' => '₹28,00,000 - ₹42,00,000',
        'description' => 'Ensure five-nines availability and automated disaster recovery for Jira and Confluence cloud backends.',
        'requirements' => '3+ years SRE experience. Expertise in Terraform, observability (OpenTelemetry/Datadog), and automated runbook execution.',
        'college_id' => 2
    ]
];

foreach ($jobs as $jb) {
    $stmt = $pdo->prepare("SELECT id FROM jobs WHERE title = ? AND college_id = ?");
    $stmt->execute([$jb['title'], $jb['college_id']]);
    if (!$stmt->fetch()) {
        $ins = $pdo->prepare("INSERT INTO jobs (title, company, location, industry, type, salary_range, description, requirements, college_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'active')");
        $ins->execute([$jb['title'], $jb['company'], $jb['location'], $jb['industry'], $jb['type'], $jb['salary_range'], $jb['description'], $jb['requirements'], $jb['college_id']]);
    }
}
echo "  [✓] 18 Jobs verified/seeded across colleges 1 & 2\n";

// Seed job applications for realism
$firstJobId = (int)$pdo->query("SELECT id FROM jobs WHERE college_id = 1 LIMIT 1")->fetchColumn();
if ($firstJobId && $c1StudentId) {
    $chkApp = $pdo->prepare("SELECT id FROM job_applications WHERE job_id = ? AND user_id = ?");
    $chkApp->execute([$firstJobId, $c1StudentId]);
    if (!$chkApp->fetch()) {
        $pdo->prepare("INSERT INTO job_applications (job_id, user_id, college_id, status) VALUES (?, ?, 1, 'applied')")
            ->execute([$firstJobId, $c1StudentId]);
    }
}

// -------------------------------------------------------------
// 4. EVENTS (12 upcoming and past events with registrations)
// -------------------------------------------------------------
$events = [
    // College 1
    [
        'title' => 'Annual Alumni Tech Summit 2026',
        'type' => 'In-Person',
        'date' => date('Y-m-d H:i:s', strtotime('+14 days 10:00:00')),
        'location' => 'IIT Bombay Main Auditorium, Powai, Mumbai',
        'description' => 'Connect with industry leaders, founders, and fellow alumni shaping the future of Indian deep-tech and software ecosystems.',
        'speakers' => 'Pooja Iyer (Staff SWE, Microsoft), Rahul Mehra (VP Product, Razorpay), Divya Krishnan (Principal Eng, Google)',
        'capacity' => 250,
        'college_id' => 1
    ],
    [
        'title' => 'Career Transitions to AI & ML Webinar',
        'type' => 'Online',
        'date' => date('Y-m-d H:i:s', strtotime('+5 days 18:30:00')),
        'location' => 'Virtual / Zoom Live Stream',
        'description' => 'A practical roadmap for software engineers transitioning into GenAI, ML infra, and applied data science roles.',
        'speakers' => 'Divya Krishnan (Google AI), Karan Malhotra (AI Researcher)',
        'capacity' => 500,
        'college_id' => 1
    ],
    [
        'title' => 'Founders & Angel Pitch Night Mumbai',
        'type' => 'In-Person',
        'date' => date('Y-m-d H:i:s', strtotime('+24 days 18:00:00')),
        'location' => 'IIT Bombay Research Park, Powai',
        'description' => 'Ten pre-selected alumni startups present live 5-minute pitches to leading seed funds and angel syndicates.',
        'speakers' => 'Ashwin Swaminathan (Peak XV), Sameer Kulkarni (FintechLabs)',
        'capacity' => 80,
        'college_id' => 1
    ],
    [
        'title' => 'Women in STEM Leadership Roundtable',
        'type' => 'Hybrid',
        'date' => date('Y-m-d H:i:s', strtotime('+35 days 15:00:00')),
        'location' => 'VMCC Hall 1 & Online Broadcast',
        'description' => 'Fireside discussions on navigating senior executive careers in tech and engineering management.',
        'speakers' => 'Radhika Desai (Swiggy), Zoya Khan (Meesho), Sneha Deshmukh (IITB)',
        'capacity' => 120,
        'college_id' => 1
    ],
    [
        'title' => 'Campus Homecoming & Silver Jubilee Reunion',
        'type' => 'In-Person',
        'date' => date('Y-m-d H:i:s', strtotime('-45 days 09:00:00')),
        'location' => 'Convocation Hall, IIT Bombay',
        'description' => 'Celebrating the 25-year reunion of the graduating Class of 2001 with campus tours and legacy endowment presentations.',
        'speakers' => 'Director IIT Bombay, Alumni Association Board',
        'capacity' => 400,
        'college_id' => 1
    ],
    [
        'title' => 'Alumni Mentorship Kickoff 2026',
        'type' => 'Online',
        'date' => date('Y-m-d H:i:s', strtotime('-15 days 17:00:00')),
        'location' => 'Virtual / Google Meet',
        'description' => 'Orientation session for incoming student mentees and experienced alumni mentors.',
        'speakers' => 'Dean K. Sharma, Pooja Iyer',
        'capacity' => 300,
        'college_id' => 1
    ],

    // College 2
    [
        'title' => 'BITS Pilani Global Founders Showcase 2026',
        'type' => 'Hybrid',
        'date' => date('Y-m-d H:i:s', strtotime('+20 days 11:00:00')),
        'location' => 'Pilani Campus Auditorium & Live Broadcast',
        'description' => 'Showcasing the top 15 BITSian startups seeking institutional seed & series A venture funding.',
        'speakers' => 'Harsh Vardhan (SolarGrid AI), BITS Angel Network Partners',
        'capacity' => 180,
        'college_id' => 2
    ],
    [
        'title' => 'Electric Mobility & Hardware Symposium',
        'type' => 'In-Person',
        'date' => date('Y-m-d H:i:s', strtotime('+40 days 10:00:00')),
        'location' => 'BITS Pilani Mechanical Engineering Complex',
        'description' => 'Deep-dive into indigenous battery cells, motor controllers, and automotive firmware safety protocols.',
        'speakers' => 'Ananya Verma (Tata Motors EV), Ather Energy Engineering Leads',
        'capacity' => 150,
        'college_id' => 2
    ],
    [
        'title' => 'FinTech & High-Frequency Trading Masterclass',
        'type' => 'Online',
        'date' => date('Y-m-d H:i:s', strtotime('+8 days 19:00:00')),
        'location' => 'Virtual / Teams Meeting',
        'description' => 'Demystifying low-latency market infrastructure, order matching engines, and statistical modeling.',
        'speakers' => 'Pallavi Shukla (Tower Research Capital)',
        'capacity' => 220,
        'college_id' => 2
    ],
    [
        'title' => 'Cloud Security & DevSecOps Workshop',
        'type' => 'Online',
        'date' => date('Y-m-d H:i:s', strtotime('+18 days 16:00:00')),
        'location' => 'Virtual / Zoom',
        'description' => 'Hands-on architectural lab on multi-account AWS isolation, threat modeling, and automated guardrails.',
        'speakers' => 'Vivek Nambiar (AWS India)',
        'capacity' => 200,
        'college_id' => 2
    ],
    [
        'title' => 'BITS Oasis Alumni Musical Evening',
        'type' => 'In-Person',
        'date' => date('Y-m-d H:i:s', strtotime('-60 days 19:30:00')),
        'location' => 'Open Air Theatre (OAT), Pilani',
        'description' => 'Cultural festival night uniting alumni batches across decades with live student performances.',
        'speakers' => 'BITS Cultural Association',
        'capacity' => 600,
        'college_id' => 2
    ],
    [
        'title' => 'Product Design Systems Workshop',
        'type' => 'Online',
        'date' => date('Y-m-d H:i:s', strtotime('-10 days 18:00:00')),
        'location' => 'Virtual / Figma Live',
        'description' => 'Design tokens, dark mode accessibility, and scalable component architecture for consumer apps.',
        'speakers' => 'Kriti Agarwal (CRED)',
        'capacity' => 140,
        'college_id' => 2
    ]
];

foreach ($events as $ev) {
    $stmt = $pdo->prepare("SELECT id FROM events WHERE title = ? AND college_id = ?");
    $stmt->execute([$ev['title'], $ev['college_id']]);
    if (!$stmt->fetch()) {
        $ins = $pdo->prepare("INSERT INTO events (title, type, date, location, description, speakers, capacity, college_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $ins->execute([$ev['title'], $ev['type'], $ev['date'], $ev['location'], $ev['description'], $ev['speakers'], $ev['capacity'], $ev['college_id']]);
    }
}
echo "  [✓] 12 Events verified/seeded (upcoming and past)\n";

// Seed event registrations
$firstEventId = (int)$pdo->query("SELECT id FROM events WHERE college_id = 1 LIMIT 1")->fetchColumn();
if ($firstEventId && $c1StudentId) {
    $chkReg = $pdo->prepare("SELECT id FROM event_registrations WHERE event_id = ? AND user_id = ?");
    $chkReg->execute([$firstEventId, $c1StudentId]);
    if (!$chkReg->fetch()) {
        $pdo->prepare("INSERT INTO event_registrations (event_id, user_id, college_id, status, qr_code) VALUES (?, ?, 1, 'registered', 'EVREG_DEMO_QR_1')")
            ->execute([$firstEventId, $c1StudentId]);
    } else {
        $pdo->prepare("UPDATE event_registrations SET qr_code = 'EVREG_DEMO_QR_1' WHERE event_id = ? AND user_id = ?")
            ->execute([$firstEventId, $c1StudentId]);
    }
}
$secondEventId = (int)$pdo->query("SELECT id FROM events WHERE college_id = 1 ORDER BY id DESC LIMIT 1")->fetchColumn();
if ($secondEventId && $c1AlumniId) {
    $chkReg2 = $pdo->prepare("SELECT id FROM event_registrations WHERE event_id = ? AND user_id = ?");
    $chkReg2->execute([$secondEventId, $c1AlumniId]);
    if (!$chkReg2->fetch()) {
        $pdo->prepare("INSERT INTO event_registrations (event_id, user_id, college_id, status) VALUES (?, ?, 1, 'attended')")
            ->execute([$secondEventId, $c1AlumniId]);
    }
}

// -------------------------------------------------------------
// 5. COMMUNITY POSTS (22 feed posts with comments and likes)
// -------------------------------------------------------------
$posts = [
    // College 1
    [
        'user_id' => $c1AlumniId,
        'college_id' => 1,
        'content' => 'Excited to announce that Microsoft India is hiring new grads and summer interns across Bengaluru and Hyderabad! If you are passionate about distributed cloud infrastructure, drop a referral request or message me directly.',
        'comments' => [
            ['user_id' => $c1StudentId, 'content' => 'Thank you for sharing, Pooja! Just sent across my resume and referral request.'],
            ['user_id' => $userMap['karan.malhotra@iitb.test'], 'content' => 'Are there openings specifically within the Azure AI inference pod?']
        ],
        'likes' => [$c1StudentId, $userMap['karan.malhotra@iitb.test'], $userMap['rahul.mehra@alumni.test']]
    ],
    [
        'user_id' => $c1StudentId,
        'college_id' => 1,
        'content' => 'Our student team just published an open-source paper on real-time campus energy telemetry using edge IoT sensors! Huge thanks to all alumni mentors who guided our architecture reviews.',
        'comments' => [
            ['user_id' => $c1AlumniId, 'content' => 'Phenomenal work Aarav! Delighted to see this cross the finish line.']
        ],
        'likes' => [$c1AlumniId, $userMap['ananya.sharma@iitb.test']]
    ],
    [
        'user_id' => $userMap['rahul.mehra@alumni.test'],
        'college_id' => 1,
        'content' => 'Product Management AMA: What is the single biggest question students have when preparing for Associate Product Manager (APM) interviews? Drop your queries below!',
        'comments' => [
            ['user_id' => $c1StudentId, 'content' => 'How much weight do recruiters place on prior technical coding ability versus product sense and user metrics?']
        ],
        'likes' => [$c1StudentId, $userMap['divya.krishnan@alumni.test'], $userMap['meera.joshi@alumni.test']]
    ],
    [
        'user_id' => $userMap['divya.krishnan@alumni.test'],
        'college_id' => 1,
        'content' => 'Hosting a Google AI virtual reading group next Friday on spec-decoding techniques for LLM latency reduction. Everyone interested in model deployment is welcome to tune in.',
        'comments' => [
            ['user_id' => $userMap['karan.malhotra@iitb.test'], 'content' => 'Will definitely be there! Looking forward to the discussion on speculative sampling.']
        ],
        'likes' => [$userMap['karan.malhotra@iitb.test'], $c1AlumniId]
    ],
    [
        'user_id' => $userMap['sameer.kulkarni@alumni.test'],
        'college_id' => 1,
        'content' => 'To all undergrad founders building for the Indian SME sector: Early customer discovery beats fancy architecture every single time. Talk to at least 30 prospective users before writing a line of code.',
        'comments' => [
            ['user_id' => $userMap['varun.joshi@iitb.test'], 'content' => 'Golden advice. Thank you Sameer!']
        ],
        'likes' => [$userMap['varun.joshi@iitb.test'], $userMap['ashwin.swaminathan@alumni.test']]
    ],
    [
        'user_id' => $userMap['ananya.sharma@iitb.test'],
        'college_id' => 1,
        'content' => 'Looking for recommendations on the best open-source simulators for RISC-V core verification. Any tips from alumni working in the semiconductor space?',
        'comments' => [
            ['user_id' => $userMap['nilesh.bhat@alumni.test'], 'content' => 'Take a look at Spike (RISC-V ISA Sim) paired with Verilator for fast cycles. Happy to hop on a call to discuss setup.']
        ],
        'likes' => [$userMap['nilesh.bhat@alumni.test']]
    ],
    [
        'user_id' => $userMap['rohit.verma@iitb.test'],
        'college_id' => 1,
        'content' => 'Proud to share that Team Shunya placed 2nd globally in the Solar Decathlon competition! Our energy-positive housing prototype stood resilient throughout the trials.',
        'comments' => [
            ['user_id' => $c1AdminId, 'content' => 'A proud moment for the entire IIT Bombay community! Congratulations to the team.']
        ],
        'likes' => [$c1AdminId, $c1StudentId, $c1AlumniId]
    ],
    [
        'user_id' => $userMap['meera.joshi@alumni.test'],
        'college_id' => 1,
        'content' => 'Recommendation systems in production: Why offline NDCG metrics often diverge from online click-through rate, and how to design robust counterfactual evaluation pipelines.',
        'comments' => [],
        'likes' => [$userMap['divya.krishnan@alumni.test'], $c1StudentId]
    ],
    [
        'user_id' => $userMap['ashwin.swaminathan@alumni.test'],
        'college_id' => 1,
        'content' => 'Venture trends 2026: The rise of vertical AI agents in manufacturing, compliance, and enterprise finance. Great to see so many campus teams building in this category.',
        'comments' => [],
        'likes' => [$userMap['sameer.kulkarni@alumni.test']]
    ],
    [
        'user_id' => $userMap['radhika.desai@alumni.test'],
        'college_id' => 1,
        'content' => 'Quick tip for final-year candidates preparing for system design interviews: Always ask for clarification on non-functional requirements (throughput, availability, consistency) before sketching boxes.',
        'comments' => [
            ['user_id' => $c1StudentId, 'content' => 'Super helpful reminder!']
        ],
        'likes' => [$c1StudentId, $c1AlumniId]
    ],
    [
        'user_id' => $userMap['nilesh.bhat@alumni.test'],
        'college_id' => 1,
        'content' => 'India Semiconductor Mission is opening massive opportunities for chip design and tape-out verification. Great time to be specializing in VLSI!',
        'comments' => [],
        'likes' => [$userMap['ananya.sharma@iitb.test']]
    ],
    [
        'user_id' => $c1AdminId,
        'college_id' => 1,
        'content' => 'Campus Notice: Nominations are officially open for the Distinguished Alumnus Awards 2026. Please submit citations via the official portal by end of the month.',
        'comments' => [],
        'likes' => [$c1AlumniId, $userMap['sameer.kulkarni@alumni.test']]
    ],

    // College 2
    [
        'user_id' => $c2AlumniId,
        'college_id' => 2,
        'content' => 'Tata Motors EV team in Pune is hiring powertrain simulation engineers! If you have hands-on experience with MATLAB/Simulink and battery modeling, feel free to reach out.',
        'comments' => [
            ['user_id' => $c2StudentId, 'content' => 'Reaching out via mentorship request, Ananya! Our team has been testing modular packs.']
        ],
        'likes' => [$c2StudentId, $userMap['siddharth.rao@bits.test']]
    ],
    [
        'user_id' => $c2StudentId,
        'college_id' => 2,
        'content' => 'Just flashed our first RTOS build on the STM32F4 sensor board for the student satellite beacon. Zero packet loss on the 433MHz telemetry link!',
        'comments' => [
            ['user_id' => $c2AlumniId, 'content' => 'Awesome milestone Rohan! Keep up the good work.']
        ],
        'likes' => [$c2AlumniId]
    ],
    [
        'user_id' => $userMap['harsh.vardhan@bitsalum.test'],
        'college_id' => 2,
        'content' => 'SolarGrid AI has closed our seed round! We are looking for 2 software engineering interns from BITS to work with our telemetry team.',
        'comments' => [
            ['user_id' => $userMap['neha.gupta@bits.test'], 'content' => 'Congratulations Harsh! Submitted my application via the jobs portal.']
        ],
        'likes' => [$userMap['neha.gupta@bits.test'], $c2AlumniId]
    ],
    [
        'user_id' => $userMap['neha.gupta@bits.test'],
        'college_id' => 2,
        'content' => 'Any BITSians heading to KubeCon India next month? Would love to organize an informal campus alumni & student meetup over coffee.',
        'comments' => [
            ['user_id' => $userMap['vivek.nambiar@bitsalum.test'], 'content' => 'I will be speaking on cloud identity federation! Count me in.']
        ],
        'likes' => [$userMap['vivek.nambiar@bitsalum.test']]
    ],
    [
        'user_id' => $userMap['kriti.agarwal@bitsalum.test'],
        'college_id' => 2,
        'content' => 'Design teardown: Why micro-animations in payment checkouts reduce perceived wait times by up to 40%. Full writeup coming soon on Medium.',
        'comments' => [],
        'likes' => [$userMap['neha.gupta@bits.test'], $c2AlumniId]
    ],
    [
        'user_id' => $userMap['vivek.nambiar@bitsalum.test'],
        'college_id' => 2,
        'content' => 'Zero Trust Architecture tip: Never trust internal network boundaries. Authenticate and authorize every RPC call between microservices with mTLS and short-lived tokens.',
        'comments' => [],
        'likes' => [$userMap['neha.gupta@bits.test']]
    ],
    [
        'user_id' => $userMap['pallavi.shukla@bitsalum.test'],
        'college_id' => 2,
        'content' => 'Reflections on algorithmic trading careers: Deep understanding of computer systems and memory hierarchies often gives you a bigger edge than complex neural networks.',
        'comments' => [
            ['user_id' => $userMap['prachi.singh@bits.test'], 'content' => 'Thank you for the insight Pallavi! Doing both Econ & CS right now and finding this very relevant.']
        ],
        'likes' => [$userMap['prachi.singh@bits.test']]
    ],
    [
        'user_id' => $c2AdminId,
        'college_id' => 2,
        'content' => 'BITS Pilani Alumni Mentorship portal has crossed 500 active sessions this semester. Kudos to all mentors giving back their time!',
        'comments' => [],
        'likes' => [$c2AlumniId, $userMap['harsh.vardhan@bitsalum.test']]
    ],
    [
        'user_id' => $userMap['siddharth.rao@bits.test'],
        'college_id' => 2,
        'content' => 'Formula Student prototype telemetry is live. Shaved 0.4 seconds off our cornering lap times thanks to the redesigned anti-roll bar geometry!',
        'comments' => [],
        'likes' => [$c2StudentId]
    ],
    [
        'user_id' => $userMap['prachi.singh@bits.test'],
        'college_id' => 2,
        'content' => 'Completed empirical analysis on UPI micro-transaction velocity trends across Tier 2 and Tier 3 Indian cities. Fascinating econometric data.',
        'comments' => [],
        'likes' => [$userMap['pallavi.shukla@bitsalum.test']]
    ]
];

foreach ($posts as $p) {
    $stmt = $pdo->prepare("SELECT id FROM posts WHERE content = ? AND college_id = ?");
    $stmt->execute([$p['content'], $p['college_id']]);
    $existingPost = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($existingPost) {
        $postId = (int)$existingPost['id'];
    } else {
        $ins = $pdo->prepare("INSERT INTO posts (user_id, content, college_id) VALUES (?, ?, ?)");
        $ins->execute([$p['user_id'], $p['content'], $p['college_id']]);
        $postId = (int)$pdo->lastInsertId();
    }

    // Seed comments
    if (!empty($p['comments'])) {
        foreach ($p['comments'] as $com) {
            $chkC = $pdo->prepare("SELECT id FROM post_comments WHERE post_id = ? AND content = ?");
            $chkC->execute([$postId, $com['content']]);
            if (!$chkC->fetch()) {
                $insC = $pdo->prepare("INSERT INTO post_comments (post_id, user_id, content, college_id) VALUES (?, ?, ?, ?)");
                $insC->execute([$postId, $com['user_id'], $com['content'], $p['college_id']]);
            }
        }
    }

    // Seed likes
    if (!empty($p['likes'])) {
        foreach ($p['likes'] as $likerId) {
            $chkL = $pdo->prepare("SELECT user_id FROM post_likes WHERE post_id = ? AND user_id = ?");
            $chkL->execute([$postId, $likerId]);
            if (!$chkL->fetch()) {
                $insL = $pdo->prepare("INSERT INTO post_likes (post_id, user_id, college_id) VALUES (?, ?, ?)");
                $insL->execute([$postId, $likerId, $p['college_id']]);
            }
        }
    }
}
echo "  [✓] 22 Community Posts verified/seeded with comments and likes\n";

// -------------------------------------------------------------
// 6. MENTORSHIP SESSIONS (14 sessions across all statuses)
// -------------------------------------------------------------
$mentorshipSessions = [
    // College 1
    ['mentor_id' => $c1AlumniId, 'mentee_id' => $c1StudentId, 'status' => 'accepted', 'college_id' => 1],
    ['mentor_id' => $c1AlumniId, 'mentee_id' => $userMap['karan.malhotra@iitb.test'], 'status' => 'pending', 'college_id' => 1],
    ['mentor_id' => $c1AlumniId, 'mentee_id' => $userMap['varun.joshi@iitb.test'], 'status' => 'completed', 'college_id' => 1],
    ['mentor_id' => $userMap['rahul.mehra@alumni.test'], 'mentee_id' => $c1StudentId, 'status' => 'accepted', 'college_id' => 1],
    ['mentor_id' => $userMap['rahul.mehra@alumni.test'], 'mentee_id' => $userMap['ishita.sen@iitb.test'], 'status' => 'pending', 'college_id' => 1],
    ['mentor_id' => $userMap['divya.krishnan@alumni.test'], 'mentee_id' => $userMap['karan.malhotra@iitb.test'], 'status' => 'accepted', 'college_id' => 1],
    ['mentor_id' => $userMap['sameer.kulkarni@alumni.test'], 'mentee_id' => $userMap['rohit.verma@iitb.test'], 'status' => 'cancelled', 'college_id' => 1],
    ['mentor_id' => $userMap['nilesh.bhat@alumni.test'], 'mentee_id' => $userMap['ananya.sharma@iitb.test'], 'status' => 'completed', 'college_id' => 1],
    ['mentor_id' => $userMap['meera.joshi@alumni.test'], 'mentee_id' => $userMap['tanvi.kulkarni@iitb.test'], 'status' => 'accepted', 'college_id' => 1],

    // College 2
    ['mentor_id' => $c2AlumniId, 'mentee_id' => $c2StudentId, 'status' => 'accepted', 'college_id' => 2],
    ['mentor_id' => $c2AlumniId, 'mentee_id' => $userMap['siddharth.rao@bits.test'], 'status' => 'pending', 'college_id' => 2],
    ['mentor_id' => $userMap['harsh.vardhan@bitsalum.test'], 'mentee_id' => $userMap['neha.gupta@bits.test'], 'status' => 'accepted', 'college_id' => 2],
    ['mentor_id' => $userMap['pallavi.shukla@bitsalum.test'], 'mentee_id' => $userMap['prachi.singh@bits.test'], 'status' => 'completed', 'college_id' => 2],
    ['mentor_id' => $userMap['vivek.nambiar@bitsalum.test'], 'mentee_id' => $c2StudentId, 'status' => 'cancelled', 'college_id' => 2]
];

foreach ($mentorshipSessions as $ms) {
    $stmt = $pdo->prepare("SELECT id FROM mentorship_sessions WHERE mentor_id = ? AND mentee_id = ? AND college_id = ?");
    $stmt->execute([$ms['mentor_id'], $ms['mentee_id'], $ms['college_id']]);
    if ($row = $stmt->fetch()) {
        $pdo->prepare("UPDATE mentorship_sessions SET status = ? WHERE id = ?")->execute([$ms['status'], $row['id']]);
    } else {
        $pdo->prepare("INSERT INTO mentorship_sessions (mentor_id, mentee_id, status, college_id) VALUES (?, ?, ?, ?)")
            ->execute([$ms['mentor_id'], $ms['mentee_id'], $ms['status'], $ms['college_id']]);
    }
}
echo "  [✓] 14 Mentorship Sessions verified/seeded across pending/accepted/completed/cancelled\n";

// -------------------------------------------------------------
// 7. REFERRAL REQUESTS (12 requests: 3 in EACH canonical status)
//    Statuses: requested, reviewed, submitted, rejected
// -------------------------------------------------------------
$referralRequests = [
    // 3 x 'requested'
    ['alumni_id' => $c1AlumniId, 'student_id' => $c1StudentId, 'status' => 'requested', 'college_id' => 1],
    ['alumni_id' => $userMap['rahul.mehra@alumni.test'], 'student_id' => $userMap['varun.joshi@iitb.test'], 'status' => 'requested', 'college_id' => 1],
    ['alumni_id' => $c2AlumniId, 'student_id' => $c2StudentId, 'status' => 'requested', 'college_id' => 2],

    // 3 x 'reviewed'
    ['alumni_id' => $c1AlumniId, 'student_id' => $userMap['karan.malhotra@iitb.test'], 'status' => 'reviewed', 'college_id' => 1],
    ['alumni_id' => $userMap['divya.krishnan@alumni.test'], 'student_id' => $userMap['ananya.sharma@iitb.test'], 'status' => 'reviewed', 'college_id' => 1],
    ['alumni_id' => $userMap['harsh.vardhan@bitsalum.test'], 'student_id' => $userMap['neha.gupta@bits.test'], 'status' => 'reviewed', 'college_id' => 2],

    // 3 x 'submitted' (formerly approved)
    ['alumni_id' => $c1AlumniId, 'student_id' => $userMap['rohit.verma@iitb.test'], 'status' => 'submitted', 'college_id' => 1],
    ['alumni_id' => $userMap['meera.joshi@alumni.test'], 'student_id' => $c1StudentId, 'status' => 'submitted', 'college_id' => 1],
    ['alumni_id' => $c2AlumniId, 'student_id' => $userMap['siddharth.rao@bits.test'], 'status' => 'submitted', 'college_id' => 2],

    // 3 x 'rejected'
    ['alumni_id' => $userMap['radhika.desai@alumni.test'], 'student_id' => $userMap['ishita.sen@iitb.test'], 'status' => 'rejected', 'college_id' => 1],
    ['alumni_id' => $userMap['nilesh.bhat@alumni.test'], 'student_id' => $userMap['diya.banerjee@iitb.test'], 'status' => 'rejected', 'college_id' => 1],
    ['alumni_id' => $userMap['vivek.nambiar@bitsalum.test'], 'student_id' => $userMap['manish.tiwari@bits.test'], 'status' => 'rejected', 'college_id' => 2]
];

foreach ($referralRequests as $rr) {
    $stmt = $pdo->prepare("SELECT id FROM referral_requests WHERE alumni_id = ? AND student_id = ? AND college_id = ?");
    $stmt->execute([$rr['alumni_id'], $rr['student_id'], $rr['college_id']]);
    if ($row = $stmt->fetch()) {
        $pdo->prepare("UPDATE referral_requests SET status = ? WHERE id = ?")->execute([$rr['status'], $row['id']]);
    } else {
        $pdo->prepare("INSERT INTO referral_requests (alumni_id, student_id, status, college_id) VALUES (?, ?, ?, ?)")
            ->execute([$rr['alumni_id'], $rr['student_id'], $rr['status'], $rr['college_id']]);
    }
}
echo "  [✓] 12 Referral Requests verified/seeded across all 4 canonical statuses (requested, reviewed, submitted, rejected)\n";

// -------------------------------------------------------------
// 8. CAMPAIGNS & DONATIONS (4 campaigns with multiple donations)
// -------------------------------------------------------------
$campaigns = [
    [
        'title' => 'Alumni Endowed Scholarship Fund 2026',
        'description' => 'Providing need-blind tuition assistance and hostel living grants for deserving undergraduate engineering students.',
        'goal_amount' => 5000000.00,
        'raised_amount' => 2450000.00,
        'created_by' => $c1AdminId,
        'college_id' => 1
    ],
    [
        'title' => 'Campus DeepTech Prototyping Cleanroom',
        'description' => 'Upgrading campus semiconductor fabrication and robotics prototyping facilities with cutting-edge equipment.',
        'goal_amount' => 3000000.00,
        'raised_amount' => 1400000.00,
        'created_by' => $c1AdminId,
        'college_id' => 1
    ],
    [
        'title' => 'Rural STEM Education & Outreach Initiative',
        'description' => 'Funding student-led mobile robotics labs and science workshops in rural high schools across Maharashtra.',
        'goal_amount' => 1500000.00,
        'raised_amount' => 880000.00,
        'created_by' => $c1AdminId,
        'college_id' => 1
    ],
    [
        'title' => 'BITS Innovation Hub Seed Corpus',
        'description' => 'Seed grant corpus supporting student-founded hardware and clean-tech startups incubated on Pilani campus.',
        'goal_amount' => 4000000.00,
        'raised_amount' => 1850000.00,
        'created_by' => $c2AdminId,
        'college_id' => 2
    ]
];

$campMap = [];
foreach ($campaigns as $camp) {
    $stmt = $pdo->prepare("SELECT id FROM campaigns WHERE title = ? AND college_id = ?");
    $stmt->execute([$camp['title'], $camp['college_id']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $pdo->prepare("UPDATE campaigns SET description = ?, goal_amount = ?, raised_amount = ? WHERE id = ?")
            ->execute([$camp['description'], $camp['goal_amount'], $camp['raised_amount'], $row['id']]);
        $campMap[$camp['title']] = (int)$row['id'];
    } else {
        $pdo->prepare("INSERT INTO campaigns (title, description, goal_amount, raised_amount, created_by, college_id) VALUES (?, ?, ?, ?, ?, ?)")
            ->execute([$camp['title'], $camp['description'], $camp['goal_amount'], $camp['raised_amount'], $camp['created_by'], $camp['college_id']]);
        $campMap[$camp['title']] = (int)$pdo->lastInsertId();
    }
}

// Seed donations
$donations = [
    ['user_id' => $c1AlumniId, 'campaign' => 'Alumni Endowed Scholarship Fund 2026', 'amount' => 100000.00, 'txn' => 'TXN_SEED_DON_001', 'college_id' => 1],
    ['user_id' => $userMap['rahul.mehra@alumni.test'], 'campaign' => 'Alumni Endowed Scholarship Fund 2026', 'amount' => 250000.00, 'txn' => 'TXN_SEED_DON_002', 'college_id' => 1],
    ['user_id' => $userMap['sameer.kulkarni@alumni.test'], 'campaign' => 'Campus DeepTech Prototyping Cleanroom', 'amount' => 500000.00, 'txn' => 'TXN_SEED_DON_003', 'college_id' => 1],
    ['user_id' => $userMap['divya.krishnan@alumni.test'], 'campaign' => 'Rural STEM Education & Outreach Initiative', 'amount' => 50000.00, 'txn' => 'TXN_SEED_DON_004', 'college_id' => 1],
    ['user_id' => $c2AlumniId, 'campaign' => 'BITS Innovation Hub Seed Corpus', 'amount' => 75000.00, 'txn' => 'TXN_SEED_DON_005', 'college_id' => 2],
    ['user_id' => $userMap['harsh.vardhan@bitsalum.test'], 'campaign' => 'BITS Innovation Hub Seed Corpus', 'amount' => 200000.00, 'txn' => 'TXN_SEED_DON_006', 'college_id' => 2]
];

foreach ($donations as $don) {
    $campId = $campMap[$don['campaign']] ?? null;
    if ($campId) {
        $chkDon = $pdo->prepare("SELECT id FROM donations WHERE transaction_id = ?");
        $chkDon->execute([$don['txn']]);
        if (!$chkDon->fetch()) {
            $pdo->prepare("INSERT INTO donations (user_id, campaign_id, amount, status, transaction_id, college_id) VALUES (?, ?, ?, 'completed', ?, ?)")
                ->execute([$don['user_id'], $campId, $don['amount'], $don['txn'], $don['college_id']]);
        }
    }
}
echo "  [✓] 4 Donation Campaigns and transactions verified/seeded\n";

// -------------------------------------------------------------
// 9. MARKETPLACE ITEMS (12 items across categories)
// -------------------------------------------------------------
$marketItems = [
    // College 1
    ['user_id' => $c1AlumniId, 'title' => 'Operating Systems: Three Easy Pieces (Hardcover)', 'description' => 'Mint condition textbook, essential reference for systems programming. Powai campus pickup.', 'price' => 450.00, 'item_condition' => 'like-new', 'category' => 'books', 'status' => 'available', 'college_id' => 1],
    ['user_id' => $c1StudentId, 'title' => 'Dell Ultrasharp 27" 4K USB-C Monitor', 'description' => 'Crystal clear display with power delivery. Perfect for coding and design setups.', 'price' => 18500.00, 'item_condition' => 'good', 'category' => 'electronics', 'status' => 'available', 'college_id' => 1],
    ['user_id' => $userMap['rohit.verma@iitb.test'], 'title' => 'Hercules 21-Speed Mountain Bicycle', 'description' => 'Fitted with front suspension and rear mudguard. Ideal for riding between hostels and academic blocks.', 'price' => 3800.00, 'item_condition' => 'good', 'category' => 'vehicles', 'status' => 'available', 'college_id' => 1],
    ['user_id' => $userMap['ananya.sharma@iitb.test'], 'title' => 'Digilent Basys 3 Artix-7 FPGA Board', 'description' => 'Used for one semester in digital design lab. Includes micro-USB programming cable.', 'price' => 6500.00, 'item_condition' => 'like-new', 'category' => 'electronics', 'status' => 'available', 'college_id' => 1],
    ['user_id' => $userMap['varun.joshi@iitb.test'], 'title' => 'Introduction to Algorithms (CLRS 3rd Edition)', 'description' => 'Comprehensive algorithms reference with neat notes in margins.', 'price' => 600.00, 'item_condition' => 'good', 'category' => 'books', 'status' => 'available', 'college_id' => 1],
    ['user_id' => $userMap['karan.malhotra@iitb.test'], 'title' => 'Keychron K2 Wireless Mechanical Keyboard (Brown Switches)', 'description' => 'RGB backlit mechanical keyboard with Mac & Windows keycaps.', 'price' => 4200.00, 'item_condition' => 'like-new', 'category' => 'electronics', 'status' => 'available', 'college_id' => 1],
    ['user_id' => $userMap['sneha.deshmukh@iitb.test'], 'title' => 'Ergonomic Mesh Study Chair with Lumbar Support', 'description' => 'Adjustable height and armrests. Purchased last year.', 'price' => 2800.00, 'item_condition' => 'good', 'category' => 'furniture', 'status' => 'sold', 'college_id' => 1],

    // College 2
    ['user_id' => $c2AlumniId, 'title' => 'Electric Vehicle Battery Systems Engineering (Hardcover)', 'description' => 'In-depth automotive reference manual for powertrain engineers.', 'price' => 850.00, 'item_condition' => 'like-new', 'category' => 'books', 'status' => 'available', 'college_id' => 2],
    ['user_id' => $c2StudentId, 'title' => 'STM32 Nucleo-64 Development Board with Sensors', 'description' => 'Includes breadboard, jumper wires, and I2C sensor modules.', 'price' => 1200.00, 'item_condition' => 'good', 'category' => 'electronics', 'status' => 'available', 'college_id' => 2],
    ['user_id' => $userMap['siddharth.rao@bits.test'], 'title' => 'Hero Octane Geared Cycle (Campus Edition)', 'description' => 'Reliable campus commuter cycle with bottle holder and lock.', 'price' => 3200.00, 'item_condition' => 'good', 'category' => 'vehicles', 'status' => 'available', 'college_id' => 2],
    ['user_id' => $userMap['neha.gupta@bits.test'], 'title' => 'Kindle Paperwhite (11th Gen, 16GB)', 'description' => 'Waterproof e-reader with warm light. Includes leather protective case.', 'price' => 7500.00, 'item_condition' => 'like-new', 'category' => 'electronics', 'status' => 'available', 'college_id' => 2],
    ['user_id' => $userMap['prachi.singh@bits.test'], 'title' => 'Principles of Corporate Finance (Brealey Myers)', 'description' => 'Standard finance coursework textbook in clean condition.', 'price' => 500.00, 'item_condition' => 'good', 'category' => 'books', 'status' => 'available', 'college_id' => 2]
];

foreach ($marketItems as $mi) {
    $stmt = $pdo->prepare("SELECT id FROM marketplace_items WHERE title = ? AND college_id = ?");
    $stmt->execute([$mi['title'], $mi['college_id']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO marketplace_items (user_id, title, description, price, item_condition, category, status, college_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")
            ->execute([$mi['user_id'], $mi['title'], $mi['description'], $mi['price'], $mi['item_condition'], $mi['category'], $mi['status'], $mi['college_id']]);
    }
}
echo "  [✓] 12 Marketplace Items verified/seeded across colleges 1 & 2\n";

// -------------------------------------------------------------
// 10. BUSINESS DIRECTORY (8 alumni businesses)
// -------------------------------------------------------------
$businesses = [
    // College 1
    ['user_id' => $c1AlumniId, 'name' => 'ByteCraft Cloud Solutions', 'description' => 'Cloud migration, Kubernetes orchestration, and FinOps advisory founded by IIT Bombay alumni.', 'website' => 'https://bytecraft.example.com', 'category' => 'Technology', 'college_id' => 1],
    ['user_id' => $userMap['rahul.mehra@alumni.test'], 'name' => 'Apex Product Mentors', 'description' => 'Executive cohort-based coaching and APM interview bootcamps for ambitious tech professionals.', 'website' => 'https://apexpm.example.com', 'category' => 'Education', 'college_id' => 1],
    ['user_id' => $userMap['sameer.kulkarni@alumni.test'], 'name' => 'FintechLabs Advisory', 'description' => 'Regulatory compliance and neo-banking architectural consulting across Southeast Asia.', 'website' => 'https://fintechlabs.example.com', 'category' => 'Financial Services', 'college_id' => 1],
    ['user_id' => $userMap['zoya.khan@alumni.test'], 'name' => 'Velocity Logistics Partners', 'description' => 'Last-mile fulfillment analytics and warehouse robotics integration for direct-to-consumer brands.', 'website' => 'https://velocitylogistics.example.com', 'category' => 'Logistics', 'college_id' => 1],
    ['user_id' => $userMap['nilesh.bhat@alumni.test'], 'name' => 'SiliconCore Semiconductor Labs', 'description' => 'Custom analog and mixed-signal IP blocks designed for automotive safety sensors.', 'website' => 'https://siliconcore.example.com', 'category' => 'Hardware', 'college_id' => 1],

    // College 2
    ['user_id' => $c2AlumniId, 'name' => 'VoltPulse Dynamics', 'description' => 'Modular high-voltage battery enclosures and testing rigs founded by BITS Pilani alumni.', 'website' => 'https://voltpulse.example.com', 'category' => 'Automotive', 'college_id' => 2],
    ['user_id' => $userMap['harsh.vardhan@bitsalum.test'], 'name' => 'SolarGrid AI Technologies', 'description' => 'Predictive microgrid dispatch software balancing solar generation and industrial energy storage.', 'website' => 'https://solargrid.example.com', 'category' => 'CleanTech', 'college_id' => 2],
    ['user_id' => $userMap['kriti.agarwal@bitsalum.test'], 'name' => 'Studio Canvas Design Collective', 'description' => 'Brand strategy, design systems, and product ergonomics studio based out of Bengaluru.', 'website' => 'https://studiocanvas.example.com', 'category' => 'Design', 'college_id' => 2]
];

foreach ($businesses as $b) {
    $stmt = $pdo->prepare("SELECT id FROM businesses WHERE name = ? AND college_id = ?");
    $stmt->execute([$b['name'], $b['college_id']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO businesses (user_id, name, description, website, category, college_id) VALUES (?, ?, ?, ?, ?, ?)")
            ->execute([$b['user_id'], $b['name'], $b['description'], $b['website'], $b['category'], $b['college_id']]);
    }
}
echo "  [✓] 8 Alumni Businesses verified/seeded\n";

// -------------------------------------------------------------
// 11. STARTUPS (6 alumni startups with funding stages)
// -------------------------------------------------------------
$startups = [
    // College 1
    ['user_id' => $c1AlumniId, 'name' => 'NeuroRoute AI', 'elevator_pitch' => 'Autonomous freight route optimization using reinforcement learning for Indian intercity freight logistics.', 'funding_stage' => 'Seed', 'website' => 'https://neuroroute.example.com', 'college_id' => 1],
    ['user_id' => $userMap['sameer.kulkarni@alumni.test'], 'name' => 'TrustPay Protocol', 'elevator_pitch' => 'Zero-knowledge verifiable identity and instant settlement protocols for cross-border B2B remittances.', 'funding_stage' => 'Series A', 'website' => 'https://trustpay.example.com', 'college_id' => 1],
    ['user_id' => $userMap['ashwin.swaminathan@alumni.test'], 'name' => 'BioSynth Materials', 'elevator_pitch' => 'Biodegradable marine-safe polymers engineered from agricultural crop waste residues.', 'funding_stage' => 'Pre-Seed', 'website' => 'https://biosynth.example.com', 'college_id' => 1],
    ['user_id' => $userMap['akash.saxena@alumni.test'], 'name' => 'RapidRender Cloud', 'elevator_pitch' => 'Serverless browser-native 3D graphics rendering platform for interactive e-commerce catalogs.', 'funding_stage' => 'Bootstrapped', 'website' => 'https://rapidrender.example.com', 'college_id' => 1],

    // College 2
    ['user_id' => $c2AlumniId, 'name' => 'ThermalLoop Motors', 'elevator_pitch' => 'Next-generation liquid-cooled axial flux motors delivering 25% higher power density for commercial EVs.', 'funding_stage' => 'Seed', 'website' => 'https://thermalloop.example.com', 'college_id' => 2],
    ['user_id' => $userMap['harsh.vardhan@bitsalum.test'], 'name' => 'SolarGrid AI', 'elevator_pitch' => 'Distributed virtual power plant software platform balancing commercial rooftop solar installations.', 'funding_stage' => 'Series A', 'website' => 'https://solargrid.example.com', 'college_id' => 2]
];

foreach ($startups as $s) {
    $stmt = $pdo->prepare("SELECT id FROM startups WHERE name = ? AND college_id = ?");
    $stmt->execute([$s['name'], $s['college_id']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO startups (user_id, name, elevator_pitch, funding_stage, website, college_id) VALUES (?, ?, ?, ?, ?, ?)")
            ->execute([$s['user_id'], $s['name'], $s['elevator_pitch'], $s['funding_stage'], $s['website'], $s['college_id']]);
    }
}
echo "  [✓] 6 Startups verified/seeded across funding stages\n";

// -------------------------------------------------------------
// 12. CAREER RESOURCES (6 items)
// -------------------------------------------------------------
$careerResources = [
    // College 1
    ['title' => 'Software Engineering Behavioral & System Design Guide (2026)', 'link' => 'https://github.com/donnemartin/system-design-primer', 'resource_type' => 'guide', 'college_id' => 1],
    ['title' => 'IIT Bombay Alumni Mock Interview Questions & Frameworks', 'link' => 'https://github.com/jwasham/coding-interview-university', 'resource_type' => 'interview_prep', 'college_id' => 1],
    ['title' => 'Clean Tech & Renewable Energy Industry Landscape Whitepaper', 'link' => 'https://ourworldindata.org/renewable-energy', 'resource_type' => 'whitepaper', 'college_id' => 1],
    ['title' => 'Engineering Resume Template (LaTeX & Word formats)', 'link' => 'https://www.overleaf.com/latex/templates', 'resource_type' => 'template', 'college_id' => 1],

    // College 2
    ['title' => 'BITS Pilani Hardware & Firmware Engineering Roadmap', 'link' => 'https://github.com/m-ou-se/rust-embedded-cheat-sheet', 'resource_type' => 'roadmap', 'college_id' => 2],
    ['title' => 'Quantitative Finance Interview Preparation Guide', 'link' => 'https://www.quantstart.com', 'resource_type' => 'guide', 'college_id' => 2]
];

foreach ($careerResources as $cr) {
    $stmt = $pdo->prepare("SELECT id FROM career_resources WHERE title = ? AND college_id = ?");
    $stmt->execute([$cr['title'], $cr['college_id']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO career_resources (title, link, resource_type, college_id) VALUES (?, ?, ?, ?)")
            ->execute([$cr['title'], $cr['link'], $cr['resource_type'], $cr['college_id']]);
    }
}
echo "  [✓] 6 Career Resources verified/seeded\n";

// -------------------------------------------------------------
// 13. MODERATION REPORTS (6 queue items across pending/resolved)
// -------------------------------------------------------------
$reports = [
    // College 1
    ['reporter_id' => $c1StudentId, 'reported_item_type' => 'post', 'reported_item_id' => 1, 'reason' => 'Duplicate promotional link verification requested.', 'status' => 'pending', 'college_id' => 1],
    ['reporter_id' => $userMap['ananya.sharma@iitb.test'], 'reported_item_type' => 'comment', 'reported_item_id' => 1, 'reason' => 'Inappropriate conversational tone.', 'status' => 'resolved', 'college_id' => 1],
    ['reporter_id' => $userMap['karan.malhotra@iitb.test'], 'reported_item_type' => 'marketplace', 'reported_item_id' => 1, 'reason' => 'Item price formatting verification.', 'status' => 'dismissed', 'college_id' => 1],
    ['reporter_id' => $c1AlumniId, 'reported_item_type' => 'user', 'reported_item_id' => $userMap['varun.joshi@iitb.test'], 'reason' => 'Profile name verification check.', 'status' => 'pending', 'college_id' => 1],

    // College 2
    ['reporter_id' => $c2StudentId, 'reported_item_type' => 'post', 'reported_item_id' => 13, 'reason' => 'Off-topic discussion in engineering channel.', 'status' => 'pending', 'college_id' => 2],
    ['reporter_id' => $c2AlumniId, 'reported_item_type' => 'comment', 'reported_item_id' => 3, 'reason' => 'Spam link detected in comment thread.', 'status' => 'resolved', 'college_id' => 2]
];

foreach ($reports as $rep) {
    $stmt = $pdo->prepare("SELECT id FROM reports WHERE reporter_id = ? AND reason = ? AND college_id = ?");
    $stmt->execute([$rep['reporter_id'], $rep['reason'], $rep['college_id']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO reports (reporter_id, reported_item_type, reported_item_id, reason, status, college_id) VALUES (?, ?, ?, ?, ?, ?)")
            ->execute([$rep['reporter_id'], $rep['reported_item_type'], $rep['reported_item_id'], $rep['reason'], $rep['status'], $rep['college_id']]);
    }
}
echo "  [✓] 6 Moderation Reports verified/seeded across pending/resolved/dismissed\n";

// -------------------------------------------------------------
// 14. ADVERTISEMENTS (4 ads across active and disabled states)
// -------------------------------------------------------------
$ads = [
    // College 1
    ['sponsor_name' => 'Google Cloud for Campus Startups', 'image_url' => 'https://images.unsplash.com/photo-1579546929518-9e396f3cc809?w=600&auto=format&fit=crop', 'link_url' => 'https://cloud.google.com/startup', 'status' => 'active', 'college_id' => 1],
    ['sponsor_name' => 'Microsoft Azure Student Developer Grants', 'image_url' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&auto=format&fit=crop', 'link_url' => 'https://azure.microsoft.com/free/students', 'status' => 'active', 'college_id' => 1],
    ['sponsor_name' => 'Razorpay Rize Founder Incubator', 'image_url' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?w=600&auto=format&fit=crop', 'link_url' => 'https://razorpay.com/rize', 'status' => 'disabled', 'college_id' => 1],

    // College 2
    ['sponsor_name' => 'Tata Motors EV Fellowship 2026', 'image_url' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=600&auto=format&fit=crop', 'link_url' => 'https://ev.tatamotors.com', 'status' => 'active', 'college_id' => 2]
];

foreach ($ads as $a) {
    $stmt = $pdo->prepare("SELECT id FROM advertisements WHERE sponsor_name = ? AND college_id = ?");
    $stmt->execute([$a['sponsor_name'], $a['college_id']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO advertisements (sponsor_name, image_url, link_url, status, college_id) VALUES (?, ?, ?, ?, ?)")
            ->execute([$a['sponsor_name'], $a['image_url'], $a['link_url'], $a['status'], $a['college_id']]);
    }
}
echo "  [✓] 4 Advertisements verified/seeded across active and disabled states\n";

// -------------------------------------------------------------
// 15. NOTIFICATIONS (Named notification triggers)
// -------------------------------------------------------------
$notifs = [
    // College 1
    ['user_id' => $c1StudentId, 'type' => 'mentorship_request', 'message' => 'Your mentorship request to Pooja Iyer has been accepted.', 'is_read' => 0, 'link' => '/mentorship', 'college_id' => 1],
    ['user_id' => $c1StudentId, 'type' => 'job_application', 'message' => 'Your job application for Microsoft India has been received.', 'is_read' => 0, 'link' => '/jobs', 'college_id' => 1],
    ['user_id' => $c1AlumniId, 'type' => 'donation_received', 'message' => 'Thank you for your generous donation to the Alumni Endowed Scholarship Fund 2026.', 'is_read' => 1, 'link' => '/donations', 'college_id' => 1],
    ['user_id' => $c1AlumniId, 'type' => 'referral', 'message' => 'Aarav Patel requested a referral from you for Microsoft India.', 'is_read' => 0, 'link' => '/referral-request', 'college_id' => 1],
    ['user_id' => $c1AdminId, 'type' => 'moderation', 'message' => 'A new moderation item has been submitted for administrative review.', 'is_read' => 0, 'link' => '/admin/moderation', 'college_id' => 1],
    ['user_id' => $c1StudentId, 'type' => 'event_reminder', 'message' => 'Annual Alumni Tech Summit 2026 starts in 14 days.', 'is_read' => 0, 'link' => '/events', 'college_id' => 1],

    // College 2
    ['user_id' => $c2StudentId, 'type' => 'mentorship_request', 'message' => 'Your mentorship session with Ananya Verma has been confirmed.', 'is_read' => 0, 'link' => '/mentorship', 'college_id' => 2],
    ['user_id' => $c2AlumniId, 'type' => 'donation_received', 'message' => 'Thank you for contributing to BITS Innovation Hub Seed Corpus.', 'is_read' => 1, 'link' => '/donations', 'college_id' => 2]
];

foreach ($notifs as $ntf) {
    $stmt = $pdo->prepare("SELECT id FROM notifications WHERE user_id = ? AND message = ?");
    $stmt->execute([$ntf['user_id'], $ntf['message']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO notifications (user_id, type, message, is_read, link, college_id) VALUES (?, ?, ?, ?, ?, ?)")
            ->execute([$ntf['user_id'], $ntf['type'], $ntf['message'], $ntf['is_read'], $ntf['link'], $ntf['college_id']]);
    }
}
echo "  [✓] Named Notification triggers verified/seeded\n";

// -------------------------------------------------------------
// 16. BADGES & USER SETTINGS
// -------------------------------------------------------------
$badges = [
    ['name' => 'Campus Pioneer', 'description' => 'Early adopter of the Alumni Connect platform.', 'icon' => 'award', 'points' => 50],
    ['name' => 'Distinguished Mentor', 'description' => 'Completed 5+ mentorship sessions with students.', 'icon' => 'star', 'points' => 100],
    ['name' => 'Community Champion', 'description' => 'Active contributor in campus community discussions.', 'icon' => 'heart', 'points' => 75],
    ['name' => 'Philanthropic Benefactor', 'description' => 'Supported student scholarship campaigns.', 'icon' => 'gift', 'points' => 150]
];
foreach ($badges as $b) {
    $stmt = $pdo->prepare("SELECT id FROM badges WHERE name = ?");
    $stmt->execute([$b['name']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO badges (name, description, icon, points) VALUES (?, ?, ?, ?)")
            ->execute([$b['name'], $b['description'], $b['icon'], $b['points']]);
    }
}

// Award badges
$pioneerBadgeId = $pdo->query("SELECT id FROM badges WHERE name = 'Campus Pioneer'")->fetchColumn();
$mentorBadgeId = $pdo->query("SELECT id FROM badges WHERE name = 'Distinguished Mentor'")->fetchColumn();
if ($pioneerBadgeId && $c1StudentId) {
    $chk = $pdo->prepare("SELECT id FROM user_badges WHERE user_id = ? AND badge_id = ?");
    $chk->execute([$c1StudentId, $pioneerBadgeId]);
    if (!$chk->fetch()) {
        $pdo->prepare("INSERT INTO user_badges (user_id, badge_id, college_id) VALUES (?, ?, 1)")
            ->execute([$c1StudentId, $pioneerBadgeId]);
    }
}
if ($mentorBadgeId && $c1AlumniId) {
    $chk = $pdo->prepare("SELECT id FROM user_badges WHERE user_id = ? AND badge_id = ?");
    $chk->execute([$c1AlumniId, $mentorBadgeId]);
    if (!$chk->fetch()) {
        $pdo->prepare("INSERT INTO user_badges (user_id, badge_id, college_id) VALUES (?, ?, 1)")
            ->execute([$c1AlumniId, $mentorBadgeId]);
    }
}

// User settings
$allUsers = $pdo->query("SELECT id, college_id FROM users")->fetchAll(PDO::FETCH_OBJ);
foreach ($allUsers as $u) {
    $chk = $pdo->prepare("SELECT user_id FROM user_settings WHERE user_id = ?");
    $chk->execute([$u->id]);
    if (!$chk->fetch()) {
        $pdo->prepare("INSERT INTO user_settings (user_id, email_notifications, profile_visibility, college_id) VALUES (?, 1, 'public', ?)")
            ->execute([$u->id, $u->college_id]);
    }
}
echo "  [✓] Badges and User Settings configured for all 44 users\n";

echo "=== Seeding Complete: Deterministic Dataset Successfully Established! ===\n";
