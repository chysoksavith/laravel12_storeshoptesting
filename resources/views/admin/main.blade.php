<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #343a40;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .navbar {
            position: fixed;
            width: calc(100% - 250px);
            z-index: 1000;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 60px;
            }

            .sidebar a span {
                display: none;
            }

            .content {
                margin-left: 60px;
                width: calc(100% - 60px);
            }

            .navbar {
                width: calc(100% - 60px);
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('categories.index') }}"><i class="bi bi-box-seam"></i> <span>Categories</span></a>
        <a href="#"><i class="bi bi-box-seam"></i> <span>Products</span></a>
        <a href="#"><i class="bi bi-cart"></i> <span>Orders</span></a>
        <a href="#"><i class="bi bi-person"></i> <span>Users</span></a>
        <a href="#"><i class="bi bi-gear"></i> <span>Settings</span></a>
        <a href="#"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome, Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container py-4 mt-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

</body>

</html>
