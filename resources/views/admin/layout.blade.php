<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Forest Fairy Honey</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --gold: #D4A843;
            --gold-dark: #B88A2A;
            --brown: #7B5C3A;
            --dark: #2C1810;
            --cream: #FAF7F2;
            --white: #FFFFFF;
            --text: #3D2B1A;
            --text-muted: #7A6552;
            --border: #E5E1DA;
            --success: #7EB87A;
            --radius: 12px;
            --shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--cream);
            color: var(--text);
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--dark);
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }

        .sidebar-header {
            padding: 32px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--gold);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-nav {
            padding: 24px 16px;
            flex-grow: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: var(--radius);
            margin-bottom: 4px;
            transition: all 0.2s;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .nav-item i {
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 24px;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            margin-left: 260px;
            padding: 40px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin: 0;
        }

        /* Cards & Tables */
        .card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 24px;
            margin-bottom: 24px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 16px;
            border-bottom: 2px solid var(--border);
            color: var(--text-muted);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid var(--border);
            font-size: 0.95rem;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        .status-pending { background: #FFF9E6; color: #D4A843; }
        .status-paid { background: #E6F7ED; color: #7EB87A; }
        .status-shipped { background: #E6F3FF; color: #3182CE; }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: var(--radius);
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--gold);
            color: var(--dark);
        }

        .btn-primary:hover {
            background: var(--gold-dark);
        }

        .btn-logout {
            color: rgba(243, 17, 17, 0.5);
            font-size: 0.85rem;
        }

        .btn-logout:hover {
            color: #FF6B6B;
        }

        @media (max-width: 768px) {
            .sidebar { width: 70px; }
            .sidebar-logo span, .nav-item span { display: none; }
            .main-content { margin-left: 70px; padding: 20px; }
        }
    </style>
    @yield('extra_css')
</head>
<body>
    @auth
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.orders.index') }}" class="sidebar-logo">
                <i class="fa-solid fa-leaf"></i>
                <span>FF Honey</span>
            </a>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.orders.index') }}" class="nav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="fa-solid fa-shopping-bag"></i>
                <span>Orders</span>
            </a>
            <a href="{{ route('admin.reviews.index') }}" class="nav-item {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                <i class="fa-solid fa-comment-dots"></i>
                <span>Reviews</span>
            </a>
            <!-- Link to site -->
            <a href="/" class="nav-item">
                <i class="fa-solid fa-eye"></i>
                <span>View Site</span>
            </a>
        </nav>
        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>
    @endauth

    <main class="main-content" style="{{ !Auth::check() ? 'margin-left: 0; width: 100%;' : '' }}">
        @yield('content')
    </main>
</body>
</html>
