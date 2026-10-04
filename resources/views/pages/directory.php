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
