<!-- SCROLLABLE CONTENT -->
<div style="padding: 32px 40px; flex: 1;">
  
  <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:28px;">
    <div>
      <h1 style="font-size:1.8rem; font-weight:800; color:#0f172a; margin:0 0 4px;">Ads & Sponsorships</h1>
      <p style="font-size:0.95rem; color:#64748b; margin:0;">Manage multi-campus partner advertisements, sponsor banners, and career fair sponsors.</p>
    </div>
  </div>

  <!-- STAT CARDS -->
  <div class="admin-stats-grid">
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#e0e7ff; color:#3730a3;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"/><polyline points="17 2 12 7 7 2"/></svg>
      </div>
      <div>
        <div class="stat-label">Total Sponsorships</div>
        <div class="stat-val"><?= number_format($totalAds ?? 0) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700;">Platform placements</div>
    </div>
    <div class="admin-stat-card">
      <div class="stat-icon-box" style="background:#dcfce7; color:#15803d;">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <div class="stat-label">Active Campaigns</div>
        <div class="stat-val"><?= number_format($activeAds ?? 0) ?></div>
      </div>
      <div style="font-size:0.82rem; color:#16a34a; font-weight:700;">Currently serving</div>
    </div>
  </div>

  <!-- CREATE AD FORM -->
  <div class="admin-card" style="margin-bottom:28px;">
    <div class="admin-card-header">
      <div>
        <h3 class="admin-card-title">Create Sponsorship Banner</h3>
        <p class="admin-card-subtitle">Deploy a new banner ad across central or tenant student portals.</p>
      </div>
    </div>
    <form id="createAdForm" action="/super-admin/ads/create" method="POST" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:16px;">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
      <div>
        <label style="display:block; font-size:0.82rem; font-weight:700; color:#475569; margin-bottom:6px;">Sponsor / Partner Name</label>
        <input type="text" name="sponsor_name" id="adSponsorName" placeholder="e.g. Acme Tech Global" required style="width:100%; padding:10px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem;" />
      </div>
      <div>
        <label style="display:block; font-size:0.82rem; font-weight:700; color:#475569; margin-bottom:6px;">Destination URL</label>
        <input type="url" name="link_url" id="adLinkUrl" placeholder="https://example.com/careers" required style="width:100%; padding:10px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem;" />
      </div>
      <div>
        <label style="display:block; font-size:0.82rem; font-weight:700; color:#475569; margin-bottom:6px;">Target Institution (Optional)</label>
        <select name="college_id" id="adCollegeId" style="width:100%; padding:10px 14px; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem; background:#fff;">
          <option value="">All Campuses (Global)</option>
          <?php foreach ($colleges as $c): ?>
            <option value="<?= $c->id ?>"><?= htmlspecialchars($c->name) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div style="display:flex; align-items:flex-end;">
        <button type="submit" id="createAdSubmitBtn" class="admin-btn-black" style="width:100%; padding:11px 20px; border-radius:8px;">Launch Sponsorship</button>
      </div>
    </form>
  </div>

  <!-- ADS TABLE -->
  <div class="admin-card" style="margin-bottom:28px;">
    <div class="admin-card-header">
      <div>
        <h3 class="admin-card-title">Sponsorship Placements</h3>
        <p class="admin-card-subtitle">Active and paused banner campaigns.</p>
      </div>
    </div>

    <table class="admin-table">
      <thead>
        <tr>
          <th>Sponsor</th>
          <th>Destination</th>
          <th>Campus Scope</th>
          <th>Status</th>
          <th style="text-align:right;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($ads)): ?>
          <tr><td colspan="5" style="text-align:center; padding:24px; color:#64748b;">No advertisements currently registered.</td></tr>
        <?php else: ?>
          <?php foreach ($ads as $ad): ?>
            <tr id="adRow-<?= $ad->id ?>">
              <td style="font-weight:800; color:#0f172a;"><?= htmlspecialchars($ad->sponsor_name) ?></td>
              <td><a href="<?= htmlspecialchars($ad->link_url ?? '#') ?>" target="_blank" style="color:#2563eb; text-decoration:none; font-size:0.85rem;"><?= htmlspecialchars($ad->link_url ?? 'N/A') ?></a></td>
              <td style="color:#64748b; font-weight:600;"><?= htmlspecialchars($ad->college_name ?? 'Global (All)') ?></td>
              <td>
                <?php if (($ad->status ?? 'active') === 'disabled' || ($ad->status ?? '') === 'inactive'): ?>
                  <span class="pill-status-pending" style="background:#fee2e2; color:#b91c1c;">Disabled</span>
                <?php else: ?>
                  <span class="pill-status-active">Active</span>
                <?php endif; ?>
              </td>
              <td style="text-align:right;">
                <form action="/super-admin/ads/status" method="POST" style="display:inline; margin:0;" class="ad-toggle-form">
                  <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                  <input type="hidden" name="ad_id" value="<?= $ad->id ?>">
                  <?php if (($ad->status ?? 'active') === 'disabled' || ($ad->status ?? '') === 'inactive'): ?>
                    <input type="hidden" name="status" value="active">
                    <button type="submit" id="enableAdBtn-<?= $ad->id ?>" class="admin-btn-outline" style="padding:4px 10px; font-size:0.75rem; color:#15803d; border-color:#15803d;">Enable</button>
                  <?php else: ?>
                    <input type="hidden" name="status" value="disabled">
                    <button type="submit" id="disableAdBtn-<?= $ad->id ?>" class="admin-btn-outline" style="padding:4px 10px; font-size:0.75rem; color:#dc2626; border-color:#dc2626;">Disable</button>
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
