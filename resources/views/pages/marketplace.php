
<style>
/* Embedded from hub-market.css */
/* =========================================
   Startup Hub, Marketplace, Donations, Business & Career CSS
   ========================================= */

/* Light Sidebar Variant (Modern Collegiate Network) */
.sidebar.light-theme {
  background: #ffffff;
  color: var(--color-text);
  width: 240px;
  border-right: 1px solid var(--color-border);
}
.sidebar.light-theme .logo {
  color: #0f172a;
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
}
.sidebar.light-theme .logo-icon-box {
  width: 36px;
  height: 36px;
  background: #0f172a;
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  font-weight: 800;
}
.sidebar.light-theme .nav-item {
  color: #64748b;
  position: relative;
}
.sidebar.light-theme .nav-item:hover {
  background: #f8fafc;
  color: #0f172a;
}
.sidebar.light-theme .nav-item.active {
  background: #f1f5f9;
  color: #0f172a;
  font-weight: 700;
}
.sidebar.light-theme .nav-item.active::after {
  content: "";
  position: absolute;
  right: 0;
  top: 0;
  bottom: 0;
  width: 4px;
  background: var(--color-accent);
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.sidebar.light-theme .sidebar-footer {
  border-top: 1px solid var(--color-border);
  padding: 24px 16px;
}

.btn-black-action {
  background: #0f172a;
  color: #fff;
  font-weight: 700;
  border: none;
  width: 100%;
  padding: 12px;
  border-radius: var(--radius-full);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
  transition: var(--transition);
}
.btn-black-action:hover { background: #1e293b; }

.btn-gold-action-alt {
  background: var(--color-accent);
  color: #000;
  font-weight: 700;
  border: none;
  padding: 10px 24px;
  border-radius: var(--radius-full);
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(245, 166, 35, 0.25);
  transition: var(--transition);
  display: inline-flex;
  align-items: center;
  gap: 8px;
}
.btn-gold-action-alt:hover { background: #e09218; }

.btn-dark-outline {
  background: rgba(15, 23, 42, 0.6);
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.2);
  padding: 10px 24px;
  border-radius: var(--radius-full);
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
}
.btn-dark-outline:hover { background: rgba(15, 23, 42, 0.8); }

/* Top Header & Page Structure */
.content-scrollable.light-bg {
  background: #f8fafc;
  padding: 32px 40px !important;
}

/* ---- Startup Hub ---- */
.hero-banner-card {
  border-radius: 20px;
  overflow: hidden;
  position: relative;
  height: 420px;
  margin-bottom: 28px;
  color: #fff;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 48px;
  background-size: cover;
  background-position: center;
}
.hero-banner-card::before {
  content: "";
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: linear-gradient(to right, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.7) 50%, rgba(15, 23, 42, 0.3) 100%);
  z-index: 1;
}
.hero-content-z {
  position: relative;
  z-index: 2;
  max-width: 600px;
}

.venture-badge {
  background: var(--color-accent);
  color: #000;
  font-weight: 800;
  font-size: 0.7rem;
  padding: 4px 10px;
  border-radius: 6px;
  display: inline-block;
  text-transform: uppercase;
  margin-bottom: 12px;
}

.hub-2col-row {
  display: grid;
  grid-template-columns: 2fr 1.2fr;
  gap: 24px;
  margin-bottom: 36px;
}

.hub-card-white {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 16px;
  padding: 24px 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}
.hub-card-brown {
  background: #78350f;
  color: #fff;
  border-radius: 16px;
  padding: 24px 28px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  position: relative;
}

.showcase-grid-3 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-bottom: 36px;
}
.showcase-card {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 16px;
  padding: 24px;
  display: flex;
  flex-direction: column;
  box-shadow: 0 2px 12px rgba(0,0,0,0.02);
  transition: var(--transition);
}
.showcase-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.06); }

