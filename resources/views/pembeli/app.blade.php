<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reztis Batik - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/logo-brand.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    @stack('styles')
    <style>
        :root {
            --primary-color: #8B4513;
            --primary-light: #B68D65;
            --primary-dark: #5D2906;
            --secondary-color: #D2B48C;
            --light-color: #F9F5F0;
            --dark-color: #3E2723;
            --gradient: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
        }

        /* Main Navigation */
        .navbar-container {
            position: sticky;
            top: 0;
            z-index: 1020;
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-dark);
        }

        .navbar-brand img {
            height: 40px;
            transition: all 0.3s ease;
        }

        /* Desktop Navigation */
        .desktop-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link-desktop {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            border-radius: 50px;
            color: var(--dark-color);
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link-desktop:hover {
            color: var(--primary-dark);
            background-color: rgba(139, 69, 19, 0.05);
        }

        .nav-link-desktop.active {
            background: var(--gradient);
            color: white;
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.2);
        }

        .nav-link-desktop i {
            font-size: 1rem;
        }

        /* Mobile Navigation */
        .mobile-nav-container {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.08);
            z-index: 1010;
            padding: 0.5rem 0;
        }

        .mobile-nav {
            display: flex;
            justify-content: space-around;
        }

        .nav-link-mobile {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0.5rem;
            color: var(--dark-color);
            font-size: 0.75rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 8px;
            width: 20%;
        }

        .nav-link-mobile i {
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        .nav-link-mobile.active {
            color: var(--primary-color);
        }

        .nav-link-mobile.active i {
            transform: scale(1.1);
        }

        /* Main content */
        main {
            padding: 1.5rem 0;
            min-height: calc(100vh - 120px);
        }

        .container-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .nav-link-desktop {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .desktop-nav {
                display: none;
            }

            .mobile-nav-container {
                display: block;
            }

            main {
                padding-bottom: 4rem;
            }
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Desktop Navigation -->
    <div class="navbar-container fade-in">
        <div class="container-main">
            <nav class="navbar navbar-expand-lg navbar-light py-2  d-flex justify-content-center align-items-center d-none d-lg-block">
                <div class="desktop-nav">
                    <a class="nav-link-desktop @if (Request::routeIs('index')) active @endif" href="{{ route('index') }}">
                        <i class="fas fa-home"></i>
                        <span>Beranda</span>
                    </a>
                    <a class="nav-link-desktop @if (Request::routeIs('pembeli.profile.*')) active @endif" 
                       href="{{ route('pembeli.profile.index') }}">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                    <a class="nav-link-desktop @if (Request::routeIs('pembeli.pesanan.*')) active @endif" 
                       href="{{ route('pembeli.pesanan.index') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Pesanan</span>
                    </a>
                    <a class="nav-link-desktop @if (Request::routeIs('pembeli.layanan-edukasi.*')) active @endif" 
                       href="{{ route('pembeli.layanan-edukasi.index') }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Booking</span>
                    </a>
                    <a class="nav-link-desktop @if (Request::routeIs('pembeli.shipping-address.*')) active @endif" 
                       href="{{ route('pembeli.shipping-address.index') }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Alamat</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Page Content -->
    <main class="fade-in">
        <div class="container-main">
            @yield('content')
        </div>
    </main>

    <!-- Mobile Navigation -->
    <div class="mobile-nav-container fade-in">
        <div class="mobile-nav">
            <a class="nav-link-mobile @if (Request::routeIs('index')) active @endif" href="{{ route('index') }}">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>
            <a class="nav-link-mobile @if (Request::routeIs('pembeli.profile.*')) active @endif" 
               href="{{ route('pembeli.profile.index') }}">
                <i class="fas fa-user"></i>
                <span>Profil</span>
            </a>
            <a class="nav-link-mobile @if (Request::routeIs('pembeli.pesanan.*')) active @endif" 
               href="{{ route('pembeli.pesanan.index') }}">
                <i class="fas fa-clipboard-list"></i>
                <span>Pesanan</span>
            </a>
            <a class="nav-link-mobile @if (Request::routeIs('pembeli.layanan-edukasi.*')) active @endif" 
               href="{{ route('pembeli.layanan-edukasi.index') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Booking</span>
            </a>
            <a class="nav-link-mobile @if (Request::routeIs('pembeli.shipping-address.*')) active @endif" 
               href="{{ route('pembeli.shipping-address.index') }}">
                <i class="fas fa-map-marker-alt"></i>
                <span>Alamat</span>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>