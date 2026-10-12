<!-- SCROLLABLE CONTENT -->
<div style="padding: 32px 40px; flex: 1;">
  
  <!-- Page Title Row -->
  <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:28px;">
    <div>
      <h1 style="font-size:1.8rem; font-weight:800; color:#0f172a; margin:0 0 4px;">Institution Management</h1>
      <p style="font-size:0.95rem; color:#64748b; margin:0;">Real-time management across all collegiate institutions and subscription tiers.</p>
    </div>
    <div style="display:flex; gap:12px;">
      <button type="button" onclick="document.getElementById('new-institution-card').style.display = document.getElementById('new-institution-card').style.display === 'none' ? 'block' : 'none'" class="admin-btn-black" style="padding:10px 20px; font-size:0.85rem; font-weight:700; width:auto; cursor:pointer;">+ Onboard Institution</button>
    </div>
  </div>

  <?php if (isset($_GET['created'])): ?>
    <div style="background:#dcfce7; color:#15803d; padding:12px 18px; border-radius:12px; margin-bottom:24px; font-weight:700;">
      Institution and administrator account created successfully.
    </div>
  <?php endif; ?>
  <?php if (isset($_GET['updated']) || isset($_GET['tier_updated'])): ?>
    <div style="background:#dcfce7; color:#15803d; padding:12px 18px; border-radius:12px; margin-bottom:24px; font-weight:700;">
      Institution configuration updated successfully.
    </div>
  <?php endif; ?>

  <!-- NEW INSTITUTION CARD (Collapsible) -->
  <div id="new-institution-card" class="admin-card" style="display:none; margin-bottom:28px; background:#f8fafc; border:2px dashed #cbd5e1;">
    <h3 class="admin-card-title" style="margin-bottom:16px;">Onboard New Collegiate Institution</h3>
    <form action="/super-admin/institutions/create" method="POST" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap:16px;">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
      <div>
        <label style="font-size:0.75rem; font-weight:700; color:#475569; display:block; margin-bottom:4px;">INSTITUTION NAME</label>
        <input type="text" name="name" required placeholder="e.g. Stanford University" style="width:100%; padding:10px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem;" />
      </div>
      <div>
        <label style="font-size:0.75rem; font-weight:700; color:#475569; display:block; margin-bottom:4px;">SLUG / DOMAIN ID</label>
        <input type="text" name="slug" placeholder="e.g. stanford" style="width:100%; padding:10px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem;" />
      </div>
      <div>
        <label style="font-size:0.75rem; font-weight:700; color:#475569; display:block; margin-bottom:4px;">SUBSCRIPTION TIER</label>
        <select name="plan" style="width:100%; padding:10px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem;">
          <option value="Starter">Starter</option>
          <option value="Growth">Growth</option>
          <option value="Enterprise" selected>Enterprise</option>
        </select>
      </div>
      <div>
        <label style="font-size:0.75rem; font-weight:700; color:#475569; display:block; margin-bottom:4px;">ADMIN EMAIL</label>
        <input type="email" name="admin_email" placeholder="admin@institution.edu" style="width:100%; padding:10px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem;" />
      </div>
      <div>
        <label style="font-size:0.75rem; font-weight:700; color:#475569; display:block; margin-bottom:4px;">ADMIN FULL NAME</label>
        <input type="text" name="admin_name" placeholder="Primary Administrator" style="width:100%; padding:10px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem;" />
      </div>
      <div style="display:flex; align-items:flex-end;">
        <button type="submit" class="admin-btn-black" style="padding:10px 24px; font-size:0.9rem; cursor:pointer;">Save & Create</button>
      </div>
    </form>
  </div>

  <!-- 4 STAT CARDS -->
  <div class="admin-stats-grid" style="margin-bottom:32px;">
    
    <!-- Stat 1 -->
    <div class="admin-stat-card">
      <div style="display:flex; justify-content:space-between; align-items:flex-start;">
        <div style="width:44px; height:44px; background:#e0e7ff; color:#3730a3; border-radius:12px; display:flex; align-items:center; justify-content:center;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <span style="background:#dcfce7; color:#15803d; font-size:0.72rem; font-weight:800; padding:4px 8px; border-radius:20px;">Live</span>
      </div>
      <div style="margin-top:20px;">
        <div style="font-size:0.75rem; font-weight:800; color:#64748b; letter-spacing:0.04em; text-transform:uppercase;">TOTAL INSTITUTIONS</div>
        <div style="font-size:2.2rem; font-weight:900; color:#0f172a; margin-top:4px; line-height:1.1;"><?= $totalColleges ?></div>
      </div>
    </div>

    <!-- Stat 2 -->
    <div class="admin-stat-card">
      <div style="display:flex; justify-content:space-between; align-items:flex-start;">
        <div style="width:44px; height:44px; background:#fef3c7; color:#b45309; border-radius:12px; display:flex; align-items:center; justify-content:center;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
        </div>
        <span style="background:#dcfce7; color:#15803d; font-size:0.72rem; font-weight:800; padding:4px 8px; border-radius:20px;">Collected</span>
      </div>
      <div style="margin-top:20px;">
        <div style="font-size:0.75rem; font-weight:800; color:#64748b; letter-spacing:0.04em; text-transform:uppercase;">TOTAL REVENUE</div>
        <div style="font-size:2.2rem; font-weight:900; color:#0f172a; margin-top:4px; line-height:1.1;">$<?= number_format($totalDonations, 2) ?></div>
      </div>
    </div>

    <!-- Stat 3 -->
    <div class="admin-stat-card">
      <div style="display:flex; justify-content:space-between; align-items:flex-start;">
        <div style="width:44px; height:44px; background:#dcfce7; color:#15803d; border-radius:12px; display:flex; align-items:center; justify-content:center;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <span style="background:#dcfce7; color:#15803d; font-size:0.72rem; font-weight:800; padding:4px 8px; border-radius:20px;">Active</span>
      </div>
      <div style="margin-top:20px;">
        <div style="font-size:0.75rem; font-weight:800; color:#64748b; letter-spacing:0.04em; text-transform:uppercase;">TOTAL USERS</div>
        <div style="font-size:2.2rem; font-weight:900; color:#0f172a; margin-top:4px; line-height:1.1;"><?= number_format($totalUsers) ?></div>
      </div>
    </div>

    <!-- Stat 4 -->
    <div class="admin-stat-card">
      <div style="display:flex; justify-content:space-between; align-items:flex-start;">
        <div style="width:44px; height:44px; background:#fee2e2; color:#b91c1c; border-radius:12px; display:flex; align-items:center; justify-content:center;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <span style="background:#dcfce7; color:#15803d; font-size:0.72rem; font-weight:800; padding:4px 8px; border-radius:20px;">0% Churn</span>
      </div>
      <div style="margin-top:20px;">
        <div style="font-size:0.75rem; font-weight:800; color:#64748b; letter-spacing:0.04em; text-transform:uppercase;">ACTIVE RATE</div>
        <div style="font-size:2.2rem; font-weight:900; color:#0f172a; margin-top:4px; line-height:1.1;">100%</div>
      </div>
    </div>

  </div>

  <!-- RECENT COLLEGES TABLE CARD -->
  <div class="admin-card">
    <div class="admin-card-header" style="margin-bottom:24px;">
      <div>
        <h2 class="admin-card-title">Institutions Registry</h2>
        <p class="admin-card-subtitle">Manage onboarded collegiate institutions, assign tiers, and toggle status.</p>
      </div>
    </div>

    <table class="admin-table">
      <thead>
        <tr>
          <th>INSTITUTION NAME</th>
          <th>PLAN TIER</th>
          <th>STATUS</th>
          <th>USERS</th>
          <th>DATE ADDED</th>
          <th style="text-align:right;">ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($institutions)): ?>
          <tr><td colspan="6" style="text-align:center; padding:20px;">No institutions found in database.</td></tr>
        <?php else: ?>
          <?php foreach ($institutions as $inst): ?>
            <tr>
              <td>
                <div style="display:flex; align-items:center; gap:14px;">
                  <div style="width:44px; height:44px; background:#1e293b; color:#fff; border-radius:10px; font-weight:900; display:flex; align-items:center; justify-content:center; font-size:1rem;">
                    <?= strtoupper(substr($inst->name, 0, 2)) ?>
                  </div>
                  <div>
                    <div style="font-weight:800; font-size:1rem; color:#0f172a;"><?= htmlspecialchars($inst->name) ?></div>
                    <div style="font-size:0.75rem; color:#64748b;">Slug: <?= htmlspecialchars($inst->slug ?? 'col-'.$inst->id) ?></div>
                  </div>
                </div>
              </td>
              <td>
                <form action="/super-admin/institutions/tier" method="POST" class="tier-update-form" style="margin:0; display:inline-flex; align-items:center; gap:6px;">
                  <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                  <input type="hidden" name="id" value="<?= $inst->id ?>">
                  <select name="plan" class="tier-select" style="padding:4px 8px; border-radius:6px; font-weight:700; font-size:0.75rem; border:1px solid #cbd5e1; background:#f8fafc;">
                    <option value="Starter" <?= ($inst->plan ?? 'Starter') === 'Starter' ? 'selected' : '' ?>>Starter</option>
                    <option value="Growth" <?= ($inst->plan ?? '') === 'Growth' ? 'selected' : '' ?>>Growth</option>
                    <option value="Enterprise" <?= ($inst->plan ?? '') === 'Enterprise' ? 'selected' : '' ?>>Enterprise</option>
                  </select>
                  <button type="submit" class="btn-tier-upgrade" style="padding:4px 8px; font-size:0.75rem; font-weight:700; background:#0f172a; color:#fff; border:none; border-radius:6px; cursor:pointer;">Update</button>
                </form>
              </td>
              <td>
                <form action="/super-admin/institutions/status" method="POST" style="margin:0; display:inline-flex;">
                  <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                  <input type="hidden" name="id" value="<?= $inst->id ?>">
                  <input type="hidden" name="status" value="<?= ($inst->status ?? 'active') === 'active' ? 'suspended' : 'active' ?>">
                  <button type="submit" style="background:none; border:none; cursor:pointer; padding:0;">
                    <?php if (($inst->status ?? 'active') === 'active'): ?>
                      <span class="pill-status-active">● Active</span>
                    <?php else: ?>
                      <span style="background:#fee2e2; color:#b91c1c; font-size:0.75rem; font-weight:700; padding:3px 8px; border-radius:12px;">● Suspended</span>
                    <?php endif; ?>
                  </button>
                </form>
              </td>
              <td style="font-weight:700; font-size:0.95rem;"><?= number_format($inst->user_count ?? 0) ?></td>
              <td style="color:#475569; font-weight:600;"><?= date('M d, Y', strtotime($inst->created_at ?? 'now')) ?></td>
              <td style="text-align:right;">
                <a href="/super-admin/settings" style="font-weight:800; color:#0f172a; text-decoration:none; display:inline-flex; align-items:center; gap:6px;">
                  Configure <span style="font-size:1.1rem;">→</span>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>

  </div>

</div>