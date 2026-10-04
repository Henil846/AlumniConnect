<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title ?? 'Super Admin — AlumniConnect') ?></title>
  
  <?php if(isset($extraCss)): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($extraCss) ?>" />
  <?php endif; ?>
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

/* Embedded from super-admin.css */
/* =========================================
   AlumniConnect Platform Administration CSS
   ========================================= */

body {
  background: #f8fafc;
  color: #0f172a;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  margin: 0;
  padding: 0;
}

/* Admin App Container */
.admin-app {
  display: flex;
  min-height: 100vh;
}

/* Sidebar Styling */
.admin-sidebar {
  width: 240px;
  background: #ffffff;
  border-right: 1px solid #e2e8f0;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  flex-shrink: 0;
  z-index: 10;
}
.admin-sidebar-header {
  padding: 24px;
}
.admin-sidebar-header h1 {
  font-size: 1.15rem;
  font-weight: 900;
  margin: 0;
  letter-spacing: -0.02em;
  color: #0f172a;
  display: flex;
  align-items: center;
  text-decoration: none;
}
.admin-sidebar-header .sub {
  font-size: 0.75rem;
  font-weight: 600;
  color: #64748b;
  margin-top: 2px;
  letter-spacing: 0.02em;
  display: block;
}

.admin-nav {
  display: flex;
  flex-direction: column;
  gap: 4px;
  padding: 8px 0;
  flex: 1;
}
.admin-nav-item {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 12px 24px;
  color: #475569;
  text-decoration: none;
  font-weight: 600;
  font-size: 0.92rem;
  position: relative;
  transition: var(--transition, 0.2s ease);
}
.admin-nav-item svg {
  color: #64748b;
  width: 20px;
  height: 20px;
}
.admin-nav-item:hover {
  background: #f8fafc;
  color: #0f172a;
}
.admin-nav-item.active {
  background: #f1f5f9;
  color: #0f172a;
  font-weight: 700;
}
.admin-nav-item.active svg { color: #0f172a; }
.admin-nav-item.active::after {
  content: "";
  position: absolute;
  right: 0;
  top: 0;
  bottom: 0;
  width: 4px;
  background: #b45309;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}

.admin-sidebar-footer {
  padding: 20px 24px;
  border-top: 1px solid #e2e8f0;
}
.admin-btn-black {
  background: #0f172a;
  color: #fff;
  border: none;
  border-radius: 20px;
  padding: 12px 18px;
  font-weight: 700;
  font-size: 0.9rem;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
  transition: 0.2s ease;
  text-decoration: none;
}
.admin-btn-black:hover { background: #1e293b; transform: translateY(-1px); }

.admin-btn-gold {
  background: #b45309;
  color: #fff;
  border: none;
  border-radius: 20px;
  padding: 12px 20px;
  font-weight: 700;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(180, 83, 9, 0.2);
  transition: 0.2s ease;
  text-decoration: none;
}
.admin-btn-gold:hover { background: #92400e; transform: translateY(-1px); }

.admin-user-profile {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-top: 16px;
  padding: 8px;
  border-radius: 12px;
  background: #f8fafc;
}
.admin-user-profile img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
}
.admin-user-profile h4 {
  font-size: 0.88rem;
  font-weight: 800;
  margin: 0 0 2px;
  color: #0f172a;
}
.admin-user-profile p {
  font-size: 0.72rem;
  color: #64748b;
  margin: 0;
}

/* Admin Main Content Area */
.admin-main {
  flex: 1;
  display: flex;
  flex-direction: column;
  overflow-x: hidden;
}

.admin-top-bar {
  background: #ffffff;
  border-bottom: 1px solid #e2e8f0;
  padding: 16px 40px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.admin-search-box {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 24px;
  padding: 8px 18px;
  width: 360px;
}
.admin-search-box input {
  border: none;
  background: transparent;
  font-size: 0.9rem;
  color: #0f172a;
  outline: none;
  width: 100%;
}
.admin-search-box input::placeholder { color: #94a3b8; }

.admin-top-actions {
  display: flex;
  align-items: center;
  gap: 16px;
}

/* Stat Cards Grid */
.admin-stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-bottom: 28px;
}
.admin-stat-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 24px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 0 2px 10px rgba(0,0,0,0.015);
  position: relative;
}
.admin-stat-card.dark-card {
  background: #0f172a;
  color: #ffffff;
  border-color: #0f172a;
}
.stat-icon-box {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  position: absolute;
  right: 24px;
  top: 24px;
}
.stat-val {
  font-size: 2.2rem;
  font-weight: 900;
  line-height: 1.2;
  margin: 12px 0 8px;
}
.stat-label {
  font-size: 0.82rem;
  font-weight: 700;
  color: #64748b;
  text-transform: uppercase;
  letter-spacing: 0.02em;
}

/* Grid Layouts */
.admin-row-2-1 {
  display: grid;
  grid-template-columns: 2.2fr 1fr;
  gap: 24px;
  margin-bottom: 24px;
}
.admin-row-1-1 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
  margin-bottom: 24px;
}

/* Admin Cards */
.admin-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 20px;
  padding: 28px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.015);
  display: flex;
  flex-direction: column;
}
.admin-card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}
.admin-card-title {
  font-size: 1.25rem;
  font-weight: 800;
  color: #0f172a;
  margin: 0;
}
.admin-card-subtitle {
  font-size: 0.84rem;
  color: #64748b;
  margin: 4px 0 0;
}

