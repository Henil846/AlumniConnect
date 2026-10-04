<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">Moderation & Reports</h2>
    <p class="text-sm text-muted">Manage reported content and users.</p>
</div>

<div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden;">
    <table style="width:100%; border-collapse:collapse; text-align:left;">
        <thead style="background:#f8fafc; border-bottom:1px solid var(--color-border);">
            <tr>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">ID</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Type</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Reason</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Status</th>
                <th style="padding:16px; font-weight:600; color:#475569; font-size:0.85rem;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($reports)): ?>
                <tr><td colspan="5" style="padding:20px; text-align:center;">No reports found.</td></tr>
            <?php else: ?>
                <?php foreach($reports as $r): ?>
                    <tr style="border-bottom:1px solid var(--color-border);">
                        <td style="padding:16px; font-size:0.9rem;">#<?= $r->id ?></td>
                        <td style="padding:16px; font-size:0.9rem; font-weight:600; text-transform:uppercase;"><?= htmlspecialchars($r->reported_item_type) ?></td>
                        <td style="padding:16px; font-size:0.9rem;"><?= htmlspecialchars($r->reason) ?></td>
                        <td style="padding:16px; font-size:0.9rem;">
                            <span style="background:<?= $r->status === 'resolved' ? '#dcfce7; color:#166534;' : '#fef9c3; color:#854d0e;' ?> padding:4px 8px; border-radius:12px; font-size:0.75rem; font-weight:700;">
                                <?= htmlspecialchars($r->status) ?>
                            </span>
                        </td>
                        <td style="padding:16px;">
                            <?php if ($r->status === 'pending'): ?>
                                <form action="/admin/moderation/resolve" method="POST">
                                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                                    <input type="hidden" name="id" value="<?= $r->id ?>">
                                    <button type="submit" style="background:#0f172a; color:#fff; border:none; padding:6px 12px; border-radius:4px; font-weight:600; cursor:pointer;">Resolve</button>
                                </form>
                            <?php else: ?>
                                <span style="color:#94a3b8; font-size:0.85rem;">Done</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
