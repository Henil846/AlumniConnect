
<style>
/* Embedded from profile.css */
/* ===========================
   Edit Profile Styles
   =========================== */

.profile-page-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 24px;
}

.profile-page-header h1 {
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 4px;
}

.profile-page-header p {
  font-size: 0.85rem;
  color: var(--color-text-muted);
}

.profile-actions {
  display: flex;
  gap: 12px;
}

.btn-cancel {
  padding: 10px 20px;
  border-radius: var(--radius-full);
  font-size: 0.9rem;
  font-weight: 600;
  border: 1px solid var(--color-border);
  background: var(--color-white);
  color: var(--color-text);
  cursor: pointer;
}
.btn-cancel:hover { background: var(--color-bg); }

.btn-save {
  padding: 10px 20px;
  border-radius: var(--radius-full);
  font-size: 0.9rem;
  font-weight: 600;
  border: none;
  background: var(--color-primary);
  color: var(--color-white);
  cursor: pointer;
}
.btn-save:hover { background: var(--color-primary-light); }

/* ---- Profile Photo Card ---- */
.profile-photo-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.profile-photo-wrap {
  position: relative;
  margin-bottom: 16px;
}

.profile-photo {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid var(--color-white);
  box-shadow: var(--shadow-sm);
}

.photo-edit-btn {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: var(--color-accent);
  color: var(--color-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  border: 3px solid var(--color-white);
  cursor: pointer;
}

.profile-name {
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 4px;
}

.profile-role {
  font-size: 0.85rem;
  color: var(--color-text-muted);
  margin-bottom: 24px;
}

.profile-strength-box {
  width: 100%;
}

.strength-header {
  display: flex;
  justify-content: space-between;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  color: var(--color-accent-dark);
  text-transform: uppercase;
  margin-bottom: 8px;
}

.strength-bar-bg {
  height: 6px;
  background: var(--color-bg);
  border-radius: 3px;
  overflow: hidden;
}

.strength-bar-fill {
  height: 100%;
  background: var(--color-accent);
  border-radius: 3px;
}

/* ---- Section Title ---- */
.section-title-sm {
  font-size: 0.95rem;
  font-weight: 700;
  margin-bottom: 16px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.add-link {
  font-size: 0.8rem;
  color: var(--color-accent-dark);
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
}

/* ---- Input Group styles for links ---- */
.link-input-group {
  margin-bottom: 12px;
}

.link-input-group label {
  display: block;
  font-size: 0.75rem;
  color: var(--color-text-muted);
  margin-bottom: 6px;
}

.link-input-wrap {
  display: flex;
  align-items: center;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  background: var(--color-input-bg);
  overflow: hidden;
}

.link-icon {
  padding: 8px 12px;
  color: var(--color-text-muted);
  background: var(--color-border);
  display: flex;
  align-items: center;
  justify-content: center;
}

.link-input-wrap input {
  flex: 1;
  padding: 8px 12px;
  border: none;
  background: transparent;
  font-size: 0.85rem;
  outline: none;
}

/* ---- Textarea ---- */
textarea.form-textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  background: var(--color-input-bg);
  font-size: 0.85rem;
  color: var(--color-text);
  font-family: inherit;
  resize: vertical;
  min-height: 80px;
  outline: none;
}

/* ---- Chips ---- */
.chips-container {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.skill-chip {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 12px;
  background: rgba(245, 166, 35, 0.8);
  color: var(--color-primary);
  border-radius: var(--radius-full);
  font-size: 0.8rem;
  font-weight: 600;
}

.skill-chip button {
  background: none;
  border: none;
  color: inherit;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  opacity: 0.7;
}
.skill-chip button:hover { opacity: 1; }

/* ---- Resume Upload ---- */
.upload-box {
  border: 1.5px dashed var(--color-border);
  border-radius: var(--radius-md);
  padding: 32px 20px;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 12px;
  background: #fafafa;
  margin-bottom: 16px;
}

.upload-box svg { color: var(--color-text-muted); width: 24px; height: 24px; }
.upload-box h5 { font-size: 0.9rem; font-weight: 600; }
.upload-box p { font-size: 0.75rem; color: var(--color-text-muted); }

.file-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  background: var(--color-bg);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
}
.file-item-info { display: flex; align-items: center; gap: 12px; }
.file-item-info svg { color: var(--color-accent-dark); }
.file-item-info h6 { font-size: 0.85rem; font-weight: 600; }
.file-item-info p { font-size: 0.7rem; color: var(--color-text-muted); }

/* ---- Timeline Items ---- */
.timeline {
  display: flex;
  flex-direction: column;
  gap: 20px;
  position: relative;
  padding-left: 20px;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 5px;
  top: 8px;
  bottom: 8px;
  width: 2px;
  background: var(--color-border);
}

.timeline-item {
  position: relative;
}

.timeline-dot {
  position: absolute;
  left: -20px;
  top: 4px;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: var(--color-text-muted);
  border: 2px solid var(--color-white);
  transform: translateX(-50%);
}

.timeline-item.active .timeline-dot { background: var(--color-accent-dark); }

.timeline-content {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}

.timeline-content h5 { font-size: 0.95rem; font-weight: 700; margin-bottom: 2px; }
.timeline-content p { font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 4px; }
.timeline-content .meta { font-size: 0.75rem; font-weight: 600; color: var(--color-accent-dark); }
.timeline-content .meta.muted { color: var(--color-text-muted); font-weight: 500; }

.edit-icon-btn { background: none; border: none; color: var(--color-text-muted); cursor: pointer; }
.edit-icon-btn:hover { color: var(--color-primary); }

/* ---- Grid Items for Projects/Certs ---- */
.item-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}

