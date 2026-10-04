<div style="display:flex; height:100%;">
          
<!-- COL 1: FILTERS (Fixed Width) -->
<form method="GET" action="/jobs" style="width:260px; border-right:1px solid var(--color-border); padding:32px 24px; overflow-y:auto; background:var(--color-white);">
<h3 class="font-bold text-lg mb-6">Filters</h3>

<div class="mb-6">
    <h4 class="text-xs font-bold text-muted mb-3" style="text-transform:uppercase; letter-spacing:0.05em;">Industry</h4>
    <label style="display:flex; align-items:center; gap:8px; margin-bottom:8px; font-size:0.85rem; cursor:pointer;">
    <input type="checkbox" name="industry[]" value="Technology" <?= isset($_GET['industry']) && in_array('Technology', $_GET['industry']) ? 'checked' : '' ?> /> Technology
    </label>
    <label style="display:flex; align-items:center; gap:8px; margin-bottom:8px; font-size:0.85rem; cursor:pointer;">
    <input type="checkbox" name="industry[]" value="Financial Services" <?= isset($_GET['industry']) && in_array('Financial Services', $_GET['industry']) ? 'checked' : '' ?> /> Financial Services
    </label>
    <label style="display:flex; align-items:center; gap:8px; margin-bottom:8px; font-size:0.85rem; cursor:pointer;">
    <input type="checkbox" name="industry[]" value="Healthcare" <?= isset($_GET['industry']) && in_array('Healthcare', $_GET['industry']) ? 'checked' : '' ?> /> Healthcare
    </label>
    <label style="display:flex; align-items:center; gap:8px; font-size:0.85rem; cursor:pointer;">
    <input type="checkbox" name="industry[]" value="Creative Arts" <?= isset($_GET['industry']) && in_array('Creative Arts', $_GET['industry']) ? 'checked' : '' ?> /> Creative Arts
    </label>
</div>

<div class="mb-6">
    <h4 class="text-xs font-bold text-muted mb-3" style="text-transform:uppercase; letter-spacing:0.05em;">Employment Type</h4>
    <label style="display:flex; align-items:center; gap:8px; margin-bottom:8px; font-size:0.85rem; cursor:pointer;">
    <input type="checkbox" name="type[]" value="Full-time" <?= isset($_GET['type']) && in_array('Full-time', $_GET['type']) ? 'checked' : '' ?> /> Full-time
    </label>
    <label style="display:flex; align-items:center; gap:8px; margin-bottom:8px; font-size:0.85rem; cursor:pointer;">
    <input type="checkbox" name="type[]" value="Remote" <?= isset($_GET['type']) && in_array('Remote', $_GET['type']) ? 'checked' : '' ?> /> Remote
    </label>
    <label style="display:flex; align-items:center; gap:8px; margin-bottom:8px; font-size:0.85rem; cursor:pointer;">
    <input type="checkbox" name="type[]" value="Contract" <?= isset($_GET['type']) && in_array('Contract', $_GET['type']) ? 'checked' : '' ?> /> Contract
    </label>
    <label style="display:flex; align-items:center; gap:8px; margin-bottom:8px; font-size:0.85rem; cursor:pointer;">
    <input type="checkbox" name="type[]" value="Hybrid" <?= isset($_GET['type']) && in_array('Hybrid', $_GET['type']) ? 'checked' : '' ?> /> Hybrid
    </label>
</div>

<button type="submit" class="btn-primary" style="width:100%;">Apply Filters</button>
</form>

<!-- COL 2: JOBS LIST (Flexible Width) -->
<div style="flex:1; padding:32px 24px; overflow-y:auto; background:#fafafa;">
<div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:24px;">
    <div>
    <h2 style="font-size:1.6rem; font-weight:800; margin-bottom:4px;">Discover Your Path</h2>
    <p class="text-xs text-muted mb-0">Showing <?= count($jobs) ?> jobs tailored to your background</p>
    </div>
    <div style="display:flex; border:1px solid var(--color-border); border-radius:var(--radius-sm); background:var(--color-white); overflow:hidden;">
    <button style="padding:8px; background:var(--color-bg); border:none; cursor:pointer;"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></button>
    <button style="padding:8px; background:transparent; border:none; border-left:1px solid var(--color-border); cursor:pointer;"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></button>
    </div>
</div>

<?php foreach($jobs as $job): 
    $isActive = $selectedJob && $selectedJob->id == $job->id ? 'active' : '';
?>
<?php 
    $q = $_GET;
    $q['job_id'] = $job->id;
    if (isset($q['page'])) unset($q['page']);
    $url = '?' . http_build_query($q);
