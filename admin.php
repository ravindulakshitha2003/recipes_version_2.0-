<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>RecipeHub — Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&family=Barlow+Condensed:wght@500;600;700;800&display=swap" rel="stylesheet"/>
<style>
:root {
  --bg:       #000000;
  --bg1:      #0a0a0a;
  --bg2:      #111111;
  --bg3:      #181818;
  --border:   rgba(0,229,200,0.10);
  --border2:  rgba(0,229,200,0.22);
  --cyan:     #00e5c8;
  --cyan-dim: rgba(0,229,200,0.07);
  --cyan-mid: rgba(0,229,200,0.15);
  --glow:     0 0 28px rgba(0,229,200,0.14);
  --text:     #eeeef0;
  --text2:    #6e6e7a;
  --text3:    #3a3a42;
  --success:  #00e5a0;
  --danger:   #ff4060;
  --warn:     #ffc840;
  --info:     #00b4ff;
  --r:        6px;
  --sidebar:  228px;
  --ease:     cubic-bezier(.16,1,.3,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{
  font-family:'Barlow',sans-serif;
  background:var(--bg);
  color:var(--text);
  display:flex;min-height:100vh;overflow-x:hidden;
}
::-webkit-scrollbar{width:3px;height:3px;}
::-webkit-scrollbar-track{background:transparent;}
::-webkit-scrollbar-thumb{background:var(--cyan-mid);border-radius:99px;}

/* ── SIDEBAR ── */
.sidebar{
  width:var(--sidebar);min-height:100vh;
  background:var(--bg1);
  border-right:1px solid var(--border);
  display:flex;flex-direction:column;
  position:fixed;left:0;top:0;bottom:0;z-index:300;
  transition:transform .28s var(--ease);
}
.logo{
  display:flex;align-items:center;gap:11px;
  padding:22px 18px 20px;
  border-bottom:1px solid var(--border);
}
.logo-mark{
  width:30px;height:30px;
  border:1.5px solid var(--cyan);
  display:flex;align-items:center;justify-content:center;
  font-size:14px;flex-shrink:0;
}
.logo-text{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:800;font-size:16px;
  letter-spacing:3px;text-transform:uppercase;
}
.logo-text span{color:var(--cyan);}

.nav{flex:1;padding:14px 8px;display:flex;flex-direction:column;gap:1px;overflow-y:auto;}
.nav-sec{
  font-family:'Barlow Condensed',sans-serif;
  font-size:9px;letter-spacing:3px;font-weight:700;
  text-transform:uppercase;color:var(--text3);
  padding:14px 10px 5px;
}
.nav-item{
  display:flex;align-items:center;gap:10px;
  padding:9px 12px;border-radius:var(--r);
  cursor:pointer;font-size:13px;font-weight:500;
  color:var(--text2);transition:all .18s;
  position:relative;user-select:none;letter-spacing:.3px;
}
.nav-item:hover{background:var(--cyan-dim);color:var(--text);}
.nav-item.active{background:var(--cyan-dim);color:var(--cyan);font-weight:600;}
.nav-item.active::before{
  content:'';position:absolute;left:0;top:50%;transform:translateY(-50%);
  width:2px;height:14px;background:var(--cyan);border-radius:0 2px 2px 0;
}
.nav-icon{font-size:14px;width:18px;text-align:center;flex-shrink:0;}
.nav-badge{
  margin-left:auto;background:var(--cyan);color:var(--bg);
  font-size:9px;font-weight:800;padding:1px 6px;border-radius:99px;
  font-family:'Barlow Condensed',sans-serif;letter-spacing:.5px;
}
.sidebar-footer{padding:12px 8px;border-top:1px solid var(--border);}
.admin-row{
  display:flex;align-items:center;gap:9px;padding:9px 12px;
  border-radius:var(--r);background:var(--bg2);border:1px solid var(--border);
}
.admin-av{
  width:30px;height:30px;background:var(--cyan);color:var(--bg);border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  font-size:11px;font-weight:800;flex-shrink:0;
  font-family:'Barlow Condensed',sans-serif;
}
.admin-name{font-size:12.5px;font-weight:600;letter-spacing:.2px;}
.admin-role{
  font-size:9.5px;color:var(--cyan);font-weight:700;
  letter-spacing:1.5px;text-transform:uppercase;
  font-family:'Barlow Condensed',sans-serif;
}

/* ── MAIN ── */
.main{margin-left:var(--sidebar);flex:1;display:flex;flex-direction:column;min-width:0;}

/* ── HEADER ── */
.header{
  height:58px;background:var(--bg1);border-bottom:1px solid var(--border);
  display:flex;align-items:center;padding:0 22px;gap:12px;
  position:sticky;top:0;z-index:100;
}
.menu-btn{display:none;background:none;border:none;color:var(--text);font-size:20px;cursor:pointer;}
.h-title{
  font-family:'Barlow Condensed',sans-serif;font-weight:800;font-size:16px;
  letter-spacing:2.5px;text-transform:uppercase;flex:1;
}
.h-search{
  display:flex;align-items:center;background:var(--bg2);
  border:1px solid var(--border);border-radius:var(--r);
  padding:6px 12px;gap:7px;width:210px;transition:border-color .18s;
}
.h-search:focus-within{border-color:var(--cyan);}
.h-search input{
  background:none;border:none;outline:none;color:var(--text);
  font-family:'Barlow',sans-serif;font-size:12.5px;width:100%;
}
.h-search input::placeholder{color:var(--text3);}
.h-ico{color:var(--text3);font-size:13px;}
.h-actions{display:flex;align-items:center;gap:6px;}
.icon-btn{
  width:34px;height:34px;background:var(--bg2);border:1px solid var(--border);
  border-radius:var(--r);display:flex;align-items:center;justify-content:center;
  cursor:pointer;font-size:14px;color:var(--text2);transition:all .18s;position:relative;
}
.icon-btn:hover{border-color:var(--cyan);color:var(--cyan);box-shadow:var(--glow);}
.ndot{
  width:6px;height:6px;background:var(--cyan);border-radius:50%;
  position:absolute;top:5px;right:5px;border:1.5px solid var(--bg1);
}

/* ── CONTENT ── */
.content{flex:1;padding:22px;overflow-y:auto;}

/* ── SECTIONS ── */
.section{display:none;animation:fadeUp .28s var(--ease) both;}
.section.active{display:block;}
@keyframes fadeUp{from{opacity:0;transform:translateY(12px);}to{opacity:1;transform:translateY(0);}}

/* ── PAGE HEADER ── */
.pg-head{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:18px;gap:10px;flex-wrap:wrap;}
.pg-title{
  font-family:'Barlow Condensed',sans-serif;font-size:26px;
  font-weight:800;letter-spacing:2px;text-transform:uppercase;line-height:1;
}
.pg-sub{font-size:12.5px;color:var(--text2);margin-top:5px;letter-spacing:.3px;}
.pg-date{
  font-size:10.5px;color:var(--text2);background:var(--bg2);
  padding:5px 12px;border-radius:var(--r);border:1px solid var(--border);
  font-family:'Barlow Condensed',sans-serif;letter-spacing:1.5px;text-transform:uppercase;
}

/* ── ACCENT LINE ── */
.aline{height:1px;background:linear-gradient(90deg,var(--cyan) 0%,transparent 60%);margin:0 0 18px;opacity:.25;}

/* ── STAT CARDS ── */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px;}
.stat-card{
  background:var(--bg1);border:1px solid var(--border);border-radius:var(--r);
  padding:18px;position:relative;overflow:hidden;transition:border-color .2s,box-shadow .2s;
}
.stat-card:hover{border-color:var(--border2);box-shadow:var(--glow);}
.stat-card::before{
  content:'';position:absolute;top:0;left:0;right:0;height:1px;
  background:linear-gradient(90deg,var(--ca,var(--cyan)),transparent);
}
.stat-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;}
.stat-icon{
  width:36px;height:36px;border:1px solid var(--border2);
  display:flex;align-items:center;justify-content:center;
  font-size:16px;border-radius:var(--r);background:var(--bg2);
  color:var(--ca,var(--cyan));
}
.stat-trend{
  font-size:10px;font-weight:800;padding:2px 7px;border-radius:3px;
  font-family:'Barlow Condensed',sans-serif;letter-spacing:.8px;
}
.up{background:rgba(0,229,160,.1);color:var(--success);}
.dn{background:rgba(255,64,96,.1);color:var(--danger);}
.stat-val{
  font-family:'Barlow Condensed',sans-serif;font-size:32px;font-weight:800;
  letter-spacing:-0.5px;line-height:1;margin-bottom:3px;
}
.stat-lbl{font-size:11.5px;color:var(--text2);letter-spacing:.4px;font-weight:500;}

