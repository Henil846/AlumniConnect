<div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h2 class="font-bold text-xl mb-1">Startup Hub</h2>
        <p class="text-sm text-muted">Discover alumni startups, seek funding, or find co-founders.</p>
    </div>
    <button onclick="document.getElementById('create-modal').style.display='flex'" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:10px 20px; border-radius:8px; cursor:pointer; font-weight:600;">Pitch Your Startup</button>
</div>

<?php if (isset($_GET['added'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Startup pitched successfully!</div>
<?php endif; ?>

<div style="display:flex; gap:24px;">
    <!-- Filters -->
    <div style="width:250px;">
        <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:20px;">
            <h3 style="font-size:1rem; font-weight:700; margin-bottom:16px;">Filter by Stage</h3>
            <form action="/startup-hub" method="GET">
                <select name="stage" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px; margin-bottom:16px; font-family:inherit;">
                    <option value="">All Stages</option>
                    <option value="pre-seed" <?= $stage === 'pre-seed' ? 'selected' : '' ?>>Pre-Seed</option>
                    <option value="seed" <?= $stage === 'seed' ? 'selected' : '' ?>>Seed</option>
                    <option value="series-a" <?= $stage === 'series-a' ? 'selected' : '' ?>>Series A</option>
                    <option value="series-b" <?= $stage === 'series-b' ? 'selected' : '' ?>>Series B+</option>
                </select>
                <button type="submit" class="btn btn-primary" style="width:100%; background:#e2e8f0; color:#0f172a; border:none; padding:10px; border-radius:8px; cursor:pointer; font-weight:600;">Apply Filter</button>
            </form>
        </div>
    </div>

    <!-- Listings -->
    <div style="flex:1;">
        <?php if (empty($startups)): ?>
            <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:40px; text-align:center; color:var(--color-text-muted);">
                <h3 style="font-size:1.1rem; font-weight:700; margin-bottom:8px; color:#1e293b;">No startups found</h3>
                <p>Be the first to pitch your startup in this stage.</p>
            </div>
        <?php else: ?>
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:24px;">
                <?php foreach ($startups as $startup): ?>
                    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden; display:flex; flex-direction:column; box-shadow:0 4px 6px -1px rgba(0,0,0,0.1);">
                        <div style="padding:24px; flex:1; display:flex; flex-direction:column;">
                            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:12px;">
                                <h3 style="font-size:1.25rem; font-weight:800; margin:0; color:#0f172a;"><?= htmlspecialchars($startup->name) ?></h3>
                                <span style="font-size:0.75rem; background:#fef3c7; color:#b45309; padding:4px 8px; border-radius:12px; font-weight:700; text-transform:uppercase;"><?= htmlspecialchars($startup->funding_stage) ?></span>
                            </div>
                            
                            <p style="font-size:0.9rem; color:#475569; margin-bottom:20px; flex:1; line-height:1.5;"><?= nl2br(htmlspecialchars($startup->elevator_pitch)) ?></p>
                            
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:20px;">
                                <img src="/assets/img/signup_side_img.png" alt="" style="width:28px; height:28px; border-radius:50%; object-fit:cover;">
                                <span style="font-size:0.85rem; font-weight:600; color:#334155;">Founder: <?= htmlspecialchars($startup->founder_name) ?></span>
                            </div>
                            
                            <div style="display:flex; gap:12px; border-top:1px solid var(--color-border); padding-top:16px;">
                                <?php if ($startup->website): ?>
                                    <a href="<?= htmlspecialchars($startup->website) ?>" target="_blank" style="flex:1; background:#f1f5f9; color:#0f172a; text-align:center; padding:10px; border-radius:6px; font-size:0.85rem; font-weight:700; text-decoration:none;">Website</a>
                                <?php endif; ?>
                                <a href="/messages?user_id=<?= $startup->user_id ?>" style="flex:1; background:#2563eb; color:#fff; text-align:center; padding:10px; border-radius:6px; font-size:0.85rem; font-weight:700; text-decoration:none;">Contact Founder</a>
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
        <h2 style="font-size:1.5rem; font-weight:800; margin-bottom:24px; color:#0f172a;">Pitch Your Startup</h2>
        
        <form action="/startup-hub/create" method="POST">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Startup Name</label>
                <input type="text" name="name" required style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>
            
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Website (Optional)</label>
                <input type="url" name="website" placeholder="https://" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Funding Stage</label>
                <select name="funding_stage" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
                    <option value="pre-seed">Pre-Seed</option>
                    <option value="seed">Seed</option>
                    <option value="series-a">Series A</option>
                    <option value="series-b">Series B+</option>
                </select>
            </div>
            
            <div style="margin-bottom:24px;">
                <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Elevator Pitch</label>
                <textarea name="elevator_pitch" required rows="4" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit; resize:vertical;" placeholder="Describe your startup in 1-2 sentences..."></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width:100%; background:#2563eb; color:#fff; border:none; padding:14px; border-radius:8px; cursor:pointer; font-weight:700; font-size:1rem;">Submit Pitch</button>
        </form>
    </div>
</div>
