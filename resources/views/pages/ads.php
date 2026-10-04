<div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h2 class="font-bold text-xl mb-1">Our Sponsors</h2>
        <p class="text-sm text-muted">Support the businesses that support Alumni Connect.</p>
    </div>
    <button onclick="document.getElementById('create-modal').style.display='flex'" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:10px 20px; border-radius:8px; cursor:pointer; font-weight:600;">Become a Sponsor</button>
</div>

<?php if (isset($_GET['added'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Thank you for sponsoring Alumni Connect!</div>
<?php endif; ?>

<?php if (empty($ads)): ?>
    <div style="background:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px; padding:40px; text-align:center; color:#64748b;">
        <p>No active sponsorships at this time. Contact us to feature your business here!</p>
    </div>
<?php else: ?>
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:24px;">
        <?php foreach ($ads as $ad): ?>
            <a href="<?= htmlspecialchars($ad->link_url) ?>" target="_blank" style="display:block; text-decoration:none;">
                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; overflow:hidden; transition:transform 0.2s; box-shadow:0 4px 6px -1px rgba(0,0,0,0.05);" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">
                    <img src="<?= htmlspecialchars($ad->image_url) ?>" alt="Ad" style="width:100%; height:150px; object-fit:cover; display:block;">
                    <div style="padding:16px; text-align:center;">
                        <h4 style="margin:0; font-size:1.1rem; font-weight:800; color:#0f172a;"><?= htmlspecialchars($ad->sponsor_name) ?></h4>
                        <span style="font-size:0.75rem; color:#64748b; text-transform:uppercase; font-weight:700;">Sponsored</span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Create Modal -->
<div id="create-modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(15,23,42,0.6); z-index:1000; align-items:center; justify-content:center; backdrop-filter:blur(4px);">
    <div style="background:#fff; width:100%; max-width:400px; border-radius:16px; padding:32px; position:relative;">
        <button onclick="document.getElementById('create-modal').style.display='none'" style="position:absolute; top:20px; right:20px; background:none; border:none; cursor:pointer; color:#64748b;">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
        <h2 style="font-size:1.5rem; font-weight:800; margin-bottom:24px; color:#0f172a;">Become a Sponsor</h2>
        
        <form action="/ads/create" method="POST">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Sponsor / Company Name</label>
                <input type="text" name="sponsor_name" required style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Target URL</label>
                <input type="url" name="link_url" required placeholder="https://" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <div style="margin-bottom:24px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Image URL</label>
                <input type="url" name="image_url" placeholder="https://" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <button type="submit" class="btn btn-primary" style="width:100%; background:#2563eb; color:#fff; border:none; padding:14px; border-radius:8px; cursor:pointer; font-weight:700; font-size:1rem;">Submit Sponsorship</button>
        </form>
    </div>
</div>
