<!-- SCROLLABLE CONTENT -->
<div style="padding: 32px 40px; flex: 1;">
  
  <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:28px;">
    <div>
      <h1 style="font-size:1.8rem; font-weight:800; color:#0f172a; margin:0 0 4px;">Security & Audit Logs</h1>
      <p style="font-size:0.95rem; color:#64748b; margin:0;">Platform authentication telemetry, brute-force rate-limiting, and tenant access monitoring.</p>
    </div>
  </div>

  <!-- STAT CARDS -->
  <div class="admin-stats-grid">
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#e0e7ff; color:#3730a3;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      </div>
      <div>
        <div class="stat-label">Total Logged Attempts</div>
        <div class="stat-val"><?= number_format($totalAttempts ?? 0) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700;">Recorded in ledger</div>
    </div>
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#fee2e2; color:#b91c1c;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      </div>
      <div>
        <div class="stat-label">Security Events</div>
        <div class="stat-val"><?= number_format($failedAttempts ?? 0) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#ef4444; font-weight:700;">Rate limit checks</div>
    </div>
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#dcfce7; color:#15803d;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <div class="stat-label">Firewall & CSRF Shield</div>
        <div class="stat-val">Enforced</div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700;">Strict cookie + token</div>
    </div>
  </div>

  <!-- SECURITY LOGS TABLE -->
  <div class="admin-card" style="margin-bottom:28px;">
    <div class="admin-card-header">
      <div>
        <h3 class="admin-card-title">Recent Audit Log Events</h3>
        <p class="admin-card-subtitle">Real-time cryptographic ledger of logins, role updates, institution tier modifications, and access attempts.</p>
      </div>
    </div>

    <table class="admin-table">
      <thead>
        <tr>
          <th>Timestamp</th>
          <th>Actor / Target</th>
          <th>IP Address</th>
          <th>Event Type</th>
          <th>Details</th>
          <th style="text-align:right;">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($attempts)): ?>
          <tr><td colspan="6" style="text-align:center; padding:24px; color:#64748b;">No recent security events logged.</td></tr>
        <?php else: ?>
          <?php foreach ($attempts as $evt): ?>
            <tr>
              <td style="color:#64748b; font-weight:600; white-space:nowrap;"><?= date('M d, Y H:i:s', strtotime($evt->created_at ?? $evt->attempt_time ?? 'now')) ?></td>
              <td style="font-weight:700; color:#0f172a;"><?= htmlspecialchars($evt->actor_email ?? $evt->email ?? 'System') ?></td>
              <td style="font-family:monospace; font-size:0.85rem; color:#475569;"><?= htmlspecialchars($evt->ip_address ?? '127.0.0.1') ?></td>
              <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600; text-transform:uppercase;"><?= htmlspecialchars($evt->event_type ?? $evt->action ?? 'auth_event') ?></span></td>
              <td style="color:#475569; font-size:0.85rem;"><?= htmlspecialchars($evt->details ?? 'Event logged successfully') ?></td>
              <td style="text-align:right;">
                <span class="pill-status-active">Audited</span>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>
