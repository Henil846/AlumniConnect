<div class="page-header">
    <div class="header-content">
        <h1>Global Search</h1>
        <p>Find alumni, jobs, events, and more across your college.</p>
    </div>
</div>

<div class="search-container">
    <form action="/search" method="GET" class="search-form" style="margin-bottom: 2rem; display: flex; gap: 1rem;">
        <input type="text" name="q" value="<?= htmlspecialchars($query) ?>" placeholder="Search..." required class="form-input" style="flex: 1; padding: 0.75rem; border-radius: 8px; border: 1px solid var(--border-color);">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php if (!empty($query)): ?>
        <h2 style="margin-bottom: 1.5rem;">Results for "<?= htmlspecialchars($query) ?>"</h2>

        <div class="search-results-grid" style="display: flex; flex-direction: column; gap: 2rem;">
            
            <!-- ALUMNI -->
            <div class="result-section">
                <h3>Alumni</h3>
                <?php if(empty($results['alumni'])): ?>
                    <p class="text-muted">No alumni found.</p>
                <?php else: ?>
                    <div class="results-list" style="display: grid; gap: 1rem;">
                        <?php foreach($results['alumni'] as $alumni): ?>
                            <div class="card" style="padding: 1rem; border: 1px solid var(--border-color); border-radius: 8px;">
                                <h4><?= htmlspecialchars($alumni->full_name) ?></h4>
                                <p class="text-muted"><?= htmlspecialchars($alumni->department) ?> • <?= htmlspecialchars($alumni->role) ?></p>
                                <a href="/profile-view?id=<?= $alumni->id ?>" class="btn btn-sm btn-outline">View Profile</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- JOBS -->
            <div class="result-section">
                <h3>Jobs</h3>
                <?php if(empty($results['jobs'])): ?>
                    <p class="text-muted">No jobs found.</p>
                <?php else: ?>
                    <div class="results-list" style="display: grid; gap: 1rem;">
                        <?php foreach($results['jobs'] as $job): ?>
                            <div class="card" style="padding: 1rem; border: 1px solid var(--border-color); border-radius: 8px;">
                                <h4><?= htmlspecialchars($job->title) ?></h4>
                                <p class="text-muted"><?= htmlspecialchars($job->company) ?> • <?= htmlspecialchars($job->location) ?></p>
                                <a href="/jobs" class="btn btn-sm btn-outline">View Job</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- EVENTS -->
            <div class="result-section">
                <h3>Events</h3>
                <?php if(empty($results['events'])): ?>
                    <p class="text-muted">No events found.</p>
                <?php else: ?>
                    <div class="results-list" style="display: grid; gap: 1rem;">
                        <?php foreach($results['events'] as $event): ?>
                            <div class="card" style="padding: 1rem; border: 1px solid var(--border-color); border-radius: 8px;">
                                <h4><?= htmlspecialchars($event->title) ?></h4>
                                <p class="text-muted"><?= htmlspecialchars(date('M d, Y', strtotime($event->date))) ?> • <?= htmlspecialchars($event->location) ?></p>
                                <a href="/events" class="btn btn-sm btn-outline">View Event</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- MARKETPLACE -->
            <div class="result-section">
                <h3>Marketplace</h3>
                <?php if(empty($results['marketplace'])): ?>
                    <p class="text-muted">No marketplace items found.</p>
                <?php else: ?>
                    <div class="results-list" style="display: grid; gap: 1rem;">
                        <?php foreach($results['marketplace'] as $item): ?>
                            <div class="card" style="padding: 1rem; border: 1px solid var(--border-color); border-radius: 8px;">
                                <h4><?= htmlspecialchars($item->title) ?></h4>
                                <p class="text-muted">₹<?= number_format($item->price) ?> • <?= htmlspecialchars(ucfirst($item->category)) ?></p>
                                <a href="/marketplace" class="btn btn-sm btn-outline">View Item</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    <?php endif; ?>
</div>
