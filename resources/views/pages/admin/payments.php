<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">Payments & Revenue</h2>
    <p class="text-sm text-muted">Track donations and platform transactions.</p>
</div>

<div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden;">
    <table style="width:100%; border-collapse:collapse; text-align:left;">
        <thead style="background:#f8fafc; border-bottom:1px solid var(--color-border);">
            <tr>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Date</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">User ID</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Amount</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Txn ID</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($payments)): ?>
                <tr><td colspan="5" style="padding:20px; text-align:center;">No payments found.</td></tr>
            <?php else: ?>
                <?php foreach($payments as $p): ?>
                    <tr style="border-bottom:1px solid var(--color-border);">
                        <td style="padding:16px; font-size:0.9rem;"><?= date('M j, Y H:i', strtotime($p->created_at)) ?></td>
                        <td style="padding:16px; font-size:0.9rem; font-weight:600;">#<?= $p->user_id ?></td>
                        <td style="padding:16px; font-size:0.9rem; font-weight:700; color:#059669;">$<?= number_format($p->amount, 2) ?></td>
                        <td style="padding:16px; font-size:0.9rem; color:#64748b;"><?= htmlspecialchars($p->transaction_id) ?></td>
                        <td style="padding:16px; font-size:0.9rem;">
                            <span style="background:#dcfce7; color:#166534; padding:4px 8px; border-radius:12px; font-size:0.75rem; font-weight:700;">
                                <?= htmlspecialchars($p->status) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
