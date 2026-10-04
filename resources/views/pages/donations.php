
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
<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">Giving & Donations</h2>
    <p class="text-sm text-muted">Support university initiatives, student scholarships, and alumni programs.</p>
</div>

<?php if (isset($_GET['success'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Thank you for your generous donation! Your contribution has been recorded.</div>
<?php endif; ?>

<div style="display:flex; gap:24px;">
    <!-- Campaigns -->
    <div style="flex:2;">
        <?php if (empty($campaigns)): ?>
            <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:40px; text-align:center;">
                <p>No active campaigns at the moment.</p>
            </div>
        <?php else: ?>
            <div style="display:flex; flex-direction:column; gap:24px;">
                <?php foreach ($campaigns as $campaign): ?>
                    <?php 
                        $percentage = $campaign->goal_amount > 0 ? min(100, ($campaign->raised_amount / $campaign->goal_amount) * 100) : 0;
                    ?>
                    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden; display:flex;">
                        <div style="width:200px; background:#f1f5f9; display:flex; align-items:center; justify-content:center;">
                            <svg viewBox="0 0 24 24" width="64" height="64" fill="none" stroke="#cbd5e1" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </div>
                        <div style="padding:24px; flex:1;">
                            <h3 style="font-size:1.25rem; font-weight:800; color:#0f172a; margin-bottom:8px;"><?= htmlspecialchars($campaign->title) ?></h3>
                            <p style="font-size:0.9rem; color:var(--color-text-muted); margin-bottom:20px;"><?= nl2br(htmlspecialchars($campaign->description)) ?></p>
                            
                            <!-- Progress Bar -->
                            <div style="margin-bottom:8px; display:flex; justify-content:space-between; font-size:0.85rem; font-weight:700;">
                                <span style="color:#2563eb;"><?= \App\Core\CurrencyHelper::formatINR($campaign->raised_amount) ?> raised</span>
                                <span style="color:#64748b;">Goal: <?= \App\Core\CurrencyHelper::formatINR($campaign->goal_amount) ?></span>
                            </div>
                            <div style="width:100%; background:#e2e8f0; height:8px; border-radius:4px; margin-bottom:20px; overflow:hidden;">
                                <div style="height:100%; background:#2563eb; width:<?= $percentage ?>%;"></div>
                            </div>
                            
                            <form action="/donations/donate" method="POST" style="display:flex; gap:12px;">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                                <input type="hidden" name="campaign_id" value="<?= $campaign->id ?>">
                                <div style="position:relative; width:150px;">
                                    <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); font-weight:700; color:#475569;">₹</span>
                                    <input type="number" step="1" min="1" name="amount" placeholder="Amount" required style="width:100%; padding:10px 10px 10px 24px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit; font-weight:600;">
                                </div>
                                <button type="submit" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:10px 24px; border-radius:8px; font-weight:700; cursor:pointer;">Donate Now</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Sidebar -->
    <div style="flex:1;">
        <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:24px;">
            <h3 style="font-size:1.1rem; font-weight:800; margin-bottom:16px;">Recent Donors</h3>
            <?php if (empty($recentDonations)): ?>
                <p style="font-size:0.9rem; color:#64748b;">No recent donations yet. Be the first!</p>
            <?php else: ?>
                <ul style="list-style:none; padding:0; margin:0;">
                    <?php foreach ($recentDonations as $donation): ?>
                        <li style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                            <img src="/assets/img/signup_side_img.png" alt="" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                            <div>
                                <h4 style="font-size:0.9rem; font-weight:700; margin:0; color:#0f172a;"><?= htmlspecialchars($donation->donor_name) ?></h4>
                                <div style="font-size:0.8rem; color:#059669; font-weight:600;">Donated <?= \App\Core\CurrencyHelper::formatINR($donation->amount) ?></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
