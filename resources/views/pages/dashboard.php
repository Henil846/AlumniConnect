
<style>
/* Embedded from dashboard.css */
/* ===========================
   Dashboard Styles
   =========================== */

/* ---- Greeting Section ---- */
.dashboard-greeting {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 32px;
  background: var(--color-white);
  padding: 24px 32px;
  border-radius: var(--radius-xl);
  box-shadow: 0 4px 20px rgba(0,0,0,0.03);
}

.greeting-user {
  display: flex;
  align-items: center;
  gap: 24px;
}

.greeting-avatar {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid var(--color-bg);
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.greeting-text h1 {
  font-size: 2rem;
  font-weight: 800;
  color: var(--color-text);
  letter-spacing: -0.03em;
  margin-bottom: 4px;
}

.greeting-text p {
  color: var(--color-text-muted);
  font-size: 0.95rem;
}

.profile-completion {
  background: var(--color-bg);
  padding: 16px 20px;
  border-radius: var(--radius-md);
  display: flex;
  flex-direction: column;
  gap: 8px;
  min-width: 200px;
}

.completion-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  color: var(--color-text-muted);
  text-transform: uppercase;
}

.completion-percent {
  font-size: 1.2rem;
  font-weight: 800;
  color: var(--color-text);
}

.completion-bar-bg {
  height: 6px;
  background: var(--color-border);
  border-radius: 3px;
  overflow: hidden;
}

.completion-bar-fill {
  height: 100%;
  background: var(--color-accent-dark);
  border-radius: 3px;
}

/* ---- Mentorship Requests ---- */
.request-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px;
  background: var(--color-bg);
  border-radius: var(--radius-md);
  margin-bottom: 12px;
}
.request-item:last-child { margin-bottom: 0; }

.request-info {
  display: flex;
  align-items: center;
  gap: 16px;
}

.request-avatar {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
}

.request-details h4 {
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--color-text);
  margin-bottom: 2px;
}

.request-details p {
  font-size: 0.8rem;
  color: var(--color-text-muted);
}

.request-actions {
  display: flex;
  gap: 8px;
}

.btn-small {
  padding: 8px 16px;
  border-radius: var(--radius-sm);
  font-size: 0.8rem;
  font-weight: 600;
  border: 1px solid var(--color-border);
  background: var(--color-white);
  color: var(--color-text);
  cursor: pointer;
  transition: var(--transition);
}

.btn-small:hover { background: var(--color-bg); }
.btn-small.primary { background: var(--color-accent); border-color: var(--color-accent); color: var(--color-primary); }
.btn-small.primary:hover { background: var(--color-accent-dark); }

/* ---- Referral Portal ---- */
.referral-item {
  display: flex;
  gap: 16px;
  padding-bottom: 16px;
  margin-bottom: 16px;
  border-bottom: 1px solid var(--color-border);
}
.referral-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }

.referral-icon {
  width: 40px;
  height: 40px;
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(16, 185, 129, 0.1);
  color: #059669;
  flex-shrink: 0;
}
.referral-icon.rocket { background: rgba(139, 92, 246, 0.1); color: #7c3aed; }

.referral-info h4 {
  font-size: 0.95rem;
  font-weight: 700;
  margin-bottom: 4px;
}

.referral-info p {
  font-size: 0.8rem;
  color: var(--color-text-muted);
  margin-bottom: 8px;
}

/* ---- Explore Top Mentors ---- */
.mentors-scroll {
  display: flex;
  gap: 16px;
  overflow-x: auto;
  padding-bottom: 12px;
  margin-bottom: -12px; /* hide scrollbar spacing somewhat */
}

.mentors-scroll::-webkit-scrollbar { height: 6px; }
.mentors-scroll::-webkit-scrollbar-track { background: transparent; }
.mentors-scroll::-webkit-scrollbar-thumb { background: var(--color-border); border-radius: 3px; }

.mentor-card-mini {
  min-width: 160px;
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  padding: 20px 16px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.mentor-card-mini img {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 12px;
}

.mentor-card-mini h4 {
  font-size: 0.9rem;
  font-weight: 700;
  margin-bottom: 4px;
}

.mentor-card-mini p {
  font-size: 0.75rem;
  color: var(--color-text-muted);
  margin-bottom: 16px;
}

.mentor-card-mini button {
  width: 100%;
  padding: 6px;
  border-radius: var(--radius-sm);
  background: var(--color-primary);
  color: var(--color-white);
  border: none;
  font-size: 0.8rem;
  font-weight: 600;
  cursor: pointer;
}
.mentor-card-mini button:hover { background: var(--color-primary-light); }

/* ---- Latest Jobs ---- */
.job-item {
  display: flex;
  flex-direction: column;
  gap: 8px;
  padding-bottom: 16px;
  margin-bottom: 16px;
  border-bottom: 1px solid var(--color-border);
}
.job-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }

.job-header { display: flex; justify-content: space-between; align-items: flex-start; }
.job-header h4 { font-size: 0.95rem; font-weight: 700; }
.job-header span { font-size: 0.75rem; color: var(--color-text-light); }
.job-company { font-size: 0.8rem; color: var(--color-text-muted); }

/* ---- Upcoming Events ---- */
.event-item {
  display: flex;
  gap: 16px;
  padding-bottom: 16px;
  margin-bottom: 16px;
  border-bottom: 1px solid var(--color-border);
}
.event-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }

