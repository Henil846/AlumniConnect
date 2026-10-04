
<style>
/* Embedded from admin-chat.css */
/* =========================================
   Job Admin, Events, Community & Messages CSS
   ========================================= */

/* Darker sidebar variant as shown in newest designs */
.sidebar.dark-theme {
  background: #050b14;
  color: var(--color-white);
  width: 240px;
}
.sidebar.dark-theme .logo { color: var(--color-white); }
.sidebar.dark-theme .nav-item { color: rgba(255, 255, 255, 0.7); }
.sidebar.dark-theme .nav-item:hover { background: rgba(255, 255, 255, 0.05); color: var(--color-white); }
.sidebar.dark-theme .nav-item.active {
  background: rgba(255, 255, 255, 0.1);
  color: var(--color-white);
  border-left: 3px solid var(--color-accent);
}
.sidebar-footer .btn-gold-action {
  background: var(--color-accent);
  color: #000;
  font-weight: 700;
  border: none;
  width: 100%;
  padding: 12px;
  border-radius: var(--radius-full);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(245, 166, 35, 0.2);
  transition: var(--transition);
}
.sidebar-footer .btn-gold-action:hover {
  background: #e09218;
}

/* Header pills & action buttons */
.btn-header-action {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  padding: 8px 16px;
  border-radius: var(--radius-full);
  font-size: 0.85rem;
  font-weight: 600;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  transition: var(--transition);
}
.btn-header-action:hover { background: var(--color-bg); }
.btn-header-action.dark { background: #111827; color: #fff; border-color: #111827; }
.btn-header-action.dark:hover { background: #1f2937; }

/* ---- Job Board Management & Events Admin ---- */
.admin-grid-layout {
  display: flex;
  gap: 32px;
}
.col-form-panel {
  width: 440px;
  flex-shrink: 0;
}
.col-list-panel {
  flex: 1;
  min-width: 0;
}

.form-box-card {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: 28px;
  margin-bottom: 24px;
}
.form-box-header {
  font-size: 1.2rem;
  font-weight: 800;
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
  padding-bottom: 16px;
  border-bottom: 1px solid var(--color-border);
}
.form-box-header svg { color: var(--color-accent-dark); }

.form-row-2col {
  display: flex;
  gap: 12px;
}
.form-row-2col .form-group { flex: 1; }

.table-list-container {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  margin-bottom: 24px;
}
.table-list-header {
  padding: 20px 24px;
  border-bottom: 1px solid var(--color-border);
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.table-column-labels {
  display: flex;
  padding: 12px 24px;
  background: #f8fafc;
  border-bottom: 1px solid var(--color-border);
  font-size: 0.75rem;
  font-weight: 700;
  color: var(--color-text-muted);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}
.table-item-row {
  display: flex;
  align-items: center;
  padding: 20px 24px;
  border-bottom: 1px solid var(--color-border);
  transition: background 0.15s ease;
}
.table-item-row:hover { background: #fafafa; }
.table-item-row:last-child { border-bottom: none; }

.badge-active { background: rgba(16, 185, 129, 0.15); color: #059669; padding: 4px 10px; border-radius: 4px; font-weight: 700; font-size: 0.75rem; }
.badge-filled { background: #f1f5f9; color: var(--color-text-muted); padding: 4px 10px; border-radius: 4px; font-weight: 700; font-size: 0.75rem; }
.badge-approved { background: rgba(16, 185, 129, 0.15); color: #059669; padding: 4px 10px; border-radius: 12px; font-weight: 700; font-size: 0.75rem; }
.badge-cancelled { background: #f1f5f9; color: var(--color-text-muted); padding: 4px 10px; border-radius: 12px; font-weight: 700; font-size: 0.75rem; }

/* ---- Events Page ---- */
.events-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-bottom: 40px;
}
.event-card-modern {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.event-img-wrap {
  height: 200px;
  position: relative;
}
.event-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.event-date-pill {
  position: absolute;
  top: 16px;
  left: 16px;
  background: var(--color-white);
  border-radius: var(--radius-sm);
  padding: 6px 12px;
  text-align: center;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  font-weight: 800;
  line-height: 1.1;
}
.event-date-pill .mth { font-size: 0.65rem; color: var(--color-accent-dark); text-transform: uppercase; letter-spacing: 0.05em; }
.event-date-pill .day { font-size: 1.25rem; color: var(--color-text); }
.event-card-body {
  padding: 24px;
  display: flex;
  flex-direction: column;
  flex: 1;
}

/* ---- Community Feed ---- */
.community-layout {
  display: flex;
  gap: 32px;
}
.feed-column { flex: 1; min-width: 0; }
.widgets-column { width: 340px; flex-shrink: 0; }

.create-post-box {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: 20px;
  margin-bottom: 24px;
}
.post-actions-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 16px;
  border-top: 1px solid var(--color-border);
  margin-top: 16px;
}
.post-action-item {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-text-muted);
  background: transparent;
  border: none;
  cursor: pointer;
}
.post-action-item:hover { color: var(--color-text); }

.feed-post-card {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: 24px;
  margin-bottom: 24px;
}
.post-author-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 16px;
}
.post-author-header img {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
}

.poll-option-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 16px;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  margin-bottom: 8px;
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  background: var(--color-white);
  position: relative;
  overflow: hidden;
}
.poll-option-row .bar-bg {
  position: absolute;
  left: 0; top: 0; bottom: 0;
  background: rgba(245, 166, 35, 0.15);
  z-index: 1;
}
.poll-option-row span { position: relative; z-index: 2; }

/* ---- Messaging App ---- */
.chat-app-layout {
  display: flex;
  height: calc(100vh - 73px); /* Full height minus header */
  background: var(--color-white);
  overflow: hidden;
}
.chat-list-panel {
  width: 320px;
  border-right: 1px solid var(--color-border);
  display: flex;
  flex-direction: column;
  flex-shrink: 0;
}
.chat-main-window {
  flex: 1;
  min-width: 0;
  display: flex;
  flex-direction: column;
  background: #fdfdfd;
}
.chat-details-panel {
  width: 300px;
  border-left: 1px solid var(--color-border);
  padding: 24px;
  overflow-y: auto;
  flex-shrink: 0;
}

.chat-list-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  padding: 16px;
  border-bottom: 1px solid var(--color-border);
  cursor: pointer;
  transition: background 0.15s;
}
.chat-list-item:hover, .chat-list-item.active {
  background: #f8fafc;
}
.chat-list-item img {
  width: 48px; height: 48px; border-radius: 50%; object-fit: cover;
}
.chat-list-item .meta {
  flex: 1; min-width: 0;
}
.chat-list-item h4 {
  font-size: 0.95rem; font-weight: 700; margin-bottom: 2px;
  display: flex; justify-content: space-between;
}
.chat-list-item h4 span { font-size: 0.75rem; color: var(--color-text-muted); font-weight: 500; }
.chat-list-item p {
  font-size: 0.85rem; color: var(--color-text-muted); margin: 0;
  white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}

.chat-messages-area {
  flex: 1;
  padding: 24px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.chat-bubble {
  max-width: 70%;
  padding: 14px 18px;
  border-radius: 16px;
  font-size: 0.9rem;
  line-height: 1.5;
  position: relative;
}
.chat-bubble.incoming {
  background: #f1f5f9;
  color: var(--color-text);
  border-top-left-radius: 4px;
  align-self: flex-start;
}
.chat-bubble.outgoing {
  background: #0f172a;
  color: #fff;
  border-top-right-radius: 4px;
  align-self: flex-end;
}
.chat-input-bar {
  padding: 16px 24px;
  border-top: 1px solid var(--color-border);
  background: var(--color-white);
  display: flex;
  align-items: center;
  gap: 12px;
}
.chat-input-box {
  flex: 1;
  display: flex;
  align-items: center;
  background: #f8fafc;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-full);
  padding: 8px 16px;
  gap: 12px;
}
.chat-input-box input {
  flex: 1;
  background: transparent;
  border: none;
  font-size: 0.9rem;
  outline: none;
}

</style>
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