/* ── GRIDS ── */
.g2{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:18px;}
.g3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:12px;margin-bottom:18px;}
.mb{margin-bottom:18px;}

/* ── CARD ── */
.card{background:var(--bg1);border:1px solid var(--border);border-radius:var(--r);overflow:hidden;}
.card-head{
  display:flex;align-items:center;justify-content:space-between;
  padding:14px 18px;border-bottom:1px solid var(--border);
}
.card-title{
  font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:11px;
  letter-spacing:2.5px;text-transform:uppercase;color:var(--text2);
}
.card-action{
  font-size:10.5px;color:var(--cyan);cursor:pointer;font-weight:700;
  letter-spacing:1px;font-family:'Barlow Condensed',sans-serif;
  text-transform:uppercase;transition:opacity .18s;
}
.card-action:hover{opacity:.6;}
.card-body{padding:18px;}

/* ── TABLE ── */
.tbl-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;font-size:13px;}
thead th{
  text-align:left;font-family:'Barlow Condensed',sans-serif;
  font-size:9px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;
  color:var(--text3);padding:10px 14px;border-bottom:1px solid var(--border);
  white-space:nowrap;cursor:pointer;user-select:none;transition:color .18s;
}
thead th:hover{color:var(--cyan);}
tbody tr{border-bottom:1px solid var(--border);transition:background .14s;}
tbody tr:last-child{border-bottom:none;}
tbody tr:hover{background:var(--cyan-dim);}
tbody td{padding:11px 14px;vertical-align:middle;}

/* ── BADGE ── */
.badge{
  display:inline-flex;align-items:center;gap:4px;
  padding:2px 8px;border-radius:3px;
  font-size:9.5px;font-weight:800;
  font-family:'Barlow Condensed',sans-serif;letter-spacing:1.5px;text-transform:uppercase;
}
.badge::before{content:'';width:4px;height:4px;border-radius:50%;background:currentColor;}
.b-active{background:rgba(0,229,160,.1);color:var(--success);}
.b-blocked{background:rgba(255,64,96,.1);color:var(--danger);}
.b-top{background:rgba(0,229,200,.1);color:var(--cyan);}
.b-cat{background:rgba(0,180,255,.1);color:var(--info);font-size:9px;border-radius:3px;}
.b-cat::before{display:none;}

/* ── BUTTONS ── */
.btn{
  display:inline-flex;align-items:center;gap:5px;
  padding:7px 13px;border-radius:var(--r);
  font-family:'Barlow Condensed',sans-serif;
  font-size:11px;font-weight:800;letter-spacing:1.8px;text-transform:uppercase;
  cursor:pointer;border:none;transition:all .18s;
}
.btn-cyan{background:var(--cyan);color:var(--bg);}
.btn-cyan:hover{background:#00c4ac;box-shadow:var(--glow);}
.btn-ghost{background:transparent;border:1px solid var(--border2);color:var(--text2);}
.btn-ghost:hover{border-color:var(--cyan);color:var(--cyan);}
.btn-danger{
  background:transparent;border:1px solid rgba(255,64,96,.3);
  color:var(--danger);font-size:10px;padding:5px 9px;
}
.btn-danger:hover{background:rgba(255,64,96,.07);}
.btn-success{
  background:transparent;border:1px solid rgba(0,229,160,.3);
  color:var(--success);font-size:10px;padding:5px 9px;
}
.btn-success:hover{background:rgba(0,229,160,.07);}

/* ── TOOLBAR ── */
.toolbar{
  display:flex;align-items:center;gap:8px;
  padding:11px 14px;border-bottom:1px solid var(--border);flex-wrap:wrap;
}
.s-input{
  display:flex;align-items:center;background:var(--bg2);
  border:1px solid var(--border);border-radius:var(--r);
  padding:6px 10px;gap:7px;flex:1;min-width:160px;transition:border-color .18s;
}
.s-input:focus-within{border-color:var(--cyan);}
.s-input input{
  background:none;border:none;outline:none;color:var(--text);
  font-family:'Barlow',sans-serif;font-size:12.5px;width:100%;
}
.s-input input::placeholder{color:var(--text3);}
select.sel{
  background:var(--bg2);border:1px solid var(--border);border-radius:var(--r);
  padding:6px 10px;color:var(--text);font-family:'Barlow',sans-serif;
  font-size:12.5px;outline:none;cursor:pointer;transition:border-color .18s;
}
select.sel:focus{border-color:var(--cyan);}

/* ── MINI BAR ── */
.mbar-wrap{margin-bottom:11px;}
.mbar-lbl{display:flex;justify-content:space-between;font-size:11px;color:var(--text2);margin-bottom:5px;font-weight:500;}
.mbar{height:3px;background:var(--bg3);border-radius:99px;overflow:hidden;}
.mbar-fill{height:100%;border-radius:99px;background:var(--cyan);transition:width 1.1s var(--ease);}

/* ── AVATAR ── */
.av{
  width:28px;height:28px;border-radius:50%;
  display:inline-flex;align-items:center;justify-content:center;
  font-size:10px;font-weight:800;border:2px solid var(--bg1);
  font-family:'Barlow Condensed',sans-serif;
}

/* ── RANK ── */
.rank-item{display:flex;align-items:center;gap:10px;padding:9px 0;border-bottom:1px solid var(--border);}
.rank-item:last-child{border-bottom:none;}
.rank-n{width:18px;text-align:center;font-size:10px;font-weight:800;color:var(--text3);font-family:'Barlow Condensed',sans-serif;}
.rank-n.g1{color:#ffc840;}.rank-n.g2{color:#909098;}.rank-n.g3{color:#7a5030;}
.rank-info{flex:1;min-width:0;}
.rank-name{font-size:13px;font-weight:600;letter-spacing:.2px;}
.rank-sub{font-size:11px;color:var(--text2);}
.rank-count{font-family:'Barlow Condensed',sans-serif;font-size:15px;font-weight:800;color:var(--cyan);}

/* ── ACTIVITY ── */
.act-item{display:flex;align-items:flex-start;gap:10px;padding:10px 0;border-bottom:1px solid var(--border);}
.act-item:last-child{border-bottom:none;}
.act-dot{
  width:28px;height:28px;border-radius:var(--r);
  display:flex;align-items:center;justify-content:center;
  font-size:12px;flex-shrink:0;margin-top:1px;
  border:1px solid var(--border);background:var(--bg2);
}
.act-txt{flex:1;font-size:12.5px;line-height:1.5;color:var(--text2);}
.act-txt strong{color:var(--text);}
.act-txt em{color:var(--cyan);font-style:normal;}
.act-time{font-size:10.5px;color:var(--text3);white-space:nowrap;font-family:'Barlow Condensed',sans-serif;letter-spacing:.5px;}

/* ── RECIPE CARDS ── */
.recipe-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(210px,1fr));gap:10px;padding:14px;}
.rcrd{
  background:var(--bg2);border:1px solid var(--border);border-radius:var(--r);
  overflow:hidden;transition:border-color .18s,transform .18s;
}
.rcrd:hover{border-color:var(--border2);transform:translateY(-1px);}
.rcrd-img{
  height:88px;display:flex;align-items:center;justify-content:center;
  font-size:34px;background:var(--bg3);border-bottom:1px solid var(--border);
}
.rcrd-body{padding:12px;}
.rcrd-name{font-weight:600;font-size:13px;margin-bottom:7px;line-height:1.3;}
.rcrd-meta{display:flex;align-items:center;justify-content:space-between;}
.rcrd-owner{font-size:10.5px;color:var(--text2);}
.rcrd-rating{font-size:12px;font-weight:800;color:var(--warn);font-family:'Barlow Condensed',sans-serif;}