/* Tables in Admin */
.admin-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 8px;
}
.admin-table th {
  text-align: left;
  font-size: 0.75rem;
  font-weight: 800;
  color: #64748b;
  text-transform: uppercase;
  padding: 12px 16px;
  border-bottom: 1px solid #e2e8f0;
  letter-spacing: 0.04em;
}
.admin-table td {
  padding: 16px;
  border-bottom: 1px solid #f1f5f9;
  font-size: 0.9rem;
  vertical-align: middle;
}

.badge-verify {
  background: #dcfce7;
  color: #15803d;
  border: 1px solid #86efac;
  font-size: 0.75rem;
  font-weight: 700;
  padding: 6px 14px;
  border-radius: 20px;
  cursor: pointer;
  transition: 0.2s;
  display: inline-block;
  text-decoration: none;
}
.badge-verify:hover { background: #bbf7d0; }

.badge-decline {
  background: #fee2e2;
  color: #ef4444;
  border: 1px solid #fca5a5;
  font-size: 0.75rem;
  font-weight: 700;
  padding: 6px 14px;
  border-radius: 20px;
  cursor: pointer;
  transition: 0.2s;
  display: inline-block;
  text-decoration: none;
}
.badge-decline:hover { background: #fecaca; }

.pill-status-active {
  background: #dcfce7;
  color: #15803d;
  font-size: 0.72rem;
  font-weight: 800;
  padding: 4px 10px;
  border-radius: 20px;
}
.pill-status-warn {
  background: #fef3c7;
  color: #92400e;
  font-size: 0.72rem;
  font-weight: 800;
  padding: 4px 10px;
  border-radius: 20px;
}
.pill-status-err {
  background: #fee2e2;
  color: #b91c1c;
  font-size: 0.72rem;
  font-weight: 800;
  padding: 4px 10px;
  border-radius: 20px;
}

.pill-plan-ent {
  background: #e0e7ff;
  color: #3730a3;
  font-size: 0.72rem;
  font-weight: 800;
  padding: 4px 10px;
  border-radius: 6px;
  text-transform: uppercase;
}
.pill-plan-pro {
  background: #f1f5f9;
  color: #475569;
  font-size: 0.72rem;
  font-weight: 800;
  padding: 4px 10px;
  border-radius: 6px;
  text-transform: uppercase;
}

/* Custom Widgets */
.guide-card {
  background: #fefce8;
  border: 1px solid #fef08a;
  border-left: 6px solid #ca8a04;
  border-radius: 16px;
  padding: 24px;
}
.dark-widget-card {
  background: #0f172a;
  color: #ffffff;
  border-radius: 20px;
  padding: 28px;
}

/* Toggle Switch */
.toggle-switch-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 16px 0;
  border-bottom: 1px solid #f1f5f9;
}
.switch-btn {
  width: 48px;
  height: 26px;
  border-radius: 13px;
  background: #0f172a;
  position: relative;
  cursor: pointer;
  transition: 0.2s;
}
.switch-btn::after {
  content: "";
  position: absolute;
  right: 4px;
  top: 4px;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: #fff;
  transition: 0.2s;
}
.switch-btn.off {
  background: #e2e8f0;
}
.switch-btn.off::after {
  left: 4px;
  right: auto;
}

/* Footer */
.admin-footer {
  padding: 24px 40px;
  border-top: 1px solid #e2e8f0;
  display: flex;
  justify-content: space-between;
  color: #94a3b8;
  font-size: 0.82rem;
}
.admin-footer a { color: #64748b; text-decoration: none; font-weight: 600; margin-left: 20px; }

/* Activity Heatmap */
.heatmap-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 8px;
  margin: 16px 0;
}
.heat-cell {
  aspect-ratio: 1;
  border-radius: 4px;
  background: #e2e8f0;
}
.heat-1 { background: #cbd5e1; }
.heat-2 { background: #94a3b8; }
.heat-3 { background: #475569; }
.heat-4 { background: #1e293b; }
.heat-5 { background: #0f172a; }

/* Charts & Bars */
.progress-bar-wrap {
  width: 100%;
  height: 8px;
  background: #e2e8f0;
  border-radius: 4px;
  overflow: hidden;
  margin-top: 6px;
}
.progress-bar-fill {
  height: 100%;
  background: #0f172a;
  border-radius: 4px;
}
.progress-bar-fill.gold { background: #b45309; }
.progress-bar-fill.yellow { background: #f59e0b; }
.progress-bar-fill.green { background: #10b981; }

/* Trend Chart simulation */
.bar-chart-12 {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  height: 220px;
  padding-top: 20px;
  position: relative;
}
.bar-col {
  flex: 1;
  margin: 0 4px;
  background: #cbd5e1;
  border-radius: 6px 6px 0 0;
  transition: 0.2s;
  position: relative;
}
.bar-col:hover { background: #94a3b8; }
.bar-col.active-gold { background: #78350f; }
.bar-labels-row {
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
  font-size: 0.75rem;
  font-weight: 700;
  color: #64748b;
}

/* ==============================
   RESPONSIVE — Tablet & Mobile
   ============================== */

@media (max-width: 1100px) {
  .admin-stats-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .admin-row-2-1 {
    grid-template-columns: 1fr;
  }
  .admin-row-1-1 {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  /* Collapse sidebar on mobile */
  .admin-app {
    flex-direction: column;
  }
  .admin-sidebar {
    width: 100%;
    border-right: none;
    border-bottom: 1px solid #e2e8f0;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 0;
    min-height: unset;
  }
  .admin-sidebar-header {
    padding: 14px 20px;
  }
  .admin-sidebar .admin-nav {
    display: none;
  }
  .admin-sidebar-footer {
    display: none;
  }

  /* Mobile hamburger nav toggle — show a compact icon row instead */
  .admin-nav.mobile-open {
    display: flex;
    position: fixed;
    top: 0;
    left: 0;
    width: 240px;
    height: 100vh;
    background: #ffffff;
    z-index: 1000;
    border-right: 1px solid #e2e8f0;
    flex-direction: column;
    padding-top: 20px;
    box-shadow: 4px 0 24px rgba(0,0,0,0.1);
    overflow-y: auto;
  }

  /* Main content full width */
  .admin-main {
    width: 100%;
  }
  .admin-top-bar {
    padding: 12px 20px;
    gap: 12px;
  }
  .admin-search-box {
    width: 100%;
    max-width: 240px;
  }

  /* Content padding */
  .admin-main > div {
    padding: 20px !important;
  }

  /* Stats grid — single column on small screens */
  .admin-stats-grid {
    grid-template-columns: 1fr;
  }

  /* Tables — horizontal scroll */
  .admin-table {
    font-size: 0.8rem;
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }
  .admin-table th, .admin-table td {
    padding: 10px 12px;
  }

  /* Cards full width */
  .admin-card {
    padding: 20px;
  }

  /* Footer stacking */
  .admin-footer {
    flex-direction: column;
    gap: 10px;
    padding: 16px 20px;
    text-align: center;
  }
  .admin-footer div {
    justify-content: center;
  }
}

@media (max-width: 480px) {
  .admin-top-bar {
    flex-wrap: wrap;
  }
  .admin-top-actions {
    gap: 8px;
  }
  .admin-stats-grid {
    gap: 12px;
  }
  .admin-stat-card {
    padding: 16px;
  }
  .stat-val {
    font-size: 1.6rem;
  }
}


@media(max-width: 768px) {
  #mobileMenuBtn { display: block !important; }
  .admin-sidebar { position: fixed; left: -100%; top: 0; bottom: 0; z-index: 10000; transition: left 0.3s ease; }
  .admin-sidebar.mobile-open { left: 0; }
}
</style>
</head>
<body>

  <div class="admin-app">
    
    <!-- ADMIN SIDEBAR -->
    <aside class="admin-sidebar">
      <div>
        <div class="admin-sidebar-header">
          <a href="/super-admin/dashboard" style="text-decoration:none;">
            <h1>AlumniConnect</h1>
            <span class="sub">Platform Administration</span>
          </a>
        </div>
        
        <nav class="admin-nav">
          <a href="/super-admin/dashboard" class="admin-nav-item <?= ($activePage ?? '') === 'super-admin-dashboard' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Dashboard
          </a>
          <a href="/super-admin/institutions" class="admin-nav-item <?= ($activePage ?? '') === 'super-admin-institutions' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Institutions
          </a>
          <a href="/super-admin/analytics" class="admin-nav-item <?= ($activePage ?? '') === 'super-admin-analytics' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            Analytics
          </a>
          <a href="/super-admin/revenue" class="admin-nav-item <?= ($activePage ?? '') === 'super-admin-revenue' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            Revenue
          </a>
          <a href="/super-admin/settings" class="admin-nav-item <?= ($activePage ?? '') === 'super-admin-settings' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
            Settings
          </a>
        </nav>
      </div>
      <div class="admin-sidebar-footer">
        <a href="#" style="display:flex; align-items:center; gap:12px; color:#64748b; font-size:0.9rem; font-weight:600; text-decoration:none;">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          Support
        </a>
        <div class="admin-user-profile">
          <div>
            <h4>Super Admin</h4>
            <form action="/logout" method="POST" style="margin:0;"><button type="submit" style="background:none; border:none; color:#dc2626; cursor:pointer; padding:0; font-size:0.8rem;">Logout</button></form>
          </div>
        </div>
      </div>
    </aside>

    <!-- ADMIN MAIN AREA -->
    <main class="admin-main">
      <!-- TOP BAR -->
      <header class="admin-top-bar">
        <button id="mobileMenuBtn" onclick="document.querySelector('.admin-sidebar').classList.toggle('mobile-open')" style="display:none; background:none; border:none; cursor:pointer; padding:4px; margin-right:15px;">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#0f172a" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
        <div class="admin-search-box">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" placeholder="Search users, institutions, reports..." />
        </div>
        <div class="admin-top-actions">
          <button style="background:none; border:none; position:relative; cursor:pointer; padding:4px;">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#475569" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          </button>
        </div>
      </header>

      <!-- VIEW CONTENT -->
      <?= $content ?? '' ?>

      <!-- FOOTER -->
      <footer class="admin-footer">
        <span>© 2024 AlumniConnect Administration System</span>
        <div>
          <a href="#">System Status</a>
          <a href="#">Data Privacy</a>
        </div>
      </footer>

    </main>

  </div>
</body>
</html>
