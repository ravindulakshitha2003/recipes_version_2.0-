<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 — Page Not Found</title>
  <!-- Clash Display (geometric display) + Plus Jakarta Sans (refined body) -->
  <link href="https://api.fontshare.com/v2/css?f[]=clash-display@500,600,700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary-bg: #121212;
      --secondary-bg: #1e1e1e;
      --card-bg: #252525;
      --accent: #ff7b2c;
      --accent-glow: rgba(255, 123, 44, 0.25);
      --accent-dim: rgba(255, 123, 44, 0.08);
      --text-primary: #f5f5f5;
      --text-secondary: #b0b0b0;
      --border-radius: 12px;
      --transition: all 0.3s ease;
      --shadow-sm: 0 8px 20px rgba(0, 0, 0, 0.3);
      --shadow-md: 0 12px 28px rgba(0, 0, 0, 0.4);
      --glass-border: rgba(255, 255, 255, 0.06);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
      height: 100%;
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--primary-bg);
      color: var(--text-primary);
      overflow-x: hidden;
    }

    /* ── Animated background ── */
    .bg-canvas {
      position: fixed;
      inset: 0;
      z-index: 0;
      overflow: hidden;
    }

    .orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      opacity: 0.18;
      animation: drift 12s ease-in-out infinite alternate;
    }

    .orb-1 {
      width: 500px; height: 500px;
      background: var(--accent);
      top: -180px; left: -120px;
      animation-delay: 0s;
    }

    .orb-2 {
      width: 380px; height: 380px;
      background: #c43cff;
      bottom: -140px; right: -80px;
      animation-delay: -4s;
    }

    .orb-3 {
      width: 260px; height: 260px;
      background: #3cc8ff;
      top: 50%; left: 55%;
      animation-delay: -8s;
    }

    @keyframes drift {
      from { transform: translate(0, 0) scale(1); }
      to   { transform: translate(30px, 20px) scale(1.07); }
    }

    /* noise texture overlay */
    .bg-canvas::after {
      content: '';
      position: absolute;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
      opacity: 0.03;
      pointer-events: none;
    }

    /* ── Layout ── */
    .page {
      position: relative;
      z-index: 1;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }

    /* ── Card ── */
    .card {
      width: 100%;
      max-width: 560px;
      background: rgba(37, 37, 37, 0.55);
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
      border: 1px solid var(--glass-border);
      border-radius: 24px;
      padding: 3.5rem 3rem;
      box-shadow: var(--shadow-md), 0 0 0 1px rgba(255,255,255,0.03) inset;
      animation: fadeUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(36px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Icon ── */
    .icon-wrap {
      display: flex;
      justify-content: center;
      margin-bottom: 2rem;
    }

    .icon-ring {
      position: relative;
      width: 88px; height: 88px;
      display: flex; align-items: center; justify-content: center;
      animation: fadeUp 0.8s 0.1s cubic-bezier(0.22,1,0.36,1) both;
    }

    .icon-ring::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 50%;
      background: var(--accent-dim);
      border: 1.5px solid rgba(255,123,44,0.3);
      animation: pulse-ring 3s ease-in-out infinite;
    }

    .icon-ring::after {
      content: '';
      position: absolute;
      inset: -12px;
      border-radius: 50%;
      border: 1px solid rgba(255,123,44,0.1);
      animation: pulse-ring 3s ease-in-out 0.4s infinite;
    }

    @keyframes pulse-ring {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.08); opacity: 0.5; }
    }

    .icon-svg {
      width: 40px; height: 40px;
      color: var(--accent);
      position: relative;
      z-index: 1;
      animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50%       { transform: translateY(-5px); }
    }

    /* ── Error number ── */
    .error-code {
      font-family: 'ClashDisplay-Variable', 'Clash Display', sans-serif;
      font-size: clamp(5rem, 20vw, 7.5rem);
      font-weight: 700;
      line-height: 1;
      text-align: center;
      background: linear-gradient(135deg, #ff7b2c 0%, #ff9f5a 50%, #ffbc8a 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -6px;
      animation: fadeUp 0.8s 0.15s cubic-bezier(0.22,1,0.36,1) both;
      user-select: none;
    }

    /* ── Text ── */
    .error-title {
      font-family: 'ClashDisplay-Variable', 'Clash Display', sans-serif;
      font-size: 1.45rem;
      font-weight: 600;
      text-align: center;
      color: var(--text-primary);
      letter-spacing: -0.3px;
      margin-top: 0.5rem;
      animation: fadeUp 0.8s 0.22s cubic-bezier(0.22,1,0.36,1) both;
    }

    .error-msg {
      font-size: 0.95rem;
      font-weight: 400;
      color: var(--text-secondary);
      text-align: center;
      line-height: 1.75;
      margin-top: 0.75rem;
      letter-spacing: 0.01em;
      animation: fadeUp 0.8s 0.3s cubic-bezier(0.22,1,0.36,1) both;
    }

    /* ── Divider ── */
    .divider {
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--glass-border), transparent);
      margin: 2rem 0;
      animation: fadeUp 0.8s 0.35s cubic-bezier(0.22,1,0.36,1) both;
    }

    /* ── Buttons ── */
    .btn-group {
      display: flex;
      gap: 0.75rem;
      justify-content: center;
      flex-wrap: wrap;
      animation: fadeUp 0.8s 0.4s cubic-bezier(0.22,1,0.36,1) both;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.75rem 1.5rem;
      border-radius: var(--border-radius);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 0.875rem;
      font-weight: 600;
      letter-spacing: 0.01em;
      cursor: pointer;
      transition: var(--transition);
      border: none;
      text-decoration: none;
      white-space: nowrap;
    }

    .btn-primary {
      background: var(--accent);
      color: #fff;
      box-shadow: 0 4px 18px rgba(255,123,44,0.35);
    }

    .btn-primary:hover {
      background: #ff8f45;
      transform: translateY(-2px);
      box-shadow: 0 8px 28px rgba(255,123,44,0.5);
    }

    .btn-primary:active { transform: translateY(0); }

    .btn-ghost {
      background: transparent;
      color: var(--text-secondary);
      border: 1px solid var(--glass-border);
    }

    .btn-ghost:hover {
      color: var(--text-primary);
      background: rgba(255,255,255,0.05);
      border-color: rgba(255,255,255,0.12);
      transform: translateY(-2px);
    }

    .btn-ghost:active { transform: translateY(0); }

    /* ── Admin help section ── */
    .help-trigger-wrap {
      text-align: center;
      margin-top: 1.5rem;
      animation: fadeUp 0.8s 0.48s cubic-bezier(0.22,1,0.36,1) both;
    }

    .help-link {
      background: none;
      border: none;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 0.82rem;
      font-weight: 500;
      color: var(--text-secondary);
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      padding: 0.3rem 0;
      transition: var(--transition);
      border-bottom: 1px dashed transparent;
    }

    .help-link:hover {
      color: var(--accent);
      border-bottom-color: var(--accent);
    }

    .help-link svg { transition: var(--transition); }
    .help-link.open svg { transform: rotate(180deg); }

    /* ── Admin panel ── */
    .admin-panel {
      overflow: hidden;
      max-height: 0;
      opacity: 0;
      transition: max-height 0.45s cubic-bezier(0.22,1,0.36,1), opacity 0.35s ease, margin-top 0.35s ease;
      margin-top: 0;
    }

    .admin-panel.visible {
      max-height: 320px;
      opacity: 1;
      margin-top: 1.25rem;
    }

    .admin-inner {
      background: rgba(255,123,44,0.05);
      border: 1px solid rgba(255,123,44,0.18);
      border-radius: var(--border-radius);
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.6rem;
      text-align: center;
    }

    .admin-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      background: rgba(255,123,44,0.12);
      color: var(--accent);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 0.3rem 0.75rem;
      border-radius: 999px;
      border: 1px solid rgba(255,123,44,0.2);
    }

    .admin-title {
      font-family: 'ClashDisplay-Variable', 'Clash Display', sans-serif;
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--text-primary);
      letter-spacing: -0.2px;
    }

    .admin-desc {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 0.86rem;
      font-weight: 400;
      color: var(--text-secondary);
      line-height: 1.65;
      max-width: 320px;
    }

    .btn-whatsapp {
      display: inline-flex;
      align-items: center;
      gap: 0.55rem;
      margin-top: 0.4rem;
      padding: 0.75rem 1.6rem;
      background: #25d366;
      color: #fff;
      border-radius: var(--border-radius);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 0.875rem;
      font-weight: 600;
      letter-spacing: 0.01em;
      text-decoration: none;
      transition: var(--transition);
      box-shadow: 0 4px 18px rgba(37,211,102,0.3);
    }

    .btn-whatsapp:hover {
      background: #20bd59;
      transform: translateY(-2px);
      box-shadow: 0 8px 28px rgba(37,211,102,0.45);
    }

    .btn-whatsapp:active { transform: translateY(0); }

    /* ── Responsive ── */
    @media (max-width: 480px) {
      .card { padding: 2.5rem 1.5rem; }
      .btn-group { flex-direction: column; align-items: center; }
      .btn { width: 100%; justify-content: center; }
    }
  </style>
