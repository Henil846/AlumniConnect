<div style="max-width:500px; margin:60px auto; background:#fff; padding:40px; border-radius:12px; border:1px solid #e2e8f0; text-align:center;">
    <h2 style="font-size:1.5rem; font-weight:800; margin-bottom:12px;">Sandbox Payment Gateway</h2>
    <p style="color:#64748b; margin-bottom:24px;">This is a simulated payment gateway for testing.</p>
    
    <div style="background:#f8fafc; padding:20px; border-radius:8px; margin-bottom:32px; text-align:left;">
        <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
            <span style="font-weight:600; color:#475569;">Transaction ID</span>
            <span style="font-family:monospace;"><?= htmlspecialchars($donation->transaction_id) ?></span>
        </div>
        <div style="display:flex; justify-content:space-between;">
            <span style="font-weight:600; color:#475569;">Amount</span>
            <span style="font-weight:700; color:#0f172a;"><?= \App\Core\CurrencyHelper::formatINR($donation->amount) ?></span>
        </div>
    </div>
    
    <div style="display:flex; gap:16px; justify-content:center;">
        <form method="POST" action="/payment/callback">
            <input type="hidden" name="txn_id" value="<?= htmlspecialchars($donation->transaction_id) ?>">
            <input type="hidden" name="sig" value="<?= htmlspecialchars($sig) ?>">
            <input type="hidden" name="status" value="success">
            <button class="btn-primary" style="background:#16a34a; border:none; padding:12px 24px; border-radius:8px; color:#fff; font-weight:700; cursor:pointer;">Simulate Success</button>
        </form>
        <form method="POST" action="/payment/callback">
            <input type="hidden" name="txn_id" value="<?= htmlspecialchars($donation->transaction_id) ?>">
            <input type="hidden" name="sig" value="<?= htmlspecialchars($sig) ?>">
            <input type="hidden" name="status" value="failed">
            <button class="btn-primary" style="background:#dc2626; border:none; padding:12px 24px; border-radius:8px; color:#fff; font-weight:700; cursor:pointer;">Simulate Failure</button>
        </form>
    </div>
</div>
