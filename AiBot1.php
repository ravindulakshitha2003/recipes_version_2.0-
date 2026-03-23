<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chef AI — Your Culinary Companion</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />

  <style>
    /* ── CSS Variables ─────────────────────────────────────── */
    :root {
      --primary-bg:    #121212;
      --secondary-bg:  #1e1e1e;
      --card-bg:       #252525;
      --accent:        #ff7b2c;
      --accent-dim:    rgba(255,123,44,.12);
      --accent-glow:   rgba(255,123,44,.35);
      --text-primary:  #f5f5f5;
      --text-secondary:#b0b0b0;
      --border-radius: 12px;
      --transition:    all 0.3s ease;
      --shadow-sm:     0 8px 20px rgba(0,0,0,.3);
      --shadow-md:     0 12px 28px rgba(0,0,0,.4);
      --bubble-user:   #2b1f16;
      --bubble-bot:    #1e1e1e;
      --border-subtle: rgba(255,255,255,.06);
    }

    /* ── Reset & Base ──────────────────────────────────────── */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background: var(--primary-bg);
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-weight: 400;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      overflow: hidden;

      /* subtle grain overlay */
      background-image:
        radial-gradient(ellipse 80% 60% at 50% -20%, rgba(255,123,44,.08) 0%, transparent 70%),
        url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.04'/%3E%3C/svg%3E");
      background-size: cover, 256px 256px;
    }

    /* ── Layout Shell ──────────────────────────────────────── */
    .app-shell {
      width: 100%;
      max-width: 780px;
      height: 100vh;
      max-height: 100vh;
      display: flex;
      flex-direction: column;
      padding: 0;
    }

    /* ── Header ────────────────────────────────────────────── */
    .chat-header {
      flex-shrink: 0;
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 18px 28px;
      background: var(--secondary-bg);
      border-bottom: 1px solid var(--border-subtle);
      box-shadow: var(--shadow-sm);
      position: relative;
      z-index: 10;
    }

    .header-avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--accent) 0%, #e84d00 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      flex-shrink: 0;
      box-shadow: 0 0 18px var(--accent-glow);
      animation: pulse-avatar 3s ease-in-out infinite;
    }

    @keyframes pulse-avatar {
      0%, 100% { box-shadow: 0 0 18px var(--accent-glow); }
      50%       { box-shadow: 0 0 32px rgba(255,123,44,.55); }
    }

    .header-info h1 {
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      font-weight: 700;
      letter-spacing: .01em;
      line-height: 1.2;
    }

    .header-info h1 span { color: var(--accent); }

    .status-pill {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: .72rem;
      color: var(--text-secondary);
      font-weight: 300;
      letter-spacing: .04em;
      text-transform: uppercase;
    }

    .status-dot {
      width: 7px; height: 7px;
      border-radius: 50%;
      background: #4ade80;
      animation: blink-dot 2.5s ease-in-out infinite;
    }

    @keyframes blink-dot {
      0%, 100% { opacity: 1; }
      50%       { opacity: .3; }
    }

    .header-badge {
      margin-left: auto;
      background: var(--accent-dim);
      border: 1px solid rgba(255,123,44,.25);
      color: var(--accent);
      font-size: .7rem;
      font-weight: 500;
      padding: 4px 10px;
      border-radius: 20px;
      letter-spacing: .05em;
      text-transform: uppercase;
    }

    /* ── Messages Area ─────────────────────────────────────── */
    .messages-area {
      flex: 1;
      overflow-y: auto;
      padding: 28px 24px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      scroll-behavior: smooth;
    }

    /* scrollbar */
    .messages-area::-webkit-scrollbar { width: 5px; }
    .messages-area::-webkit-scrollbar-track { background: transparent; }
    .messages-area::-webkit-scrollbar-thumb {
      background: rgba(255,123,44,.25);
      border-radius: 10px;
    }

    /* ── Message Bubbles ───────────────────────────────────── */
    .message-wrapper {
      display: flex;
      gap: 12px;
      max-width: 85%;
      animation: slide-in .3s cubic-bezier(.22,1,.36,1) both;
    }

    @keyframes slide-in {
      from { opacity: 0; transform: translateY(14px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .message-wrapper.user  { align-self: flex-end; flex-direction: row-reverse; }
    .message-wrapper.bot   { align-self: flex-start; }

    .msg-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      margin-top: 2px;
    }

    .msg-avatar.bot-av {
      background: linear-gradient(135deg, var(--accent) 0%, #e84d00 100%);
      box-shadow: 0 0 12px var(--accent-glow);
    }

    .msg-avatar.user-av {
      background: #2a2a2a;
      border: 1px solid var(--border-subtle);
    }

    .bubble {
      padding: 13px 17px;
      border-radius: var(--border-radius);
      line-height: 1.65;
      font-size: .925rem;
      position: relative;
    }

    .message-wrapper.user .bubble {
      background: linear-gradient(135deg, #c85a12 0%, #923d08 100%);
      color: #fff;
      border-bottom-right-radius: 3px;
      box-shadow: var(--shadow-sm);
    }

    .message-wrapper.bot .bubble {
      background: var(--card-bg);
      color: var(--text-primary);
      border: 1px solid var(--border-subtle);
      border-bottom-left-radius: 3px;
      box-shadow: var(--shadow-sm);
    }

    .msg-time {
      font-size: .68rem;
      color: var(--text-secondary);
      margin-top: 5px;
      padding: 0 4px;
      opacity: .7;
    }

    .message-wrapper.user  .msg-time { text-align: right; }
    .message-wrapper.bot   .msg-time { text-align: left; }

    /* ── Recipe Cards ──────────────────────────────────────── */
    .recipe-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
      gap: 14px;
      width: 100%;
      margin-top: 4px;
    }

    .recipe-card {
      background: var(--card-bg);
      border: 1px solid var(--border-subtle);
      border-radius: var(--border-radius);
      overflow: hidden;
      transition: var(--transition);
      cursor: pointer;
      box-shadow: var(--shadow-sm);
      animation: slide-in .35s cubic-bezier(.22,1,.36,1) both;
    }

    .recipe-card:hover {
      transform: translateY(-4px);
      border-color: rgba(255,123,44,.35);
      box-shadow: 0 16px 36px rgba(0,0,0,.5), 0 0 0 1px rgba(255,123,44,.2);
    }

    .recipe-card img {
      width: 100%;
      height: 130px;
      object-fit: cover;
      display: block;
      background: #1a1a1a;
    }

    .recipe-card-body { padding: 12px 14px 14px; }

    .recipe-card-name {
      font-family: 'Playfair Display', serif;
      font-size: .95rem;
      font-weight: 700;
      margin-bottom: 5px;
      color: var(--text-primary);
    }

    .recipe-card-desc {
      font-size: .78rem;
      color: var(--text-secondary);
      line-height: 1.5;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .recipe-card-tag {
      display: inline-block;
      margin-top: 9px;
      font-size: .67rem;
      font-weight: 500;
      color: var(--accent);
      background: var(--accent-dim);
      border: 1px solid rgba(255,123,44,.2);
      padding: 3px 8px;
      border-radius: 20px;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    /* ── Typing Indicator ──────────────────────────────────── */
    .typing-wrapper {
      display: flex;
      align-items: center;
      gap: 12px;
      align-self: flex-start;
      animation: slide-in .25s ease both;
    }

    .typing-bubble {
      background: var(--card-bg);
      border: 1px solid var(--border-subtle);
      border-radius: var(--border-radius);
      border-bottom-left-radius: 3px;
      padding: 14px 18px;
      display: flex;
      gap: 6px;
      align-items: center;
    }

    .dot {
      width: 7px; height: 7px;
      border-radius: 50%;
      background: var(--accent);
      opacity: .4;
      animation: bounce-dot 1.2s ease-in-out infinite;
    }

    .dot:nth-child(2) { animation-delay: .2s; }
    .dot:nth-child(3) { animation-delay: .4s; }

    @keyframes bounce-dot {
      0%, 80%, 100% { transform: scale(1);   opacity: .4; }
      40%           { transform: scale(1.35); opacity: 1;  }
    }

    /* ── Greeting / empty state ────────────────────────────── */
    .empty-state {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      flex: 1;
      gap: 14px;
      text-align: center;
      padding: 40px 24px;
      animation: fade-up .6s ease both;
    }

    @keyframes fade-up {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .empty-icon {
      font-size: 52px;
      filter: drop-shadow(0 4px 16px rgba(255,123,44,.4));
    }

    .empty-state h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 700;
    }

    .empty-state h2 em {
      color: var(--accent);
      font-style: italic;
    }

    .empty-state p {
      color: var(--text-secondary);
      font-size: .9rem;
      max-width: 340px;
      line-height: 1.6;
    }

    .suggestions {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 9px;
      margin-top: 8px;
    }

    .suggestion-chip {
      background: var(--card-bg);
      border: 1px solid var(--border-subtle);
      color: var(--text-secondary);
      font-size: .8rem;
      padding: 8px 15px;
      border-radius: 20px;
      cursor: pointer;
      transition: var(--transition);
      font-family: 'DM Sans', sans-serif;
    }

    .suggestion-chip:hover {
      border-color: var(--accent);
      color: var(--accent);
      background: var(--accent-dim);
    }

    /* ── Input Bar ─────────────────────────────────────────── */
    .input-bar {
      flex-shrink: 0;
      padding: 16px 24px 20px;
      background: var(--secondary-bg);
      border-top: 1px solid var(--border-subtle);
    }

    .input-inner {
      display: flex;
      align-items: flex-end;
      gap: 10px;
      background: var(--card-bg);
      border: 1px solid var(--border-subtle);
      border-radius: 16px;
      padding: 10px 10px 10px 18px;
      transition: var(--transition);
    }

    .input-inner:focus-within {
      border-color: rgba(255,123,44,.45);
      box-shadow: 0 0 0 3px rgba(255,123,44,.1);
    }

    #user-input {
      flex: 1;
      background: transparent;
      border: none;
      outline: none;
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-size: .925rem;
      resize: none;
      max-height: 120px;
      line-height: 1.55;
      padding: 2px 0;
    }

    #user-input::placeholder { color: var(--text-secondary); opacity: .6; }

    #user-input:disabled { opacity: .5; cursor: not-allowed; }

    #send-btn {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      border: none;
      background: linear-gradient(135deg, var(--accent), #e84d00);
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: var(--transition);
      box-shadow: 0 4px 14px rgba(255,123,44,.35);
    }

    #send-btn:hover:not(:disabled) {
      transform: scale(1.07);
      box-shadow: 0 6px 20px rgba(255,123,44,.5);
    }

    #send-btn:active:not(:disabled) { transform: scale(.95); }

    #send-btn:disabled {
      opacity: .4;
      cursor: not-allowed;
      box-shadow: none;
    }

    .input-hint {
      text-align: center;
      font-size: .68rem;
      color: var(--text-secondary);
      opacity: .5;
      margin-top: 8px;
      letter-spacing: .03em;
    }

    /* ── Error Toast ───────────────────────────────────────── */
    .toast {
      position: fixed;
      bottom: 90px;
      left: 50%;
      transform: translateX(-50%) translateY(10px);
      background: #2d1515;
      border: 1px solid rgba(255,80,80,.3);
      color: #ff8080;
      padding: 10px 20px;
      border-radius: 10px;
      font-size: .82rem;
      opacity: 0;
      pointer-events: none;
      transition: var(--transition);
      z-index: 999;
      white-space: nowrap;
    }

    .toast.show {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    /* ── Mobile Responsive ─────────────────────────────────── */
    @media (max-width: 600px) {
      .app-shell { max-width: 100%; }
      .chat-header { padding: 14px 16px; }
      .messages-area { padding: 20px 14px; gap: 16px; }
      .input-bar { padding: 12px 14px 16px; }
      .message-wrapper { max-width: 92%; }
      .recipe-grid { grid-template-columns: 1fr 1fr; }
      .header-badge { display: none; }
    }

    @media (max-width: 400px) {
      .recipe-grid { grid-template-columns: 1fr; }
      .suggestions { flex-direction: column; align-items: center; }
    }
  </style>
</head>
<body>

<div class="app-shell">

  <!-- ── Header ── -->
  <header class="chat-header">
    <div class="header-avatar">🍳</div>
    <div class="header-info">
      <h1>Chef <span>AI</span></h1>
      <div class="status-pill">
        <div class="status-dot"></div>
        Online &amp; Ready to Cook
      </div>
    </div>
    <div class="header-badge">Culinary AI</div>
  </header>

  <!-- ── Messages ── -->
  <div class="messages-area" id="messages-area">

    <!-- Empty / greeting state -->
    <div class="empty-state" id="empty-state">
      <div class="empty-icon">🍽️</div>
      <h2>Your personal <em>culinary guide</em></h2>
      <p>Ask me for recipes, meal ideas, ingredient substitutions, or cooking techniques — I'm here to inspire your kitchen.</p>
      <div class="suggestions">
        <button class="suggestion-chip" onclick="fillSuggestion(this)">🥑 Quick avocado recipes</button>
        <button class="suggestion-chip" onclick="fillSuggestion(this)">🍝 Classic pasta dishes</button>
        <button class="suggestion-chip" onclick="fillSuggestion(this)">🌱 Vegan dinner ideas</button>
        <button class="suggestion-chip" onclick="fillSuggestion(this)">🍰 Easy desserts</button>
      </div>
    </div>

  </div><!-- /messages-area -->

  <!-- ── Input Bar ── -->
  <div class="input-bar">
    <div class="input-inner">
      <textarea
        id="user-input"
        rows="1"
        placeholder="Ask Chef AI anything…"
        aria-label="Chat input"
      ></textarea>
      <button id="send-btn" aria-label="Send message">
        <!-- Paper-plane SVG icon -->
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2.2"
             stroke-linecap="round" stroke-linejoin="round">
          <line x1="22" y1="2" x2="11" y2="13"></line>
          <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
        </svg>
      </button>
    </div>
    <p class="input-hint">Press <kbd style="
      background:rgba(255,255,255,.07);
      border:1px solid rgba(255,255,255,.12);
      border-radius:4px;
      padding:1px 5px;
      font-family:inherit;
      font-size:.68rem
    ">Enter</kbd> to send &nbsp;·&nbsp; Shift+Enter for new line</p>
  </div>

</div><!-- /app-shell -->

<!-- Error toast -->
<div class="toast" id="toast" role="alert"></div>

<!-- ══════════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
/* ── Config ──────────────────────────────────────────────── */
const API_URL = 'https://gimini2api-production-8475.up.railway.app/chat';
const API_KEY = 'example_api_key';

/* ── DOM Refs ────────────────────────────────────────────── */
const messagesArea = document.getElementById('messages-area');
const emptyState   = document.getElementById('empty-state');
const userInput    = document.getElementById('user-input');
const sendBtn      = document.getElementById('send-btn');
const toast        = document.getElementById('toast');

/* ── State ───────────────────────────────────────────────── */
let isLoading = false;

/* ── Auto-resize textarea ────────────────────────────────── */
userInput.addEventListener('input', () => {
  userInput.style.height = 'auto';
  userInput.style.height = Math.min(userInput.scrollHeight, 120) + 'px';
});

/* ── Send on Enter (Shift+Enter = newline) ───────────────── */
userInput.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && !e.shiftKey) {
    e.preventDefault();
    handleSend();
  }
});

