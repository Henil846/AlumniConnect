<div class="page-header" style="margin-bottom:30px;">
    <h2 class="font-bold text-xl mb-1">Giving & Donations</h2>
    <p class="text-sm text-muted">Support university initiatives, student scholarships, and alumni programs.</p>
</div>

<?php if (isset($_GET['success'])): ?>
    <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; font-weight:600;">Thank you for your generous donation! Your contribution has been recorded.</div>
<?php endif; ?>

<div style="display:flex; gap:24px;">
    <!-- Campaigns -->
    <div style="flex:2;">
        <?php if (empty($campaigns)): ?>
            <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:40px; text-align:center;">
                <p>No active campaigns at the moment.</p>
            </div>
        <?php else: ?>
            <div style="display:flex; flex-direction:column; gap:24px;">
                <?php foreach ($campaigns as $campaign): ?>
                    <?php 
                        $percentage = $campaign->goal_amount > 0 ? min(100, ($campaign->raised_amount / $campaign->goal_amount) * 100) : 0;
                    ?>
                    <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; overflow:hidden; display:flex;">
                        <div style="width:200px; background:#f1f5f9; display:flex; align-items:center; justify-content:center;">
                            <svg viewBox="0 0 24 24" width="64" height="64" fill="none" stroke="#cbd5e1" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </div>
                        <div style="padding:24px; flex:1;">
                            <h3 style="font-size:1.25rem; font-weight:800; color:#0f172a; margin-bottom:8px;"><?= htmlspecialchars($campaign->title) ?></h3>
                            <p style="font-size:0.9rem; color:var(--color-text-muted); margin-bottom:20px;"><?= nl2br(htmlspecialchars($campaign->description)) ?></p>
                            
                            <!-- Progress Bar -->
                            <div style="margin-bottom:8px; display:flex; justify-content:space-between; font-size:0.85rem; font-weight:700;">
                                <span style="color:#2563eb;"><?= \App\Core\CurrencyHelper::formatINR($campaign->raised_amount) ?> raised</span>
                                <span style="color:#64748b;">Goal: <?= \App\Core\CurrencyHelper::formatINR($campaign->goal_amount) ?></span>
                            </div>
                            <div style="width:100%; background:#e2e8f0; height:8px; border-radius:4px; margin-bottom:20px; overflow:hidden;">
                                <div style="height:100%; background:#2563eb; width:<?= $percentage ?>%;"></div>
                            </div>
                            
                            <form action="/donations/donate" method="POST" style="display:flex; gap:12px;">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                                <input type="hidden" name="campaign_id" value="<?= $campaign->id ?>">
                                <div style="position:relative; width:150px;">
                                    <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); font-weight:700; color:#475569;">₹</span>
                                    <input type="number" step="1" min="1" name="amount" placeholder="Amount" required style="width:100%; padding:10px 10px 10px 24px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit; font-weight:600;">
                                </div>
                                <button type="submit" class="btn btn-primary" style="background:#0f172a; color:#fff; border:none; padding:10px 24px; border-radius:8px; font-weight:700; cursor:pointer;">Donate Now</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Sidebar -->
    <div style="flex:1;">
        <div style="background:#fff; border:1px solid var(--color-border); border-radius:12px; padding:24px;">
            <h3 style="font-size:1.1rem; font-weight:800; margin-bottom:16px;">Recent Donors</h3>
            <?php if (empty($recentDonations)): ?>
                <p style="font-size:0.9rem; color:#64748b;">No recent donations yet. Be the first!</p>
            <?php else: ?>
                <ul style="list-style:none; padding:0; margin:0;">
                    <?php foreach ($recentDonations as $donation): ?>
                        <li style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                            <img src="/assets/img/signup_side_img.png" alt="" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                            <div>
                                <h4 style="font-size:0.9rem; font-weight:700; margin:0; color:#0f172a;"><?= htmlspecialchars($donation->donor_name) ?></h4>
                                <div style="font-size:0.8rem; color:#059669; font-weight:600;">Donated <?= \App\Core\CurrencyHelper::formatINR($donation->amount) ?></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
