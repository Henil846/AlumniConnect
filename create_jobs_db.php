<?php
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');
$pdo = App\Core\Database::getConnection();

try {
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS jobs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            company VARCHAR(255) NOT NULL,
            location VARCHAR(255) NOT NULL,
            industry VARCHAR(255) NOT NULL,
            type VARCHAR(100) NOT NULL,
            salary_range VARCHAR(100),
            description TEXT,
            requirements TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        
        CREATE TABLE IF NOT EXISTS job_applications (
            id INT AUTO_INCREMENT PRIMARY KEY,
            job_id INT NOT NULL,
            user_id INT NOT NULL,
            status VARCHAR(100) DEFAULT 'applied',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        );
    ");
    
    // Insert some mock data if empty
    $count = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
    if ($count == 0) {
        $pdo->exec("
            INSERT INTO jobs (title, company, location, industry, type, salary_range, description, requirements) VALUES 
            ('Senior UI Designer', 'BlueWave Technologies', 'San Francisco, CA (Remote)', 'Technology', 'Full-time', '$140k - $180k', 'Looking for a Senior UI Designer to lead the visual evolution...', '5+ years experience, Figma'),
            ('Investment Analyst', 'Goldstone Capital', 'New York City, NY', 'Financial Services', 'Full-time', '$110k - $150k', 'Analyze investments...', 'Strong math skills'),
            ('Creative Strategist', 'Vivid Collective', 'London, UK', 'Creative Arts', 'Hybrid', '£70k - £90k', 'Be creative...', 'Agency experience')
        ");
    }
    
    echo "Jobs tables created and seeded.\n";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
