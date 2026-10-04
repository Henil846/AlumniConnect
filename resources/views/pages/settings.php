<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">Account Settings</h2>
    <p class="text-sm text-muted">Manage your preferences.</p>
</div>

<?php if (isset($_GET['saved'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Settings saved successfully!</div>
<?php endif; ?>

<div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:32px; max-width:600px;">
    <form action="/settings/update" method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
        
        <div style="margin-bottom:24px;">
            <h3 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin-bottom:16px;">Notifications</h3>
            <label style="display:flex; align-items:center; gap:12px; cursor:pointer;">
                <input type="checkbox" name="email_notifications" value="1" <?= (!isset($settings->email_notifications) || $settings->email_notifications == 1) ? 'checked' : '' ?> style="width:20px; height:20px; cursor:pointer;">
                <span style="font-weight:600; color:#334155;">Receive email notifications for messages and events</span>
            </label>
        </div>
        
        <div style="margin-bottom:32px;">
            <h3 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin-bottom:16px;">Privacy</h3>
            <label style="display:block; font-size:0.9rem; font-weight:700; color:#334155; margin-bottom:8px;">Profile Visibility</label>
            <select name="profile_visibility" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit;">
                <option value="public" <?= (isset($settings->profile_visibility) && $settings->profile_visibility === 'public') ? 'selected' : '' ?>>Public (Visible to all alumni)</option>
                <option value="hidden" <?= (isset($settings->profile_visibility) && $settings->profile_visibility === 'hidden') ? 'selected' : '' ?>>Hidden (Invisible in directory)</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:12px 24px; border-radius:8px; font-weight:700; cursor:pointer;">Save Changes</button>
    </form>
</div>