.event-date-box {
  width: 56px;
  height: 56px;
  background: var(--color-bg);
  border-radius: var(--radius-md);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border: 1px solid var(--color-border);
  flex-shrink: 0;
}
.event-date-box .month { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; color: var(--color-text-muted); }
.event-date-box .day { font-size: 1.2rem; font-weight: 800; color: var(--color-text); line-height: 1; }

.event-date-box.dark { background: var(--color-primary); border-color: var(--color-primary); }
.event-date-box.dark .month { color: rgba(255,255,255,0.7); }
.event-date-box.dark .day { color: var(--color-white); }

.event-info h4 { font-size: 0.95rem; font-weight: 700; margin-bottom: 4px; display: flex; align-items: center; gap: 8px; }
.event-info p { font-size: 0.8rem; color: var(--color-text-muted); margin-bottom: 8px; line-height: 1.4; }
.event-meta { display: flex; gap: 16px; font-size: 0.75rem; color: var(--color-text-light); }
.event-meta span { display: flex; align-items: center; gap: 4px; }

/* ---- New to Community ---- */
.new-member {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  margin-bottom: 16px;
}
.new-member img {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 8px;
}
.new-member h4 { font-size: 0.85rem; font-weight: 600; }
.new-member p { font-size: 0.7rem; color: var(--color-text-muted); }

/* ---- Community Voice ---- */
.post-item {
  padding-bottom: 20px;
  margin-bottom: 20px;
  border-bottom: 1px solid var(--color-border);
}
.post-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }

.post-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 12px;
}
.post-header img { width: 36px; height: 36px; border-radius: 50%; }
.post-author h4 { font-size: 0.9rem; font-weight: 700; }
.post-author p { font-size: 0.75rem; color: var(--color-text-muted); }

.post-content {
  font-size: 0.9rem;
  color: var(--color-text);
  line-height: 1.5;
  margin-bottom: 12px;
}

.post-actions {
  display: flex;
  gap: 16px;
}
.post-action {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.8rem;
  color: var(--color-text-muted);
  background: none;
  border: none;
  cursor: pointer;
}
.post-action:hover { color: var(--color-primary); }

</style>
<!-- GREETING ROW -->
<div class="dashboard-greeting">
<div class="greeting-user">
    <img src="/assets/img/mentor_elena.png" alt="<?= htmlspecialchars($user->full_name) ?>" class="greeting-avatar" />
    <div class="greeting-text">
    <h1>Good Morning, <?= htmlspecialchars(explode(' ', $user->full_name)[0]) ?>.</h1>
    <p>Ready to take the next step in your career journey today?</p>
    </div>
