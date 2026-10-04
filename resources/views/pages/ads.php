
<style>
/* Embedded from extended.css */
/* ===========================
   Extended App Styles
   =========================== */

/* ---- Common Utilities ---- */
.text-xs { font-size: 0.75rem; }
.text-sm { font-size: 0.85rem; }
.text-md { font-size: 1rem; }
.text-lg { font-size: 1.15rem; }
.text-xl { font-size: 1.5rem; }
.text-2xl { font-size: 2rem; }
.font-bold { font-weight: 700; }
.font-semibold { font-weight: 600; }
.text-muted { color: var(--color-text-muted); }
.text-light { color: var(--color-text-light); }
.text-primary { color: var(--color-primary); }
.text-white { color: var(--color-white); }
.mb-1 { margin-bottom: 4px; }
.mb-2 { margin-bottom: 8px; }
.mb-3 { margin-bottom: 12px; }
.mb-4 { margin-bottom: 16px; }
.mb-6 { margin-bottom: 24px; }
.mb-8 { margin-bottom: 32px; }
.gap-2 { gap: 8px; }
.gap-3 { gap: 12px; }
.gap-4 { gap: 16px; }
.gap-6 { gap: 24px; }

/* ---- Layouts ---- */
.layout-2col {
  display: flex;
  gap: 32px;
}
.col-main { flex: 1; min-width: 0; }
.col-side { width: 340px; flex-shrink: 0; }
.col-side-sm { width: 280px; flex-shrink: 0; }
.layout-3col {
  display: flex;
  gap: 24px;
}
.col-1 { width: 260px; flex-shrink: 0; }
.col-2 { flex: 1; min-width: 0; }
.col-3 { width: 340px; flex-shrink: 0; }

/* ---- Request Referral Page ---- */
.page-title {
  font-size: 2.2rem;
  font-weight: 800;
  letter-spacing: -0.03em;
  margin-bottom: 8px;
}
.page-subtitle {
  font-size: 1rem;
  color: var(--color-text-muted);
  max-width: 600px;
  line-height: 1.5;
  margin-bottom: 32px;
}
.eyebrow {
  font-size: 0.75rem;
  font-weight: 700;
  color: var(--color-accent-dark);
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin-bottom: 12px;
  display: block;
}

.step-card {
  background: #fdfdfd;
  border-radius: var(--radius-lg);
  padding: 32px;
  margin-bottom: 24px;
}
.step-header {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 24px;
}
.step-number {
  width: 32px;
  height: 32px;
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 1rem;
}
.step-title {
  font-size: 1.25rem;
  font-weight: 700;
}

.target-alumni-grid {
  display: flex;
  gap: 16px;
}
.alumni-select-card {
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  padding: 16px;
  display: flex;
  align-items: center;
  gap: 16px;
  background: var(--color-white);
  flex: 1;
  position: relative;
  cursor: pointer;
}
.alumni-select-card.selected {
  border-color: var(--color-accent);
  background: rgba(245, 166, 35, 0.05);
}
.alumni-select-card .check-icon {
  position: absolute;
  top: 12px;
  right: 12px;
  color: var(--color-text-light);
}
.alumni-select-card.selected .check-icon {
  color: var(--color-accent-dark);
}
.alumni-logo-box {
  width: 48px;
  height: 48px;
  background: var(--color-bg);
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
}
.alumni-logo-box svg { width: 24px; height: 24px; color: var(--color-text-muted); }

.tracker-timeline {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 24px 0 32px;
  position: relative;
}
.tracker-timeline::before {
  content: '';
  position: absolute;
  top: 20px;
  left: 30px;
  right: 30px;
  height: 2px;
  background: var(--color-border);
  z-index: 1;
}
.tracker-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  position: relative;
  z-index: 2;
}
.tracker-icon {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: var(--color-white);
  border: 2px solid var(--color-border);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-text-muted);
}
.tracker-step.active .tracker-icon {
  background: var(--color-accent);
  border-color: var(--color-accent);
  color: var(--color-primary);
}
.tracker-label {
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--color-text);
}

.latest-referral-box {
  background: var(--color-bg);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  padding: 16px;
}