/* ── BAR CHART ── */
.bar-chart{display:flex;align-items:flex-end;gap:5px;height:120px;}
.bar-col{flex:1;display:flex;flex-direction:column;align-items:center;gap:4px;}
.bar-fill{
  width:100%;border-radius:3px 3px 0 0;background:var(--cyan);
  transition:height 1.1s var(--ease);min-height:3px;opacity:.75;cursor:pointer;
}
.bar-fill:hover{opacity:1;box-shadow:var(--glow);}
.bar-lbl{font-size:9px;color:var(--text3);text-align:center;white-space:nowrap;font-family:'Barlow Condensed',sans-serif;letter-spacing:.5px;}
.bar-val{font-size:9.5px;font-weight:800;color:var(--cyan);font-family:'Barlow Condensed',sans-serif;}

/* ── DONUT ── */
.donut-wrap{position:relative;width:140px;height:140px;margin:0 auto;}
.donut-label{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;}
.donut-val{font-family:'Barlow Condensed',sans-serif;font-weight:800;font-size:26px;color:var(--cyan);}
.donut-sub{font-size:9.5px;color:var(--text2);letter-spacing:2px;text-transform:uppercase;font-family:'Barlow Condensed',sans-serif;}

/* ── PIE LEGEND ── */
.pie-leg{display:flex;flex-direction:column;gap:9px;}
.pie-leg-item{display:flex;align-items:center;gap:8px;font-size:12.5px;color:var(--text2);}
.pie-leg-dot{width:8px;height:8px;border-radius:1px;flex-shrink:0;}

/* ── QUICK STAT ── */
.qs{display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid var(--border);}
.qs:last-child{border-bottom:none;}
.qs-ico{width:32px;height:32px;border-radius:var(--r);display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;border:1px solid var(--border);}
.qs-val{font-family:'Barlow Condensed',sans-serif;font-size:17px;font-weight:800;}
.qs-lbl{font-size:11px;color:var(--text2);font-weight:500;}
.qs-ch{font-size:11px;font-weight:800;font-family:'Barlow Condensed',sans-serif;}

/* ── SETTINGS ── */
.s-row{display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--border);gap:12px;}
.s-row:last-child{border-bottom:none;}
.s-lbl{font-size:13px;font-weight:600;letter-spacing:.2px;}
.s-desc{font-size:11px;color:var(--text2);margin-top:2px;}
.s-inp{
  background:var(--bg2);border:1px solid var(--border);border-radius:var(--r);
  padding:6px 10px;color:var(--text);font-family:'Barlow',sans-serif;
  font-size:13px;outline:none;width:180px;transition:border-color .18s;
}
.s-inp:focus{border-color:var(--cyan);}
.toggle{
  width:40px;height:21px;background:var(--bg3);border-radius:99px;
  position:relative;cursor:pointer;transition:background .2s;
  border:1px solid var(--border2);flex-shrink:0;
}
.toggle.on{background:var(--cyan);border-color:var(--cyan);}
.toggle::after{
  content:'';position:absolute;width:15px;height:15px;
  border-radius:50%;background:#fff;top:2px;left:2px;
  transition:transform .2s var(--ease);
}
.toggle.on::after{transform:translateX(19px);}

/* ── OVERLAY ── */
.overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.75);z-index:200;}

/* ── TOAST ── */
#toasts{position:fixed;bottom:20px;right:20px;z-index:9999;display:flex;flex-direction:column;gap:6px;}
.toast{
  background:var(--bg2);border:1px solid var(--border2);border-left:2px solid var(--cyan);
  border-radius:var(--r);padding:10px 15px;min-width:220px;
  font-size:12.5px;font-weight:500;letter-spacing:.2px;
  animation:tin .28s var(--ease) both,tout .28s var(--ease) 2.72s both;
  box-shadow:0 8px 32px rgba(0,0,0,.6);
}
.toast.ok{border-left-color:var(--success);}
.toast.err{border-left-color:var(--danger);}
@keyframes tin{from{opacity:0;transform:translateX(16px);}to{opacity:1;transform:none;}}
@keyframes tout{from{opacity:1;}to{opacity:0;pointer-events:none;}}

/* ── RESPONSIVE ── */
@media(max-width:1100px){.stats-grid{grid-template-columns:repeat(2,1fr);}.g3{grid-template-columns:1fr 1fr;}}
@media(max-width:900px){.g2{grid-template-columns:1fr;}.g3{grid-template-columns:1fr;}.h-search{display:none;}}
@media(max-width:768px){
  .sidebar{transform:translateX(-100%);}.sidebar.open{transform:translateX(0);}
  .overlay.open{display:block;}.main{margin-left:0;}.menu-btn{display:flex;}
  .stats-grid{grid-template-columns:1fr 1fr;}.content{padding:14px;}
}
@media(max-width:480px){.stats-grid{grid-template-columns:1fr;}.pg-title{font-size:20px;}}
</style>
</head>
<body>

<div class="overlay" id="overlay"></div>

<!-- ════ SIDEBAR ════ -->
<aside class="sidebar" id="sidebar">
  <div class="logo">
    <div class="logo-mark">🍳</div>
    <div class="logo-text">Recipe<span>Hub</span></div>
  </div>
  <nav class="nav">
    <span class="nav-sec">Main</span>
    <div class="nav-item active" data-sec="dashboard"><span class="nav-icon">▣</span>Dashboard</div>
    <div class="nav-item" data-sec="users"><span class="nav-icon">◎</span>Users<span class="nav-badge" id="badge-u">12</span></div>
    <div class="nav-item" data-sec="recipes"><span class="nav-icon">◈</span>Recipes</div>
    <span class="nav-sec">Insights</span>
    <div class="nav-item" data-sec="analytics"><span class="nav-icon">◇</span>Analytics</div>
    <span class="nav-sec">System</span>
    <div class="nav-item" data-sec="settings"><span class="nav-icon">◧</span>Settings</div>
  </nav>
  <div class="sidebar-footer">
    <div class="admin-row">
      <div class="admin-av">AD</div>
      <div><div class="admin-name">Admin User</div><div class="admin-role">Super Admin</div></div>
    </div>
  </div>
