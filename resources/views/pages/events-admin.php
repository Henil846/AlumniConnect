<div class="content-scrollable">
    <div class="page-container">
        
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px;">
        <div>
            <h1 class="page-title">Events Admin Console</h1>
            <p class="page-subtitle mb-0">Organize and track alumni engagements from a single dashboard.</p>
        </div>
        <div style="display:flex; gap:12px;">
            <form method="GET" action="/events-admin" style="display:flex; align-items:center; gap:8px;">
                <select name="event_id" class="form-input" onchange="this.form.submit()" style="background:#f8fafc; border:1px solid var(--color-border); padding:10px 16px; border-radius:12px; min-width:250px;">
                    <?php foreach($events as $event): ?>
                        <option value="<?= $event->id ?>" <?= $selectedEvent && $selectedEvent->id == $event->id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($event->title) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div style="background:#dcfce7; color:#15803d; padding:12px; border-radius:8px; margin-bottom:24px; font-weight:600;">
                <?= htmlspecialchars($_GET['success']) ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div style="background:#fee2e2; color:#b91c1c; padding:12px; border-radius:8px; margin-bottom:24px; font-weight:600;">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <?php if ($selectedEvent): ?>
        <div class="admin-grid-layout" style="display:grid; grid-template-columns: 1fr 2fr; gap: 32px;">
        
        <!-- LEFT PANEL: Uploads & Stats -->
        <div class="col-form-panel">
            <div class="form-box-card" style="background:var(--color-white); border:1px solid var(--color-border); border-radius:var(--radius-lg); padding:24px; margin-bottom:24px;">
                <div class="form-box-header" style="font-weight:800; font-size:1.2rem; margin-bottom:16px;">
                    Event Details
                </div>
                <div class="mb-4">
                    <p><strong>Capacity:</strong> <?= htmlspecialchars($selectedEvent->capacity) ?></p>
                    <p><strong>Total Registered:</strong> <?= count($registrations) ?></p>
                    <p><strong>Date:</strong> <?= htmlspecialchars($selectedEvent->date) ?></p>
                </div>
            </div>

            <!-- QR Check-in Form -->
            <div class="form-box-card" style="background:var(--color-white); border:1px solid var(--color-border); border-radius:var(--radius-lg); padding:24px; margin-bottom:24px;">
                <h3 class="font-bold text-lg mb-4">QR Check-In</h3>
                <form method="POST" action="/events-admin/checkin">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                    <div class="form-group mb-4">
                        <label class="form-label" style="font-size:0.8rem; font-weight:700;">Scan or Enter QR Code Hash</label>
                        <input type="text" name="qr_code" class="form-input" placeholder="Enter QR hash..." style="background:#f8fafc; border:1px solid var(--color-border);" required />
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;">Check-In Attendee</button>
                </form>
            </div>

            <!-- Event Gallery Upload -->
            <div class="form-box-card" style="background:var(--color-white); border:1px solid var(--color-border); border-radius:var(--radius-lg); padding:24px;">
                <h3 class="font-bold text-lg mb-4">Event Gallery</h3>
                <form method="POST" action="/events-admin/upload-gallery" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                    <input type="hidden" name="event_id" value="<?= $selectedEvent->id ?>">
                    <div class="form-group mb-4">
                        <input type="file" name="gallery_image" class="form-input" accept="image/jpeg,image/png,image/gif" required />
                        <div class="text-xs text-muted" style="margin-top:4px;">PNG, JPG up to 5MB</div>
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;">Upload Image</button>
                </form>
                
                <?php if (count($gallery) > 0): ?>
                <div style="margin-top: 24px; display:grid; grid-template-columns: 1fr 1fr; gap:12px;">
                    <?php foreach($gallery as $img): ?>
                        <img src="/gallery?file=<?= urlencode($img->file_path) ?>" style="width:100%; height:80px; object-fit:cover; border-radius:8px; border:1px solid var(--color-border);" />
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- RIGHT PANEL: Registrations List -->
        <div class="col-list-panel">
            
            <div class="table-list-container" style="background:var(--color-white); border:1px solid var(--color-border); border-radius:var(--radius-lg); overflow:hidden;">
            
            <!-- Table Header Controls -->
            <div style="padding:24px; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid var(--color-border);">
                <div>
                <h2 style="font-size:1.4rem; font-weight:800; margin-bottom:4px;">Registrations</h2>
                <p class="text-xs text-muted mb-0"><?= count($registrations) ?> total registrants</p>
                </div>
            </div>

            <div class="table-column-labels" style="display:flex; padding:12px 24px; background:#f8fafc; border-bottom:1px solid var(--color-border); font-size:0.75rem; font-weight:800; color:var(--color-text-muted); letter-spacing:0.05em;">
                <div style="flex:3;">ALUMNI NAME</div>
                <div style="flex:2;">QR HASH</div>
                <div style="flex:1;">STATUS</div>
                <div style="flex:1; text-align:right;">ACTION</div>
            </div>

            <?php foreach($registrations as $reg): ?>
            <div class="table-item-row" style="display:flex; padding:16px 24px; border-bottom:1px solid var(--color-border); align-items:center;">
                <div style="flex:3; display:flex; gap:12px; align-items:center;">
                <img src="/assets/img/mentor_marcus.png" alt="av" style="width:44px; height:44px; border-radius:50%; object-fit:cover;" />
                <div>
                    <h4 class="font-bold text-md mb-1"><?= htmlspecialchars($reg->full_name) ?></h4>
                    <p class="text-xs text-muted mb-0"><?= htmlspecialchars($reg->email) ?></p>
                </div>
                </div>
                <div style="flex:2; font-family:monospace; font-size:0.8rem; color:var(--color-text-muted);">
                    <?= substr($reg->qr_code, 0, 16) ?>...
                </div>
                <div style="flex:1;">
                <?php if ($reg->status === 'attended'): ?>
                    <span class="badge badge-approved" style="background:#dcfce7; color:#15803d; padding:4px 10px; border-radius:12px; font-weight:700; font-size:0.75rem;">Attended</span>
                <?php else: ?>
                    <span class="badge" style="background:#fff7ed; color:#c2410c; padding:4px 10px; border-radius:12px; font-weight:700; font-size:0.75rem;">Registered</span>
                <?php endif; ?>
                </div>
                <div style="flex:1; text-align:right;">
                    <?php if ($reg->status === 'attended'): ?>
                        <a href="/events-admin/certificate?reg_id=<?= $reg->id ?>" target="_blank" class="btn-primary" style="background:rgba(245, 166, 35, 0.25); color:var(--color-primary); border:1px solid rgba(245, 166, 35, 0.4); font-weight:700; padding:6px 12px; border-radius:6px; font-size:0.75rem; text-decoration:none;">Certificate</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            
            <?php if (count($registrations) === 0): ?>
                <div style="padding:32px; text-align:center; color:var(--color-text-muted);">No registrations yet.</div>
            <?php endif; ?>

            </div>

        </div>

        </div>
        <?php endif; ?>

    </div>
</div>
