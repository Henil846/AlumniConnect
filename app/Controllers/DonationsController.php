<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class DonationsController {
    public function index() {
        $pdo = Database::getConnection();
        
        $stmt = $pdo->query("SELECT * FROM campaigns ORDER BY created_at DESC");
        $campaigns = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        // Fetch recent donations
        $stmt2 = $pdo->query("SELECT d.*, u.full_name as donor_name, c.title as campaign_title FROM donations d JOIN users u ON d.user_id = u.id JOIN campaigns c ON d.campaign_id = c.id ORDER BY d.created_at DESC LIMIT 5");
        $recentDonations = $stmt2->fetchAll(\PDO::FETCH_OBJ);
        
        return View::render('donations', [
            'title' => 'Donations & Giving — Alumni Connect',
            'activePage' => 'donations',
            'campaigns' => $campaigns,
            'recentDonations' => $recentDonations,
            
        ], 'app');
    }

    public function donate() {
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $campaignId = $_POST['campaign_id'] ?? null;
        $amount = (float) ($_POST['amount'] ?? 0);

        if ($campaignId && $amount > 0) {
            $pdo = Database::getConnection();
            $collegeId = \App\Core\Auth::user()->college_id ?? null;
            $check = $pdo->prepare("SELECT id FROM campaigns WHERE id = ? AND college_id = ?");
            $check->execute([$campaignId, $collegeId]);
            if (!$check->fetch()) {
                http_response_code(403);
                die("Unauthorized to donate to this campaign");
            }
            $txnId = 'TXN_' . strtoupper(uniqid());
            
            // Insert donation as pending
            $stmt = $pdo->prepare("INSERT INTO donations (user_id, campaign_id, amount, status, transaction_id) VALUES (?, ?, ?, 'pending', ?)");
            $stmt->execute([$userId, $campaignId, $amount, $txnId]);
            
            // Generate HMAC signature to prevent callback forgery
            $secret = \App\Core\Env::get('APP_SECRET', 'fallback_secret_key');
            $sig = hash_hmac('sha256', $txnId, $secret);
            
            header("Location: /payment/checkout?txn_id=" . urlencode($txnId) . "&sig=" . urlencode($sig));
            exit;
        }

        header("Location: /donations?error=1");
        exit;
    }
}
