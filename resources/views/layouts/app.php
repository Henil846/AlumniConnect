<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title ?? 'Alumni Connect') ?></title>
  <link rel="stylesheet" href="/assets/css/styles.css" />
  <link rel="stylesheet" href="/assets/css/app.css" />
  <?php if(isset($extraCss)): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($extraCss) ?>" />
  <?php endif; ?>
</head>
<body>

  <div class="app-container">
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-header">
        <a href="/dashboard" class="logo">
          Alumni Connect
          <span>Modern Collegiate</span>
        </a>
      </div>
      <nav class="sidebar-nav">
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
        <a href="/messages" class="nav-item <?= ($activePage ?? '') === 'messages' ? 'active' : '' ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          Messages
        </a>
      </nav>
      <div class="sidebar-footer">
        <button class="support-growth-btn">Support Growth</button>
        <a href="/help" class="sidebar-footer-link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          Help Center
        </a>
        <form action="/logout" method="POST" style="margin:0;">
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
        <button class="hamburger-menu" onclick="document.querySelector('.sidebar').classList.toggle('active')" style="display:none; background:none; border:none; margin-right:15px; cursor:pointer;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" width="24" height="24"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
        <div class="header-search">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" placeholder="Search alumni, jobs, events..." />
        </div>
        <div class="header-actions">
          <button class="header-icon-btn" id="notif-bell-btn" onclick="toggleNotifDropdown(event)" style="position:relative;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            <span class="notification-dot"></span>
          </button>
          <button class="header-icon-btn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </button>
          <img src="/assets/img/mentor_elena.png" alt="Profile" class="header-profile" />
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
      <span style="font-size:0.72rem; color:var(--color-accent-dark); font-weight:700; cursor:pointer;" onclick="document.querySelectorAll('.notif-item-unread').forEach(el=>el.classList.remove('notif-item-unread'))">Mark all read</span>
    </div>
    <div style="max-height:340px; overflow-y:auto;">
      <!-- Mock notifications for now -->
      <div class="notif-item-unread" style="padding:13px 18px; display:flex; gap:12px; border-bottom:1px solid #f1f5f9; background:#f9fafb; cursor:pointer;" onclick="window.location.href='/mentorship'">
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
      <a href="#" style="font-size:0.8rem; font-weight:700; color:var(--color-accent-dark); text-decoration:none;">View all notifications</a>
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
  </script>
  
  <?php if(isset($extraJs)): ?>
    <script src="<?= htmlspecialchars($extraJs) ?>"></script>
  <?php endif; ?>

</body>
</html>
