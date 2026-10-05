
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

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

*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body { font-family: 'Inter', sans-serif; background: var(--color-bg); color: var(--color-text); }
a { text-decoration: none; }

/* Embedded from landing.css */
/* ===========================
   Landing Page Styles
   =========================== */

/* NAVBAR */
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 48px;
  transition: var(--transition);
}

.navbar.scrolled {
  background: rgba(26,35,64,0.92);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  padding: 12px 48px;
  box-shadow: 0 4px 24px rgba(0,0,0,0.2);
}

.navbar .logo { color: var(--color-white); }
.navbar .logo-icon { background: var(--color-accent); }
.navbar .logo-icon svg { color: var(--color-primary); }

.nav-login-btn {
  font-weight: 600;
  font-size: 0.95rem;
  color: var(--color-white);
  letter-spacing: -0.01em;
  padding: 8px 20px;
  border-radius: var(--radius-full);
  border: 1.5px solid rgba(255,255,255,0.4);
  transition: var(--transition);
}

.nav-login-btn:hover {
  background: rgba(255,255,255,0.15);
  border-color: rgba(255,255,255,0.7);
}

/* HERO */
.hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  background-image: url('/assets/img/hero_bg.png');
  background-size: cover;
  background-position: center top;
  background-repeat: no-repeat;
  overflow: hidden;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to right,
    rgba(10,15,35,0.82) 0%,
    rgba(10,15,35,0.65) 45%,
    rgba(10,15,35,0.15) 100%
  );
}

.hero-content {
  position: relative;
  z-index: 2;
  padding: 0 48px 80px;
  max-width: 580px;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.2);
  color: var(--color-white);
  font-size: 0.8rem;
  font-weight: 500;
  padding: 6px 14px;
  border-radius: var(--radius-full);
  margin-bottom: 20px;
}

.badge-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: var(--color-accent);
  box-shadow: 0 0 0 2px rgba(245,166,35,0.3);
  animation: pulse-dot 2s infinite;
}

@keyframes pulse-dot {
  0%, 100% { box-shadow: 0 0 0 2px rgba(245,166,35,0.3); }
  50% { box-shadow: 0 0 0 5px rgba(245,166,35,0.1); }
}

.hero-title {
  font-size: clamp(2.4rem, 5vw, 3.8rem);
  font-weight: 800;
  line-height: 1.1;
  color: var(--color-white);
  letter-spacing: -0.03em;
  margin-bottom: 20px;
}

.hero-title-accent { color: var(--color-accent); }

.hero-desc {
  font-size: 1.0rem;
  line-height: 1.7;
  color: rgba(255,255,255,0.8);
  margin-bottom: 36px;
  max-width: 460px;
}

.hero-actions {
  display: flex;
  align-items: center;
  gap: 24px;
  flex-wrap: wrap;
}

.hero-cta {
  font-size: 1rem;
  padding: 16px 32px;
}

.hero-link {
  color: var(--color-white);
  font-weight: 600;
  font-size: 0.95rem;
  border-bottom: 2px solid rgba(255,255,255,0.4);
  padding-bottom: 2px;
  transition: var(--transition);
}

.hero-link:hover { border-color: var(--color-white); }

/* TRUSTED BAR */
.trusted-bar {
  background: rgba(20,25,50,0.95);
  backdrop-filter: blur(8px);
  padding: 20px 48px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 16px;
  position: relative;
  z-index: 3;
}

.trusted-label {
  font-size: 0.7rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.45);
  text-transform: uppercase;
}

.trusted-proof {
  display: flex;
  align-items: center;
  gap: 32px;
  flex-wrap: wrap;
}

.alumni-pill {
  display: flex;
  align-items: center;
  gap: 10px;
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.15);
  border-radius: var(--radius-full);
  padding: 8px 16px;
  color: var(--color-white);
  font-size: 0.825rem;
  font-weight: 500;
}

