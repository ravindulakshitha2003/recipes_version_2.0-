<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 — Page Not Found</title>
  <link href="https://api.fontshare.com/v2/css?f[]=clash-display@500,600,700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary-bg:     #121212;
      --accent:         #ff7b2c;
      --accent-dim:     rgba(255,123,44,0.08);
      --text-primary:   #f5f5f5;
      --text-secondary: #b0b0b0;
      --radius:         12px;
      --ease:           all 0.3s ease;
      --shadow-md:      0 12px 28px rgba(0,0,0,0.4);
      --glass-border:   rgba(255,255,255,0.06);
      --wa:             #25d366;
      --wa-dark:        #1ebe5d;
      --tg:             #29a8e9;
      --tg-dark:        #1d90cc;
      --input-bg:       rgba(0,0,0,0.35);
    }

    *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }

    html, body {
      min-height:100%;
      font-family:'Plus Jakarta Sans',sans-serif;
      background:var(--primary-bg);
      color:var(--text-primary);
      overflow-x:hidden;
    }

    /* ── Background ─────────────────────────────── */
    .bg-canvas { position:fixed;inset:0;z-index:0;overflow:hidden;pointer-events:none; }
    .orb { position:absolute;border-radius:50%;filter:blur(80px);opacity:.17;animation:drift 12s ease-in-out infinite alternate; }
    .orb-1 { width:520px;height:520px;background:var(--accent);top:-200px;left:-130px; }
    .orb-2 { width:380px;height:380px;background:#c43cff;bottom:-150px;right:-90px;animation-delay:-4s; }
    .orb-3 { width:260px;height:260px;background:#3cc8ff;top:45%;left:58%;animation-delay:-8s; }
    @keyframes drift { from{transform:translate(0,0)scale(1)} to{transform:translate(28px,18px)scale(1.07)} }
    .bg-canvas::after {
      content:'';position:absolute;inset:0;pointer-events:none;
      background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
      opacity:.03;
    }

    /* ── Page ───────────────────────────────────── */
    .page {
      position:relative;z-index:1;
      min-height:100vh;
      display:flex;align-items:center;justify-content:center;
      padding:2.5rem 1rem;
    }

    /* ── Card ───────────────────────────────────── */
    .card {
      width:100%;max-width:600px;
      background:rgba(37,37,37,.55);
      backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);
      border:1px solid var(--glass-border);
      border-radius:24px;
      padding:3.25rem 3rem 2.75rem;
      box-shadow:var(--shadow-md),0 0 0 1px rgba(255,255,255,.03) inset;
      animation:fadeUp .8s cubic-bezier(.22,1,.36,1) both;
    }
    @keyframes fadeUp { from{opacity:0;transform:translateY(32px)} to{opacity:1;transform:translateY(0)} }

    /* ── Icon ───────────────────────────────────── */
    .icon-wrap { display:flex;justify-content:center;margin-bottom:1.75rem;animation:fadeUp .8s .08s cubic-bezier(.22,1,.36,1) both; }
    .icon-ring { position:relative;width:84px;height:84px;display:flex;align-items:center;justify-content:center; }
    .icon-ring::before { content:'';position:absolute;inset:0;border-radius:50%;background:var(--accent-dim);border:1.5px solid rgba(255,123,44,.3);animation:pulse-ring 3s ease-in-out infinite; }
    .icon-ring::after  { content:'';position:absolute;inset:-11px;border-radius:50%;border:1px solid rgba(255,123,44,.1);animation:pulse-ring 3s ease-in-out .4s infinite; }
    @keyframes pulse-ring { 0%,100%{transform:scale(1);opacity:1} 50%{transform:scale(1.09);opacity:.45} }
    .icon-svg { width:38px;height:38px;color:var(--accent);position:relative;z-index:1;animation:float 4s ease-in-out infinite; }
    @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-5px)} }

    /* ── Error code ─────────────────────────────── */
    .error-code {
      font-family:'ClashDisplay-Variable','Clash Display',sans-serif;
      font-size:clamp(5rem,19vw,7.5rem);font-weight:700;line-height:1;text-align:center;
      background:linear-gradient(135deg,#ff7b2c 0%,#ff9f5a 50%,#ffbc8a 100%);
      -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
      letter-spacing:-6px;user-select:none;
      animation:fadeUp .8s .14s cubic-bezier(.22,1,.36,1) both;
    }
    .error-title {
      font-family:'ClashDisplay-Variable','Clash Display',sans-serif;
      font-size:1.45rem;font-weight:600;text-align:center;
      color:var(--text-primary);letter-spacing:-.3px;margin-top:.45rem;
      animation:fadeUp .8s .2s cubic-bezier(.22,1,.36,1) both;
    }
    .error-msg {
      font-size:.93rem;font-weight:400;color:var(--text-secondary);
      text-align:center;line-height:1.75;margin-top:.65rem;letter-spacing:.01em;
      animation:fadeUp .8s .27s cubic-bezier(.22,1,.36,1) both;
    }

    /* ── Divider ────────────────────────────────── */
    .divider {
      height:1px;
      background:linear-gradient(90deg,transparent,rgba(255,255,255,.07),transparent);
      margin:1.9rem 0;
      animation:fadeUp .8s .33s cubic-bezier(.22,1,.36,1) both;
    }

    /* ── Nav buttons ────────────────────────────── */
    .btn-group { display:flex;gap:.7rem;justify-content:center;flex-wrap:wrap;animation:fadeUp .8s .38s cubic-bezier(.22,1,.36,1) both; }
    .btn {
      display:inline-flex;align-items:center;gap:.45rem;
      padding:.72rem 1.45rem;border-radius:var(--radius);
      font-family:'Plus Jakarta Sans',sans-serif;font-size:.875rem;font-weight:600;letter-spacing:.01em;
      cursor:pointer;transition:var(--ease);border:none;text-decoration:none;white-space:nowrap;
    }
    .btn-primary { background:var(--accent);color:#fff;box-shadow:0 4px 18px rgba(255,123,44,.35); }
    .btn-primary:hover { background:#ff8f45;transform:translateY(-2px);box-shadow:0 8px 26px rgba(255,123,44,.5); }
    .btn-primary:active { transform:translateY(0); }
    .btn-ghost { background:transparent;color:var(--text-secondary);border:1px solid var(--glass-border); }
    .btn-ghost:hover { color:var(--text-primary);background:rgba(255,255,255,.05);border-color:rgba(255,255,255,.12);transform:translateY(-2px); }
    .btn-ghost:active { transform:translateY(0); }

    /* ════════════════════════════════════════════
       CONTACT SECTION
       ════════════════════════════════════════════ */
    .contact-section { margin-top:1.75rem;animation:fadeUp .8s .44s cubic-bezier(.22,1,.36,1) both; }

    /* section label */
    .section-label {
      display:flex;align-items:center;gap:.65rem;margin-bottom:1.1rem;
    }
    .label-line { flex:1;height:1px;background:linear-gradient(90deg,transparent,rgba(255,255,255,.07)); }
    .label-line.rev { background:linear-gradient(270deg,transparent,rgba(255,255,255,.07)); }
    .label-pill {
      display:inline-flex;align-items:center;gap:.4rem;
      font-family:'Plus Jakarta Sans',sans-serif;
      font-size:.68rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;
      padding:.28rem .85rem;border-radius:999px;white-space:nowrap;
      background:rgba(255,255,255,.05);color:var(--text-secondary);
      border:1px solid var(--glass-border);
    }

    /* ── Tab switcher ───────────────────────────── */
    .tab-bar {
      display:grid;grid-template-columns:1fr 1fr;
      background:rgba(0,0,0,.3);
      border:1px solid var(--glass-border);
      border-radius:var(--radius);
      padding:4px;
      margin-bottom:1rem;
    }
    .tab-btn {
      display:flex;align-items:center;justify-content:center;gap:.45rem;
      padding:.6rem .5rem;border-radius:9px;
      font-family:'Plus Jakarta Sans',sans-serif;font-size:.82rem;font-weight:600;
      cursor:pointer;border:none;background:transparent;
      color:var(--text-secondary);transition:var(--ease);
    }
    .tab-btn svg { width:16px;height:16px;flex-shrink:0;transition:var(--ease); }
    .tab-btn.active-tg  { background:rgba(41,168,233,.15);color:var(--tg);box-shadow:0 2px 10px rgba(41,168,233,.15); }
    .tab-btn.active-wa  { background:rgba(37,211,102,.15);color:var(--wa);box-shadow:0 2px 10px rgba(37,211,102,.15); }

    /* ── Panel wrapper ──────────────────────────── */
    .panel { display:none; }
    .panel.active { display:block; }

    /* ── Shared form styles ─────────────────────── */
    .contact-form {
      background:rgba(0,0,0,.25);
      border:1px solid var(--glass-border);
      border-radius:var(--radius);
      padding:1.25rem;
      display:flex;flex-direction:column;gap:.75rem;
    }
    .form-row { display:flex;gap:.65rem; }
    .form-row .form-field { flex:1;min-width:0; }
    .form-field { display:flex;flex-direction:column;gap:.28rem; }
    .form-label {
      font-family:'Plus Jakarta Sans',sans-serif;
      font-size:.68rem;font-weight:600;color:var(--text-secondary);
      letter-spacing:.07em;text-transform:uppercase;
    }
    .form-input, .form-textarea {
      background:var(--input-bg);
      border:1px solid rgba(255,255,255,.09);
      border-radius:9px;
      padding:.62rem .85rem;
      color:var(--text-primary);
      font-family:'Plus Jakarta Sans',sans-serif;font-size:.875rem;
      outline:none;width:100%;
      transition:border-color .22s ease,box-shadow .22s ease;
    }
    .form-input::placeholder,.form-textarea::placeholder { color:rgba(255,255,255,.2); }
    .form-textarea { resize:none;height:88px; }
    .form-input.err,.form-textarea.err {
      border-color:#ff4d4d;
      box-shadow:0 0 0 3px rgba(255,77,77,.1);
    }

    /* Telegram focus */
    .tg-panel .form-input:focus,
    .tg-panel .form-textarea:focus {
      border-color:var(--tg);
      box-shadow:0 0 0 3px rgba(41,168,233,.12);
    }

    /* WhatsApp focus */
    .wa-panel .form-input:focus,
    .wa-panel .form-textarea:focus {
      border-color:var(--wa);
      box-shadow:0 0 0 3px rgba(37,211,102,.12);
    }

    /* ── Send buttons ───────────────────────────── */
    .send-btn {
      display:flex;align-items:center;justify-content:center;gap:.5rem;
      border:none;border-radius:9px;
      padding:.78rem 1rem;
      font-family:'Plus Jakarta Sans',sans-serif;font-size:.875rem;font-weight:600;letter-spacing:.01em;
      cursor:pointer;transition:var(--ease);color:#fff;
    }
    .send-btn svg { width:17px;height:17px;fill:#fff;flex-shrink:0; }
    .send-btn:disabled { opacity:.55;cursor:not-allowed;transform:none !important; }

    .send-btn-tg {
      background:var(--tg);
      box-shadow:0 4px 16px rgba(41,168,233,.28);
    }
    .send-btn-tg:hover:not(:disabled) { background:var(--tg-dark);transform:translateY(-1px);box-shadow:0 8px 22px rgba(41,168,233,.42); }
    .send-btn-tg:active:not(:disabled) { transform:translateY(0); }

    .send-btn-wa {
      background:var(--wa);
      box-shadow:0 4px 16px rgba(37,211,102,.28);
    }
    .send-btn-wa:hover:not(:disabled) { background:var(--wa-dark);transform:translateY(-1px);box-shadow:0 8px 22px rgba(37,211,102,.42); }
    .send-btn-wa:active:not(:disabled) { transform:translateY(0); }

    /* ── Info note (WhatsApp) ───────────────────── */
    .info-note {
      display:flex;align-items:flex-start;gap:.5rem;
      background:rgba(37,211,102,.05);
      border:1px solid rgba(37,211,102,.15);
      border-radius:8px;padding:.65rem .85rem;
      font-size:.75rem;color:var(--text-secondary);line-height:1.55;
    }
    .info-note svg { flex-shrink:0;margin-top:1px;color:var(--wa); }

    /* ── Status banners ─────────────────────────── */
    .status-banner {
      display:none;align-items:center;gap:.75rem;
      border-radius:9px;padding:.9rem 1rem;
    }
    .status-banner.show { display:flex; }
    .status-banner.success {
      background:rgba(37,211,102,.07);
      border:1px solid rgba(37,211,102,.22);
    }
    .status-banner.error {
      background:rgba(255,77,77,.07);
      border:1px solid rgba(255,77,77,.22);
    }
    .banner-icon {
      width:34px;height:34px;border-radius:50%;
      display:flex;align-items:center;justify-content:center;flex-shrink:0;
    }
    .success .banner-icon { background:rgba(37,211,102,.12);border:1px solid rgba(37,211,102,.25); }
    .error   .banner-icon { background:rgba(255,77,77,.12);border:1px solid rgba(255,77,77,.25); }
    .banner-icon svg { width:16px;height:16px;fill:none;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round; }
    .success .banner-icon svg { stroke:#25d366; }
    .error   .banner-icon svg { stroke:#ff4d4d; }
    .banner-text strong { display:block;font-size:.875rem;font-weight:600;color:var(--text-primary); }
    .banner-text span   { font-size:.78rem;color:var(--text-secondary); }

    /* sending spinner */
    .spinner {
      width:16px;height:16px;border-radius:50%;flex-shrink:0;
      border:2px solid rgba(255,255,255,.3);
      border-top-color:#fff;
      animation:spin .7s linear infinite;
    }
    @keyframes spin { to{transform:rotate(360deg)} }

    /* ── Responsive ─────────────────────────────── */
    @media(max-width:520px){
      .card { padding:2.5rem 1.4rem 2rem; }
      .btn-group { flex-direction:column;align-items:center; }
      .btn { width:100%;justify-content:center; }
      .form-row { flex-direction:column; }
    }
  </style>
</head>
<body>

<div class="bg-canvas" aria-hidden="true">
  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>
  <div class="orb orb-3"></div>
</div>

<main class="page" role="main">
  <div class="card">

    <!-- Icon -->
    <div class="icon-wrap" aria-hidden="true">
      <div class="icon-ring">
        <svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/>
          <line x1="12" y1="8" x2="12" y2="12"/>
          <line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
      </div>
    </div>

    <!-- Error -->
    <div class="error-code" aria-label="Error 404">404</div>
    <h1 class="error-title">Page Not Found</h1>
    <p class="error-msg">
      Looks like this page took a wrong turn somewhere.<br>
      It might have been moved, deleted, or never existed.
    </p>

    <div class="divider" aria-hidden="true"></div>

    <!-- Nav buttons -->
    <div class="btn-group">
      <a href="/" class="btn btn-primary" aria-label="Go back to homepage">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
        Back to Home
      </a>
      <button class="btn btn-ghost" onclick="history.back()" aria-label="Go to previous page">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <polyline points="15 18 9 12 15 6"/>
        </svg>
        Go Back
      </button>
    </div>

    <!-- ═══════════════════════════════════════════
         CONTACT SECTION
         ═══════════════════════════════════════════ -->
    <div class="contact-section">

      <div class="section-label">
        <div class="label-line rev"></div>
        <span class="label-pill">
          <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
          </svg>
          Contact Admin
        </span>
        <div class="label-line"></div>
      </div>

      <!-- Tab switcher -->
      <div class="tab-bar" role="tablist">
        <button class="tab-btn active-tg" id="tab-tg" role="tab" aria-selected="true" aria-controls="panel-tg" onclick="switchTab('tg')">
          <!-- Telegram plane icon -->
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.248-1.97 9.289c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.28 13.99l-2.95-.924c-.64-.203-.658-.64.135-.95l11.57-4.461c.537-.194 1.006.131.527.593z"/>
          </svg>
          Send via Telegram
        </button>
        <button class="tab-btn" id="tab-wa" role="tab" aria-selected="false" aria-controls="panel-wa" onclick="switchTab('wa')">
          <!-- WhatsApp icon -->
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
            <path d="M11.998 2C6.477 2 2 6.477 2 12c0 1.989.518 3.861 1.426 5.487L2 22l4.637-1.408A9.96 9.96 0 0 0 12 22c5.523 0 10-4.477 10-10S17.521 2 11.998 2zm.002 18a7.963 7.963 0 0 1-4.076-1.115l-.292-.173-3.027.919.895-2.955-.19-.303A7.97 7.97 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/>
          </svg>
          Send via WhatsApp
        </button>
      </div>

      <!-- ─── TELEGRAM PANEL ──────────────────── -->
      <div class="panel tg-panel active" id="panel-tg" role="tabpanel" aria-labelledby="tab-tg">
        <div class="contact-form">

          <div class="form-row">
            <div class="form-field">
              <label class="form-label" for="tg-name">Full Name</label>
              <input class="form-input" id="tg-name" type="text" placeholder="Ravindu" autocomplete="off" />
            </div>
            <div class="form-field">
              <label class="form-label" for="tg-email">Email</label>
              <input class="form-input" id="tg-email" type="email" placeholder="you@email.com" autocomplete="off" />
            </div>
          </div>

          <div class="form-field">
            <label class="form-label" for="tg-msg">Message</label>
            <textarea class="form-textarea" id="tg-msg" placeholder="Describe your issue or question…"></textarea>
          </div>

          <button class="send-btn send-btn-tg" id="tg-send-btn" type="button" onclick="sendTelegram()">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.248-1.97 9.289c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.28 13.99l-2.95-.924c-.64-.203-.658-.64.135-.95l11.57-4.461c.537-.194 1.006.131.527.593z"/>
            </svg>
            Send Message via Telegram
          </button>

          <!-- Status banners -->
          <div class="status-banner success" id="tg-success" role="alert">
            <div class="banner-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="banner-text">
              <strong>Message delivered!</strong>
              <span>Your message was sent directly to admin's Telegram. They'll reply soon.</span>
            </div>
          </div>
          <div class="status-banner error" id="tg-error" role="alert">
            <div class="banner-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></div>
            <div class="banner-text">
              <strong>Failed to send</strong>
              <span id="tg-error-msg">Check your bot token and chat ID, then try again.</span>
            </div>
          </div>

        </div>
      </div>

      <!-- ─── WHATSAPP PANEL ──────────────────── -->
      <div class="panel wa-panel" id="panel-wa" role="tabpanel" aria-labelledby="tab-wa">
        <div class="contact-form">

          <div class="form-row">
            <div class="form-field">
              <label class="form-label" for="wa-name">Full Name</label>
              <input class="form-input" id="wa-name" type="text" placeholder="Ravindu" autocomplete="off" />
            </div>
            <div class="form-field">
              <label class="form-label" for="wa-email">Email</label>
              <input class="form-input" id="wa-email" type="email" placeholder="you@email.com" autocomplete="off" />
            </div>
          </div>

          <div class="form-field">
            <label class="form-label" for="wa-msg">Message</label>
            <textarea class="form-textarea" id="wa-msg" placeholder="Describe your issue or question…"></textarea>
          </div>

          <div class="info-note">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="8"/><line x1="12" y1="12" x2="12" y2="16"/>
            </svg>
            Your message will open WhatsApp pre-filled and ready to send — just tap Send inside WhatsApp.
          </div>

          <button class="send-btn send-btn-wa" type="button" onclick="sendWhatsApp()">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
              <path d="M11.998 2C6.477 2 2 6.477 2 12c0 1.989.518 3.861 1.426 5.487L2 22l4.637-1.408A9.96 9.96 0 0 0 12 22c5.523 0 10-4.477 10-10S17.521 2 11.998 2zm.002 18a7.963 7.963 0 0 1-4.076-1.115l-.292-.173-3.027.919.895-2.955-.19-.303A7.97 7.97 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/>
            </svg>
            Open WhatsApp with Message
          </button>

          <!-- WA success banner -->
          <div class="status-banner success" id="wa-success" role="alert">
            <div class="banner-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="banner-text">
              <strong>WhatsApp opened!</strong>
              <span>Your message is pre-filled — just tap Send inside WhatsApp.</span>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</main>

<script>
  /* ══════════════════════════════════════════════════════
     ⚙️  CONFIGURATION — fill these in
     ══════════════════════════════════════════════════════

     TELEGRAM:
       1. Message @BotFather on Telegram → /newbot → copy token
       2. Message @userinfobot on Telegram → copy your Chat ID

     WHATSAPP:
       Your number with country code, no + or spaces
       e.g. '94771234567' for Sri Lanka
     ══════════════════════════════════════════════════════ */
  const TG_BOT_TOKEN = 'YOUR_BOT_TOKEN';   // e.g. '7123456789:AAFxxxxxxxxxxxxxxxxxxxxxxxx'
  const TG_CHAT_ID   = 'YOUR_CHAT_ID';     // e.g. '123456789'
  const WA_NUMBER    = '94767004874';   // e.g. '94771234567'

  /* ── Tab switching ────────────────────────────────── */
  function switchTab(tab) {
    document.querySelectorAll('.tab-btn').forEach(b => b.className = 'tab-btn');
    document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));

    if (tab === 'tg') {
      document.getElementById('tab-tg').classList.add('active-tg');
      document.getElementById('panel-tg').classList.add('active');
      document.getElementById('tab-tg').setAttribute('aria-selected','true');
      document.getElementById('tab-wa').setAttribute('aria-selected','false');
    } else {
      document.getElementById('tab-wa').classList.add('active-wa');
      document.getElementById('panel-wa').classList.add('active');
      document.getElementById('tab-wa').setAttribute('aria-selected','true');
      document.getElementById('tab-tg').setAttribute('aria-selected','false');
    }
  }

  /* ── Helpers ──────────────────────────────────────── */
  function validEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

  function showBanner(id, show) {
    document.getElementById(id).classList.toggle('show', show);
  }

  function setBtn(btn, loading) {
    btn.disabled = loading;
    if (loading) {
      btn.dataset.orig = btn.innerHTML;
      btn.innerHTML = `<span class="spinner"></span> Sending…`;
    } else {
      btn.innerHTML = btn.dataset.orig;
    }
  }

  function clearFields(...ids) {
    ids.forEach(id => { document.getElementById(id).value = ''; });
  }

  function validate(nameId, emailId, msgId) {
    const name  = document.getElementById(nameId);
    const email = document.getElementById(emailId);
    const msg   = document.getElementById(msgId);
    let ok = true;

    [name, email, msg].forEach(el => el.classList.remove('err'));

    if (!name.value.trim())           { name.classList.add('err');  name.focus();  ok = false; }
    if (!validEmail(email.value.trim())) { email.classList.add('err'); if(ok){ email.focus(); } ok = false; }
    if (!msg.value.trim())            { msg.classList.add('err');  if(ok){ msg.focus(); }  ok = false; }

    return ok;
  }

  /* ── Clear errors on input ────────────────────────── */
  ['tg-name','tg-email','tg-msg','wa-name','wa-email','wa-msg'].forEach(id => {
    document.getElementById(id).addEventListener('input', function(){ this.classList.remove('err'); });
  });

  /* ══════════════════════════════════════════════════════
     TELEGRAM — direct send via Bot API (pure web, no backend)
     ══════════════════════════════════════════════════════ */
  async function sendTelegram() {
    if (!validate('tg-name','tg-email','tg-msg')) return;

    const name  = document.getElementById('tg-name').value.trim();
    const email = document.getElementById('tg-email').value.trim();
    const msg   = document.getElementById('tg-msg').value.trim();
    const btn   = document.getElementById('tg-send-btn');

    showBanner('tg-success', false);
    showBanner('tg-error',   false);
    setBtn(btn, true);

    // Format the Telegram message with markdown
    const text =
      `🚨 *New Support Request — 404 Page*\n\n` +
      `👤 *Name:* ${name}\n` +
      `📧 *Email:* ${email}\n\n` +
      `💬 *Message:*\n${msg}`;

    try {
      const res = await fetch(
        `https://api.telegram.org/bot${TG_BOT_TOKEN}/sendMessage`,
        {
          method:  'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            chat_id:    TG_CHAT_ID,
            text:       text,
            parse_mode: 'Markdown'
          })
        }
      );

      const data = await res.json();

      if (data.ok) {
        showBanner('tg-success', true);
        clearFields('tg-name','tg-email','tg-msg');
        setTimeout(() => showBanner('tg-success', false), 6000);
      } else {
        document.getElementById('tg-error-msg').textContent =
          data.description || 'Check your bot token and chat ID, then try again.';
        showBanner('tg-error', true);
      }

    } catch (err) {
      document.getElementById('tg-error-msg').textContent =
        'Network error. Please check your connection and try again.';
      showBanner('tg-error', true);
    }

    setBtn(btn, false);
  }

  /* ══════════════════════════════════════════════════════
     WHATSAPP — pre-filled deep link (opens WA with message ready)
     ══════════════════════════════════════════════════════ */
  function sendWhatsApp() {
    if (!validate('wa-name','wa-email','wa-msg')) return;

    const name  = document.getElementById('wa-name').value.trim();
    const email = document.getElementById('wa-email').value.trim();
    const msg   = document.getElementById('wa-msg').value.trim();

    showBanner('wa-success', false);

    const text = `Hi Admin! 👋\n\nMy name is *${name}* (${email}).\n\n${msg}\n\n_(Sent from the 404 error page)_`;
    const url  = `https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(text)}`;

    window.open(url, '_blank', 'noopener,noreferrer');

    setTimeout(() => {
      showBanner('wa-success', true);
      clearFields('wa-name','wa-email','wa-msg');
      setTimeout(() => showBanner('wa-success', false), 6000);
    }, 500);
  }
</script>

</body>
</html>
