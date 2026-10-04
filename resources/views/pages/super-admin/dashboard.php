<!-- SCROLLABLE DASHBOARD -->
      <div style="padding: 32px 40px; flex: 1;">
        
          <!-- 4 STAT CARDS -->
          <div class="admin-stats-grid">

            <!-- Stat 1 -->
            <a href="super-admin-institutions.html" class="admin-stat-card" style="text-decoration:none; color:inherit; cursor:pointer;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
              <div class="stat-icon-box" style="background:#0f172a; color:#fff;">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
              </div>
              <div>
                <div class="stat-label">Total Students</div>
                <div class="stat-val">12,450</div>
              </div>
              <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                +3.2% vs last year
              </div>
            </a>

            <!-- Stat 2 -->
            <a href="super-admin-institutions.html" class="admin-stat-card" style="text-decoration:none; color:inherit; cursor:pointer;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
              <div class="stat-icon-box" style="background:#fef3c7; color:#b45309;">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
              </div>
              <div>
                <div class="stat-label">Alumni</div>
                <div class="stat-val">45,200</div>
              </div>
              <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                840 New this month
              </div>
            </a>

            <!-- Stat 3 -->
            <a href="job-board-management.html" class="admin-stat-card" style="text-decoration:none; color:inherit; cursor:pointer;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
              <div class="stat-icon-box" style="background:#f1f5f9; color:#475569;">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
              </div>
              <div>
                <div class="stat-label">Active Jobs</div>
                <div class="stat-val">124</div>
              </div>
              <div style="font-size:0.82rem; color:#64748b; font-weight:600; display:flex; align-items:center; gap:6px;">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                12 Expiring soon
              </div>
            </a>

            <!-- Stat 4 (Dark Card) -->
            <a href="super-admin-analytics.html" class="admin-stat-card dark-card" style="text-decoration:none; cursor:pointer;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
              <div class="stat-icon-box" style="background:#b45309; color:#fff;">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
              </div>
              <div>
                <div class="stat-label" style="color:rgba(255,255,255,0.7);">Placements</div>
                <div class="stat-val">85%</div>
              </div>
              <div style="font-size:0.82rem; color:#34d399; font-weight:700; display:flex; align-items:center; gap:6px;">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                Goal exceeded
              </div>
            </a>

          </div>

        <!-- MAIN 2-COLUMN DASHBOARD GRID -->
        <div class="admin-row-2-1">
          
          <!-- LEFT COLUMN -->
          <div style="display:flex; flex-direction:column; gap:24px;">
            
            <!-- Pending Verifications Table -->
            <div class="admin-card">
              <div class="admin-card-header">
                <div>
                  <h3 class="admin-card-title">Pending Verifications</h3>
                  <p class="admin-card-subtitle">Review identity requests from recent graduates.</p>
                </div>
                <a href="super-admin-institutions.html" style="color:#b45309; font-weight:800; font-size:0.85rem; text-decoration:none;">View All</a>
              </div>

              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Name & Profile</th>
                    <th>Batch</th>
                    <th>Department</th>
                    <th style="text-align:right;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Row 1 -->
                  <tr>
                    <td>
                      <div style="display:flex; align-items:center; gap:12px;">
                        <img src="mentor_marcus.png" alt="E" style="width:40px; height:40px; border-radius:50%; object-fit:cover;" />
                        <div>
                          <div style="font-weight:800; color:#0f172a;">Ethan Caldwell</div>
                          <div style="font-size:0.75rem; color:#64748b;">ID: #ST-9921</div>
                        </div>
                      </div>
                    </td>
                    <td style="font-weight:700;">Class of 2023</td>
                    <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600; color:#475569;">Computer Science</span></td>
                    <td style="text-align:right;">
                      <button class="badge-verify">Verify</button>
                      <button class="badge-decline">Decline</button>
                    </td>
                  </tr>
                  <!-- Row 2 -->
                  <tr>
                    <td>
                      <div style="display:flex; align-items:center; gap:12px;">
                        <img src="signup_side_img.png" alt="M" style="width:40px; height:40px; border-radius:50%; object-fit:cover; object-position:top;" />
                        <div>
                          <div style="font-weight:800; color:#0f172a;">Maya Rodriguez</div>
                          <div style="font-size:0.75rem; color:#64748b;">ID: #AL-4412</div>
                        </div>
                      </div>
                    </td>
                    <td style="font-weight:700;">Class of 2018</td>
                    <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600; color:#475569;">Architecture</span></td>
                    <td style="text-align:right;">
                      <button class="badge-verify">Verify</button>
                      <button class="badge-decline">Decline</button>
                    </td>
                  </tr>
                  <!-- Row 3 -->
                  <tr>
                    <td>
                      <div style="display:flex; align-items:center; gap:12px;">
                        <img src="login_side_img.png" alt="J" style="width:40px; height:40px; border-radius:50%; object-fit:cover;" />
                        <div>
                          <div style="font-weight:800; color:#0f172a;">Jordan Wu</div>
                          <div style="font-size:0.75rem; color:#64748b;">ID: #ST-8854</div>
                        </div>
                      </div>
                    </td>
                    <td style="font-weight:700;">Class of 2024</td>
                    <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600; color:#475569;">Business Mgmt</span></td>
                    <td style="text-align:right;">
                      <button class="badge-verify">Verify</button>
                      <button class="badge-decline">Decline</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Recent Donations Card -->
            <div class="admin-card">
              <h3 class="admin-card-title" style="margin-bottom:20px;">Recent Donations</h3>
              <div style="display:flex; flex-direction:column; gap:16px;">
                
                <div style="display:flex; justify-content:space-between; align-items:center; padding-bottom:14px; border-bottom:1px solid #f1f5f9;">
                  <div style="display:flex; align-items:center; gap:14px;">
                    <span style="background:#fef3c7; color:#b45309; width:38px; height:38px; border-radius:10px; display:flex; align-items:center; justify-content:center;">💵</span>
                    <span style="font-size:1.2rem; font-weight:900; color:#0f172a;">$5,000.00</span>
                  </div>
                  <span style="font-weight:600; color:#64748b;">Endowment Fund</span>
                  <span class="pill-status-active">Processed</span>
                </div>

                <div style="display:flex; justify-content:space-between; align-items:center; padding-bottom:14px; border-bottom:1px solid #f1f5f9;">
                  <div style="display:flex; align-items:center; gap:14px;">
                    <span style="background:#fef3c7; color:#b45309; width:38px; height:38px; border-radius:10px; display:flex; align-items:center; justify-content:center;">💵</span>
                    <span style="font-size:1.2rem; font-weight:900; color:#0f172a;">$1,250.00</span>
                  </div>
                  <span style="font-weight:600; color:#64748b;">Tech Center Grant</span>
                  <span class="pill-status-active">Processed</span>
                </div>

                <div style="display:flex; justify-content:space-between; align-items:center;">
                  <div style="display:flex; align-items:center; gap:14px;">
                    <span style="background:#fef3c7; color:#b45309; width:38px; height:38px; border-radius:10px; display:flex; align-items:center; justify-content:center;">💵</span>
                    <span style="font-size:1.2rem; font-weight:900; color:#0f172a;">$350.00</span>
                  </div>
                  <span style="font-weight:600; color:#64748b;">Sports Scholarship</span>
                  <span style="background:#e2e8f0; color:#475569; font-size:0.72rem; font-weight:800; padding:4px 12px; border-radius:20px;">Pending</span>
                </div>

              </div>
            </div>

          </div>

          <!-- RIGHT COLUMN -->
          <div style="display:flex; flex-direction:column; gap:24px;">
            
            <!-- Dashboard Guide Card -->
            <div class="guide-card">
              <h3 style="font-size:1.25rem; font-weight:800; color:#0f172a; margin:0 0 12px;">Dashboard Guide</h3>
              <p style="font-size:0.9rem; color:#334155; line-height:1.5; margin:0 0 20px;">
                Welcome back, Admin. You have <strong style="color:#0f172a;">12 pending verifications</strong> and <strong style="color:#0f172a;">3 donation goals</strong> nearing completion.
              </p>
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <button style="background:#ffffff; border:1px solid #fef08a; padding:12px; border-radius:12px; font-weight:700; font-size:0.82rem; color:#0f172a; display:flex; align-items:center; justify-content:center; gap:8px; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.04);">
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                  Announcements
                </button>
                <button style="background:#ffffff; border:1px solid #fef08a; padding:12px; border-radius:12px; font-weight:700; font-size:0.82rem; color:#0f172a; display:flex; align-items:center; justify-content:center; gap:8px; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.04);" onclick="window.location.href='super-admin-revenue.html'">
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                  Export Reports
                </button>
              </div>
            </div>

            <!-- PENDING ACTIONS CARD -->
            <div class="admin-card">
              <div class="admin-card-header" style="margin-bottom:16px;">
                <div>
                  <h3 class="admin-card-title">Pending Actions</h3>
                  <p class="admin-card-subtitle">Items that require your attention.</p>
                </div>
              </div>
              <div style="display:flex; flex-direction:column; gap:10px;">
                <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:12px; border:1px solid #fef9c3; background:#fefce8;">
                  <div style="width:36px; height:36px; border-radius:10px; background:#fef3c7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#b45309" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                  </div>
                  <div style="flex:1;">
                    <div style="font-size:0.85rem; font-weight:700; color:#0f172a;">Alumni Verifications Pending</div>
                    <div style="font-size:0.72rem; color:#64748b;">New alumni awaiting identity verification</div>
                  </div>
                  <span style="background:#fef3c7; color:#b45309; font-size:0.7rem; font-weight:900; padding:3px 10px; border-radius:20px; flex-shrink:0;">12</span>
                  <a href="super-admin-institutions.html" style="background:#0f172a; color:#fff; font-size:0.72rem; font-weight:700; padding:6px 12px; border-radius:8px; text-decoration:none; flex-shrink:0;">View</a>
                </div>
                <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:12px; border:1px solid #fecdd3; background:#fff1f2;">
                  <div style="width:36px; height:36px; border-radius:10px; background:#fee2e2; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#dc2626" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                  </div>
                  <div style="flex:1;">
                    <div style="font-size:0.85rem; font-weight:700; color:#0f172a;">Events Awaiting Approval</div>
                    <div style="font-size:0.72rem; color:#64748b;">Submitted events not yet published</div>
                  </div>
                  <span style="background:#fee2e2; color:#dc2626; font-size:0.7rem; font-weight:900; padding:3px 10px; border-radius:20px; flex-shrink:0;">3</span>
                  <a href="events-admin.html" style="background:#0f172a; color:#fff; font-size:0.72rem; font-weight:700; padding:6px 12px; border-radius:8px; text-decoration:none; flex-shrink:0;">View</a>
                </div>
                <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:12px; border:1px solid #e0e7ff; background:#eef2ff;">
                  <div style="width:36px; height:36px; border-radius:10px; background:#e0e7ff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#3730a3" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                  </div>
                  <div style="flex:1;">
                    <div style="font-size:0.85rem; font-weight:700; color:#0f172a;">Mentorship Requests</div>
                    <div style="font-size:0.72rem; color:#64748b;">Unmatched student mentor requests</div>
                  </div>
                  <span style="background:#e0e7ff; color:#3730a3; font-size:0.7rem; font-weight:900; padding:3px 10px; border-radius:20px; flex-shrink:0;">7</span>
                  <a href="mentorship-dashboard.html" style="background:#0f172a; color:#fff; font-size:0.72rem; font-weight:700; padding:6px 12px; border-radius:8px; text-decoration:none; flex-shrink:0;">View</a>
                </div>
                <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:12px; border:1px solid #dcfce7; background:#f0fdf4;">
                  <div style="width:36px; height:36px; border-radius:10px; background:#dcfce7; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#15803d" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                  </div>
                  <div style="flex:1;">
                    <div style="font-size:0.85rem; font-weight:700; color:#0f172a;">Job Postings to Approve</div>
                    <div style="font-size:0.72rem; color:#64748b;">Alumni-submitted jobs pending review</div>
                  </div>
                  <span style="background:#dcfce7; color:#15803d; font-size:0.7rem; font-weight:900; padding:3px 10px; border-radius:20px; flex-shrink:0;">4</span>
                  <a href="job-board-management.html" style="background:#0f172a; color:#fff; font-size:0.72rem; font-weight:700; padding:6px 12px; border-radius:8px; text-decoration:none; flex-shrink:0;">View</a>
                </div>
              </div>
            </div>

            <!-- Key Events Card -->
            <div class="admin-card">
              <div class="admin-card-header">
                <h3 class="admin-card-title">Key Events</h3>
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#64748b" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>

              <div style="display:flex; flex-direction:column; gap:16px; margin-bottom:20px;">
                
                <div style="display:flex; gap:14px; align-items:center;">
                  <div style="background:#0f172a; color:#fff; padding:8px 12px; border-radius:12px; text-align:center; min-width:48px;">
                    <div style="font-size:0.65rem; font-weight:800; letter-spacing:0.05em; text-transform:uppercase;">OCT</div>
                    <div style="font-size:1.15rem; font-weight:900;">12</div>
                  </div>
                  <div>
                    <h4 style="font-size:0.95rem; font-weight:800; margin:0 0 2px; color:#0f172a;">Annual Alum Gala</h4>
                    <span style="font-size:0.75rem; color:#64748b;">Grand Ballroom • 6:00 PM</span>
                  </div>
                </div>

                <div style="display:flex; gap:14px; align-items:center;">
                  <div style="background:#f59e0b; color:#000; padding:8px 12px; border-radius:12px; text-align:center; min-width:48px;">
                    <div style="font-size:0.65rem; font-weight:800; letter-spacing:0.05em; text-transform:uppercase;">OCT</div>
                    <div style="font-size:1.15rem; font-weight:900;">15</div>
                  </div>
                  <div>
                    <h4 style="font-size:0.95rem; font-weight:800; margin:0 0 2px; color:#0f172a;">Career Fair 2024</h4>
                    <span style="font-size:0.75rem; color:#64748b;">Main Campus Mall • 10:00 AM</span>
                  </div>
                </div>

                <div style="display:flex; gap:14px; align-items:center;">
                  <div style="background:#e2e8f0; color:#334155; padding:8px 12px; border-radius:12px; text-align:center; min-width:48px;">
                    <div style="font-size:0.65rem; font-weight:800; letter-spacing:0.05em; text-transform:uppercase;">OCT</div>
                    <div style="font-size:1.15rem; font-weight:900;">20</div>
                  </div>
                  <div>
                    <h4 style="font-size:0.95rem; font-weight:800; margin:0 0 2px; color:#0f172a;">MBA Mixer</h4>
                    <span style="font-size:0.75rem; color:#64748b;">Virtual Event • 5:00 PM</span>
                  </div>
                </div>

              </div>

              <button style="background:#ffffff; border:1px solid #cbd5e1; width:100%; padding:10px; border-radius:20px; font-weight:700; color:#0f172a; cursor:pointer;" onclick="window.location.href='events.html'">View All Events</button>
            </div>

            <!-- Placement Statistics (Dark Card) -->
            <div class="dark-widget-card">
              <h3 style="font-size:1.25rem; font-weight:800; margin:0 0 24px;">Placement Statistics</h3>
              
              <div style="display:flex; flex-direction:column; gap:18px;">
                <div>
                  <div style="display:flex; justify-content:space-between; font-size:0.85rem; font-weight:700; margin-bottom:6px; color:rgba(255,255,255,0.9);">
                    <span>Technology Sector</span>
                    <span>92%</span>
                  </div>
                  <div style="width:100%; height:8px; background:rgba(255,255,255,0.1); border-radius:4px; overflow:hidden;">
                    <div style="width:92%; height:100%; background:#b45309; border-radius:4px;"></div>
                  </div>
                </div>

                <div>
                  <div style="display:flex; justify-content:space-between; font-size:0.85rem; font-weight:700; margin-bottom:6px; color:rgba(255,255,255,0.9);">
                    <span>Finance & Law</span>
                    <span>78%</span>
                  </div>
                  <div style="width:100%; height:8px; background:rgba(255,255,255,0.1); border-radius:4px; overflow:hidden;">
                    <div style="width:78%; height:100%; background:#fde68a; border-radius:4px;"></div>
                  </div>
                </div>

                <div>
                  <div style="display:flex; justify-content:space-between; font-size:0.85rem; font-weight:700; margin-bottom:6px; color:rgba(255,255,255,0.9);">
                    <span>Healthcare</span>
                    <span>88%</span>
                  </div>
                  <div style="width:100%; height:8px; background:rgba(255,255,255,0.1); border-radius:4px; overflow:hidden;">
                    <div style="width:88%; height:100%; background:#b45309; border-radius:4px;"></div>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

      