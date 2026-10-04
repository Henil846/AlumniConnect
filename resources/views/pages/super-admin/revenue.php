<!-- SCROLLABLE CONTENT -->
      <div style="padding: 32px 40px; flex: 1;">
        
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:28px;">
          <div>
            <h1 style="font-size:1.8rem; font-weight:800; color:#0f172a; margin:0 0 4px;">Revenue & Donations</h1>
            <p style="font-size:0.95rem; color:#64748b; margin:0;">Track fundraising progress and institutional revenue.</p>
          </div>
          <div style="display:flex; gap:8px;">
            <button style="background:#f1f5f9; border:none; padding:8px 16px; border-radius:20px; font-weight:700; font-size:0.82rem; color:#0f172a; cursor:pointer;">This Month</button>
            <button style="background:#0f172a; border:none; padding:8px 16px; border-radius:20px; font-weight:700; font-size:0.82rem; color:#fff; cursor:pointer;">Annual View</button>
          </div>
        </div>

        <!-- 4 STAT CARDS -->
        <div class="admin-stats-grid">
          <div class="admin-stat-card">
            <div class="stat-icon-box" style="background:#dcfce7; color:#15803d;">
              <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <div>
              <div class="stat-label">Total Raised</div>
              <div class="stat-val">$42.8M</div>
            </div>
            <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
              +8.4% vs last year
            </div>
          </div>
          <div class="admin-stat-card">
            <div class="stat-icon-box" style="background:#fef3c7; color:#b45309;">
              <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
              <div class="stat-label">Total Donors</div>
              <div class="stat-val">18,420</div>
            </div>
            <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
              840 new this month
            </div>
          </div>
          <div class="admin-stat-card">
            <div class="stat-icon-box" style="background:#e0e7ff; color:#3730a3;">
              <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
            </div>
            <div>
              <div class="stat-label">Monthly Revenue</div>
              <div class="stat-val">$125k</div>
            </div>
            <div style="font-size:0.82rem; color:#16a34a; font-weight:700; display:flex; align-items:center; gap:6px;">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
              Surpassing target
            </div>
          </div>
          <div class="admin-stat-card dark-card">
            <div class="stat-icon-box" style="background:#b45309; color:#fff;">
              <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
            </div>
            <div>
              <div class="stat-label" style="color:rgba(255,255,255,0.7);">Active Goals</div>
              <div class="stat-val">3 / 5</div>
            </div>
            <div style="font-size:0.82rem; color:#34d399; font-weight:700;">On track</div>
          </div>
        </div>

        <!-- RECENT DONATIONS TABLE -->
        <div class="admin-card" style="margin-bottom:28px;">
          <div class="admin-card-header">
            <div>
              <h3 class="admin-card-title">Recent Donations</h3>
              <p class="admin-card-subtitle">Latest contributions from alumni and corporate sponsors.</p>
            </div>
            <button class="admin-btn-black" style="width:auto; padding:10px 20px;" onclick="alert('Downloading donation report...')">Download CSV</button>
          </div>
          <table class="admin-table">
            <thead>
              <tr>
                <th>Donor</th>
                <th>Amount</th>
                <th>Fund</th>
                <th>Date</th>
                <th style="text-align:right;">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><div style="display:flex; align-items:center; gap:12px;"><img src="mentor_marcus.png" style="width:36px; height:36px; border-radius:50%; object-fit:cover;" /><div><div style="font-weight:800;">Marcus Thorne</div><div style="font-size:0.75rem; color:#64748b;">Class of 2015</div></div></div></td>
                <td style="font-weight:900; color:#15803d;">$5,000</td>
                <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">Endowment Fund</span></td>
                <td style="color:#64748b; font-weight:600;">Oct 10, 2024</td>
                <td style="text-align:right;"><span class="pill-status-active">Processed</span></td>
              </tr>
              <tr>
                <td><div style="display:flex; align-items:center; gap:12px;"><img src="mentor_elena.png" style="width:36px; height:36px; border-radius:50%; object-fit:cover;" /><div><div style="font-weight:800;">Elena Vance</div><div style="font-size:0.75rem; color:#64748b;">Class of 2019</div></div></div></td>
                <td style="font-weight:900; color:#15803d;">$1,250</td>
                <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">Tech Center Grant</span></td>
                <td style="color:#64748b; font-weight:600;">Oct 08, 2024</td>
                <td style="text-align:right;"><span class="pill-status-active">Processed</span></td>
              </tr>
              <tr>
                <td><div style="display:flex; align-items:center; gap:12px;"><div style="width:36px; height:36px; border-radius:50%; background:#e0e7ff; color:#3730a3; display:flex; align-items:center; justify-content:center; font-weight:900;">JW</div><div><div style="font-weight:800;">Jordan Wu</div><div style="font-size:0.75rem; color:#64748b;">Class of 2024</div></div></div></td>
                <td style="font-weight:900; color:#92400e;">$350</td>
                <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">Sports Scholarship</span></td>
                <td style="color:#64748b; font-weight:600;">Oct 05, 2024</td>
                <td style="text-align:right;"><span style="background:#e2e8f0; color:#475569; font-size:0.72rem; font-weight:800; padding:4px 12px; border-radius:20px;">Pending</span></td>
              </tr>
              <tr>
                <td><div style="display:flex; align-items:center; gap:12px;"><img src="signup_side_img.png" style="width:36px; height:36px; border-radius:50%; object-fit:cover; object-position:top;" /><div><div style="font-weight:800;">Anya Volkov</div><div style="font-size:0.75rem; color:#64748b;">Class of 2019</div></div></div></td>
                <td style="font-weight:900; color:#15803d;">$2,500</td>
                <td><span style="background:#f1f5f9; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">Research Lab Fund</span></td>
                <td style="color:#64748b; font-weight:600;">Oct 03, 2024</td>
                <td style="text-align:right;"><span class="pill-status-active">Processed</span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- FUNDRAISING GOALS -->
        <div class="admin-card">
          <h3 class="admin-card-title" style="margin-bottom:20px;">Fundraising Goals</h3>
          <div style="display:flex; flex-direction:column; gap:24px;">
            <div>
              <div style="display:flex; justify-content:space-between; font-size:0.9rem; font-weight:700; margin-bottom:8px;"><span>Endowment Fund 2024</span><span style="color:#15803d;">$8.4M / $10M</span></div>
              <div class="progress-bar-wrap"><div class="progress-bar-fill" style="width:84%;"></div></div>
            </div>
            <div>
              <div style="display:flex; justify-content:space-between; font-size:0.9rem; font-weight:700; margin-bottom:8px;"><span>Tech Infrastructure Grant</span><span style="color:#b45309;">$2.1M / $5M</span></div>
              <div class="progress-bar-wrap"><div class="progress-bar-fill gold" style="width:42%;"></div></div>
            </div>
            <div>
              <div style="display:flex; justify-content:space-between; font-size:0.9rem; font-weight:700; margin-bottom:8px;"><span>Student Scholarship Fund</span><span style="color:#15803d;">$920k / $1M</span></div>
              <div class="progress-bar-wrap"><div class="progress-bar-fill green" style="width:92%;"></div></div>
            </div>
          </div>
        </div>

      </div>

      