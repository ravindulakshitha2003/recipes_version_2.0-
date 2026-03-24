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
      --primary-bg:    #121212;
      --accent:        #ff7b2c;
      --accent-dim:    rgba(255,123,44,0.08);
      --text-primary:  #f5f5f5;
      --text-secondary:#b0b0b0;
      --radius:        12px;
      --ease:          all 0.3s ease;
      --shadow-md:     0 12px 28px rgba(0,0,0,0.4);
      --glass-border:  rgba(255,255,255,0.06);
      --wa:            #25d366;
      --wa-dark:       #1ebe5d;
      --input-bg:      rgba(0,0,0,0.35);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
      min-height: 100%;
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--primary-bg);
      color: var(--text-primary);
      overflow-x: hidden;
    }

    /* ─── Background orbs ─────────────────────── */
    .bg-canvas { position: fixed; inset: 0; z-index: 0; overflow: hidden; pointer-events: none; }
    .orb { position: absolute; border-radius: 50%; filter: blur(80px); opacity: .17; animation: drift 12s ease-in-out infinite alternate; }
    .orb-1 { width:520px;height:520px;background:var(--accent);top:-200px;left:-130px; }
    .orb-2 { width:380px;height:380px;background:#c43cff;bottom:-150px;right:-90px;animation-delay:-4s; }
    .orb-3 { width:260px;height:260px;background:#3cc8ff;top:45%;left:58%;animation-delay:-8s; }
    @keyframes drift { from{transform:translate(0,0)scale(1)} to{transform:translate(28px,18px)scale(1.07)} }
    .bg-canvas::after {
      content:''; position:absolute; inset:0; pointer-events:none;
      background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
      opacity:.03;
    }

    /* ─── Page layout ─────────────────────────── */
    .page {
      position: relative; z-index: 1;
      min-height: 100vh;
      display: flex; align-items: center; justify-content: center;
      padding: 2.5rem 1rem;
    }

    /* ─── Card ────────────────────────────────── */
    .card {
      width: 100%; max-width: 580px;
      background: rgba(37,37,37,.55);
      backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);
      border: 1px solid var(--glass-border);
      border-radius: 24px;
      padding: 3.25rem 3rem 2.75rem;
      box-shadow: var(--shadow-md), 0 0 0 1px rgba(255,255,255,.03) inset;
      animation: fadeUp .8s cubic-bezier(.22,1,.36,1) both;
    }
    @keyframes fadeUp { from{opacity:0;transform:translateY(32px)} to{opacity:1;transform:translateY(0)} }

    /* ─── Icon ────────────────────────────────── */
    .icon-wrap { display:flex; justify-content:center; margin-bottom:1.75rem; animation:fadeUp .8s .08s cubic-bezier(.22,1,.36,1) both; }
    .icon-ring {
      position:relative; width:84px; height:84px;
      display:flex; align-items:center; justify-content:center;
    }
    .icon-ring::before { content:''; position:absolute; inset:0; border-radius:50%; background:var(--accent-dim); border:1.5px solid rgba(255,123,44,.3); animation:pulse-ring 3s ease-in-out infinite; }
    .icon-ring::after  { content:''; position:absolute; inset:-11px; border-radius:50%; border:1px solid rgba(255,123,44,.1); animation:pulse-ring 3s ease-in-out .4s infinite; }
    @keyframes pulse-ring { 0%,100%{transform:scale(1);opacity:1} 50%{transform:scale(1.09);opacity:.45} }
    .icon-svg { width:38px; height:38px; color:var(--accent); position:relative; z-index:1; animation:float 4s ease-in-out infinite; }
    @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-5px)} }

    /* ─── Error code ──────────────────────────── */
    .error-code {
      font-family: 'ClashDisplay-Variable','Clash Display',sans-serif;
      font-size: clamp(5rem,19vw,7.5rem); font-weight:700; line-height:1; text-align:center;
      background: linear-gradient(135deg,#ff7b2c 0%,#ff9f5a 50%,#ffbc8a 100%);
      -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
      letter-spacing:-6px; user-select:none;
      animation: fadeUp .8s .14s cubic-bezier(.22,1,.36,1) both;
    }

    /* ─── Heading & sub ───────────────────────── */
    .error-title {
      font-family:'ClashDisplay-Variable','Clash Display',sans-serif;
      font-size:1.45rem; font-weight:600; text-align:center;
      color:var(--text-primary); letter-spacing:-.3px; margin-top:.45rem;
      animation: fadeUp .8s .2s cubic-bezier(.22,1,.36,1) both;
    }
    .error-msg {
      font-size:.93rem; font-weight:400; color:var(--text-secondary);
      text-align:center; line-height:1.75; margin-top:.65rem; letter-spacing:.01em;
      animation: fadeUp .8s .27s cubic-bezier(.22,1,.36,1) both;
    }

    /* ─── Divider ─────────────────────────────── */
    .divider {
      height:1px;
      background:linear-gradient(90deg,transparent,rgba(255,255,255,.07),transparent);
      margin:1.9rem 0;
      animation: fadeUp .8s .33s cubic-bezier(.22,1,.36,1) both;
    }

    /* ─── Nav buttons ─────────────────────────── */
    .btn-group { display:flex; gap:.7rem; justify-content:center; flex-wrap:wrap; animation:fadeUp .8s .38s cubic-bezier(.22,1,.36,1) both; }
    .btn {
      display:inline-flex; align-items:center; gap:.45rem;
      padding:.72rem 1.45rem; border-radius:var(--radius);
      font-family:'Plus Jakarta Sans',sans-serif; font-size:.875rem; font-weight:600; letter-spacing:.01em;
      cursor:pointer; transition:var(--ease); border:none; text-decoration:none; white-space:nowrap;
    }
    .btn-primary { background:var(--accent); color:#fff; box-shadow:0 4px 18px rgba(255,123,44,.35); }
    .btn-primary:hover { background:#ff8f45; transform:translateY(-2px); box-shadow:0 8px 26px rgba(255,123,44,.5); }
    .btn-primary:active { transform:translateY(0); }
    .btn-ghost { background:transparent; color:var(--text-secondary); border:1px solid var(--glass-border); }
    .btn-ghost:hover { color:var(--text-primary); background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12); transform:translateY(-2px); }
    .btn-ghost:active { transform:translateY(0); }

    /* ════════════════════════════════════════════
       CONTACT SECTION  —  always visible inside card
       ════════════════════════════════════════════ */
    .contact-section {
      margin-top: 1.6rem;
      animation: fadeUp .8s .44s cubic-bezier(.22,1,.36,1) both;
    }

    /* section header row */
    .contact-header {
      display: flex; align-items: center; gap: .65rem;
      margin-bottom: 1.1rem;
    }
    .contact-header-line {
      flex: 1; height: 1px;
      background: linear-gradient(90deg,transparent,rgba(255,255,255,.07));
    }
    .contact-header-line.rev {
      background: linear-gradient(270deg,transparent,rgba(255,255,255,.07));
    }
    .contact-badge {
      display: inline-flex; align-items: center; gap: .35rem;
      background: rgba(37,211,102,.1); color: var(--wa);
      font-family:'Plus Jakarta Sans',sans-serif;
      font-size:.68rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase;
      padding:.28rem .8rem; border-radius:999px;
      border:1px solid rgba(37,211,102,.22); white-space:nowrap;
    }

    /* WhatsApp CTA button — always visible */
    .wa-card-btn {
      display: flex; align-items: center; justify-content: space-between;
      width: 100%;
      background: linear-gradient(135deg, rgba(37,211,102,.12) 0%, rgba(37,211,102,.06) 100%);
      border: 1px solid rgba(37,211,102,.25);
      border-radius: var(--radius);
      padding: .9rem 1.1rem;
      cursor: pointer;
      transition: var(--ease);
      margin-bottom: 1rem;
      text-align: left;
    }
    .wa-card-btn:hover { background:linear-gradient(135deg,rgba(37,211,102,.2) 0%,rgba(37,211,102,.1) 100%); border-color:rgba(37,211,102,.4); transform:translateY(-1px); }
    .wa-card-btn:active { transform:translateY(0); }
    .wa-card-left { display:flex; align-items:center; gap:.8rem; }
    .wa-icon-wrap {
      width:40px; height:40px; border-radius:50%;
      background:var(--wa); display:flex; align-items:center; justify-content:center;
      flex-shrink:0; box-shadow:0 4px 14px rgba(37,211,102,.35);
      position:relative;
    }
    .wa-icon-wrap::before {
      content:''; position:absolute; inset:0; border-radius:50%;
      background:var(--wa); animation:wa-pulse 2.8s ease-out infinite; z-index:-1;
    }
    @keyframes wa-pulse { 0%{transform:scale(1);opacity:.5} 70%,100%{transform:scale(1.65);opacity:0} }
    .wa-icon-wrap svg { width:20px; height:20px; fill:#fff; }
    .wa-label-main {
      font-family:'ClashDisplay-Variable','Clash Display',sans-serif;
      font-size:.95rem; font-weight:600; color:var(--text-primary); letter-spacing:-.1px;
    }
    .wa-label-sub {
      font-size:.75rem; font-weight:400; color:var(--text-secondary); margin-top:1px;
    }
    .wa-arrow { color:var(--wa); opacity:.7; transition:var(--ease); }
    .wa-card-btn:hover .wa-arrow { opacity:1; transform:translateX(3px); }

    /* ─── Always-visible form ─────────────────── */
    .contact-form {
      background: rgba(0,0,0,.25);
      border: 1px solid var(--glass-border);
      border-radius: var(--radius);
      padding: 1.25rem;
      display: flex; flex-direction:column; gap:.75rem;
    }

    .form-row { display:flex; gap:.65rem; }
    .form-row .form-field { flex:1; min-width:0; }

    .form-field { display:flex; flex-direction:column; gap:.28rem; }
    .form-label {
      font-family:'Plus Jakarta Sans',sans-serif;
      font-size:.68rem; font-weight:600; color:var(--text-secondary);
      letter-spacing:.07em; text-transform:uppercase;
    }
    .form-input, .form-textarea {
      background: var(--input-bg);
      border: 1px solid rgba(255,255,255,.09);
      border-radius: 9px;
      padding: .62rem .85rem;
      color: var(--text-primary);
      font-family:'Plus Jakarta Sans',sans-serif; font-size:.875rem; font-weight:400;
      outline:none; width:100%; transition:border-color .22s ease, box-shadow .22s ease;
    }
    .form-input::placeholder, .form-textarea::placeholder { color:rgba(255,255,255,.2); }
    .form-input:focus, .form-textarea:focus {
      border-color: var(--wa);
      box-shadow: 0 0 0 3px rgba(37,211,102,.12);
    }
    .form-input.err, .form-textarea.err {
      border-color:#ff4d4d;
      box-shadow: 0 0 0 3px rgba(255,77,77,.1);
    }
    .form-textarea { resize:none; height:88px; }

    /* send button */
    .send-btn {
      display:flex; align-items:center; justify-content:center; gap:.5rem;
      background: var(--wa); color:#fff; border:none; border-radius:9px;
      padding:.75rem 1rem;
      font-family:'Plus Jakarta Sans',sans-serif; font-size:.875rem; font-weight:600; letter-spacing:.01em;
      cursor:pointer; transition:var(--ease);
      box-shadow:0 4px 16px rgba(37,211,102,.28);
    }
    .send-btn:hover { background:var(--wa-dark); transform:translateY(-1px); box-shadow:0 8px 22px rgba(37,211,102,.42); }
    .send-btn:active { transform:translateY(0); }
    .send-btn:disabled { opacity:.55; cursor:not-allowed; transform:none; }
    .send-btn svg { width:16px; height:16px; fill:#fff; flex-shrink:0; }

    /* success banner */
    .success-banner {
      display:none; align-items:center; gap:.75rem;
      background:rgba(37,211,102,.08); border:1px solid rgba(37,211,102,.22);
      border-radius:9px; padding:.9rem 1rem;
    }
    .success-banner.show { display:flex; }
    .success-banner-icon { width:34px;height:34px;border-radius:50%;background:rgba(37,211,102,.12);border:1px solid rgba(37,211,102,.25);display:flex;align-items:center;justify-content:center;flex-shrink:0; }
    .success-banner-icon svg { width:16px;height:16px;stroke:var(--wa);fill:none;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round; }
    .success-banner-text strong { display:block;font-size:.875rem;font-weight:600;color:var(--text-primary); }
    .success-banner-text span   { font-size:.78rem;color:var(--text-secondary); }

    /* ─── Responsive ──────────────────────────── */
    @media(max-width:520px){
      .card { padding:2.5rem 1.4rem 2rem; }
      .btn-group { flex-direction:column; align-items:center; }
      .btn { width:100%; justify-content:center; }
      .form-row { flex-direction:column; }
    }
  </style>
</head>
<body>

<!-- Background -->
<div class="bg-canvas" aria-hidden="true">
  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>
  <div class="orb orb-3"></div>
</div>

<!-- Page -->
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

    <!-- ═══════════════════════════════════════
         CONTACT SECTION (always visible)
         ═══════════════════════════════════════ -->
    <div class="contact-section">

      <!-- Section label -->
      <div class="contact-header">
        <div class="contact-header-line rev"></div>
        <span class="contact-badge">
          <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
            <path d="M11.998 2C6.477 2 2 6.477 2 12c0 1.989.518 3.861 1.426 5.487L2 22l4.637-1.408A9.96 9.96 0 0 0 12 22c5.523 0 10-4.477 10-10S17.521 2 11.998 2zm.002 18a7.963 7.963 0 0 1-4.076-1.115l-.292-.173-3.027.919.895-2.955-.19-.303A7.97 7.97 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/>
          </svg>
          Contact Admin
        </span>
        <div class="contact-header-line"></div>
      </div>

      <!-- WhatsApp button row — always visible -->
      <button class="wa-card-btn" id="waDirectBtn" type="button" aria-label="Send message on WhatsApp">
        <div class="wa-card-left">
          <div class="wa-icon-wrap">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
              <path d="M11.998 2C6.477 2 2 6.477 2 12c0 1.989.518 3.861 1.426 5.487L2 22l4.637-1.408A9.96 9.96 0 0 0 12 22c5.523 0 10-4.477 10-10S17.521 2 11.998 2zm.002 18a7.963 7.963 0 0 1-4.076-1.115l-.292-.173-3.027.919.895-2.955-.19-.303A7.97 7.97 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/>
            </svg>
          </div>
          <div>
            <div class="wa-label-main">Chat on WhatsApp</div>
            <div class="wa-label-sub">Admin is online · typically replies instantly</div>
          </div>
        </div>
        <svg class="wa-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <polyline points="9 18 15 12 9 6"/>
        </svg>
      </button>

      <!-- Always-visible message form -->
      <div class="contact-form" id="contactForm">

        <div class="form-row">
          <div class="form-field">
            <label class="form-label" for="fName">Full Name</label>
            <input class="form-input" id="fName" type="text" placeholder="Ravindu" autocomplete="off" />
          </div>
          <div class="form-field">
            <label class="form-label" for="fEmail">Email</label>
            <input class="form-input" id="fEmail" type="email" placeholder="you@email.com" autocomplete="off" />
          </div>
        </div>

        <div class="form-field">
          <label class="form-label" for="fMsg">Message</label>
          <textarea class="form-textarea" id="fMsg" placeholder="Describe your issue or question…"></textarea>
        </div>

        <button class="send-btn" id="sendBtn" type="button">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
            <path d="M11.998 2C6.477 2 2 6.477 2 12c0 1.989.518 3.861 1.426 5.487L2 22l4.637-1.408A9.96 9.96 0 0 0 12 22c5.523 0 10-4.477 10-10S17.521 2 11.998 2zm.002 18a7.963 7.963 0 0 1-4.076-1.115l-.292-.173-3.027.919.895-2.955-.19-.303A7.97 7.97 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/>
          </svg>
          Send Message via WhatsApp
        </button>

        <!-- Success banner (shown after send) -->
        <div class="success-banner" id="successBanner" role="alert" aria-live="polite">
          <div class="success-banner-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <div class="success-banner-text">
            <strong>Message sent!</strong>
            <span>WhatsApp opened with your message pre-filled. Admin will reply shortly.</span>
          </div>
        </div>

      </div>
    </div>

  </div>
</main>

<script>
  // ── Set your WhatsApp number here (country code + number, no + or spaces) ──
  const WA_NUMBER = '94767004874'; // e.g. '94771234567'

  const fName   = document.getElementById('fName');
  const fEmail  = document.getElementById('fEmail');
  const fMsg    = document.getElementById('fMsg');
  const sendBtn = document.getElementById('sendBtn');
  const successBanner = document.getElementById('successBanner');
  const waDirectBtn   = document.getElementById('waDirectBtn');

  // WhatsApp CTA button scrolls/focuses the form
  waDirectBtn.addEventListener('click', () => {
    fName.focus();
    fName.scrollIntoView({ behavior:'smooth', block:'center' });
  });

  // Clear error highlight on input
  [fName, fEmail, fMsg].forEach(el =>
    el.addEventListener('input', () => el.classList.remove('err'))
  );

  // Basic email check
  function validEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

  // Send
  sendBtn.addEventListener('click', () => {
    const name  = fName.value.trim();
    const email = fEmail.value.trim();
    const msg   = fMsg.value.trim();
    let ok = true;

    if (!name)          { fName.classList.add('err');  fName.focus(); ok = false; }
    if (!validEmail(email)) { fEmail.classList.add('err'); if(ok){ fEmail.focus(); } ok = false; }
    if (!msg)           { fMsg.classList.add('err');   if(ok){ fMsg.focus(); }  ok = false; }
    if (!ok) return;

    // Build pre-filled WhatsApp message
    const text = `Hi Admin! 👋\n\nMy name is *${name}* (${email}).\n\n${msg}\n\n_(Sent from the 404 error page)_`;
    const url  = `https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(text)}`;

    sendBtn.disabled    = true;
    sendBtn.textContent = 'Opening WhatsApp…';

    window.open(url, '_blank', 'noopener,noreferrer');

    // Show success banner
    setTimeout(() => {
      successBanner.classList.add('show');
      fName.value  = '';
      fEmail.value = '';
      fMsg.value   = '';
    }, 600);

    // Reset button after 4s
    setTimeout(() => {
      sendBtn.disabled = false;
      sendBtn.innerHTML = `<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width:16px;height:16px;fill:#fff;flex-shrink:0" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.998 2C6.477 2 2 6.477 2 12c0 1.989.518 3.861 1.426 5.487L2 22l4.637-1.408A9.96 9.96 0 0 0 12 22c5.523 0 10-4.477 10-10S17.521 2 11.998 2zm.002 18a7.963 7.963 0 0 1-4.076-1.115l-.292-.173-3.027.919.895-2.955-.19-.303A7.97 7.97 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/></svg> Send Message via WhatsApp`;
      successBanner.classList.remove('show');
    }, 5000);
  });
</script>
</body>
</html>
