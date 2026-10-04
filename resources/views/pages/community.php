<div class="content-scrollable">
    <div class="page-container">
        
        <div class="community-layout">
            
            <!-- CENTER: FEED COLUMN -->
            <div class="feed-column">
                
                <!-- Post Creation Box -->
                <div class="create-post-box">
                    <form action="/community/post" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                        <div style="display:flex; gap:16px; align-items:center;">
                            <img src="/assets/img/mentor_elena.png" alt="av" style="width:44px; height:44px; border-radius:50%; object-fit:cover;" />
                            <input type="text" name="content" required placeholder="Share an insight, milestone, or question with the alumni community..." style="flex:1; border:none; background:transparent; font-size:1rem; color:var(--color-text); outline:none;" />
                        </div>
                        
                        <div class="post-actions-row" style="margin-top: 15px;">
                            <div style="display:flex; gap:24px;">
                                <label class="post-action-item" style="cursor: pointer;">
                                    <input type="file" name="image" style="display: none;" accept="image/*">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" class="text-muted"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg> Media
                                </label>
                                <button type="button" class="post-action-item">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" class="text-muted"><path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/></svg> Poll
                                </button>
                                <button type="button" class="post-action-item">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" class="text-muted"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> Event
                                </button>
                            </div>
                            <button type="submit" class="btn-primary" style="background:#000; padding:8px 24px; font-size:0.85rem; border-radius:var(--radius-full);">Post</button>
                        </div>
                    </form>
                </div>

                <!-- Filter Tabs -->
                <div style="display:flex; gap:28px; border-bottom:1px solid var(--color-border); margin-bottom:24px; padding-bottom:12px;">
                    <span class="font-bold text-sm" style="color:var(--color-text); border-bottom:2px solid var(--color-text); padding-bottom:12px; margin-bottom:-13px; cursor:pointer;">All Posts</span>
                    <span class="font-semibold text-sm text-muted" style="cursor:pointer;">Mentorship Hub</span>
                    <span class="font-semibold text-sm text-muted" style="cursor:pointer;">Startup Network</span>
                    <span class="font-semibold text-sm text-muted" style="cursor:pointer;">Announcements</span>
                </div>

                <?php foreach ($posts as $post): ?>
                <!-- Feed Post -->
                <div class="feed-post-card">
                    <div class="post-author-header">
                        <img src="/assets/img/signup_side_img.png" style="object-position:top;" alt="av" />
                        <div style="flex:1;">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <h4 class="font-bold text-md mb-0"><?= htmlspecialchars($post->full_name) ?></h4>
                                <?php if ($post->role === 'mentor'): ?>
                                <span class="badge" style="background:#dcfce7; color:#15803d; font-size:0.65rem; padding:2px 8px;">MENTOR</span>
                                <?php endif; ?>
                            </div>
                            <p class="text-xs text-muted mb-0"><?= htmlspecialchars(date('M j, Y g:i A', strtotime($post->created_at))) ?></p>
                        </div>
                    </div>

                    <p class="text-sm mb-4" style="line-height:1.6; color:var(--color-text);">
                        <?= nl2br(htmlspecialchars($post->content)) ?>
                    </p>

                    <?php if ($post->image_url): ?>
                    <div style="border-radius:16px; overflow:hidden; margin-bottom:20px; max-height:400px;">
                        <img src="<?= htmlspecialchars($post->image_url) ?>" alt="post img" style="width:100%; object-fit:cover;" />
                    </div>
                    <?php endif; ?>

                    <div style="display:flex; justify-content:space-between; align-items:center; color:var(--color-text-muted); font-size:0.85rem;">
                        <div style="display:flex; gap:24px;">
                            <form action="/community/like" method="POST" style="margin:0;">
                                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                                <button type="submit" style="background:none; border:none; color:<?= $post->liked_by_me ? '#059669' : 'inherit' ?>; display:flex; align-items:center; gap:6px; cursor:pointer; padding:0;">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="<?= $post->liked_by_me ? 'currentColor' : 'none' ?>" stroke="currentColor"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg> 
                                    <?= $post->likes_count ?>
                                </button>
                            </form>
                            <span style="display:flex; align-items:center; gap:6px; cursor:pointer;">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg> 
                                <?= $post->comments_count ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <!-- RIGHT: WIDGETS COLUMN -->
            <div class="widgets-column">
                
                <!-- Spotlight Banner -->
                <div style="background:#0b1329; color:#fff; border-radius:var(--radius-lg); padding:28px;">
                    <span class="job-tag gold" style="font-size:0.65rem; margin-bottom:12px; display:inline-block;">SPOTLIGHT</span>
                    <h3 class="font-bold text-lg mb-2">Ready to pay it forward?</h3>
                    <p class="text-xs mb-6" style="color:rgba(255,255,255,0.8); line-height:1.6;">Join 400+ alumni already mentoring the next generation of leaders. Your experience is their map.</p>
                    <button class="btn-primary" style="background:var(--color-white); color:var(--color-primary); width:100%; padding:12px; font-size:0.9rem;">Become a Mentor</button>
                </div>

            </div>

        </div>

    </div>
</div>
