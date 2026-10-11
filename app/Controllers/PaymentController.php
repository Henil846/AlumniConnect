<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class PaymentController {
    public function checkout() {
        $txnId = $_GET['txn_id'] ?? null;
        $sig = $_GET['sig'] ?? null;
        if (!$txnId || !$sig) {
            die("Transaction ID or Signature missing");
        }
        
        $secret = \App\Core\Env::get('APP_SECRET', 'fallback_secret_key');
        $expectedSig = hash_hmac('sha256', $txnId, $secret);
        if (!hash_equals($expectedSig, $sig)) {
            die("Invalid transaction signature");
        }
        
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM donations WHERE transaction_id = ?");
        $stmt->execute([$txnId]);
        $donation = $stmt->fetch(\PDO::FETCH_OBJ);
        
        if (!$donation) {
            die("Transaction not found");
        }
        
        if ($donation->status === 'completed') {
            die("Transaction already completed");
        }

        return View::render('payment/checkout', [
            'title' => 'Sandbox Gateway Checkout',
            'activePage' => 'payment',
            'donation' => $donation,
            'sig' => $sig,
            
        ], 'app');
    }

    public function callback() {
        $txnId = $_POST['txn_id'] ?? null;
        $status = $_POST['status'] ?? 'failed';
        $sig = $_POST['sig'] ?? null;

        if ($txnId && $sig) {
            $secret = \App\Core\Env::get('APP_SECRET', 'fallback_secret_key');
            $expectedSig = hash_hmac('sha256', $txnId, $secret);
            if (!hash_equals($expectedSig, $sig)) {
                http_response_code(403);
                die("Invalid callback signature");
            }
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("SELECT * FROM donations WHERE transaction_id = ?");
            $stmt->execute([$txnId]);
            $donation = $stmt->fetch(\PDO::FETCH_OBJ);

            if ($donation) {
                if ($donation->status === 'completed') {
                    // Replayed callback: Prevent double-counting campaign total
                    header("Location: /donations?already_completed=1");
                    exit;
                }

                if ($status === 'success') {
                    $pdo->prepare("UPDATE donations SET status = 'completed' WHERE transaction_id = ?")->execute([$txnId]);
                    
                    // Update campaign total
                    $pdo->prepare("UPDATE campaigns SET raised_amount = raised_amount + ? WHERE id = ?")->execute([$donation->amount, $donation->campaign_id]);
                    
                    // Fetch campaign details
                    $campStmt = $pdo->prepare("SELECT title, created_by, college_id FROM campaigns WHERE id = ?");
                    $campStmt->execute([$donation->campaign_id]);
                    $camp = $campStmt->fetch(\PDO::FETCH_OBJ);
                    $campTitle = $camp ? $camp->title : 'Campaign';
                    $collegeId = $camp ? $camp->college_id : $donation->college_id;

                    // Notification for Donor
                    $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id, link) VALUES (?, 'donation', ?, ?, '/donations')");
                    $notifStmt->execute([$donation->user_id, "Thank you! Your donation of ₹" . number_format($donation->amount, 2) . " to '$campTitle' was successful.", $collegeId]);

                    // Notification for Campaign Creator
                    if ($camp && $camp->created_by && $camp->created_by != $donation->user_id) {
                        $donorName = $pdo->query("SELECT full_name FROM users WHERE id = " . intval($donation->user_id))->fetchColumn() ?: 'An anonymous donor';
                        $notifStmt->execute([$camp->created_by, "New donation of ₹" . number_format($donation->amount, 2) . " received from $donorName for '$campTitle'.", $collegeId]);
                    }

                    header("Location: /donations?success=1");
                    exit;
                } else {
                    $pdo->prepare("UPDATE donations SET status = 'failed' WHERE transaction_id = ?")->execute([$txnId]);
                    header("Location: /donations?error=Payment+Failed");
                    exit;
                }
            }
        }
        
        header("Location: /donations?error=Invalid+Transaction");
        exit;
    }
}
