<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reztis Batik - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">
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
            --glass-effect: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        /* Modern Glass Navigation */
        .main-nav-container {
            position: sticky;
            top: 0;
            z-index: 1020;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            background-color: var(--glass-effect);
            border-bottom: 1px solid var(--glass-border);
            box-shadow: var(--shadow-sm);
        }

        .nav-tabs-wrapper {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .modern-nav-tabs {
            display: flex;
            gap: 0.5rem;
            border: none;
            position: relative;
            padding: 0.5rem 0;
        }

        .modern-nav-tabs .nav-item {
            position: relative;
        }

        .modern-nav-tabs .nav-link {
            color: var(--dark-color);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background-color: transparent;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            z-index: 1;
        }

        .modern-nav-tabs .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 50px;
            background: var(--gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .modern-nav-tabs .nav-link:hover {
            color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .modern-nav-tabs .nav-link:hover::before {
            opacity: 0.1;
        }

        .modern-nav-tabs .nav-link.active {
            color: white;
            transform: translateY(0);
            box-shadow: var(--shadow-md);
        }

        .modern-nav-tabs .nav-link.active::before {
            opacity: 1;
        }

        .modern-nav-tabs .nav-link i {
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .modern-nav-tabs .nav-link.active i {
            transform: scale(1.1);
        }

        /* Main content styling */
        main {
            padding-top: 2rem;
            min-height: calc(100vh - 120px);
        }

        .container-main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Common UI Elements */
        .glass-card {
            background: var(--glass-effect);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--glass-border);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .gradient-header {
            background: var(--gradient);
            color: white;
        }

        .btn-primary-custom {
            background: var(--gradient);
            border: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
            color: white;
        }

        .badge-custom {
            background-color: rgba(210, 180, 140, 0.3);
            color: var(--primary-dark);
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .nav-tabs-wrapper {
                padding: 0 1.5rem;
            }

            .modern-nav-tabs .nav-link {
                padding: 0.65rem 1.25rem;
                font-size: 0.9rem;
                gap: 0.5rem;
            }
        }

        @media (max-width: 768px) {
            .nav-tabs-wrapper {
                padding: 0 1rem;
                overflow-x: auto;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            .nav-tabs-wrapper::-webkit-scrollbar {
                display: none;
            }

            .modern-nav-tabs {
                width: max-content;
                padding-bottom: 1rem;
            }

            .modern-nav-tabs .nav-link {
                padding: 0.6rem 1rem;
                font-size: 0.85rem;
            }

            .modern-nav-tabs .nav-link i {
                font-size: 1rem;
            }

            .container-main {
                padding: 0 1.5rem;
            }
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Modern Glass Navigation -->
    <div class="main-nav-container fade-in d-flex align-items-center justify-content-center h-100">
        <div class="nav-tabs-wrapper">
            <ul class="nav modern-nav-tabs" id="modernNavTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link @if (Request::routeIs('index')) active @endif"
                        href="{{ route('index') }}">
                        <i class="fas fa-home-alt"></i>
                        <span>Kembali Ke Beranda</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link @if (Request::routeIs('pembeli.profile.*')) active @endif"
                        href="{{ route('pembeli.profile.index') }}">
                        <i class="fas fa-user-circle"></i>
                        <span>Profile Saya</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link @if (Request::routeIs('pembeli.pesanan.*')) active @endif"
                        href="{{ route('pembeli.pesanan.index') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Pesanan Saya</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link @if (Request::routeIs('pembeli.shipping-address.*')) active @endif"
                        href="{{ route('pembeli.shipping-address.index') }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Alamat Pengiriman</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Page Content -->
    <main class="fade-in">
        <div class="container-main">
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>
