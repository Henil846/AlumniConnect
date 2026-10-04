<div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h2 class="font-bold text-xl mb-1">Alumni Business Directory</h2>
        <p class="text-sm text-muted">Discover and support businesses owned by fellow alumni.</p>
    </div>
    <button onclick="document.getElementById('create-modal').style.display='flex'" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:10px 20px; border-radius:8px; cursor:pointer; font-weight:600;">List Your Business</button>
</div>

<?php if (isset($_GET['added'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Business listed successfully!</div>
<?php endif; ?>

<div style="display:flex; gap:24px;">
    <!-- Filters -->
    <div style="width:250px;">
        <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:20px;">
            <h3 style="font-size:1rem; font-weight:700; margin-bottom:16px;">Filter by Category</h3>
            <form action="/business-directory" method="GET">
                <select name="category" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px; margin-bottom:16px; font-family:inherit;">
                    <option value="">All Categories</option>
                    <option value="tech" <?= $category === 'tech' ? 'selected' : '' ?>>Technology & IT</option>
                    <option value="retail" <?= $category === 'retail' ? 'selected' : '' ?>>Retail & E-commerce</option>
                    <option value="consulting" <?= $category === 'consulting' ? 'selected' : '' ?>>Consulting & Services</option>
                    <option value="food" <?= $category === 'food' ? 'selected' : '' ?>>Food & Beverage</option>
                    <option value="other" <?= $category === 'other' ? 'selected' : '' ?>>Other</option>
                </select>
                <button type="submit" class="btn btn-primary" style="width:100%; background:#e2e8f0; color:#0f172a; border:none; padding:10px; border-radius:8px; cursor:pointer; font-weight:600;">Apply Filter</button>
            </form>
        </div>
    </div>

    <!-- Listings -->
    <div style="flex:1;">
        <?php if (empty($businesses)): ?>
            <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:40px; text-align:center; color:var(--color-text-muted);">
                <h3 style="font-size:1.1rem; font-weight:700; margin-bottom:8px; color:#1e293b;">No businesses found</h3>
                <p>Be the first to list a business in this category.</p>
            </div>
        <?php else: ?>
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:24px;">
                <?php foreach ($businesses as $biz): ?>
                    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden; display:flex; flex-direction:column;">
                        <div style="height:120px; background:#f1f5f9; display:flex; align-items:center; justify-content:center;">
                            <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="#cbd5e1" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        </div>
                        <div style="padding:20px; flex:1; display:flex; flex-direction:column;">
                            <span style="font-size:0.75rem; background:#e0e7ff; color:#3730a3; padding:4px 8px; border-radius:4px; font-weight:600; text-transform:uppercase; margin-bottom:12px; align-self:flex-start;"><?= htmlspecialchars($biz->category) ?></span>
                            
                            <h3 style="font-size:1.25rem; font-weight:800; margin:0 0 8px 0; color:#0f172a;"><?= htmlspecialchars($biz->name) ?></h3>
                            <p style="font-size:0.9rem; color:var(--color-text-muted); margin-bottom:16px; flex:1;"><?= nl2br(htmlspecialchars($biz->description)) ?></p>
                            
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:16px;">
                                <img src="/assets/img/signup_side_img.png" alt="" style="width:24px; height:24px; border-radius:50%; object-fit:cover;">
                                <span style="font-size:0.85rem; font-weight:600; color:#334155;">Owned by <?= htmlspecialchars($biz->owner_name) ?></span>
                            </div>
                            
                            <div style="display:flex; gap:12px; border-top:1px solid var(--color-border); padding-top:16px;">
                                <?php if ($biz->website): ?>
                                    <a href="<?= htmlspecialchars($biz->website) ?>" target="_blank" style="flex:1; background:#f1f5f9; color:#0f172a; text-align:center; padding:8px; border-radius:6px; font-size:0.85rem; font-weight:700; text-decoration:none;">Visit Website</a>
                                <?php endif; ?>
                                <a href="/messages?user_id=<?= $biz->user_id ?>" style="flex:1; background:#0f172a; color:#fff; text-align:center; padding:8px; border-radius:6px; font-size:0.85rem; font-weight:700; text-decoration:none;">Contact Owner</a>
                            </div>
                        </div>
                    </div>
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
        <h2 style="font-size:1.5rem; font-weight:800; margin-bottom:24px; color:#0f172a;">List Your Business</h2>
        
        <form action="/business-directory/create" method="POST">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Business Name</label>
                <input type="text" name="name" required style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Website (Optional)</label>
                <input type="url" name="website" placeholder="https://" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Category</label>
                <select name="category" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
                    <option value="tech">Technology & IT</option>
                    <option value="retail">Retail & E-commerce</option>
                    <option value="consulting">Consulting & Services</option>
                    <option value="food">Food & Beverage</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div style="margin-bottom:24px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Business Description</label>
                <textarea name="description" required rows="4" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit; resize:vertical;"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width:100%; background:#2563eb; color:#fff; border:none; padding:14px; border-radius:8px; cursor:pointer; font-weight:700; font-size:1rem;">Submit Listing</button>
        </form>
    </div>
</div>
