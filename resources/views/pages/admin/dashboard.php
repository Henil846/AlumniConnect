<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">Super Admin Dashboard</h2>
    <p class="text-sm text-muted">Platform overview.</p>
</div>

<div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:24px;">
        <h3 style="margin:0 0 8px 0; color:#64748b; font-size:1rem; font-weight:600;">Total Users</h3>
        <div style="font-size:2rem; font-weight:800; color:#0f172a;"><?= number_format($userCount) ?></div>
    </div>
    
    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:24px;">
        <h3 style="margin:0 0 8px 0; color:#64748b; font-size:1rem; font-weight:600;">Total Revenue / Donations</h3>
        <div style="font-size:2rem; font-weight:800; color:#059669;">$<?= number_format($donationTotal ?? 0, 2) ?></div>
    </div>
</div>

<div style="margin-top:24px; display:flex; gap:12px;">
    <a href="/admin/moderation" class="btn btn-primary" style="background:#0f172a; color:#fff; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:600;">Moderation</a>
    <a href="/admin/payments" class="btn btn-primary" style="background:#2563eb; color:#fff; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:600;">Payments</a>
    <a href="/admin/analytics" class="btn btn-primary" style="background:#475569; color:#fff; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:600;">Analytics</a>
</div>