</aside>

<!-- ════ MAIN ════ -->
<div class="main">
  <header class="header">
    <button class="menu-btn" id="menuBtn">☰</button>
    <div class="h-title" id="hTitle">Dashboard</div>
    <div class="h-search">
      <span class="h-ico">⌕</span>
      <input type="text" placeholder="Search…"/>
    </div>
    <div class="h-actions">
      <div class="icon-btn" onclick="toast('No new notifications','')">🔔<div class="ndot"></div></div>
      <div class="icon-btn" onclick="toast('Data refreshed','ok')">↺</div>
    </div>
  </header>

  <main class="content">

    <!-- ══ DASHBOARD ══ -->
    <section class="section active" id="sec-dashboard">
      <div class="pg-head">
        <div>
          <div class="pg-title">Dashboard Overview</div>
          <div class="pg-sub">Platform snapshot — live metrics at a glance.</div>
        </div>
        <div class="pg-date" id="curDate"></div>
      </div>
      <div class="aline"></div>

      <div class="stats-grid">
        <div class="stat-card" style="--ca:var(--info)">
          <div class="stat-top"><div class="stat-icon">◎</div><div class="stat-trend up">↑ 8.2%</div></div>
          <div class="stat-val counting" data-t="248">0</div>
          <div class="stat-lbl">Total Users</div>
        </div>
        <div class="stat-card" style="--ca:var(--cyan)">
          <div class="stat-top"><div class="stat-icon">◈</div><div class="stat-trend up">↑ 14.5%</div></div>
          <div class="stat-val counting" data-t="1847">0</div>
          <div class="stat-lbl">Total Recipes</div>
        </div>
        <div class="stat-card" style="--ca:var(--danger)">
          <div class="stat-top"><div class="stat-icon" style="--ca:var(--danger)">⊘</div><div class="stat-trend dn">↑ 2.1%</div></div>
          <div class="stat-val counting" data-t="17">0</div>
          <div class="stat-lbl">Blocked Users</div>
        </div>
        <div class="stat-card" style="--ca:var(--warn)">
          <div class="stat-top"><div class="stat-icon" style="--ca:var(--warn)">★</div><div class="stat-trend up">↑ 0.3</div></div>
          <div class="stat-val">4.6</div>
          <div class="stat-lbl">Avg Recipe Rating</div>
        </div>
      </div>

      <div class="g2">
        <div class="card">
          <div class="card-head"><div class="card-title">Recent Activity</div><div class="card-action">View All →</div></div>
          <div class="card-body" id="actFeed"></div>
        </div>
        <div class="card">
          <div class="card-head"><div class="card-title">Top Contributors</div><div class="card-action" onclick="navTo('users')">See All →</div></div>
          <div class="card-body" id="topWidget"></div>
        </div>
      </div>

      <div class="g2">
        <div class="card">
          <div class="card-head"><div class="card-title">Trending Recipes</div><div class="card-action" onclick="navTo('recipes')">See All →</div></div>
          <div class="card-body" id="trendWidget"></div>
        </div>
        <div class="card">
          <div class="card-head"><div class="card-title">Quick Statistics</div></div>
          <div class="card-body" id="qsWidget"></div>
        </div>
      </div>

      <div class="card mb">
        <div class="card-head"><div class="card-title">Recipes Per User — Top 8</div></div>
        <div class="card-body"><div class="bar-chart" id="dashBar"></div></div>
      </div>
    </section>

    <!-- ══ USERS ══ -->
    <section class="section" id="sec-users">
      <div class="pg-head">
        <div>
          <div class="pg-title">User Management</div>
          <div class="pg-sub">Manage accounts, permissions, and status.</div>
        </div>
        <button class="btn btn-cyan">+ Add User</button>
      </div>
      <div class="aline"></div>
      <div class="card">
        <div class="toolbar">
          <div class="s-input" style="max-width:250px">
            <span style="color:var(--text3);font-size:13px">⌕</span>
            <input type="text" id="uSearch" placeholder="Search users…" oninput="filterUsers()"/>
          </div>
          <select class="sel" id="uStatus" onchange="filterUsers()">
            <option value="all">All Status</option>
            <option value="active">Active</option>
            <option value="blocked">Blocked</option>
          </select>
          <select class="sel" id="uSort" onchange="filterUsers()">
            <option value="none">Sort by…</option>
            <option value="rd">Most Recipes</option>
            <option value="ra">Fewest Recipes</option>
            <option value="na">Name A–Z</option>
          </select>
          <div style="margin-left:auto;font-size:10.5px;color:var(--text2);font-family:'Barlow Condensed',sans-serif;letter-spacing:1.5px;text-transform:uppercase">
            <strong id="uCount" style="color:var(--cyan)">0</strong> Users
          </div>
        </div>
        <div class="tbl-wrap">
          <table>
            <thead><tr><th>ID</th><th>User</th><th>Email</th><th>Status</th><th>Recipes</th><th>Joined</th><th>Actions</th></tr></thead>
            <tbody id="uBody"></tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- ══ RECIPES ══ -->
    <section class="section" id="sec-recipes">
      <div class="pg-head">
        <div>
          <div class="pg-title">Recipe Management</div>
          <div class="pg-sub">Browse, filter, and monitor all platform recipes.</div>
        </div>
        <div style="display:flex;gap:8px;align-items:center">
          <span style="font-size:10.5px;color:var(--text2);font-family:'Barlow Condensed',sans-serif;letter-spacing:1.5px;text-transform:uppercase">Total: <strong style="color:var(--cyan)" id="rTotal">0</strong></span>
          <button class="btn btn-ghost" id="rToggleBtn" onclick="toggleRView()">☰ Table</button>
        </div>
      </div>
      <div class="aline"></div>

      <div id="rCardView">
        <div class="card mb">
          <div class="toolbar">
            <div class="s-input" style="max-width:250px">
              <span style="color:var(--text3);font-size:13px">⌕</span>
              <input type="text" id="rSearch" placeholder="Search recipes…" oninput="filterRecipes()"/>
            </div>
            <select class="sel" id="rCat" onchange="filterRecipes()">
              <option value="all">All Categories</option>
              <option>Breakfast</option><option>Lunch</option>
              <option>Dinner</option><option>Dessert</option>
              <option>Snack</option><option>Vegan</option>
            </select>
          </div>
          <div class="recipe-grid" id="rCardGrid"></div>
        </div>
      </div>

      <div id="rTableView" style="display:none">
        <div class="card mb">
          <div class="toolbar">
            <div class="s-input" style="max-width:250px">
              <span style="color:var(--text3);font-size:13px">⌕</span>
              <input type="text" id="rSearchT" placeholder="Search recipes…" oninput="filterRecipes()"/>
            </div>
          </div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Recipe</th><th>Category</th><th>Rating</th><th>Owner</th><th>Views</th><th>Added</th><th>Status</th></tr></thead>
              <tbody id="rBody"></tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- ══ ANALYTICS ══ -->
    <section class="section" id="sec-analytics">
      <div class="pg-head">
        <div>
          <div class="pg-title">Analytics</div>
          <div class="pg-sub">Platform performance, growth, and engagement metrics.</div>
        </div>
      </div>
      <div class="aline"></div>

      <div class="stats-grid" style="margin-bottom:18px">
        <div class="stat-card" style="--ca:#a78bfa">
          <div class="stat-top"><div class="stat-icon" style="--ca:#a78bfa">◈</div><div class="stat-trend up">↑ 22%</div></div>
          <div class="stat-val">3.2K</div><div class="stat-lbl">Monthly Views</div>
        </div>
        <div class="stat-card" style="--ca:var(--success)">
          <div class="stat-top"><div class="stat-icon" style="--ca:var(--success)">◉</div><div class="stat-trend up">↑ 11%</div></div>
          <div class="stat-val">892</div><div class="stat-lbl">Comments</div>
        </div>
        <div class="stat-card" style="--ca:var(--danger)">
          <div class="stat-top"><div class="stat-icon" style="--ca:var(--danger)">♥</div><div class="stat-trend up">↑ 34%</div></div>
          <div class="stat-val">5.1K</div><div class="stat-lbl">Total Likes</div>
        </div>
        <div class="stat-card" style="--ca:var(--warn)">
          <div class="stat-top"><div class="stat-icon" style="--ca:var(--warn)">↑</div><div class="stat-trend up">↑ 18%</div></div>
          <div class="stat-val">418</div><div class="stat-lbl">Shares</div>
        </div>
      </div>

      <div class="g2">
        <div class="card">
          <div class="card-head"><div class="card-title">Recipes Per User — Top 10</div></div>
          <div class="card-body"><div class="bar-chart" id="aBar"></div></div>
        </div>
        <div class="card">
          <div class="card-head"><div class="card-title">User Status Distribution</div></div>
          <div class="card-body">
            <div style="display:flex;align-items:center;gap:24px;justify-content:center;flex-wrap:wrap">
              <div id="uDonut"></div>
              <div class="pie-leg" id="uDonutLeg"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="g2">
        <div class="card">
          <div class="card-head"><div class="card-title">Rating Distribution</div></div>
          <div class="card-body" id="ratingDist"></div>
        </div>
        <div class="card">
          <div class="card-head"><div class="card-title">Recipe Categories</div></div>
          <div class="card-body" id="catBreak"></div>
        </div>
      </div>

      <div class="card mb">
        <div class="card-head"><div class="card-title">Content Growth — Last 6 Months</div></div>
        <div class="card-body" id="growChart"></div>
      </div>
    </section>

    <!-- ══ SETTINGS ══ -->
    <section class="section" id="sec-settings">
      <div class="pg-head">
        <div>
          <div class="pg-title">Settings</div>
          <div class="pg-sub">Configure platform preferences and admin controls.</div>
        </div>
        <button class="btn btn-cyan" onclick="toast('Settings saved','ok')">Save Changes</button>
      </div>
      <div class="aline"></div>

      <div class="g2">
        <div class="card">
          <div class="card-head"><div class="card-title">General</div></div>
          <div class="card-body">
            <div class="s-row"><div><div class="s-lbl">Platform Name</div><div class="s-desc">App display name</div></div><input class="s-inp" type="text" value="RecipeHub"/></div>
            <div class="s-row"><div><div class="s-lbl">Max Recipes / User</div><div class="s-desc">Posting limit per account</div></div><input class="s-inp" type="number" value="50"/></div>
            <div class="s-row"><div><div class="s-lbl">Min Rating to Feature</div><div class="s-desc">Trending threshold</div></div><input class="s-inp" type="number" value="4.0" step="0.1"/></div>
          </div>
        </div>
        <div class="card">
          <div class="card-head"><div class="card-title">Notifications</div></div>
          <div class="card-body">
            <div class="s-row"><div><div class="s-lbl">New User Alerts</div><div class="s-desc">Notify on registration</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
            <div class="s-row"><div><div class="s-lbl">Low Rating Alerts</div><div class="s-desc">Flag recipes rated below 2</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
            <div class="s-row"><div><div class="s-lbl">Weekly Reports</div><div class="s-desc">Email digest every Monday</div></div><div class="toggle" onclick="this.classList.toggle('on')"></div></div>
          </div>
        </div>
        <div class="card">
          <div class="card-head"><div class="card-title">Moderation</div></div>
          <div class="card-body">
            <div class="s-row"><div><div class="s-lbl">Auto-flag Content</div><div class="s-desc">AI reviews new posts</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
            <div class="s-row"><div><div class="s-lbl">Email Verification</div><div class="s-desc">Required before posting</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
            <div class="s-row"><div><div class="s-lbl">Guest Browsing</div><div class="s-desc">Public access without login</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
          </div>
        </div>
        <div class="card">
          <div class="card-head"><div class="card-title">Display</div></div>
          <div class="card-body">
            <div class="s-row"><div><div class="s-lbl">Show View Counts</div><div class="s-desc">Visible on recipe cards</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
            <div class="s-row"><div><div class="s-lbl">Enable Comments</div><div class="s-desc">User discussion on recipes</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
            <div class="s-row"><div><div class="s-lbl">Trending Section</div><div class="s-desc">Show on homepage</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
          </div>
        </div>
      </div>

      <div class="card mb">
        <div class="card-head"><div class="card-title" style="color:var(--danger)">Danger Zone</div></div>
        <div class="card-body">
          <div class="s-row">
            <div><div class="s-lbl" style="color:var(--danger)">Clear Blocked Users</div><div class="s-desc">Permanently remove all blocked user records</div></div>
            <button class="btn btn-danger" onclick="toast('Action requires confirmation','err')">Execute</button>
          </div>
          <div class="s-row">
            <div><div class="s-lbl" style="color:var(--danger)">Reset Platform Data</div><div class="s-desc">Delete all recipes and users — irreversible</div></div>
            <button class="btn btn-danger" onclick="toast('Disabled in demo mode','err')">Reset</button>
          </div>
        </div>
      </div>
    </section>

  </main>
