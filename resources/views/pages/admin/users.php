<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">Campus User Directory</h2>
    <p class="text-sm text-muted">Manage registered students and alumni accounts within your college.</p>
</div>

<div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:24px;">
    <h3 style="margin:0 0 16px 0; font-size:1.1rem; font-weight:700;">All Campus Members (<?= count($users) ?>)</h3>
    <table style="width:100%; border-collapse:collapse; text-align:left; font-size:0.9rem;">
        <thead>
            <tr style="border-bottom:1px solid #e2e8f0; color:#64748b;">
                <th style="padding:10px 0;">Name</th>
                <th style="padding:10px;">Email</th>
                <th style="padding:10px;">Role</th>
                <th style="padding:10px;">Status</th>
                <th style="padding:10px; text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
            <tr style="border-bottom:1px solid #f1f5f9;">
                <td style="padding:12px 0; font-weight:600;"><?= htmlspecialchars($u->full_name) ?></td>
                <td style="padding:12px; color:#64748b;"><?= htmlspecialchars($u->email) ?></td>
                <td style="padding:12px;">
                    <span style="display:inline-block; padding:2px 8px; border-radius:12px; font-size:0.75rem; font-weight:600; background:#f1f5f9; text-transform:uppercase;">
                        <?= htmlspecialchars($u->role) ?>
                    </span>
                </td>
                <td style="padding:12px;">
                    <span style="display:inline-block; padding:2px 8px; border-radius:12px; font-size:0.75rem; font-weight:600; background:<?= ($u->status ?? 'active') === 'active' ? '#dcfce7; color:#15803d;' : '#fee2e2; color:#b91c1c;' ?>">
                        <?= htmlspecialchars(ucfirst($u->status ?? 'active')) ?>
                    </span>
                </td>
                <td style="padding:12px; text-align:right;">
                    <form action="/admin/users/status" method="POST" style="display:inline; margin:0;">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                        <input type="hidden" name="user_id" value="<?= $u->id ?>">
                        <input type="hidden" name="status" value="<?= ($u->status ?? 'active') === 'active' ? 'suspended' : 'active' ?>">
                        <button type="submit" class="btn-toggle-status" style="padding:4px 10px; font-size:0.8rem; border-radius:6px; border:1px solid #cbd5e1; background:#fff; cursor:pointer;">
                            <?= ($u->status ?? 'active') === 'active' ? 'Suspend' : 'Activate' ?>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
