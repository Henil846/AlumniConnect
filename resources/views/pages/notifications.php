<div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h2 class="font-bold text-xl mb-1">Notifications</h2>
        <p class="text-sm text-muted">Stay updated on your connections, events, and activities.</p>
    </div>
    <form action="/notifications/mark-all-read" method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
        <button type="submit" class="btn btn-primary" style="background:#f1f5f9; color:#0f172a; border:1px solid #cbd5e1; padding:10px 20px; border-radius:8px; cursor:pointer; font-weight:600;">Mark All as Read</button>
    </form>
</div>

<div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden;">
    <?php if (empty($notifications)): ?>
        <div style="padding:40px; text-align:center; color:var(--color-text-muted);">
            <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="#cbd5e1" stroke-width="2" style="margin:0 auto 16px auto; display:block;"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            <h3 style="font-size:1.1rem; font-weight:700; margin-bottom:8px; color:#1e293b;">You're all caught up!</h3>
            <p>No new notifications at this time.</p>
        </div>
    <?php else: ?>
        <ul style="list-style:none; padding:0; margin:0;">
            <?php foreach ($notifications as $notification): ?>
                <li style="display:flex; align-items:flex-start; gap:16px; padding:20px; border-bottom:1px solid var(--color-border); <?= $notification->is_read ? 'background:#fff;' : 'background:#f8fafc;' ?>">
                    <div style="width:48px; height:48px; border-radius:50%; background:#e0e7ff; color:#3730a3; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <?php if ($notification->type === 'event'): ?>
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <?php elseif ($notification->type === 'message'): ?>
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        <?php else: ?>
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <?php endif; ?>
                    </div>
                    
                    <div style="flex:1;">
                        <p style="margin:0 0 8px 0; color:#0f172a; font-size:1rem; line-height:1.5;">
                            <?php if (!$notification->is_read): ?>
                                <span style="display:inline-block; width:8px; height:8px; background:#2563eb; border-radius:50%; margin-right:8px; vertical-align:middle;"></span>
                            <?php endif; ?>
                            <?= htmlspecialchars($notification->message) ?>
                        </p>
                        <span style="font-size:0.8rem; color:#64748b;"><?= date('M j, g:i a', strtotime($notification->created_at)) ?></span>
                    </div>
                    
                    <?php if (!$notification->is_read): ?>
                        <form action="/notifications/mark-read" method="POST">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                            <input type="hidden" name="id" value="<?= $notification->id ?>">
                            <button type="submit" style="background:none; border:none; color:#2563eb; font-weight:600; cursor:pointer; font-size:0.9rem;">Mark Read</button>
                        </form>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