</div>

<div id="toasts"></div>

<script>
// ══ DATA ══
const USERS=[
  {id:'U001',name:'Sophia Carter',  email:'sophia@mail.com',  status:'active', recipes:142,joined:'Jan 12, 2023',av:'SC',clr:'#00e5c8'},
  {id:'U002',name:'James Morrison', email:'james@mail.com',   status:'active', recipes:98, joined:'Mar 5, 2023', av:'JM',clr:'#00b4ff'},
  {id:'U003',name:'Aisha Patel',    email:'aisha@mail.com',   status:'active', recipes:87, joined:'Feb 19, 2023',av:'AP',clr:'#00e5a0'},
  {id:'U004',name:'Carlos Herrera', email:'carlos@mail.com',  status:'blocked',recipes:74, joined:'Apr 1, 2023', av:'CH',clr:'#ff4060'},
  {id:'U005',name:'Emily Nguyen',   email:'emily@mail.com',   status:'active', recipes:65, joined:'May 14, 2023',av:'EN',clr:'#a78bfa'},
  {id:'U006',name:'Ravi Kumar',     email:'ravi@mail.com',    status:'active', recipes:59, joined:'Jun 8, 2023', av:'RK',clr:'#00d4b4'},
  {id:'U007',name:'Olivia Brown',   email:'olivia@mail.com',  status:'blocked',recipes:51, joined:'Jul 22, 2023',av:'OB',clr:'#ffc840'},
  {id:'U008',name:'Noah Wilson',    email:'noah@mail.com',    status:'active', recipes:47, joined:'Aug 3, 2023', av:'NW',clr:'#00b4ff'},
  {id:'U009',name:'Mia Thompson',   email:'mia@mail.com',     status:'active', recipes:43, joined:'Sep 17, 2023',av:'MT',clr:'#e879f9'},
  {id:'U010',name:'Liam Davis',     email:'liam@mail.com',    status:'active', recipes:38, joined:'Oct 29, 2023',av:'LD',clr:'#2dd4bf'},
  {id:'U011',name:'Zara Ahmed',     email:'zara@mail.com',    status:'blocked',recipes:31, joined:'Nov 11, 2023',av:'ZA',clr:'#f97316'},
  {id:'U012',name:'Ethan Clark',    email:'ethan@mail.com',   status:'active', recipes:28, joined:'Dec 1, 2023', av:'EC',clr:'#84cc16'},
];
const CATS=['Breakfast','Lunch','Dinner','Dessert','Snack','Vegan'];
const EMJ={Breakfast:'🥞',Lunch:'🥗',Dinner:'🍝',Dessert:'🍰',Snack:'🥨',Vegan:'🥦'};
const RECIPES=[
  {id:'R001',name:'Fluffy Buttermilk Pancakes',  cat:'Breakfast',rating:4.9,owner:'Sophia Carter',  views:3240,added:'Jan 20, 2024',trending:true},
  {id:'R002',name:'Spicy Thai Basil Chicken',    cat:'Dinner',   rating:4.8,owner:'James Morrison', views:2890,added:'Feb 5, 2024', trending:true},
  {id:'R003',name:'Avocado Power Bowl',           cat:'Lunch',    rating:4.7,owner:'Aisha Patel',    views:2410,added:'Feb 12, 2024',trending:true},
  {id:'R004',name:'Classic Crème Brûlée',         cat:'Dessert',  rating:4.9,owner:'Sophia Carter',  views:2200,added:'Mar 1, 2024', trending:false},
  {id:'R005',name:'Mediterranean Quinoa Salad',   cat:'Vegan',    rating:4.6,owner:'Emily Nguyen',   views:1980,added:'Mar 8, 2024', trending:false},
  {id:'R006',name:'Crispy Vegetable Spring Rolls',cat:'Snack',    rating:4.5,owner:'Ravi Kumar',     views:1750,added:'Mar 15, 2024',trending:false},
  {id:'R007',name:'Lemon Herb Roasted Salmon',    cat:'Dinner',   rating:4.8,owner:'Olivia Brown',   views:1640,added:'Apr 2, 2024', trending:true},
  {id:'R008',name:'Chocolate Lava Cake',           cat:'Dessert',  rating:4.9,owner:'Sophia Carter',  views:1590,added:'Apr 10, 2024',trending:true},
  {id:'R009',name:'Açai Breakfast Bowl',           cat:'Breakfast',rating:4.7,owner:'Mia Thompson',   views:1430,added:'Apr 18, 2024',trending:false},
  {id:'R010',name:'Korean BBQ Beef Tacos',         cat:'Lunch',    rating:4.6,owner:'Noah Wilson',    views:1320,added:'May 3, 2024', trending:false},
  {id:'R011',name:'Vegan Mushroom Burger',         cat:'Vegan',    rating:4.4,owner:'Liam Davis',     views:1200,added:'May 14, 2024',trending:false},
  {id:'R012',name:'Garlic Butter Shrimp Pasta',   cat:'Dinner',   rating:4.7,owner:'James Morrison', views:1180,added:'Jun 1, 2024', trending:false},
];
const ACTIVITY=[
  {ico:'◎',bg:'rgba(0,180,255,.1)',txt:'<strong>Noah Wilson</strong> joined the platform',time:'2m ago'},
  {ico:'◈',bg:'rgba(0,229,200,.1)',txt:'<strong>Sophia Carter</strong> added <em>Chocolate Lava Cake</em>',time:'18m ago'},
  {ico:'⊘',bg:'rgba(255,64,96,.1)',txt:'<strong>Carlos Herrera</strong> was blocked by Admin',time:'1h ago'},
  {ico:'★',bg:'rgba(255,200,64,.1)',txt:'<em>Fluffy Pancakes</em> reached 4.9 ★ rating',time:'3h ago'},
  {ico:'◇',bg:'rgba(167,139,250,.1)',txt:'<strong>Ravi Kumar</strong> posted 3 new recipes',time:'5h ago'},
  {ico:'♥',bg:'rgba(255,64,96,.08)',txt:'<em>Thai Basil Chicken</em> hit 1 000 likes',time:'8h ago'},
];

