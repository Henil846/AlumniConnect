<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title ?? 'Alumni Connect') ?></title>
  
  
  
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

.avatar-stack .avatar, .avatar-stack img {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid var(--color-white);
  object-fit: cover;
  margin-left: -8px;
  background: linear-gradient(135deg, #667eea, #764ba2);
}

.avatar-stack .avatar:first-child, .avatar-stack img:first-child { margin-left: 0; }

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

/* Embedded from app.css */
@media(max-width: 768px) { .hamburger-menu { display: block !important; } .sidebar { position: fixed; left: -100%; top: 0; bottom: 0; z-index: 10000; transition: 0.3s; } .sidebar.active { left: 0; } }
/* ===========================
   Alumni Connect - App Layout
   =========================== */

/* ---- App Container ---- */
.app-container {
  display: flex;
  height: 100vh;
  overflow: hidden;
  background: #FAFAFA;
}

/* ---- Sidebar ---- */
.sidebar {
  width: 250px;
  background: var(--color-white);
  border-right: 1px solid var(--color-border);
  display: flex;
  flex-direction: column;
  flex-shrink: 0;
  z-index: 10;
}

.sidebar-header {
  padding: 24px;
  display: flex;
  align-items: center;
}

.sidebar-header .logo {
  font-size: 1.1rem;
}

.sidebar-header .logo span {
  display: block;
  font-size: 0.65rem;
  font-weight: 600;
  color: var(--color-text-light);
  letter-spacing: 0.1em;
  text-transform: uppercase;
  margin-top: 2px;
}

.sidebar-nav {
  flex: 1;
  padding: 16px 12px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.nav-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 16px;
  border-radius: var(--radius-md);
  color: var(--color-text-muted);
  font-size: 0.9rem;
  font-weight: 500;
  text-decoration: none;
  transition: var(--transition);
}

.nav-item svg {
  width: 20px;
  height: 20px;
  stroke-width: 2;
  color: var(--color-text-light);
  transition: var(--transition);
}

.nav-item:hover {
  background: rgba(0, 0, 0, 0.03);
  color: var(--color-text);
}

.nav-item:hover svg {
  color: var(--color-text);
}

.nav-item.active {
  background: rgba(245, 166, 35, 0.1);
  color: var(--color-primary);
  font-weight: 600;
}

.nav-item.active svg {
  color: var(--color-accent-dark);
}

.sidebar-footer {
  padding: 24px 16px;
  border-top: 1px solid var(--color-border);
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.support-growth-btn {
  background: var(--color-primary);
  color: var(--color-white);
  border: none;
  border-radius: var(--radius-full);
  padding: 12px;
  font-weight: 600;
  font-size: 0.85rem;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px;
  transition: var(--transition);
  width: 100%;
}

.support-growth-btn:hover {
  background: var(--color-primary-light);
}

.support-growth-btn.accent {
  background: var(--color-accent);
  color: var(--color-primary);
}

.support-growth-btn.accent:hover {
  background: var(--color-accent-dark);
}

.sidebar-footer-link {
  display: flex;
  align-items: center;
  gap: 10px;
  color: var(--color-text-muted);
  font-size: 0.85rem;
  font-weight: 500;
  text-decoration: none;
  padding: 8px 12px;
  border-radius: var(--radius-md);
  transition: var(--transition);
}

.sidebar-footer-link svg {
  width: 18px;
  height: 18px;
}

.sidebar-footer-link:hover {
  color: var(--color-text);
  background: rgba(0,0,0,0.03);
}

/* ---- Main Content Area ---- */
.main-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  position: relative;
}

/* ---- Top Header ---- */
.top-header {
  height: 72px;
  background: var(--color-white);
  border-bottom: 1px solid var(--color-border);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 32px;
  flex-shrink: 0;
  z-index: 5;
}

.header-search {
  position: relative;
  width: 320px;
}

.header-search svg {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  width: 18px;
  height: 18px;
  color: var(--color-text-light);
  pointer-events: none;
}

.header-search input {
  width: 100%;
  padding: 10px 16px 10px 38px;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-full);
  background: var(--color-input-bg);
  font-size: 0.875rem;
  transition: var(--transition);
  outline: none;
}

