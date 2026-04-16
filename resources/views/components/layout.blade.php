<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(#1e3c72, #2a5298);
            color: white;
            padding: 20px;
        }

        .sidebar .nav-link {
            color: #cfd8dc;
            margin: 10px 0;
        }

        .sidebar .active {
            background: #4b79c9;
            border-radius: 8px;
            padding: 8px;
        }

        .main {
            margin-left: 260px;
            padding: 20px;
        }

        .card1 {
            background-color: green;
        }

        .card2 {
            background-color: orange;
        }

        .card3 {
            background-color: red;
        }

        .card4 {
            background-color: blue;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4>Admin Dashboard</h4>

        <a class="nav-link">dashboard</a>
        <a class="nav-link">Pending Products</a>
        <a href="{{ route('admin.sellers') }}" class="nav-link">Sellers</a>
        <a class="nav-link">orders</a>
        <a class="nav-link">Reports</a>
    </div>

    <div class="main">
        {{ $slot }}
    </div>

</body>

</html>