// ══ NAVIGATION ══
const TITLES={dashboard:'Dashboard',users:'User Management',recipes:'Recipe Management',analytics:'Analytics',settings:'Settings'};
document.querySelectorAll('.nav-item').forEach(n=>{
  n.addEventListener('click',()=>{navTo(n.dataset.sec);closeMenu();});
});
function navTo(sec){
  document.querySelectorAll('.nav-item').forEach(n=>n.classList.remove('active'));
  document.querySelectorAll('.section').forEach(s=>s.classList.remove('active'));
  document.querySelector(`[data-sec="${sec}"]`).classList.add('active');
  document.getElementById(`sec-${sec}`).classList.add('active');
  document.getElementById('hTitle').textContent=TITLES[sec]||sec;
  if(sec==='analytics')renderAnalytics();
}

// ══ SIDEBAR MOBILE ══
const sidebar=document.getElementById('sidebar'),overlay=document.getElementById('overlay');
document.getElementById('menuBtn').onclick=()=>{sidebar.classList.toggle('open');overlay.classList.toggle('open');};
overlay.onclick=closeMenu;
function closeMenu(){sidebar.classList.remove('open');overlay.classList.remove('open');}

// ══ DATE ══
document.getElementById('curDate').textContent=new Date().toLocaleDateString('en-US',{weekday:'short',year:'numeric',month:'short',day:'numeric'}).toUpperCase();

// ══ COUNTERS ══
function animateCounters(){
  document.querySelectorAll('.counting').forEach(el=>{
    const target=parseInt(el.dataset.t),t0=performance.now(),dur=1100;
    (function step(now){
      const p=Math.min((now-t0)/dur,1),e=1-Math.pow(1-p,3);
      el.textContent=Math.floor(e*target).toLocaleString();
      if(p<1)requestAnimationFrame(step);
    })(t0);
  });
}
setTimeout(animateCounters,150);

// ══ TOAST ══
function toast(msg,type=''){
  const c=document.getElementById('toasts'),el=document.createElement('div');
  el.className=`toast ${type}`;el.textContent=msg;c.appendChild(el);
  setTimeout(()=>el.remove(),3200);
}

