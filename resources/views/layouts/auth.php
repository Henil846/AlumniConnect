<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?? 'Alumni Connect' ?></title>
  
  
<style>

/* Embedded from styles.css */
/* ===========================
   Alumni Connect - Shared Styles
   =========================== */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

/* ---- CSS Variables ---- */
:root {
  --color-primary: #1a2340;
  --color-primary-light: #243060;
  --color-accent: #F5A623;
  --color-accent-dark: #e09518;
  --color-bg: #F5F4F0;
  --color-white: #ffffff;
  --color-text: #1a2340;
  --color-text-muted: #6b7280;
  --color-text-light: #9ca3af;
  --color-border: #e5e7eb;
  --color-input-bg: #f9fafb;
  --color-success: #10b981;
  --color-error: #ef4444;
  --radius-sm: 8px;
  --radius-md: 12px;
  --radius-lg: 20px;
  --radius-xl: 28px;
  --radius-full: 9999px;
  --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
  --shadow-md: 0 4px 16px rgba(0,0,0,0.10);
  --shadow-lg: 0 8px 32px rgba(0,0,0,0.14);
  --shadow-xl: 0 16px 48px rgba(0,0,0,0.18);
  --transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
}

/* ---- Reset ---- */
*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html { scroll-behavior: smooth; }

body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  color: var(--color-text);
  background: var(--color-bg);
  -webkit-font-smoothing: antialiased;
  min-height: 100vh;
}

a { text-decoration: none; color: inherit; }
ul { list-style: none; }
img { display: block; max-width: 100%; }
button { cursor: pointer; font-family: inherit; border: none; }
input { font-family: inherit; }

/* ---- Shared Logo ---- */
.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 700;
  font-size: 1.1rem;
  color: var(--color-text);
  letter-spacing: -0.02em;
  text-decoration: none;
}

.logo-icon {
  width: 38px;
  height: 38px;
  background: var(--color-primary);
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.logo-icon svg {
  width: 22px;
  height: 22px;
  color: var(--color-white);
  fill: none;
  stroke: currentColor;
  stroke-width: 2;
}

/* ---- Shared Buttons ---- */
.btn-primary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 14px 28px;
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: var(--radius-full);
  font-weight: 600;
  font-size: 0.95rem;
  letter-spacing: -0.01em;
  border: none;
  cursor: pointer;
  transition: var(--transition);
  width: 100%;
}

.btn-primary:hover {
  background: var(--color-primary-light);
  transform: translateY(-1px);
  box-shadow: var(--shadow-md);
}

.btn-primary:active { transform: translateY(0); }

.btn-accent {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 16px 36px;
  background: var(--color-accent);
  color: var(--color-primary);
  border-radius: var(--radius-full);
  font-weight: 700;
  font-size: 1rem;
  border: none;
  cursor: pointer;
  transition: var(--transition);
}

.btn-accent:hover {
  background: var(--color-accent-dark);
  transform: translateY(-1px);
  box-shadow: 0 8px 24px rgba(245,166,35,0.4);
}

.btn-ghost {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 14px 28px;
  background: transparent;
  color: var(--color-text);
  border-radius: var(--radius-full);
  font-weight: 500;
  font-size: 0.95rem;
  border: 1.5px solid var(--color-border);
  cursor: pointer;
  transition: var(--transition);
  width: 100%;
}

.btn-ghost:hover {
  border-color: var(--color-text);
  background: rgba(0,0,0,0.03);
}

/* ---- Form Elements ---- */
.form-group { display: flex; flex-direction: column; gap: 6px; }

.form-label {
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--color-text);
}

.input-wrap {
  position: relative;
  display: flex;
  align-items: center;
}

.input-wrap svg {
  position: absolute;
  left: 14px;
  width: 18px;
  height: 18px;
  color: var(--color-text-light);
  pointer-events: none;
  flex-shrink: 0;
}

