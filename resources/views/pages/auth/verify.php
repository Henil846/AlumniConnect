<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify Email — Alumni Connect</title>
  <meta name="description" content="Verify your email address to complete your Alumni Connect account setup." />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="auth.css" />
</head>
<body class="verify-page">

  <!-- HEADER -->
  <header class="auth-header" id="verifyHeader">
    <a href="index.html" class="logo" id="verifyLogo">
      <div class="logo-icon" style="background:var(--color-primary);">
        <svg viewBox="0 0 24 24" stroke-width="2.2" fill="none" stroke="white"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
      </div>
      Alumni Connect
    </a>
  </header>

  <!-- MAIN -->
  <main class="verify-main" id="verifyMain">

    <!-- Glow blob decoration -->
    <div class="verify-glow" aria-hidden="true"></div>

    <!-- VERIFY CARD -->
    <div class="verify-card" id="verifyCard">

      <!-- Icon -->
      <div class="verify-icon-wrap">
        <div class="verify-icon-bg">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="2" y="4" width="20" height="16" rx="2"/>
            <polyline points="22,4 12,13 2,4"/>
          </svg>
        </div>
        <div class="verify-check">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
      </div>

      <h1 class="verify-title">Check your inbox</h1>
      <p class="verify-desc" id="verifyDesc">
        We've sent a 6-digit verification code to<br />
        <strong id="verifyEmail">your email</strong>. Please enter it below.
      </p>

      <!-- Demo hint banner -->
      <div style="background:#fefce8; border:1px solid #fde68a; border-radius:12px; padding:12px 16px; margin-bottom:4px; font-size:0.82rem; color:#92400e; display:flex; align-items:center; gap:10px;">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <span><strong>Demo mode:</strong> Enter any 6 digits (e.g. <strong>1 2 3 4 5 6</strong>) to continue.</span>
      </div>

      <!-- OTP Inputs -->
      <form id="otpForm" novalidate>
        <div class="otp-row" id="otpRow" role="group" aria-label="6-digit verification code">
          <input class="otp-input" id="otp0" type="text" inputmode="numeric" maxlength="1" autocomplete="one-time-code" aria-label="Digit 1" />
          <input class="otp-input" id="otp1" type="text" inputmode="numeric" maxlength="1" aria-label="Digit 2" />
          <input class="otp-input" id="otp2" type="text" inputmode="numeric" maxlength="1" aria-label="Digit 3" />
          <input class="otp-input" id="otp3" type="text" inputmode="numeric" maxlength="1" aria-label="Digit 4" />
          <input class="otp-input" id="otp4" type="text" inputmode="numeric" maxlength="1" aria-label="Digit 5" />
          <input class="otp-input" id="otp5" type="text" inputmode="numeric" maxlength="1" aria-label="Digit 6" />
        </div>

        <button type="submit" class="btn-primary verify-btn" id="verifyBtn">
          Verify Account
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
      </form>

      <div class="verify-divider"></div>

      <div class="verify-footer-row">
        <p class="expire-text">Code expires in <strong id="timerDisplay">02:00</strong></p>
        <p class="resend-text">
          Didn't receive the email?
          <button type="button" class="resend-link" id="resendBtn">Resend code</button>
        </p>
      </div>

    </div>

    <!-- Security badge (decorative) -->
    <div class="security-badge hide-mobile" id="securityBadge" aria-hidden="true">
      <div class="security-badge-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
      </div>
      <div>
        <p class="security-badge-text" style="font-weight:600;color:#1a2340;">Secure Verification</p>
        <p class="security-badge-text">256-bit encrypted</p>
      </div>
    </div>

  </main>

  <!-- FOOTER -->
  <footer class="verify-page-footer" id="verifyFooter">
    Secure Collegiate Authentication &bull; Established 1891
  </footer>

  <!-- Toast -->
  <div class="toast" id="toast" role="alert" aria-live="polite">
    <div class="toast-icon">
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <span id="toastMsg"></span>
  </div>

  <script src="auth.js"></script>
  <script src="verify.js"></script>
</body>
</html>
