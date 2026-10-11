<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">College Administrator Dashboard</h2>
    <p class="text-sm text-muted">Manage your institution's students, alumni, events, donations, and reports.</p>
</div>

<div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:20px; margin-bottom:30px;">
    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:20px;">
        <h3 style="margin:0 0 8px 0; color:#64748b; font-size:0.85rem; font-weight:600; text-transform:uppercase;">Total Members</h3>
        <div style="font-size:1.8rem; font-weight:800; color:#0f172a;"><?= number_format($userCount) ?></div>
        <div class="text-xs text-muted" style="margin-top:4px;">Registered on platform</div>
    </div>
    
    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:20px;">
        <h3 style="margin:0 0 8px 0; color:#64748b; font-size:0.85rem; font-weight:600; text-transform:uppercase;">Students</h3>
        <div style="font-size:1.8rem; font-weight:800; color:#2563eb;"><?= number_format($studentCount ?? 0) ?></div>
        <div class="text-xs text-muted" style="margin-top:4px;">Undergraduate & Grad</div>
    </div>

    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:20px;">
        <h3 style="margin:0 0 8px 0; color:#64748b; font-size:0.85rem; font-weight:600; text-transform:uppercase;">Alumni</h3>
        <div style="font-size:1.8rem; font-weight:800; color:#8b5cf6;"><?= number_format($alumniCount ?? 0) ?></div>
        <div class="text-xs text-muted" style="margin-top:4px;">Graduated mentors</div>
    </div>

    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:20px;">
        <h3 style="margin:0 0 8px 0; color:#64748b; font-size:0.85rem; font-weight:600; text-transform:uppercase;">Donations Raised</h3>
        <div style="font-size:1.8rem; font-weight:800; color:#059669;">$<?= number_format($donationTotal ?? 0, 2) ?></div>
        <div class="text-xs text-muted" style="margin-top:4px;">Completed campaigns</div>
    </div>
</div>

<div style="display:flex; flex-wrap:wrap; gap:12px; margin-bottom:30px;">
    <a href="/events-admin" class="btn btn-primary" style="background:#0f172a; color:#fff; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.9rem;">Events Management</a>
    <a href="/admin/moderation" class="btn btn-primary" style="background:#475569; color:#fff; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.9rem;">Moderation Queue</a>
    <a href="/admin/payments" class="btn btn-primary" style="background:#2563eb; color:#fff; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.9rem;">Donation Records</a>
    <a href="/admin/analytics" class="btn btn-primary" style="background:#059669; color:#fff; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.9rem;">Analytics & Reports</a>
</div>

<?php if (!empty($recentUsers)): ?>
<div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:24px;">
    <h3 style="margin:0 0 16px 0; font-size:1.1rem; font-weight:700;">Recent Members</h3>
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
            <?php foreach ($recentUsers as $ru): ?>
            <tr style="border-bottom:1px solid #f1f5f9;">
                <td style="padding:12px 0; font-weight:600;"><?= htmlspecialchars($ru->full_name) ?></td>
                <td style="padding:12px; color:#64748b;"><?= htmlspecialchars($ru->email) ?></td>
                <td style="padding:12px;">
                    <span style="display:inline-block; padding:2px 8px; border-radius:12px; font-size:0.75rem; font-weight:600; background:#f1f5f9; text-transform:uppercase;">
                        <?= htmlspecialchars($ru->role) ?>
                    </span>
                </td>
                <td style="padding:12px;">
                    <span style="display:inline-block; padding:2px 8px; border-radius:12px; font-size:0.75rem; font-weight:600; background:<?= ($ru->status ?? 'active') === 'active' ? '#dcfce7; color:#15803d;' : '#fee2e2; color:#b91c1c;' ?>">
                        <?= htmlspecialchars(ucfirst($ru->status ?? 'active')) ?>
                    </span>
                </td>
                <td style="padding:12px; text-align:right;">
                    <form action="/admin/users/status" method="POST" style="display:inline; margin:0;">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                        <input type="hidden" name="user_id" value="<?= $ru->id ?>">
                        <input type="hidden" name="status" value="<?= ($ru->status ?? 'active') === 'active' ? 'suspended' : 'active' ?>">
                        <button type="submit" style="padding:4px 10px; font-size:0.8rem; border-radius:6px; border:1px solid #cbd5e1; background:#fff; cursor:pointer;">
                            <?= ($ru->status ?? 'active') === 'active' ? 'Suspend' : 'Activate' ?>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
