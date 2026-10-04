<div class="mentorship-header">
<h1>Find Your Guide</h1>
<p>Connect with seasoned alumni who are ready to share their professional journey and help you navigate your career path.</p>
</div>

<div class="mentor-filters">
<button class="filter-pill active">All Mentors</button>
<button class="filter-pill">Product Design</button>
<button class="filter-pill">Engineering</button>
<button class="filter-pill">Marketing</button>
<button class="filter-pill with-icon">
    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
    More Filters
</button>
</div>

<div class="mentor-grid">
<?php if (!empty($mentors)): ?>
    <?php foreach ($mentors as $mentor): ?>
    <div class="mentor-card">
        <div class="mentor-cover">
        <span class="mentor-badge">ALUMNI '<?= date('y', strtotime($mentor->created_at)) ?></span>
        <img src="/assets/img/mentor_elena.png" alt="<?= htmlspecialchars($mentor->full_name) ?>" />
        </div>
        <div class="mentor-body">
        <div class="mentor-header">
            <h3><?= htmlspecialchars($mentor->full_name) ?></h3>
            <div class="mentor-rating">
            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            4.9
            </div>
        </div>
        <p class="mentor-role">Mentorship Volunteer</p>
        <div class="mentor-skills">
            <span class="mentor-skill-chip">LEADERSHIP</span>
            <span class="mentor-skill-chip">INDUSTRY EXPERT</span>
        </div>
        <form action="/mentorship/book" method="POST" style="margin:0;">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
            <input type="hidden" name="mentor_id" value="<?= $mentor->id ?>">
            <button type="submit" class="btn-book" style="width:100%;">Book Session</button>
        </form>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No mentors available at the moment.</p>
<?php endif; ?>
</div>
