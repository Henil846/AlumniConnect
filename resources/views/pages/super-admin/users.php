<!-- SCROLLABLE CONTENT -->
<div style="padding: 32px 40px; flex: 1;">
  
  <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:28px;">
    <div>
      <h1 style="font-size:1.8rem; font-weight:800; color:#0f172a; margin:0 0 4px;">User Directory & Moderation</h1>
      <p style="font-size:0.95rem; color:#64748b; margin:0;">Global user accounts across all tenant institutions. Search, review, and toggle account access.</p>
    </div>
  </div>

  <!-- STAT CARDS -->
  <div class="admin-stats-grid">
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#e0e7ff; color:#3730a3;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      </div>
      <div>
        <div class="stat-label">Total Users</div>
        <div class="stat-val"><?= number_format($totalUsers ?? 0) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700;">Across all colleges</div>
    </div>
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#dcfce7; color:#15803d;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <div class="stat-label">Active Users</div>
        <div class="stat-val"><?= number_format($activeUsers ?? 0) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700;">Operational status</div>
    </div>
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#fee2e2; color:#b91c1c;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
      </div>
      <div>
        <div class="stat-label">Suspended / Inactive</div>
        <div class="stat-val"><?= number_format($suspendedUsers ?? 0) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#ef4444; font-weight:700;">Restricted access</div>
    </div>
  </div>

  <!-- SEARCH & USERS TABLE -->
  <div class="admin-card" style="margin-bottom:28px;">
    <div class="admin-card-header" style="flex-wrap:wrap; gap:16px;">
      <div>
        <h3 class="admin-card-title">All Registered Users</h3>
        <p class="admin-card-subtitle">Filter by name, email, or role.</p>
      </div>
      <form action="/super-admin/users" method="GET" style="display:flex; gap:8px;">
        <input type="text" name="q" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="Search users..." style="padding:8px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.85rem;" />
        <button type="submit" class="admin-btn-black" style="width:auto; padding:8px 16px; border-radius:8px;">Search</button>
      </form>
    </div>

    <table class="admin-table">
      <thead>
        <tr>
          <th>User</th>
          <th>Role</th>
          <th>Institution</th>
          <th>Joined</th>
          <th>Status</th>
          <th style="text-align:right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($users)): ?>
          <tr><td colspan="6" style="text-align:center; padding:24px; color:#64748b;">No users matched search criteria.</td></tr>
        <?php else: ?>
          <?php foreach ($users as $u): ?>
            <tr>
              <td>
                <div style="display:flex; align-items:center; gap:12px;">
                  <div style="width:36px; height:36px; border-radius:50%; background:#1e293b; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.85rem;">
                    <?= strtoupper(substr($u->full_name ?? 'U', 0, 2)) ?>
                  </div>
                  <div>
                    <div style="font-weight:800; color:#0f172a;"><?= htmlspecialchars($u->full_name ?? 'Unnamed') ?></div>
                    <div style="font-size:0.75rem; color:#64748b;"><?= htmlspecialchars($u->email ?? '') ?></div>
                  </div>
                </div>
              </td>
              <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600; text-transform:uppercase;"><?= htmlspecialchars($u->role ?? 'student') ?></span></td>
              <td style="color:#64748b; font-weight:600;"><?= htmlspecialchars($u->college_name ?? 'Global') ?></td>
              <td style="color:#64748b; font-weight:600;"><?= date('M d, Y', strtotime($u->created_at ?? 'now')) ?></td>
              <td>
                <?php if (($u->status ?? 'active') === 'suspended' || ($u->status ?? '') === 'inactive'): ?>
                  <span class="pill-status-pending" style="background:#fee2e2; color:#b91c1c;">Suspended</span>
                <?php else: ?>
                  <span class="pill-status-active">Active</span>
                <?php endif; ?>
              </td>
              <td style="text-align:right;">
                <form action="/super-admin/users/status" method="POST" style="display:inline; margin:0;">
                  <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                  <input type="hidden" name="user_id" value="<?= $u->id ?>">
                  <?php if (($u->status ?? 'active') === 'suspended' || ($u->status ?? '') === 'inactive'): ?>
                    <input type="hidden" name="status" value="active">
                    <button type="submit" class="admin-btn-outline" style="padding:4px 10px; font-size:0.75rem; color:#15803d; border-color:#15803d;">Activate</button>
                  <?php else: ?>
                    <input type="hidden" name="status" value="suspended">
                    <button type="submit" class="admin-btn-outline" style="padding:4px 10px; font-size:0.75rem; color:#dc2626; border-color:#dc2626;">Deactivate</button>
                  <?php endif; ?>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>