</div>
<div class="profile-completion" style="cursor:pointer;" onclick="window.location.href='/profile'">
    <div class="completion-header">
    <span>PROFILE COMPLETION</span>
    <span class="completion-percent">85%</span>
    </div>
    <div class="completion-bar-bg">
    <div class="completion-bar-fill" style="width: 85%;"></div>
    </div>
    <div style="margin-top:10px; display:flex; flex-direction:column; gap:5px;">
    <div style="display:flex; align-items:center; gap:6px; font-size:0.72rem; color:#ef4444; font-weight:600;">
        <svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        Missing: Career Interests
    </div>
    <div style="display:flex; align-items:center; gap:6px; font-size:0.72rem; color:#ef4444; font-weight:600;">
        <svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        Missing: Mentorship Preferences
    </div>
    <div style="font-size:0.72rem; color:var(--color-accent-dark); font-weight:700; margin-top:2px;">Complete Profile →</div>
    </div>
</div>
</div>

<!-- YOUR NEXT STEPS -->
<div class="app-card" style="margin-bottom:0;">
<div class="app-card-header">
    <div class="app-card-title">
    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
    Your Next Steps
    </div>
    <span style="font-size:0.72rem; background:#f0fdf4; color:#15803d; font-weight:700; padding:4px 10px; border-radius:20px;">2 of 5 done</span>
</div>
<div class="app-card-body" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:10px;">
    <div style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; background:#f0fdf4;">
    <div style="width:22px; height:22px; border-radius:50%; background:#15803d; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#fff" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
    <span style="font-size:0.82rem; font-weight:600; color:#15803d; text-decoration:line-through; opacity:0.8;">Upload Resume</span>
    </div>
    <div style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; background:#f0fdf4;">
    <div style="width:22px; height:22px; border-radius:50%; background:#15803d; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#fff" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
    <span style="font-size:0.82rem; font-weight:600; color:#15803d; text-decoration:line-through; opacity:0.8;">Add Core Skills</span>
    </div>
    <a href="/profile" style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; border:1.5px dashed #cbd5e1; text-decoration:none; cursor:pointer;" onmouseover="this.style.background='var(--color-bg)'" onmouseout="this.style.background='transparent'">
    <div style="width:22px; height:22px; border-radius:50%; border:2px dashed #94a3b8; flex-shrink:0;"></div>
    <div><span style="font-size:0.82rem; font-weight:700; color:var(--color-text);">Add Career Interests</span><span style="display:block; font-size:0.68rem; color:var(--color-text-muted);">Helps match jobs &amp; mentors</span></div>
    </a>
    <a href="/mentorship" style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; border:1.5px dashed #cbd5e1; text-decoration:none;" onmouseover="this.style.background='var(--color-bg)'" onmouseout="this.style.background='transparent'">
    <div style="width:22px; height:22px; border-radius:50%; border:2px dashed #94a3b8; flex-shrink:0;"></div>
    <div><span style="font-size:0.82rem; font-weight:700; color:var(--color-text);">Request a Mentor</span><span style="display:block; font-size:0.68rem; color:var(--color-text-muted);">Connect with alumni in your field</span></div>
    </a>
    <a href="/jobs" style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; border:1.5px dashed #cbd5e1; text-decoration:none;" onmouseover="this.style.background='var(--color-bg)'" onmouseout="this.style.background='transparent'">
    <div style="width:22px; height:22px; border-radius:50%; border:2px dashed #94a3b8; flex-shrink:0;"></div>
    <div><span style="font-size:0.82rem; font-weight:700; color:var(--color-text);">Apply for a Job</span><span style="display:block; font-size:0.68rem; color:var(--color-text-muted);">3 new matches for your skills</span></div>
    </a>
</div>
</div>

<!-- TWO COL ROW 1 -->
<div class="row">
<!-- Left: Mentorship Requests -->
<div class="app-card flex-1">
    <div class="app-card-header">
    <div class="app-card-title">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Mentorship Requests (<?= $mentorshipCount ?>)
    </div>
    <a href="/mentorship" style="font-size:0.8rem; color:var(--color-primary); font-weight:600;">View All</a>
    </div>
    <div class="app-card-body">
    
    <?php if (empty($mentorshipRequests)): ?>
        <p style="font-size:0.85rem; color:var(--color-text-muted); padding:10px;">No pending mentorship requests.</p>
    <?php else: ?>
        <?php foreach ($mentorshipRequests as $req): ?>
        <div class="request-item">
            <div class="request-info">
            <img src="/assets/img/default-avatar.png" alt="Mentee" class="request-avatar" />
            <div class="request-details">
                <h4><?= htmlspecialchars($req->full_name) ?></h4>
                <p><?= htmlspecialchars($req->industry ?? 'Student') ?></p>
            </div>
            </div>
            <div class="request-actions">
            <button class="btn-small primary" onclick="acceptMentorship(<?= $req->id ?>)">Accept</button>
            <button class="btn-small" onclick="window.location.href='/profile/<?= $req->mentee_id ?>'">Details</button>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    </div>
