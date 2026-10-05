<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password — Alumni Connect</title>
  <meta name="description" content="Reset your Alumni Connect password. Enter your email to receive a reset link." />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="auth.css" />
</head>
<body class="forgot-page">

  <!-- HEADER -->
  <header class="forgot-header" id="forgotHeader">
    <a href="index.html" class="logo" id="forgotLogo">
      <div class="logo-icon">
        <svg viewBox="0 0 24 24" stroke-width="2.2" fill="none" stroke="currentColor"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
      </div>
      Alumni Connect
    </a>
  </header>

  <!-- MAIN -->
  <main class="forgot-main" id="forgotMain">
    <div class="forgot-card" id="forgotCard">

      <!-- Default state -->
      <div id="forgotDefault">
        <h1 class="forgot-title">Forgot Password?</h1>
        <p class="forgot-desc">
          Enter the email address associated with your account and we'll send you a link to reset your password.
        </p>

        <form id="forgotForm" novalidate>
          <div class="form-group">
            <label class="form-label" for="forgotEmail">EMAIL ADDRESS</label>
            <div class="input-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="22,4 12,13 2,4"/></svg>
              <input type="email" id="forgotEmail" name="email" placeholder="name@university.edu" autocomplete="email" required />
            </div>
            <span class="field-error" id="forgotEmailError"></span>
          </div>

          <button type="submit" class="btn-primary forgot-btn" id="forgotSubmitBtn">
            Send Reset Link
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>
        </form>

        <a href="login.html" class="back-link" id="backToLoginLink">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
          Back to Login
        </a>
      </div>

      <!-- Success state (hidden by default) -->
      <div id="forgotSuccess" style="display:none; text-align:center;">
        <div style="width:72px;height:72px;background:var(--color-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
          <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="white" stroke-width="2">
            <rect x="2" y="4" width="20" height="16" rx="2"/>
            <polyline points="22,4 12,13 2,4"/>
          </svg>
        </div>
        <h2 style="font-size:1.5rem;font-weight:800;letter-spacing:-0.03em;margin-bottom:12px;">Check your inbox!</h2>
        <p style="font-size:0.875rem;color:var(--color-text-muted);line-height:1.6;margin-bottom:28px;">
          We've sent a password reset link to <strong id="sentToEmail"></strong>. Check your spam folder if you don't see it within a few minutes.
        </p>
        <a href="login.html" class="btn-primary" style="display:flex;align-items:center;justify-content:center;gap:8px;text-decoration:none;padding:14px 28px;border-radius:9999px;" id="backToLoginSuccess">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
          Back to Login
        </a>
        <button type="button" id="resendResetBtn" style="margin-top:16px;background:none;border:none;font-family:inherit;font-size:0.825rem;color:var(--color-text-muted);cursor:pointer;transition:color 0.2s;">
          Didn't receive it? <span style="color:var(--color-accent-dark);font-weight:600;">Resend email</span>
        </button>
      </div>

    </div>
  </main>

  <!-- FOOTER -->
  <footer class="forgot-footer" id="forgotFooter">
    <p>© 2024 Alumni Connect Platform. Built for the Modern Professional.</p>
    <div class="forgot-footer-links">
      <a href="#" id="footerPrivacy">Privacy Policy</a>
      <a href="#" id="footerTerms">Terms of Service</a>
    </div>
  </footer>

  <!-- Toast -->
  <div class="toast" id="toast" role="alert" aria-live="polite">
    <div class="toast-icon">
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <span id="toastMsg"></span>
  </div>

  <script src="/assets/js/forgot-password.js"></script>
</body>
</html>
