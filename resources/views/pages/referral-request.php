<span class="eyebrow">CAREER ACCELERATION</span>
<h1 class="page-title">Request a Referral</h1>
<p class="page-subtitle">Connect with our esteemed alumni at top global firms. A direct referral increases your chances of landing an interview by 4x.</p>

<div class="layout-2col">
    
<!-- LEFT COLUMN: Stepper -->
<form action="/referral-request/submit" method="POST" class="col-main">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
    <input type="hidden" name="alumni_id" value="2"> <!-- Hardcoded for now -->
    
    <div class="step-card">
    
    <div class="step-header">
        <div class="step-number">1</div>
        <div class="step-title">Select Target Alumni</div>
    </div>
    <div class="target-alumni-grid mb-8">
        <div class="alumni-select-card selected">
        <svg class="check-icon" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
        <div class="alumni-logo-box"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
        <div>
            <div class="font-bold">Sarah Chen</div>
            <div class="text-xs text-muted">Lead Eng @ Google</div>
        </div>
        </div>
        <div class="alumni-select-card">
        <svg class="check-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/></svg>
        <div class="alumni-logo-box"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
        <div>
            <div class="font-bold">Marcus Thorne</div>
            <div class="text-xs text-muted">VP @ Goldman Sachs</div>
        </div>
        </div>
    </div>

    <div class="step-header">
        <div class="step-number">2</div>
        <div class="step-title">Upload Latest Resume</div>
    </div>
    <div class="upload-box" style="margin-bottom:32px; background:var(--color-white);">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
        <div>
        <h5 class="font-semibold text-md mb-1">Drag and drop your PDF here</h5>
        <p class="text-xs text-muted">or click to browse from your device (Max 5MB)</p>
        </div>
    </div>

    <div class="step-header">
        <div class="step-number">3</div>
        <div class="step-title">Personal Introduction</div>
    </div>
    <textarea class="form-textarea mb-6" rows="4" placeholder="Briefly explain why you're interested in this role and how the alumni's experience inspires you..."></textarea>

    <button type="submit" class="btn-primary" style="width:100%; padding:16px; border-radius:var(--radius-md); font-size:1rem; display:flex; justify-content:center; gap:8px; align-items:center;">
        Submit Referral Request
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
    </button>

    </div>
</form>

<!-- RIGHT COLUMN -->
<div class="col-side-sm">
    
    <div class="step-card" style="padding:24px;">
    <h3 class="font-bold text-lg mb-2">Active Tracker</h3>
    <div class="tracker-timeline">
        <div class="tracker-step active">
        <div class="tracker-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
        <span class="tracker-label">Requested</span>
        </div>
        <div class="tracker-step">
        <div class="tracker-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
        <span class="tracker-label">Reviewed</span>
        </div>
        <div class="tracker-step">
        <div class="tracker-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><polyline points="9 15 11 17 15 13"/></svg></div>
        <span class="tracker-label">Finalized</span>
        </div>
    </div>

    <div class="latest-referral-box">
        <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
        <div class="font-bold text-sm" style="line-height:1.4;">Latest Referral: Senior Designer @ Adobe</div>
        <span class="badge badge-pending" style="font-size:0.6rem;">PENDING</span>
        </div>
        <p class="text-xs text-muted mb-3" style="line-height:1.5;">Request sent to Alumni **David K.** on Oct 24, 2023. Average response time: 2 days.</p>
        <div class="avatar-stack">
        <img src="/assets/img/mentor_marcus.png" alt="av" />
        <img src="/assets/img/mentor_elena.png" alt="av" />
        <div style="width:32px; height:32px; border-radius:50%; background:var(--color-bg); border:2px solid var(--color-white); display:flex; align-items:center; justify-content:center; font-size:0.6rem; font-weight:700; margin-left:-10px; color:var(--color-text-muted);">+12</div>
        </div>
    </div>
    </div>

    <div class="pro-tips-card mb-4" style="background: #111827;">
    <h3 class="font-bold text-lg mb-4">Referral Pro-Tips</h3>
    <div class="tip-item">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        <p>Keep your note concise. Alumni appreciate clarity and specific intent.</p>
    </div>
    <div class="tip-item">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <p>Ensure your resume is in PDF format and tailored to the company's tech stack.</p>
    </div>
    <div class="tip-item">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        <p>Follow up gently after 7 days if you haven't received a status update.</p>
    </div>
    </div>

    <div class="step-card" style="padding:20px; display:flex; gap:16px; align-items:center;">
    <div style="width:48px;height:48px;border-radius:8px;background:rgba(245, 166, 35, 0.1);color:var(--color-accent-dark);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><path d="M19 8l2 2-2 2M5 8l-2 2 2 2"/></svg>
    </div>
    <div>
        <h4 class="font-bold text-sm mb-1">Need a Resume Review?</h4>
        <p class="text-xs text-muted mb-2">Connect with a career mentor before submitting your request.</p>
        <a href="/mentorship" class="text-xs font-bold" style="color:var(--color-accent-dark);text-transform:uppercase;letter-spacing:0.05em;text-decoration:none;">BOOK A MENTOR SESSION →</a>
    </div>
    </div>

</div>
</div>
