<?php
$id = intval($_GET['id']);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>FlavorVerse – Spaghetti Bolognese</title>
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
    --success: #2ecc71;
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

  /* ── NOISE OVERLAY ── */
  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
    pointer-events: none;
    z-index: 0;
    opacity: 0.4;
  }

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

  /* ── HERO BANNER ── */
  .hero {
    position: relative;
    height: 480px;
    overflow: hidden;
  }
  .hero-img {
    width: 100%;
    height: 100%;
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
    font-size: clamp(2.4rem, 5vw, 4rem);
    font-weight: 900;
    line-height: 1.1;
    color: var(--text-primary);
    max-width: 700px;
  }
  .hero h1 em {
    font-style: italic;
    color: var(--accent);
  }

  .hero-stats {
    display: flex;
    gap: 28px;
    margin-top: 18px;
    flex-wrap: wrap;
  }
  .stat {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.85rem;
    color: var(--text-secondary);
  }
  .stat-icon { font-size: 1rem; }
  .stat strong { color: var(--text-primary); }

  /* ── MAIN GRID ── */
  .page-wrap {
    max-width: 1280px;
    margin: 0 auto;
    padding: 48px 32px 80px;
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 40px;
    position: relative;
    z-index: 1;
  }

  .main-col { display: flex; flex-direction: column; gap: 36px; }
  .sidebar { display: flex; flex-direction: column; gap: 28px; }

  /* ── CARDS ── */
  .card {
    background: var(--card-bg);
    border-radius: var(--border-radius);
    border: 1px solid rgba(255,255,255,0.06);
    box-shadow: var(--card-shadow);
    overflow: hidden;
    transition: var(--transition);
  }
  .card:hover { border-color: rgba(255,123,44,0.18); }

  .card-header {
    padding: 22px 28px 16px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .card-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-primary);
  }
  .section-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: var(--accent-dim);
    display: grid;
    place-items: center;
    font-size: 1rem;
    flex-shrink: 0;
  }
  .card-body { padding: 24px 28px; }

  /* ── DESCRIPTION ── */
  .recipe-desc {
    font-size: 0.95rem;
    color: var(--text-secondary);
    line-height: 1.8;
  }

  /* ── GALLERY ── */
  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin-top: 0;
  }
  .gallery-item {
    border-radius: 8px;
    overflow: hidden;
    aspect-ratio: 4/3;
    cursor: pointer;
    position: relative;
  }
  .gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease, filter 0.4s ease;
    filter: brightness(0.8);
  }
  .gallery-item:hover img { transform: scale(1.08); filter: brightness(1); }
  .gallery-item::after {
    content: '🔍';
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    background: rgba(255,123,44,0.3);
    opacity: 0;
    transition: opacity 0.3s;
  }
  .gallery-item:hover::after { opacity: 1; }

  /* ── INGREDIENTS ── */
  .ingredients-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
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
  .ing-name {
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 4px;
  }
  .ing-qty {
    font-size: 0.75rem;
    color: var(--accent);
    font-weight: 500;
  }

  /* ── TOOLTIP POPUP ── */
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
    box-shadow: 0 16px 40px rgba(0,0,0,0.7), 0 0 0 1px rgba(255,123,44,0.1);
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.2s ease, transform 0.2s ease;
  }
  .ingredient-chip:hover .ing-tooltip,
  .ingredient-chip:focus .ing-tooltip {
    opacity: 1;
    transform: translateX(-50%) scale(1);
  }
  .ing-tooltip::after {
    content: '';
    position: absolute;
    top: 100%;
    left: 50%;
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
    font-size: 0.75rem;
    padding: 3px 0;
    color: var(--text-secondary);
  }
  .tooltip-row span:last-child { color: var(--text-primary); font-weight: 500; }
  .tooltip-desc {
    margin-top: 8px;
    font-size: 0.72rem;
    color: #888;
    font-style: italic;
    border-top: 1px solid rgba(255,255,255,0.06);
    padding-top: 8px;
  }

  /* ── STEPS ── */
  .steps-list { display: flex; flex-direction: column; gap: 20px; }

  .step-item {
    display: flex;
    gap: 18px;
    align-items: flex-start;
    padding: 20px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.05);
    background: rgba(255,255,255,0.02);
    transition: var(--transition);
    cursor: default;
  }
  .step-item:hover {
    border-color: rgba(255,123,44,0.25);
    background: rgba(255,123,44,0.04);
  }
  .step-num {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--accent-dim);
    border: 2px solid var(--accent);
    display: grid;
    place-items: center;
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    font-weight: 900;
    color: var(--accent);
    flex-shrink: 0;
    transition: var(--transition);
  }
  .step-item:hover .step-num {
    background: var(--accent);
    color: #fff;
  }
  .step-content h3 {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 6px;
  }
  .step-content p {
    font-size: 0.85rem;
    color: var(--text-secondary);
    line-height: 1.7;
  }
  .step-time {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 0.72rem;
    color: var(--accent);
    background: var(--accent-dim);
    padding: 2px 8px;
    border-radius: 100px;
    margin-top: 8px;
  }

  /* ── VIDEO ── */
  .video-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    border-radius: 10px;
    overflow: hidden;
  }
  .video-container iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: none;
  }

  /* ── SIDEBAR CARDS ── */
  .chef-card { text-align: center; }

  .chef-avatar {
    width: 88px;
    height: 88px;
    border-radius: 50%;
    border: 3px solid var(--accent);
    object-fit: cover;
    margin: 24px auto 12px;
    display: block;
    box-shadow: 0 0 0 6px var(--accent-dim);
  }
  .chef-name {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary);
  }
  .chef-title {
    font-size: 0.78rem;
    color: var(--accent);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 12px;
  }
  .chef-bio {
    font-size: 0.82rem;
    color: var(--text-secondary);
    line-height: 1.7;
    padding: 0 16px 16px;
  }
  .star-row {
    display: flex;
    justify-content: center;
    gap: 4px;
    margin: 6px 0 12px;
    font-size: 1rem;
  }
  .star-filled { color: var(--accent); }
  .star-empty  { color: #444; }

  /* ── NUTRITION CARD ── */
  .nutrition-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
  }
  .nut-box {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 8px;
    padding: 12px;
    text-align: center;
    transition: var(--transition);
  }
  .nut-box:hover { border-color: var(--accent); background: var(--accent-dim); }
  .nut-val {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--accent);
  }
  .nut-label {
    font-size: 0.72rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-top: 2px;
  }

  /* ── TAGS ── */
  .tags { display: flex; flex-wrap: wrap; gap: 8px; padding-top: 4px; }
  .tag {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 100px;
    padding: 4px 12px;
    font-size: 0.75rem;
    color: var(--text-secondary);
    transition: var(--transition);
  }
  .tag:hover { background: var(--accent-dim); color: var(--accent); border-color: var(--accent); }

  /* ── ACTION BUTTONS (FAB cluster) ── */
  .fab-cluster {
    position: fixed;
    bottom: 32px;
    right: 32px;
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
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    white-space: nowrap;
    box-shadow: 0 4px 16px rgba(0,0,0,0.5);
  }
  .fab .fab-icon { font-size: 1rem; }

  .fab-main {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    padding: 0;
    background: var(--accent);
    color: #fff;
    font-size: 1.3rem;
    justify-content: center;
    box-shadow: 0 6px 24px rgba(255,123,44,0.5);
  }
  .fab-main:hover { transform: rotate(45deg) scale(1.1); }
  .fab-main.open { transform: rotate(45deg); }

  .fab-delete { background: #2b1414; color: #e74c3c; border: 1px solid rgba(231,76,60,0.3); }
  .fab-delete:hover { background: #e74c3c; color: #fff; transform: translateX(-4px); }

  .fab-chat { background: #132b1a; color: #2ecc71; border: 1px solid rgba(46,204,113,0.3); }
  .fab-chat:hover { background: #2ecc71; color: #fff; transform: translateX(-4px); }

  .fab-pdf { background: #131a2b; color: #3498db; border: 1px solid rgba(52,152,219,0.3); }
  .fab-pdf:hover { background: #3498db; color: #fff; transform: translateX(-4px); }

  .fab-print { background: #1e1e2b; color: #9b59b6; border: 1px solid rgba(155,89,182,0.3); }
  .fab-print:hover { background: #9b59b6; color: #fff; transform: translateX(-4px); }

  /* ── DELETE CONFIRM MODAL ── */
  .modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.75);
    backdrop-filter: blur(6px);
    z-index: 500;
    display: grid;
    place-items: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
  }
  .modal-backdrop.active { opacity: 1; pointer-events: all; }
  .modal {
    background: #1e1e1e;
    border: 1px solid rgba(231,76,60,0.35);
    border-radius: 16px;
    padding: 36px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    transform: scale(0.9);
    transition: transform 0.3s;
    box-shadow: 0 24px 64px rgba(0,0,0,0.8);
  }
  .modal-backdrop.active .modal { transform: scale(1); }
  .modal-icon { font-size: 2.5rem; margin-bottom: 12px; }
  .modal h3 { font-family: 'Playfair Display', serif; font-size: 1.3rem; margin-bottom: 8px; }
  .modal p { font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 24px; }
  .modal-btns { display: flex; gap: 12px; justify-content: center; }
  .btn {
    padding: 10px 24px;
    border-radius: 8px;
    border: none;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
  }
  .btn-cancel { background: rgba(255,255,255,0.08); color: var(--text-primary); }
  .btn-cancel:hover { background: rgba(255,255,255,0.14); }
  .btn-danger { background: var(--danger); color: #fff; }
  .btn-danger:hover { background: #c0392b; }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .page-wrap { grid-template-columns: 1fr; }
    .sidebar { order: -1; }
    .hero { height: 340px; }
    .hero-overlay { padding: 28px 28px; }
  }
  @media (max-width: 600px) {
    header { padding: 0 20px; }
    .page-wrap { padding: 28px 16px 80px; gap: 24px; }
    .ingredients-grid { grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); }
    .fab-cluster { bottom: 20px; right: 20px; }
    .hero { height: 260px; }
    .gallery-grid { grid-template-columns: repeat(2, 1fr); }
    .card-header { padding: 16px 18px 12px; }
    .card-body { padding: 16px 18px; }
  }

  /* ── PRINT STYLES ── */
  @media print {
    .fab-cluster, header { display: none; }
    body { background: #fff; color: #000; }
    .card { border: 1px solid #ddd; box-shadow: none; }
    .hero { height: 200px; }
  }

  /* ── SCROLL REVEAL ── */
  .reveal {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }
  .reveal.visible { opacity: 1; transform: translateY(0); }
</style>
</head>
<body>

<!-- ══ HEADER ══ -->
<header>
  <a class="logo" href="#">Flavor<span>Verse</span></a>
  <div class="header-meta">
    <span>Italian</span>
    <span class="dot">✦</span>
    <span>Pasta</span>
    <span class="dot">✦</span>
    <span>Classic</span>
  </div>
</header>

<!-- ══ HERO ══ -->
<section class="hero">
  <img
    class="hero-img"
    src="https://images.unsplash.com/photo-1555949258-eb67b1ef0ceb?w=1600&q=80"
    alt="Spaghetti Bolognese"
    id="mainHeroImg"
  />
  <div class="hero-overlay">
    <span class="hero-tag">⭐ Editor's Pick</span>
    <h1>Spaghetti <em>Bolognese</em></h1>
    <div class="hero-stats">
      <div class="stat"><span class="stat-icon">⏱</span><span><strong>35 min</strong> Prep</span></div>
      <div class="stat"><span class="stat-icon">🔥</span><span><strong>45 min</strong> Cook</span></div>
      <div class="stat"><span class="stat-icon">🍽</span><span><strong>4</strong> Servings</span></div>
      <div class="stat"><span class="stat-icon">📊</span><span><strong>Intermediate</strong> Level</span></div>
      <div class="stat"><span class="stat-icon">🌍</span><span><strong>Italian</strong> Cuisine</span></div>
    </div>
  </div>
</section>

<!-- ══ PAGE CONTENT ══ -->
<div class="page-wrap">

  <!-- ════ MAIN COL ════ -->
  <main class="main-col">

    <!-- Description -->
    <div class="card reveal">
      <div class="card-body">
        <p class="recipe-desc">
          A timeless Italian classic — slow-simmered meat sauce folded through silky spaghetti and crowned with a snowfall of aged Parmigiano-Reggiano. Bolognese is not a quick ragù; it's a labour of love where patience transforms humble ingredients into something truly magnificent. Rooted in the kitchens of Bologna, this recipe honours tradition while embracing the warmth of home cooking.
        </p>
        <div class="tags" style="margin-top:16px;">
          <span class="tag">🐄 Beef</span>
          <span class="tag">🍝 Pasta</span>
          <span class="tag">🇮🇹 Italian</span>
          <span class="tag">🧀 Cheese</span>
          <span class="tag">🍷 Wine</span>
          <span class="tag">Family Friendly</span>
        </div>
      </div>
    </div>

    <!-- Gallery -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">📸</div>
        <h2>Gallery</h2>
      </div>
      <div class="card-body">
        <div class="gallery-grid">
          <div class="gallery-item"><img src="https://images.unsplash.com/photo-1548943487-a2e4e43b4853?w=400&q=70" alt="pasta close-up"></div>
          <div class="gallery-item"><img src="https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=400&q=70" alt="bolognese sauce"></div>
          <div class="gallery-item"><img src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?w=400&q=70" alt="plated dish"></div>
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
        <p style="font-size:0.78rem;color:var(--text-secondary);margin-bottom:16px;">Hover over any ingredient for detailed nutritional info.</p>
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
          <iframe
            src="https://www.youtube.com/embed/9LJe9V4sIMM"
            title="Spaghetti Bolognese Recipe"
            allowfullscreen
            loading="lazy"
          ></iframe>
        </div>
      </div>
    </div>

  </main>

  <!-- ════ SIDEBAR ════ -->
  <aside class="sidebar">

    <!-- Chef -->
    <div class="card chef-card reveal">
      <img
        class="chef-avatar"
        src="https://i.pravatar.cc/150?img=57"
        alt="Chef Marco Rossi"
      />
      <p class="chef-name">Marco Rossi</p>
      <p class="chef-title">Executive Chef</p>
      <div class="star-row">
        <span class="star-filled">★</span><span class="star-filled">★</span>
        <span class="star-filled">★</span><span class="star-filled">★</span>
        <span class="star-empty">★</span>
      </div>
      <p class="chef-bio">With 20 years honing his craft in the trattorias of Bologna and Milan, Chef Marco brings authentic regional technique to every dish — celebrating simplicity, quality produce, and the soulful patience that defines true Italian cooking.</p>
    </div>

    <!-- Nutrition -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">💪</div>
        <h2>Nutrition (per serving)</h2>
      </div>
      <div class="card-body">
        <div class="nutrition-grid">
          <div class="nut-box"><div class="nut-val">620</div><div class="nut-label">Calories</div></div>
          <div class="nut-box"><div class="nut-val">38g</div><div class="nut-label">Protein</div></div>
          <div class="nut-box"><div class="nut-val">72g</div><div class="nut-label">Carbs</div></div>
          <div class="nut-box"><div class="nut-val">18g</div><div class="nut-label">Fat</div></div>
          <div class="nut-box"><div class="nut-val">6g</div><div class="nut-label">Fiber</div></div>
          <div class="nut-box"><div class="nut-val">810mg</div><div class="nut-label">Sodium</div></div>
        </div>
      </div>
    </div>

    <!-- Tips -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">💡</div>
        <h2>Chef's Tips</h2>
      </div>
      <div class="card-body" style="padding-top:16px;">
        <ul style="list-style:none;display:flex;flex-direction:column;gap:12px;">
          <li style="font-size:0.83rem;color:var(--text-secondary);padding-left:20px;position:relative;">
            <span style="position:absolute;left:0;color:var(--accent);">▸</span>
            Use a mix of pork and beef mince for extra depth and richness.
          </li>
          <li style="font-size:0.83rem;color:var(--text-secondary);padding-left:20px;position:relative;">
            <span style="position:absolute;left:0;color:var(--accent);">▸</span>
            Always finish pasta in the sauce pan — never plate separately.
          </li>
          <li style="font-size:0.83rem;color:var(--text-secondary);padding-left:20px;position:relative;">
            <span style="position:absolute;left:0;color:var(--accent);">▸</span>
            A splash of whole milk added near the end tames acidity beautifully.
          </li>
          <li style="font-size:0.83rem;color:var(--text-secondary);padding-left:20px;position:relative;">
            <span style="position:absolute;left:0;color:var(--accent);">▸</span>
            Reserve pasta water — it's liquid gold for adjusting consistency.
          </li>
        </ul>
      </div>
    </div>

  </aside>
</div>

<!-- ══ FAB CLUSTER ══ -->
<div class="fab-cluster">
  <div class="fab-group" id="fabGroup">
    <button class="fab fab-delete" onclick="openDeleteModal()">
      <span class="fab-icon">🗑</span> Delete Recipe
    </button>
    <a class="fab fab-chat" href="example-chatbot.html">
      <span class="fab-icon">🤖</span> Ask Chatbot
    </a>
    <button class="fab fab-pdf" onclick="downloadPDF()">
      <span class="fab-icon">📄</span> Save as PDF
    </button>
    <button class="fab fab-print" onclick="window.print()">
      <span class="fab-icon">🖨</span> Print Recipe
    </button>
  </div>
  <button class="fab fab-main" id="fabMain" onclick="toggleFab()" title="Actions">＋</button>
</div>

<!-- ══ DELETE MODAL ══ -->
<div class="modal-backdrop" id="deleteModal">
  <div class="modal">
    <div class="modal-icon">⚠️</div>
    <h3>Delete Recipe?</h3>
    <p>This will permanently remove <strong>Spaghetti Bolognese</strong> from FlavorVerse. This action cannot be undone.</p>
    <div class="modal-btns">
      <button class="btn btn-cancel" onclick="closeDeleteModal()">Cancel</button>
      <button class="btn btn-danger" onclick="confirmDelete()">Yes, Delete</button>
    </div>
  </div>
</div>

<script>
/* ── DATA ── */
const ingredients = [
  {
    name: "Spaghetti",   qty: "400g",   unit: "grams",
    cal: 351, protein: "12.5g", carbs: "70g", fat: "1.5g",
    desc: "Use bronze-die spaghetti for better sauce adhesion."
  },
  {
    name: "Ground Beef", qty: "500g",   unit: "grams",
    cal: 250, protein: "26g", carbs: "0g", fat: "17g",
    desc: "Choose 80/20 lean-to-fat ratio for juicy, rich sauce."
  },
  {
    name: "Tomatoes",    qty: "400g",   unit: "can",
    cal: 35,  protein: "1.7g", carbs: "7g", fat: "0.3g",
    desc: "San Marzano whole peeled tomatoes are the gold standard."
  },
  {
    name: "Onion",       qty: "1 large", unit: "piece",
    cal: 44,  protein: "1.2g", carbs: "10g", fat: "0.1g",
    desc: "Soften slowly until translucent for natural sweetness."
  },
  {
    name: "Garlic",      qty: "4 cloves", unit: "pieces",
    cal: 4,   protein: "0.2g", carbs: "1g", fat: "0g",
    desc: "Mince finely — whole cloves leave harsh bitter notes."
  },
  {
    name: "Carrots",     qty: "2 medium", unit: "pieces",
    cal: 41,  protein: "0.9g", carbs: "10g", fat: "0.2g",
    desc: "Part of the classic soffritto — adds subtle sweetness."
  },
  {
    name: "Celery",      qty: "2 stalks", unit: "pieces",
    cal: 10,  protein: "0.7g", carbs: "2g", fat: "0.1g",
    desc: "Completes the holy trinity of Italian aromatics."
  },
  {
    name: "Red Wine",    qty: "150ml",  unit: "ml",
    cal: 125, protein: "0g", carbs: "4g", fat: "0g",
    desc: "Use a wine you'd drink — it defines the sauce's backbone."
  },
  {
    name: "Tomato Paste", qty: "2 tbsp", unit: "tbsp",
    cal: 52,  protein: "2g", carbs: "11g", fat: "0.4g",
    desc: "Cook out in the pan briefly to remove raw edge."
  },
  {
    name: "Olive Oil",   qty: "3 tbsp", unit: "tbsp",
    cal: 119, protein: "0g", carbs: "0g", fat: "14g",
    desc: "Extra-virgin for sautéing the soffritto at the start."
  },
  {
    name: "Parmesan",    qty: "60g",    unit: "grams",
    cal: 431, protein: "38g", carbs: "3g", fat: "29g",
    desc: "Parmigiano-Reggiano only — freshly grated at the table."
  },
  {
    name: "Bay Leaves",  qty: "2",      unit: "pieces",
    cal: 3,   protein: "0.1g", carbs: "0.5g", fat: "0g",
    desc: "Remove before serving — they add fragrance, not texture."
  },
];

const steps = [
  {
    title: "Build the Soffritto",
    text: "Heat olive oil in a heavy-bottomed Dutch oven over medium-low. Finely dice onion, carrot, and celery. Sweat gently for 10–12 minutes, stirring occasionally, until completely soft and golden — never brown.",
    time: "12 min"
  },
  {
    title: "Add Garlic & Paste",
    text: "Push the vegetables to one side. Add minced garlic and tomato paste to the cleared space. Cook for 2 minutes, stirring constantly, until the paste darkens slightly and smells sweet and caramelized.",
    time: "2 min"
  },
  {
    title: "Brown the Meat",
    text: "Raise heat to medium-high. Crumble in ground beef and cook undisturbed for 3 minutes before breaking up — this develops a proper Maillard crust. Season generously with salt and black pepper.",
    time: "8 min"
  },
  {
    title: "Deglaze with Wine",
    text: "Pour in the red wine, scraping up all the fond from the bottom. Let it bubble vigorously until the alcohol smell dissipates and the liquid reduces by half — about 3 minutes.",
    time: "3 min"
  },
  {
    title: "Slow Simmer the Sauce",
    text: "Add crushed tomatoes and bay leaves. Reduce heat to the lowest possible setting, partially cover, and simmer for 30–45 minutes. Stir every 10 minutes. The sauce should barely blip — low and slow is the secret.",
    time: "45 min"
  },
  {
    title: "Cook the Pasta",
    text: "Bring a large pot of generously salted water to a rolling boil. Cook spaghetti 1 minute less than the package instructions — it will finish in the sauce. Reserve 1 cup of starchy pasta water before draining.",
    time: "9 min"
  },
  {
    title: "Marry Pasta & Sauce",
    text: "Add the drained spaghetti directly into the bolognese. Toss vigorously over medium heat for 90 seconds, adding pasta water a splash at a time until each strand is glossy and sauce-coated.",
    time: "2 min"
  },
  {
    title: "Plate & Serve",
    text: "Twirl portions into warmed bowls using tongs. Finish with a blizzard of freshly grated Parmigiano-Reggiano, a drizzle of extra-virgin olive oil, and cracked black pepper. Serve immediately.",
    time: "2 min"
  },
];

/* ── RENDER INGREDIENTS ── */
const grid = document.getElementById('ingredientsGrid');
ingredients.forEach(ing => {
  const chip = document.createElement('div');
  chip.className = 'ingredient-chip';
  chip.setAttribute('tabindex', '0');
  chip.innerHTML = `
    <div class="ing-name">${ing.name}</div>
    <div class="ing-qty">${ing.qty}</div>
    <div class="ing-tooltip">
      <div class="tooltip-title">${ing.name}</div>
      <div class="tooltip-row"><span>Quantity</span><span>${ing.qty} (${ing.unit})</span></div>
      <div class="tooltip-row"><span>Calories</span><span>${ing.cal} kcal</span></div>
      <div class="tooltip-row"><span>Protein</span><span>${ing.protein}</span></div>
      <div class="tooltip-row"><span>Carbs</span><span>${ing.carbs}</span></div>
      <div class="tooltip-row"><span>Fat</span><span>${ing.fat}</span></div>
      <div class="tooltip-desc">${ing.desc}</div>
    </div>`;
  grid.appendChild(chip);
});

/* ── RENDER STEPS ── */
const list = document.getElementById('stepsList');
steps.forEach((step, i) => {
  const li = document.createElement('li');
  li.className = 'step-item';
  li.innerHTML = `
    <div class="step-num">${i + 1}</div>
    <div class="step-content">
      <h3>${step.title}</h3>
      <p>${step.text}</p>
      <span class="step-time">⏱ ${step.time}</span>
    </div>`;
  list.appendChild(li);
});

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
    fontSize:'0.84rem', fontWeight:'600', zIndex:'600', boxShadow:'0 4px 16px rgba(0,0,0,0.4)',
    animation:'fadeInUp 0.3s ease'
  });
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 3500);
}

/* ── PDF DOWNLOAD ── */
function downloadPDF() { window.print(); }

/* ── SCROLL REVEAL ── */
const observer = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach((el, i) => {
  el.style.transitionDelay = (i * 0.07) + 's';
  observer.observe(el);
});

/* ── CLOSE MODAL ON BACKDROP CLICK ── */
document.getElementById('deleteModal').addEventListener('click', function(e) {
  if (e.target === this) closeDeleteModal();
});
</script>
</body>
</html>