.grid-card {
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  padding: 16px;
}

.grid-card h5 { font-size: 0.9rem; font-weight: 700; margin-bottom: 4px; }
.grid-card p { font-size: 0.75rem; color: var(--color-text-muted); line-height: 1.4; }

.cert-card {
  display: flex;
  align-items: center;
  gap: 12px;
}
.cert-icon {
  width: 40px; height: 40px; border-radius: var(--radius-sm);
  background: #059669; color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
}
.cert-info h5 { font-size: 0.85rem; font-weight: 700; margin-bottom: 2px; }
.cert-info p { font-size: 0.7rem; color: var(--color-text-muted); font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; }

</style>
<div class="profile-page-header">
<div>
    <h1>Edit Professional Profile</h1>
    <p>Keep your information up to date to attract mentors and recruiters.</p>
</div>
<div class="profile-actions">
    <button type="button" class="btn-cancel">Cancel</button>
    <button type="submit" form="profileForm" class="btn-save">Save Changes</button>
</div>
</div>

<form id="profileForm" action="/profile/update" method="POST">
<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">

<div class="row">
<!-- Left Sidebar -->
<div class="col" style="width: 280px; flex-shrink:0;">
    
    <div class="app-card">
    <div class="app-card-body profile-photo-card">
        <div class="profile-photo-wrap">
        <img src="/assets/img/signup_side_img.png" alt="<?= htmlspecialchars($user->full_name) ?>" class="profile-photo" style="object-position:top;" />
        <button class="photo-edit-btn">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
        </button>
        </div>
        <h2 class="profile-name"><?= htmlspecialchars($user->full_name) ?></h2>
        <p class="profile-role"><?= htmlspecialchars(ucfirst($user->role)) ?></p>
        
        <div class="profile-strength-box">
        <div class="strength-header">
            <span>PROFILE STRENGTH: 85%</span>
        </div>
        <div class="strength-bar-bg">
            <div class="strength-bar-fill" style="width: 85%;"></div>
        </div>
        <div style="margin-top:10px; padding-top:10px; border-top:1px dashed #e2e8f0;">
            <div style="font-size:0.68rem; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; color:#94a3b8; margin-bottom:8px;">Complete to reach 100%</div>
            <div style="display:flex; flex-direction:column; gap:6px;">
            <div style="display:flex; align-items:center; gap:8px; font-size:0.78rem; color:#475569;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#15803d" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span style="text-decoration:line-through; color:#94a3b8;">Resume uploaded</span>
            </div>
            <div style="display:flex; align-items:center; gap:8px; font-size:0.78rem; color:#475569;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#15803d" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span style="text-decoration:line-through; color:#94a3b8;">Core skills added</span>
            </div>
            <a href="#" style="display:flex; align-items:center; gap:8px; font-size:0.78rem; color:#ef4444; font-weight:700; text-decoration:none;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#ef4444" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Add Career Interests
            </a>
            <a href="#" style="display:flex; align-items:center; gap:8px; font-size:0.78rem; color:#ef4444; font-weight:700; text-decoration:none;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#ef4444" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Add Mentorship Preferences
            </a>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="app-card">
    <div class="app-card-body">
        <h3 class="section-title-sm">Social Connections</h3>
        
        <div class="link-input-group">
        <label>LinkedIn URL</label>
        <div class="link-input-wrap">
            <div class="link-icon"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg></div>
            <input type="text" value="linkedin.com/in/alexrivers" />
        </div>
        </div>

        <div class="link-input-group">
        <label>GitHub Profile</label>
        <div class="link-input-wrap">
            <div class="link-icon"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg></div>
            <input type="text" value="github.com/arivers-dev" />
        </div>
        </div>

        <div class="link-input-group" style="margin-bottom:0;">
        <label>Portfolio / Website</label>
        <div class="link-input-wrap">
            <div class="link-icon"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
            <input type="text" value="alexrivers.me" />
        </div>
        </div>

    </div>
    </div>

