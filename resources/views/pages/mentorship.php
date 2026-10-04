
<style>
/* Embedded from mentorship.css */
/* ===========================
   Mentorship Page Styles
   =========================== */

.mentorship-header {
  margin-bottom: 32px;
}
.mentorship-header h1 {
  font-size: 2.5rem;
  font-weight: 800;
  margin-bottom: 12px;
  letter-spacing: -0.03em;
}
.mentorship-header p {
  font-size: 1rem;
  color: var(--color-text-muted);
  max-width: 600px;
  line-height: 1.5;
}

.mentor-filters {
  display: flex;
  gap: 12px;
  margin-bottom: 32px;
  flex-wrap: wrap;
}

.filter-pill {
  padding: 8px 16px;
  border-radius: var(--radius-full);
  font-size: 0.85rem;
  font-weight: 600;
  border: 1px solid var(--color-border);
  background: var(--color-input-bg);
  color: var(--color-text);
  cursor: pointer;
  transition: var(--transition);
}
.filter-pill:hover { background: var(--color-border); }
.filter-pill.active { background: var(--color-text); color: var(--color-white); border-color: var(--color-text); }
.filter-pill.with-icon { display: flex; align-items: center; gap: 6px; }

/* ---- Mentor Cards Grid ---- */
.mentor-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 24px;
}

.mentor-card {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.mentor-cover {
  height: 160px;
  width: 100%;
  position: relative;
}
.mentor-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.mentor-badge {
  position: absolute;
  top: 12px;
  left: 12px;
  background: var(--color-accent);
  color: var(--color-primary);
  font-size: 0.7rem;
  font-weight: 700;
  padding: 4px 8px;
  border-radius: var(--radius-sm);
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.mentor-body {
  padding: 20px;
  display: flex;
  flex-direction: column;
  flex: 1;
}

.mentor-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 8px;
}
.mentor-header h3 {
  font-size: 1.15rem;
  font-weight: 700;
  line-height: 1.2;
}

.mentor-rating {
  display: flex;
  align-items: center;
  gap: 4px;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-primary);
}
.mentor-rating svg { width: 14px; height: 14px; fill: var(--color-accent); color: var(--color-accent); }

.mentor-role {
  font-size: 0.85rem;
  color: var(--color-text-muted);
  margin-bottom: 16px;
  line-height: 1.4;
  flex: 1;
}

.mentor-skills {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 20px;
}
.mentor-skill-chip {
  padding: 4px 8px;
  background: var(--color-bg);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  font-size: 0.7rem;
  font-weight: 600;
  color: var(--color-text-muted);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.btn-book {
  width: 100%;
  padding: 12px;
  background: var(--color-text);
  color: var(--color-white);
  border: none;
  border-radius: var(--radius-full);
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
}
.btn-book:hover { background: var(--color-primary); }

</style>
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