.pro-tips-card {
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: var(--radius-lg);
  padding: 24px;
}
.tip-item {
  display: flex;
  gap: 12px;
  margin-bottom: 16px;
}
.tip-item:last-child { margin-bottom: 0; }
.tip-item svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.tip-item p { font-size: 0.85rem; color: rgba(255,255,255,0.8); line-height: 1.5; }

/* ---- Alumni Dashboard Specifics ---- */
.dashboard-stats-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 32px;
}
.stat-pill {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 0.9rem;
  font-weight: 600;
  color: var(--color-text);
}


.impact-card {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  border: 1px solid var(--color-border);
  padding: 24px;
}
.impact-graph {
  height: 80px;
  background: var(--color-bg);
  border-radius: var(--radius-sm);
  margin: 16px 0;
  display: flex;
  align-items: flex-end;
  justify-content: space-around;
  padding: 0 16px;
  position: relative;
}
.impact-bar {
  width: 24px;
  background: #e5e5e5;
  border-radius: 2px 2px 0 0;
}
.impact-amount {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  font-size: 1.5rem;
  font-weight: 800;
  color: var(--color-text);
  background: rgba(255,255,255,0.8);
  padding: 4px 12px;
  border-radius: var(--radius-full);
}

.promo-banner {
  background: var(--color-primary);
  border-radius: var(--radius-lg);
  overflow: hidden;
  position: relative;
  display: flex;
  align-items: center;
  padding: 40px;
  margin-top: 24px;
  color: var(--color-white);
}
.promo-bg {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  object-fit: cover;
  width: 100%;
  height: 100%;
  opacity: 0.3;
}
.promo-content {
  position: relative;
  z-index: 2;
  max-width: 500px;
}

/* ---- Mentorship Dashboard Specifics ---- */
.calendar-view {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: 24px;
}
.calendar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 24px;
}
.calendar-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  border: 1px solid var(--color-border);
  border-right: none;
  border-bottom: none;
}
.cal-day-header {
  padding: 12px;
  text-align: center;
  font-size: 0.7rem;
  font-weight: 700;
  color: var(--color-text-muted);
  border-right: 1px solid var(--color-border);
  border-bottom: 1px solid var(--color-border);
}
.cal-cell {
  height: 80px;
  padding: 8px;
  border-right: 1px solid var(--color-border);
  border-bottom: 1px solid var(--color-border);
  font-size: 0.85rem;
  font-weight: 600;
  position: relative;
}
.cal-cell.muted { color: var(--color-text-light); }
.cal-event {
  background: rgba(245, 166, 35, 0.2);
  color: var(--color-accent-dark);
  font-size: 0.65rem;
  padding: 4px;
  border-radius: 2px;
  margin-top: 4px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.cal-event.dark {
  background: var(--color-primary);
  color: var(--color-white);
}

.next-session-card {
  background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
  color: var(--color-white);
  border-radius: var(--radius-lg);
  padding: 24px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 24px;
}

/* ---- Manage Referrals ---- */
.stats-box {
  background: var(--color-bg);
  padding: 12px 20px;
  border-radius: var(--radius-md);
  text-align: center;
}
.stats-box h3 { font-size: 1.25rem; font-weight: 800; margin-bottom: 2px; }
.stats-box p { font-size: 0.75rem; color: var(--color-text-muted); }

.tab-nav {
  display: flex;
  gap: 12px;
}
.tab-btn {
  padding: 8px 16px;
  border-radius: var(--radius-full);
  font-size: 0.85rem;
  font-weight: 600;
  border: none;
  background: var(--color-bg);
  color: var(--color-text-muted);
  cursor: pointer;
}
.tab-btn.active {
  background: var(--color-text);
  color: var(--color-white);
}

.request-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 24px;
}
.req-card {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: 24px;
}
.req-quote {
  font-style: italic;
  font-size: 0.9rem;
  color: var(--color-text-muted);
  background: var(--color-bg);
  padding: 16px;
  border-radius: var(--radius-md);
  margin-bottom: 16px;
}
.file-attach {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 16px;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  font-size: 0.85rem;
  font-weight: 600;
  margin-bottom: 20px;
  cursor: pointer;
}
.file-attach:hover { background: var(--color-bg); }

