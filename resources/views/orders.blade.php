<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Panel – Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --sidebar-w: 210px;
      --bg: #f0f2f7;
      --sidebar-bg: #1e2433;
      --sidebar-accent: #2d3448;
      --sidebar-active: #3b4b7c;
      --primary: #3b5bdb;
      --primary-light: #e8eeff;
      --green: #2f9e44;
      --green-light: #ebfbee;
      --green-bg: #ebfbee;
      --red: #c92a2a;
      --red-light: #fff5f5;
      --red-bg: #fff5f5;
      --blue: #1971c2;
      --blue-light: #e7f5ff;
      --blue-dark: #1560aa;
      --yellow: #e67700;
      --yellow-bg: #fff3cd;
      --teal: #0c8599;
      --teal-bg: #e3fafc;
      --text: #1a1f36;
      --muted: #6b7280;
      --border: #e2e6f0;
      --surface: #ffffff;
      --card: #ffffff;
      --shadow: 0 2px 12px rgba(30,36,51,.08);
      --shadow-lg: 0 8px 32px rgba(30,36,51,.14);
      --radius: 10px;
      --radius-sm: 6px;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--bg);
      color: var(--text);
      display: flex;
      min-height: 100vh;
    }

    /* ── SIDEBAR ── */
    .sidebar {
      width: var(--sidebar-w);
      min-height: 100vh;
      background: var(--sidebar-bg);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0; left: 0;
      z-index: 100;
    }

    .sidebar-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 22px 20px 18px;
      border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .sidebar-brand .brand-icon {
      width: 34px; height: 34px;
      background: var(--primary);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      font-size: 16px; color: #fff;
    }
    .sidebar-brand span {
      font-weight: 700;
      font-size: 15px;
      color: #fff;
      letter-spacing: .3px;
    }

    .sidebar nav { flex: 1; padding: 14px 10px; display: flex; flex-direction: column; gap: 2px; }

    .nav-label {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      color: rgba(255,255,255,.28);
      padding: 10px 10px 6px;
    }

    .nav-item {
      display: flex; align-items: center; gap: 11px;
      padding: 10px 13px;
      border-radius: var(--radius-sm);
      color: rgba(255,255,255,.6);
      font-size: 13.5px;
      font-weight: 500;
      cursor: pointer;
      text-decoration: none;
      transition: background .15s, color .15s;
      position: relative;
    }
    .nav-item:hover { background: var(--sidebar-accent); color: rgba(255,255,255,.9); }
    .nav-item.active { background: var(--sidebar-active); color: #fff; }
    .nav-item i { width: 18px; text-align: center; font-size: 14px; }

    .nav-badge {
      margin-left: auto;
      background: var(--red);
      color: #fff;
      font-size: 10.5px;
      font-weight: 700;
      padding: 1px 7px;
      border-radius: 99px;
    }

    .sidebar-bottom {
      padding: 10px 10px 20px;
      border-top: 1px solid rgba(255,255,255,.06);
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    /* ── TOPBAR ── */
    .topbar {
      position: fixed;
      top: 0;
      left: var(--sidebar-w);
      right: 0;
      height: 60px;
      background: var(--card);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px;
      z-index: 90;
    }

    .topbar-title {
      font-size: 19px;
      font-weight: 700;
      color: var(--text);
    }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .admin-pill {
      display: flex; align-items: center; gap: 8px;
      padding: 5px 12px 5px 8px;
      border: 1.5px solid var(--border);
      border-radius: 99px;
      background: #fff;
      cursor: pointer;
      font-size: 13px;
      font-weight: 600;
      color: var(--text);
    }
    .admin-pill .av {
      width: 26px; height: 26px;
      background: var(--sidebar-active);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-size: 11px; font-weight: 700;
    }

    .btn-icon {
      width: 36px; height: 36px;
      border: 1.5px solid var(--border);
      background: #fff;
      border-radius: var(--radius-sm);
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      color: var(--muted);
      font-size: 14px;
      transition: border-color .15s, color .15s;
    }
    .btn-icon:hover { border-color: var(--primary); color: var(--primary); }

    /* ── MAIN ── */
    .main {
      margin-left: var(--sidebar-w);
      margin-top: 60px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .content { padding: 26px 28px; flex: 1; }

    /* ── FILTER BAR ── */
    .filter-bar {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
      margin-bottom: 18px;
    }

    .btn-filter {
      font-size: 13.5px;
      font-weight: 500;
      border-radius: var(--radius-sm);
      padding: 7px 16px;
      border: none;
      background: transparent;
      color: var(--muted);
      cursor: pointer;
      transition: background .15s, color .15s;
      display: flex; align-items: center; gap: 6px;
      font-family: inherit;
    }
    .btn-filter:hover { background: var(--primary-light); color: var(--primary); }
    .btn-filter.active { background: var(--primary); color: #fff; }

    .btn-dropdown {
      font-size: 13px;
      font-weight: 500;
      border-radius: var(--radius-sm);
      padding: 7px 14px;
      border: 1.5px solid var(--border);
      background: #fff;
      color: var(--text);
      cursor: pointer;
      font-family: inherit;
    }

    .btn-clear {
      width: 34px; height: 34px;
      border-radius: var(--radius-sm);
      border: 1.5px solid var(--border);
      background: #fff;
      display: flex; align-items: center; justify-content: center;
      color: var(--muted);
      cursor: pointer;
      font-size: 13px;
      transition: border-color .15s, color .15s;
    }
    .btn-clear:hover { border-color: var(--primary); color: var(--primary); }

    .search-wrap {
      margin-left: auto;
      position: relative;
    }
    .search-wrap i {
      position: absolute;
      left: 11px; top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      font-size: 13px;
    }
    .search-wrap input {
      padding: 8px 14px 8px 34px;
      border: 1.5px solid var(--border);
      border-radius: var(--radius-sm);
      font-size: 13px;
      font-family: 'DM Sans', sans-serif;
      background: #fff;
      color: var(--text);
      width: 220px;
      outline: none;
      transition: border-color .15s;
    }
    .search-wrap input::placeholder { color: var(--muted); }
    .search-wrap input:focus { border-color: var(--primary); }

    /* ── TABLE ── */
    .table-card {
      background: var(--card);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    table { width: 100%; border-collapse: collapse; }

    thead { background: #f7f8fc; }
    thead th {
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .5px;
      text-transform: uppercase;
      color: var(--muted);
      padding: 13px 16px;
      border-bottom: 1px solid var(--border);
      text-align: left;
    }

    tbody tr {
      border-bottom: 1px solid var(--border);
      transition: background .12s;
    }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover td { background: #fafbff; }

    tbody td {
      padding: 14px 16px;
      font-size: 13.5px;
      vertical-align: middle;
    }

    .order-id {
      display: flex;
      align-items: center;
      gap: 8px;
      font-weight: 600;
      color: var(--primary);
    }

    .order-id .doc-icon {
      width: 30px; height: 30px;
      background: var(--primary-light);
      border-radius: var(--radius-sm);
      display: flex; align-items: center; justify-content: center;
      color: var(--primary);
      font-size: 13px;
      flex-shrink: 0;
    }

    .user-cell {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .avatar {
      width: 30px; height: 30px;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 11px;
      font-weight: 700;
      color: #fff;
      flex-shrink: 0;
      overflow: hidden;
    }

    .username { font-size: 13.5px; font-weight: 500; }
    .date-cell { color: var(--muted); font-size: 13px; }
    .total-cell { font-weight: 700; font-family: 'DM Mono', monospace; color: var(--green); font-size: 14px; }

    /* Status badges */
    .badge-status {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 11.5px;
      font-weight: 700;
      border-radius: 99px;
      padding: 4px 11px;
    }
    .badge-status::before {
      content: '';
      display: block;
      width: 6px; height: 6px;
      border-radius: 50%;
    }
    .status-shipped  { background: var(--green-bg); color: var(--green); }
    .status-shipped::before  { background: var(--green); }
    .status-pending  { background: var(--yellow-bg); color: #92400e; }
    .status-pending::before  { background: var(--yellow); }
    .status-delivered{ background: var(--teal-bg); color: var(--teal); }
    .status-delivered::before{ background: var(--teal); }
    .status-cancelled{ background: var(--red-bg); color: var(--red); }
    .status-cancelled::before{ background: var(--red); }

    .btn-view-row {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 7px 14px;
      border-radius: var(--radius-sm);
      font-family: inherit;
      font-size: 12.5px;
      font-weight: 600;
      cursor: pointer;
      border: none;
      background: var(--blue);
      color: #fff;
      transition: filter .15s, transform .1s;
    }
    .btn-view-row:hover { filter: brightness(1.1); }
    .btn-view-row:active { transform: scale(.97); }

    /* ── PAGINATION ── */
    .pagination-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 6px;
      padding: 18px 0 4px;
    }

    .pg-btn {
      min-width: 34px; height: 34px;
      border-radius: var(--radius-sm);
      border: 1.5px solid var(--border);
      background: #fff;
      font-family: inherit;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      color: var(--muted);
      display: flex; align-items: center; justify-content: center;
      padding: 0 10px;
      transition: border-color .15s, color .15s, background .15s;
    }
    .pg-btn:hover { border-color: var(--primary); color: var(--primary); }
    .pg-btn.active { background: var(--primary); color: #fff; border-color: var(--primary); }

    /* ── MODAL (Bootstrap override) ── */
    .modal-content {
      border-radius: 14px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-lg);
      overflow: hidden;
    }

    .modal-header {
      border-bottom: 1px solid var(--border);
      padding: 20px 24px 16px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .modal-title {
      font-size: 17px;
      font-weight: 700;
      color: var(--text);
    }

    .modal-order-id {
      font-size: 14px;
      font-weight: 700;
      color: var(--primary);
      background: var(--primary-light);
      padding: 3px 10px;
      border-radius: 99px;
    }

    .modal-body { padding: 22px 24px; }

    .modal-meta {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .modal-product-img {
      width: 60px; height: 60px;
      border-radius: var(--radius);
      border: 1px solid var(--border);
      background: var(--bg);
      display: flex; align-items: center; justify-content: center;
      font-size: 22px;
    }

    .modal-date { font-size: 13px; color: var(--muted); }
    .modal-seller { font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 6px; margin-top: 4px; }

    /* Status update row */
    .status-update-row {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
    }

    .btn-status {
      font-size: 12px;
      font-weight: 600;
      border-radius: var(--radius-sm);
      padding: 6px 13px;
      border: 1.5px solid;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-family: inherit;
      transition: filter .15s, transform .1s;
    }
    .btn-status:active { transform: scale(.97); }
    .btn-status.shipped  { border-color: var(--green); color: var(--green); background: var(--green-bg); }
    .btn-status.shipped:hover, .btn-status.shipped.selected { background: var(--green); color: #fff; }
    .btn-status.delivered{ border-color: var(--teal); color: var(--teal); background: var(--teal-bg); }
    .btn-status.delivered:hover, .btn-status.delivered.selected { background: var(--teal); color: #fff; }
    .btn-status.cancelled{ border-color: var(--red); color: var(--red); background: var(--red-bg); }
    .btn-status.cancelled:hover, .btn-status.cancelled.selected { background: var(--red); color: #fff; }

    .btn-update-status {
      margin-left: auto;
      font-size: 12.5px;
      font-weight: 700;
      border-radius: var(--radius-sm);
      padding: 7px 15px;
      background: var(--primary);
      color: #fff;
      border: none;
      cursor: pointer;
      font-family: inherit;
      transition: filter .15s, transform .1s;
    }
    .btn-update-status:hover { filter: brightness(1.1); }
    .btn-update-status:active { transform: scale(.97); }

    /* Section headers inside modal */
    .modal-section-title {
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .5px;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 12px;
      margin-top: 18px;
    }

    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .info-box {
      background: var(--bg);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      padding: 14px;
      font-size: 13px;
    }

    .info-box .ib-name {
      font-weight: 600;
      font-size: 13.5px;
      margin-bottom: 6px;
      display: flex;
      align-items: center;
      gap: 7px;
    }

    .info-box .ib-name .av-sm {
      width: 26px; height: 26px;
      border-radius: 50%;
      background: var(--sidebar-active);
      color: #fff;
      font-size: 10px;
      font-weight: 700;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }

    .info-box p {
      color: var(--muted);
      font-size: 12.5px;
      line-height: 1.7;
      display: flex;
      align-items: flex-start;
      gap: 6px;
    }
    .info-box p i { margin-top: 2px; flex-shrink: 0; }
    .info-box a { color: var(--primary); text-decoration: none; }

    /* Product row in modal */
    .product-row {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px;
      background: var(--bg);
      border-radius: var(--radius);
      border: 1px solid var(--border);
    }

    .product-thumb {
      width: 46px; height: 46px;
      border-radius: var(--radius-sm);
      background: #fff;
      border: 1px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }

    .product-name { font-weight: 600; font-size: 13.5px; }
    .product-price { font-weight: 700; color: var(--primary); margin-left: auto; font-size: 16px; font-family: 'DM Mono', monospace; }

    .summary-rows { margin-top: 10px; }
    .summary-row {
      display: flex;
      justify-content: space-between;
      font-size: 13px;
      padding: 5px 0;
      color: var(--muted);
    }
    .summary-row.total {
      font-weight: 700;
      color: var(--text);
      border-top: 1px solid var(--border);
      margin-top: 6px;
      padding-top: 10px;
    }

    .shipping-pill {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: var(--bg);
      border: 1.5px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 8px 14px;
      font-size: 13px;
    }

    .tracking-pill {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: var(--blue-light);
      border: 1.5px solid #bee3f8;
      border-radius: var(--radius-sm);
      padding: 7px 14px;
      font-size: 12.5px;
      color: var(--blue);
      font-weight: 500;
      margin-top: 8px;
    }

    /* Comment area */
    .comment-area {
      background: #fff;
      border: 1.5px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 10px 14px;
      font-size: 13px;
      font-family: 'DM Sans', sans-serif;
      color: var(--text);
      width: 100%;
      outline: none;
      resize: none;
      transition: border-color .15s;
    }
    .comment-area:focus { border-color: var(--primary); }

    .modal-footer {
      border-top: 1px solid var(--border);
      padding: 16px 24px;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 10px;
    }

    .btn-close-modal {
      font-size: 13px;
      font-weight: 600;
      border-radius: var(--radius-sm);
      padding: 8px 20px;
      border: 1.5px solid var(--border);
      background: transparent;
      color: var(--muted);
      cursor: pointer;
      font-family: inherit;
      transition: border-color .15s, color .15s;
    }
    .btn-close-modal:hover { border-color: var(--primary); color: var(--primary); }

    .btn-send {
      font-size: 13px;
      font-weight: 700;
      border-radius: var(--radius-sm);
      padding: 8px 22px;
      background: var(--primary);
      color: #fff;
      border: none;
      cursor: pointer;
      font-family: inherit;
      transition: filter .15s, transform .1s;
      display: inline-flex; align-items: center; gap: 6px;
    }
    .btn-send:hover { filter: brightness(1.1); }
    .btn-send:active { transform: scale(.97); }

    /* Avatar color utilities */
    .av-c1 { background: #7c3aed; }
    .av-c2 { background: #db2777; }
    .av-c3 { background: #0891b2; }
    .av-c4 { background: #059669; }
    .av-c5 { background: #d97706; }
    .av-c6 { background: #dc2626; }
    .av-c7 { background: #4f46e5; }

    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .main { margin-left: 0; }
      .topbar { left: 0; }
      .info-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- ════════════════════ SIDEBAR ════════════════════ -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="brand-icon"><i class="fa-solid fa-grip"></i></div>
    <span>Admin Panel</span>
  </div>
  <nav>
    <div class="nav-label">Main</div>
    <a class="nav-item" href="#"><i class="fa-solid fa-house"></i> Dashboard</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-circle-check"></i> Product Approvals</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-id-badge"></i> Seller Verification</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-users"></i> User Management</a>
    <a class="nav-item active" href="#"><i class="fa-solid fa-receipt"></i> Orders</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-chart-bar"></i> Reports</a>
  </nav>
  <div class="sidebar-bottom">
    <a class="nav-item" href="#"><i class="fa-solid fa-gear"></i> Settings</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
  </div>
</aside>

<!-- ════════════════════ TOPBAR ════════════════════ -->
<div class="topbar">
  <div class="topbar-title">Orders</div>
  <div class="topbar-right">
    <div class="btn-icon"><i class="fa-regular fa-bell"></i></div>
    <div class="admin-pill">
      <div class="av">IM</div>
      <span>imemeru</span>
      <i class="fa-solid fa-chevron-down" style="font-size:10px; color:var(--muted)"></i>
    </div>
  </div>
</div>

<!-- ════════════════════ MAIN ════════════════════ -->
<div class="main">
  <div class="content">

    <!-- Filter Bar -->
    <div class="filter-bar">
      <button class="btn-filter active">All</button>
      <button class="btn-filter">Last 30 Days <i class="fa-solid fa-chevron-down ms-1" style="font-size:10px"></i></button>
      <div class="btn-clear"><i class="fa-solid fa-xmark"></i></div>
      <select class="btn-dropdown" style="appearance:none; cursor:pointer;">
        <option>All Statuses</option>
        <option>Shipped</option>
        <option>Pending</option>
        <option>Delivered</option>
        <option>Cancelled</option>
      </select>
      <select class="btn-dropdown" style="appearance:none; cursor:pointer;">
        <option>All Sellers</option>
        <option>woodwonder_jake</option>
        <option>handmadeby_sara</option>
        <option>clayandcolor</option>
      </select>
      <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Search orders…" />
      </div>
    </div>

    <!-- Table -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>Order</th>
            <th>Date</th>
            <th>Buyer</th>
            <th>Seller</th>
            <th>Total</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <!-- Row 1 -->
          <tr>
            <td>
              <div class="order-id">
                <div class="doc-icon"><i class="fa-solid fa-receipt"></i></div>
                #10025
              </div>
            </td>
            <td class="date-cell">Apr 19, 2024</td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c1">CE</div>
                <span class="username">crafty_emma</span>
              </div>
            </td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c3">WJ</div>
                <span class="username">woodwonder_jake</span>
              </div>
            </td>
            <td class="total-cell">$45.00</td>
            <td><span class="badge-status status-shipped">Shipped</span></td>
            <td>
              <button class="btn-view-row" onclick="openModal(orders[0])">
                <i class="fa-solid fa-magnifying-glass"></i> View Details
              </button>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td>
              <div class="order-id">
                <div class="doc-icon"><i class="fa-solid fa-receipt"></i></div>
                #10024
              </div>
            </td>
            <td class="date-cell">Apr 17, 2024</td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c2">BG</div>
                <span class="username">beads_girl</span>
              </div>
            </td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c4">HS</div>
                <span class="username">handmadeby_sara</span>
              </div>
            </td>
            <td class="total-cell">$18.00</td>
            <td><span class="badge-status status-pending">Pending</span></td>
            <td>
              <button class="btn-view-row" onclick="openModal(orders[1])">
                <i class="fa-solid fa-magnifying-glass"></i> View Details
              </button>
            </td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td>
              <div class="order-id">
                <div class="doc-icon"><i class="fa-solid fa-receipt"></i></div>
                #10023
              </div>
            </td>
            <td class="date-cell">Apr 15, 2024</td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c7">AA</div>
                <span class="username">artisan_alex</span>
              </div>
            </td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c5">CC</div>
                <span class="username">clayandcolor</span>
              </div>
            </td>
            <td class="total-cell">$60.00</td>
            <td><span class="badge-status status-delivered">Delivered</span></td>
            <td>
              <button class="btn-view-row" onclick="openModal(orders[2])">
                <i class="fa-solid fa-magnifying-glass"></i> View Details
              </button>
            </td>
          </tr>

          <!-- Row 4 -->
          <tr>
            <td>
              <div class="order-id">
                <div class="doc-icon"><i class="fa-solid fa-receipt"></i></div>
                #10022
              </div>
            </td>
            <td class="date-cell">Apr 12, 2024</td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c5">SS</div>
                <span class="username">student_sam</span>
              </div>
            </td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c2">CJ</div>
                <span class="username">crafty_jenny</span>
              </div>
            </td>
            <td class="total-cell">$25.00</td>
            <td><span class="badge-status status-cancelled">Cancelled</span></td>
            <td>
              <button class="btn-view-row" onclick="openModal(orders[3])">
                <i class="fa-solid fa-magnifying-glass"></i> View Details
              </button>
            </td>
          </tr>

          <!-- Row 5 -->
          <tr>
            <td>
              <div class="order-id">
                <div class="doc-icon"><i class="fa-solid fa-receipt"></i></div>
                #10021
              </div>
            </td>
            <td class="date-cell">Apr 10, 2024</td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c6">MM</div>
                <span class="username">macrame_mia</span>
              </div>
            </td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c3">BK</div>
                <span class="username">beads_and_knots</span>
              </div>
            </td>
            <td class="total-cell">$50.00</td>
            <td><span class="badge-status status-shipped">Shipped</span></td>
            <td>
              <button class="btn-view-row" onclick="openModal(orders[4])">
                <i class="fa-solid fa-magnifying-glass"></i> View Details
              </button>
            </td>
          </tr>

          <!-- Row 6 -->
          <tr>
            <td>
              <div class="order-id">
                <div class="doc-icon"><i class="fa-solid fa-receipt"></i></div>
                #10020
              </div>
            </td>
            <td class="date-cell">Apr 8, 2024</td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c4">PP</div>
                <span class="username">potterypete</span>
              </div>
            </td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c5">CC</div>
                <span class="username">clayandcolor</span>
              </div>
            </td>
            <td class="total-cell">$75.00</td>
            <td><span class="badge-status status-delivered">Delivered</span></td>
            <td>
              <button class="btn-view-row" onclick="openModal(orders[5])">
                <i class="fa-solid fa-magnifying-glass"></i> View Details
              </button>
            </td>
          </tr>

          <!-- Row 7 -->
          <tr>
            <td>
              <div class="order-id">
                <div class="doc-icon"><i class="fa-solid fa-receipt"></i></div>
                #10019
              </div>
            </td>
            <td class="date-cell">Apr 6, 2024</td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c7">LW</div>
                <span class="username">leatherwork_ly</span>
              </div>
            </td>
            <td>
              <div class="user-cell">
                <div class="avatar av-c6">RC</div>
                <span class="username">rustic_crafts</span>
              </div>
            </td>
            <td class="total-cell">$32.00</td>
            <td><span class="badge-status status-delivered">Delivered</span></td>
            <td>
              <button class="btn-view-row" onclick="openModal(orders[6])">
                <i class="fa-solid fa-magnifying-glass"></i> View Details
              </button>
            </td>
          </tr>

        </tbody>
      </table>

      <!-- Pagination -->
      <div class="pagination-bar">
        <button class="pg-btn">Previous</button>
        <button class="pg-btn active">1</button>
        <button class="pg-btn">2</button>
        <button class="pg-btn">3</button>
        <button class="pg-btn">Next</button>
      </div>
    </div>

  </div>
</div>

<!-- ════════════════════ MODAL ════════════════════ -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <span class="modal-order-id" id="m-order-id">#10025</span>
        <span class="modal-title ms-2">Order Details</span>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <!-- Top meta -->
        <div class="modal-meta">
          <div class="modal-product-img" id="m-product-emoji">🛖</div>
          <div>
            <div class="modal-date" id="m-date">Apr 19, 2024</div>
            <div class="modal-seller">
              <div class="avatar av-c3" style="width:22px;height:22px;font-size:9px;" id="m-seller-av">WJ</div>
              <span id="m-seller-name">woodwonder_jake</span>
            </div>
          </div>
          <!-- Status toggle group -->
          <div class="status-update-row ms-auto">
            <button class="btn-status shipped selected" onclick="selectStatus(this)">
              <i class="fa-solid fa-circle-check"></i> Shipped
            </button>
            <button class="btn-status delivered" onclick="selectStatus(this)">
              <i class="fa-solid fa-box"></i> Delivered
            </button>
            <button class="btn-status cancelled" onclick="selectStatus(this)">
              <i class="fa-solid fa-circle-xmark"></i> Cancelled
            </button>
            <button class="btn-update-status" onclick="updateStatus()">Update Status</button>
          </div>
        </div>

        <!-- Product Information -->
        <div class="modal-section-title">Product Information</div>
        <div class="product-row">
          <div class="product-thumb" id="m-prod-icon">🪵</div>
          <div>
            <div class="product-name" id="m-prod-name">Handmade Wood Coasters</div>
            <div style="font-size:12px;color:var(--muted);margin-top:2px;" id="m-prod-desc">Set of 4, natural finish</div>
          </div>
          <div class="product-price" id="m-prod-price">$45.00</div>
        </div>
        <div class="summary-rows">
          <div class="summary-row">
            <span>Subtotal:</span><span id="m-subtotal">$45.00</span>
          </div>
          <div class="summary-row">
            <span>Shipping:</span><span id="m-shipping">$5.00</span>
          </div>
          <div class="summary-row total">
            <span>Total:</span><span id="m-total">$45.00</span>
          </div>
        </div>

        <!-- Buyer & Seller Info -->
        <div class="modal-section-title">Contact Information</div>
        <div class="info-grid">
          <div class="info-box">
            <div class="ib-name">
              <div class="av-sm" id="m-buyer-av">CE</div>
              <span id="m-buyer-name">Crafty Emma (crafty_emma)</span>
            </div>
            <p><i class="fa-solid fa-phone"></i> <span id="m-buyer-phone">+1 123-456-7890</span></p>
            <p><i class="fa-solid fa-location-dot"></i> <span id="m-buyer-addr">Emma R.<br>123 Handmade Ln<br>Austin, TX 78702<br>United States</span></p>
          </div>
          <div class="info-box">
            <div class="ib-name">
              <div class="av-sm av-c3" id="m-seller-av2">WJ</div>
              <span id="m-seller-name2">Woodwonder_Jake</span>
            </div>
            <p><i class="fa-solid fa-phone"></i> <span id="m-seller-phone">+1 987-654-3210</span></p>
            <p><i class="fa-solid fa-envelope"></i> <a id="m-seller-email" href="#">jake@woodycrafts.com</a></p>
          </div>
        </div>

        <!-- Shipping Info -->
        <div class="modal-section-title">Shipping Information</div>
        <div class="shipping-pill">
          <i class="fa-solid fa-truck" style="color:var(--primary)"></i>
          <span id="m-carrier">USPS · Priority Mail</span>
        </div>
        <div><div class="tracking-pill">
          <i class="fa-solid fa-barcode"></i>
          Tracking: <strong id="m-tracking">9405 5056 9530 000 1234 56</strong>
        </div></div>

        <!-- Comments -->
        <div class="modal-section-title" style="margin-top:18px">Comments</div>
        <textarea class="comment-area" rows="2" placeholder="Add a note…"></textarea>

      </div>

      <div class="modal-footer">
        <button class="btn-close-modal" data-bs-dismiss="modal">Close</button>
        <button class="btn-send"><i class="fa-solid fa-paper-plane"></i> Send</button>
      </div>

    </div>
  </div>
</div>

<!-- ════════════════════ SCRIPTS ════════════════════ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const orders = [
    {
      id: '#10025', date: 'Apr 19, 2024',
      buyerAv: 'CE', buyerColor: 'av-c1',
      buyerName: 'Crafty Emma (crafty_emma)', buyerPhone: '+1 123-456-7890',
      buyerAddr: 'Emma R.<br>123 Handmade Ln<br>Austin, TX 78702<br>United States',
      sellerAv: 'WJ', sellerColor: 'av-c3',
      sellerName: 'Woodwonder_Jake', sellerPhone: '+1 987-654-3210',
      sellerEmail: 'jake@woodycrafts.com', sellerHandle: 'woodwonder_jake',
      prodIcon: '🪵', prodName: 'Handmade Wood Coasters',
      prodDesc: 'Set of 4, natural finish',
      prodPrice: '$45.00', subtotal: '$45.00', shipping: '$5.00', total: '$45.00',
      status: 'shipped', carrier: 'USPS · Priority Mail',
      tracking: '9405 5056 9530 000 1234 56'
    },
    {
      id: '#10024', date: 'Apr 17, 2024',
      buyerAv: 'BG', buyerColor: 'av-c2',
      buyerName: 'Beads Girl (beads_girl)', buyerPhone: '+1 555-234-9981',
      buyerAddr: 'Bea G.<br>47 Blossom Ave<br>Portland, OR 97201<br>United States',
      sellerAv: 'HS', sellerColor: 'av-c4',
      sellerName: 'Handmadeby_Sara', sellerPhone: '+1 312-887-4521',
      sellerEmail: 'sara@handmade.shop', sellerHandle: 'handmadeby_sara',
      prodIcon: '📿', prodName: 'Beaded Bracelet Set',
      prodDesc: 'Pack of 3, mixed colors',
      prodPrice: '$18.00', subtotal: '$18.00', shipping: '$3.50', total: '$18.00',
      status: 'pending', carrier: 'USPS · First Class',
      tracking: '9361 2895 0352 000 5678 90'
    },
    {
      id: '#10023', date: 'Apr 15, 2024',
      buyerAv: 'AA', buyerColor: 'av-c7',
      buyerName: 'Artisan Alex (artisan_alex)', buyerPhone: '+1 415-662-3301',
      buyerAddr: 'Alex M.<br>88 Pottery Lane<br>Denver, CO 80205<br>United States',
      sellerAv: 'CC', sellerColor: 'av-c5',
      sellerName: 'Clayandcolor', sellerPhone: '+1 720-445-1122',
      sellerEmail: 'hello@clayandcolor.com', sellerHandle: 'clayandcolor',
      prodIcon: '🏺', prodName: 'Hand-Thrown Ceramic Bowl',
      prodDesc: 'Large, glazed terracotta',
      prodPrice: '$60.00', subtotal: '$60.00', shipping: '$8.00', total: '$60.00',
      status: 'delivered', carrier: 'FedEx · Ground',
      tracking: 'FX 7842 3901 2200 4411'
    },
    {
      id: '#10022', date: 'Apr 12, 2024',
      buyerAv: 'SS', buyerColor: 'av-c5',
      buyerName: 'Student Sam (student_sam)', buyerPhone: '+1 628-992-4477',
      buyerAddr: 'Sam T.<br>22 College St<br>Boston, MA 02118<br>United States',
      sellerAv: 'CJ', sellerColor: 'av-c2',
      sellerName: 'Crafty_Jenny', sellerPhone: '+1 617-342-9900',
      sellerEmail: 'jenny@craftyjenny.co', sellerHandle: 'crafty_jenny',
      prodIcon: '🧵', prodName: 'Hand-Stitched Tote Bag',
      prodDesc: 'Canvas, embroidered floral',
      prodPrice: '$25.00', subtotal: '$25.00', shipping: '$4.00', total: '$25.00',
      status: 'cancelled', carrier: 'UPS · Ground',
      tracking: 'UPS 1Z999AA10123456784'
    },
    {
      id: '#10021', date: 'Apr 10, 2024',
      buyerAv: 'MM', buyerColor: 'av-c6',
      buyerName: 'Macrame Mia (macrame_mia)', buyerPhone: '+1 702-881-3344',
      buyerAddr: 'Mia R.<br>5 Desert Bloom Rd<br>Las Vegas, NV 89101<br>United States',
      sellerAv: 'BK', sellerColor: 'av-c3',
      sellerName: 'Beads_and_Knots', sellerPhone: '+1 561-773-2200',
      sellerEmail: 'shop@beadsknots.com', sellerHandle: 'beads_and_knots',
      prodIcon: '🪢', prodName: 'Macrame Wall Hanging',
      prodDesc: 'Large, boho style, cotton rope',
      prodPrice: '$50.00', subtotal: '$50.00', shipping: '$7.00', total: '$50.00',
      status: 'shipped', carrier: 'USPS · Priority Mail',
      tracking: '9400 1118 9956 000 0099 12'
    },
    {
      id: '#10020', date: 'Apr 8, 2024',
      buyerAv: 'PP', buyerColor: 'av-c4',
      buyerName: 'Pottery Pete (potterypete)', buyerPhone: '+1 503-221-6680',
      buyerAddr: 'Pete C.<br>300 Kiln Ave<br>Eugene, OR 97401<br>United States',
      sellerAv: 'CC', sellerColor: 'av-c5',
      sellerName: 'Clayandcolor', sellerPhone: '+1 720-445-1122',
      sellerEmail: 'hello@clayandcolor.com', sellerHandle: 'clayandcolor',
      prodIcon: '🍵', prodName: 'Stoneware Mug Set',
      prodDesc: 'Set of 2, slate blue glaze',
      prodPrice: '$75.00', subtotal: '$75.00', shipping: '$9.00', total: '$75.00',
      status: 'delivered', carrier: 'FedEx · Home Delivery',
      tracking: 'FX 0001 2238 7741 9900'
    },
    {
      id: '#10019', date: 'Apr 6, 2024',
      buyerAv: 'LW', buyerColor: 'av-c7',
      buyerName: 'Leatherwork Ly (leatherwork_ly)', buyerPhone: '+1 214-557-8899',
      buyerAddr: 'Ly N.<br>12 Saddle St<br>Dallas, TX 75201<br>United States',
      sellerAv: 'RC', sellerColor: 'av-c6',
      sellerName: 'Rustic_Crafts', sellerPhone: '+1 940-882-4412',
      sellerEmail: 'info@rusticcrafts.store', sellerHandle: 'rustic_crafts',
      prodIcon: '🪑', prodName: 'Reclaimed Wood Shelf',
      prodDesc: 'Floating, 24", natural stain',
      prodPrice: '$32.00', subtotal: '$32.00', shipping: '$6.00', total: '$32.00',
      status: 'delivered', carrier: 'UPS · Standard',
      tracking: 'UPS 1Z999BB10456789012'
    }
  ];

  let orderModal;
  document.addEventListener('DOMContentLoaded', () => {
    orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
  });

  function openModal(o) {
    document.getElementById('m-order-id').textContent = o.id;
    document.getElementById('m-date').textContent = o.date;

    const mSelAv = document.getElementById('m-seller-av');
    mSelAv.textContent = o.sellerAv;
    mSelAv.className = `avatar ${o.sellerColor}`;
    mSelAv.style.cssText = 'width:22px;height:22px;font-size:9px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;';
    document.getElementById('m-seller-name').textContent = o.sellerHandle;

    document.getElementById('m-prod-icon').textContent = o.prodIcon;
    document.getElementById('m-prod-name').textContent = o.prodName;
    document.getElementById('m-prod-desc').textContent = o.prodDesc;
    document.getElementById('m-prod-price').textContent = o.prodPrice;
    document.getElementById('m-subtotal').textContent = o.subtotal;
    document.getElementById('m-shipping').textContent = o.shipping;
    document.getElementById('m-total').textContent = o.total;

    const bAv = document.getElementById('m-buyer-av');
    bAv.textContent = o.buyerAv;
    bAv.className = `av-sm ${o.buyerColor}`;
    document.getElementById('m-buyer-name').textContent = o.buyerName;
    document.getElementById('m-buyer-phone').textContent = o.buyerPhone;
    document.getElementById('m-buyer-addr').innerHTML = o.buyerAddr;

    const sAv2 = document.getElementById('m-seller-av2');
    sAv2.textContent = o.sellerAv;
    sAv2.className = `av-sm ${o.sellerColor}`;
    document.getElementById('m-seller-name2').textContent = o.sellerName;
    document.getElementById('m-seller-phone').textContent = o.sellerPhone;
    const emailEl = document.getElementById('m-seller-email');
    emailEl.textContent = o.sellerEmail;
    emailEl.href = `mailto:${o.sellerEmail}`;

    document.getElementById('m-carrier').textContent = o.carrier;
    document.getElementById('m-tracking').textContent = o.tracking;

    document.querySelectorAll('.btn-status').forEach(b => b.classList.remove('selected'));
    const activeBtn = document.querySelector(`.btn-status.${o.status}`);
    if (activeBtn) activeBtn.classList.add('selected');

    orderModal.show();
  }

  function selectStatus(btn) {
    document.querySelectorAll('.btn-status').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
  }

  function updateStatus() {
    const sel = document.querySelector('.btn-status.selected');
    if (!sel) return;
    const status = sel.classList[1];
    const toast = document.createElement('div');
    toast.style.cssText = `
      position:fixed; bottom:28px; left:50%; transform:translateX(-50%);
      background:#1e2433; color:#fff; font-size:13px; font-weight:600;
      padding:10px 22px; border-radius:var(--radius); z-index:9999;
      box-shadow:0 4px 20px rgba(0,0,0,.25);
      animation: fadeInUp .3s ease;
    `;
    toast.textContent = `✓ Status updated to ${status.charAt(0).toUpperCase() + status.slice(1)}`;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 2500);
  }

  // Filter tab buttons
  document.querySelectorAll('.btn-filter').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.btn-filter').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
    });
  });

  // Pagination
  document.querySelectorAll('.pg-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.pg-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
    });
  });
</script>
<style>
  @keyframes fadeInUp {
    from { opacity:0; transform:translateX(-50%) translateY(10px); }
    to   { opacity:1; transform:translateX(-50%) translateY(0); }
  }
</style>
</body>
</html>
