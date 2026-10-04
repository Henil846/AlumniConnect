<!-- HEADER -->
<header class="signup-header" id="signupHeader">
<a href="/" class="logo" id="signupLogo">
    <div class="logo-icon logo-icon-dark">
    <svg viewBox="0 0 24 24" stroke-width="2.2" fill="none" stroke="currentColor"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
    </div>
    Alumni Connect
</a>
<div class="signup-header-right">
    <span>Already a member?</span>
    <a href="/login" id="signInLink">Sign In</a>
</div>
</header>

<!-- MAIN -->
<main class="auth-main" id="signupMain">

<!-- LEFT: Image Panel -->
<div class="signup-image-panel hide-mobile" id="signupImagePanel">
    <img src="/assets/img/signup_side_img.png" alt="Diverse students collaborating in a modern library" class="signup-side-img" id="signupSideImg" />
    <div class="signup-img-caption" id="signupCaption">
    <p>Connect with a global network of excellence.<br/>Join over 50,000 alumni and students across 400+ institutions.</p>
    <div class="caption-bottom">
        <div class="avatar-stack">
        <div class="avatar av1"></div>
        <div class="avatar av2"></div>
        <div class="avatar av3"></div>
        </div>
        <span style="font-size:0.78rem; font-style:italic; color:#555;">"Found my dream mentorship within a week." — Sarah K., Yale '21</span>
    </div>
    </div>
</div>

<!-- RIGHT: Form Panel -->
<div class="auth-form-panel" id="signupFormPanel">
    <div class="auth-form-inner">

    <!-- Steps Bar -->
    <div class="steps-bar" id="stepsBar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3">
        <div class="step-bar-item active" id="stepBar1"></div>
        <div class="step-bar-item" id="stepBar2"></div>
        <div class="step-bar-item" id="stepBar3"></div>
    </div>
    <p class="steps-label" id="stepsLabel"><strong>Step 1 of 3</strong></p>

    <h1 class="auth-title" id="signupTitle">Create your profile</h1>
    <p class="auth-subtitle" id="signupSubtitle">Tell us a little bit about yourself to get started.</p>

    <!-- STEP 1: Profile -->
    <form id="signupForm" action="/signup" method="POST" novalidate>
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf ?? '') ?>">
        <div id="step1Fields">
        <div class="form-group" style="margin-bottom: 16px;">
            <label class="form-label" for="fullName">Full Name</label>
            <div class="input-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <input type="text" id="fullName" name="fullName" placeholder="John Doe" autocomplete="name" required />
            </div>
            <span class="field-error" id="fullNameError"></span>
        </div>

        <div class="form-group" style="margin-bottom: 16px;">
            <label class="form-label" for="signupEmail">Email Address</label>
            <div class="input-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="22,4 12,13 2,4"/></svg>
            <input type="email" id="signupEmail" name="email" placeholder="john@example.com" autocomplete="email" required />
            </div>
            <span class="field-error" id="signupEmailError"></span>
        </div>

        <div class="form-group" style="margin-bottom: 16px;">
            <label class="form-label">Joining as</label>
            <div class="join-as-row">
            <button type="button" class="join-as-btn active" id="joinStudent" data-type="student">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                Student
            </button>
            <button type="button" class="join-as-btn" id="joinAlumni" data-type="alumni">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                Alumni
            </button>
            <input type="hidden" name="role" id="roleInput" value="student" />
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 16px;">
            <label class="form-label" for="college">College / Institution</label>
            <div class="input-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="college" name="college" placeholder="Search your alma mater..." autocomplete="off" />
            </div>
            <!-- College suggestions dropdown -->
            <div class="college-dropdown" id="collegeDropdown" role="listbox" aria-label="College suggestions"></div>
            <span class="field-error" id="collegeError"></span>
        </div>

        <div class="form-group" style="margin-bottom: 16px;">
            <label class="form-label" for="signupPassword">Password</label>
            <div class="input-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input type="password" id="signupPassword" name="password" placeholder="Min. 8 characters" autocomplete="new-password" required />
            <button type="button" class="input-toggle" id="signupTogglePwd" aria-label="Toggle password">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
            </div>
            <!-- Password strength -->
            <div class="password-strength" id="passwordStrength" style="display:none;">
            <div class="strength-bars">
                <div class="strength-bar" id="sb1"></div>
                <div class="strength-bar" id="sb2"></div>
                <div class="strength-bar" id="sb3"></div>
                <div class="strength-bar" id="sb4"></div>
            </div>
            <span class="strength-label" id="strengthLabel"></span>
            </div>
            <span class="field-error" id="signupPasswordError"></span>
        </div>

        <div class="terms-row" style="margin-bottom: 24px;">
            <input type="checkbox" id="termsCheck" name="terms" />
            <label for="termsCheck">
            I agree to the <a href="#" id="termsLink">Terms of Service</a> and <a href="#" id="privacyLink">Privacy Policy</a>.
            </label>
        </div>

        <button type="submit" class="btn-primary" id="signupSubmitBtn">
            Continue to Academic Details
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
        </div>
    </form>

    </div>
</div>

</main>

<!-- FOOTER STRIP -->
<footer class="auth-footer-strip" id="signupFooter">
Alumni Connect — Elevating Human Capital
</footer>

<style>
.logo-icon-dark { background: var(--color-primary) !important; }
.logo-icon-dark svg { color: var(--color-white) !important; }

/* Password strength */
.password-strength {
    margin-top: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.strength-bars { display: flex; gap: 4px; flex: 1; }
.strength-bar {
    flex: 1;
    height: 3px;
    border-radius: 2px;
    background: var(--color-border);
    transition: background 0.3s;
}
.strength-bar.weak { background: #ef4444; }
.strength-bar.fair { background: #f59e0b; }
.strength-bar.good { background: #10b981; }
.strength-bar.strong { background: #059669; }
.strength-label { font-size: 0.72rem; color: var(--color-text-muted); white-space: nowrap; }

/* College dropdown */
.college-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: var(--color-white);
    border: 1.5px solid var(--color-border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-md);
    z-index: 100;
    max-height: 200px;
    overflow-y: auto;
    display: none;
}
.college-dropdown.open { display: block; }
.college-option {
    padding: 10px 14px;
    font-size: 0.875rem;
    cursor: pointer;
    transition: background 0.15s;
}
.college-option:hover { background: var(--color-bg); }
.college-option strong { color: var(--color-primary); }

/* Fix relative position for dropdown */
#college { position: relative; }
.form-group { position: relative; }
</style>

<script>
    document.querySelectorAll('.join-as-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            document.querySelectorAll('.join-as-btn').forEach(b => b.classList.remove('active'));
            e.currentTarget.classList.add('active');
            document.getElementById('roleInput').value = e.currentTarget.dataset.type;
        });
    });
</script>