/* ---- Jobs Page ---- */
.job-card-full {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: 20px;
  margin-bottom: 16px;
  position: relative;
  cursor: pointer;
  transition: var(--transition);
}
.job-card-full:hover {
  border-color: var(--color-text-muted);
}
.job-card-full.active {
  border-color: var(--color-primary);
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.bookmark-btn {
  position: absolute;
  top: 20px; right: 20px;
  background: none; border: none;
  color: var(--color-text-muted);
  cursor: pointer;
}
.bookmark-btn.active { color: var(--color-accent-dark); }

.tags-row {
  display: flex;
  gap: 8px;
  margin-top: 12px;
  margin-bottom: 16px;
}
.job-tag {
  padding: 4px 8px;
  background: var(--color-bg);
  border-radius: 4px;
  font-size: 0.7rem;
  font-weight: 600;
  color: var(--color-text);
}
.job-tag.green { background: rgba(16, 185, 129, 0.15); color: #059669; }
.job-tag.gold { background: rgba(245, 166, 35, 0.15); color: var(--color-accent-dark); }

.job-details-pane {
  background: var(--color-white);
  border-left: 1px solid var(--color-border);
  padding: 32px;
  height: 100%;
  overflow-y: auto;
}
.details-tabs {
  display: flex;
  border-bottom: 1px solid var(--color-border);
  margin-bottom: 24px;
}
.detail-tab {
  padding: 12px 24px;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-text-muted);
  cursor: pointer;
  border-bottom: 2px solid transparent;
}
.detail-tab.active {
  color: var(--color-text);
  border-bottom-color: var(--color-text);
}
.detail-logo {
  width: 64px; height: 64px;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 16px;
}

</style>
<div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h2 class="font-bold text-xl mb-1">Our Sponsors</h2>
        <p class="text-sm text-muted">Support the businesses that support Alumni Connect.</p>
    </div>
    <button onclick="document.getElementById('create-modal').style.display='flex'" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:10px 20px; border-radius:8px; cursor:pointer; font-weight:600;">Become a Sponsor</button>
</div>

<?php if (isset($_GET['added'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Thank you for sponsoring Alumni Connect!</div>
<?php endif; ?>

<?php if (empty($ads)): ?>
    <div style="background:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px; padding:40px; text-align:center; color:#64748b;">
        <p>No active sponsorships at this time. Contact us to feature your business here!</p>
    </div>
<?php else: ?>
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:24px;">
        <?php foreach ($ads as $ad): ?>
            <a href="<?= htmlspecialchars($ad->link_url) ?>" target="_blank" style="display:block; text-decoration:none;">
                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; overflow:hidden; transition:transform 0.2s; box-shadow:0 4px 6px -1px rgba(0,0,0,0.05);" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">
                    <img src="<?= htmlspecialchars($ad->image_url) ?>" alt="Ad" style="width:100%; height:150px; object-fit:cover; display:block;">
                    <div style="padding:16px; text-align:center;">
                        <h4 style="margin:0; font-size:1.1rem; font-weight:800; color:#0f172a;"><?= htmlspecialchars($ad->sponsor_name) ?></h4>
                        <span style="font-size:0.75rem; color:#64748b; text-transform:uppercase; font-weight:700;">Sponsored</span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Create Modal -->
<div id="create-modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(15,23,42,0.6); z-index:1000; align-items:center; justify-content:center; backdrop-filter:blur(4px);">
    <div style="background:#fff; width:100%; max-width:400px; border-radius:16px; padding:32px; position:relative;">
        <button onclick="document.getElementById('create-modal').style.display='none'" style="position:absolute; top:20px; right:20px; background:none; border:none; cursor:pointer; color:#64748b;">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
        <h2 style="font-size:1.5rem; font-weight:800; margin-bottom:24px; color:#0f172a;">Become a Sponsor</h2>
        
        <form action="/ads/create" method="POST">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Sponsor / Company Name</label>
                <input type="text" name="sponsor_name" required style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Target URL</label>
                <input type="url" name="link_url" required placeholder="https://" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <div style="margin-bottom:24px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Image URL</label>
                <input type="url" name="image_url" placeholder="https://" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <button type="submit" class="btn btn-primary" style="width:100%; background:#2563eb; color:#fff; border:none; padding:14px; border-radius:8px; cursor:pointer; font-weight:700; font-size:1rem;">Submit Sponsorship</button>
        </form>
    </div>
</div>
