<div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h2 class="font-bold text-xl mb-1">Career Center</h2>
        <p class="text-sm text-muted">Access resume templates, interview guides, and skill courses shared by alumni.</p>
    </div>
    <button onclick="document.getElementById('create-modal').style.display='flex'" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:10px 20px; border-radius:8px; cursor:pointer; font-weight:600;">Share a Resource</button>
</div>

<?php if (isset($_GET['added'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Resource shared successfully!</div>
<?php endif; ?>

<div style="display:flex; gap:24px;">
    <!-- Filters -->
    <div style="width:250px;">
        <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:20px;">
            <h3 style="font-size:1rem; font-weight:700; margin-bottom:16px;">Filter by Type</h3>
            <form action="/career-center" method="GET">
                <select name="type" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px; margin-bottom:16px; font-family:inherit;">
                    <option value="">All Types</option>
                    <option value="resume" <?= $type === 'resume' ? 'selected' : '' ?>>Resume Templates</option>
                    <option value="interview" <?= $type === 'interview' ? 'selected' : '' ?>>Interview Prep</option>
                    <option value="course" <?= $type === 'course' ? 'selected' : '' ?>>Online Courses</option>
                    <option value="article" <?= $type === 'article' ? 'selected' : '' ?>>Articles & Guides</option>
                </select>
                <button type="submit" class="btn btn-primary" style="width:100%; background:#e2e8f0; color:#0f172a; border:none; padding:10px; border-radius:8px; cursor:pointer; font-weight:600;">Apply Filter</button>
            </form>
        </div>
    </div>

    <!-- Listings -->
    <div style="flex:1;">
        <?php if (empty($resources)): ?>
            <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:40px; text-align:center; color:var(--color-text-muted);">
                <h3 style="font-size:1.1rem; font-weight:700; margin-bottom:8px; color:#1e293b;">No resources found</h3>
                <p>Be the first to share a helpful career resource.</p>
            </div>
        <?php else: ?>
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(250px, 1fr)); gap:24px;">
                <?php foreach ($resources as $resource): ?>
                    <a href="<?= htmlspecialchars($resource->link) ?>" target="_blank" style="text-decoration:none; color:inherit; display:block;">
                        <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:24px; transition:all 0.2s; box-shadow:0 1px 3px rgba(0,0,0,0.1);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.1)'">
                            <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                                <div style="width:40px; height:40px; background:#e0e7ff; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#3730a3;">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                </div>
                                <span style="font-size:0.75rem; font-weight:700; text-transform:uppercase; color:#64748b;"><?= htmlspecialchars($resource->resource_type) ?></span>
                            </div>
                            <h3 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin:0 0 8px 0; line-height:1.4;"><?= htmlspecialchars($resource->title) ?></h3>
                            <div style="font-size:0.8rem; color:#2563eb; font-weight:600; display:flex; align-items:center; gap:4px;">
                                View Resource <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Create Modal -->
<div id="create-modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(15,23,42,0.6); z-index:1000; align-items:center; justify-content:center; backdrop-filter:blur(4px);">
    <div style="background:#fff; width:100%; max-width:500px; border-radius:16px; padding:32px; position:relative;">
        <button onclick="document.getElementById('create-modal').style.display='none'" style="position:absolute; top:20px; right:20px; background:none; border:none; cursor:pointer; color:#64748b;">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
        <h2 style="font-size:1.5rem; font-weight:800; margin-bottom:24px; color:#0f172a;">Share a Resource</h2>
        
        <form action="/career-center/create" method="POST">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Resource Title</label>
                <input type="text" name="title" required style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">External Link (URL)</label>
                <input type="url" name="link" required placeholder="https://" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Resource Type</label>
                <select name="resource_type" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
                    <option value="resume">Resume Template</option>
                    <option value="interview">Interview Prep</option>
                    <option value="course">Online Course</option>
                    <option value="article">Article / Guide</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width:100%; background:#2563eb; color:#fff; border:none; padding:14px; border-radius:8px; cursor:pointer; font-weight:700; font-size:1rem;">Share Resource</button>
        </form>
    </div>
</div>