// ══ DASHBOARD WIDGETS ══
function renderActivity(){
  document.getElementById('actFeed').innerHTML=ACTIVITY.map(a=>`
    <div class="act-item">
      <div class="act-dot" style="background:${a.bg}">${a.ico}</div>
      <div class="act-txt">${a.txt}</div>
      <div class="act-time">${a.time}</div>
    </div>`).join('');
}
function renderTopUsers(){
  const top=[...USERS].sort((a,b)=>b.recipes-a.recipes).slice(0,5);
  const max=top[0].recipes;
  document.getElementById('topWidget').innerHTML=top.map((u,i)=>{
    const rc=i===0?'g1':i===1?'g2':i===2?'g3':'';
    return `<div class="rank-item">
      <div class="rank-n ${rc}">${i+1}</div>
      <div class="av" style="background:${u.clr};color:#000">${u.av}</div>
      <div class="rank-info">
        <div class="rank-name">${u.name}</div>
        <div class="mbar" style="margin-top:4px">
          <div class="mbar-fill" style="width:${(u.recipes/max*100).toFixed(0)}%;background:${u.clr}"></div>
        </div>
      </div>
      <div class="rank-count">${u.recipes}</div>
    </div>`;
  }).join('');
}
function renderTrending(){
  document.getElementById('trendWidget').innerHTML=RECIPES.filter(r=>r.trending).slice(0,5).map(r=>`
    <div class="rank-item">
      <div class="act-dot" style="background:var(--cyan-dim);border-color:var(--border2)">${EMJ[r.cat]||'🍴'}</div>
      <div class="rank-info">
        <div class="rank-name">${r.name}</div>
        <div class="rank-sub">${r.cat} · ${r.rating} ★</div>
      </div>
      <div style="font-size:10.5px;color:var(--text2);font-family:'Barlow Condensed',sans-serif;letter-spacing:.5px">${r.views.toLocaleString()}</div>
    </div>`).join('');
}
function renderQS(){
  const active=USERS.filter(u=>u.status==='active').length;
  const avgR=(USERS.reduce((s,u)=>s+u.recipes,0)/USERS.length).toFixed(1);
  const topR=RECIPES.filter(r=>r.rating>=4.8).length;
  const trending=RECIPES.filter(r=>r.trending).length;
  const stats=[
    {ico:'◉',bg:'rgba(0,229,160,.08)',val:active,   lbl:'Active Users',      ch:'+3',  col:'var(--success)'},
    {ico:'◈',bg:'rgba(0,229,200,.08)',val:avgR,     lbl:'Avg Recipes/User',  ch:'+2.1',col:'var(--cyan)'},
    {ico:'★', bg:'rgba(255,200,64,.08)',val:topR,   lbl:'Top Rated Recipes', ch:'+1',  col:'var(--warn)'},
    {ico:'◇',bg:'rgba(255,64,96,.08)', val:trending,lbl:'Trending Now',      ch:'Live',col:'var(--danger)'},
  ];
  document.getElementById('qsWidget').innerHTML=stats.map(s=>`
    <div class="qs">
      <div class="qs-ico" style="background:${s.bg}">${s.ico}</div>
      <div style="flex:1"><div class="qs-val">${s.val}</div><div class="qs-lbl">${s.lbl}</div></div>
      <div class="qs-ch" style="color:${s.col}">${s.ch}</div>
    </div>`).join('');
}
function renderBarChart(id,data){
  const el=document.getElementById(id);if(!el)return;
  const max=Math.max(...data.map(d=>d.v));
  el.innerHTML=data.map(d=>`
    <div class="bar-col">
      <div class="bar-val">${d.v}</div>
      <div class="bar-fill" style="height:${(d.v/max*95).toFixed(0)}px;background:${d.c||'var(--cyan)'}"></div>
      <div class="bar-lbl">${d.l}</div>
    </div>`).join('');
}
function renderDashBar(){
  const COLS=['#00e5c8','#00b4ff','#00e5a0','#a78bfa','#ffc840','#00d4b4','#e879f9','#f97316'];
  const top8=[...USERS].sort((a,b)=>b.recipes-a.recipes).slice(0,8);
  renderBarChart('dashBar',top8.map((u,i)=>({l:u.name.split(' ')[0],v:u.recipes,c:COLS[i]})));
}

// ══ USERS TABLE ══
function renderUsersTable(users){
  document.getElementById('uCount').textContent=users.length;
  const tbody=document.getElementById('uBody');
  if(!users.length){tbody.innerHTML=`<tr><td colspan="7" style="text-align:center;padding:30px;color:var(--text3);font-family:'Barlow Condensed',sans-serif;letter-spacing:1px">NO USERS FOUND</td></tr>`;return;}
  tbody.innerHTML=users.map(u=>`
    <tr>
      <td style="font-family:'Barlow Condensed',sans-serif;font-size:10px;color:var(--text3);letter-spacing:1.5px">${u.id}</td>
      <td>
        <div style="display:flex;align-items:center;gap:9px">
          <div class="av" style="background:${u.clr};color:#000">${u.av}</div>
          <span style="font-weight:600;font-size:13px">${u.name}</span>
        </div>
      </td>
      <td style="color:var(--text2);font-size:12.5px">${u.email}</td>
      <td><span class="badge ${u.status==='active'?'b-active':'b-blocked'}">${u.status}</span></td>
      <td><strong style="font-family:'Barlow Condensed',sans-serif;font-size:15px;color:var(--cyan)">${u.recipes}</strong></td>
      <td style="font-size:11px;color:var(--text2);font-family:'Barlow Condensed',sans-serif;letter-spacing:.8px">${u.joined}</td>
      <td>
        ${u.status==='active'
          ?`<button class="btn btn-danger" onclick="toggleUser('${u.id}')">⊘ Block</button>`
          :`<button class="btn btn-success" onclick="toggleUser('${u.id}')">◉ Unblock</button>`}
      </td>
    </tr>`).join('');
}
function toggleUser(id){
  const u=USERS.find(x=>x.id===id);if(!u)return;
  u.status=u.status==='active'?'blocked':'active';
  toast(`${u.name} ${u.status==='blocked'?'blocked':'unblocked'}`,u.status==='blocked'?'err':'ok');
  filterUsers();
  const sv=document.querySelectorAll('.stat-val');
  if(sv[2])sv[2].textContent=USERS.filter(x=>x.status==='blocked').length;
}
function filterUsers(){
  const q=document.getElementById('uSearch').value.toLowerCase();
  const st=document.getElementById('uStatus').value;
  const srt=document.getElementById('uSort').value;
  let res=USERS.filter(u=>{
    return (u.name.toLowerCase().includes(q)||u.email.toLowerCase().includes(q)||u.id.toLowerCase().includes(q))
      &&(st==='all'||u.status===st);
  });
  if(srt==='rd')res.sort((a,b)=>b.recipes-a.recipes);
  else if(srt==='ra')res.sort((a,b)=>a.recipes-b.recipes);
  else if(srt==='na')res.sort((a,b)=>a.name.localeCompare(b.name));
  renderUsersTable(res);
}

