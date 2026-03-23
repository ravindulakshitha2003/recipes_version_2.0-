<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chef AI — Your Culinary Companion</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary-bg:#121212;--secondary-bg:#1e1e1e;--card-bg:#252525;
      --accent:#ff7b2c;--accent-dim:rgba(255,123,44,.12);--accent-glow:rgba(255,123,44,.35);
      --text-primary:#f5f5f5;--text-secondary:#b0b0b0;
      --border-radius:12px;--transition:all 0.3s ease;
      --shadow-sm:0 8px 20px rgba(0,0,0,.3);--border-subtle:rgba(255,255,255,.06);
    }
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
    html,body{width:100%;height:100%;}
    body{
      background:var(--primary-bg);color:var(--text-primary);
      font-family:'DM Sans',sans-serif;display:flex;flex-direction:column;overflow:hidden;
      background-image:
        radial-gradient(ellipse 80% 60% at 50% -20%,rgba(255,123,44,.08) 0%,transparent 70%),
        url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.04'/%3E%3C/svg%3E");
      background-size:cover,256px 256px;
    }
    .app-shell{width:100%;height:100%;flex:1;display:flex;flex-direction:column;overflow:hidden;}

    /* ── Header ── */
    .chat-header{flex-shrink:0;display:flex;align-items:center;gap:14px;padding:18px 28px;background:var(--secondary-bg);border-bottom:1px solid var(--border-subtle);box-shadow:var(--shadow-sm);z-index:10;}
    .header-avatar{width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#e84d00);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;box-shadow:0 0 18px var(--accent-glow);animation:pulse-av 3s ease-in-out infinite;}
    @keyframes pulse-av{0%,100%{box-shadow:0 0 18px var(--accent-glow);}50%{box-shadow:0 0 32px rgba(255,123,44,.55);}}
    .header-info h1{font-family:'Playfair Display',serif;font-size:1.2rem;font-weight:700;}
    .header-info h1 span{color:var(--accent);}
    .status-pill{display:flex;align-items:center;gap:6px;font-size:.72rem;color:var(--text-secondary);text-transform:uppercase;letter-spacing:.04em;margin-top:2px;}
    .status-dot{width:7px;height:7px;border-radius:50%;background:#4ade80;animation:blink 2.5s ease-in-out infinite;}
    @keyframes blink{0%,100%{opacity:1;}50%{opacity:.3;}}
    .header-badge{margin-left:auto;background:var(--accent-dim);border:1px solid rgba(255,123,44,.25);color:var(--accent);font-size:.7rem;font-weight:500;padding:4px 10px;border-radius:20px;letter-spacing:.05em;text-transform:uppercase;}

    /* ── Messages ── */
    .messages-area{flex:1;overflow-y:auto;padding:28px 24px;display:flex;flex-direction:column;gap:20px;scroll-behavior:smooth;}
    .messages-area::-webkit-scrollbar{width:5px;}
    .messages-area::-webkit-scrollbar-thumb{background:rgba(255,123,44,.25);border-radius:10px;}

    /* ── Wrappers ── */
    .message-wrapper{display:flex;gap:12px;max-width:85%;animation:slide-in .3s cubic-bezier(.22,1,.36,1) both;}
    @keyframes slide-in{from{opacity:0;transform:translateY(14px);}to{opacity:1;transform:translateY(0);}}
    .message-wrapper.user{align-self:flex-end;flex-direction:row-reverse;}
    .message-wrapper.bot{align-self:flex-start;}
    .msg-avatar{width:34px;height:34px;border-radius:50%;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:16px;margin-top:2px;}
    .msg-avatar.bot-av{background:linear-gradient(135deg,var(--accent),#e84d00);box-shadow:0 0 12px var(--accent-glow);}
    .msg-avatar.user-av{background:#2a2a2a;border:1px solid var(--border-subtle);}

    /* ── Text Bubbles ── */
    .bubble{padding:13px 17px;border-radius:var(--border-radius);line-height:1.65;font-size:.925rem;white-space:pre-wrap;}
    .message-wrapper.user .bubble{background:linear-gradient(135deg,#c85a12,#923d08);color:#fff;border-bottom-right-radius:3px;box-shadow:var(--shadow-sm);}
    .message-wrapper.bot  .bubble{background:var(--card-bg);color:var(--text-primary);border:1px solid var(--border-subtle);border-bottom-left-radius:3px;box-shadow:var(--shadow-sm);}
    .msg-time{font-size:.68rem;color:var(--text-secondary);margin-top:5px;padding:0 4px;opacity:.7;}
    .message-wrapper.user .msg-time{text-align:right;}

    /* ── Progress Box ── */
    .progress-wrapper{align-self:flex-start;display:flex;gap:12px;max-width:85%;animation:slide-in .3s cubic-bezier(.22,1,.36,1) both;}
    .progress-box{background:var(--card-bg);border:1px solid rgba(255,123,44,.25);border-radius:14px;border-bottom-left-radius:3px;padding:18px 20px;min-width:300px;max-width:370px;box-shadow:var(--shadow-sm);}
    .pb-header{display:flex;align-items:center;gap:10px;margin-bottom:16px;}
    .pb-icon{width:36px;height:36px;border-radius:10px;background:var(--accent-dim);border:1px solid rgba(255,123,44,.3);display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
    .pb-title{font-size:.85rem;font-weight:600;color:var(--text-primary);}
    .pb-sub{font-size:.71rem;color:var(--text-secondary);margin-top:2px;}
    .pb-pct{font-size:.7rem;color:var(--accent);font-weight:700;text-align:right;margin-bottom:5px;}
    .pb-track{height:5px;background:rgba(255,255,255,.07);border-radius:5px;overflow:hidden;margin-bottom:12px;}
    .pb-fill{height:100%;border-radius:5px;width:0%;background:linear-gradient(90deg,#ff7b2c,#ffb347,#ff7b2c);background-size:200%;animation:bar-shift 1.4s linear infinite;box-shadow:0 0 10px rgba(255,123,44,.5);transition:width .4s cubic-bezier(.4,0,.2,1);}
    @keyframes bar-shift{0%{background-position:100% 0;}100%{background-position:-100% 0;}}
    .pb-steps{display:flex;flex-direction:column;gap:7px;}
    .pb-step{display:flex;align-items:center;gap:9px;font-size:.75rem;color:var(--text-secondary);opacity:.3;transition:all .3s ease;}
    .pb-step.active{opacity:1;color:var(--text-primary);}
    .pb-step.done{opacity:.8;color:#4ade80;}
    .pb-step-icon{width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:10px;flex-shrink:0;border:1px solid rgba(255,255,255,.1);background:rgba(255,255,255,.04);transition:all .25s ease;}
    .pb-step.active .pb-step-icon{background:var(--accent-dim);border-color:rgba(255,123,44,.5);animation:spin 1s linear infinite;}
    .pb-step.done  .pb-step-icon{background:rgba(74,222,128,.12);border-color:rgba(74,222,128,.35);}
    @keyframes spin{to{transform:rotate(360deg);}}

    /* ── Recipe Cards ── */
    .recipe-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:16px;width:100%;margin-top:6px;}
    .recipe-card{
      background:var(--card-bg);border-radius:16px;overflow:hidden;cursor:pointer;
      box-shadow:var(--shadow-sm);display:flex;flex-direction:column;
      border:1px solid var(--border-subtle);
      transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease;
      animation:card-pop .4s cubic-bezier(.22,1,.36,1) both;position:relative;
    }
    @keyframes card-pop{from{opacity:0;transform:translateY(18px) scale(.96);}to{opacity:1;transform:none;}}
    .recipe-card:hover{transform:translateY(-7px);box-shadow:0 24px 50px rgba(0,0,0,.65),0 0 0 1px rgba(255,123,44,.35);}
    .recipe-card:hover .rc-img img{transform:scale(1.08);}

    .rc-img{position:relative;height:160px;overflow:hidden;background:#1a1a1a;flex-shrink:0;}
    .rc-img img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .45s ease;}
    .rc-img-ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:44px;background:linear-gradient(135deg,#1c1c1c,#252525);}
    .rc-img::after{content:'';position:absolute;bottom:0;left:0;right:0;height:55%;background:linear-gradient(to top,rgba(37,37,37,.95),transparent);pointer-events:none;}
    .rc-cat{position:absolute;top:10px;left:10px;z-index:2;font-size:.6rem;font-weight:700;color:#fff;background:rgba(255,123,44,.9);padding:4px 10px;border-radius:20px;text-transform:uppercase;letter-spacing:.07em;backdrop-filter:blur(4px);box-shadow:0 2px 8px rgba(0,0,0,.35);}

    .rc-body{padding:14px 16px 16px;display:flex;flex-direction:column;flex:1;}
    .rc-name{font-family:'Playfair Display',serif;font-size:1.05rem;font-weight:700;margin-bottom:6px;color:var(--text-primary);line-height:1.3;}
    .rc-desc{font-size:.78rem;color:var(--text-secondary);line-height:1.6;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;flex:1;margin-bottom:10px;}

    .nutrition-strip{display:flex;gap:5px;flex-wrap:wrap;margin-bottom:12px;}
    .npill{font-size:.62rem;padding:3px 8px;border-radius:20px;font-weight:600;}
    .pill-cal {background:rgba(255,123,44,.15);color:#ff9a5c;border:1px solid rgba(255,123,44,.3);}
    .pill-prot{background:rgba(74,222,128,.1); color:#4ade80;border:1px solid rgba(74,222,128,.25);}
    .pill-carb{background:rgba(96,165,250,.1); color:#60a5fa;border:1px solid rgba(96,165,250,.25);}
    .pill-fat {background:rgba(250,204,21,.1); color:#facc15;border:1px solid rgba(250,204,21,.25);}

    .rc-footer{display:flex;align-items:center;justify-content:space-between;padding-top:10px;border-top:1px solid var(--border-subtle);}
    .rc-ing-count{font-size:.71rem;color:var(--text-secondary);}
    .rc-view-btn{font-size:.72rem;font-weight:600;color:#fff;background:linear-gradient(135deg,var(--accent),#e84d00);border:none;padding:5px 14px;border-radius:20px;cursor:pointer;transition:var(--transition);font-family:'DM Sans',sans-serif;box-shadow:0 3px 10px rgba(255,123,44,.3);}
    .rc-view-btn:hover{box-shadow:0 5px 18px rgba(255,123,44,.5);transform:scale(1.05);}

    /* ── Modal ── */
    .modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,.8);backdrop-filter:blur(8px);z-index:1000;display:flex;align-items:center;justify-content:center;padding:20px;animation:fade-in .2s ease both;}
    @keyframes fade-in{from{opacity:0;}to{opacity:1;}}
    .modal-box{background:var(--secondary-bg);border:1px solid rgba(255,255,255,.09);border-radius:20px;width:100%;max-width:660px;max-height:90vh;overflow-y:auto;box-shadow:0 40px 90px rgba(0,0,0,.75);animation:modal-up .3s cubic-bezier(.22,1,.36,1) both;}
    @keyframes modal-up{from{opacity:0;transform:translateY(28px) scale(.97);}to{opacity:1;transform:none;}}
    .modal-box::-webkit-scrollbar{width:4px;}
    .modal-box::-webkit-scrollbar-thumb{background:rgba(255,123,44,.3);border-radius:4px;}
    .modal-hero{position:relative;height:220px;overflow:hidden;border-radius:20px 20px 0 0;background:#1a1a1a;}
    .modal-hero img{width:100%;height:100%;object-fit:cover;display:block;}
    .modal-hero-ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:64px;background:linear-gradient(135deg,#1a1a1a,#252525);}
    .modal-hero-ov{position:absolute;inset:0;background:linear-gradient(to top,rgba(30,30,30,.95),transparent 55%);}
    .modal-hero-title{position:absolute;bottom:18px;left:22px;right:56px;}
    .modal-cat-tag{font-size:.63rem;font-weight:700;color:var(--accent);text-transform:uppercase;letter-spacing:.1em;display:block;margin-bottom:5px;}
    .modal-hero-title h2{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:#fff;text-shadow:0 2px 10px rgba(0,0,0,.6);}
    .modal-close{position:absolute;top:14px;right:14px;width:34px;height:34px;border-radius:50%;border:none;background:rgba(0,0,0,.55);backdrop-filter:blur(6px);color:#fff;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:var(--transition);}
    .modal-close:hover{background:rgba(255,123,44,.75);}
    .modal-body{padding:22px 24px 28px;}
    .modal-sec{font-size:.68rem;font-weight:700;color:var(--accent);text-transform:uppercase;letter-spacing:.12em;margin-bottom:11px;display:flex;align-items:center;gap:8px;}
    .modal-sec::after{content:'';flex:1;height:1px;background:var(--border-subtle);}
    .modal-desc{font-size:.88rem;color:var(--text-secondary);line-height:1.75;margin-bottom:24px;}
    .steps-list{display:flex;flex-direction:column;gap:12px;margin-bottom:24px;}
    .step-item{display:flex;gap:13px;align-items:flex-start;}
    .step-num{width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#e84d00);color:#fff;font-size:.75rem;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;box-shadow:0 3px 10px rgba(255,123,44,.35);}
    .step-text{font-size:.86rem;color:var(--text-secondary);line-height:1.65;padding-top:4px;}
    .ing-wrap{overflow-x:auto;border-radius:12px;border:1px solid var(--border-subtle);}
    .ing-table{width:100%;border-collapse:collapse;font-size:.78rem;}
    .ing-table thead tr{background:rgba(255,123,44,.08);border-bottom:1px solid rgba(255,123,44,.15);}
    .ing-table th{padding:10px 12px;text-align:left;color:var(--accent);font-weight:700;font-size:.67rem;text-transform:uppercase;letter-spacing:.08em;white-space:nowrap;}
    .ing-table td{padding:10px 12px;color:var(--text-secondary);border-bottom:1px solid var(--border-subtle);vertical-align:top;}
    .ing-table tbody tr:last-child td{border-bottom:none;}
    .ing-table tbody tr:hover td{background:rgba(255,255,255,.02);}
    .ing-name{color:var(--text-primary);font-weight:500;}
    .ing-note{font-size:.69rem;opacity:.65;margin-top:2px;}
    .mbadge{display:inline-block;padding:2px 7px;border-radius:8px;font-size:.67rem;font-weight:600;}

    /* Typing */
    .typing-wrapper{display:flex;align-items:center;gap:12px;align-self:flex-start;animation:slide-in .25s ease both;}
    .typing-bubble{background:var(--card-bg);border:1px solid var(--border-subtle);border-radius:var(--border-radius);border-bottom-left-radius:3px;padding:14px 18px;display:flex;gap:6px;align-items:center;}
    .dot{width:7px;height:7px;border-radius:50%;background:var(--accent);opacity:.4;animation:bdot 1.2s ease-in-out infinite;}
    .dot:nth-child(2){animation-delay:.2s;}.dot:nth-child(3){animation-delay:.4s;}
    @keyframes bdot{0%,80%,100%{transform:scale(1);opacity:.4;}40%{transform:scale(1.4);opacity:1;}}

    /* Empty state */
    .empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;flex:1;gap:14px;text-align:center;padding:40px 24px;animation:fade-up .6s ease both;}
    @keyframes fade-up{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}
    .empty-icon{font-size:54px;filter:drop-shadow(0 4px 20px rgba(255,123,44,.45));}
    .empty-state h2{font-family:'Playfair Display',serif;font-size:1.65rem;font-weight:700;}
    .empty-state h2 em{color:var(--accent);font-style:italic;}
    .empty-state p{color:var(--text-secondary);font-size:.9rem;max-width:340px;line-height:1.65;}
    .suggestions{display:flex;flex-wrap:wrap;justify-content:center;gap:9px;margin-top:8px;}
    .suggestion-chip{background:var(--card-bg);border:1px solid var(--border-subtle);color:var(--text-secondary);font-size:.8rem;padding:8px 16px;border-radius:20px;cursor:pointer;transition:var(--transition);font-family:'DM Sans',sans-serif;}
    .suggestion-chip:hover{border-color:var(--accent);color:var(--accent);background:var(--accent-dim);}

    /* Input */
    .input-bar{flex-shrink:0;padding:16px 24px 20px;background:var(--secondary-bg);border-top:1px solid var(--border-subtle);}
    .input-inner{display:flex;align-items:flex-end;gap:10px;background:var(--card-bg);border:1px solid var(--border-subtle);border-radius:16px;padding:10px 10px 10px 18px;transition:var(--transition);}
    .input-inner:focus-within{border-color:rgba(255,123,44,.45);box-shadow:0 0 0 3px rgba(255,123,44,.1);}
    #user-input{flex:1;background:transparent;border:none;outline:none;color:var(--text-primary);font-family:'DM Sans',sans-serif;font-size:.925rem;resize:none;max-height:120px;line-height:1.55;padding:2px 0;}
    #user-input::placeholder{color:var(--text-secondary);opacity:.6;}
    #user-input:disabled{opacity:.5;cursor:not-allowed;}
    #send-btn{width:40px;height:40px;border-radius:10px;border:none;background:linear-gradient(135deg,var(--accent),#e84d00);color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:var(--transition);box-shadow:0 4px 14px rgba(255,123,44,.35);}
    #send-btn:hover:not(:disabled){transform:scale(1.07);box-shadow:0 6px 20px rgba(255,123,44,.5);}
    #send-btn:disabled{opacity:.4;cursor:not-allowed;box-shadow:none;}
    .input-hint{text-align:center;font-size:.68rem;color:var(--text-secondary);opacity:.45;margin-top:8px;}

    .toast{position:fixed;bottom:90px;left:50%;transform:translateX(-50%) translateY(10px);background:#2d1515;border:1px solid rgba(255,80,80,.3);color:#ff8080;padding:10px 20px;border-radius:10px;font-size:.82rem;opacity:0;pointer-events:none;transition:var(--transition);z-index:999;white-space:nowrap;}
    .toast.show{opacity:1;transform:translateX(-50%) translateY(0);}

    @media(max-width:600px){
      .chat-header{padding:14px 16px;}.messages-area{padding:20px 14px;gap:16px;}
      .input-bar{padding:12px 14px 16px;}.message-wrapper{max-width:92%;}
      .recipe-grid{grid-template-columns:1fr 1fr;}.header-badge{display:none;}
    }
    @media(max-width:400px){.recipe-grid{grid-template-columns:1fr;}}
  </style>
</head>
<body>
<div class="app-shell">
  <header class="chat-header">
    <div class="header-avatar">🍳</div>
    <div class="header-info">
      <h1>Chef <span>AI</span></h1>
      <div class="status-pill"><div class="status-dot"></div>Online &amp; Ready to Cook</div>
    </div>
    <div class="header-badge">Culinary AI</div>
  </header>

  <div class="messages-area" id="messages-area">
    <div class="empty-state" id="empty-state">
      <div class="empty-icon">🍽️</div>
      <h2>Your personal <em>culinary guide</em></h2>
      <p>Ask me for recipes, meal ideas, ingredient substitutions, or cooking tips.</p>
      <div class="suggestions">
        <button class="suggestion-chip" onclick="chip(this)">🍗 How to cook chicken biryani</button>
        <button class="suggestion-chip" onclick="chip(this)">🍝 How to make pasta</button>
        <button class="suggestion-chip" onclick="chip(this)">🌱 Give me recipe for vegan curry</button>
        <button class="suggestion-chip" onclick="chip(this)">🍰 How to make chocolate cake</button>
      </div>
    </div>
  </div>

  <div class="input-bar">
    <div class="input-inner">
      <textarea id="user-input" rows="1" placeholder="Ask Chef AI anything…"></textarea>
      <button id="send-btn">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>
        </svg>
      </button>
    </div>
    <p class="input-hint">Enter to send · Shift+Enter for new line</p>
  </div>
</div>
<div class="toast" id="toast"></div>

<script>
/* ═══════════════════════════════════════
   CONFIG
═══════════════════════════════════════ */
const CHAT_API = 'https://gimini2api-production-8475.up.railway.app/chat';

/* ═══════════════════════════════════════
   DOM
═══════════════════════════════════════ */
const area      = document.getElementById('messages-area');
const emptyEl   = document.getElementById('empty-state');
const inputEl   = document.getElementById('user-input');
const sendEl    = document.getElementById('send-btn');
const toastEl   = document.getElementById('toast');
let busy = false;

inputEl.addEventListener('input', () => {
  inputEl.style.height = 'auto';
  inputEl.style.height = Math.min(inputEl.scrollHeight, 120) + 'px';
});
inputEl.addEventListener('keydown', e => {
  if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); send(); }
});
sendEl.addEventListener('click', send);
function chip(btn) { inputEl.value = btn.textContent.replace(/^[^\w]+/,'').trim(); send(); }

/* ═══════════════════════════════════════
   SEND
═══════════════════════════════════════ */
async function send() {
  const msg = inputEl.value.trim();
  if (!msg || busy) return;
  if (emptyEl) emptyEl.remove();

  addUserMsg(msg);
  inputEl.value = ''; inputEl.style.height = 'auto';
  setBusy(true);
  const typing = showTyping();

  try {
    /* ── Call API ── */
    const res = await fetch(CHAT_API, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ message: msg })
    });
    if (!res.ok) throw new Error(`HTTP ${res.status}`);

    /* ── Parse outer wrapper: { reply, mode } ── */
    const outer = await res.json();
    const mode  = outer.mode   ?? 'text';   // "json" or "text"
    const reply = outer.reply  ?? '';

    removeTyping(typing);

    if (mode === 'json') {
      /* ── Recipe mode: parse the reply string as JSON ── */
      const recipes = parseRecipeReply(reply);
      if (recipes && recipes.length > 0) {
        await showProgress(recipes);
      } else {
        /* Fallback: something went wrong with JSON, show raw */
        addBotMsg(reply);
      }
    } else {
      /* ── Chat mode: plain text ── */
      addBotMsg(reply);
    }

  } catch (err) {
    removeTyping(typing);
    showToast('Connection error — please try again.');
    console.error(err);
  } finally {
    setBusy(false);
  }
}

/* ═══════════════════════════════════════
   PARSE RECIPE REPLY
   The API returns reply as a string that is
   pure JSON (because of the strict prompt).
   But Gemini sometimes wraps in ``` fences
   or adds a tiny bit of text — handle all.
═══════════════════════════════════════ */
function parseRecipeReply(str) {
  if (!str) return null;

  /* 1. Strip markdown code fences if present */
  let s = str.trim()
    .replace(/^```(?:json)?\s*/i, '')
    .replace(/\s*```\s*$/, '')
    .trim();

  /* 2. Try direct parse */
  let parsed = tryJSON(s);

  /* 3. If still fails, find the first { block */
  if (!parsed) parsed = findBlock(s);

  if (!parsed) return null;

  /* 4. Extract recipes array */
  if (Array.isArray(parsed.recipes) && parsed.recipes.length) return parsed.recipes;
  if (Array.isArray(parsed) && parsed.length && isRecipe(parsed[0])) return parsed;
  return null;
}

function tryJSON(s) { try { return JSON.parse(s); } catch(_){ return null; } }

function findBlock(str) {
  const fi = str.indexOf('{'), ai = str.indexOf('[');
  if (fi < 0 && ai < 0) return null;
  let start = (fi < 0) ? ai : (ai < 0) ? fi : Math.min(fi, ai);
  const open = str[start], close = open==='{' ? '}' : ']';
  let depth=0, end=-1, inStr=false, esc=false;
  for (let i=start; i<str.length; i++) {
    const c=str[i];
    if (esc){esc=false;continue;}
    if (c==='\\'&&inStr){esc=true;continue;}
    if (c==='"'){inStr=!inStr;continue;}
    if (inStr) continue;
    if (c===open) depth++;
    if (c===close && --depth===0){end=i;break;}
  }
  if (end<0) return null;
  return tryJSON(str.slice(start, end+1));
}

function isRecipe(o) {
  return o && typeof o==='object' &&
    !!(o.r_name||o.name||o.title||o.ingredients||o.cooking_step);
}

/* ═══════════════════════════════════════
   PROGRESS → CARDS
═══════════════════════════════════════ */
async function showProgress(recipes) {
  const count = recipes.length;
  const wrapper = document.createElement('div');
  wrapper.className = 'progress-wrapper';
  const av = mkAv('bot'); 

  const box = document.createElement('div');
  box.className = 'progress-box';

  const STEPS = [
    {icon:'🔍', label:'Parsing recipe data…'},
    {icon:'📊', label:'Processing nutrition info…'},
    {icon:'🖼️', label:'Preparing images…'},
    {icon:'🃏', label:`Building ${count} card${count>1?'s':''}…`},
    {icon:'✨', label:'Almost ready…'},
  ];

  box.innerHTML = `
    <div class="pb-header">
      <div class="pb-icon">🃏</div>
      <div>
        <div class="pb-title">Creating Recipe Cards</div>
        <div class="pb-sub">Found ${count} recipe${count>1?'s':''} · building display</div>
      </div>
    </div>
    <div class="pb-pct" id="pb-pct">0%</div>
    <div class="pb-track"><div class="pb-fill" id="pb-fill"></div></div>
    <div class="pb-steps">
      ${STEPS.map((s,i)=>`
        <div class="pb-step" id="pbs${i}">
          <div class="pb-step-icon">${s.icon}</div>
          <span>${s.label}</span>
        </div>`).join('')}
    </div>`;

  wrapper.appendChild(av);
  wrapper.appendChild(box);
  area.appendChild(wrapper);
  scrollBot();

  const fillEl = box.querySelector('#pb-fill');
  const pctEl  = box.querySelector('#pb-pct');
  const dur = 1800 / STEPS.length;

  for (let i=0; i<STEPS.length; i++) {
    const el = box.querySelector(`#pbs${i}`);
    el.classList.add('active'); scrollBot();
    await animBar(fillEl, pctEl,
      Math.round(i/STEPS.length*100),
      Math.round((i+1)/STEPS.length*100), dur);
    el.classList.remove('active'); el.classList.add('done');
    el.querySelector('.pb-step-icon').textContent = '✓';
  }

  await wait(200);
  box.style.transition = 'opacity .3s ease, transform .3s ease';
  box.style.opacity = '0'; box.style.transform = 'translateY(-5px) scale(.98)';
  await wait(320);
  wrapper.remove();

  renderCards(recipes);
}

function animBar(fill, pct, from, to, dur) {
  return new Promise(resolve => {
    const t0 = performance.now();
    const tick = now => {
      const p = Math.min((now-t0)/dur, 1);
      const v = Math.round(from + (to-from)*(1-Math.pow(1-p,3)));
      fill.style.width = v+'%'; pct.textContent = v+'%';
      p < 1 ? requestAnimationFrame(tick) : resolve();
    };
    requestAnimationFrame(tick);
  });
}
const wait = ms => new Promise(r => setTimeout(r, ms));

/* ═══════════════════════════════════════
   RENDER CARDS
═══════════════════════════════════════ */
function renderCards(items) {
  const wrapper = mkWrapper('bot');
  wrapper.style.maxWidth = '100%';
  wrapper.appendChild(mkAv('bot'));

  const col = document.createElement('div');
  col.style.cssText = 'flex:1;min-width:0;';

  const intro = document.createElement('div');
  intro.className = 'bubble';
  intro.style.marginBottom = '14px';
  intro.textContent = `Here ${items.length===1?'is':'are'} ${items.length} recipe${items.length>1?'s':''} — tap any card for full details:`;
  col.appendChild(intro);

  const grid = document.createElement('div');
  grid.className = 'recipe-grid';
  items.forEach((item,i) => grid.appendChild(buildCard(item,i)));
  col.appendChild(grid);

  const t = document.createElement('p');
  t.className='msg-time'; t.textContent=getTime();
  col.appendChild(t);

  wrapper.appendChild(col);
  area.appendChild(wrapper);
  scrollBot();
}

function buildCard(item, idx) {
  const name  = item.r_name||item.name||item.title||'Untitled';
  const desc  = item.description||item.summary||'';
  const image = item.r_picture||item.image||'';
  const cat   = item.category||item.cuisine||'Recipe';
  const steps = item.cooking_step||item.steps||item.instructions||'';
  const ings  = Array.isArray(item.ingredients) ? item.ingredients : [];

  const tot = ings.reduce((a,g)=>({
    cal:  a.cal  + Number(g.calories||0),
    prot: a.prot + Number(g.protein||0),
    carb: a.carb + Number(g.carbohydrates||0),
    fat:  a.fat  + Number(g.fat||0),
  }),{cal:0,prot:0,carb:0,fat:0});

  const card = document.createElement('div');
  card.className = 'recipe-card';
  card.style.animationDelay = `${idx*0.08}s`;
  card.innerHTML = `
    <div class="rc-img">
      ${image
        ? `<img src="${x(image)}" alt="${x(name)}" loading="lazy"
               onerror="this.parentNode.innerHTML='<div class=\\'rc-img-ph\\'>🍽️</div>'">`
        : `<div class="rc-img-ph">🍽️</div>`}
      <span class="rc-cat">${x(cat)}</span>
    </div>
    <div class="rc-body">
      <div class="rc-name">${x(name)}</div>
      ${desc?`<div class="rc-desc">${x(desc)}</div>`:''}
      ${tot.cal>0?`
        <div class="nutrition-strip">
          <span class="npill pill-cal">🔥 ${Math.round(tot.cal)} kcal</span>
          ${tot.prot>0?`<span class="npill pill-prot">💪 ${tot.prot.toFixed(1)}g</span>`:''}
          ${tot.carb>0?`<span class="npill pill-carb">🌾 ${tot.carb.toFixed(1)}g</span>`:''}
          ${tot.fat>0?`<span class="npill pill-fat">🧈 ${tot.fat.toFixed(1)}g</span>`:''}
        </div>`:''}
      <div class="rc-footer">
        <span class="rc-ing-count">🥦 ${ings.length} ingredient${ings.length!==1?'s':''}</span>
        <button class="rc-view-btn">View Recipe →</button>
      </div>
    </div>`;

  const open = ()=>openModal({name,desc,image,cat,steps,ings});
  card.querySelector('.rc-view-btn').addEventListener('click',e=>{e.stopPropagation();open();});
  card.addEventListener('click', open);
  return card;
}

/* ═══════════════════════════════════════
   MODAL
═══════════════════════════════════════ */
function openModal({name,desc,image,cat,steps,ings}) {
  const stepsArr = parseSteps(steps);

  const overlay = document.createElement('div');
  overlay.className = 'modal-overlay';
  overlay.innerHTML = `
    <div class="modal-box">
      <div class="modal-hero">
        ${image
          ? `<img src="${x(image)}" alt="${x(name)}"
                 onerror="this.parentNode.innerHTML='<div class=\\'modal-hero-ph\\'>🍽️</div>'">`
          : `<div class="modal-hero-ph">🍽️</div>`}
        <div class="modal-hero-ov"></div>
        <div class="modal-hero-title">
          <span class="modal-cat-tag">${x(cat)}</span>
          <h2>${x(name)}</h2>
        </div>
        <button class="modal-close">✕</button>
      </div>
      <div class="modal-body">
        ${desc?`<p class="modal-sec">About</p><p class="modal-desc">${x(desc)}</p>`:''}
        ${stepsArr.length?`
          <p class="modal-sec">Cooking Steps</p>
          <div class="steps-list">
            ${stepsArr.map((s,i)=>`
              <div class="step-item">
                <div class="step-num">${i+1}</div>
                <div class="step-text">${x(s)}</div>
              </div>`).join('')}
          </div>`:''}
        ${ings.length?`
          <p class="modal-sec">Ingredients &amp; Nutrition</p>
          <div class="ing-wrap">
            <table class="ing-table">
              <thead><tr>
                <th>Ingredient</th><th>Qty</th>
                <th>Cal</th><th>Protein</th><th>Carbs</th><th>Fat</th>
              </tr></thead>
              <tbody>
                ${ings.map(g=>`<tr>
                  <td class="ing-name">${x(g.ingredient_name||g.name||'—')}
                    ${g.clarity?`<div class="ing-note">${x(g.clarity)}</div>`:''}</td>
                  <td>${g.quantity!=null?x(String(g.quantity)):'—'}${g.unit?' '+x(g.unit):''}</td>
                  <td><span class="mbadge pill-cal">${g.calories??'—'}</span></td>
                  <td><span class="mbadge pill-prot">${g.protein??'—'}g</span></td>
                  <td><span class="mbadge pill-carb">${g.carbohydrates??'—'}g</span></td>
                  <td><span class="mbadge pill-fat">${g.fat??'—'}g</span></td>
                </tr>`).join('')}
              </tbody>
            </table>
          </div>`:''}
      </div>
    </div>`;

  const close = () => {
    overlay.style.animation='fade-in .15s ease reverse both';
    setTimeout(()=>overlay.remove(),150);
  };
  overlay.querySelector('.modal-close').addEventListener('click', close);
  overlay.addEventListener('click', e=>{ if(e.target===overlay) close(); });
  document.addEventListener('keydown', function esc(e){
    if(e.key==='Escape'){close();document.removeEventListener('keydown',esc);}
  });
  document.body.appendChild(overlay);
}

/* ═══════════════════════════════════════
   UTILITIES
═══════════════════════════════════════ */
function parseSteps(steps) {
  if (!steps) return [];
  if (Array.isArray(steps)) return steps.map(s=>String(s).trim()).filter(Boolean);
  const str = String(steps).trim();
  // Bold **headers**
  const bold = str.split(/\*\*[^*]+\*\*:?\s*/).map(s=>s.trim()).filter(s=>s.length>2);
  if (bold.length>1) return bold;
  // Numbered list
  const num = str.split(/\s*\d+\.\s+/).map(s=>s.trim()).filter(s=>s.length>2);
  if (num.length>1) return num;
  // Newlines
  const lines = str.split(/\n+/).map(s=>s.trim()).filter(s=>s.length>2);
  if (lines.length>1) return lines;
  // Sentence split
  return str.split(/\.\s+/).map(s=>s.trim().replace(/\.$/,'')).filter(s=>s.length>2);
}

function addUserMsg(text) {
  const w = mkWrapper('user');
  w.innerHTML=`<div class="msg-avatar user-av">🧑‍🍳</div>
    <div><div class="bubble">${x(text)}</div><p class="msg-time">${getTime()}</p></div>`;
  area.appendChild(w); scrollBot();
}

function addBotMsg(text) {
  const w = mkWrapper('bot');
  const bubble = document.createElement('div'); bubble.className='bubble';
  w.appendChild(mkAv('bot'));
  const col = document.createElement('div');
  col.appendChild(bubble);
  const t=document.createElement('p'); t.className='msg-time'; t.textContent=getTime();
  col.appendChild(t); w.appendChild(col);
  area.appendChild(w); scrollBot();
  typeText(bubble, text);
}

function typeText(el, text, spd=12) {
  let i=0; const chars=[...text]; el.textContent='';
  const tick=()=>{
    if(i<chars.length){el.textContent+=chars[i++];scrollBot();setTimeout(tick,spd);}
  };
  tick();
}

function showTyping() {
  const w=document.createElement('div'); w.className='typing-wrapper';
  w.innerHTML=`<div class="msg-avatar bot-av">🍳</div>
    <div class="typing-bubble"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div>`;
  area.appendChild(w); scrollBot(); return w;
}
function removeTyping(el){if(el?.parentNode)el.parentNode.removeChild(el);}

function mkWrapper(role){
  const el=document.createElement('div'); el.className=`message-wrapper ${role}`; return el;
}
function mkAv(role){
  const el=document.createElement('div');
  el.className=`msg-avatar ${role==='bot'?'bot-av':'user-av'}`;
  el.textContent=role==='bot'?'🍳':'🧑‍🍳';
  return el;
}

function setBusy(v){busy=v;inputEl.disabled=v;sendEl.disabled=v;if(!v)inputEl.focus();}
function scrollBot(){area.scrollTo({top:area.scrollHeight,behavior:'smooth'});}
function getTime(){return new Date().toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});}
function x(s){return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');}

let toastT;
function showToast(msg){
  toastEl.textContent=msg;toastEl.classList.add('show');
  clearTimeout(toastT);toastT=setTimeout(()=>toastEl.classList.remove('show'),4000);
}
</script>
</body>
</html>
