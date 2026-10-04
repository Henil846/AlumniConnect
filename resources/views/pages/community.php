
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
<div class="content-scrollable">
    <div class="page-container">
        
        <div class="community-layout">
            
            <!-- CENTER: FEED COLUMN -->
            <div class="feed-column">
                
                <!-- Post Creation Box -->
                <div class="create-post-box">
                    <form action="/community/post" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                        <div style="display:flex; gap:16px; align-items:center;">
                            <img src="/assets/img/mentor_elena.png" alt="av" style="width:44px; height:44px; border-radius:50%; object-fit:cover;" />
                            <input type="text" name="content" required placeholder="Share an insight, milestone, or question with the alumni community..." style="flex:1; border:none; background:transparent; font-size:1rem; color:var(--color-text); outline:none;" />
                        </div>
                        
                        <div class="post-actions-row" style="margin-top: 15px;">
                            <div style="display:flex; gap:24px;">
                                <label class="post-action-item" style="cursor: pointer;">
                                    <input type="file" name="image" style="display: none;" accept="image/*">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" class="text-muted"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg> Media
                                </label>
                                <button type="button" class="post-action-item">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" class="text-muted"><path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/></svg> Poll
                                </button>
                                <button type="button" class="post-action-item">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" class="text-muted"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> Event
                                </button>
                            </div>
                            <button type="submit" class="btn-primary" style="background:#000; padding:8px 24px; font-size:0.85rem; border-radius:var(--radius-full);">Post</button>
                        </div>
                    </form>
                </div>

                <!-- Filter Tabs -->
                <div style="display:flex; gap:28px; border-bottom:1px solid var(--color-border); margin-bottom:24px; padding-bottom:12px;">
                    <span class="font-bold text-sm" style="color:var(--color-text); border-bottom:2px solid var(--color-text); padding-bottom:12px; margin-bottom:-13px; cursor:pointer;">All Posts</span>
                    <span class="font-semibold text-sm text-muted" style="cursor:pointer;">Mentorship Hub</span>
                    <span class="font-semibold text-sm text-muted" style="cursor:pointer;">Startup Network</span>
                    <span class="font-semibold text-sm text-muted" style="cursor:pointer;">Announcements</span>
                </div>

                <?php foreach ($posts as $post): ?>
                <!-- Feed Post -->
                <div class="feed-post-card">
                    <div class="post-author-header">
                        <img src="/assets/img/signup_side_img.png" style="object-position:top;" alt="av" />
                        <div style="flex:1;">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <h4 class="font-bold text-md mb-0"><?= htmlspecialchars($post->full_name) ?></h4>
                                <?php if ($post->role === 'mentor'): ?>
                                <span class="badge" style="background:#dcfce7; color:#15803d; font-size:0.65rem; padding:2px 8px;">MENTOR</span>
                                <?php endif; ?>
                            </div>
                            <p class="text-xs text-muted mb-0"><?= htmlspecialchars(date('M j, Y g:i A', strtotime($post->created_at))) ?></p>
                        </div>
                    </div>

                    <p class="text-sm mb-4" style="line-height:1.6; color:var(--color-text);">
                        <?= nl2br(htmlspecialchars($post->content)) ?>
                    </p>

                    <?php if ($post->image_url): ?>
                    <div style="border-radius:16px; overflow:hidden; margin-bottom:20px; max-height:400px;">
                        <img src="<?= htmlspecialchars($post->image_url) ?>" alt="post img" style="width:100%; object-fit:cover;" />
                    </div>
                    <?php endif; ?>

                    <div style="display:flex; justify-content:space-between; align-items:center; color:var(--color-text-muted); font-size:0.85rem;">
                        <div style="display:flex; gap:24px;">
                            <form action="/community/like" method="POST" style="margin:0;">
                                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                                <button type="submit" style="background:none; border:none; color:<?= $post->liked_by_me ? '#059669' : 'inherit' ?>; display:flex; align-items:center; gap:6px; cursor:pointer; padding:0;">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="<?= $post->liked_by_me ? 'currentColor' : 'none' ?>" stroke="currentColor"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg> 
                                    <?= $post->likes_count ?>
                                </button>
                            </form>
                            <span style="display:flex; align-items:center; gap:6px; cursor:pointer;">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg> 
                                <?= $post->comments_count ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <!-- RIGHT: WIDGETS COLUMN -->
            <div class="widgets-column">
                
                <!-- Spotlight Banner -->
                <div style="background:#0b1329; color:#fff; border-radius:var(--radius-lg); padding:28px;">
                    <span class="job-tag gold" style="font-size:0.65rem; margin-bottom:12px; display:inline-block;">SPOTLIGHT</span>
                    <h3 class="font-bold text-lg mb-2">Ready to pay it forward?</h3>
                    <p class="text-xs mb-6" style="color:rgba(255,255,255,0.8); line-height:1.6;">Join 400+ alumni already mentoring the next generation of leaders. Your experience is their map.</p>
                    <button class="btn-primary" style="background:var(--color-white); color:var(--color-primary); width:100%; padding:12px; font-size:0.9rem;">Become a Mentor</button>
                </div>

            </div>

        </div>

    </div>
</div>