// ══ RECIPES ══
document.getElementById('rTotal').textContent=RECIPES.length;
let rMode='card';
function renderRCards(recipes){
  const g=document.getElementById('rCardGrid');
  if(!recipes.length){g.innerHTML=`<div style="grid-column:1/-1;text-align:center;padding:30px;color:var(--text3);font-family:'Barlow Condensed',sans-serif;letter-spacing:1px">NO RECIPES FOUND</div>`;return;}
  g.innerHTML=recipes.map(r=>`
    <div class="rcrd">
      <div class="rcrd-img">${EMJ[r.cat]||'🍴'}</div>
      <div class="rcrd-body">
        <div class="rcrd-name">${r.name}</div>
        <div style="margin-bottom:7px;display:flex;gap:4px;flex-wrap:wrap">
          <span class="badge b-cat">${r.cat}</span>
          ${r.trending?'<span class="badge b-top">◈ Trending</span>':''}
        </div>
        <div class="rcrd-meta">
          <div class="rcrd-owner">◉ ${r.owner.split(' ')[0]}</div>
          <div class="rcrd-rating">★ ${r.rating}</div>
        </div>
      </div>
    </div>`).join('');
}
function renderRTable(recipes){
  const b=document.getElementById('rBody');
  if(!recipes.length){b.innerHTML=`<tr><td colspan="7" style="text-align:center;padding:30px;color:var(--text3);font-family:'Barlow Condensed',sans-serif;letter-spacing:1px">NO RECIPES FOUND</td></tr>`;return;}
  b.innerHTML=recipes.map(r=>`
    <tr>
      <td><div style="display:flex;align-items:center;gap:8px"><span style="font-size:18px">${EMJ[r.cat]||'🍴'}</span><strong style="font-size:13px">${r.name}</strong></div></td>
      <td><span class="badge b-cat">${r.cat}</span></td>
      <td><strong style="font-family:'Barlow Condensed',sans-serif;color:var(--warn)">★ ${r.rating}</strong></td>
      <td style="font-size:12.5px">${r.owner}</td>
      <td style="font-size:11.5px;color:var(--text2);font-family:'Barlow Condensed',sans-serif">${r.views.toLocaleString()}</td>
      <td style="font-size:10.5px;color:var(--text2);font-family:'Barlow Condensed',sans-serif;letter-spacing:.8px">${r.added}</td>
      <td>${r.trending?'<span class="badge b-top">◈ Trending</span>':'<span class="badge b-active">Active</span>'}</td>
    </tr>`).join('');
}
function filterRecipes(){
  const q=(document.getElementById('rSearch')?.value||document.getElementById('rSearchT')?.value||'').toLowerCase();
  const c=document.getElementById('rCat')?.value||'all';
  const res=RECIPES.filter(r=>(r.name.toLowerCase().includes(q)||r.owner.toLowerCase().includes(q))&&(c==='all'||r.cat===c));
  renderRCards(res);renderRTable(res);
}
function toggleRView(){
  rMode=rMode==='card'?'table':'card';
  document.getElementById('rCardView').style.display=rMode==='card'?'block':'none';
  document.getElementById('rTableView').style.display=rMode==='table'?'block':'none';
  document.getElementById('rToggleBtn').textContent=rMode==='card'?'☰ Table':'⊞ Cards';
}

// ══ ANALYTICS ══
function renderAnalytics(){
  // Bar
  const COLS=['#00e5c8','#00b4ff','#00e5a0','#a78bfa','#ffc840','#00d4b4','#e879f9','#f97316','#84cc16','#ff4060'];
  renderBarChart('aBar',[...USERS].sort((a,b)=>b.recipes-a.recipes).slice(0,10).map((u,i)=>({l:u.name.split(' ')[0],v:u.recipes,c:COLS[i]})));

  // Donut
  const active=USERS.filter(u=>u.status==='active').length,blocked=USERS.filter(u=>u.status==='blocked').length,total=USERS.length;
  const pct=(active/total*100).toFixed(0),r=54,cx=70,cy=70,sw=12,circ=2*Math.PI*r;
  const aD=circ*active/total,bD=circ*blocked/total;
  document.getElementById('uDonut').innerHTML=`<div class="donut-wrap">
    <svg width="140" height="140" viewBox="0 0 140 140">
      <circle cx="${cx}" cy="${cy}" r="${r}" fill="none" stroke="var(--bg3)" stroke-width="${sw}"/>
      <circle cx="${cx}" cy="${cy}" r="${r}" fill="none" stroke="#ff4060" stroke-width="${sw}"
        stroke-dasharray="${bD} ${circ}" stroke-dashoffset="${-aD}" transform="rotate(-90 ${cx} ${cy})" stroke-linecap="round"/>
      <circle cx="${cx}" cy="${cy}" r="${r}" fill="none" stroke="#00e5c8" stroke-width="${sw}"
        stroke-dasharray="${aD} ${circ}" transform="rotate(-90 ${cx} ${cy})" stroke-linecap="round"/>
    </svg>
    <div class="donut-label"><div class="donut-val">${pct}%</div><div class="donut-sub">Active</div></div>
  </div>`;
  document.getElementById('uDonutLeg').innerHTML=`
    <div class="pie-leg-item"><div class="pie-leg-dot" style="background:#00e5c8"></div>Active (${active})</div>
    <div class="pie-leg-item"><div class="pie-leg-dot" style="background:#ff4060"></div>Blocked (${blocked})</div>`;

  // Rating dist
  const bkts={'5.0':0,'4.5–4.9':0,'4.0–4.4':0,'< 4.0':0};
  RECIPES.forEach(r=>{
    if(r.rating===5)bkts['5.0']++;
    else if(r.rating>=4.5)bkts['4.5–4.9']++;
    else if(r.rating>=4.0)bkts['4.0–4.4']++;
    else bkts['< 4.0']++;
  });
  const mx=Math.max(...Object.values(bkts));
  const rcols=['#ffc840','#00e5c8','#00b4ff','#ff4060'];
  document.getElementById('ratingDist').innerHTML=Object.entries(bkts).map(([k,v],i)=>`
    <div class="mbar-wrap">
      <div class="mbar-lbl"><span>${k} ★</span><span>${v} recipes</span></div>
      <div class="mbar"><div class="mbar-fill" style="width:${mx?(v/mx*100).toFixed(0):0}%;background:${rcols[i]}"></div></div>
    </div>`).join('');

  // Cat breakdown
  const ccols=['#00e5c8','#00b4ff','#00e5a0','#a78bfa','#ffc840','#00d4b4'];
  const tot=RECIPES.length;
  document.getElementById('catBreak').innerHTML=CATS.map((c,i)=>{
    const v=RECIPES.filter(r=>r.cat===c).length;
    return `<div class="mbar-wrap">
      <div class="mbar-lbl"><span>${EMJ[c]} ${c}</span><span>${v} (${(v/tot*100).toFixed(0)}%)</span></div>
      <div class="mbar"><div class="mbar-fill" style="width:${(v/tot*100).toFixed(0)}%;background:${ccols[i]}"></div></div>
    </div>`;
  }).join('');

  // Growth
  const months=['Oct','Nov','Dec','Jan','Feb','Mar'],uG=[18,24,31,38,44,48],rG=[120,195,310,420,510,580],mR=Math.max(...rG);
  let html=`<div style="display:flex;gap:12px;margin-bottom:10px;font-size:10px;font-family:'Barlow Condensed',sans-serif;letter-spacing:2px;text-transform:uppercase;color:var(--text2)">
    <span style="display:flex;align-items:center;gap:5px"><span style="width:8px;height:2px;background:var(--cyan);display:inline-block"></span>Recipes</span>
    <span style="display:flex;align-items:center;gap:5px"><span style="width:8px;height:2px;background:#00b4ff;display:inline-block"></span>Users</span>
  </div><div style="display:flex;align-items:flex-end;gap:8px;height:130px">`;
  months.forEach((m,i)=>{
    const rH=(rG[i]/mR*110).toFixed(0),uH=(uG[i]/48*110).toFixed(0);
    html+=`<div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:4px">
      <div style="display:flex;align-items:flex-end;gap:2px;height:110px">
        <div style="width:13px;height:${rH}px;background:var(--cyan);border-radius:2px 2px 0 0;opacity:.75"></div>
        <div style="width:13px;height:${uH}px;background:#00b4ff;border-radius:2px 2px 0 0;opacity:.75"></div>
      </div>
      <div style="font-size:9.5px;color:var(--text3);font-family:'Barlow Condensed',sans-serif;letter-spacing:1px">${m}</div>
    </div>`;
  });
  html+=`</div>`;
  document.getElementById('growChart').innerHTML=html;
}

// ══ INIT ══
renderActivity();renderTopUsers();renderTrending();renderQS();renderDashBar();filterUsers();filterRecipes();
</script>
</body>
</html>
