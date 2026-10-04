
<style>
/* Embedded from profile-view.css */
/* ===========================
   Alumni Profile View Styles
   =========================== */

/* Remove padding from content-scrollable for edge-to-edge cover */
.profile-view-page {
  padding: 0 !important;
}

.profile-cover {
  height: 240px;
  width: 100%;
  position: relative;
}
.profile-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.profile-cover::after {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.6));
}

.profile-header-info {
  max-width: 1100px;
  margin: 0 auto;
  position: relative;
  margin-top: -60px; /* Overlap cover */
  padding: 0 32px 32px;
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  z-index: 2;
}

.profile-header-main {
  display: flex;
  align-items: flex-end;
  gap: 24px;
}

.profile-header-avatar {
  width: 140px;
  height: 140px;
  border-radius: 50%;
  object-fit: cover;
  border: 5px solid var(--color-bg);
  box-shadow: var(--shadow-md);
  background: var(--color-white);
}

.profile-header-text {
  padding-bottom: 8px;
}

.profile-header-text h1 {
  font-size: 2.2rem;
  font-weight: 800;
  margin-bottom: 4px;
}
.profile-header-text p {
  font-size: 1rem;
  color: var(--color-text-muted);
  margin-bottom: 8px;
}

.profile-badges {
  display: flex;
  gap: 8px;
}
.profile-badges .badge-verified { background: rgba(16, 185, 129, 0.15); color: #059669; }
.profile-badges .badge-mentor { background: rgba(245, 166, 35, 0.15); color: var(--color-accent-dark); }
.profile-badges .badge { display: flex; align-items: center; gap: 4px; }
.profile-badges .badge svg { width: 12px; height: 12px; }

.profile-header-actions {
  display: flex;
  gap: 12px;
  padding-bottom: 12px;
}
.profile-header-actions button {
  padding: 10px 20px;
  border-radius: var(--radius-full);
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
}
.btn-primary { background: var(--color-primary); color: var(--color-white); border: none; }
.btn-primary:hover { background: var(--color-primary-light); }
.btn-outline { background: var(--color-white); color: var(--color-text); border: 1px solid var(--color-text); }
.btn-outline:hover { background: var(--color-bg); }

/* ---- Main Content Grid ---- */
.profile-content-grid {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 32px 40px;
  display: flex;
  gap: 24px;
}

.profile-col-left {
  flex: 1;
  min-width: 0;
  display: flex;
  flex-direction: column;
  gap: 24px;
}
.profile-col-right {
  width: 320px;
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.card-title-icon {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 16px;
}
.card-title-icon svg { color: var(--color-text-muted); }

.about-text {
  font-size: 0.95rem;
  line-height: 1.6;
  color: var(--color-text);
}

/* Professional Experience Timeline */
.experience-timeline {
  display: flex;
  flex-direction: column;
  gap: 24px;
  position: relative;
  padding-left: 32px;
}
.experience-timeline::before {
  content: '';
  position: absolute;
  left: 19px;
  top: 10px;
  bottom: 0;
  width: 2px;
  background: var(--color-border);
}

.exp-item {
  position: relative;
}
.exp-icon {
  position: absolute;
  left: -32px;
  top: 0;
  width: 40px;
  height: 40px;
  background: var(--color-bg);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
  transform: translateX(-50%);
  z-index: 2;
}
.exp-icon svg { width: 20px; height: 20px; color: var(--color-text-muted); }

.exp-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 4px;
  margin-left: 12px;
}
.exp-header h4 { font-size: 1.05rem; font-weight: 700; }
.exp-date { font-size: 0.75rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; letter-spacing: 0.05em; }

.exp-company { font-size: 0.9rem; font-weight: 600; color: var(--color-text); margin-bottom: 8px; margin-left: 12px; }
.exp-desc { font-size: 0.9rem; color: var(--color-text-muted); line-height: 1.5; margin-left: 12px; }

/* Core Competencies */
.competency-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}
.comp-chip {
  padding: 8px 16px;
  background: var(--color-input-bg);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  font-size: 0.85rem;
  color: var(--color-text);
}

/* Right Side Cards */
.dark-card {
  background: var(--color-primary);
  color: var(--color-white);
  border: none;
}
.dark-card .card-title-icon { color: rgba(255,255,255,0.7); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 12px; }
.dark-card .card-title-icon svg { color: inherit; }

.company-logo-wrap {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 16px;
}
.company-logo {
  width: 48px;
  height: 48px;
  background: var(--color-white);
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
}
.company-logo svg { color: var(--color-primary); width: 24px; height: 24px; }
.company-name h4 { font-size: 1.1rem; font-weight: 700; color: var(--color-white); }
.company-name p { font-size: 0.8rem; color: rgba(255,255,255,0.7); }

.dark-card p { font-size: 0.85rem; color: rgba(255,255,255,0.8); line-height: 1.5; margin-bottom: 20px; }
.link-gold { color: var(--color-accent-dark); font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; display: flex; align-items: center; gap: 4px; }
.link-gold:hover { text-decoration: underline; }

.privacy-card p { font-size: 0.85rem; color: var(--color-text-muted); line-height: 1.5; margin-bottom: 16px; }
.btn-message {
  width: 100%;
  padding: 12px;
  background: var(--color-input-bg);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-full);
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  cursor: pointer;
  margin-bottom: 12px;
  transition: var(--transition);
}
.btn-message:hover { background: var(--color-border); }
.response-time { font-size: 0.7rem; color: var(--color-text-light); text-align: center; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600; }

.edu-item {
  display: flex;
  gap: 12px;
}
.edu-icon {
  width: 40px; height: 40px; border-radius: 50%;
  background: rgba(245, 166, 35, 0.15); color: var(--color-accent-dark);
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.edu-info h4 { font-size: 0.95rem; font-weight: 700; margin-bottom: 4px; }
.edu-info p { font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 2px; }
.edu-info span { font-size: 0.8rem; font-weight: 600; color: var(--color-text); }

</style>
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
