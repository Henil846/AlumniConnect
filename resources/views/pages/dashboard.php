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
    
    <div class="request-item">
        <div class="request-info">
        <img src="/assets/img/mentor_marcus.png" alt="Sarah" class="request-avatar" />
        <div class="request-details">
            <h4>Sarah Jenkins</h4>
            <p>Senior PM at TechFlow • 12 years exp.</p>
        </div>
        </div>
        <div class="request-actions">
        <button class="btn-small primary">Accept Invitation</button>
        <button class="btn-small">Details</button>
        </div>
    </div>

    </div>
</div>

<!-- Right: Referral Portal -->
<div class="app-card" style="width: 380px;">
    <div class="app-card-header">
    <div class="app-card-title">Referral Portal (<?= $referralsCount ?>)</div>
    </div>
    <div class="app-card-body">
    
    <div class="referral-item">
        <div class="referral-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
        <div class="referral-info">
        <h4>UX Designer Referral</h4>
        <p>Sent by Alex Rivera to Google</p>
        <span class="badge badge-reviewed">REVIEWED</span>
        </div>
    </div>

    <button class="btn-ghost" style="width:100%; margin-top:16px;" onclick="window.location.href='/referrals'">Request Referral</button>
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
    <div class="mentor-card-mini">
    <div style="position:relative; display:inline-block; margin-bottom:8px;">
        <img src="/assets/img/mentor_elena.png" alt="Julia" style="display:block;" />
        <span style="position:absolute; top:-4px; right:-4px; background:#dcfce7; color:#15803d; font-size:0.55rem; font-weight:800; padding:2px 6px; border-radius:10px; white-space:nowrap;">Available</span>
    </div>
    <h4>Julia Moretti</h4>
    <p>Finance Lead @ JPM</p>
    <p style="font-size:0.65rem; color:var(--color-accent-dark); font-weight:700; margin:4px 0 10px; background:var(--color-bg); border-radius:8px; padding:2px 8px; display:inline-block;">Finance • VC</p>
    <button class="btn-small primary" style="width:100%; margin-bottom:6px; font-size:0.75rem;" onclick="window.location.href='/mentorship'">Request Mentorship</button>
    <button class="btn-small" style="width:100%; font-size:0.75rem;" onclick="window.location.href='/profile'">View Profile</button>
    </div>
</div>
</div>