.input-wrap input {
  width: 100%;
  padding: 13px 16px 13px 42px;
  border: 1.5px solid var(--color-border);
  border-radius: var(--radius-md);
  background: var(--color-white);
  font-size: 0.925rem;
  color: var(--color-text);
  transition: var(--transition);
  outline: none;
}

.input-wrap input:focus {
  border-color: var(--color-primary);
  box-shadow: 0 0 0 3px rgba(26,35,64,0.08);
}

.input-wrap input::placeholder { color: var(--color-text-light); }

.input-toggle {
  position: absolute;
  right: 14px;
  background: none;
  border: none;
  cursor: pointer;
  color: var(--color-text-light);
  padding: 4px;
  display: flex;
  align-items: center;
}

.input-toggle:hover { color: var(--color-text); }

/* ---- Avatar Stack ---- */
.avatar-stack {
  display: flex;
  align-items: center;
}

.avatar-stack .avatar {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid var(--color-white);
  object-fit: cover;
  margin-left: -8px;
  background: linear-gradient(135deg, #667eea, #764ba2);
}

.avatar-stack .avatar:first-child { margin-left: 0; }

.avatar-count {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid var(--color-white);
  background: var(--color-primary);
  color: var(--color-white);
  font-size: 0.65rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: -8px;
}

/* ---- Divider ---- */
.divider {
  display: flex;
  align-items: center;
  gap: 12px;
  color: var(--color-text-muted);
  font-size: 0.85rem;
}

.divider::before,
.divider::after {
  content: '';
  flex: 1;
  height: 1px;
  background: var(--color-border);
}

/* ---- Toast Notification ---- */
.toast {
  position: fixed;
  bottom: 24px;
  right: 24px;
  background: var(--color-white);
  border-radius: var(--radius-md);
  padding: 14px 18px;
  box-shadow: var(--shadow-lg);
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 0.875rem;
  font-weight: 500;
  z-index: 9999;
  transform: translateY(80px);
  opacity: 0;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  max-width: 320px;
}

.toast.show {
  transform: translateY(0);
  opacity: 1;
}

.toast-icon {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.toast-success .toast-icon { background: rgba(16,185,129,0.1); color: var(--color-success); }
.toast-error .toast-icon { background: rgba(239,68,68,0.1); color: var(--color-error); }
.toast-info .toast-icon { background: rgba(245,166,35,0.1); color: var(--color-accent); }

/* ---- Responsive Helpers ---- */
@media (max-width: 768px) {
  .hide-mobile { display: none !important; }
}

@media (min-width: 769px) {
  .hide-desktop { display: none !important; }
}

/* Embedded from auth.css */
/* ===========================
   Auth Pages (Login, Signup, Verify, Forgot)
   =========================== */

/* ---- Auth Page Base ---- */
.auth-page {
  min-height: 100vh;
  background: var(--color-bg);
}

/* ---- Auth Header ---- */
.auth-header {
  padding: 22px 40px;
  display: flex;
  align-items: center;
  border-bottom: 1px solid transparent;
}

/* ---- Auth Main Layout ---- */
.auth-main {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: calc(100vh - 81px);
}

/* ---- Form Panel ---- */
.auth-form-panel {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px 48px;
}

.auth-form-inner {
  width: 100%;
  max-width: 400px;
}

.auth-title {
  font-size: 2rem;
  font-weight: 800;
  color: var(--color-text);
  letter-spacing: -0.04em;
  margin-bottom: 6px;
}

.auth-subtitle {
  font-size: 0.9rem;
  color: var(--color-text-muted);
  margin-bottom: 28px;
  line-height: 1.5;
}

/* ---- Role Tabs ---- */
.role-tabs {
  display: flex;
  align-items: center;
  gap: 0;
  background: transparent;
  border-radius: 0;
  padding: 0;
  border-bottom: 1.5px solid var(--color-border);
}

.role-tab {
  flex: 1;
  padding: 10px 12px;
  background: transparent;
  border: none;
  border-bottom: 2.5px solid transparent;
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--color-text-muted);
  cursor: pointer;
  transition: var(--transition);
  margin-bottom: -1.5px;
  border-radius: 0;
  text-align: center;
}

.role-tab:first-child { border-radius: 8px 0 0 0; }
.role-tab:last-child { border-radius: 0 8px 0 0; }

.role-tab.active {
  color: var(--color-white);
  background: var(--color-primary);
  border-radius: 8px;
  border-bottom-color: var(--color-primary);
  font-weight: 600;
}

.role-tab:hover:not(.active) {
  color: var(--color-text);
  background: rgba(26,35,64,0.05);
  border-radius: 8px;
}

/* ---- Label Row ---- */
.label-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 6px;
}

