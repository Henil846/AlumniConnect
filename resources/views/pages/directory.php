
<style>
/* Embedded from directory.css */
/* ===========================
   Alumni Directory Styles
   =========================== */

.directory-layout {
  display: flex;
  gap: 32px;
  align-items: flex-start;
}

/* ---- Filters Sidebar ---- */
.filters-sidebar {
  width: 280px;
  flex-shrink: 0;
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: 24px;
}

.filters-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 24px;
}

.filters-header h2 {
  font-size: 1.1rem;
  font-weight: 700;
}

.filters-header a {
  font-size: 0.8rem;
  color: var(--color-text-muted);
  text-decoration: none;
  font-weight: 500;
}
.filters-header a:hover { color: var(--color-text); }

.filter-group {
  margin-bottom: 24px;
}

.filter-group-title {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--color-text-muted);
  margin-bottom: 12px;
}

.filter-select {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  background: var(--color-input-bg);
  font-size: 0.85rem;
  color: var(--color-text);
  outline: none;
  appearance: none;
}

.filter-select-wrap {
  position: relative;
}
.filter-select-wrap::after {
  content: '▼';
  font-size: 0.6rem;
  color: var(--color-text-muted);
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  pointer-events: none;
}

.filter-checkbox {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 10px;
  font-size: 0.85rem;
  color: var(--color-text);
  cursor: pointer;
}
.filter-checkbox input {
  width: 16px;
  height: 16px;
  accent-color: var(--color-primary);
  cursor: pointer;
}

.filter-input-wrap {
  position: relative;
  display: flex;
  align-items: center;
}
.filter-input-wrap svg {
  position: absolute;
  left: 10px;
  width: 16px;
  height: 16px;
  color: var(--color-text-muted);
}
.filter-input-wrap input {
  width: 100%;
  padding: 10px 12px 10px 32px;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  background: var(--color-input-bg);
  font-size: 0.85rem;
  outline: none;
}
.filter-input-wrap input:focus { border-color: var(--color-primary); }

.btn-filter-apply {
  width: 100%;
  padding: 12px;
  background: var(--color-accent);
  color: var(--color-primary);
  border: none;
  border-radius: var(--radius-sm);
  font-weight: 700;
  font-size: 0.9rem;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px;
}
.btn-filter-apply:hover { background: var(--color-accent-dark); }

/* ---- Directory Main ---- */
.directory-main {
  flex: 1;
  min-width: 0;
}

.directory-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  margin-bottom: 24px;
}

.directory-title h1 {
  font-size: 1.4rem;
  font-weight: 800;
  margin-bottom: 4px;
}
.directory-title p {
  font-size: 0.85rem;
  color: var(--color-text-muted);
}

.view-toggles {
  display: flex;
  gap: 4px;
}
.view-toggle-btn {
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid var(--color-border);
  background: var(--color-white);
  color: var(--color-text-muted);
  border-radius: var(--radius-sm);
  cursor: pointer;
  transition: var(--transition);
}
.view-toggle-btn.active { background: var(--color-bg); color: var(--color-text); border-color: var(--color-text-muted); }
.view-toggle-btn:hover:not(.active) { background: var(--color-bg); color: var(--color-text); }

/* ---- Alumni Grid ---- */
.alumni-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: 24px;
}

.alumni-card {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.alumni-card-cover {
  height: 90px;
  width: 100%;
  position: relative;
}
.alumni-card-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.class-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  background: var(--color-accent);
  color: var(--color-primary);
  font-size: 0.7rem;
  font-weight: 700;
  padding: 4px 8px;
  border-radius: var(--radius-sm);
}

