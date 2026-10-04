<div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h2 class="font-bold text-xl mb-1">Rewards & Badges</h2>
        <p class="text-sm text-muted">Showcase your contributions to the Alumni Connect community.</p>
    </div>
</div>

<?php if (isset($_GET['awarded'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Congratulations on earning a new badge!</div>
<?php endif; ?>

<div style="margin-bottom:40px;">
    <h3 style="font-size:1.2rem; font-weight:800; margin-bottom:20px; color:#0f172a; display:flex; align-items:center; gap:8px;">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#f59e0b" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
        Earned Badges
    </h3>
    
    <?php if (empty($earnedBadges)): ?>
        <div style="background:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px; padding:40px; text-align:center; color:#64748b;">
            <p>You haven't earned any badges yet. Participate in the community to start collecting them!</p>
        </div>
    <?php else: ?>
        <div style="display:flex; flex-wrap:wrap; gap:20px;">
            <?php foreach ($earnedBadges as $badge): ?>
                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:20px; width:200px; text-align:center; box-shadow:0 4px 6px -1px rgba(0,0,0,0.05); position:relative; overflow:hidden;">
                    <div style="position:absolute; top:-20px; right:-20px; width:60px; height:60px; background:#fef3c7; border-radius:50%; z-index:0;"></div>
                    <div style="position:relative; z-index:1;">
                        <div style="font-size:3rem; margin-bottom:12px;"><?= htmlspecialchars($badge->icon) ?></div>
                        <h4 style="font-size:1rem; font-weight:800; margin:0 0 8px 0; color:#0f172a;"><?= htmlspecialchars($badge->name) ?></h4>
                        <p style="font-size:0.8rem; color:#64748b; margin:0 0 12px 0;"><?= htmlspecialchars($badge->description) ?></p>
                        <span style="font-size:0.7rem; font-weight:600; color:#059669; background:#dcfce7; padding:4px 8px; border-radius:12px;">Earned <?= date('M Y', strtotime($badge->awarded_at)) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<div>
    <h3 style="font-size:1.2rem; font-weight:800; margin-bottom:20px; color:#0f172a; display:flex; align-items:center; gap:8px;">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        Available Badges
    </h3>
    
    <?php if (empty($unearnedBadges)): ?>
        <p style="color:#059669; font-weight:600;">You've earned all available badges! Incredible!</p>
    <?php else: ?>
        <div style="display:flex; flex-wrap:wrap; gap:20px;">
            <?php foreach ($unearnedBadges as $badge): ?>
                <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:20px; width:200px; text-align:center; opacity:0.7; filter:grayscale(100%);">
                    <div style="font-size:3rem; margin-bottom:12px;"><?= htmlspecialchars($badge->icon) ?></div>
                    <h4 style="font-size:1rem; font-weight:800; margin:0 0 8px 0; color:#0f172a;"><?= htmlspecialchars($badge->name) ?></h4>
                    <p style="font-size:0.8rem; color:#64748b; margin:0 0 12px 0;"><?= htmlspecialchars($badge->description) ?></p>
                    
                    <form action="/rewards/award" method="POST">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                        <input type="hidden" name="badge_id" value="<?= $badge->id ?>">
                        <button type="submit" style="background:#e2e8f0; border:none; padding:6px 12px; border-radius:4px; font-size:0.75rem; font-weight:700; color:#475569; cursor:pointer;">Claim (Test)</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