.forgot-link {
  font-size: 0.825rem;
  color: var(--color-accent-dark);
  font-weight: 500;
  transition: var(--transition);
}

.forgot-link:hover { color: var(--color-primary); text-decoration: underline; }

/* ---- Field Errors ---- */
.field-error {
  font-size: 0.78rem;
  color: var(--color-error);
  min-height: 16px;
  display: block;
  margin-top: 4px;
}

/* ---- Login Submit ---- */
.login-submit {
  border-radius: var(--radius-full);
  font-size: 0.95rem;
  font-weight: 600;
  letter-spacing: 0.01em;
}

/* ---- Google Button ---- */
.btn-google {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  width: 100%;
  padding: 13px 20px;
  background: var(--color-white);
  border: 1.5px solid var(--color-border);
  border-radius: var(--radius-full);
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--color-text);
  cursor: pointer;
  transition: var(--transition);
  font-family: inherit;
}

.btn-google:hover {
  border-color: #ccc;
  box-shadow: var(--shadow-sm);
  background: #fafafa;
}

/* ---- Auth Switch ---- */
.auth-switch {
  font-size: 0.875rem;
  color: var(--color-text-muted);
  text-align: center;
}

.auth-switch-link {
  color: var(--color-text);
  font-weight: 700;
  transition: var(--transition);
}

.auth-switch-link:hover { color: var(--color-primary-light); text-decoration: underline; }

/* ---- Image Panel ---- */
.auth-image-panel {
  background: #f0ede8;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px;
  position: relative;
  overflow: hidden;
}

.auth-image-wrap {
  position: relative;
  width: 100%;
  max-width: 420px;
  border-radius: var(--radius-xl);
  overflow: visible;
}

.auth-side-img {
  width: 100%;
  height: 480px;
  object-fit: cover;
  border-radius: var(--radius-xl);
  display: block;
}

/* Sparkle badge */
.sparkle-badge {
  position: absolute;
  top: -16px;
  right: -16px;
  width: 52px;
  height: 52px;
  background: var(--color-accent);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-primary);
  box-shadow: 0 4px 16px rgba(245,166,35,0.4);
  animation: spin-slow 8s linear infinite;
}

@keyframes spin-slow {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

/* Image caption */
.image-caption {
  position: absolute;
  bottom: 20px;
  left: 16px;
  right: 16px;
  background: rgba(255,255,255,0.92);
  backdrop-filter: blur(12px);
  border-radius: var(--radius-md);
  padding: 16px 18px;
  display: flex;
  align-items: center;
  gap: 14px;
}

.caption-avatars .avatar { border-color: rgba(255,255,255,0.9); }

.image-caption p {
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--color-text);
  line-height: 1.4;
  letter-spacing: -0.02em;
}

/* Mentors badge */
.mentors-badge {
  position: absolute;
  bottom: -16px;
  right: -8px;
  background: var(--color-white);
  border-radius: var(--radius-full);
  padding: 8px 16px;
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.78rem;
  font-weight: 600;
  color: var(--color-text);
  box-shadow: var(--shadow-md);
  white-space: nowrap;
}

