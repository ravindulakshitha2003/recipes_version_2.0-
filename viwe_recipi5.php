<?php $id = intval($_GET['id']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>FlavorVerse – Loading...</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --primary-bg: #121212;
    --secondary-bg: #1e1e1e;
    --card-bg: #252525;
    --accent: #ff7b2c;
    --accent-dim: rgba(255,123,44,0.15);
    --accent-glow: rgba(255,123,44,0.35);
    --text-primary: #f5f5f5;
    --text-secondary: #b0b0b0;
    --border-radius: 12px;
    --transition: all 0.3s ease;
    --danger: #e74c3c;
    --card-shadow: 0 8px 32px rgba(0,0,0,0.5);
  }

  html { scroll-behavior: smooth; }

  body {
    background: var(--primary-bg);
    color: var(--text-primary);
    font-family: 'DM Sans', sans-serif;
    line-height: 1.7;
    overflow-x: hidden;
  }

  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
    pointer-events: none;
    z-index: 0;
    opacity: 0.4;
  }

  /* ── LOADER ── */
  #page-loader {
    position: fixed;
    inset: 0;
    background: var(--primary-bg);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    gap: 20px;
    transition: opacity 0.5s ease;
  }
  #page-loader.hidden { opacity: 0; pointer-events: none; }
  .loader-logo {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    font-weight: 900;
    color: var(--accent);
  }
  .loader-logo span { color: var(--text-primary); }
  .loader-spinner {
    width: 40px; height: 40px;
    border: 3px solid rgba(255,123,44,0.2);
    border-top-color: var(--accent);
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
  }
  .loader-text { font-size: 0.82rem; color: var(--text-secondary); }
  @keyframes spin { to { transform: rotate(360deg); } }

  /* ── ERROR STATE ── */
  #error-state {
    display: none;
    min-height: 80vh;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 16px;
    text-align: center;
    padding: 40px;
  }
  #error-state.show { display: flex; }
  #error-state .err-icon { font-size: 3rem; }
  #error-state h2 { font-family: 'Playfair Display', serif; font-size: 1.6rem; }
  #error-state p { color: var(--text-secondary); max-width: 400px; }

  /* ── HEADER ── */
  header {
    position: sticky;
    top: 0;
    z-index: 100;
    background: rgba(18,18,18,0.92);
    backdrop-filter: blur(14px);
    border-bottom: 1px solid rgba(255,123,44,0.2);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    height: 64px;
  }
  .logo {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 900;
    color: var(--accent);
    letter-spacing: -0.5px;
    text-decoration: none;
  }
  .logo span { color: var(--text-primary); }
  .header-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 0.78rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  .header-meta .dot { color: var(--accent); }

  /* ── HERO ── */
  .hero {
    position: relative;
    height: 480px;
    overflow: hidden;
    background: var(--secondary-bg);
  }
  .hero-img {
    width: 100%; height: 100%;
    object-fit: cover;
    filter: brightness(0.45);
    transform: scale(1.04);
    transition: transform 8s ease;
  }
  .hero:hover .hero-img { transform: scale(1); }
  .hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, #121212 0%, rgba(18,18,18,0.3) 60%, transparent 100%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 48px 60px;
  }
  .hero-tag {
    display: inline-block;
    background: var(--accent);
    color: #fff;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    padding: 4px 12px;
    border-radius: 100px;
    margin-bottom: 14px;
    width: fit-content;
  }
  .hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.2rem, 5vw, 3.8rem);
    font-weight: 900;
    line-height: 1.1;
    color: var(--text-primary);
    max-width: 700px;
  }
  .hero h1 em { font-style: italic; color: var(--accent); }
  .hero-stats {
    display: flex;
    gap: 24px;
    margin-top: 18px;
    flex-wrap: wrap;
  }
  .stat {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.84rem;
    color: var(--text-secondary);
  }
  .stat strong { color: var(--text-primary); }

  /* ── PAGE LAYOUT ── */
  .page-wrap {
    max-width: 1280px;
    margin: 0 auto;
    padding: 48px 32px 100px;
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 40px;
    position: relative;
    z-index: 1;
  }
  .main-col { display: flex; flex-direction: column; gap: 36px; }
  .sidebar  { display: flex; flex-direction: column; gap: 28px; }

  /* ── CARDS ── */
  .card {
    background: var(--card-bg);
    border-radius: var(--border-radius);
    border: 1px solid rgba(255,255,255,0.06);
    box-shadow: var(--card-shadow);
    overflow: hidden;
    transition: var(--transition);
  }
  .card:hover { border-color: rgba(255,123,44,0.2); }
  .card-header {
    padding: 20px 26px 14px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .card-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.25rem;
    font-weight: 700;
  }
  .section-icon {
    width: 32px; height: 32px;
    border-radius: 8px;
    background: var(--accent-dim);
    display: grid;
    place-items: center;
    font-size: 1rem;
    flex-shrink: 0;
  }
  .card-body { padding: 22px 26px; }

  /* ── DESCRIPTION ── */
  .recipe-desc { font-size: 0.93rem; color: var(--text-secondary); line-height: 1.85; }

  /* ── GALLERY ── */
  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
  }
  .gallery-item {
    border-radius: 8px;
    overflow: hidden;
    aspect-ratio: 4/3;
    cursor: pointer;
    position: relative;
    background: rgba(255,255,255,0.05);
  }
  .gallery-item img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease, filter 0.4s ease;
    filter: brightness(0.8);
  }
  .gallery-item:hover img { transform: scale(1.08); filter: brightness(1); }
  .gallery-item::after {
    content: '🔍';
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.4rem;
    background: rgba(255,123,44,0.28);
    opacity: 0;
    transition: opacity 0.3s;
  }
  .gallery-item:hover::after { opacity: 1; }
  .gallery-skeleton {
    background: linear-gradient(90deg, rgba(255,255,255,0.04) 25%, rgba(255,255,255,0.08) 50%, rgba(255,255,255,0.04) 75%);
    background-size: 200% 100%;
    animation: shimmer 1.4s infinite;
    aspect-ratio: 4/3;
    border-radius: 8px;
  }
  @keyframes shimmer { to { background-position: -200% 0; } }

  /* ── INGREDIENTS ── */
  .ingredients-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(155px, 1fr));
    gap: 12px;
  }
  .ingredient-chip {
    position: relative;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 10px;
    padding: 14px 16px;
    cursor: pointer;
    transition: var(--transition);
    user-select: none;
  }
  .ingredient-chip:hover {
    background: var(--accent-dim);
    border-color: var(--accent);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255,123,44,0.2);
  }
  .ing-name { font-size: 0.82rem; font-weight: 600; color: var(--text-primary); margin-bottom: 4px; }
  .ing-qty  { font-size: 0.74rem; color: var(--accent); font-weight: 500; }
  .ing-clarity {
    font-size: 0.68rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-top: 4px;
  }

  /* ── TOOLTIP ── */
  .ing-tooltip {
    position: absolute;
    bottom: calc(100% + 10px);
    left: 50%;
    transform: translateX(-50%) scale(0.92);
    width: 220px;
    background: #1a1a1a;
    border: 1px solid rgba(255,123,44,0.4);
    border-radius: 12px;
    padding: 16px;
    z-index: 200;
    box-shadow: 0 16px 40px rgba(0,0,0,0.75), 0 0 0 1px rgba(255,123,44,0.08);
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.2s ease, transform 0.2s ease;
  }
  .ingredient-chip:hover .ing-tooltip { opacity: 1; transform: translateX(-50%) scale(1); }
  .ing-tooltip::after {
    content: '';
    position: absolute;
    top: 100%; left: 50%;
    transform: translateX(-50%);
    border: 6px solid transparent;
    border-top-color: rgba(255,123,44,0.4);
  }
  .tooltip-title {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 0.95rem;
    color: var(--accent);
    margin-bottom: 10px;
    padding-bottom: 8px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
  }
  .tooltip-row {
    display: flex;
    justify-content: space-between;
    font-size: 0.74rem;
    padding: 3px 0;
    color: var(--text-secondary);
  }
  .tooltip-row span:last-child { color: var(--text-primary); font-weight: 500; }

  /* ── STEPS ── */
  .steps-list { display: flex; flex-direction: column; gap: 18px; }
  .step-item {
    display: flex;
    gap: 18px;
    align-items: flex-start;
    padding: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.05);
    background: rgba(255,255,255,0.02);
    transition: var(--transition);
  }
  .step-item:hover { border-color: rgba(255,123,44,0.22); background: rgba(255,123,44,0.04); }
  .step-num {
    width: 38px; height: 38px;
    border-radius: 50%;
    background: var(--accent-dim);
    border: 2px solid var(--accent);
    display: grid; place-items: center;
    font-family: 'Playfair Display', serif;
    font-size: 0.95rem; font-weight: 900;
    color: var(--accent);
    flex-shrink: 0;
    transition: var(--transition);
  }
  .step-item:hover .step-num { background: var(--accent); color: #fff; }
  .step-content p { font-size: 0.86rem; color: var(--text-secondary); line-height: 1.75; }

  /* ── VIDEO ── */
  .video-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    border-radius: 10px;
    overflow: hidden;
  }
  .video-container iframe {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    border: none;
  }

  /* ── NUTRITION ── */
  .nutrition-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
  .nut-box {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 8px;
    padding: 12px;
    text-align: center;
    transition: var(--transition);
  }
  .nut-box:hover { border-color: var(--accent); background: var(--accent-dim); }
  .nut-val { font-family: 'Playfair Display', serif; font-size: 1.35rem; font-weight: 700; color: var(--accent); }
  .nut-label { font-size: 0.7rem; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.8px; margin-top: 2px; }

  /* ── RATING STARS ── */
  .star-row { display: flex; justify-content: center; gap: 4px; margin: 6px 0 10px; font-size: 1rem; }
  .star-filled { color: var(--accent); }
  .star-empty  { color: #444; }

  /* ── TAGS ── */
  .tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px; }
  .tag {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 100px;
    padding: 4px 12px;
    font-size: 0.74rem;
    color: var(--text-secondary);
    transition: var(--transition);
  }
  .tag:hover { background: var(--accent-dim); color: var(--accent); border-color: var(--accent); }

  /* ── FAB ── */
  .fab-cluster {
    position: fixed;
    bottom: 32px; right: 32px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 12px;
    z-index: 300;
  }
  .fab-group {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: flex-end;
    overflow: hidden;
    max-height: 0;
    transition: max-height 0.4s ease, opacity 0.3s ease;
    opacity: 0;
  }
  .fab-group.open { max-height: 400px; opacity: 1; }
  .fab {
    display: flex;
    align-items: center;
    gap: 10px;
    border: none;
    border-radius: 100px;
    padding: 11px 20px 11px 16px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.82rem; font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    white-space: nowrap;
    box-shadow: 0 4px 16px rgba(0,0,0,0.5);
  }
  .fab-main {
    width: 54px; height: 54px;
    border-radius: 50%; padding: 0;
    background: var(--accent); color: #fff;
    font-size: 1.3rem;
    justify-content: center;
    box-shadow: 0 6px 24px rgba(255,123,44,0.5);
  }
  .fab-main:hover { transform: scale(1.1); }
  .fab-main.open  { transform: rotate(45deg); }
  .fab-delete { background: #2b1414; color: #e74c3c; border: 1px solid rgba(231,76,60,0.3); }
  .fab-delete:hover { background: #e74c3c; color: #fff; transform: translateX(-4px); }
  .fab-chat   { background: #132b1a; color: #2ecc71; border: 1px solid rgba(46,204,113,0.3); }
  .fab-chat:hover   { background: #2ecc71; color: #fff; transform: translateX(-4px); }
  .fab-pdf    { background: #131a2b; color: #3498db; border: 1px solid rgba(52,152,219,0.3); }
  .fab-pdf:hover    { background: #3498db; color: #fff; transform: translateX(-4px); }
  .fab-print  { background: #1e1e2b; color: #9b59b6; border: 1px solid rgba(155,89,182,0.3); }
  .fab-print:hover  { background: #9b59b6; color: #fff; transform: translateX(-4px); }

  /* ── MODAL ── */
  .modal-backdrop {
    position: fixed; inset: 0;
    background: rgba(0,0,0,0.78);
    backdrop-filter: blur(6px);
    z-index: 500;
    display: grid; place-items: center;
    opacity: 0; pointer-events: none;
    transition: opacity 0.3s;
  }
  .modal-backdrop.active { opacity: 1; pointer-events: all; }
  .modal {
    background: #1e1e1e;
    border: 1px solid rgba(231,76,60,0.35);
    border-radius: 16px;
    padding: 36px;
    max-width: 400px; width: 90%;
    text-align: center;
    transform: scale(0.9);
    transition: transform 0.3s;
    box-shadow: 0 24px 64px rgba(0,0,0,0.8);
  }
  .modal-backdrop.active .modal { transform: scale(1); }
  .modal-icon { font-size: 2.4rem; margin-bottom: 12px; }
  .modal h3 { font-family: 'Playfair Display', serif; font-size: 1.25rem; margin-bottom: 8px; }
  .modal p { font-size: 0.84rem; color: var(--text-secondary); margin-bottom: 24px; }
  .modal-btns { display: flex; gap: 12px; justify-content: center; }
  .btn { padding: 10px 24px; border-radius: 8px; border: none; font-family: 'DM Sans', sans-serif; font-size: 0.84rem; font-weight: 600; cursor: pointer; transition: var(--transition); }
  .btn-cancel { background: rgba(255,255,255,0.08); color: var(--text-primary); }
  .btn-cancel:hover { background: rgba(255,255,255,0.14); }
  .btn-danger { background: var(--danger); color: #fff; }
  .btn-danger:hover { background: #c0392b; }

  /* ── REVEAL ── */
  .reveal { opacity: 0; transform: translateY(22px); transition: opacity 0.55s ease, transform 0.55s ease; }
  .reveal.visible { opacity: 1; transform: translateY(0); }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .page-wrap { grid-template-columns: 1fr; }
    .sidebar { order: -1; }
    .hero { height: 340px; }
    .hero-overlay { padding: 28px 28px; }
  }
  @media (max-width: 600px) {
    header { padding: 0 16px; }
    .page-wrap { padding: 24px 14px 90px; gap: 20px; }
    .hero { height: 240px; }
    .gallery-grid { grid-template-columns: repeat(2,1fr); }
    .fab-cluster { bottom: 16px; right: 16px; }
    .card-header { padding: 14px 16px 10px; }
    .card-body { padding: 14px 16px; }
  }

  /* ── PRINT ── */
  @media print {
    .fab-cluster, header, #page-loader { display: none !important; }
    body { background: #fff; color: #000; }
    .card { border: 1px solid #ddd; box-shadow: none; background: #fff; }
    .hero { height: 180px; }
    .reveal { opacity: 1 !important; transform: none !important; }
  }
</style>
</head>
<body>

<!-- ── LOADER ── -->
<div id="page-loader">
  <div class="loader-logo">Flavor<span>Verse</span></div>
  <div class="loader-spinner"></div>
  <div class="loader-text">Fetching recipe…</div>
</div>

<!-- ── ERROR ── -->
<div id="error-state">
  <div class="err-icon">🍽</div>
  <h2>Recipe Not Found</h2>
  <p id="error-msg">We couldn't load this recipe. Please check the ID and try again.</p>
</div>

<!-- ── HEADER ── -->
<header>
  <a class="logo" href="#">Flavor<span>Verse</span></a>
  <div class="header-meta" id="headerMeta">
    <span id="headerCategory">—</span>
    <span class="dot">✦</span>
    <span id="headerRating">—</span>
  </div>
</header>

<!-- ── HERO ── -->
<section class="hero" id="heroSection">
  <img class="hero-img" id="heroImg" src="" alt="" />
  <div class="hero-overlay">
    <span class="hero-tag" id="heroTag">Loading…</span>
    <h1 id="heroTitle"><em>Loading…</em></h1>
    <div class="hero-stats">
      <div class="stat"><span>⭐</span><strong id="heroRating">—</strong></div>
      <div class="stat"><span>🍽</span><strong id="heroCategory">—</strong></div>
      <div class="stat"><span>📅</span><strong id="heroDate">—</strong></div>
    </div>
  </div>
</section>

<!-- ── PAGE CONTENT ── -->
<div class="page-wrap" id="pageWrap" style="display:none;">

  <!-- ════ MAIN ════ -->
  <main class="main-col">

    <!-- Description -->
    <div class="card reveal">
      <div class="card-body">
        <p class="recipe-desc" id="recipeDesc">—</p>
        <div class="tags" id="recipeTags"></div>
      </div>
    </div>

    <!-- Gallery -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">📸</div>
        <h2>Gallery</h2>
      </div>
      <div class="card-body">
        <div class="gallery-grid" id="galleryGrid">
          <div class="gallery-skeleton"></div>
          <div class="gallery-skeleton"></div>
          <div class="gallery-skeleton"></div>
        </div>
      </div>
    </div>

    <!-- Ingredients -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">🧾</div>
        <h2>Ingredients</h2>
      </div>
      <div class="card-body">
        <p style="font-size:0.76rem;color:var(--text-secondary);margin-bottom:14px;">Hover over any ingredient for nutritional details.</p>
        <div class="ingredients-grid" id="ingredientsGrid"></div>
      </div>
    </div>

    <!-- Steps -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">👨‍🍳</div>
        <h2>Cooking Steps</h2>
      </div>
      <div class="card-body">
        <ol class="steps-list" id="stepsList"></ol>
      </div>
    </div>

    <!-- Video -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">▶️</div>
        <h2>Watch It Made</h2>
      </div>
      <div class="card-body">
        <div class="video-container">
          <iframe id="recipeVideo"
            src="https://www.youtube.com/embed/videoseries?list=PLpB_or2OA8Kc2EMVKVuEFoJiC1o-OUqXo"
            title="Recipe Video"
            allowfullscreen loading="lazy">
          </iframe>
        </div>
      </div>
    </div>

  </main>

  <!-- ════ SIDEBAR ════ -->
  <aside class="sidebar">

    <!-- Nutrition summary -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">💪</div>
        <h2>Nutrition Totals</h2>
      </div>
      <div class="card-body">
        <div class="nutrition-grid" id="nutritionGrid"></div>
      </div>
    </div>

    <!-- Rating card -->
    <div class="card reveal" style="text-align:center;padding:24px 16px;">
      <div style="font-size:2.2rem;margin-bottom:8px;">⭐</div>
      <div style="font-family:'Playfair Display',serif;font-size:2rem;font-weight:900;color:var(--accent);" id="ratingBig">—</div>
      <div style="font-size:0.78rem;color:var(--text-secondary);text-transform:uppercase;letter-spacing:1px;margin-bottom:10px;">Community Rating</div>
      <div class="star-row" id="starRow"></div>
    </div>

    <!-- Ingredient count -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">📊</div>
        <h2>At a Glance</h2>
      </div>
      <div class="card-body" style="display:flex;flex-direction:column;gap:12px;">
        <div style="display:flex;justify-content:space-between;font-size:0.84rem;">
          <span style="color:var(--text-secondary);">Total Ingredients</span>
          <strong id="ingCount" style="color:var(--accent);">—</strong>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:0.84rem;">
          <span style="color:var(--text-secondary);">Total Calories</span>
          <strong id="totalCal" style="color:var(--accent);">—</strong>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:0.84rem;">
          <span style="color:var(--text-secondary);">Category</span>
          <strong id="glanceCategory" style="color:var(--accent);">—</strong>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:0.84rem;">
          <span style="color:var(--text-secondary);">Added</span>
          <strong id="glanceDate" style="color:var(--accent);">—</strong>
        </div>
      </div>
    </div>

  </aside>
</div>

<!-- ── FAB ── -->
<div class="fab-cluster">
  <div class="fab-group" id="fabGroup">
    <button class="fab fab-delete" onclick="openDeleteModal()">
      <span>🗑</span> Delete Recipe
    </button>
    <a class="fab fab-chat" href="chatbot.php?id=<?php echo $id; ?>">
      <span>🤖</span> Ask Chatbot
    </a>
    <button class="fab fab-pdf" onclick="window.print()">
      <span>📄</span> Save as PDF
    </button>
    <button class="fab fab-print" onclick="window.print()">
      <span>🖨</span> Print Recipe
    </button>
  </div>
  <button class="fab fab-main" id="fabMain" onclick="toggleFab()">＋</button>
</div>

<!-- ── DELETE MODAL ── -->
<div class="modal-backdrop" id="deleteModal">
  <div class="modal">
    <div class="modal-icon">⚠️</div>
    <h3>Delete Recipe?</h3>
    <p>This will permanently remove <strong id="modalRecipeName">this recipe</strong> from FlavorVerse. This action cannot be undone.</p>
    <div class="modal-btns">
      <button class="btn btn-cancel" onclick="closeDeleteModal()">Cancel</button>
      <button class="btn btn-danger" onclick="confirmDelete()">Yes, Delete</button>
    </div>
  </div>
</div>

<script>
/* ═══════════════════════════════════════════
   CONFIG
═══════════════════════════════════════════ */
const RECIPE_ID      = <?php echo $id; ?>;
const API_BASE       = 'view.php';
const UNSPLASH_KEY   = '7IumigsVYsLtzTgrTULz0clj5Yv_YlYE1xydk48TaUM';

/* ═══════════════════════════════════════════
   BOOT
═══════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
  if (!RECIPE_ID) { showError('No recipe ID provided in the URL.'); return; }
  loadRecipe();
});

/* ═══════════════════════════════════════════
   FETCH RECIPE
═══════════════════════════════════════════ */
async function loadRecipe() {
  try {
    const res  = await fetch(`${API_BASE}?id=${RECIPE_ID}`);
    if (!res.ok) throw new Error(`HTTP ${res.status}`);
    const rows = await res.json();
    if (!rows || rows.length === 0) throw new Error('empty');
    renderPage(rows);
  } catch (err) {
    showError('Could not load recipe data. ' + err.message);
  }
}

/* ═══════════════════════════════════════════
   RENDER
═══════════════════════════════════════════ */
function renderPage(rows) {
  const r    = rows[0];   // all rows share the same recipe meta
  const name = r.r_name;

  /* ── document title ── */
  document.title = `FlavorVerse – ${name}`;

  /* ── header ── */
  document.getElementById('headerCategory').textContent = r.category;
  document.getElementById('headerRating').textContent   = '⭐ ' + r.rating;

  /* ── hero ── */
  document.getElementById('heroTag').textContent       = r.category;
  const titleEl = document.getElementById('heroTitle');
  const words   = name.split(' ');
  titleEl.innerHTML = words.length > 1
    ? words[0] + ' <em>' + words.slice(1).join(' ') + '</em>'
    : '<em>' + name + '</em>';
  document.getElementById('heroRating').textContent   = r.rating + ' / 5';
  document.getElementById('heroCategory').textContent = r.category;
  document.getElementById('heroDate').textContent     = formatDate(r.created_at);

  /* ── description ── */
  document.getElementById('recipeDesc').textContent = r.description;

  /* ── tags ── */
  const tagData = [r.category, ...rows.map(i => i.clarity).filter((v,i,a) => v && a.indexOf(v)===i)];
  const tagsEl  = document.getElementById('recipeTags');
  tagData.forEach(t => {
    const span = document.createElement('span');
    span.className   = 'tag';
    span.textContent = capitalize(t);
    tagsEl.appendChild(span);
  });

  /* ── ingredients ── */
  renderIngredients(rows);

  /* ── steps ── */
  renderSteps(r.cooking_step);

  /* ── nutrition totals ── */
  renderNutrition(rows);

  /* ── rating ── */
  const rating = parseFloat(r.rating);
  document.getElementById('ratingBig').textContent = rating.toFixed(1);
  renderStars(rating);

  /* ── at a glance ── */
  const totalCal = rows.reduce((s, i) => s + parseFloat(i.calories || 0), 0);
  document.getElementById('ingCount').textContent     = rows.length;
  document.getElementById('totalCal').textContent     = Math.round(totalCal) + ' kcal';
  document.getElementById('glanceCategory').textContent = r.category;
  document.getElementById('glanceDate').textContent   = formatDate(r.created_at);

  /* ── modal name ── */
  document.getElementById('modalRecipeName').textContent = name;

  /* ── video search query ── */
  const iframe = document.getElementById('recipeVideo');
  iframe.src = `https://www.youtube.com/embed?listType=search&list=${encodeURIComponent(name + ' recipe')}`;

  /* ── show page ── */
  document.getElementById('pageWrap').style.display = 'grid';
  hideSkeleton();
  initReveal();

  /* ── fetch images from Unsplash ── */
  loadImages(name);
}

/* ── INGREDIENTS ── */
function renderIngredients(rows) {
  const grid = document.getElementById('ingredientsGrid');
  grid.innerHTML = '';
  rows.forEach(ing => {
    const chip = document.createElement('div');
    chip.className  = 'ingredient-chip';
    chip.tabIndex   = 0;
    chip.innerHTML  = `
      <div class="ing-name">${ing.ingredient_name}</div>
      <div class="ing-qty">${ing.quantity} ${ing.unit}</div>
      <div class="ing-clarity">${capitalize(ing.clarity)}</div>
      <div class="ing-tooltip">
        <div class="tooltip-title">${ing.ingredient_name}</div>
        <div class="tooltip-row"><span>Quantity</span><span>${ing.quantity} ${ing.unit}</span></div>
        <div class="tooltip-row"><span>Calories</span><span>${parseFloat(ing.calories).toFixed(0)} kcal</span></div>
        <div class="tooltip-row"><span>Protein</span><span>${ing.protein}g</span></div>
        <div class="tooltip-row"><span>Carbs</span><span>${ing.carbohydrates}g</span></div>
        <div class="tooltip-row"><span>Fat</span><span>${ing.fat}g</span></div>
      </div>`;
    grid.appendChild(chip);
  });
}

/* ── STEPS ── */
function renderSteps(rawStep) {
  const list  = document.getElementById('stepsList');
  list.innerHTML = '';
  // split on periods or the literal string 'Step N'
  const parts = rawStep
    .split(/(?<=[.?!])\s+(?=[A-Z])/)
    .map(s => s.trim())
    .filter(Boolean);

  if (parts.length === 0) {
    const li = document.createElement('li');
    li.className = 'step-item';
    li.innerHTML = `<div class="step-num">1</div><div class="step-content"><p>${rawStep}</p></div>`;
    list.appendChild(li);
    return;
  }

  parts.forEach((step, i) => {
    const li = document.createElement('li');
    li.className = 'step-item';
    li.innerHTML = `
      <div class="step-num">${i + 1}</div>
      <div class="step-content">
        <p>${step}</p>
      </div>`;
    list.appendChild(li);
  });
}

/* ── NUTRITION ── */
function renderNutrition(rows) {
  const totals = rows.reduce((acc, i) => {
    acc.cal   += parseFloat(i.calories      || 0);
    acc.carbs += parseFloat(i.carbohydrates || 0);
    acc.prot  += parseFloat(i.protein       || 0);
    acc.fat   += parseFloat(i.fat           || 0);
    return acc;
  }, { cal: 0, carbs: 0, prot: 0, fat: 0 });

  const items = [
    { val: Math.round(totals.cal),         label: 'Calories'  },
    { val: totals.prot.toFixed(1)  + 'g',  label: 'Protein'   },
    { val: totals.carbs.toFixed(1) + 'g',  label: 'Carbs'     },
    { val: totals.fat.toFixed(1)   + 'g',  label: 'Fat'       },
  ];
  const grid = document.getElementById('nutritionGrid');
  grid.innerHTML = '';
  items.forEach(item => {
    const box = document.createElement('div');
    box.className   = 'nut-box';
    box.innerHTML   = `<div class="nut-val">${item.val}</div><div class="nut-label">${item.label}</div>`;
    grid.appendChild(box);
  });
}

/* ── STARS ── */
function renderStars(rating) {
  const row = document.getElementById('starRow');
  row.innerHTML = '';
  for (let i = 1; i <= 5; i++) {
    const s = document.createElement('span');
    s.textContent = '★';
    s.className   = i <= Math.round(rating) ? 'star-filled' : 'star-empty';
    row.appendChild(s);
  }
}

/* ═══════════════════════════════════════════
   UNSPLASH IMAGES
═══════════════════════════════════════════ */
async function loadImages(recipeName) {
  const query = encodeURIComponent(recipeName + ' Sri Lanka');
  const url   = `https://api.unsplash.com/search/photos?query=${query}&per_page=5&client_id=${UNSPLASH_KEY}`;
  const grid  = document.getElementById('galleryGrid');

  try {
    const res  = await fetch(url);
    const data = await res.json();
    const imgs = data.results || [];

    if (imgs.length === 0) {
      grid.innerHTML = '<p style="color:var(--text-secondary);font-size:0.82rem;grid-column:1/-1;">No gallery images found.</p>';
      return;
    }

    /* hero — use the first image */
    document.getElementById('heroImg').src = imgs[0].urls.regular;
    document.getElementById('heroImg').alt = imgs[0].alt_description || recipeName;

    /* gallery — use up to 3 images (skip first for variety if possible) */
    const galleryImgs = imgs.length > 1 ? imgs.slice(1, 4) : imgs.slice(0, 3);
    grid.innerHTML = '';
    galleryImgs.forEach(img => {
      const div  = document.createElement('div');
      div.className = 'gallery-item';
      const image   = document.createElement('img');
      image.src     = img.urls.small;
      image.alt     = img.alt_description || recipeName;
      image.loading = 'lazy';
      div.appendChild(image);
      div.addEventListener('click', () => openLightbox(img.urls.regular, img.alt_description));
      grid.appendChild(div);
    });

  } catch (err) {
    grid.innerHTML = '<p style="color:var(--text-secondary);font-size:0.82rem;grid-column:1/-1;">Gallery unavailable.</p>';
  }
}

/* ═══════════════════════════════════════════
   LIGHTBOX
═══════════════════════════════════════════ */
function openLightbox(src, alt) {
  const lb = document.createElement('div');
  Object.assign(lb.style, {
    position:'fixed', inset:'0', background:'rgba(0,0,0,0.9)',
    display:'flex', alignItems:'center', justifyContent:'center',
    zIndex:'800', cursor:'zoom-out', backdropFilter:'blur(6px)'
  });
  lb.innerHTML = `<img src="${src}" alt="${alt||''}" style="max-width:92vw;max-height:88vh;border-radius:12px;box-shadow:0 24px 64px rgba(0,0,0,0.8);">`;
  lb.addEventListener('click', () => lb.remove());
  document.body.appendChild(lb);
}

/* ═══════════════════════════════════════════
   HELPERS
═══════════════════════════════════════════ */
function formatDate(dt) {
  if (!dt) return '—';
  const d = new Date(dt);
  return d.toLocaleDateString('en-GB', { day:'numeric', month:'short', year:'numeric' });
}

function capitalize(str) {
  if (!str) return '';
  return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
}

function hideSkeleton() {
  const loader = document.getElementById('page-loader');
  loader.classList.add('hidden');
  setTimeout(() => loader.style.display = 'none', 500);
}

function showError(msg) {
  hideSkeleton();
  document.getElementById('error-msg').textContent = msg;
  document.getElementById('error-state').classList.add('show');
}

/* ── SCROLL REVEAL ── */
function initReveal() {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); }
    });
  }, { threshold: 0.07 });
  document.querySelectorAll('.reveal').forEach((el, i) => {
    el.style.transitionDelay = (i * 0.06) + 's';
    observer.observe(el);
  });
}

/* ── FAB ── */
let fabOpen = false;
function toggleFab() {
  fabOpen = !fabOpen;
  document.getElementById('fabGroup').classList.toggle('open', fabOpen);
  document.getElementById('fabMain').classList.toggle('open', fabOpen);
}

/* ── DELETE MODAL ── */
function openDeleteModal()  { document.getElementById('deleteModal').classList.add('active'); }
function closeDeleteModal() { document.getElementById('deleteModal').classList.remove('active'); }
function confirmDelete() {
  closeDeleteModal();
  const toast = document.createElement('div');
  toast.textContent = '✓ Recipe deleted successfully.';
  Object.assign(toast.style, {
    position:'fixed', bottom:'96px', left:'50%', transform:'translateX(-50%)',
    background:'#e74c3c', color:'#fff', padding:'12px 24px', borderRadius:'100px',
    fontSize:'0.83rem', fontWeight:'600', zIndex:'600', boxShadow:'0 4px 16px rgba(0,0,0,0.4)'
  });
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 3000);
}

document.getElementById('deleteModal').addEventListener('click', function(e) {
  if (e.target === this) closeDeleteModal();
});
</script>
</body>
</html>