.header-search input:focus {
  border-color: var(--color-text-light);
  background: var(--color-white);
  box-shadow: 0 0 0 3px rgba(0,0,0,0.05);
}

.header-actions {
  display: flex;
  align-items: center;
  gap: 20px;
}

.header-icon-btn {
  background: none;
  border: none;
  color: var(--color-text-muted);
  cursor: pointer;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  transition: var(--transition);
}

.header-icon-btn:hover {
  background: var(--color-bg);
  color: var(--color-text);
}

.header-icon-btn svg {
  width: 20px;
  height: 20px;
}

.notification-dot {
  position: absolute;
  top: 6px;
  right: 6px;
  width: 8px;
  height: 8px;
  background: var(--color-error);
  border-radius: 50%;
  border: 2px solid var(--color-white);
}

.header-profile {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  object-fit: cover;
  cursor: pointer;
  border: 2px solid transparent;
  transition: var(--transition);
}

.header-profile:hover {
  border-color: var(--color-border);
}

/* ---- Scrollable Content Area ---- */
.content-scrollable {
  flex: 1;
  overflow-y: auto;
  padding: 32px;
}

.page-container {
  max-width: 1100px;
  margin: 0 auto;
}

/* ---- Common App Cards ---- */
.app-card {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  border: 1px solid var(--color-border);
  box-shadow: 0 1px 2px rgba(0,0,0,0.03);
  overflow: hidden;
}

.app-card-header {
  padding: 20px 24px;
  border-bottom: 1px solid var(--color-border);
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.app-card-title {
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-text);
  display: flex;
  align-items: center;
  gap: 8px;
}

.app-card-title svg {
  color: var(--color-text-muted);
}

.app-card-body {
  padding: 24px;
}