.mentor-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--color-success);
  flex-shrink: 0;
  box-shadow: 0 0 0 2px rgba(16,185,129,0.2);
  animation: pulse-dot 2s infinite;
}

/* ===========================
   SIGNUP PAGE SPECIFIC
   =========================== */
.signup-header {
  padding: 22px 40px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid transparent;
}

.signup-header-right {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.875rem;
  color: var(--color-text-muted);
}

.signup-header-right a {
  font-weight: 700;
  color: var(--color-text);
  transition: var(--transition);
}

.signup-header-right a:hover { text-decoration: underline; }

/* Steps progress */
.steps-bar {
  display: flex;
  gap: 6px;
  margin-bottom: 8px;
}

.step-bar-item {
  height: 3px;
  flex: 1;
  border-radius: 2px;
  background: var(--color-border);
  transition: background 0.4s ease;
}

.step-bar-item.active { background: var(--color-primary); }
.step-bar-item.done { background: var(--color-accent); }

.steps-label {
  font-size: 0.78rem;
  color: var(--color-text-muted);
  margin-bottom: 8px;
}

.steps-label strong { color: var(--color-text); }

/* Joining as selector */
.join-as-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
}

.join-as-btn {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  padding: 16px 12px;
  border: 1.5px solid var(--color-border);
  border-radius: var(--radius-md);
  background: var(--color-white);
  cursor: pointer;
  font-family: inherit;
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--color-text-muted);
  transition: var(--transition);
}

.join-as-btn svg {
  width: 22px;
  height: 22px;
  color: var(--color-text-muted);
}

.join-as-btn.active {
  border-color: var(--color-primary);
  color: var(--color-text);
  background: rgba(26,35,64,0.04);
  font-weight: 600;
}

.join-as-btn.active svg { color: var(--color-primary); }

.join-as-btn:hover:not(.active) {
  border-color: #aaa;
  color: var(--color-text);
}

/* Terms checkbox */
.terms-row {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  font-size: 0.825rem;
  color: var(--color-text-muted);
  margin-top: 4px;
}

.terms-row input[type="checkbox"] {
  margin-top: 2px;
  width: 16px;
  height: 16px;
  accent-color: var(--color-primary);
  cursor: pointer;
  flex-shrink: 0;
}

.terms-row a {
  color: var(--color-text);
  font-weight: 600;
  text-decoration: underline;
}

/* Signup image panel */
.signup-image-panel {
  background: #f0ede8;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 60px 40px;
  gap: 24px;
  position: relative;
}

.signup-side-img {
  width: 100%;
  max-width: 420px;
  height: 380px;
  object-fit: cover;
  border-radius: var(--radius-xl);
}

.signup-img-caption {
  position: absolute;
  bottom: 56px;
  left: 60px;
  right: 60px;
  background: rgba(255,255,255,0.88);
  backdrop-filter: blur(8px);
  border-radius: var(--radius-md);
  padding: 16px;
  max-width: 420px;
}

.signup-img-caption p {
  font-size: 0.875rem;
  font-style: italic;
  color: var(--color-text);
  font-weight: 500;
  line-height: 1.5;
}

.signup-img-caption .caption-bottom {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-top: 8px;
}

/* Footer strip */
.auth-footer-strip {
  padding: 20px 40px;
  text-align: center;
  border-top: 1px solid var(--color-border);
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-text-muted);
}

/* ===========================
   VERIFY PAGE
   =========================== */