.alumni-pill .avatar-stack .avatar { border-color: rgba(20,25,50,0.95); }
.alumni-pill .avatar-count { background: rgba(255,255,255,0.2); border-color: rgba(20,25,50,0.95); }

/* Colorful avatars */
.av1 { background: linear-gradient(135deg, #f093fb, #f5576c); }
.av2 { background: linear-gradient(135deg, #4facfe, #00f2fe); }
.av3 { background: linear-gradient(135deg, #43e97b, #38f9d7); }

.trusted-uni {
  display: flex;
  align-items: center;
  gap: 8px;
  color: rgba(255,255,255,0.6);
  font-size: 0.825rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  transition: var(--transition);
}

.trusted-uni:hover { color: rgba(255,255,255,0.95); }

/* FEATURES */
.features {
  padding: 96px 48px;
  background: var(--color-bg);
}

.features-container { max-width: 1100px; margin: 0 auto; }

.section-header {
  text-align: center;
  margin-bottom: 64px;
}

.section-eyebrow {
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  color: var(--color-accent);
  text-transform: uppercase;
  margin-bottom: 12px;
}

.section-title {
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-text);
  letter-spacing: -0.03em;
  margin-bottom: 16px;
}

.section-subtitle {
  font-size: 1rem;
  color: var(--color-text-muted);
  max-width: 480px;
  margin: 0 auto;
  line-height: 1.6;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 24px;
}

.feature-card {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: 32px 28px;
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--color-border);
  transition: var(--transition);
}

.feature-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
  border-color: transparent;
}

.feature-icon {
  width: 52px;
  height: 52px;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
}

.icon-mentorship { background: rgba(245,166,35,0.12); color: var(--color-accent); }
.icon-jobs { background: rgba(26,35,64,0.08); color: var(--color-primary); }
.icon-network { background: rgba(16,185,129,0.1); color: var(--color-success); }
.icon-events { background: rgba(139,92,246,0.1); color: #8b5cf6; }

.feature-card h3 {
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-text);
  margin-bottom: 10px;
  letter-spacing: -0.02em;
}

.feature-card p {
  font-size: 0.875rem;
  color: var(--color-text-muted);
  line-height: 1.6;
}

/* STATS */
.stats-section {
  background: var(--color-primary);
  padding: 72px 48px;
}

.stats-container {
  max-width: 900px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
  gap: 32px;
  text-align: center;
}

.stat-item { display: flex; flex-direction: column; align-items: center; }

.stat-number {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 800;
  color: var(--color-accent);
  letter-spacing: -0.04em;
  line-height: 1;
}

.stat-suffix {
  font-size: clamp(1.5rem, 3vw, 2.2rem);
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
}

.stat-label {
  font-size: 0.85rem;
  color: rgba(255,255,255,0.6);
  margin-top: 8px;
  font-weight: 500;
}

/* CTA SECTION */
.cta-section {
  padding: 96px 48px;
  background: var(--color-bg);
}

.cta-container {
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
}

.cta-eyebrow {
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  color: var(--color-accent);
  text-transform: uppercase;
  margin-bottom: 12px;
}

.cta-title {
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-text);
  letter-spacing: -0.03em;
  margin-bottom: 16px;
}

.cta-subtitle {
  font-size: 1rem;
  color: var(--color-text-muted);
  margin-bottom: 40px;
  line-height: 1.6;
}

.cta-actions {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
}

.cta-login-link {
  font-size: 0.9rem;
  color: var(--color-text-muted);
  font-weight: 500;
  transition: var(--transition);
}

.cta-login-link:hover { color: var(--color-text); }

/* FOOTER */
.footer {
  background: var(--color-primary);
  padding: 32px 48px;
}

.footer-container {
  max-width: 1100px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 16px;
}

.footer-logo { color: var(--color-white); font-size: 1rem; }
.footer-logo .logo-icon { background: var(--color-accent); }
.footer-logo .logo-icon svg { color: var(--color-primary); }

.footer-links {
  display: flex;
  align-items: center;
  gap: 24px;
}

.footer-links a {
  font-size: 0.825rem;
  color: rgba(255,255,255,0.55);
  font-weight: 500;
  transition: var(--transition);
}

.footer-links a:hover { color: rgba(255,255,255,0.9); }

.footer-copy {
  font-size: 0.78rem;
  color: rgba(255,255,255,0.35);
  width: 100%;
  text-align: center;
  padding-top: 16px;
  border-top: 1px solid rgba(255,255,255,0.08);
  margin-top: 8px;
}

/* ==================== RESPONSIVE ==================== */
@media (max-width: 768px) {
  .navbar { padding: 14px 20px; }
  .navbar.scrolled { padding: 10px 20px; }

  .hero-content { padding: 0 20px 60px; max-width: 100%; }
  .hero-desc { max-width: 100%; }

  .trusted-bar {
    padding: 16px 20px;
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
  }

  .trusted-proof { gap: 16px; }

  .features { padding: 64px 20px; }
  .stats-section { padding: 56px 20px; }
  .cta-section { padding: 64px 20px; }
  .footer { padding: 24px 20px; }

  .footer-container { flex-direction: column; align-items: center; text-align: center; }
  .footer-copy { margin-top: 4px; }
}

@media (max-width: 480px) {
  .hero-actions { flex-direction: column; align-items: flex-start; gap: 16px; }
  .hero-cta { width: 100%; justify-content: center; }
  .features-grid { grid-template-columns: 1fr; }
  .stats-container { grid-template-columns: repeat(2, 1fr); }
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alumni Connect — Your College Network, For Life</title>
  <meta name="description" content="Bridge the gap between campus memories and professional growth. Access exclusive mentorship, discover hidden job opportunities, and leverage peer referrals." />
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="navbar">
    <a href="index.html" class="logo">
      <div class="logo-icon">
        <svg viewBox="0 0 24 24" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
      </div>
      Alumni Connect
    </a>
    <a href="/login" class="nav-login-btn" id="navLoginBtn">Login</a>
  </nav>

  <!-- HERO SECTION -->
  <section class="hero" id="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <div class="hero-badge">
        <span class="badge-dot"></span>
        Join 150,000+ graduates worldwide
      </div>
      <h1 class="hero-title">
        Your College Network,<br />
        <span class="hero-title-accent">For Life.</span>
      </h1>
      <p class="hero-desc">
        Bridge the gap between campus memories and professional growth. Access exclusive mentorship, discover hidden job opportunities, and leverage peer referrals in a community built for your success.
      </p>
      <div class="hero-actions">
        <a href="/signup" class="btn-accent hero-cta" id="heroGetStarted">
          Get Started
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="#colleges" class="hero-link" id="heroForColleges">For Colleges</a>
      </div>
    </div>
  </section>

  <!-- TRUSTED BAR -->
  <div class="trusted-bar" id="trustedBar">
    <p class="trusted-label">TRUSTED BY 50+ LEADING INSTITUTIONS</p>
    <div class="trusted-proof">
      <div class="alumni-pill">
        <div class="avatar-stack">
          <div class="avatar av1"></div>
          <div class="avatar av2"></div>
          <div class="avatar av3"></div>
          <div class="avatar-count">+12k</div>
        </div>
        <span>Alumni active today</span>
      </div>
      <div class="trusted-uni">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/></svg>
        <span>HARVARD</span>
      </div>
      <div class="trusted-uni">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M8 12h8M12 8v8"/></svg>
        <span>OXFORD</span>
      </div>
      <div class="trusted-uni">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        <span>MIT</span>
      </div>
    </div>
  </div>

  <!-- FEATURES SECTION -->
  <section class="features" id="features">
    <div class="features-container">
      <div class="section-header">
        <p class="section-eyebrow">WHY ALUMNI CONNECT</p>
        <h2 class="section-title">Everything you need to thrive professionally</h2>
        <p class="section-subtitle">Built by alumni, for alumni — a platform that understands your journey</p>
      </div>
      <div class="features-grid">
        <div class="feature-card" id="featureCard1">
          <div class="feature-icon icon-mentorship">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3>Exclusive Mentorship</h3>
          <p>Connect with 243+ active mentors from top companies. Get career guidance tailored to your goals.</p>
        </div>
        <div class="feature-card" id="featureCard2">
          <div class="feature-icon icon-jobs">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          </div>
          <h3>Hidden Job Opportunities</h3>
          <p>Access jobs posted directly by alumni at leading firms — before they hit public job boards.</p>
        </div>
        <div class="feature-card" id="featureCard3">
          <div class="feature-icon icon-network">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="5" r="3"/><circle cx="5" cy="19" r="3"/><circle cx="19" cy="19" r="3"/><path d="M12 8v3M6.5 17.5l4-2.5M17.5 17.5l-4-2.5"/></svg>
          </div>
          <h3>Peer Referrals</h3>
          <p>Warm introductions from alumni at your dream companies increase your hiring chances by 5x.</p>
        </div>
        <div class="feature-card" id="featureCard4">
          <div class="feature-icon icon-events">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          </div>
          <h3>Alumni Events</h3>
          <p>Attend exclusive reunions, networking mixers, and industry panels near you or online.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- STATS SECTION -->
  <section class="stats-section" id="statsSection">
    <div class="stats-container">
      <div class="stat-item">
        <span class="stat-number" data-target="<?= htmlspecialchars($stats['alumni']) ?>">0</span>
        <span class="stat-suffix">+</span>
        <p class="stat-label">Alumni Members</p>
      </div>
      <div class="stat-item">
        <span class="stat-number" data-target="<?= htmlspecialchars(max(2, $stats['institutions'])) ?>">0</span>
        <span class="stat-suffix">+</span>
        <p class="stat-label">Partner Institutions</p>
      </div>
      <div class="stat-item">
        <span class="stat-number" data-target="<?= htmlspecialchars(max(5, $stats['mentors'])) ?>">0</span>
        <span class="stat-suffix"></span>
        <p class="stat-label">Active Mentors Online</p>
      </div>
      <div class="stat-item">
        <span class="stat-number" data-target="<?= htmlspecialchars(max(2, $stats['institutions'])) ?>">0</span>
        <span class="stat-suffix">+</span>
        <p class="stat-label">Leading Institutions</p>
      </div>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="cta-section" id="ctaSection">
    <div class="cta-container">
      <p class="cta-eyebrow">READY TO START?</p>
      <h2 class="cta-title">Join the network that works for you</h2>
      <p class="cta-subtitle">Start connecting with alumni from your college in minutes. Free to join.</p>
      <div class="cta-actions">
        <a href="/signup" class="btn-accent" id="ctaGetStarted">
          Get Started — It's Free
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="/login" class="cta-login-link" id="ctaLogin">Already a member? Sign In</a>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer" id="footer">
    <div class="footer-container">
      <a href="index.html" class="logo footer-logo">
        <div class="logo-icon">
          <svg viewBox="0 0 24 24" stroke-width="2.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        </div>
        Alumni Connect
      </a>
      <div class="footer-links">
        <a href="#" id="footerPrivacy">Privacy Policy</a>
        <a href="#" id="footerTerms">Terms of Service</a>
        <a href="#" id="footerContact">Contact</a>
      </div>
      <p class="footer-copy">© 2024 Alumni Connect Platform. Built for the Modern Professional.</p>
    </div>
  </footer>

  <!-- Toast -->
  <div class="toast" id="toast" role="alert" aria-live="polite">
    <div class="toast-icon">
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <span id="toastMsg"></span>
  </div>

  <script src="/assets/js/landing.js"></script>
</body>
</html>