</div>

<!-- Right: Referral Portal -->
<div class="app-card" style="width: 380px;">
    <div class="app-card-header">
    <div class="app-card-title">Referral Portal (<?= $referralsCount ?>)</div>
    </div>
    <div class="app-card-body">
    
    <?php if (empty($referralRequestsData)): ?>
        <p style="font-size:0.85rem; color:var(--color-text-muted); padding:10px;">No pending referrals.</p>
    <?php else: ?>
        <?php foreach ($referralRequestsData as $ref): ?>
        <div class="referral-item">
            <div class="referral-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
            <div class="referral-info">
            <h4>Referral Request</h4>
            <p>From <?= htmlspecialchars($ref->full_name) ?></p>
            <span class="badge badge-pending" style="background:#fef3c7;color:#d97706;padding:2px 6px;border-radius:4px;font-size:0.7rem;font-weight:700;">PENDING</span>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <button class="btn-ghost" style="width:100%; margin-top:16px;" onclick="window.location.href='/referral-request'">Request Referral</button>
    </div>
</div>
</div>

<!-- MENTORS SCROLL -->
<div>
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
    <h2 style="font-size:1.1rem; font-weight:700;">Explore Top Mentors</h2>
    <div style="display:flex; gap:8px;">
    <button class="header-icon-btn" style="border:1px solid var(--color-border); width:32px; height:32px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="15 18 9 12 15 6"/></svg></button>
    <button class="header-icon-btn" style="border:1px solid var(--color-border); width:32px; height:32px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="9 18 15 12 9 6"/></svg></button>
    </div>
</div>

<div class="mentors-scroll">
    <?php if (empty($topMentors)): ?>
        <p style="font-size:0.85rem; color:var(--color-text-muted); padding:10px;">No mentors available right now.</p>
    <?php else: ?>
        <?php foreach ($topMentors as $mentor): ?>
        <div class="mentor-card-mini">
        <div style="position:relative; display:inline-block; margin-bottom:8px;">
            <img src="/assets/img/default-avatar.png" alt="<?= htmlspecialchars($mentor->full_name) ?>" style="display:block;" />
            <span style="position:absolute; top:-4px; right:-4px; background:#dcfce7; color:#15803d; font-size:0.55rem; font-weight:800; padding:2px 6px; border-radius:10px; white-space:nowrap;">Available</span>
        </div>
        <h4><?= htmlspecialchars($mentor->full_name) ?></h4>
        <p><?= htmlspecialchars($mentor->industry ?? 'Professional') ?></p>
        <p style="font-size:0.65rem; color:var(--color-accent-dark); font-weight:700; margin:4px 0 10px; background:var(--color-bg); border-radius:8px; padding:2px 8px; display:inline-block;"><?= htmlspecialchars($mentor->department ?? 'General') ?></p>
        <button class="btn-small primary" style="width:100%; margin-bottom:6px; font-size:0.75rem;" onclick="window.location.href='/mentorship'">Request Mentorship</button>
        <button class="btn-small" style="width:100%; font-size:0.75rem;" onclick="window.location.href='/profile/<?= $mentor->id ?>'">View Profile</button>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</div>

<form id="mentorshipActionForm" method="POST" action="/mentorship/update-status" style="display:none;">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
    <input type="hidden" name="session_id" id="mentorshipSessionId">
    <input type="hidden" name="status" value="accepted">
</form>

<script>
function acceptMentorship(id) {
    document.getElementById('mentorshipSessionId').value = id;
    document.getElementById('mentorshipActionForm').submit();
}
</script>

