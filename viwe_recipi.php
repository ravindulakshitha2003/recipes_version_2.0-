<?php $id = intval($_GET['id']); 
$chef_id = $_SESSION['user_id'] ?? null;
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

  /* Light Mode */
  [data-theme="light"] {
    --primary-bg: #ffffff;
    --secondary-bg: #f5f5f5;
    --card-bg: #ffffff;
    --text-primary: #1a1a1a;
    --text-secondary: #666666;
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
    position: fixed; inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
    pointer-events: none; z-index: 0; opacity: 0.4;
  }

  /* ── HEADER ── */
  header {
    position: sticky; top: 0; z-index: 100;
    background: rgba(18,18,18,0.92);
    backdrop-filter: blur(14px);
    border-bottom: 1px solid rgba(255,123,44,0.2);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 40px; height: 64px;
  }
  .logo { font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 900; color: var(--accent); letter-spacing: -0.5px; text-decoration: none; }
  .logo span { color: var(--text-primary); }
  .header-meta { display: flex; align-items: center; gap: 12px; font-size: 0.78rem; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px; }
  .header-meta .dot { color: var(--accent); }

  /* ── HERO ── */
  .hero { position: relative; height: 480px; overflow: hidden; }
  .hero-img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.45); transform: scale(1.04); transition: transform 8s ease; }
  .hero:hover .hero-img { transform: scale(1); }
  .hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, #121212 0%, rgba(18,18,18,0.3) 60%, transparent 100%);
    display: flex; flex-direction: column; justify-content: flex-end; padding: 48px 60px;
  }
  .hero-tag { display: inline-block; background: var(--accent); color: #fff; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 2px; padding: 4px 12px; border-radius: 100px; margin-bottom: 14px; width: fit-content; }
  .hero h1 { font-family: 'Playfair Display', serif; font-size: clamp(2.4rem, 5vw, 4rem); font-weight: 900; line-height: 1.1; color: var(--text-primary); max-width: 700px; }
  .hero h1 em { font-style: italic; color: var(--accent); }
  .hero-stats { display: flex; gap: 28px; margin-top: 18px; flex-wrap: wrap; }
  .stat { display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: var(--text-secondary); }
  .stat-icon { font-size: 1rem; }
  .stat strong { color: var(--text-primary); }

  /* ── LAYOUT ── */
  .page-wrap { max-width: 1280px; margin: 0 auto; padding: 48px 32px 80px; display: grid; grid-template-columns: 1fr 340px; gap: 40px; position: relative; z-index: 1; }
  .main-col { display: flex; flex-direction: column; gap: 36px; }
  .sidebar  { display: flex; flex-direction: column; gap: 28px; }

  /* ── CARDS ── */
  .card { background: var(--card-bg); border-radius: var(--border-radius); border: 1px solid rgba(255,255,255,0.06); box-shadow: var(--card-shadow); overflow: hidden; transition: var(--transition); }
  .card:hover { border-color: rgba(255,123,44,0.18); }
  .card-header { padding: 22px 28px 16px; border-bottom: 1px solid rgba(255,255,255,0.06); display: flex; align-items: center; gap: 10px; }
  .card-header h2 { font-family: 'Playfair Display', serif; font-size: 1.3rem; font-weight: 700; color: var(--text-primary); }
  .section-icon { width: 32px; height: 32px; border-radius: 8px; background: var(--accent-dim); display: grid; place-items: center; font-size: 1rem; flex-shrink: 0; }
  .card-body { padding: 24px 28px; }
  .recipe-desc { font-size: 0.95rem; color: var(--text-secondary); line-height: 1.8; }

  /* ── GALLERY ── */
  .gallery-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }

  /* Skeleton shimmer shown while loading */
  .gallery-skeleton {
    border-radius: 8px; aspect-ratio: 4/3;
    background: rgba(255,255,255,0.04);
    position: relative; overflow: hidden;
  }
  .gallery-skeleton::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.06) 50%, transparent 100%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
  }
  @keyframes shimmer { 0% { background-position: 200% 0; } 100% { background-position: -200% 0; } }

  .gallery-item { border-radius: 8px; overflow: hidden; aspect-ratio: 4/3; cursor: pointer; position: relative; background: rgba(255,255,255,0.04); }
  .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease, filter 0.4s ease; filter: brightness(0.8); display: block; }
  .gallery-item:hover img { transform: scale(1.08); filter: brightness(1); }
  .gallery-item::after { content: '🔍'; position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; background: rgba(255,123,44,0.3); opacity: 0; transition: opacity 0.3s; }
  .gallery-item:hover::after { opacity: 1; }

  /* Photographer credit */
  .photo-credit { position: absolute; bottom: 0; left: 0; right: 0; padding: 5px 10px; background: linear-gradient(to top, rgba(0,0,0,0.72) 0%, transparent 100%); font-size: 0.63rem; color: rgba(255,255,255,0.55); opacity: 0; transition: opacity 0.3s; pointer-events: none; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .gallery-item:hover .photo-credit { opacity: 1; }

  /* ── INGREDIENTS ── */
  .ingredients-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 12px; }
  .ingredient-chip { position: relative; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 10px; padding: 14px 16px; cursor: pointer; transition: var(--transition); user-select: none; }
  .ingredient-chip:hover { background: var(--accent-dim); border-color: var(--accent); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(255,123,44,0.2); }
  .ing-name { font-size: 0.82rem; font-weight: 600; color: var(--text-primary); margin-bottom: 4px; }
  .ing-qty  { font-size: 0.75rem; color: var(--accent); font-weight: 500; }

  .ing-tooltip { position: absolute; bottom: calc(100% + 10px); left: 50%; transform: translateX(-50%) scale(0.92); width: 220px; background: #1a1a1a; border: 1px solid rgba(255,123,44,0.4); border-radius: 12px; padding: 16px; z-index: 200; box-shadow: 0 16px 40px rgba(0,0,0,0.7); pointer-events: none; opacity: 0; transition: opacity 0.2s ease, transform 0.2s ease; }
  .ingredient-chip:hover .ing-tooltip, .ingredient-chip:focus .ing-tooltip { opacity: 1; transform: translateX(-50%) scale(1); }
  .ing-tooltip::after { content: ''; position: absolute; top: 100%; left: 50%; transform: translateX(-50%); border: 6px solid transparent; border-top-color: rgba(255,123,44,0.4); }
  .tooltip-title { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 0.95rem; color: var(--accent); margin-bottom: 10px; padding-bottom: 8px; border-bottom: 1px solid rgba(255,255,255,0.08); }
  .tooltip-row { display: flex; justify-content: space-between; font-size: 0.75rem; padding: 3px 0; color: var(--text-secondary); }
  .tooltip-row span:last-child { color: var(--text-primary); font-weight: 500; }
  .tooltip-desc { margin-top: 8px; font-size: 0.72rem; color: #888; font-style: italic; border-top: 1px solid rgba(255,255,255,0.06); padding-top: 8px; }

  /* ── STEPS ── */
  .steps-list { display: flex; flex-direction: column; gap: 20px; }
  .step-item { display: flex; gap: 18px; align-items: flex-start; padding: 20px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.05); background: rgba(255,255,255,0.02); transition: var(--transition); cursor: default; }
  .step-item:hover { border-color: rgba(255,123,44,0.25); background: rgba(255,123,44,0.04); }
  .step-num { width: 40px; height: 40px; border-radius: 50%; background: var(--accent-dim); border: 2px solid var(--accent); display: grid; place-items: center; font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 900; color: var(--accent); flex-shrink: 0; transition: var(--transition); }
  .step-item:hover .step-num { background: var(--accent); color: #fff; }
  .step-content h3 { font-size: 0.9rem; font-weight: 600; color: var(--text-primary); margin-bottom: 6px; }
  .step-content p  { font-size: 0.85rem; color: var(--text-secondary); line-height: 1.7; }
  .step-time { display: inline-flex; align-items: center; gap: 4px; font-size: 0.72rem; color: var(--accent); background: var(--accent-dim); padding: 2px 8px; border-radius: 100px; margin-top: 8px; }

  /* ── VIDEO ── */
  .video-container { position: relative; padding-bottom: 56.25%; height: 0; border-radius: 10px; overflow: hidden; }
  .video-container iframe { position: absolute; inset: 0; width: 100%; height: 100%; border: none; }

  /* ── SIDEBAR ── */
  .chef-card { text-align: center; }
  .chef-avatar { width: 88px; height: 88px; border-radius: 50%; border: 3px solid var(--accent); object-fit: cover; margin: 24px auto 12px; display: block; box-shadow: 0 0 0 6px var(--accent-dim); }
  .chef-name  { font-family: 'Playfair Display', serif; font-size: 1.1rem; font-weight: 700; color: var(--text-primary); }
  .chef-title { font-size: 0.78rem; color: var(--accent); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 12px; }
  .chef-bio   { font-size: 0.82rem; color: var(--text-secondary); line-height: 1.7; padding: 0 16px 16px; }
  .star-row   { display: flex; justify-content: center; gap: 4px; margin: 6px 0 12px; font-size: 1rem; }
  .star-filled { color: var(--accent); }
  .star-empty  { color: #444; }
  .nutrition-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
  .nut-box { background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07); border-radius: 8px; padding: 12px; text-align: center; transition: var(--transition); }
  .nut-box:hover { border-color: var(--accent); background: var(--accent-dim); }
  .nut-val   { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: var(--accent); }
  .nut-label { font-size: 0.72rem; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.8px; margin-top: 2px; }

  /* ── TAGS ── */
  .tags { display: flex; flex-wrap: wrap; gap: 8px; padding-top: 4px; }
  .tag { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 100px; padding: 4px 12px; font-size: 0.75rem; color: var(--text-secondary); transition: var(--transition); }
  .tag:hover { background: var(--accent-dim); color: var(--accent); border-color: var(--accent); }

  /* ── FAB ── */
  .fab-cluster { position: fixed; bottom: 32px; right: 32px; display: flex; flex-direction: column; align-items: flex-end; gap: 12px; z-index: 300; }
  .fab-group { display: flex; flex-direction: column; gap: 10px; align-items: flex-end; overflow: hidden; max-height: 0; transition: max-height 0.4s ease, opacity 0.3s ease; opacity: 0; }
  .fab-group.open { max-height: 400px; opacity: 1; }
  .fab { display: flex; align-items: center; gap: 10px; border: none; border-radius: 100px; padding: 11px 20px 11px 16px; font-family: 'DM Sans', sans-serif; font-size: 0.82rem; font-weight: 600; cursor: pointer; transition: var(--transition); text-decoration: none; white-space: nowrap; box-shadow: 0 4px 16px rgba(0,0,0,0.5); }
  .fab .fab-icon { font-size: 1rem; }
  .fab-main { width: 54px; height: 54px; border-radius: 50%; padding: 0; background: var(--accent); color: #fff; font-size: 1.3rem; justify-content: center; box-shadow: 0 6px 24px rgba(255,123,44,0.5); }
  .fab-main:hover { transform: rotate(45deg) scale(1.1); }
  .fab-main.open { transform: rotate(45deg); }
  .fab-delete { background: #2b1414; color: #e74c3c; border: 1px solid rgba(231,76,60,0.3); }
  .fab-delete:hover { background: #e74c3c; color: #fff; transform: translateX(-4px); }
  .fab-chat   { background: #132b1a; color: #2ecc71; border: 1px solid rgba(46,204,113,0.3); }
  .fab-chat:hover   { background: #2ecc71; color: #fff; transform: translateX(-4px); }
  .fab-pdf    { background: #131a2b; color: #3498db; border: 1px solid rgba(52,152,219,0.3); }
  .fab-pdf:hover    { background: #3498db; color: #fff; transform: translateX(-4px); }
  .fab-print  { background: #1e1e2b; color: #9b59b6; border: 1px solid rgba(155,89,182,0.3); }
  .fab-print:hover  { background: #9b59b6; color: #fff; transform: translateX(-4px); }

  /* ── DELETE MODAL ── */
  .modal-backdrop { position: fixed; inset: 0; background: rgba(0,0,0,0.75); backdrop-filter: blur(6px); z-index: 500; display: grid; place-items: center; opacity: 0; pointer-events: none; transition: opacity 0.3s; }
  .modal-backdrop.active { opacity: 1; pointer-events: all; }
  .modal { background: #1e1e1e; border: 1px solid rgba(231,76,60,0.35); border-radius: 16px; padding: 36px; max-width: 400px; width: 90%; text-align: center; transform: scale(0.9); transition: transform 0.3s; box-shadow: 0 24px 64px rgba(0,0,0,0.8); }
  .modal-backdrop.active .modal { transform: scale(1); }
  .modal-icon { font-size: 2.5rem; margin-bottom: 12px; }
  .modal h3 { font-family: 'Playfair Display', serif; font-size: 1.3rem; margin-bottom: 8px; }
  .modal p  { font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 24px; }
  .modal-btns { display: flex; gap: 12px; justify-content: center; }
  .btn { padding: 10px 24px; border-radius: 8px; border: none; font-family: 'DM Sans', sans-serif; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: var(--transition); }
  .btn-cancel { background: rgba(255,255,255,0.08); color: var(--text-primary); }
  .btn-cancel:hover { background: rgba(255,255,255,0.14); }
  .btn-danger { background: var(--danger); color: #fff; }
  .btn-danger:hover { background: #c0392b; }

  /* ── BUY BUTTON ── */
  .ingredients-actions { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 16px; }
  .ingredients-hint { font-size: 0.78rem; color: var(--text-secondary); }
  .buy-all-btn { display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #ff7b2c 0%, #ff5500 100%); color: #fff; border: none; border-radius: 100px; padding: 9px 22px; font-family: 'DM Sans', sans-serif; font-size: 0.82rem; font-weight: 600; cursor: pointer; transition: var(--transition); box-shadow: 0 4px 18px rgba(255,123,44,0.4); letter-spacing: 0.3px; }
  .buy-all-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(255,123,44,0.55); }
  .buy-all-btn:active { transform: translateY(0); }
  .buy-all-btn .btn-cart-icon { font-size: 0.95rem; line-height: 1; }
  .buy-all-btn .btn-pulse { width: 7px; height: 7px; border-radius: 50%; background: rgba(255,255,255,0.7); animation: pulse-dot 1.6s ease-in-out infinite; }
  @keyframes pulse-dot { 0%, 100% { opacity: 0.4; transform: scale(0.8); } 50% { opacity: 1; transform: scale(1.2); } }

  /* ── SHOP PANEL ── */
  .shop-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.7); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); z-index: 700; display: flex; align-items: flex-end; justify-content: center; opacity: 0; pointer-events: none; transition: opacity 0.35s ease; }
  .shop-overlay.active { opacity: 1; pointer-events: all; }
  .shop-panel { background: #181818; border: 1px solid rgba(255,123,44,0.2); border-bottom: none; border-radius: 24px; width: 100%; max-width: 580px; padding: 0 0 40px; transform: translateY(100%); transition: transform 0.45s cubic-bezier(0.34,1.4,0.64,1); box-shadow: 0 -20px 80px rgba(0,0,0,0.8); overflow: hidden; position: absolute; top: 10vh; }
  .shop-overlay.active .shop-panel { transform: translateY(0); }
  .shop-drag-handle { display: flex; justify-content: center; padding: 14px 0 6px; }
  .shop-drag-handle span { width: 44px; height: 4px; background: rgba(255,255,255,0.15); border-radius: 100px; display: block; }
  .shop-panel-header { display: flex; align-items: center; justify-content: space-between; padding: 8px 24px 18px; border-bottom: 1px solid rgba(255,255,255,0.06); }
  .shop-panel-title { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; color: var(--text-primary); line-height: 1.3; }
  .shop-panel-title span { display: block; font-family: 'DM Sans', sans-serif; font-size: 0.75rem; font-weight: 400; color: var(--text-secondary); margin-top: 2px; }
  .shop-panel-close { width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.1); color: var(--text-secondary); font-size: 1.1rem; cursor: pointer; display: grid; place-items: center; transition: var(--transition); flex-shrink: 0; }
  .shop-panel-close:hover { background: rgba(255,255,255,0.14); color: var(--text-primary); }
  .shop-items-list { padding: 20px 20px 0; display: flex; flex-direction: column; gap: 12px; }
  .shop-item-link { display: flex; align-items: center; gap: 16px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07); border-radius: 16px; padding: 16px 18px; text-decoration: none; transition: var(--transition); cursor: pointer; position: relative; overflow: hidden; }
  .shop-item-link::before { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, var(--shop-color, rgba(255,123,44,0.06)) 0%, transparent 60%); opacity: 0; transition: opacity 0.3s; }
  .shop-item-link:hover { border-color: var(--shop-color, rgba(255,123,44,0.35)); transform: translateX(5px); background: rgba(255,255,255,0.05); }
  .shop-item-link:hover::before { opacity: 1; }
  .shop-logo-wrap { width: 52px; height: 52px; border-radius: 12px; background: #fff; display: flex; align-items: center; justify-content: center; flex-shrink: 0; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 4px 12px rgba(0,0,0,0.3); }
  .shop-item-info { flex: 1; min-width: 0; }
  .shop-item-name { font-size: 0.95rem; font-weight: 600; color: var(--text-primary); margin-bottom: 3px; }
  .shop-item-desc { font-size: 0.76rem; color: var(--text-secondary); line-height: 1.5; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .shop-item-badge { font-size: 0.68rem; font-weight: 600; padding: 3px 9px; border-radius: 100px; white-space: nowrap; flex-shrink: 0; }
  .badge-fast    { background: rgba(46,204,113,0.15); color: #2ecc71; border: 1px solid rgba(46,204,113,0.25); }
  .badge-value   { background: rgba(52,152,219,0.15); color: #3498db; border: 1px solid rgba(52,152,219,0.25); }
  .badge-premium { background: rgba(255,123,44,0.15); color: var(--accent); border: 1px solid rgba(255,123,44,0.25); }
  .shop-arrow { color: var(--text-secondary); font-size: 1rem; flex-shrink: 0; transition: var(--transition); }
  .shop-item-link:hover .shop-arrow { color: var(--text-primary); transform: translateX(3px); }
  .shop-panel-note { margin: 18px 20px 0; padding: 12px 16px; background: rgba(255,123,44,0.07); border: 1px solid rgba(255,123,44,0.15); border-radius: 10px; font-size: 0.75rem; color: var(--text-secondary); text-align: center; line-height: 1.6; }
  .shop-panel-note strong { color: var(--accent); }

  /* ── LIGHTBOX ── */
  .lightbox { position: fixed; inset: 0; background: rgba(0,0,0,0.92); backdrop-filter: blur(14px); z-index: 800; display: flex; align-items: center; justify-content: center; opacity: 0; pointer-events: none; transition: opacity 0.3s; }
  .lightbox.active { opacity: 1; pointer-events: all; }
  .lightbox img { max-width: 90vw; max-height: 85vh; border-radius: 12px; box-shadow: 0 32px 80px rgba(0,0,0,0.8); transform: scale(0.92); transition: transform 0.3s; object-fit: contain; }
  .lightbox.active img { transform: scale(1); }
  .lightbox-close { position: absolute; top: 24px; right: 28px; width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff; font-size: 1.1rem; cursor: pointer; display: grid; place-items: center; transition: var(--transition); }
  .lightbox-close:hover { background: rgba(255,255,255,0.2); }
  .lightbox-credit { position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); font-size: 0.75rem; color: rgba(255,255,255,0.5); background: rgba(0,0,0,0.5); padding: 4px 14px; border-radius: 100px; }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .page-wrap { grid-template-columns: 1fr; }
    .sidebar { order: -1; }
    .hero { height: 340px; }
    .hero-overlay { padding: 28px; }
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
    .shop-item-desc { display: none; }
  }
  @media print {
    .fab-cluster, header, .shop-overlay, .lightbox { display: none; }
    body { background: #fff; color: #000; }
    .card { border: 1px solid #ddd; box-shadow: none; }
    .hero { height: 200px; }
  }

  .reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
  .reveal.visible { opacity: 1; transform: translateY(0); }
</style>
</head>
<body>

<header>
  <a class="logo" href="#">Flavor<span>Verse</span></a>
  <div class="header-meta">
    <span class="dot">✦</span>
    <span class="dot">✦</span>
    <button id="theme-toggle-btn" title="Toggle Dark/Light Mode" style="background: none; border: 2px solid var(--accent); color: var(--accent); width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: var(--transition); font-size: 1.2rem; margin-left: 15px;">
        <i class="fas fa-moon"></i>
    </button>
  </div>
</header>

<section class="hero">
  <img class="hero-img" src="" alt="" id="mainHeroImg" />
  <div class="hero-overlay">
    <span class="hero-tag">⭐ Editor's Pick</span>
    <h1 id="recipi_name"></h1>
    <div class="hero-stats">
      <div class="stat"><span class="stat-icon">⏱</span><span><strong></strong> Prep</span></div>
      <div class="stat"><span class="stat-icon">🔥</span><span><strong></strong> Cook</span></div>
      <div class="stat"><span class="stat-icon">🍽</span><span><strong></strong> Servings</span></div>
      <div class="stat"><span class="stat-icon">📊</span><span><strong></strong> Level</span></div>
      <div class="stat"><span class="stat-icon">🌍</span><span><strong></strong> Cuisine</span></div>
    </div>
  </div>
</section>

<div class="page-wrap">
  <main class="main-col">

    <div class="card reveal">
      <div class="card-body">
        <p class="recipe-desc" id="descrption"></p>
        <div class="tags" style="margin-top:16px;">
          <span class="tag">🐄 Beef</span><span class="tag">🍝 Pasta</span>
          <span class="tag">🇮🇹 Italian</span><span class="tag">🧀 Cheese</span>
          <span class="tag">🍷 Wine</span><span class="tag">Family Friendly</span>
        </div>
      </div>
    </div>

    <!-- ══ GALLERY — populated by renderGallery() ══ -->
    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">📸</div>
        <h2>Gallery</h2>
      </div>
      <div class="card-body">
        <!-- Three skeleton tiles shown while Unsplash loads -->
        <div class="gallery-grid" id="galleryGrid">
          <div class="gallery-skeleton"></div>
          <div class="gallery-skeleton"></div>
          <div class="gallery-skeleton"></div>
        </div>
      </div>
    </div>

    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">🧾</div>
        <h2>Ingredients</h2>
      </div>
      <div class="card-body" style="display:flex; flex-direction:column;justify-content: flex-end;height: 65vh; ">
        <div class="ingredients-actions">
          <p class="ingredients-hint">Hover over any ingredient for detailed nutritional info.</p>
          <button class="buy-all-btn" onclick="openShopPanel()">
            <span class="btn-cart-icon">🛒</span>
            Buy Ingredients
            <span class="btn-pulse"></span>
          </button>
        </div>
        <div class="ingredients-grid" id="ingredientsGrid"></div>
      </div>
    </div>

    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">👨‍🍳</div>
        <h2>Cooking Steps</h2>
      </div>
      <div class="card-body">
        <ol class="steps-list" id="stepsList"></ol>
      </div>
    </div>

    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">▶️</div>
        <h2>Watch It Made</h2>
      </div>
      <div class="card-body">
        <div class="video-container">
          <iframe src="https://www.youtube.com/embed/nOlZuJ7icD0?si=vbLOuYZDq2KYQS6z" title="Spaghetti Bolognese Recipe" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
    </div>

  </main>

  <aside class="sidebar">

    <div class="card chef-card reveal">
      <img class="chef-avatar" src="https://i.pravatar.cc/150?img=57" alt="Chef Marco Rossi" />
      <p class="chef-name">Marco Rossi</p>
      <p class="chef-title">Executive Chef</p>
      <div class="star-row">
        <span class="star-filled">★</span><span class="star-filled">★</span>
        <span class="star-filled">★</span><span class="star-filled">★</span>
        <span class="star-empty">★</span>
      </div>
      <p class="chef-bio">With 20 years honing his craft in the trattorias of Bologna and Milan, Chef Marco brings authentic regional technique to every dish — celebrating simplicity, quality produce, and the soulful patience that defines true Italian cooking.</p>
    </div>

    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">💪</div>
        <h2>Nutrition (per serving)</h2>
      </div>
      <div class="card-body">
        <div class="nutrition-grid" id="nutrition-grid"></div>
      </div>
    </div>

    <div class="card reveal">
      <div class="card-header">
        <div class="section-icon">💡</div>
        <h2>Chef's Tips</h2>
      </div>
      <div class="card-body" style="padding-top:16px;">
        <ul style="list-style:none;display:flex;flex-direction:column;gap:12px;">
          <li style="font-size:0.83rem;color:var(--text-secondary);padding-left:20px;position:relative;"><span style="position:absolute;left:0;color:var(--accent);">▸</span>Use a mix of pork and beef mince for extra depth and richness.</li>
          <li style="font-size:0.83rem;color:var(--text-secondary);padding-left:20px;position:relative;"><span style="position:absolute;left:0;color:var(--accent);">▸</span>Always finish pasta in the sauce pan — never plate separately.</li>
          <li style="font-size:0.83rem;color:var(--text-secondary);padding-left:20px;position:relative;"><span style="position:absolute;left:0;color:var(--accent);">▸</span>A splash of whole milk added near the end tames acidity beautifully.</li>
          <li style="font-size:0.83rem;color:var(--text-secondary);padding-left:20px;position:relative;"><span style="position:absolute;left:0;color:var(--accent);">▸</span>Reserve pasta water — it's liquid gold for adjusting consistency.</li>
        </ul>
      </div>
    </div>

  </aside>
</div>

<!-- FAB -->
<div class="fab-cluster">
  <div class="fab-group" id="fabGroup">
    <button class="fab fab-delete" onclick="openDeleteModal()"><span class="fab-icon">🗑</span> Delete Recipe</button>
    <a class="fab fab-chat" href="AiBot.php"><span class="fab-icon">🤖</span> Ask Chatbot</a>
    <button class="fab fab-pdf" onclick="downloadPDF()"><span class="fab-icon">📄</span> Save as PDF</button>
    <button class="fab fab-print" onclick="window.print()"><span class="fab-icon">🖨</span> Print Recipe</button>
  </div>
  <button class="fab fab-main" id="fabMain" onclick="toggleFab()" title="Actions">＋</button>
</div>

<!-- DELETE MODAL -->
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

<!-- SHOP PANEL -->
<div class="shop-overlay" id="shopOverlay" onclick="handleShopOverlayClick(event)">
  <div class="shop-panel" id="shopPanel">
    <div class="shop-drag-handle"><span></span></div>
    <div class="shop-panel-header">
      <div class="shop-panel-title">Buy Ingredients<span>Choose your preferred store to shop all items</span></div>
      <button class="shop-panel-close" onclick="closeShopPanel()">✕</button>
    </div>
    <div class="shop-items-list">
      <a class="shop-item-link" href="https://www.keells.lk" target="_blank" rel="noopener noreferrer" style="--shop-color:rgba(220,30,40,0.3);">
        <div class="shop-logo-wrap"><svg viewBox="0 0 38 38" width="38" height="38" xmlns="http://www.w3.org/2000/svg"><rect width="38" height="38" rx="6" fill="#dc1e28"/><text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="18" font-weight="bold" font-family="Arial,sans-serif">K</text></svg></div>
        <div class="shop-item-info"><div class="shop-item-name">Keells Super</div><div class="shop-item-desc">Sri Lanka's leading supermarket — fresh produce &amp; pantry staples island-wide</div></div>
        <span class="shop-item-badge badge-fast">🏪 In-Store</span><span class="shop-arrow">›</span>
      </a>
      <a class="shop-item-link" href="https://www.arpico.com" target="_blank" rel="noopener noreferrer" style="--shop-color:rgba(0,100,200,0.3);">
        <div class="shop-logo-wrap"><svg viewBox="0 0 38 38" width="38" height="38" xmlns="http://www.w3.org/2000/svg"><rect width="38" height="38" rx="6" fill="#0055a5"/><text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="14" font-weight="bold" font-family="Arial,sans-serif">AR</text></svg></div>
        <div class="shop-item-info"><div class="shop-item-name">Arpico Supercentre</div><div class="shop-item-desc">Wide variety of imported &amp; local groceries at competitive prices</div></div>
        <span class="shop-item-badge badge-value">💰 Best Value</span><span class="shop-arrow">›</span>
      </a>
      <a class="shop-item-link" href="https://www.cargillsceylon.com" target="_blank" rel="noopener noreferrer" style="--shop-color:rgba(0,160,70,0.3);">
        <div class="shop-logo-wrap"><svg viewBox="0 0 38 38" width="38" height="38" xmlns="http://www.w3.org/2000/svg"><rect width="38" height="38" rx="6" fill="#009944"/><text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="13" font-weight="bold" font-family="Arial,sans-serif">FC</text></svg></div>
        <div class="shop-item-info"><div class="shop-item-name">Cargills Food City</div><div class="shop-item-desc">900+ branches across Sri Lanka — convenient neighbourhood grocery shopping</div></div>
        <span class="shop-item-badge badge-premium">⭐ Popular</span><span class="shop-arrow">›</span>
      </a>
    </div>
    <div class="shop-panel-note"><strong>Tip:</strong> Prices &amp; stock vary by location. Tap a store to browse their latest offers and confirm ingredient availability near you.</div>
  </div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
  <button class="lightbox-close" onclick="closeLightbox()">✕</button>
  <img id="lightboxImg" src="" alt="" onclick="event.stopPropagation()" />
  <div class="lightbox-credit" id="lightboxCredit"></div>
</div>

<script>
/* ═══════════════════════════════════════════════════════════
   getImageUrl(recipeName)
   ────────────────────────────────────────────────────────
   Fetches up to 5 results from Unsplash for the recipe name.

   result[0]       → hero banner   (uses urls.regular ≈ 1080px)
   result[1–3]     → gallery tiles (uses urls.small   ≈ 400px)

   Skeletons in #galleryGrid are replaced once images arrive.
   Clicking a gallery tile opens a full-res lightbox.
════════════════════════════════════════════════════════════ */
function getImageUrl(recipeName) {
  const query = encodeURIComponent(recipeName);
  const url   = `https://api.unsplash.com/search/photos?query=${query}&per_page=5&client_id=7IumigsVYsLtzTgrTULz0clj5Yv_YlYE1xydk48TaUM`;

  fetch(url)
    .then(r => r.json())
    .then(data => {
      const results = data.results || [];

      /* ── Hero image: first result ── */
      if (results.length > 0) {
        const heroImg = document.getElementById('mainHeroImg');
        heroImg.src = results[0].urls.regular;
        heroImg.alt = results[0].alt_description || recipeName;
      }

      /* ── Gallery images: results[1], [2], [3] ── */
      renderGallery(results.slice(1, 4), recipeName);
    })
    .catch(err => {
      console.error('Unsplash fetch error:', err);
      renderGallery([], recipeName); // show fallback tiles on error
    });
}

/* ── Build the gallery grid from Unsplash photo objects ── */
function renderGallery(photos, recipeName) {
  const grid = document.getElementById('galleryGrid');
  grid.innerHTML = ''; // remove skeleton placeholders

  for (let i = 0; i < 3; i++) {
    const item = document.createElement('div');
    item.className = 'gallery-item';

    if (photos[i]) {
      const photo        = photos[i];
      const thumbSrc     = photo.urls.small;              // ~400px — fast thumbnail
      const fullSrc      = photo.urls.regular;            // ~1080px — lightbox
      const alt          = photo.alt_description || recipeName;
      const photographer = photo.user ? photo.user.name : '';
      const profileLink  = photo.user ? photo.user.links.html : '#';

      item.innerHTML = `
        <img src="${thumbSrc}" alt="${alt}" loading="lazy" />
        <div class="photo-credit">📷 <a href="${profileLink}+?utm_source=flavorverse&utm_medium=referral"
            target="_blank" rel="noopener noreferrer"
            style="color:inherit;text-decoration:underline;"
            onclick="event.stopPropagation()">
            ${photographer}
          </a> / Unsplash
        </div>`;

      /* Open lightbox on click */
      item.addEventListener('click', () => openLightbox(fullSrc, alt, photographer, profileLink));

    } else {
      /* Fallback tile — fewer than 3 results returned */
      item.style.cssText = 'display:grid;place-items:center;background:rgba(255,255,255,0.04);';
      item.innerHTML     = `<span style="font-size:2rem;opacity:0.25;">🍽</span>`;
    }

    grid.appendChild(item);
  }
}

/* ═══════════════════════════════════════════════════════════
   LIGHTBOX
════════════════════════════════════════════════════════════ */
function openLightbox(src, alt, photographer, profileLink) {
  const lb     = document.getElementById('lightbox');
  const lbImg  = document.getElementById('lightboxImg');
  const lbCred = document.getElementById('lightboxCredit');

  lbImg.src = src;
  lbImg.alt = alt;
  lbCred.innerHTML = photographer
    ? `📷 <a href="${profileLink}?utm_source=flavorverse&utm_medium=referral" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:underline;">${photographer}</a> on Unsplash`
    : '';

  lb.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeLightbox() {
  document.getElementById('lightbox').classList.remove('active');
  document.body.style.overflow = '';
}

/* ═══════════════════════════════════════════════════════════
   SHOP PANEL
════════════════════════════════════════════════════════════ */
function openShopPanel() {
  document.getElementById('shopOverlay').classList.add('active');
  document.body.style.overflow = 'hidden';
}
function closeShopPanel() {
  document.getElementById('shopOverlay').classList.remove('active');
  document.body.style.overflow = '';
}
function handleShopOverlayClick(e) {
  if (e.target === document.getElementById('shopOverlay')) closeShopPanel();
}

/* ═══════════════════════════════════════════════════════════
   LOAD RECIPE  (calls getImageUrl once recipe name is known)
════════════════════════════════════════════════════════════ */
function loadRecipe() {
  var ingredients = [];
  var total = { cal: 0, carbs: 0, protein: 0, fat: 0 };
  var recipeName;
  var id_num = "<?php echo $id; ?>";

  const desc1 = document.getElementById('descrption');
  const name2 = document.getElementById('recipi_name');

  fetch(`view.php?id=${id_num}`)
    .then(r => r.json())
    .then(recipe => {
      recipe.forEach(item => {
        recipeName         = item.r_name;
        total.cal         += parseFloat(item.calories);
        total.carbs       += parseFloat(item.carbohydrates);
        total.fat         += parseFloat(item.fat);
        total.protein     += parseFloat(item.protein);

        ingredients.push({
          name:    item.ingredient_name,
          qty:     item.quantity + item.unit,
          unit:    item.unit,
          cal:     parseFloat(item.calories),
          protein: item.protein,
          carbs:   item.carbohydrates,
          fat:     item.fat,
          desc:    item.description
        });

        desc1.innerHTML = item.description;
        name2.innerHTML = item.r_name;
      });

      renderINGREDIENTS(ingredients);
      rendertotal(total);

      /* Fetch images AFTER we have the recipe name */
      getImageUrl(recipeName);
    })
    .catch(err => console.error('Recipe load error:', err));
}

loadRecipe();

/* ═══════════════════════════════════════════════════════════
   LOAD STEPS
════════════════════════════════════════════════════════════ */
function loadstep() {
  var id_num = "<?php echo $id; ?>";
  fetch(`steps.php?id=${id_num}`)
    .then(r => r.json())
    .then(steps => RENDERSTEPS(steps))
    .catch(err => console.error('Steps load error:', err));
}
loadstep();

/* ═══════════════════════════════════════════════════════════
   RENDER HELPERS
════════════════════════════════════════════════════════════ */
function renderINGREDIENTS(list) {
  const grid = document.getElementById('ingredientsGrid');
  list.forEach(ing => {
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
}

function rendertotal(total) {
  const g = document.getElementById('nutrition-grid');
  for (let key in total) {
    const box = document.createElement('div');
    box.className = 'nut-box';
    box.innerHTML = `<div class="nut-val">${total[key].toFixed(2)}</div><div class="nut-label">${key}</div>`;
    g.appendChild(box);
  }
}

function RENDERSTEPS(steps) {
  const list = document.getElementById('stepsList');
  steps.forEach((step, i) => {
    const li = document.createElement('li');
    li.className = 'step-item';
    li.innerHTML = `
      <div class="step-num">${i + 1}</div>
      <div class="step-content">
        <p>${step.step_description}</p>
        <span class="step-time">⏱ not set</span>
      </div>`;
    list.appendChild(li);
  });
}

/* ═══════════════════════════════════════════════════════════
   FAB / DELETE / PRINT
════════════════════════════════════════════════════════════ */
let fabOpen = false;
function toggleFab() {
  fabOpen = !fabOpen;
  document.getElementById('fabGroup').classList.toggle('open', fabOpen);
  document.getElementById('fabMain').classList.toggle('open', fabOpen);
}

function openDeleteModal() {
  var id = "<?php echo $id; ?>";
  if (!confirm('Are you sure you want to delete this?')) return;
  fetch(`delete.php?id=${id}`, { method: 'GET' })
    .then(res => res.json())
    .then(data => {
      window.open(data.success ? 'delete_successORerror.php?id=1' : 'delete_successORerror.php?id=0', '_self');
    });
}
function closeDeleteModal() { document.getElementById('deleteModal').classList.remove('active'); }
function confirmDelete() {
  closeDeleteModal();
  const toast = document.createElement('div');
  toast.textContent = '✓ Recipe deleted successfully.';
  Object.assign(toast.style, { position:'fixed', bottom:'96px', left:'50%', transform:'translateX(-50%)', background:'#e74c3c', color:'#fff', padding:'12px 24px', borderRadius:'100px', fontSize:'0.84rem', fontWeight:'600', zIndex:'600', boxShadow:'0 4px 16px rgba(0,0,0,0.4)' });
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 3500);
}
function downloadPDF() { window.print(); }

/* Global Escape key */
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') { closeShopPanel(); closeLightbox(); }
});

/* Scroll reveal */
const observer = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach((el, i) => {
  el.style.transitionDelay = (i * 0.07) + 's';
  observer.observe(el);
});

document.getElementById('deleteModal').addEventListener('click', function(e) {
  if (e.target === this) closeDeleteModal();
});
</script>

<!-- Theme Toggle Script -->
<script src="theme-toggle.js"></script>
</body>
</html>