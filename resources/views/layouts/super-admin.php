<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title ?? 'Super Admin — AlumniConnect') ?></title>
  <link rel="stylesheet" href="/assets/css/super-admin.css" />
  <?php if(isset($extraCss)): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($extraCss) ?>" />
  <?php endif; ?>
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
