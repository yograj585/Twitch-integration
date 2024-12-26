<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yograj-test</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/pages/auth.css') }}">
    {{-- message toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <style>
        .header {
            background: #435ebe;
            color: #fff;
            padding: 0.5rem 1rem;
        }

        .navbar {
            padding: 0.5rem 1rem;
        }

        .navbar-brand {
            font-size: 1.75rem;
            font-weight: 700;
            color: #fff;
        }
        .navbar-brand:hover {
            color: #f8f9fa;
        }
        div#auth-center {
            margin-top: 5em;
        }
        .navbar-light .navbar-nav .nav-link {
            color:#fff;
        }
        .nav-link {
            color: #f8f9fa;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #e9ecef;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 30 30'%3E%3Cpath stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 7h20M5 15h20M5 23h20' /%3E%3C/svg%3E");
        }
        .dropdown-menu {
            background: #435ebe;
            border: none;
        }
        .dropdown-item {
            color: #f8f9fa;
        }

        .dropdown-item:hover {
            background: #435ebe;
            color: #fff;
        }

        .header .navbar-nav {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">Yograj Test</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Service 1</a>
                            <a class="dropdown-item" href="#">Service 2</a>
                            <a class="dropdown-item" href="#">Service 3</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    @yield('content')

    <!-- Optional JavaScript -->
    <script src="{{ URL::to('assets/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