.pill-green { background: #dcfce7; color: #15803d; font-size: 0.7rem; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
.pill-gold { background: #fef3c7; color: #92400e; font-size: 0.7rem; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
.pill-purple { background: #e0e7ff; color: #4338ca; font-size: 0.7rem; font-weight: 700; padding: 4px 10px; border-radius: 20px; }

.mentors-bar {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 16px;
  padding: 28px 32px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.mentors-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}
.mentor-card-mini {
  background: #f8fafc;
  border: 1px solid var(--color-border);
  border-radius: 12px;
  padding: 16px;
  display: flex;
  align-items: center;
  gap: 16px;
}

/* ---- Marketplace (Campus Exchange) ---- */
.market-pills-scroll {
  display: flex;
  gap: 12px;
  overflow-x: auto;
  padding-bottom: 8px;
  margin-bottom: 28px;
}
.market-pill-btn {
  background: #f1f5f9;
  color: #475569;
  border: none;
  padding: 10px 24px;
  border-radius: var(--radius-full);
  font-weight: 600;
  font-size: 0.9rem;
  cursor: pointer;
  white-space: nowrap;
  transition: var(--transition);
}
.market-pill-btn.active {
  background: #000000;
  color: #ffffff;
}
.market-pill-btn:hover:not(.active) { background: #e2e8f0; }

.market-grid-4 {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
  margin-bottom: 40px;
}
.market-item-card {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 16px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  position: relative;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
  transition: var(--transition);
}
.market-item-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
.market-item-img {
  height: 200px;
  position: relative;
  overflow: hidden;
}
.market-item-img img { width: 100%; height: 100%; object-fit: cover; }
.market-badge {
  position: absolute;
  top: 12px; left: 12px;
  font-size: 0.65rem; font-weight: 800; padding: 4px 10px; border-radius: 4px;
  text-transform: uppercase; letter-spacing: 0.03em;
}
.market-fav-btn {
  position: absolute;
  top: 12px; right: 12px;
  width: 32px; height: 32px; border-radius: 50%;
  background: #fff; border: 1px solid var(--color-border);
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* ---- Donations ---- */
.donations-layout {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 32px;
}
.donation-quick-box {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 20px;
  padding: 32px;
  margin-bottom: 32px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}
.amt-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 12px;
  margin-bottom: 24px;
}
.amt-btn {
  background: #f8fafc;
  border: 2px solid var(--color-border);
  padding: 16px 8px;
  border-radius: 12px;
  font-size: 1.1rem;
  font-weight: 800;
  text-align: center;
  cursor: pointer;
  transition: var(--transition);
}
.amt-btn.active {
  border-color: var(--color-accent);
  background: #fffbeb;
  color: #92400e;
}

.funds-grid-2 {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 24px;
}
.fund-card {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 16px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}

.leaderboard-card {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 20px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  box-shadow: 0 4px 20px rgba(0,0,0,0.03);
}
.leaderboard-header {
  background: #0f172a;
  color: #fff;
  padding: 28px 24px;
  position: relative;
}
.leaderboard-item {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 20px 24px;
  border-bottom: 1px solid var(--color-border);
}

/* ---- Business Directory ---- */
.biz-spotlight-row {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 24px;
  margin-bottom: 40px;
}
.biz-main-spotlight {
  border-radius: 20px;
  overflow: hidden;
  height: 440px;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 40px;
  color: #fff;
  background-size: cover;
  background-position: center;
}
.biz-main-spotlight::before {
  content: "";
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 60%, rgba(0,0,0,0.1) 100%);
  z-index: 1;
}

.biz-side-stack {
  display: flex;
  flex-direction: column;
  gap: 24px;
}
.biz-insight-box {
  background: #0b1329;
  color: #fff;
  border-radius: 20px;
  padding: 32px 28px;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.biz-photo-card {
  border-radius: 20px;
  overflow: hidden;
  height: 180px;
  position: relative;
  display: flex;
  align-items: flex-end;
  padding: 20px;
  color: #fff;
  background-size: cover;
  background-position: center;
}
.biz-photo-card::before {
  content: "";
  position: absolute; top: 0; left: 0; right: 0; bottom: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, transparent 60%);
  z-index: 1;
}

/* ---- Career Center (Resume Builder) ---- */
.career-builder-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 32px;
}
.builder-left-stack {
  display: flex;
  flex-direction: column;
  gap: 28px;
}
.builder-form-box {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 20px;
  padding: 32px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}

.live-preview-box {
  background: #0f172a;
  border-radius: 20px;
  padding: 40px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.paper-preview {
  background: #fff;
  border-radius: 8px;
  padding: 48px;
  color: #0f172a;
  box-shadow: 0 20px 40px rgba(0,0,0,0.3);
  min-height: 520px;
  font-family: 'Times New Roman', Times, serif;
}
.paper-preview h1 { font-family: -apple-system, BlinkMacSystemFont, sans-serif; font-size: 1.6rem; font-weight: 800; letter-spacing: 0.05em; margin-bottom: 4px; }
.paper-preview .paper-sub { font-family: -apple-system, BlinkMacSystemFont, sans-serif; font-size: 0.75rem; color: #64748b; margin-bottom: 20px; }
.paper-preview hr { border: 0; height: 1px; background: #000; margin-bottom: 20px; }
.paper-preview h4 { font-family: -apple-system, BlinkMacSystemFont, sans-serif; font-size: 0.75rem; font-weight: 800; letter-spacing: 0.1em; margin-bottom: 8px; color: #334155; }
.paper-preview p, .paper-preview li { font-size: 0.85rem; line-height: 1.6; font-family: -apple-system, BlinkMacSystemFont, sans-serif; color: #334155; }

.templates-grid-2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}
.tpl-card {
  background: #fff;
  border: 1px solid var(--color-border);
  border-radius: 12px;
  padding: 12px;
  text-align: center;
  cursor: pointer;
  transition: var(--transition);
}
.tpl-card:hover { border-color: var(--color-accent); transform: translateY(-3px); box-shadow: 0 6px 18px rgba(0,0,0,0.05); }
.tpl-img {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  height: 200px;
  margin-bottom: 12px;
  overflow: hidden;
  position: relative;
}
.tpl-img img { width: 100%; height: 100%; object-fit: cover; object-position: top; }

</style>
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
