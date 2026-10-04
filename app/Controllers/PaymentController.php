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
            'extraCss' => '/assets/css/extended.css'
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
                die("Invalid callback signature");
            }
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("SELECT * FROM donations WHERE transaction_id = ?");
            $stmt->execute([$txnId]);
            $donation = $stmt->fetch(\PDO::FETCH_OBJ);

            if ($donation) {
                if ($status === 'success') {
                    $pdo->prepare("UPDATE donations SET status = 'completed' WHERE transaction_id = ?")->execute([$txnId]);
                    
                    // Update campaign total
                    $pdo->prepare("UPDATE campaigns SET raised_amount = raised_amount + ? WHERE id = ?")->execute([$donation->amount, $donation->campaign_id]);
                    
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
