<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-w: 240px;
            --bg: #f0f2f7;
            --sidebar-bg: #1e2433;
            --sidebar-active: #3b4b7c;
            --primary: #3b5bdb;
            --text: #1a1f36;
            --muted: #6b7280;
            --border: #e2e6f0;
            --card: #ffffff;
            --shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            --radius: 10px;
        }

        body {
            background: var(--bg);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-w);
            height: 100vh;
            position: fixed;
            background: var(--sidebar-bg);
            color: white;
            padding: 20px;
        }

        .sidebar h4 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, .7);
            margin: 10px 0;
            padding: 8px 12px;
            border-radius: 6px;
            transition: 0.2s;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, .08);
            color: #fff;
        }

        .sidebar .active {
            background: var(--sidebar-active);
            color: #fff !important;
        }

        /* MAIN */
        .main {
            margin-left: var(--sidebar-w);
            padding: 25px;
        }

        /* CARDS (Top Stats) */
        .card-box {
            background: var(--card);
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            font-weight: 600;
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
        .table {
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
        }

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
        .btn {
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-view {
            color: #1971c2;
        }

        .btn-suspend {
            color: #f59f00;
        }

        .btn-ban {
            color: #e03131;
        }

        /* MODAL */
        .modal-content {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4>Admin Dashboard</h4>

        <a class="nav-link">dashboard</a>
        <a class="nav-link">Pending Products</a>
        <a href="{{ route('admin.sellers') }}" class="nav-link active">Sellers</a>
        <a class="nav-link">orders</a>
        <a class="nav-link">Reports</a>
    </div>

    <div class="main">
        {{ $slot }}
    </div>

</body>

</html>