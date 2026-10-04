<div class="chat-app-layout" style="height: calc(100vh - 72px); display: flex; overflow: hidden; margin: -32px;">
    
    <!-- COL 1: CONVERSATIONS LIST -->
    <div class="chat-list-panel" style="width: 320px; border-right: 1px solid var(--color-border); display: flex; flex-direction: column;">
        <div style="padding:20px; border-bottom:1px solid var(--color-border); display:flex; justify-content:space-between; align-items:center;">
            <h3 style="font-size:1.3rem; font-weight:800; margin:0;">Messages</h3>
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" style="cursor:pointer;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>

        <div style="flex:1; overflow-y:auto;">
            <?php foreach ($users as $u): ?>
            <a href="/messages?user_id=<?= $u->id ?>" class="chat-list-item <?= ($selectedUser && $selectedUser->id == $u->id) ? 'active' : '' ?>" style="text-decoration:none; color:inherit; display:flex;">
                <div style="position:relative; margin-right: 12px;">
                    <img src="/assets/img/signup_side_img.png" alt="av" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;"/>
                </div>
                <div class="meta" style="flex:1;">
                    <h4 style="margin: 0; font-size: 0.95rem; font-weight: 700; color: #1e293b;"><?= htmlspecialchars($u->full_name) ?></h4>
                    <span style="display:inline-block; margin-top:4px; background:#e0e7ff; color:#3730a3; font-size:0.6rem; font-weight:800; padding:2px 7px; border-radius:10px;"><?= strtoupper($u->role) ?></span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- COL 2: CHAT MAIN WINDOW -->
    <div class="chat-main-window" style="flex: 1; display: flex; flex-direction: column;">
        
        <?php if ($selectedUser): ?>
        <!-- Chat Header -->
        <div style="padding:16px 24px; border-bottom:1px solid var(--color-border); background:var(--color-white); display:flex; justify-content:space-between; align-items:center;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="position:relative;">
                    <img src="/assets/img/signup_side_img.png" alt="av" style="width:40px; height:40px; border-radius:50%; object-fit:cover;" />
                    <span style="width:10px; height:10px; border-radius:50%; background:#10b981; border:2px solid #fff; position:absolute; right:0; bottom:0;"></span>
                </div>
                <div>
                    <h4 class="font-bold text-md mb-0"><?= htmlspecialchars($selectedUser->full_name) ?></h4>
                    <span style="font-size:0.75rem; color:#059669; font-weight:600;">Active now</span>
                </div>
            </div>
        </div>

        <!-- Chat Bubbles Area -->
        <div class="chat-messages-area" id="messages-container" style="flex: 1; overflow-y: auto; padding: 24px; background: #f8fafc;">
            <?php foreach ($messages as $msg): ?>
                <?php $isMine = ($msg->sender_id == $currentUserId); ?>
                <div style="display:flex; <?= $isMine ? 'justify-content:flex-end' : 'align-items:flex-end; gap:12px;' ?>; margin-bottom:16px;">
                    <?php if (!$isMine): ?>
                        <img src="/assets/img/signup_side_img.png" alt="E" style="width:32px; height:32px; border-radius:50%; object-fit:cover;" />
                    <?php endif; ?>
                    
                    <div class="chat-bubble <?= $isMine ? 'outgoing' : 'incoming' ?>" style="max-width:70%; padding:10px 16px; border-radius:16px; <?= $isMine ? 'background:#0f172a; color:#fff; border-bottom-right-radius:4px;' : 'background:#fff; border:1px solid #e2e8f0; border-bottom-left-radius:4px;' ?>">
                        <?= nl2br(htmlspecialchars($msg->content)) ?>
                    </div>
                </div>
                <div style="<?= $isMine ? 'text-align:right;' : 'margin-left:44px;' ?> font-size:0.7rem; color:var(--color-text-muted); margin-bottom: 8px;">
                    <?= date('g:i A', strtotime($msg->created_at)) ?> <?= $isMine && $msg->is_read ? '✓✓' : '' ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Chat Input Bar -->
        <div class="chat-input-bar" style="padding: 16px 24px; border-top: 1px solid var(--color-border); background: var(--color-white); display: flex; align-items: center; gap: 16px;">
            <form id="chat-form" style="display: flex; flex: 1; gap: 16px; align-items: center; margin: 0;">
                <input type="hidden" name="receiver_id" id="receiver_id" value="<?= $selectedUser->id ?>">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_COOKIE['csrf_token'] ?? '') ?>">
                <div class="chat-input-box" style="flex: 1; display: flex; align-items: center; background: #f1f5f9; padding: 12px 16px; border-radius: 24px;">
                    <input type="text" name="content" id="chat-input" placeholder="Type a message..." style="flex: 1; border: none; background: transparent; outline: none; font-size: 0.95rem; color: #1e293b;" required autocomplete="off"/>
                </div>
                <button type="submit" style="width:44px; height:44px; border-radius:50%; background:#0f172a; color:#fff; border:none; display:flex; align-items:center; justify-content:center; cursor:pointer; flex-shrink: 0;">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                </button>
            </form>
        </div>

        <script>
            const container = document.getElementById('messages-container');
            container.scrollTop = container.scrollHeight;

            // SSE listener
            const selectedUserId = <?= $selectedUser->id ?>;
            const currentUserId = <?= $currentUserId ?>;
            const evtSource = new EventSource('/messages/stream?user_id=' + selectedUserId);
            
            evtSource.onmessage = function(event) {
                const msg = JSON.parse(event.data);
                
                // Determine if message is mine
                const isMine = (msg.sender_id == currentUserId);
                
                let html = '';
                if (isMine) {
                    html = `
                        <div style="display:flex; justify-content:flex-end; margin-bottom:16px;">
                            <div class="chat-bubble outgoing" style="max-width:70%; padding:10px 16px; border-radius:16px; background:#0f172a; color:#fff; border-bottom-right-radius:4px;">
                                ${msg.content}
                            </div>
                        </div>
                    `;
                } else {
                    html = `
                        <div style="display:flex; align-items:flex-end; gap:12px; margin-bottom:16px;">
                            <img src="/assets/img/signup_side_img.png" alt="E" style="width:32px; height:32px; border-radius:50%; object-fit:cover;" />
                            <div class="chat-bubble incoming" style="max-width:70%; padding:10px 16px; border-radius:16px; background:#fff; border:1px solid #e2e8f0; border-bottom-left-radius:4px;">
                                ${msg.content}
                            </div>
                        </div>
                    `;
                }
                
                container.insertAdjacentHTML('beforeend', html);
                container.scrollTop = container.scrollHeight;
            };

            // AJAX form submit
            document.getElementById('chat-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const input = document.getElementById('chat-input');
                
                fetch('/messages/send', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).then(r => r.json()).then(data => {
                    if (data.success) {
                        input.value = '';
                    }
                });
            });
        </script>
        <?php else: ?>
            <div style="flex:1; display:flex; align-items:center; justify-content:center; color:var(--color-text-muted);">
                <h3>Select a conversation to start messaging.</h3>
            </div>
        <?php endif; ?>

    </div>
</div>