/* Badge styles */
.badge {
  display: inline-flex;
  align-items: center;
  padding: 4px 8px;
  border-radius: var(--radius-sm);
  font-size: 0.7rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.badge-new { background: rgba(245, 166, 35, 0.15); color: var(--color-accent-dark); }
.badge-reviewed { background: rgba(16, 185, 129, 0.15); color: #059669; }
.badge-pending { background: rgba(245, 166, 35, 0.15); color: var(--color-accent-dark); }
.badge-verified { background: rgba(16, 185, 129, 0.15); color: #059669; }
.badge-ready { background: rgba(245, 166, 35, 0.15); color: var(--color-accent-dark); }
.badge-fulltime { background: var(--color-primary); color: var(--color-white); }
.badge-intern { background: var(--color-text-muted); color: var(--color-white); }

/* ---- Layout Helpers ---- */
.row { display: flex; gap: 24px; }
.col { display: flex; flex-direction: column; gap: 24px; }
.flex-1 { flex: 1; min-width: 0; }

@media (max-width: 1024px) {
  .row { flex-direction: column; }
}

@media (max-width: 768px) {
  .hamburger-menu { display: inline-flex !important; }
  .drawer-close-btn { display: inline-flex !important; }
  .sidebar {
    top: 0;
    left: 0;
    bottom: 0;
    z-index: 999999 !important;
    position: fixed;
    transform: translateX(-100%);
    transition: none !important;
    height: 100vh;
  }
  .sidebar.open, .sidebar.active {
    transform: translateX(0) !important;
    display: flex !important;
    visibility: visible !important;
  }
  .top-header { padding: 0 16px; }
  .content-scrollable { padding: 16px; }
  .header-search { display: none; }
}

</style>
</head>
<body>

  <div class="app-container">
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-header" style="justify-content:space-between; align-items:center;">
        <a href="<?= (\App\Core\Auth::user() && in_array(\App\Core\Auth::user()->role, ['admin', 'college_admin'])) ? '/admin/dashboard' : '/dashboard' ?>" class="logo">
          Alumni Connect
          <span>Modern Collegiate</span>
        </a>
        <button type="button" class="drawer-close-btn" id="drawerCloseBtn" onclick="document.querySelector('.sidebar').classList.remove('active','open');" aria-label="Close menu" style="display:none; background:none; border:none; cursor:pointer; padding:6px; color:var(--color-text-muted);">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>
      <nav class="sidebar-nav">
        <?php $currentRole = \App\Core\Auth::user() ? \App\Core\Auth::user()->role : ''; ?>
        <?php if ($currentRole === 'admin' || $currentRole === 'college_admin'): ?>
          <a href="/admin/dashboard" class="nav-item <?= ($activePage ?? '') === 'admin-dashboard' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Admin Dashboard
          </a>
          <a href="/admin/users" class="nav-item <?= ($activePage ?? '') === 'admin-users' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Admin Users
          </a>
          <a href="/admin/moderation" class="nav-item <?= ($activePage ?? '') === 'admin-moderation' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            Moderation Queue
          </a>
          <a href="/events-admin" class="nav-item <?= ($activePage ?? '') === 'events-admin' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Events Admin
          </a>
          <a href="/admin/payments" class="nav-item <?= ($activePage ?? '') === 'admin-payments' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            Payments
          </a>
          <a href="/admin/analytics" class="nav-item <?= ($activePage ?? '') === 'admin-analytics' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            Analytics
          </a>
          <a href="/settings" class="nav-item <?= ($activePage ?? '') === 'settings' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
            Settings
          </a>
        <?php else: ?>
          <a href="/dashboard" class="nav-item <?= ($activePage ?? '') === 'dashboard' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Home
          </a>
          <a href="/profile" class="nav-item <?= ($activePage ?? '') === 'profile' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Profile
          </a>
          <a href="/directory" class="nav-item <?= ($activePage ?? '') === 'directory' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Alumni Directory
          </a>
          <a href="/mentorship" class="nav-item <?= ($activePage ?? '') === 'mentorship' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            Mentorship
          </a>
          <a href="/jobs" class="nav-item <?= ($activePage ?? '') === 'jobs' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            Jobs
          </a>
          <a href="/events" class="nav-item <?= ($activePage ?? '') === 'events' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Events
          </a>
          <a href="/community" class="nav-item <?= ($activePage ?? '') === 'community' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            Community
          </a>
          <a href="/messages" class="nav-item <?= ($activePage ?? '') === 'messages' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
            Messages
          </a>
          <a href="/referrals" class="nav-item <?= ($activePage ?? '') === 'referrals' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            Referrals
          </a>
          <a href="/marketplace" class="nav-item <?= ($activePage ?? '') === 'marketplace' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
            Marketplace
          </a>
          <a href="/business-directory" class="nav-item <?= ($activePage ?? '') === 'business-directory' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            Business Directory
          </a>
          <a href="/startup-hub" class="nav-item <?= ($activePage ?? '') === 'startup-hub' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            Startup Hub
          </a>
          <a href="/career-center" class="nav-item <?= ($activePage ?? '') === 'career-center' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            Career Center
          </a>
          <a href="/rewards" class="nav-item <?= ($activePage ?? '') === 'rewards' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
            Rewards
          </a>
          <a href="/notifications" class="nav-item <?= ($activePage ?? '') === 'notifications' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            Notifications
          </a>
          <a href="/ads" class="nav-item <?= ($activePage ?? '') === 'ads' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/></svg>
            Sponsored Ads
          </a>
          <a href="/donations" class="nav-item <?= ($activePage ?? '') === 'donations' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            Donations
          </a>
          <a href="/settings" class="nav-item <?= ($activePage ?? '') === 'settings' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
            Settings
          </a>
        <?php endif; ?>
      </nav>
      <div class="sidebar-footer">
        <button type="button" class="support-growth-btn" onclick="window.location.href='/donations'">Support Growth</button>
        <a href="/help" class="sidebar-footer-link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          Help Center
        </a>
        <form action="/logout" method="POST" style="margin:0;">
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
          <button type="submit" class="sidebar-footer-link" style="background:none; border:none; width:100%; text-align:left; cursor:pointer; padding:8px 12px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            Logout
          </button>
        </form>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
      
      <!-- TOP HEADER -->
      <header class="top-header">
        <button type="button" class="hamburger-menu" onclick="document.querySelector('.sidebar').classList.toggle('active'); document.querySelector('.sidebar').classList.toggle('open');" style="display:none; background:none; border:none; margin-right:15px; cursor:pointer;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" width="24" height="24"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
        <form action="/search" method="GET" class="header-search">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" name="q" placeholder="Search alumni, jobs, events..." />
        </form>
        <div class="header-actions">
          <button type="button" class="header-icon-btn" id="notif-bell-btn" onclick="toggleNotifDropdown(event)" style="position:relative;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            <span class="notification-dot"></span>
          </button>
          <button type="button" class="header-icon-btn" onclick="window.location.href='/messages'" title="Messages">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </button>
          <a href="/profile"><img src="<?= htmlspecialchars(\App\Core\View::avatarUrl(\App\Core\Auth::user()->full_name ?? 'User', \App\Core\Auth::user()->avatar ?? null)) ?>" alt="Profile" class="header-profile" /></a>
        </div>
      </header>

      <!-- SCROLLABLE CONTENT -->
      <div class="content-scrollable">
        <div class="page-container col">
          <?= $content ?>
        </div>
      </div>
    </main>

  </div>

  <!-- NOTIFICATION DROPDOWN -->
  <div id="notif-dropdown" style="display:none; position:fixed; top:64px; right:24px; width:320px; background:#fff; border:1px solid var(--color-border); border-radius:16px; box-shadow:0 8px 32px rgba(0,0,0,0.14); z-index:9999; overflow:hidden;">
    <div style="padding:14px 18px; border-bottom:1px solid var(--color-border); display:flex; justify-content:space-between; align-items:center;">
      <h4 style="font-size:0.95rem; font-weight:800; margin:0;">Notifications</h4>
      <span style="font-size:0.72rem; color:var(--color-accent-dark); font-weight:700; cursor:pointer;" onclick="fetch('/notifications/mark-all-read', {method:'POST', headers:{'Content-Type':'application/x-www-form-urlencoded'}, body:'csrf_token=<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>'}).then(()=>document.querySelectorAll('.notif-item-unread').forEach(el=>el.classList.remove('notif-item-unread')))">Mark all read</span>
    </div>
    <div style="max-height:340px; overflow-y:auto;">
      <div class="notif-item-unread" style="padding:13px 18px; display:flex; gap:12px; border-bottom:1px solid #f1f5f9; background:#f9fafb; cursor:pointer;" onclick="window.location.href='/notifications'">
        <div style="width:34px; height:34px; border-radius:50%; background:#dcfce7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#15803d" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div>
          <p style="font-size:0.82rem; font-weight:700; margin:0 0 2px;">Welcome to Alumni Connect!</p>
          <p style="font-size:0.74rem; color:var(--color-text-muted); margin:0;">Complete your profile to get started.</p>
          <span style="font-size:0.65rem; color:var(--color-text-muted);">Just now</span>
        </div>
      </div>
    </div>
    <div style="padding:12px 18px; border-top:1px solid var(--color-border); text-align:center;">
      <a href="/notifications" style="font-size:0.8rem; font-weight:700; color:var(--color-accent-dark); text-decoration:none;">View all notifications</a>
    </div>
  </div>

  <script>
    function toggleNotifDropdown(e) {
      e.stopPropagation();
      const d = document.getElementById('notif-dropdown');
      d.style.display = d.style.display === 'none' ? 'block' : 'none';
    }
    document.addEventListener('click', function() {
      document.getElementById('notif-dropdown').style.display = 'none';
    });
    document.addEventListener('submit', function(e) {
      const form = e.target;
      if (form && form.method && form.method.toUpperCase() === 'POST') {
        let csrfInput = form.querySelector('input[name="csrf_token"]');
        if (!csrfInput) {
          csrfInput = document.createElement('input');
          csrfInput.type = 'hidden';
          csrfInput.name = 'csrf_token';
          form.appendChild(csrfInput);
        }
        if (!csrfInput.value) {
          const match = document.cookie.match(/(?:^|;\s*)csrf_token=([^;]+)/);
          if (match) {
            csrfInput.value = decodeURIComponent(match[1]);
          }
        }
      }
    });
  </script>
  
  <?php if(isset($extraJs)): ?>
    <script src="<?= htmlspecialchars($extraJs) ?>"></script>
  <?php endif; ?>

</body>
</html>