.verify-page {
  background: var(--color-bg);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.verify-page .auth-header { border-bottom: none; }

.verify-main {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px 20px;
  position: relative;
}

.verify-card {
  background: var(--color-white);
  border-radius: var(--radius-xl);
  padding: 48px 40px;
  width: 100%;
  max-width: 440px;
  box-shadow: var(--shadow-md);
  text-align: center;
  position: relative;
  z-index: 2;
}

.verify-icon-wrap {
  position: relative;
  width: 72px;
  height: 72px;
  margin: 0 auto 24px;
}

.verify-icon-bg {
  width: 72px;
  height: 72px;
  background: var(--color-primary);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.verify-icon-bg svg {
  width: 32px;
  height: 32px;
  color: var(--color-white);
}

.verify-check {
  position: absolute;
  bottom: -4px;
  right: -4px;
  width: 24px;
  height: 24px;
  background: var(--color-success);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 2px solid var(--color-white);
}

.verify-check svg {
  width: 12px;
  height: 12px;
  color: var(--color-white);
}

.verify-title {
  font-size: 1.6rem;
  font-weight: 800;
  letter-spacing: -0.03em;
  margin-bottom: 12px;
}

.verify-desc {
  font-size: 0.875rem;
  color: var(--color-text-muted);
  line-height: 1.6;
  margin-bottom: 32px;
}

.verify-desc strong { color: var(--color-text); }

/* OTP inputs */
.otp-row {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  margin-bottom: 28px;
}

.otp-input {
  width: 52px;
  height: 60px;
  border: 1.5px solid var(--color-border);
  border-radius: var(--radius-md);
  text-align: center;
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--color-text);
  background: var(--color-bg);
  outline: none;
  transition: var(--transition);
  font-family: inherit;
}

.otp-input:focus {
  border-color: var(--color-primary);
  background: var(--color-white);
  box-shadow: 0 0 0 3px rgba(26,35,64,0.08);
}

.otp-input.filled {
  border-color: var(--color-primary);
  background: rgba(26,35,64,0.04);
}

.otp-input.error { border-color: var(--color-error); }

.verify-btn {
  border-radius: var(--radius-full);
  font-size: 0.95rem;
  margin-bottom: 20px;
}

.verify-divider {
  width: 100%;
  height: 1px;
  background: var(--color-border);
  margin: 20px 0;
}

.verify-footer-row {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.expire-text {
  font-size: 0.825rem;
  color: var(--color-text-muted);
}

.expire-text strong { color: var(--color-text); font-weight: 700; }

.resend-text {
  font-size: 0.825rem;
  color: var(--color-text-muted);
}

.resend-link {
  color: var(--color-accent-dark);
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
  background: none;
  border: none;
  font-family: inherit;
  font-size: inherit;
}

.resend-link:hover { color: var(--color-primary); text-decoration: underline; }
.resend-link:disabled { opacity: 0.4; cursor: not-allowed; pointer-events: none; }

/* Glow blob */
.verify-glow {
  position: absolute;
  top: -10%;
  right: -5%;
  width: 380px;
  height: 380px;
  background: radial-gradient(circle, rgba(245,166,35,0.12) 0%, transparent 70%);
  border-radius: 50%;
  pointer-events: none;
}

/* Security badge */
.security-badge {
  position: absolute;
  bottom: 48px;
  right: 48px;
  background: var(--color-white);
  border-radius: var(--radius-md);
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 10px;
  box-shadow: var(--shadow-md);
  opacity: 0.85;
}

.security-badge-icon {
  width: 36px;
  height: 36px;
  background: var(--color-accent);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.security-badge-icon svg {
  width: 18px;
  height: 18px;
  color: var(--color-primary);
}

.security-badge-text {
  font-size: 0.72rem;
  color: var(--color-text-muted);
  font-weight: 500;
}

/* Verify Footer */
.verify-page-footer {
  padding: 20px 40px;
  text-align: center;
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-text-muted);
}

/* ===========================
   FORGOT PASSWORD PAGE
   =========================== */
.forgot-page {
  min-height: 100vh;
  background: #f9f6f1;
  display: flex;
  flex-direction: column;
  position: relative;
  overflow: hidden;
}

.forgot-page::before {
  content: '';
  position: absolute;
  top: -100px;
  right: -100px;
  width: 500px;
  height: 500px;
  background: radial-gradient(circle, rgba(245,166,35,0.12) 0%, transparent 65%);
  border-radius: 50%;
  pointer-events: none;
}

.forgot-page::after {
  content: '';
  position: absolute;
  bottom: -80px;
  right: 10%;
  width: 300px;
  height: 300px;
  background: radial-gradient(circle, rgba(245,166,35,0.07) 0%, transparent 65%);
  border-radius: 50%;
  pointer-events: none;
}

.forgot-header {
  padding: 22px 40px;
  position: relative;
  z-index: 2;
}

.forgot-header .logo-icon { background: var(--color-primary); }
.forgot-header .logo-icon svg { color: var(--color-white); }

.forgot-main {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px 20px;
  position: relative;
  z-index: 2;
}

.forgot-card {
  background: var(--color-white);
  border-radius: var(--radius-xl);
  padding: 48px 40px;
  width: 100%;
  max-width: 400px;
  box-shadow: var(--shadow-lg);
}

.forgot-title {
  font-size: 1.6rem;
  font-weight: 800;
  letter-spacing: -0.03em;
  margin-bottom: 12px;
}

.forgot-desc {
  font-size: 0.875rem;
  color: var(--color-text-muted);
  line-height: 1.6;
  margin-bottom: 28px;
}

.forgot-card .form-label {
  text-transform: uppercase;
  font-size: 0.72rem;
  letter-spacing: 0.08em;
  color: var(--color-text-muted);
  margin-bottom: 8px;
}

.forgot-btn {
  border-radius: var(--radius-full);
  font-size: 0.95rem;
  margin-top: 20px;
  margin-bottom: 24px;
  background: var(--color-primary);
}

.forgot-btn:hover { background: var(--color-primary-light); }

.back-link {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--color-text-muted);
  transition: var(--transition);
  width: 100%;
}

.back-link:hover { color: var(--color-text); }

.forgot-footer {
  padding: 20px 40px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 0.8rem;
  color: var(--color-text-muted);
  position: relative;
  z-index: 2;
  flex-wrap: wrap;
  gap: 8px;
}

.forgot-footer-links { display: flex; gap: 20px; }

.forgot-footer-links a {
  color: var(--color-text-muted);
  transition: var(--transition);
}

.forgot-footer-links a:hover { color: var(--color-text); }

/* ===========================
   RESPONSIVE
   =========================== */
@media (max-width: 900px) {
  .auth-main {
    grid-template-columns: 1fr;
  }

  .auth-image-panel,
  .signup-image-panel {
    display: none;
  }

  .auth-form-panel {
    padding: 24px 24px;
    min-height: calc(100vh - 81px);
    align-items: flex-start;
    padding-top: 40px;
  }

  .auth-form-inner { max-width: 100%; }
}

@media (max-width: 768px) {
  .auth-header { padding: 16px 20px; }
  .signup-header { padding: 16px 20px; }
  .forgot-header { padding: 16px 20px; }

  .auth-form-panel { padding: 24px 20px; }
  .verify-card { padding: 36px 24px; }
  .forgot-card { padding: 36px 24px; }

  .otp-input { width: 44px; height: 52px; font-size: 1.2rem; }
  .otp-row { gap: 8px; }

  .security-badge { display: none; }
  .forgot-footer { padding: 16px 20px; }
}

@media (max-width: 480px) {
  .role-tab { font-size: 0.78rem; padding: 8px 6px; }
  .join-as-row { grid-template-columns: 1fr 1fr; }
  .otp-input { width: 40px; height: 48px; font-size: 1.1rem; }
  .otp-row { gap: 6px; }
}

</style>
</head>
<body class="auth-page">

  <?= $content ?? '' ?>

  <!-- Toast -->
  <div class="toast" id="toast" role="alert" aria-live="polite">
    <div class="toast-icon">
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <span id="toastMsg"></span>
  </div>

  <script src="/assets/js/auth.js"></script>
  <?php if (isset($extraScript)): ?>
    <script src="<?= $extraScript ?>"></script>
  <?php endif; ?>

</body>
</html>
