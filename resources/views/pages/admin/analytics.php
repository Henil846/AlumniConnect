<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">Platform Analytics</h2>
    <p class="text-sm text-muted">Traffic and engagement metrics.</p>
</div>

<div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden;">
    <table style="width:100%; border-collapse:collapse; text-align:left;">
        <thead style="background:#f8fafc; border-bottom:1px solid var(--color-border);">
            <tr>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Page URL</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Total Views</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($views)): ?>
                <tr><td colspan="2" style="padding:20px; text-align:center;">No analytics data recorded yet.</td></tr>
            <?php else: ?>
                <?php foreach($views as $v): ?>
                    <tr style="border-bottom:1px solid var(--color-border);">
                        <td style="padding:16px; font-size:0.9rem; font-weight:600; color:#2563eb;"><?= htmlspecialchars($v->page_url) ?></td>
                        <td style="padding:16px; font-size:0.9rem; font-weight:800; color:#0f172a;"><?= number_format($v->count) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
