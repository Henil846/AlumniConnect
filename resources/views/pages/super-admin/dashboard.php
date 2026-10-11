<!-- SCROLLABLE DASHBOARD -->
<div style="padding: 32px 40px; flex: 1;">
  
    <?php if (isset($_GET['verified'])): ?>
      <div style="background:#dcfce7; color:#15803d; padding:12px 18px; border-radius:12px; margin-bottom:24px; font-weight:700;">
        User verification updated successfully.
      </div>
    <?php endif; ?>
    <?php if (isset($_GET['declined'])): ?>
      <div style="background:#fee2e2; color:#b91c1c; padding:12px 18px; border-radius:12px; margin-bottom:24px; font-weight:700;">
        User status updated to declined/suspended.
      </div>
    <?php endif; ?>

    <!-- 4 STAT CARDS -->
    <div class="admin-stats-grid">

      <!-- Stat 1 -->
      <a href="/super-admin/institutions" class="admin-stat-card" style="text-decoration:none; color:inherit; cursor:pointer;">
        <div class="stat-icon-box" style="background:#0f172a; color:#fff;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        </div>
        <div>
          <div class="stat-label">Total Students</div>
          <div class="stat-val"><?= number_format($stats['total_students'] ?? 0) ?></div>
        </div>
        <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          Active across network
        </div>
      </a>

      <!-- Stat 2 -->
      <a href="/super-admin/institutions" class="admin-stat-card" style="text-decoration:none; color:inherit; cursor:pointer;">
        <div class="stat-icon-box" style="background:#fef3c7; color:#b45309;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
        </div>
        <div>
          <div class="stat-label">Alumni</div>
          <div class="stat-val"><?= number_format($stats['total_alumni'] ?? 0) ?></div>
        </div>
        <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          Registered members
        </div>
      </a>

      <!-- Stat 3 -->
      <a href="/jobs" class="admin-stat-card" style="text-decoration:none; color:inherit; cursor:pointer;">
        <div class="stat-icon-box" style="background:#f1f5f9; color:#475569;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
        </div>
        <div>
          <div class="stat-label">Active Jobs</div>
          <div class="stat-val"><?= number_format($stats['active_jobs'] ?? 0) ?></div>
        </div>
        <div style="font-size:0.82rem; color:#64748b; font-weight:600; display:flex; align-items:center; gap:6px;">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          Opportunities open
        </div>
      </a>

      <!-- Stat 4 (Dark Card) -->
      <a href="/super-admin/revenue" class="admin-stat-card dark-card" style="text-decoration:none; cursor:pointer;">
        <div class="stat-icon-box" style="background:#b45309; color:#fff;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
        </div>
        <div>
          <div class="stat-label" style="color:rgba(255,255,255,0.7);">Total Revenue</div>
          <div class="stat-val">$<?= number_format($stats['total_revenue'] ?? 0, 2) ?></div>
        </div>
        <div style="font-size:0.82rem; color:#34d399; font-weight:700; display:flex; align-items:center; gap:6px;">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
          Processed locally
        </div>
      </a>

    </div>

  <!-- MAIN 2-COLUMN DASHBOARD GRID -->
  <div class="admin-row-2-1">
    
    <!-- LEFT COLUMN -->
    <div style="display:flex; flex-direction:column; gap:24px;">
      
      <!-- Pending Verifications Table -->
      <div class="admin-card">
        <div class="admin-card-header">
          <div>
            <h3 class="admin-card-title">User Verifications & Activity</h3>
            <p class="admin-card-subtitle">Review registered users and identity status.</p>
          </div>
          <a href="/super-admin/institutions" style="color:#b45309; font-weight:800; font-size:0.85rem; text-decoration:none;">View All Institutions</a>
        </div>

        <table class="admin-table">
          <thead>
            <tr>
              <th>Name & Profile</th>
              <th>College</th>
              <th>Role</th>
              <th style="text-align:right;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pendingUsers)): ?>
              <tr><td colspan="4" style="text-align:center; padding:20px; color:#64748b;">No recent users recorded.</td></tr>
            <?php else: ?>
              <?php foreach ($pendingUsers as $pu): ?>
                <tr>
                  <td>
                    <div style="display:flex; align-items:center; gap:12px;">
                      <div style="width:36px; height:36px; border-radius:50%; background:#0f172a; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.85rem;">
                        <?= strtoupper(substr($pu->full_name, 0, 2)) ?>
                      </div>
                      <div>
                        <div style="font-weight:800; color:#0f172a;"><?= htmlspecialchars($pu->full_name) ?></div>
                        <div style="font-size:0.75rem; color:#64748b;"><?= htmlspecialchars($pu->email) ?></div>
                      </div>
                    </div>
                  </td>
                  <td style="font-weight:700;"><?= htmlspecialchars($pu->college_name ?? 'Central') ?></td>
                  <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600; color:#475569;"><?= ucfirst(htmlspecialchars($pu->role)) ?></span></td>
                  <td style="text-align:right;">
                    <div style="display:inline-flex; gap:6px;">
                      <form action="/super-admin/users/verify" method="POST" style="margin:0;">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                        <input type="hidden" name="user_id" value="<?= $pu->id ?>">
                        <button type="submit" class="badge-verify">Verify</button>
                      </form>
                      <form action="/super-admin/users/decline" method="POST" style="margin:0;">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                        <input type="hidden" name="user_id" value="<?= $pu->id ?>">
                        <button type="submit" class="badge-decline">Decline</button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Recent Donations Card -->
      <div class="admin-card">
        <h3 class="admin-card-title" style="margin-bottom:20px;">Recent Platform Donations</h3>
        <div style="display:flex; flex-direction:column; gap:16px;">
          <?php if (empty($recentDonations)): ?>
            <p style="color:#64748b; text-align:center; padding:16px;">No recent donations recorded.</p>
          <?php else: ?>
            <?php foreach ($recentDonations as $rd): ?>
              <div style="display:flex; justify-content:space-between; align-items:center; padding-bottom:14px; border-bottom:1px solid #f1f5f9;">
                <div style="display:flex; align-items:center; gap:14px;">
                  <span style="background:#fef3c7; color:#b45309; width:38px; height:38px; border-radius:10px; display:flex; align-items:center; justify-content:center;">💵</span>
                  <div>
                    <span style="font-size:1.1rem; font-weight:900; color:#0f172a;">$<?= number_format($rd->amount, 2) ?></span>
                    <div style="font-size:0.75rem; color:#64748b;"><?= htmlspecialchars($rd->user_name) ?></div>
                  </div>
                </div>
                <span style="font-weight:600; color:#64748b;"><?= htmlspecialchars($rd->campaign_title ?? 'Alumni Fund') ?></span>
                <span class="pill-status-active"><?= ucfirst(htmlspecialchars($rd->status)) ?></span>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

    </div>

    <!-- RIGHT COLUMN -->
    <div style="display:flex; flex-direction:column; gap:24px;">
      
      <!-- Dashboard Guide Card -->
      <div class="guide-card">
        <h3 style="font-size:1.25rem; font-weight:800; color:#0f172a; margin:0 0 12px;">Platform Console</h3>
        <p style="font-size:0.9rem; color:#334155; line-height:1.5; margin:0 0 20px;">
          Manage institutions, oversee platform subscriptions, review system analytics, and export revenue reports.
        </p>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
          <button type="button" onclick="window.location.href='/community'" style="background:#ffffff; border:1px solid #fef08a; padding:12px; border-radius:12px; font-weight:700; font-size:0.82rem; color:#0f172a; display:flex; align-items:center; justify-content:center; gap:8px; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.04);">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            Announcements
          </button>
          <button type="button" style="background:#ffffff; border:1px solid #fef08a; padding:12px; border-radius:12px; font-weight:700; font-size:0.82rem; color:#0f172a; display:flex; align-items:center; justify-content:center; gap:8px; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.04);" onclick="window.location.href='/super-admin/revenue?export=csv'">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            Export Reports
          </button>
        </div>
      </div>

      <!-- Quick Links Card -->
      <div class="admin-card">
        <div class="admin-card-header" style="margin-bottom:16px;">
          <div>
            <h3 class="admin-card-title">Quick Administration</h3>
            <p class="admin-card-subtitle">Direct access to primary administrative modules.</p>
          </div>
        </div>
        <div style="display:flex; flex-direction:column; gap:10px;">
          <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:12px; border:1px solid #fef9c3; background:#fefce8;">
            <div style="width:36px; height:36px; border-radius:10px; background:#fef3c7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#b45309" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            </div>
            <div style="flex:1;">
              <div style="font-size:0.85rem; font-weight:700; color:#0f172a;">Manage Institutions</div>
              <div style="font-size:0.72rem; color:#64748b;">Colleges & Subscriptions</div>
            </div>
            <a href="/super-admin/institutions" style="background:#0f172a; color:#fff; font-size:0.72rem; font-weight:700; padding:6px 12px; border-radius:8px; text-decoration:none; flex-shrink:0;">View</a>
          </div>
          <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:12px; border:1px solid #fecdd3; background:#fff1f2;">
            <div style="width:36px; height:36px; border-radius:10px; background:#fee2e2; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#dc2626" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <div style="flex:1;">
              <div style="font-size:0.85rem; font-weight:700; color:#0f172a;">Events Console</div>
              <div style="font-size:0.72rem; color:#64748b;">All campus events</div>
            </div>
            <a href="/events-admin" style="background:#0f172a; color:#fff; font-size:0.72rem; font-weight:700; padding:6px 12px; border-radius:8px; text-decoration:none; flex-shrink:0;">View</a>
          </div>
          <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:12px; border:1px solid #e0e7ff; background:#eef2ff;">
            <div style="width:36px; height:36px; border-radius:10px; background:#e0e7ff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#3730a3" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            </div>
            <div style="flex:1;">
              <div style="font-size:0.85rem; font-weight:700; color:#0f172a;">Mentorship Directory</div>
              <div style="font-size:0.72rem; color:#64748b;">Mentor network</div>
            </div>
            <a href="/mentorship" style="background:#0f172a; color:#fff; font-size:0.72rem; font-weight:700; padding:6px 12px; border-radius:8px; text-decoration:none; flex-shrink:0;">View</a>
          </div>
          <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:12px; border:1px solid #dcfce7; background:#f0fdf4;">
            <div style="width:36px; height:36px; border-radius:10px; background:#dcfce7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#15803d" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <div style="flex:1;">
              <div style="font-size:0.85rem; font-weight:700; color:#0f172a;">Job Board</div>
              <div style="font-size:0.72rem; color:#64748b;">Career postings</div>
            </div>
            <a href="/jobs" style="background:#0f172a; color:#fff; font-size:0.72rem; font-weight:700; padding:6px 12px; border-radius:8px; text-decoration:none; flex-shrink:0;">View</a>
          </div>
        </div>
      </div>

      <!-- Quick Navigation -->
      <div class="admin-card">
        <div class="admin-card-header">
          <h3 class="admin-card-title">Campus Events</h3>
          <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#64748b" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        </div>
        <p style="font-size:0.85rem; color:#64748b; margin-bottom:16px;">Access upcoming events, alumni mixers, and check-ins.</p>
        <button type="button" style="background:#ffffff; border:1px solid #cbd5e1; width:100%; padding:10px; border-radius:20px; font-weight:700; color:#0f172a; cursor:pointer;" onclick="window.location.href='/events'">View All Events</button>
      </div>

    </div>

  </div>

</div>