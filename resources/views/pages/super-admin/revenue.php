<!-- SCROLLABLE CONTENT -->
<div style="padding: 32px 40px; flex: 1;">
  
  <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:28px;">
    <div>
      <h1 style="font-size:1.8rem; font-weight:800; color:#0f172a; margin:0 0 4px;">Revenue & Donations</h1>
      <p style="font-size:0.95rem; color:#64748b; margin:0;">Track fundraising progress, corporate sponsorships, and institutional revenue.</p>
    </div>
    <div style="display:flex; gap:8px;">
      <button type="button" onclick="window.location.href='/super-admin/revenue'" style="background:#0f172a; border:none; padding:8px 16px; border-radius:20px; font-weight:700; font-size:0.82rem; color:#fff; cursor:pointer;">All Time</button>
      <a href="/super-admin/revenue?export=csv" class="admin-btn-black" style="width:auto; padding:8px 18px; border-radius:20px; text-decoration:none; display:inline-flex; align-items:center; font-size:0.82rem; font-weight:700; background:#059669; color:#fff;">Download CSV Export</a>
    </div>
  </div>

  <!-- 4 STAT CARDS -->
  <div class="admin-stats-grid">
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#dcfce7; color:#15803d;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
      </div>
      <div>
        <div class="stat-label">Total Raised</div>
        <div class="stat-val">$<?= number_format($totalRevenue ?? 0, 2) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
        Across all campaigns
      </div>
    </div>
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#fef3c7; color:#b45309;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      </div>
      <div>
        <div class="stat-label">Total Donors</div>
        <div class="stat-val"><?= number_format($totalDonors ?? 0) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Contributing alumni
      </div>
    </div>
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#e0e7ff; color:#3730a3;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
      </div>
      <div>
        <div class="stat-label">Transactions</div>
        <div class="stat-val"><?= count($transactions ?? []) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
        Processed records
      </div>
    </div>
    <div class="admin-stat-card dark-card">
      <div class="stat-icon-box" style="background:#b45309; color:#fff;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
      </div>
      <div>
        <div class="stat-label" style="color:rgba(255,255,255,0.7);">Gateway Status</div>
        <div class="stat-val">Active</div>
      </div>
      <div style="font-size:0.82rem; color:#34d399; font-weight:700;">Simulated sandbox</div>
    </div>
  </div>

  <!-- RECENT DONATIONS TABLE -->
  <div class="admin-card" style="margin-bottom:28px;">
    <div class="admin-card-header">
      <div>
        <h3 class="admin-card-title">Donation Transactions</h3>
        <p class="admin-card-subtitle">Real-time ledger of contributions from alumni, institutions, and corporate sponsors.</p>
      </div>
      <a href="/super-admin/revenue?export=csv" class="admin-btn-black" style="width:auto; padding:8px 18px; text-decoration:none; font-size:0.85rem; font-weight:700;">Export to CSV</a>
    </div>
    <table class="admin-table">
      <thead>
        <tr>
          <th>Donor</th>
          <th>Amount</th>
          <th>Fund / Campaign</th>
          <th>College</th>
          <th>Date</th>
          <th style="text-align:right;">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($transactions)): ?>
          <tr><td colspan="6" style="text-align:center; padding:24px; color:#64748b;">No transactions recorded in database.</td></tr>
        <?php else: ?>
          <?php foreach ($transactions as $tx): ?>
            <tr>
              <td>
                <div style="display:flex; align-items:center; gap:12px;">
                  <div style="width:36px; height:36px; border-radius:50%; background:#1e293b; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.85rem;">
                    <?= strtoupper(substr($tx->user_name, 0, 2)) ?>
                  </div>
                  <div>
                    <div style="font-weight:800; color:#0f172a;"><?= htmlspecialchars($tx->user_name) ?></div>
                    <div style="font-size:0.75rem; color:#64748b;">Txn: <?= htmlspecialchars($tx->transaction_id ?? ('TX-'.$tx->id)) ?></div>
                  </div>
                </div>
              </td>
              <td style="font-weight:900; color:#15803d;">$<?= number_format($tx->amount, 2) ?></td>
              <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600; color:#475569;"><?= htmlspecialchars($tx->campaign_title ?? 'General Fund') ?></span></td>
              <td style="color:#64748b; font-weight:600;"><?= htmlspecialchars($tx->college_name ?? 'Central') ?></td>
              <td style="color:#64748b; font-weight:600;"><?= date('M d, Y', strtotime($tx->created_at ?? 'now')) ?></td>
              <td style="text-align:right;">
                <span class="pill-status-active"><?= ucfirst(htmlspecialchars($tx->status)) ?></span>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>