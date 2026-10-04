<div class="profile-view-page">
<div class="profile-cover">
    <img src="/assets/img/campus_cover.png" alt="Cover" />
</div>

<div class="profile-header-info">
    <div class="profile-header-main">
    <img src="/assets/img/mentor_marcus.png" alt="<?= htmlspecialchars($user->full_name) ?>" class="profile-header-avatar" />
    <div class="profile-header-text">
        <h1><?= htmlspecialchars($user->full_name) ?></h1>
        <p><?= htmlspecialchars(ucfirst($user->role)) ?></p>
        <p style="font-weight:600; color:var(--color-text); margin-bottom:12px;">Joined <?= date('M Y', strtotime($user->created_at)) ?></p>
        <div class="profile-badges">
        <span class="badge badge-verified"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> Verified Alumnus</span>
        <span class="badge badge-mentor"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> Mentorship Ready</span>
        </div>
    </div>
    </div>
    <div class="profile-header-actions">
    <button class="btn-primary" onclick="window.location.href='/mentorship'">Request Mentorship</button>
    <button class="btn-outline" onclick="window.location.href='/messages'">Message</button>
    </div>
</div>

<div class="profile-content-grid">
    
    <!-- LEFT COLUMN -->
    <div class="profile-col-left">
    
    <div class="app-card">
        <div class="app-card-body">
        <div class="card-title-icon">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            About
        </div>
        <p class="about-text">
            I am a passionate software engineer eager to connect with fellow alumni and share experiences. My journey started in the labs of the Computer Science building, where I fell in love with complex problem-solving.
        </p>
        </div>
    </div>

    <div class="app-card">
        <div class="app-card-body">
        <div class="card-title-icon">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            Professional Experience
        </div>
        <div class="experience-timeline">
            
            <div class="exp-item">
            <div class="exp-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="7" width="20" height="14" rx="2"/><line x1="12" y1="11" x2="12" y2="13"/></svg></div>
            <div class="exp-header">
                <h4>Senior Developer</h4>
                <span class="exp-date">JAN 2021 — PRESENT</span>
            </div>
            <div class="exp-company">Tech Solutions • Remote</div>
            <p class="exp-desc">Leading a team of engineers in building cloud-native applications.</p>
            </div>

        </div>
        </div>
    </div>

    <div class="app-card">
        <div class="app-card-body">
        <div class="card-title-icon">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            Core Competencies
        </div>
        <div class="competency-chips">
            <div class="comp-chip">Software Engineering</div>
            <div class="comp-chip">Project Management</div>
            <div class="comp-chip">Leadership</div>
        </div>
        </div>
    </div>

    </div>

    <!-- RIGHT COLUMN -->
    <div class="profile-col-right">
    
    <div class="app-card dark-card">
        <div class="app-card-body">
        <div class="card-title-icon">CURRENT COMPANY</div>
        <div class="company-logo-wrap">
            <div class="company-logo"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
            <div class="company-name">
            <h4>Tech Solutions</h4>
            </div>
        </div>
        <a href="#" class="link-gold">VIEW COMPANY JOBS <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        </div>
    </div>

    <div class="app-card privacy-card">
        <div class="app-card-body">
        <div class="card-title-icon">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            Contact Privacy
        </div>
        <p>This profile is verified. Personal contact information is hidden to protect privacy.</p>
        <button class="btn-message" onclick="window.location.href='/messages'">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            Message <?= htmlspecialchars(explode(' ', $user->full_name)[0]) ?>
        </button>
        </div>
    </div>

    <div class="app-card">
        <div class="app-card-body">
        <div class="card-title-icon">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            Education
        </div>
        <div class="edu-item">
            <div class="edu-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
            <div class="edu-info">
            <h4>Alumni Connect University</h4>
            <p>Degree details</p>
            </div>
        </div>
        </div>
    </div>

    </div>
</div>
</div>
