<!-- HEADER -->
<header class="auth-header" id="authHeader">
<a href="/" class="logo" id="headerLogo">
    <div class="logo-icon">
    <svg viewBox="0 0 24 24" stroke-width="2.2" fill="none" stroke="currentColor"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
    </div>
    Alumni Connect
</a>
</header>

<!-- MAIN -->
<main class="auth-main">

<!-- LEFT: FORM PANEL -->
<div class="auth-form-panel" id="loginFormPanel">
    <div class="auth-form-inner">
    <h1 class="auth-title">Welcome back</h1>
    <p class="auth-subtitle">Access your professional collegiate network.</p>

    <!-- Role Tabs -->
    <div class="role-tabs" id="roleTabs" role="tablist">
        <button class="role-tab active" id="tabStudent" data-role="student" role="tab" aria-selected="true">Student</button>
        <button class="role-tab" id="tabAlumni" data-role="alumni" role="tab" aria-selected="false">Alumni</button>
        <button class="role-tab" id="tabAdmin" data-role="admin" role="tab" aria-selected="false">College Admin</button>
    </div>

    <form id="loginForm" action="/login" method="POST" novalidate>
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf ?? '') ?>">
        <input type="hidden" name="role" id="loginRoleInput" value="student">
        <!-- Email -->
        <div class="form-group" style="margin-top: 24px;">
        <label class="form-label" for="loginEmail">Email Address</label>
        <div class="input-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="22,4 12,13 2,4"/></svg>
            <input type="email" id="loginEmail" name="email" placeholder="name@college.edu" autocomplete="email" required />
        </div>
        <span class="field-error" id="loginEmailError"></span>
        </div>

        <!-- Password -->
        <div class="form-group" style="margin-top: 16px;">
        <div class="label-row">
            <label class="form-label" for="loginPassword">Password</label>
            <a href="/forgot-password" class="forgot-link" id="forgotPasswordLink">Forgot password?</a>
        </div>
        <div class="input-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input type="password" id="loginPassword" name="password" placeholder="••••••••" autocomplete="current-password" required />
            <button type="button" class="input-toggle" id="loginTogglePwd" aria-label="Toggle password visibility">
            <svg id="eyeIconLogin" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
        </div>
        <span class="field-error" id="loginPasswordError"></span>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-primary login-submit" id="loginSubmitBtn" style="margin-top: 24px;">
        Continue
        </button>

        <div class="divider" style="margin: 20px 0;">or</div>

        <!-- Google -->
        <button type="button" class="btn-google" id="googleLoginBtn">
        <svg viewBox="0 0 24 24" width="20" height="20"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
        Continue with Google
        </button>
    </form>

    <p class="auth-switch" style="margin-top: 24px;">
        New to the community? <a href="/signup" class="auth-switch-link" id="createAccountLink">Create an account</a>
    </p>
    </div>
</div>

<!-- RIGHT: IMAGE PANEL -->
<div class="auth-image-panel hide-mobile" id="loginImagePanel">
    <div class="auth-image-wrap">
    <img src="/assets/img/login_side_img.png" alt="Alumni working in a vibrant collaborative workspace" class="auth-side-img" id="loginSideImg" />
    <div class="sparkle-badge" id="sparkleBadge" aria-hidden="true">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M12 2l2.09 6.26L20 10l-5.91 1.74L12 18l-2.09-5.26L4 10l5.91-1.74z"/></svg>
    </div>
    <div class="image-caption" id="loginCaption">
        <div class="avatar-stack caption-avatars">
        <div class="avatar av1"></div>
        <div class="avatar av2"></div>
        <div class="avatar av3"></div>
        <div class="avatar-count">+5k</div>
        </div>
        <p>Join 24,000+ alumni shaping the future together.</p>
    </div>
    <div class="mentors-badge" id="mentorsBadge">
        <span class="mentor-dot"></span>
        <span>243 Active Mentors Online</span>
    </div>
    </div>
</div>

</main>

<script>
    document.querySelectorAll('.role-tab').forEach(tab => {
        tab.addEventListener('click', (e) => {
            document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));
            e.currentTarget.classList.add('active');
            document.getElementById('loginRoleInput').value = e.currentTarget.dataset.role;
        });
    });
</script>
