<!-- SCROLLABLE CONTENT -->
      <div style="padding: 32px 40px; flex: 1; max-width:960px;">
        
        <!-- Page Title -->
        <h1 style="font-size:2.2rem; font-weight:800; color:#0f172a; margin:0 0 8px; letter-spacing:-0.02em;">Settings</h1>
        <p style="font-size:0.95rem; color:#64748b; margin:0 0 28px; line-height:1.5; max-width:620px;">
          Manage your administrative preferences, security protocols, and system notifications to ensure optimal platform performance.
        </p>

        <!-- Horizontal Tabs -->
        <div style="display:flex; gap:36px; border-bottom:1px solid #cbd5e1; margin-bottom:28px;">
          <span data-tab="privacy" style="font-size:0.9rem; font-weight:700; color:#64748b; padding-bottom:12px; cursor:pointer;">Privacy</span>
          <span data-tab="security" style="font-size:0.9rem; font-weight:700; color:#64748b; padding-bottom:12px; cursor:pointer;">Security</span>
          <span data-tab="password" style="font-size:0.9rem; font-weight:700; color:#64748b; padding-bottom:12px; cursor:pointer;">Password</span>
          <span data-tab="notifications" style="font-size:0.9rem; font-weight:800; color:#0f172a; padding-bottom:12px; border-bottom:2px solid #b45309; margin-bottom:-1px; cursor:pointer;">Notifications</span>
          <span data-tab="language" style="font-size:0.9rem; font-weight:700; color:#64748b; padding-bottom:12px; cursor:pointer;">Language</span>
          <span data-tab="theme" style="font-size:0.9rem; font-weight:700; color:#64748b; padding-bottom:12px; cursor:pointer;">Theme</span>
        </div>

        <!-- Section 1: System Alerts -->
        <div class="admin-card" style="margin-bottom:28px;">
          <h3 style="font-size:1.25rem; font-weight:800; margin:0 0 4px; color:#0f172a;">System Alerts</h3>
          <p style="font-size:0.85rem; color:#64748b; margin:0 0 12px;">Configure how you receive critical system updates and administrative alerts.</p>

          <!-- Row 1 -->
          <div class="toggle-switch-row">
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:40px; height:40px; border-radius:10px; background:#e0e7ff; color:#3730a3; display:flex; align-items:center; justify-content:center;">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
              </div>
              <div>
                <div style="font-weight:800; font-size:0.95rem; color:#0f172a;">Push Notifications</div>
                <div style="font-size:0.8rem; color:#64748b;">Receive instant browser alerts for system events.</div>
              </div>
            </div>
            <div class="switch-btn" onclick="this.classList.toggle('off')"></div>
          </div>

          <!-- Row 2 -->
          <div class="toggle-switch-row">
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; color:#b45309; display:flex; align-items:center; justify-content:center;">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              </div>
              <div>
                <div style="font-weight:800; font-size:0.95rem; color:#0f172a;">Email Alerts</div>
                <div style="font-size:0.8rem; color:#64748b;">Get digest and critical updates delivered to your inbox.</div>
              </div>
            </div>
            <div class="switch-btn" onclick="this.classList.toggle('off')"></div>
          </div>

          <!-- Row 3 -->
          <div class="toggle-switch-row" style="border-bottom:none; padding-bottom:0;">
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; color:#15803d; display:flex; align-items:center; justify-content:center;">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>
              <div>
                <div style="font-weight:800; font-size:0.95rem; color:#0f172a;">Event Reminders</div>
                <div style="font-size:0.8rem; color:#64748b;">Sync institutional events with your administrative calendar.</div>
              </div>
            </div>
            <div class="switch-btn off" onclick="this.classList.toggle('off')"></div>
          </div>

        </div>

        <!-- Section 2: Growth & Engagement -->
        <div class="admin-card" style="margin-bottom:28px;">
          <h3 style="font-size:1.25rem; font-weight:800; margin:0 0 4px; color:#0f172a;">Growth & Engagement</h3>
          <p style="font-size:0.85rem; color:#64748b; margin:0 0 12px;">Control notifications related to community growth and mentorship matching.</p>

          <!-- Row 1 -->
          <div class="toggle-switch-row">
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:40px; height:40px; border-radius:10px; background:#e0e7ff; color:#3730a3; display:flex; align-items:center; justify-content:center;">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
              </div>
              <div>
                <div style="font-weight:800; font-size:0.95rem; color:#0f172a;">Referral Updates</div>
                <div style="font-size:0.8rem; color:#64748b;">Track new member onboardings and referral milestones.</div>
              </div>
            </div>
            <div class="switch-btn" onclick="this.classList.toggle('off')"></div>
          </div>

          <!-- Row 2 -->
          <div class="toggle-switch-row">
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; color:#b45309; display:flex; align-items:center; justify-content:center;">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
              </div>
              <div>
                <div style="font-weight:800; font-size:0.95rem; color:#0f172a;">Mentorship Reminders</div>
                <div style="font-size:0.8rem; color:#64748b;">Alerts for pending mentor-mentee pairing requests.</div>
              </div>
            </div>
            <div class="switch-btn" onclick="this.classList.toggle('off')"></div>
          </div>

          <!-- Row 3 -->
          <div class="toggle-switch-row" style="border-bottom:none; padding-bottom:0;">
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; color:#15803d; display:flex; align-items:center; justify-content:center;">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
              </div>
              <div>
                <div style="font-weight:800; font-size:0.95rem; color:#0f172a;">Job Alerts</div>
                <div style="font-size:0.8rem; color:#64748b;">Notifications for premium career opportunities posted on the board.</div>
              </div>
            </div>
            <div class="switch-btn off" onclick="this.classList.toggle('off')"></div>
          </div>

        </div>

        <!-- Section 3: Theme Personalization -->
        <div class="admin-card" style="margin-bottom:32px;">
          <h3 style="font-size:1.25rem; font-weight:800; margin:0 0 4px; color:#0f172a;">Theme Personalization</h3>
          <p style="font-size:0.85rem; color:#64748b; margin:0 0 20px;">Customize the platform's visual interface to suit your environmental preference.</p>

          <!-- Two Theme Option Cards -->
          <div class="admin-row-1-1" style="margin-bottom:0;">
            
            <!-- Light Theme (Active) -->
            <div style="border:2px solid #b45309; border-radius:16px; padding:16px; background:#ffffff; cursor:pointer;">
              <div style="background:#f8fafc; border:1px solid #e2e8f0; height:140px; border-radius:12px; padding:14px; display:flex; flex-direction:column; justify-content:space-between; margin-bottom:12px; position:relative;">
                <div style="display:flex; gap:8px; align-items:center;">
                  <div style="width:14px; height:14px; border-radius:50%; background:#0f172a;"></div>
                  <div style="width:40px; height:6px; background:#cbd5e1; border-radius:3px;"></div>
                </div>
                <div style="height:24px; background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; width:70%;"></div>
                <div style="height:32px; background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; width:100%;"></div>
                <span style="position:absolute; bottom:10px; right:10px; color:#b45309;">
                  <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                </span>
              </div>
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <span style="font-weight:800; color:#0f172a;">Collegiate Light</span>
                <span style="font-size:0.75rem; font-weight:800; color:#b45309;">Active</span>
              </div>
            </div>

            <!-- Dark Theme Option -->
            <div style="border:1px solid #cbd5e1; border-radius:16px; padding:16px; background:#ffffff; cursor:pointer;">
              <div style="background:#334155; height:140px; border-radius:12px; padding:14px; margin-bottom:12px;">
                <div style="width:16px; height:16px; border-radius:50%; background:#cbd5e1;"></div>
              </div>
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <span style="font-weight:800; color:#0f172a;">Midnight Academy</span>
                <span style="font-size:0.8rem; font-weight:700; color:#64748b;">Apply</span>
              </div>
            </div>

          </div>
        </div>

        <!-- Bottom Actions -->
        <div style="display:flex; justify-content:flex-end; align-items:center; gap:24px;">
          <a href="#" style="font-size:0.9rem; font-weight:700; color:#64748b; text-decoration:none;">Discard Changes</a>
          <button class="admin-btn-black" style="width:auto; padding:14px 28px;">Save Preferences</button>
        </div>

      </div>

      