?>
<div class="job-card-full <?= $isActive ?>" onclick="window.location.href='<?= htmlspecialchars($url, ENT_QUOTES) ?>'" style="cursor:pointer;">
    <button class="bookmark-btn"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg></button>
    <div style="width:40px; height:40px; border:1px solid var(--color-border); border-radius:8px; display:flex; align-items:center; justify-content:center; margin-bottom:12px; background:var(--color-white);">
    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
    </div>
    <h3 class="font-bold text-md mb-1"><?= htmlspecialchars($job->title) ?></h3>
    <p class="text-xs text-muted mb-3"><?= htmlspecialchars($job->company) ?> • <?= htmlspecialchars($job->location) ?></p>
    <div class="tags-row mb-3">
    <span class="job-tag green"><?= htmlspecialchars($job->type) ?></span>
    <span class="job-tag gold"><?= htmlspecialchars($job->salary_range) ?></span>
    </div>
</div>
<?php endforeach; ?>

<div class="pagination" style="display:flex; justify-content:center; gap:8px; margin-top:24px;">
    <?php if ($currentPage > 1): ?>
        <?php $q = $_GET; $q['page'] = $currentPage - 1; ?>
        <button class="page-btn" onclick="window.location.href='?<?= htmlspecialchars(http_build_query($q), ENT_QUOTES) ?>'" style="padding:8px 12px; background:var(--color-white); border:1px solid var(--color-border); border-radius:4px; cursor:pointer;">&laquo;</button>
    <?php endif; ?>

    <?php for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++): ?>
        <?php $q = $_GET; $q['page'] = $i; ?>
        <button class="page-btn" onclick="window.location.href='?<?= htmlspecialchars(http_build_query($q), ENT_QUOTES) ?>'" style="padding:8px 12px; background:<?= $i === $currentPage ? 'var(--color-primary)' : 'var(--color-white)' ?>; color:<?= $i === $currentPage ? '#fff' : 'inherit' ?>; border:1px solid var(--color-border); border-radius:4px; cursor:pointer;"><?= $i ?></button>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages): ?>
        <?php $q = $_GET; $q['page'] = $currentPage + 1; ?>
        <button class="page-btn" onclick="window.location.href='?<?= htmlspecialchars(http_build_query($q), ENT_QUOTES) ?>'" style="padding:8px 12px; background:var(--color-white); border:1px solid var(--color-border); border-radius:4px; cursor:pointer;">&raquo;</button>
    <?php endif; ?>
</div>

</div>

<!-- COL 3: JOB DETAILS (Fixed Width) -->
<div style="width:400px; background:var(--color-white); border-left:1px solid var(--color-border); padding:32px 28px; overflow-y:auto;">
<div style="display:flex; justify-content:flex-end; gap:12px; margin-bottom:16px;">
    <button class="header-icon-btn"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg></button>
    <button class="header-icon-btn"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg></button>
</div>

<div class="details-tabs">
    <div class="detail-tab active">Job Description</div>
    <div class="detail-tab">Application History</div>
</div>

<?php if ($selectedJob): ?>
<div class="detail-logo">
    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
</div>

<h2 style="font-size:1.5rem; font-weight:800; margin-bottom:4px;"><?= htmlspecialchars($selectedJob->title) ?></h2>
<p class="text-sm text-muted mb-2"><?= htmlspecialchars($selectedJob->company) ?> • <?= htmlspecialchars($selectedJob->location) ?></p>

<?php if (isset($_GET['applied'])): ?>
    <div style="background:#dcfce7; color:#15803d; padding:12px; border-radius:8px; margin-bottom:24px; font-weight:600; font-size:0.9rem;">
        Application Submitted Successfully!
    </div>
<?php endif; ?>

<div class="mb-6">
    <h4 class="font-bold text-md mb-2">About the Role</h4>
    <p class="text-sm text-muted" style="line-height:1.6;">
    <?= nl2br(htmlspecialchars($selectedJob->description)) ?>
    </p>
</div>

<div class="mb-8">
    <h4 class="font-bold text-md mb-3">Requirements</h4>
    <p class="text-sm text-muted" style="line-height:1.6;">
    <?= nl2br(htmlspecialchars($selectedJob->requirements)) ?>
    </p>
</div>

<form method="POST" action="/jobs/apply" style="display:flex; gap:12px; position:sticky; bottom:0; padding-top:16px; background:var(--color-white); border-top:1px solid var(--color-border);">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
    <input type="hidden" name="job_id" value="<?= $selectedJob->id ?>">
    <button type="submit" class="btn-primary" style="flex:1; padding:14px; font-size:1rem;">Apply Now</button>
</form>
<?php endif; ?>

</div>
</div>
