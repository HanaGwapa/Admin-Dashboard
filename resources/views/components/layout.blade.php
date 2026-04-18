<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html {
            font-size: 16px;
        }

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
            --red: #c92a2a;
            --red-light: #fff5f5;
            --blue: #1971c2;
            --blue-light: #e7f5ff;
            --text: #1a1f36;
            --muted: #6b7280;
            --border: #e2e6f0;
            --card: #ffffff;
            --shadow: 0 2px 12px rgba(30, 36, 51, 0.08);
            --shadow-lg: 0 8px 32px rgba(30, 36, 51, 0.14);
            --radius: 10px;
            --radius-sm: 6px;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        .sidebar,
        .sidebar * {
            font-size: inherit;
        }

        .sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar .nav-item {
            color: rgba(255, 255, 255, .7);
            transition: 0.2s;
        }

        .sidebar .nav-item:hover {
            background: rgba(255, 255, 255, .08);
            color: #fff;
        }

        .sidebar {
            /* background: var(--sidebar-active); */
            color: #fff !important;
        }

        .sidebar-bottom {
            padding: 10px 10px 20px;
            border-top: 1px solid rgba(255, 255, 255, .06);
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 22px 20px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
        }

        .sidebar-brand .logo-icon {
            width: 34px;
            height: 34px;
            background: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: #fff;
        }

        .sidebar-brand span {
            font-weight: 700;
            font-size: 15px;
            color: #fff;
            letter-spacing: 0.3px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 14px 10px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 13px;
            border-radius: var(--radius-sm);
            color: rgba(255, 255, 255, .6);
            font-size: 13.5px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background .15s, color .15s;
            font-size: 13.5px;
            font-weight: 500;
            letter-spacing: 0.2px;
            /* position: relative; */
        }

        .nav-item i {
            width: 18px;
            text-align: center;
            font-size: 14px;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--red);
            color: #fff;
            font-size: 10.5px;
            font-weight: 700;
            padding: 1px 7px;
            border-radius: 99px;
        }

        .nav-item.active {
            background: var(--sidebar-active);
            color: #fff;
        }

        .nav-item:hover {
            background: var(--sidebar-accent);
            color: rgba(255, 255, 255, 0.9);
        }

        .topbar {
            background: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 0 28px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
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

        .btn-icon {
            width: 36px;
            height: 36px;
            border: 1.5px solid var(--border);
            background: #fff;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--muted);
            font-size: 14px;
            transition:
                border-color 0.15s,
                color 0.15s;
        }

        .btn-icon:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .admin-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 12px 5px 8px;
            border: 1.5px solid var(--border);
            border-radius: 99px;
            background: #fff;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
        }

        .admin-pill .avatar {
            width: 26px;
            height: 26px;
            background: var(--sidebar-active);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
        }

        .content {
            padding: 26px 28px;
            flex: 1;
        }

        .page-btn {
            min-width: 34px;
            height: 34px;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border);
            background: #fff;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            color: var(--muted);
            display: flex;
            align-items: center;
            justify-content: center;
            transition:
                border-color 0.15s,
                color 0.15s,
                background 0.15s;
        }

        .table-card {
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f7f8fc;
        }

        th {
            padding: 13px 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border);
        }

        th:first-child {
            width: 44px;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fafbff;
        }

        .page-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .page-btn.active {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            padding: 18px 0 4px;
        }



        /* MAIN */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* CARDS (Top Stats) */
        .card-box {
            background: var(--card);
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            font-weight: 600;
        }

        .cardd {
            padding: 15px;
        }

        .card1 {
            border-left: 5px solid #2f9e44;
        }

        .card2 {
            border-left: 5px solid #f59f00;
        }

        .card3 {
            border-left: 5px solid #e03131;
        }

        .card4 {
            border-left: 5px solid #1971c2;
        }

        /* TABLE */
        /* .table {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .table thead {
            background: #f7f8fc;
        }

        .table th {
            font-size: 12px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .table td {
            vertical-align: middle;
        }

        .table tr:hover {
            background: #fafbff;
        } */

        /* STATUS */
        .status-active {
            background: #ebfbee;
            color: #2f9e44;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* BUTTONS */

        .btn-suspend:hover {
            filter: brightness(1.1);
        }

        .btn-ban:hover {
            filter: brightness(1.1);
        }

        .btn-view:hover {
            filter: brightness(1.1);
        }

        .btn {
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-view {
            color: #1971c2;
            color: #fff;
        }

        .btn-suspend {
            color: #f59f00;
            color: #fff;
        }

        .btn-ban {
            color: #e03131;
            color: #fff;
        }

        /* MODAL */
        .modal-content {
            border-radius: 12px;
        }

        /* .modal {
            background: var(--card);
            border-radius: 14px;
            box-shadow: var(--shadow-lg);
            width: 760px;
            max-width: 95vw;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideUp 0.22s ease;
        } */

        /* .modal-close {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: none;
            background: var(--bg);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            font-size: 16px;
            transition: background 0.15s;
        }

        .modal-close:hover {
            background: var(--border);
        } */
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="logo-icon"><i class="fa-solid fa-store"></i></div>
            <span>Admin Panel</span>
        </div>

        <nav class="sidebar-nav">
            <a class="nav-item" href="{{ route('admin') }}"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
            <a class="nav-item" href="{{ route('productsapproval') }}"><i class=" fa-solid fa-box-open "></i> Product Approvals <span class="nav-badge">12</span></a>
            <a class="nav-item active" href="{{ route('admin.sellers') }}"><i class=" fa-solid fa-user-check"></i> Seller Verification</a>
            <a class="nav-item" href="{{ route('orders') }}"><i class="fa-solid fa-file-lines"></i> Orders </a>
            <a class="nav-item" href="#"><i class=" fa-solid fa-chart-bar"></i> Reports</a>
        </nav>

        <div class="sidebar-bottom">
            <!-- <a class="nav-item" href="#"><i class="fa-solid fa-gear"></i> Settings</a> -->
            <a class="nav-item" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </aside>


    <!-- <div class="sidebar">
        <h4>Admin Dashboard</h4>

        <a class="nav-link">dashboard</a>
        <a class="nav-link">Pending Products</a>
        <a href="{{ route('admin.sellers') }}" class="nav-link active">Sellers</a>
        <a class="nav-link">orders</a>
        <a class="nav-link">Reports</a>

        <div class="sidebar-bottom"> -->
    <!-- <a class="nav-item" href="#"><i class="fa-solid fa-gear"></i> Settings</a> -->
    <!-- <a class="nav-item" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </div> -->

    <div class="main">
        {{ $slot }}
    </div>



</body>

</html>