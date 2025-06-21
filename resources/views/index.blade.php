<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reztis Batik Jember - Batik Premium dengan Sentuhan Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #8B4513;
            --primary-dark: #5D2906;
            --primary-light: #B68D65;
            --secondary-color: #D2B48C;
            --accent-color: #A0522D;
            --light-color: #F9F5F0;
            --dark-color: #3E2723;
            --text-color: #333333;
            --text-light: #777777;
            --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        }

        @font-face {
            font-family: 'Sriwedari';
            src: url('font/Sriwedari.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        h1,
        h3,
        h4,
        h6 {
            font-family: 'Playfair Display', serif;
            color: var(--dark-color);
            font-weight: 600;
        }

        h2 {
            font-family: 'Sriwedari', sans-serif;
            color: var(--dark-color);
            font-size: 3rem;
            font-weight: 700;
        }

        h5 {
            color: var(--light-color);
        }

        .text-primary {
            color: var(--primary-color) !important;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            padding: 20px 0;
            transition: all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .navbar.scrolled {
            padding: 12px 0;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-family: 'Sriwedari', sans-serif;
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.8rem;
            letter-spacing: 1px;
        }

        .navbar-brand span {
            color: var(--dark-color);
        }

        .nav-link {
            color: var(--dark-color) !important;
            font-weight: 500;
            margin: 0 12px;
            position: relative;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            bottom: -2px;
            left: 0;
            transition: width 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .nav-link:hover:after,
        .nav-link.active:after {
            width: 100%;
        }

        .nav-cta {
            background: var(--gradient-primary);
            color: white !important;
            border-radius: 30px;
            padding: 8px 20px !important;
            margin-left: 15px;
            transition: all 0.4s ease;
        }

        .nav-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(139, 69, 19, 0.2);
        }

        .nav-cta:after {
            display: none;
        }

        /* Enhanced Dropdown Styles */
        .dropdown-menu {
            min-width: 220px;
            padding: 0;
            margin-top: 10px;
            transition: all 0.3s ease;
            transform-origin: top right;
        }

        .dropdown-item {
            padding: 0.75rem 1.5rem;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .dropdown-item:hover {
            background-color: rgba(139, 69, 19, 0.05);
            border-left: 3px solid var(--primary-color);
            padding-left: 1.75rem;
        }

        .dropdown-item:active {
            background-color: rgba(139, 69, 19, 0.1);
        }

        .dropdown-divider {
            margin: 0.25rem 0;
            border-color: rgba(0, 0, 0, 0.05);
        }

        /* Animation for dropdown */
        .dropdown-menu.show {
            animation: fadeInDropdown 0.3s ease forwards;
        }

        @keyframes fadeInDropdown {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* User profile in dropdown */
        .dropdown-toggle::after {
            vertical-align: 0.2em;
            margin-left: 0.5em;
        }

        /* Badge styling */
        .badge {
            margin-left: 20px;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .hero-section {
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.malkelapagading.com/tenant/Batik-Kerisfoto1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            height: 100vh;
            padding: 180px 0 150px;
            text-align: center;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-section:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, var(--light-color), transparent);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-family: 'Sriwedari', sans-serif;
            color: #fff;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 15px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-scroll {
            position: absolute;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0) translateX(-50%);
            }

            40% {
                transform: translateY(-20px) translateX(-50%);
            }

            60% {
                transform: translateY(-10px) translateX(-50%);
            }
        }

        .btn {
            padding: 12px 28px;
            border-radius: 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--primary-dark) 100%);
            opacity: 0;
            z-index: -1;
            transition: opacity 0.4s ease;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
        }

        .btn-primary:hover:before {
            opacity: 1;
        }

        .btn-outline-primary {
            border: 2px solid var(--light-color);
            color: var(--light-color);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: var(--light-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
            border: none;
        }

        .section {
            padding: 100px 0;
            position: relative;
        }

        .section-title {
            position: relative;
            margin-bottom: 60px;
            text-align: center;
        }

        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .section-title .subtitle {
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--gradient-primary);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .product-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.5s cubic-bezier(0.645, 0.045, 0.355, 1);
            margin-bottom: 30px;
            background: white;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .product-img-container {
            height: 300px;
            overflow: hidden;
            position: relative;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .product-card:hover .product-img {
            transform: scale(1.1);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--gradient-primary);
            color: white;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
        }

        .product-content {
            padding: 25px;
        }

        .product-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-color);
            font-size: 1.2rem;
        }

        .product-description {
            color: var(--text-light);
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .product-price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.3rem;
        }

        .product-old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
            margin-left: 8px;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .product-rating {
            color: #FFC107;
            font-size: 0.9rem;
        }

        .product-btn {
            background: var(--gradient-primary);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .product-btn:hover {
            transform: scale(1.1) rotate(10deg);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        }

        .about-section {
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        .about-img {
            height: 400px;
            width: auto;
            border-radius: 15px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            transition: transform 0.8s cubic-bezier(0.645, 0.045, 0.355, 1);
            position: relative;
            z-index: 1;
        }

        .about-img:hover {
            transform: scale(1.03);
        }

        .about-content {
            position: relative;
            z-index: 1;
        }

        .about-features {
            margin-top: 30px;
        }

        .feature-item {
            display: flex;
            margin-bottom: 20px;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .feature-text h5 {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .feature-text p {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .testimonial-section {
            background-color: var(--light-color);
            position: relative;
        }

        .testimonial-section:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M1200,0V120H0V0Z" fill="white"></path></svg>');
            background-size: cover;
            z-index: 1;
        }

        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin: 15px;
            transition: all 0.5s cubic-bezier(0.645, 0.045, 0.355, 1);
            position: relative;
            z-index: 2;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card:before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 5rem;
            font-family: 'Playfair Display', serif;
            color: rgba(139, 69, 19, 0.1);
            line-height: 1;
            z-index: 0;
        }

        .testimonial-content {
            position: relative;
            z-index: 1;
        }

        .testimonial-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--secondary-color);
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .testimonial-text {
            font-style: italic;
            color: var(--text-color);
            margin-bottom: 20px;
            position: relative;
        }

        .testimonial-text:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary-color);
        }

        .testimonial-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .testimonial-role {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .contact-section {
            background-color: white;
        }

        .contact-info {
            background: var(--gradient-primary);
            color: white;
            padding: 40px;
            border-radius: 15px;
            height: 100%;
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.2);
        }

        .contact-info-item {
            display: flex;
            margin-bottom: 30px;
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .contact-text h4 {
            margin-bottom: 5px;
            font-weight: 600;
        }

        .contact-text p {
            margin-bottom: 0;
            opacity: 0.9;
        }

        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 10px 15px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
        }

        textarea.form-control {
            height: auto;
            min-height: 150px;
        }

        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 80px 0 30px;
            position: relative;
        }

        .footer-logo {
            font-family: 'Sriwedari', sans-serif;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: inline-block;
            color: var(--light-color);
            text-decoration: none;
        }

        .footer-about {
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .footer-links h5 {
            font-size: 1.2rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-links h5:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 2px;
            background: var(--secondary-color);
            bottom: 0;
            left: 0;
        }

        .footer-links ul {
            list-style: none;
            padding-left: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-icons {
            margin-top: 30px;
        }

        .social-icons a {
            display: inline-flex;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--secondary-color);
            color: var(--dark-color);
            transform: translateY(-5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            margin-top: 50px;
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 5px 20px rgba(139, 69, 19, 0.3);
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
            z-index: 999;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 1199.98px) {
            .hero-title {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 991.98px) {
            .section {
                padding: 80px 0;
            }

            .hero-title {
                font-size: 3rem;
            }

            .hero-subtitle {
                font-size: 1.3rem;
            }

            .navbar-brand {
                font-size: 1.5rem;
            }

            .nav-cta {
                margin-left: 0;
                margin-top: 10px;
            }
        }

        @media (max-width: 767.98px) {
            .section {
                padding: 60px 0;
            }

            .hero-section {
                padding: 150px 0 120px;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .product-img-container {
                height: 250px;
            }
        }

        @media (max-width: 575.98px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="text-primary">Reztis</span><span> Batik</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    @auth('pembeli')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-cta" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div>
                                        {{ Auth::guard('pembeli')->user()->nama }}
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="navbarDropdown"
                                style="border: none; border-radius: 10px; overflow: hidden;">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-3"
                                        href="{{ route('pembeli.keranjang.index') }}">
                                        <i class="fas fa-shopping-cart me-2 text-primary"></i>
                                        <span>Keranjang Saya</span>
                                        <span class="badge bg-primary rounded-pill ms-2">0</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-3"
                                        href="{{ route('pembeli.pesanan.index') }}">
                                        <i class="fas fa-clipboard-list me-2 text-primary"></i>
                                        <span>Pesanan Saya</span>
                                        <span class="badge bg-primary rounded-pill ms-auto ml-2">0</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider my-1">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-3" href="#" id="logout-btn">
                                        <i class="fas fa-sign-out-alt me-2 text-danger"></i>
                                        <span class="text-danger">Logout</span>
                                    </a>
                                    <form id="logout-form" method="POST" action="{{ route('pembeli.logout') }}">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item ms-lg-3">
                            <a href="{{ route('pembeli.login') }}" class="nav-link nav-cta">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center hero-content">
                    <h1 class="hero-title animate__animated animate__fadeInDown" data-aos="fade-down"
                        data-aos-duration="1000">Batik Premium Khas Jember</h1>
                    <p class="hero-subtitle animate__animated animate__fadeIn animate__delay-1s" data-aos="fade-up"
                        data-aos-duration="1000" data-aos-delay="300">Warisan budaya Indonesia dengan sentuhan modern
                        dan kualitas terbaik</p>
                    <div class="mt-4 animate__animated animate__fadeIn animate__delay-2s" data-aos="fade-up"
                        data-aos-duration="1000" data-aos-delay="600">
                        <a href="#produk" class="btn btn-primary btn-lg me-2">Lihat Koleksi</a>
                        <a href="#tentang" class="btn btn-outline-primary btn-lg">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#produk" class="hero-scroll animate__animated animate__fadeIn animate__delay-3s">
            <i class="fas fa-chevron-down text-white" style="font-size: 1.5rem;"></i>
        </a>
    </section>

    <!-- Produk Section -->
    <section id="produk" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Koleksi Eksklusif</h2>
                <p class="subtitle">Temukan batik berkualitas tinggi dengan motif tradisional dan modern</p>
            </div>
            <div class="row">
                <!-- Produk 1 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="product-img-container">
                            <img src="{{ asset('img/batik-1.jpg') }}" class="product-img" alt="Batik Mega Mendung">
                            <div class="product-badge">Terlaris</div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title">Batik Tulis Motif Dewa Ruci</h5>
                            <p class="product-description">Motif awan dengan gradasi warna yang indah</p>
                            <div class="product-actions">
                                <div>
                                    <span class="product-price">Rp 250.000</span>
                                </div>
                                <button class="product-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <div class="product-stock">
                                <span class="stock-label">Stok Tersedia:</span>
                                <span class="stock-quantity">15</span>
                            </div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">(28)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produk 2 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="product-img-container">
                            <img src="{{ asset('img/batik-2.jpg') }}" class="product-img" alt="Batik Parang">
                            <div class="product-badge">Baru</div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title">Batik Tulis Motif Sekarjagat Pasadeng</h5>
                            <p class="product-description">Motif tradisional dengan sentuhan modern</p>
                            <div class="product-actions">
                                <div>
                                    <span class="product-price">Rp 320.000</span>
                                </div>
                                <button class="product-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <div class="product-stock">
                                <span class="stock-label">Stok Tersedia:</span>
                                <span class="stock-quantity">8</span>
                            </div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ms-1">(15)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produk 3 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-img-container">
                            <img src="{{ asset('img/batik-3.jpg') }}" class="product-img" alt="Batik Kawung">
                            <div class="product-badge">Diskon 15%</div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title">Batik Tulis Motif Wanito Kinasih</h5>
                            <p class="product-description">Motif geometris klasik dengan makna filosofis</p>
                            <div class="product-actions">
                                <div>
                                    <span class="product-price">Rp 280.000</span>
                                </div>
                                <button class="product-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <div class="product-stock">
                                <span class="stock-label">Stok Tersedia:</span>
                                <span class="stock-quantity">20</span>
                            </div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-1">(42)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produk 4 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="product-img-container">
                            <img src="{{ asset('img/batik-4.jpg') }}" class="product-img" alt="Batik Sogan">
                        </div>
                        <div class="product-content">
                            <h5 class="product-title">Batik Tulis Motif Teobroma Cacao</h5>
                            <p class="product-description">Warna cokelat alami dengan motif tradisional</p>
                            <div class="product-actions">
                                <div>
                                    <span class="product-price">Rp 200.000</span>
                                </div>
                                <button class="product-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <div class="product-stock">
                                <span class="stock-label">Stok Tersedia:</span>
                                <span class="stock-quantity">5</span>
                            </div>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">(36)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
                <a href="#" class="btn btn-primary px-5">Lihat Semua Produk</a>
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="section about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipOaV7CC5GtpuEI3KzYsY8-QF34BL_ekegH8j2iu=s1360-w1360-h1020-rw"
                        alt="Proses Pembuatan Batik" class="img-fluid about-img">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="text-start">
                        <h2>Tentang Reztis Batik</h2>
                    </div>
                    <p>UMKM Reztis Batik Jember didirikan pada tahun 2010 dengan misi melestarikan seni batik
                        tradisional sambil mengembangkan motif-motif baru yang sesuai dengan perkembangan zaman.</p>
                    <p>Kami menggunakan bahan-bahan berkualitas tinggi dan pewarna alami untuk menciptakan batik yang
                        tidak hanya indah tetapi juga nyaman dipakai.</p>
                    <div class="about-features">
                        <div class="feature-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="feature-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="feature-text">
                                <h5 class="text-primary">Kualitas Premium</h5>
                                <p>Bahan katun prima dengan pewarna tahan luntur</p>
                            </div>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-icon">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <div class="feature-text">
                                <h5 class="text-primary">Pengrajin Lokal</h5>
                                <p>Dibuat oleh pengrajin batik berpengalaman</p>
                            </div>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div class="feature-text">
                                <h5 class="text-primary">Ramah Lingkungan</h5>
                                <p>Menggunakan pewarna alami yang eco-friendly</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="#kontak" class="btn btn-primary">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section id="testimoni" class="section testimonial-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Apa Kata Pelanggan</h2>
                <p class="subtitle">Testimoni dari pelanggan yang sudah membeli produk kami</p>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="testimonial-content text-center">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="testimonial-img"
                                alt="Testimoni 1">
                            <div class="testimonial-text">
                                "Kualitas batiknya sangat bagus, motifnya unik dan tidak mudah luntur. Pengiriman juga
                                cepat. Sangat recommended!"
                            </div>
                            <h5 class="testimonial-name">Sarah Wijaya</h5>
                            <p class="testimonial-role">Pembeli</p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-content text-center">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="testimonial-img"
                                alt="Testimoni 2">
                            <div class="testimonial-text">
                                "Saya sering membeli batik dari Reztis untuk hadiah bisnis. Klien sangat menyukainya
                                karena kualitas dan kemasannya yang premium."
                            </div>
                            <h5 class="testimonial-name">Budi Santoso</h5>
                            <p class="testimonial-role">Pengusaha</p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-content text-center">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="testimonial-img"
                                alt="Testimoni 3">
                            <div class="testimonial-text">
                                "Motif-motif dari Reztis Batik sangat inspiratif dan unik. Saya sering menggunakannya
                                sebagai bahan untuk koleksi fashion saya."
                            </div>
                            <h5 class="testimonial-name">Dewi Kartika</h5>
                            <p class="testimonial-role">Desainer</p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="section contact-section" style="background-color: #F9F5F0;">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Hubungi Kami</h2>
                <p class="subtitle">Kami siap membantu Anda dengan segala pertanyaan tentang produk batik kami</p>
            </div>

            <div class="row g-5">
                <!-- Contact Information Card -->
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info-card p-4 p-lg-5 h-100"
                        style="
                    background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
                    border-radius: 20px;
                    color: white;
                    box-shadow: 0 20px 40px rgba(139, 69, 19, 0.2);
                    position: relative;
                    overflow: hidden;
                ">
                        <div class="position-absolute top-0 end-0 p-3">
                            <div
                                style="
                            width: 100px;
                            height: 100px;
                            background: rgba(255,255,255,0.1);
                            border-radius: 50%;
                            position: absolute;
                            top: -30px;
                            right: -30px;
                        ">
                            </div>
                        </div>

                        <h3 class="mb-4 position-relative" style="font-weight: 700; color: var(--light-color)">
                            Informasi Kontak</h3>

                        <div class="contact-info-item d-flex justify-content-center align-items-center mb-4">
                            <div class="contact-icon me-4"
                                style="
                            width: 50px;
                            height: 50px;
                            background: rgba(255,255,255,0.2);
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 1.2rem;
                            flex-shrink: 0;
                        ">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h5 style="font-weight: 600; margin-bottom: 5px;">Lokasi Kami</h5>
                                <p style="opacity: 0.9; margin-bottom: 0;">Jl. Argopuro, Tegalsari, Kec. Ambulu,
                                    Kabupaten Jember, Jawa Timur 68172
                                </p>
                            </div>
                        </div>

                        <div class="contact-info-item d-flex mb-4">
                            <div class="contact-icon me-4"
                                style="
                            width: 50px;
                            height: 50px;
                            background: rgba(255,255,255,0.2);
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 1.2rem;
                            flex-shrink: 0;
                        ">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h5 style="font-weight: 600; margin-bottom: 5px;">Telepon/WhatsApp</h5>
                                <p style="opacity: 0.9; margin-bottom: 0;">(0331) 1234567</p>
                            </div>
                        </div>

                        <div class="contact-info-item d-flex mb-4">
                            <div class="contact-icon me-4"
                                style="
                            width: 50px;
                            height: 50px;
                            background: rgba(255,255,255,0.2);
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 1.2rem;
                            flex-shrink: 0;
                        ">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h5 style="font-weight: 600; margin-bottom: 5px;">Email</h5>
                                <p style="opacity: 0.9; margin-bottom: 0;">info@reztisbatik.com</p>
                            </div>
                        </div>

                        <div class="contact-info-item d-flex">
                            <div class="contact-icon me-4"
                                style="
                            width: 50px;
                            height: 50px;
                            background: rgba(255,255,255,0.2);
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 1.2rem;
                            flex-shrink: 0;
                        ">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-text">
                                <h5 style="font-weight: 600; margin-bottom: 5px;">Jam Operasional</h5>
                                <p style="opacity: 0.9; margin-bottom: 0;">Senin - Sabtu: 08.00–21.00 WIB</p>
                            </div>
                        </div>

                        <div class="mt-5 pt-3">
                            <h5 class="mb-3">Ikuti Kami</h5>
                            <div class="social-icons">
                                <a href="#" class="me-2"
                                    style="
                                display: inline-flex;
                                width: 40px;
                                height: 40px;
                                background: rgba(255,255,255,0.2);
                                color: white;
                                border-radius: 50%;
                                align-items: center;
                                justify-content: center;
                                transition: all 0.3s ease;
                            "><i
                                        class="fab fa-instagram"></i></a>
                                <a href="#" class="me-2"
                                    style="
                                display: inline-flex;
                                width: 40px;
                                height: 40px;
                                background: rgba(255,255,255,0.2);
                                color: white;
                                border-radius: 50%;
                                align-items: center;
                                justify-content: center;
                                transition: all 0.3s ease;
                            "><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="#" class="me-2"
                                    style="
                                display: inline-flex;
                                width: 40px;
                                height: 40px;
                                background: rgba(255,255,255,0.2);
                                color: white;
                                border-radius: 50%;
                                align-items: center;
                                justify-content: center;
                                transition: all 0.3s ease;
                            "><i
                                        class="fab fa-whatsapp"></i></a>
                                <a href="#"
                                    style="
                                display: inline-flex;
                                width: 40px;
                                height: 40px;
                                background: rgba(255,255,255,0.2);
                                color: white;
                                border-radius: 50%;
                                align-items: center;
                                justify-content: center;
                                transition: all 0.3s ease;
                            "><i
                                        class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="contact-form p-4 p-lg-5 h-100"
                        style="
                    background: white;
                    border-radius: 20px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
                ">
                        <h3 class="mb-4" style="font-weight: 700;">Kirim Pesan</h3>
                        <p class="mb-4" style="color: #777;">Isi form berikut dan kami akan segera menghubungi Anda
                        </p>

                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Nama Lengkap"
                                            style="
                                        height: 55px;
                                        border-radius: 10px;
                                        border: 1px solid #e0e0e0;
                                        padding: 10px 15px;
                                    ">
                                        <label for="name">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Alamat Email"
                                            style="
                                        height: 55px;
                                        border-radius: 10px;
                                        border: 1px solid #e0e0e0;
                                        padding: 10px 15px;
                                    ">
                                        <label for="email">Alamat Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" class="form-control" id="subject" placeholder="Subjek"
                                    style="
                                height: 55px;
                                border-radius: 10px;
                                border: 1px solid #e0e0e0;
                                padding: 10px 15px;
                            ">
                                <label for="subject">Subjek</label>
                            </div>

                            <div class="form-floating mt-3">
                                <textarea class="form-control" id="message" placeholder="Pesan Anda"
                                    style="
                                height: 150px;
                                border-radius: 10px;
                                border: 1px solid #e0e0e0;
                                padding: 15px;
                            "></textarea>
                                <label for="message">Pesan Anda</label>
                            </div>

                            <div class="mt-4 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary px-4 py-3"
                                    style="
                                background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
                                border: none;
                                font-weight: 600;
                                letter-spacing: 0.5px;
                                border-radius: 10px;
                            ">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                </button>
                            </div>
                        </form>

                        <div class="mt-4 pt-3" style="border-top: 1px solid #eee;">
                            <p style="font-size: 0.9rem; color: #777; margin-bottom: 0;">
                                <i class="fas fa-lock me-2 text-primary"></i> Data Anda aman dan tidak akan dibagikan
                                ke pihak lain
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Embed -->
            <div class="row mt-5">
                <div class="col-12" data-aos="fade-up">
                    <div
                        style="
                    border-radius: 20px;
                    overflow: hidden;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                    height: 400px; background: #eee; position: relative;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d202.17772725127884!2d113.60020468833449!3d-8.346939136221485!2m2!1f32.78965092069119!2f45!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x2dd69b668bbd6aef%3A0x38c76624b86f8b92!2sRezti&#39;s%20Batik%20(Rumah%20Produksi%20Batik%20Jember)!5e1!3m2!1sid!2sid!4v1750522161328!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                        <div
                            style="
                        position: absolute;
                        bottom: 20px;
                        right: 20px;
                        background: white;
                        padding: 10px 15px;
                        border-radius: 10px;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                    ">
                            <a href="https://maps.app.goo.gl/AJro4qsPbmBnoTwb6" target="_blank"
                                class="text-decoration-none">
                                <i class="fas fa-directions me-2 text-primary"></i> Dapatkan Petunjuk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <a href="#" class="footer-logo">Reztis Batik</a>
                    <p class="footer-about">Menjual batik berkualitas dengan motif tradisional dan modern. Melestarikan
                        warisan budaya Indonesia melalui karya batik yang indah.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/reztisbatiktegalsari/" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <div class="footer-links">
                        <h5>Link Cepat</h5>
                        <ul>
                            <li><a href="#home">Beranda</a></li>
                            <li><a href="#produk">Produk</a></li>
                            <li><a href="#tentang">Tentang</a></li>
                            <li><a href="#testimoni">Testimoni</a></li>
                            <li><a href="#kontak">Kontak</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                    <div class="footer-links">
                        <h5>Produk</h5>
                        <ul>
                            <li><a href="#">Batik Tulis</a></li>
                            <li><a href="#">Batik Cap</a></li>
                            <li><a href="#">Batik Printing</a></li>
                            <li><a href="#">Baju Batik</a></li>
                            <li><a href="#">Kain Batik</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-links">
                        <h5>Layanan</h5>
                        <ul>
                            <li><a href="#">Custom Batik</a></li>
                            <li><a href="#">Reseller Program</a></li>
                            <li><a href="#">Pembelian Grosir</a></li>
                            <li><a href="#">Pengiriman</a></li>
                            <li><a href="#">Kebijakan Pengembalian</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="mb-0">&copy; 2025 UMKM Reztis Batik Jember. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="mb-0">Made with <i class="fas fa-heart text-danger"></i> in Jember, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert for logout confirmation
        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.getElementById('logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Konfirmasi Logout',
                        text: 'Apakah Anda yakin ingin keluar?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#8B4513',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Logout',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        customClass: {
                            popup: 'animated fadeIn'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form').submit();
                        }
                    });
                });
            }
        });

        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Back to top button
        const backToTopButton = document.querySelector('.back-to-top');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        });

        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });

                    // Update active nav link
                    document.querySelectorAll('.nav-link').forEach(link => {
                        link.classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });

        // Close mobile menu when clicking a link
        const navLinks = document.querySelectorAll('.nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });
        });
    </script>
</body>

</html>