.alumni-card-body {
  padding: 0 20px 20px;
  position: relative;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.alumni-company-logo {
  width: 56px;
  height: 56px;
  background: var(--color-white);
  border: 2px solid var(--color-bg);
  border-radius: var(--radius-md);
  margin-top: -28px;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  position: relative;
  z-index: 2;
  overflow: hidden;
}
.alumni-company-logo img {
  max-width: 70%;
  max-height: 70%;
}

.alumni-card-name {
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 4px;
}

.alumni-card-role {
  font-size: 0.85rem;
  color: var(--color-text-muted);
  margin-bottom: 12px;
  line-height: 1.3;
}

.alumni-card-loc {
  font-size: 0.75rem;
  color: var(--color-text-muted);
  display: flex;
  align-items: center;
  gap: 4px;
  margin-bottom: 24px;
}
.alumni-card-loc svg { width: 12px; height: 12px; }

.alumni-card-actions {
  display: flex;
  gap: 8px;
  margin-top: auto;
}

.btn-connect {
  flex: 1;
  padding: 10px;
  background: var(--color-primary);
  color: var(--color-white);
  border: none;
  border-radius: var(--radius-full);
  font-size: 0.85rem;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
}
.btn-connect:hover { background: var(--color-primary-light); }

.btn-more {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid var(--color-border);
  background: var(--color-white);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: var(--color-text-muted);
}
.btn-more:hover { background: var(--color-bg); color: var(--color-text); }

/* ---- Pagination ---- */
.pagination {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  margin-top: 40px;
}

.page-btn {
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-text-muted);
  background: none;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.page-btn:hover { background: var(--color-bg); color: var(--color-text); }
.page-btn.active { background: var(--color-primary); color: var(--color-white); }

</style>
<div class="directory-layout">
          
<!-- Filters Sidebar -->
<form class="filters-sidebar" method="GET" action="/directory">
<div class="filters-header">
    <h2>Filters</h2>
    <a href="/directory">Reset All</a>
</div>

<div class="filter-group">
    <div class="filter-group-title">Batch Year</div>
    <div class="filter-select-wrap">
    <select class="filter-select" name="batch">
        <option value="">All Years</option>
        <option value="2023" <?= isset($_GET['batch']) && $_GET['batch'] == '2023' ? 'selected' : '' ?>>2023</option>
        <option value="2022" <?= isset($_GET['batch']) && $_GET['batch'] == '2022' ? 'selected' : '' ?>>2022</option>
        <option value="2021" <?= isset($_GET['batch']) && $_GET['batch'] == '2021' ? 'selected' : '' ?>>2021</option>
    </select>
    </div>
</div>

<div class="filter-group">
    <div class="filter-group-title">Department</div>
    <label class="filter-checkbox">
    <input type="checkbox" name="department[]" value="Computer Science" <?= isset($_GET['department']) && in_array('Computer Science', $_GET['department']) ? 'checked' : '' ?> /> Computer Science
    </label>
    <label class="filter-checkbox">
    <input type="checkbox" name="department[]" value="Business Admin" <?= isset($_GET['department']) && in_array('Business Admin', $_GET['department']) ? 'checked' : '' ?> /> Business Admin
    </label>
    <label class="filter-checkbox">
    <input type="checkbox" name="department[]" value="Mechanical Eng" <?= isset($_GET['department']) && in_array('Mechanical Eng', $_GET['department']) ? 'checked' : '' ?> /> Mechanical Eng
    </label>
</div>

<div class="filter-group">
    <div class="filter-group-title">Industry</div>
    <div class="filter-input-wrap">
    <input type="text" name="industry" placeholder="Type industry..." value="<?= htmlspecialchars($_GET['industry'] ?? '') ?>" />
    </div>
</div>

<div class="filter-group">
    <div class="filter-group-title">Location</div>
    <div class="filter-input-wrap">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
    <input type="text" name="location" placeholder="City or Country" value="<?= htmlspecialchars($_GET['location'] ?? '') ?>" />
    </div>
</div>

<button type="submit" class="btn-filter-apply">
    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
    Apply Filters
</button>
</form>

<!-- Main Content -->
<div class="directory-main">

<div class="directory-header">
    <div class="directory-title">
    <h1>Alumni Members</h1>
    <p>Showing <?= count($alumni) ?> active alumni</p>
    </div>
    <div class="view-toggles">
    <button class="view-toggle-btn active"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></button>
    <button class="view-toggle-btn"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></button>
    </div>
</div>

<div class="alumni-grid">
    
    <?php foreach ($alumni as $alum): ?>
    <div class="alumni-card">
    <div class="alumni-card-cover">
        <span class="class-badge">Class of '<?= date('y', strtotime($alum->created_at)) ?></span>
        <img src="/assets/img/login_side_img.png" alt="Cover" style="object-position:center 30%;" />
    </div>
    <div class="alumni-card-body">
        <div class="alumni-company-logo">
        <span style="font-size:0.6rem;font-weight:700;color:var(--color-primary);"><?= strtoupper($alum->role) ?></span>
        </div>
        <h3 class="alumni-card-name"><?= htmlspecialchars($alum->full_name) ?></h3>
        <p class="alumni-card-role"><?= htmlspecialchars($alum->email) ?></p>
        <div class="alumni-card-loc">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        Alumni Connect Network
        </div>
        <div class="alumni-card-actions">
        <button class="btn-connect" onclick="window.location.href='/profile/<?= $alum->id ?>'">Connect</button>
        <button class="btn-more"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg></button>
        </div>
    </div>
    </div>
    <?php endforeach; ?>

</div>

<div class="pagination">
    <?php if ($currentPage > 1): ?>
        <?php $q = $_GET; $q['page'] = $currentPage - 1; ?>
        <button class="page-btn" onclick="window.location.href='?<?= htmlspecialchars(http_build_query($q), ENT_QUOTES) ?>'">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
    <?php endif; ?>

    <?php for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++): ?>
        <?php $q = $_GET; $q['page'] = $i; ?>
        <button class="page-btn <?= $i === $currentPage ? 'active' : '' ?>" onclick="window.location.href='?<?= htmlspecialchars(http_build_query($q), ENT_QUOTES) ?>'"><?= $i ?></button>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages): ?>
        <?php $q = $_GET; $q['page'] = $currentPage + 1; ?>
        <button class="page-btn" onclick="window.location.href='?<?= htmlspecialchars(http_build_query($q), ENT_QUOTES) ?>'">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
    <?php endif; ?>
</div>

</div>
</div>