</head>
<body>

  <!-- Animated background -->
  <div class="bg-canvas" aria-hidden="true">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
  </div>

  <!-- Main content -->
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

      <!-- Error code -->
      <div class="error-code" aria-label="Error 404">404</div>

      <!-- Text -->
      <h1 class="error-title">Page Not Found</h1>
      <p class="error-msg">
        Looks like this page took a wrong turn somewhere.<br>
        It might have been moved, deleted, or never existed.
      </p>

      <div class="divider" aria-hidden="true"></div>

      <!-- Action buttons -->
      <div class="btn-group">
        <a href="/" class="btn btn-primary" aria-label="Go back to homepage">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
          </svg>
          Back to Home
        </a>
        <button class="btn btn-ghost" onclick="history.back()" aria-label="Go back to previous page">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="15 18 9 12 15 6"/>
          </svg>
          Go Back
        </button>
      </div>

      <!-- Admin help trigger -->
      <div class="help-trigger-wrap">
        <button class="help-link" id="helpBtn" aria-expanded="false" aria-controls="adminPanel">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/>
          </svg>
          Need Help?
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="6 9 12 15 18 9"/>
          </svg>
        </button>
      </div>

      <!-- Admin panel -->
      <div class="admin-panel" id="adminPanel" aria-hidden="true">
        <div class="admin-inner">
          <span class="admin-badge">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
            Admin Support
          </span>
          <p class="admin-title">We're here to help</p>
          <p class="admin-desc">Need help? Contact admin directly and we'll get back to you as soon as possible.</p>
          <a class="btn-whatsapp" href="https://wa.me/+94767004874" target="_blank" rel="noopener noreferrer" aria-label="Contact admin via WhatsApp">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.998 2C6.477 2 2 6.477 2 12c0 1.989.518 3.861 1.426 5.487L2 22l4.637-1.408A9.96 9.96 0 0 0 12 22c5.523 0 10-4.477 10-10S17.521 2 11.998 2zm.002 18a7.963 7.963 0 0 1-4.076-1.115l-.292-.173-3.027.919.895-2.955-.19-.303A7.97 7.97 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/>
            </svg>
            Chat on WhatsApp
          </a>
        </div>
      </div>

    </div>
  </main>

  <script>
    const helpBtn   = document.getElementById('helpBtn');
    const adminPanel = document.getElementById('adminPanel');

    helpBtn.addEventListener('click', () => {
      const isOpen = adminPanel.classList.contains('visible');
      adminPanel.classList.toggle('visible', !isOpen);
      adminPanel.setAttribute('aria-hidden', String(isOpen));
      helpBtn.setAttribute('aria-expanded', String(!isOpen));
      helpBtn.classList.toggle('open', !isOpen);
    });
  </script>

</body>
</html>
