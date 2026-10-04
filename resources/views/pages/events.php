<div class="content-scrollable">
    <div class="page-container">
        
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:40px;">
        <div>
            <h1 class="page-title">Heritage & Horizon</h1>
            <p class="page-subtitle mb-0">Connect with fellow alumni, attend exclusive workshops, and return to campus for memorable reunions.</p>
        </div>
        
        <!-- Toggle Pills -->
        <div style="background:#f1f5f9; padding:4px; border-radius:32px; display:flex;">
            <button class="btn-primary" style="background:#ffffff; color:var(--color-text); padding:12px 28px; border-radius:28px; box-shadow:0 2px 8px rgba(0,0,0,0.08); font-weight:700;">Upcoming</button>
            <button class="btn-cancel" style="background:transparent; border:none; padding:12px 24px; font-weight:600;">Registered (<?= count($registeredEventIds) ?>)</button>
        </div>
        </div>
        
        <form method="GET" action="/events" style="margin-bottom: 24px; display: flex; gap: 12px;">
            <div class="header-search" style="width: 420px; background:#f3f4f6; border-radius:var(--radius-full);">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Search events, mixers, workshops..." style="background:transparent; border:none; outline:none;" />
            </div>
            <button type="submit" class="btn-primary">Search</button>
        </form>

        <?php if (isset($_GET['registered'])): ?>
            <div style="background:#dcfce7; color:#15803d; padding:12px; border-radius:8px; margin-bottom:24px; font-weight:600; font-size:0.9rem;">
                Successfully RSVP'd to event!
            </div>
        <?php endif; ?>

        <!-- Events 3-Column Grid -->
        <div class="events-grid">
        
        <?php foreach($events as $event): 
            $isRegistered = in_array($event->id, $registeredEventIds);
            $eventDate = new DateTime($event->date);
        ?>
        <!-- Event -->
        <div class="event-card-modern">
            <div class="event-img-wrap">
            <img src="<?= htmlspecialchars($event->image_url) ?>" alt="ev" style="object-fit:cover;" />
            <div class="event-date-pill">
                <div class="mth"><?= strtoupper($eventDate->format('M')) ?></div>
                <div class="day"><?= $eventDate->format('d') ?></div>
            </div>
            </div>
            <div class="event-card-body">
            <div style="display:flex; gap:8px; align-items:center; margin-bottom:12px;">
                <span class="job-tag <?= $event->type == 'Networking' ? 'gold' : ($event->type == 'Workshop' ? 'green' : '') ?>" style="font-size:0.65rem;"><?= strtoupper(htmlspecialchars($event->type)) ?></span>
                <span class="text-xs text-muted">📍 <?= htmlspecialchars($event->location) ?></span>
            </div>
            <h3 class="font-bold text-lg mb-2" style="line-height:1.3;"><?= htmlspecialchars($event->title) ?></h3>
            <p class="text-xs text-muted mb-4" style="line-height:1.6; flex:1;"><?= htmlspecialchars($event->description) ?></p>
            
            <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--color-border); padding-top:16px;">
                <div class="avatar-stack">
                <img src="/assets/img/mentor_marcus.png" alt="a" />
                <img src="/assets/img/mentor_elena.png" alt="a" />
                <div style="width:28px; height:28px; border-radius:50%; background:#111827; color:#fff; display:flex; align-items:center; justify-content:center; font-size:0.6rem; margin-left:-8px;">+42</div>
                </div>
                <?php if ($isRegistered): ?>
                    <button class="btn-primary" style="background:#15803d; border-radius:var(--radius-full); padding:8px 20px; font-size:0.85rem;" disabled>RSVP'd ✓</button>
                <?php else: ?>
                    <form method="POST" action="/events/register" style="margin:0;">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                        <input type="hidden" name="event_id" value="<?= $event->id ?>">
                        <button type="submit" class="btn-primary" style="background:#000; border-radius:var(--radius-full); padding:8px 20px; font-size:0.85rem;">RSVP</button>
                    </form>
                <?php endif; ?>
            </div>
            </div>
        </div>
        <?php endforeach; ?>

        </div>

        <!-- Bottom Area: 2 Columns (Host Mixer & Statistics) -->
        <div class="layout-2col" style="margin-top: 40px;">
        
        <!-- Left Large Banner -->
        <div class="col-main" style="background:#0b1329; color:#fff; border-radius:var(--radius-lg); padding:48px; display:flex; flex-direction:column; justify-content:flex-end; position:relative; min-height:360px;">
            <div style="max-width:500px; z-index:2;">
            <h2 style="font-size:2.4rem; font-weight:800; line-height:1.2; margin-bottom:16px;">Host Your Own Regional Mixer</h2>
            <p style="font-size:1rem; color:rgba(255,255,255,0.8); line-height:1.6; margin-bottom:32px;">Leading a city chapter? Use our platform to organize local events, manage RSVPs, and receive alumni funding grants.</p>
            <button class="btn-primary" style="background:var(--color-accent); color:var(--color-primary); padding:12px 28px; font-size:1rem;">Get Started</button>
            </div>
        </div>

        <!-- Right Statistics Card -->
        <div class="col-side" style="background:var(--color-white); border:1px solid var(--color-border); border-radius:var(--radius-lg); padding:32px; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
            <h3 class="font-bold text-lg mb-2">Member Statistics</h3>
            <p class="text-xs text-muted mb-6" style="line-height:1.5;">Our community is growing faster than ever.</p>
            
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <span class="text-xs font-semibold text-muted">Active Monthly Events</span>
                <span class="font-bold text-md">124+</span>
            </div>
            <div style="height:6px; background:#e5e5e5; border-radius:3px; margin-bottom:20px;">
                <div style="width:75%; height:100%; background:var(--color-accent-dark); border-radius:3px;"></div>
            </div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <span class="text-xs font-semibold text-muted">RSVPs this Month</span>
                <span class="font-bold text-md">2,480</span>
            </div>
            <div style="height:6px; background:#e5e5e5; border-radius:3px; margin-bottom:32px;">
                <div style="width:55%; height:100%; background:#34d399; border-radius:3px;"></div>
            </div>
            </div>

            <!-- Gold badge card -->
            <div style="background:#f8fafc; border:1px solid var(--color-border); border-radius:12px; padding:16px; display:flex; gap:12px; align-items:center;">
            <div style="width:40px; height:40px; border-radius:8px; background:var(--color-accent); display:flex; align-items:center; justify-content:center; font-size:1.2rem; flex-shrink:0;">✨</div>
            <p class="text-xs text-muted" style="margin-bottom:0; line-height:1.4;">You've attended <?= count($registeredEventIds) ?> events this year. <strong style="color:var(--color-text);"><?= max(0, 5 - count($registeredEventIds)) ?> more for Gold status!</strong></p>
            </div>
        </div>

        </div>

    </div>
</div>
