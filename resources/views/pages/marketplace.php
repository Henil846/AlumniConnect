<div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h2 class="font-bold text-xl mb-1">Marketplace</h2>
        <p class="text-sm text-muted">Buy, sell, or trade items with fellow alumni.</p>
    </div>
    <button onclick="document.getElementById('create-modal').style.display='flex'" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:10px 20px; border-radius:8px; cursor:pointer; font-weight:600;">Post an Item</button>
</div>

<?php if (isset($_GET['posted'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Item posted successfully!</div>
<?php endif; ?>

<div style="display:flex; gap:24px;">
    <!-- Filters -->
    <div style="width:250px;">
        <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:20px;">
            <h3 style="font-size:1rem; font-weight:700; margin-bottom:16px;">Filter by Category</h3>
            <form action="/marketplace" method="GET">
                <select name="category" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px; margin-bottom:16px; font-family:inherit;">
                    <option value="">All Categories</option>
                    <option value="electronics" <?= $category === 'electronics' ? 'selected' : '' ?>>Electronics</option>
                    <option value="books" <?= $category === 'books' ? 'selected' : '' ?>>Books</option>
                    <option value="furniture" <?= $category === 'furniture' ? 'selected' : '' ?>>Furniture</option>
                    <option value="housing" <?= $category === 'housing' ? 'selected' : '' ?>>Housing/Sublets</option>
                    <option value="other" <?= $category === 'other' ? 'selected' : '' ?>>Other</option>
                </select>
                <button type="submit" class="btn btn-primary" style="width:100%; background:#e2e8f0; color:#0f172a; border:none; padding:10px; border-radius:8px; cursor:pointer; font-weight:600;">Apply Filter</button>
            </form>
        </div>
    </div>

    <!-- Listings -->
    <div style="flex:1;">
        <?php if (empty($items)): ?>
            <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:40px; text-align:center; color:var(--color-text-muted);">
                <h3 style="font-size:1.1rem; font-weight:700; margin-bottom:8px; color:#1e293b;">No items found</h3>
                <p>Be the first to post an item in this category.</p>
            </div>
        <?php else: ?>
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:24px;">
                <?php foreach ($items as $item): ?>
                    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden; display:flex; flex-direction:column;">
                        <div style="height:160px; background:#f1f5f9; display:flex; align-items:center; justify-content:center;">
                            <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="#cbd5e1" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        </div>
                        <div style="padding:20px; flex:1; display:flex; flex-direction:column;">
                            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:8px;">
                                <h3 style="font-size:1.1rem; font-weight:700; margin:0; color:#0f172a;"><?= htmlspecialchars($item->title) ?></h3>
                                <span style="font-weight:800; color:#059669; font-size:1.1rem;">$<?= number_format($item->price, 2) ?></span>
                            </div>
                            <p style="font-size:0.85rem; color:var(--color-text-muted); margin-bottom:12px; flex:1;"><?= nl2br(htmlspecialchars($item->description)) ?></p>
                            
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                                <span style="font-size:0.75rem; background:#f1f5f9; padding:4px 8px; border-radius:4px; font-weight:600; color:#475569; text-transform:capitalize;"><?= htmlspecialchars($item->item_condition) ?></span>
                                <span style="font-size:0.75rem; color:var(--color-text-muted);"><?= date('M j, Y', strtotime($item->created_at)) ?></span>
                            </div>
                            <div style="display:flex; align-items:center; gap:12px; border-top:1px solid var(--color-border); padding-top:16px;">
                                <img src="/assets/img/signup_side_img.png" alt="" style="width:24px; height:24px; border-radius:50%; object-fit:cover;">
                                <span style="font-size:0.85rem; font-weight:600; color:#334155;"><?= htmlspecialchars($item->author_name) ?></span>
                                <a href="/messages?user_id=<?= $item->user_id ?>" style="margin-left:auto; font-size:0.8rem; font-weight:700; color:#2563eb; text-decoration:none;">Contact</a>
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
        <h2 style="font-size:1.5rem; font-weight:800; margin-bottom:24px; color:#0f172a;">Post an Item</h2>
        
        <form action="/marketplace/create" method="POST">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Item Title</label>
                <input type="text" name="title" required style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <div style="display:flex; gap:16px; margin-bottom:16px;">
                <div style="flex:1;">
                    <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Price ($)</label>
                    <input type="number" step="0.01" name="price" required style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
                </div>
                <div style="flex:1;">
                    <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Condition</label>
                    <select name="item_condition" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
                        <option value="new">New</option>
                        <option value="like-new">Like New</option>
                        <option value="good">Good</option>
                        <option value="fair">Fair</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Category</label>
                <select name="category" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
                    <option value="electronics">Electronics</option>
                    <option value="books">Books</option>
                    <option value="furniture">Furniture</option>
                    <option value="housing">Housing/Sublets</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div style="margin-bottom:24px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Description</label>
                <textarea name="description" required rows="4" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit; resize:vertical;"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width:100%; background:#2563eb; color:#fff; border:none; padding:14px; border-radius:8px; cursor:pointer; font-weight:700; font-size:1rem;">Post Item</button>
        </form>
    </div>
</div>