</div>

<!-- Right Column -->
<div class="col flex-1">
    
    <!-- About Me -->
    <div class="app-card">
    <div class="app-card-body">
        <h3 class="section-title-sm">About Me</h3>
        <textarea name="about_me" class="form-textarea" rows="3"><?= htmlspecialchars($user->about_me ?? 'Passionate Computer Science student...') ?></textarea>
    </div>
    </div>

    <!-- Core Skills -->
    <div class="app-card">
    <div class="app-card-body">
        <h3 class="section-title-sm">
        Core Skills
        <a class="add-link">+ Add Skill</a>
        </h3>
        <div class="chips-container">
        <div class="skill-chip">React.js <button><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button></div>
        <div class="skill-chip">Python <button><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button></div>
        <div class="skill-chip">UI Design <button><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button></div>
        <div class="skill-chip">Machine Learning <button><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button></div>
        <div class="skill-chip">Tailwind CSS <button><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button></div>
        </div>
    </div>
    </div>

    <!-- Resume -->
    <div class="app-card">
    <div class="app-card-body">
        <h3 class="section-title-sm">Resume / CV</h3>
        <div class="upload-box">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
        <div>
            <h5>Drag and drop your resume here</h5>
            <p>PDF, DOCX up to 10MB</p>
        </div>
        <button class="btn-cancel" style="padding:6px 16px; margin-top:8px;">Browse Files</button>
        </div>
        <div class="file-item">
        <div class="file-item-info">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            <div>
            <h6>Rivers_Resume_2024.pdf</h6>
            <p>Last updated Oct 12, 2023</p>
            </div>
        </div>
        <button class="edit-icon-btn"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg></button>
        </div>
    </div>
    </div>

    <!-- Education History -->
    <div class="app-card">
    <div class="app-card-body">
        <h3 class="section-title-sm">
        Education History
        <a class="add-link">+ Add Education</a>
        </h3>
        <div class="timeline">
        <div class="timeline-item active">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
            <div>
                <h5>Stanford University</h5>
                <p>B.S. in Computer Science</p>
                <span class="meta">GPA: 3.9/4.0 • Expected 2025</span>
            </div>
            <button class="edit-icon-btn"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/></svg></button>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
            <div>
                <h5>Lincoln Academic Prep</h5>
                <p>High School Diploma</p>
                <span class="meta muted">Graduated 2021</span>
            </div>
            <button class="edit-icon-btn"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/></svg></button>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="item-grid">
    <!-- Top Projects -->
    <div class="app-card">
        <div class="app-card-body">
        <h3 class="section-title-sm">
            Top Projects
            <button class="header-icon-btn" style="width:24px;height:24px;border:1px solid var(--color-border);"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></button>
        </h3>
        <div class="col" style="gap:12px;">
            <div class="grid-card">
            <h5>EcoTrack AI</h5>
            <p>A sustainable lifestyle tracker using ML to predict carbon footprint based on shopping habits.</p>
            </div>
            <div class="grid-card">
            <h5>CampusConnect API</h5>
            <p>Open-source GraphQL wrapper for university resource databases.</p>
            </div>
        </div>
        </div>
    </div>

    <!-- Certifications -->
    <div class="app-card">
        <div class="app-card-body">
        <h3 class="section-title-sm">
            Certifications
            <button class="header-icon-btn" style="width:24px;height:24px;border:1px solid var(--color-border);"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></button>
        </h3>
        <div class="col" style="gap:16px;">
            <div class="cert-card">
            <div class="cert-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cert-info">
                <h5>AWS Cloud Practitioner</h5>
                <p>Valid thru Dec 2025</p>
            </div>
            </div>
            <div class="cert-card">
            <div class="cert-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cert-info">
                <h5>Google UX Certificate</h5>
                <p>Completed Sep 2023</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

</div>
</div>
</form>

<!-- Toast -->
<div id="profileToast" style="position:fixed; bottom:24px; right:24px; background:#0f172a; color:#fff; padding:14px 22px; border-radius:12px; font-size:0.9rem; font-weight:600; opacity:0; transform:translateY(10px); transition:0.3s; z-index:9999; display:flex; align-items:center; gap:10px;"></div>