sendBtn.addEventListener('click', handleSend);

/* ── Suggestion chips ────────────────────────────────────── */
function fillSuggestion(btn) {
  // Strip the emoji prefix for cleaner input text
  const text = btn.textContent.replace(/^[^\w]+/, '').trim();
  userInput.value = text;
  userInput.focus();
  handleSend();
}

/* ── Main send handler ───────────────────────────────────── */
async function handleSend() {
  const message = userInput.value.trim();
  if (!message || isLoading) return;

  // Hide empty state once conversation starts
  if (emptyState) emptyState.remove();

  // Render user message
  appendUserMessage(message);

  // Clear + reset input
  userInput.value = '';
  userInput.style.height = 'auto';

  // Show loading state
  setLoading(true);
  const typingEl = showTypingIndicator();

  try {
    const data = await callChatAPI(message);
    removeTypingIndicator(typingEl);
    handleAPIResponse(data);
  } catch (err) {
    removeTypingIndicator(typingEl);
    showToast('Connection error — please try again.');
    console.error('API error:', err);
  } finally {
    setLoading(false);
  }
}

/* ── API call ────────────────────────────────────────────── */
async function callChatAPI(message) {
  const response = await fetch(API_URL, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${API_KEY}`
    },
    body: JSON.stringify({ message })
  });

  if (!response.ok) throw new Error(`HTTP ${response.status}`);
  return response.json();
}

/* ── Response router ─────────────────────────────────────── */
function handleAPIResponse(data) {
  // If the response (or a nested field) is an array → recipe cards
  const arr = extractArray(data);

  if (arr) {
    appendRecipeCards(arr);
  } else {
    // Treat as plain text response
    const text = extractText(data);
    appendBotMessage(text || "I didn't quite get that — could you try again?");
  }
}

/* Recursively find the first array in the response object */
function extractArray(obj) {
  if (Array.isArray(obj)) return obj.length > 0 ? obj : null;
  if (obj && typeof obj === 'object') {
    for (const val of Object.values(obj)) {
      const found = extractArray(val);
      if (found) return found;
    }
  }
  return null;
}

/* Pull out a text reply from various common response shapes */
function extractText(data) {
  if (typeof data === 'string') return data;
  return data?.reply ?? data?.message ?? data?.text ?? data?.answer
      ?? data?.content ?? data?.response ?? JSON.stringify(data);
}

/* ── Render: user bubble ─────────────────────────────────── */
function appendUserMessage(text) {
  const wrapper = createWrapper('user');
  wrapper.innerHTML = `
    <div class="msg-avatar user-av" aria-hidden="true">🧑‍🍳</div>
    <div>
      <div class="bubble">${escHtml(text)}</div>
      <p class="msg-time">${getTime()}</p>
    </div>`;
  messagesArea.appendChild(wrapper);
  scrollBottom();
}

/* ── Render: bot bubble with typing animation ─────────────── */
function appendBotMessage(text) {
  const wrapper = createWrapper('bot');
  const bubble  = document.createElement('div');
  bubble.className = 'bubble';

  wrapper.innerHTML = `<div class="msg-avatar bot-av" aria-hidden="true">🍳</div>`;
  const contentCol = document.createElement('div');
  contentCol.appendChild(bubble);

  const timeEl = document.createElement('p');
  timeEl.className = 'msg-time';
  timeEl.textContent = getTime();
  contentCol.appendChild(timeEl);

  wrapper.appendChild(contentCol);
  messagesArea.appendChild(wrapper);
  scrollBottom();

  // Typing animation — reveal characters progressively
  typeText(bubble, text);
}

/* ── Render: recipe card grid ────────────────────────────── */
function appendRecipeCards(items) {
  const wrapper = createWrapper('bot');
  wrapper.style.maxWidth = '100%';

  wrapper.innerHTML = `<div class="msg-avatar bot-av" aria-hidden="true">🍳</div>`;

  const col = document.createElement('div');
  col.style.flex = '1';
  col.style.minWidth = '0';

  // Optional intro line
  const intro = document.createElement('div');
  intro.className = 'bubble';
  intro.style.marginBottom = '12px';
  intro.textContent = `Here are ${items.length} recipe${items.length > 1 ? 's' : ''} for you:`;
  col.appendChild(intro);

  const grid = document.createElement('div');
  grid.className = 'recipe-grid';

  items.forEach((item, i) => {
    grid.appendChild(buildRecipeCard(item, i));
  });

  col.appendChild(grid);

  const timeEl = document.createElement('p');
  timeEl.className = 'msg-time';
  timeEl.textContent = getTime();
  col.appendChild(timeEl);

  wrapper.appendChild(col);
  messagesArea.appendChild(wrapper);
  scrollBottom();
}

/* Build a single recipe card */
function buildRecipeCard(item, index) {
  const card = document.createElement('div');
  card.className = 'recipe-card';
  card.style.animationDelay = `${index * 0.07}s`;

  const name  = item.name  ?? item.title       ?? 'Untitled Recipe';
  const desc  = item.description ?? item.summary ?? item.desc ?? '';
  const image = item.image ?? item.thumbnail    ?? item.img   ?? '';
  const tag   = item.category ?? item.cuisine   ?? item.type  ?? 'Recipe';

  card.innerHTML = `
    ${image
      ? `<img src="${escHtml(image)}" alt="${escHtml(name)}" loading="lazy"
             onerror="this.style.display='none'">`
      : `<div style="height:80px;background:#1a1a1a;display:flex;align-items:center;
                     justify-content:center;font-size:32px">🍽️</div>`
    }
    <div class="recipe-card-body">
      <div class="recipe-card-name">${escHtml(name)}</div>
      ${desc ? `<div class="recipe-card-desc">${escHtml(desc)}</div>` : ''}
      <span class="recipe-card-tag">${escHtml(tag)}</span>
    </div>`;

  return card;
}

/* ── Typing text animation ───────────────────────────────── */
function typeText(el, text, speed = 14) {
  let i = 0;
  const chars = [...text]; // unicode-safe split
  el.textContent = '';

  const tick = () => {
    if (i < chars.length) {
      el.textContent += chars[i++];
      scrollBottom();
      setTimeout(tick, speed);
    }
  };
  tick();
}

/* ── Typing indicator (three bouncing dots) ──────────────── */
function showTypingIndicator() {
  const wrapper = document.createElement('div');
  wrapper.className = 'typing-wrapper';
  wrapper.id = 'typing-indicator';
  wrapper.innerHTML = `
    <div class="msg-avatar bot-av" aria-hidden="true">🍳</div>
    <div class="typing-bubble">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>`;
  messagesArea.appendChild(wrapper);
  scrollBottom();
  return wrapper;
}

function removeTypingIndicator(el) {
  if (el && el.parentNode) el.parentNode.removeChild(el);
}

/* ── Loading state toggle ────────────────────────────────── */
function setLoading(state) {
  isLoading = state;
  userInput.disabled = state;
  sendBtn.disabled   = state;
  if (!state) userInput.focus();
}

/* ── Error toast ─────────────────────────────────────────── */
let toastTimer;
function showToast(msg) {
  toast.textContent = msg;
  toast.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 4000);
}

/* ── Helpers ─────────────────────────────────────────────── */
function createWrapper(role) {
  const el = document.createElement('div');
  el.className = `message-wrapper ${role}`;
  return el;
}

function scrollBottom() {
  messagesArea.scrollTo({ top: messagesArea.scrollHeight, behavior: 'smooth' });
}

function getTime() {
  return new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
}

function escHtml(str) {
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;');
}
</script>
</body>
</html>