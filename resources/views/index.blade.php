<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reztis Batik Jember - Batik Premium dengan Sentuhan Modern</title>
    <link rel="shortcut icon" href="{{ asset('img/logo-brand.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
            font-family: 'Poppins', sans-serif;
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
            padding: 8px 0;
            transition: all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .navbar .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
        }

        .navbar.scrolled {
            padding: 12px 0;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            display: flex;
            justify-content: center;
        }

        .nav-logo {
            width: auto;
            height: 75px;
            transition: height 0.3s ease;
            /* Animasi perubahan ukuran */
        }

        /* Untuk tablet */
        @media (max-width: 991.98px) {
            .nav-logo {
                height: 65px;
            }
        }

        /* Untuk mobile */
        @media (max-width: 767.98px) {
            .nav-logo {
                height: 55px;
            }
        }

        /* Untuk mobile kecil */
        @media (max-width: 575.98px) {
            .nav-logo {
                height: 45px;
            }
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
            border-radius: 50px;
            height: 3px;
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

        /* Improved Mobile Dropdown Styles */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background-color: rgba(255, 255, 255, 0.98);
                padding: 10px;
                border-radius: 10px;
                margin-top: 8px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }

            .navbar-nav {
                padding-top: 10px;
            }

            .nav-item {
                margin-bottom: 5px;
            }

            .nav-link {
                padding: 10px 15px !important;
                margin: 0 !important;
                border-radius: 8px;
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                background-color: rgba(139, 69, 19, 0.05);
            }

            .nav-link:after {
                display: none;
            }

            .nav-cta {
                margin-left: 0 !important;
                margin-top: 10px !important;
                display: inline-block;
                width: auto;
            }

            /* Mobile Dropdown Menu */
            .dropdown-menu {
                background-color: rgba(255, 255, 255, 0.9);
                border: none;
                box-shadow: none;
                margin-left: 15px;
                width: calc(100% - 30px);
                padding: 5px 0;
            }

            .dropdown-item {
                padding: 3px 6px;
                border-radius: 8px;
                margin: 3px 8px;
                background-color: rgba(139, 69, 19, 0.05);
            }

            .dropdown-item:hover {
                background-color: rgba(139, 69, 19, 0.1);
                padding-left: 10px;
            }

            .dropdown-divider {
                margin: 5px 15px;
            }

            /* Adjust dropdown toggle arrow */
            .dropdown-toggle::after {
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
            }
        }

        /* Improved Toggler Button */
        .navbar-toggler {
            border: none;
            padding: 8px 10px;
            font-size: 1.25rem;
            color: var(--dark-color);
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: none;
            position: relative;
            width: 24px;
            height: 2px;
            background-color: var(--dark-color);
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background-color: var(--dark-color);
            left: 0;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon::before {
            top: -8px;
        }

        .navbar-toggler-icon::after {
            top: 8px;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
            background-color: transparent;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::before {
            transform: rotate(45deg);
            top: 0;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::after {
            transform: rotate(-45deg);
            top: 0;
        }

        .hero-section {
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('img/background.jpg') }}');
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

        .hero-logo {
            max-width: 200px;
            width: 50%;
        }

        @media (min-width: 768px) {
            .hero-logo {
                max-width: 250px;
                width: 30%;
            }
        }

        @media (min-width: 992px) {
            .hero-logo {
                max-width: 300px;
                width: 25%;
            }
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
            border: 2px solid transparent;
        }

        .section {
            padding: 100px 0;
            position: relative;
            width: 100%;
            overflow-x: hidden;
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

        /* Step Card Styles */
        .step-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(139, 69, 19, 0.1);
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(139, 69, 19, 0.15);
        }

        .step-header {
            position: relative;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .step-number {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 30px;
            height: 30px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .step-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .step-body {
            padding: 20px;
            flex-grow: 1;
        }

        .step-body h5 {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        .step-body p {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .step-footer {
            padding: 0 20px 20px;
            margin-top: auto;
        }

        @media (max-width: 576px) {
            .step-card {
                flex-direction: column;
                text-align: center;
                padding-bottom: 10px;
            }

            .step-header {
                flex-direction: column;
                height: auto;
                padding-top: 20px;
            }

            .step-number {
                position: static;
                margin-bottom: 10px;
            }

            .step-icon {
                margin: 0 auto 10px;
            }

            .step-body {
                padding: 15px;
            }

            .step-footer {
                padding: 0 15px 15px;
            }
        }

        @media (max-width: 576px) {
            .step-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .step-number {
                width: 25px;
                height: 25px;
                font-size: 0.8rem;
                margin-left: 20px;
            }

            .step-body h5 {
                font-size: 1rem;
            }

            .step-body p {
                font-size: 0.85rem;
            }
        }

        /* Modal Styles */
        #purchaseFlowModal .modal-content {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 50px rgba(139, 69, 19, 0.2);
        }

        #purchaseFlowModal .modal-header {
            padding: 1.2rem 2rem;
            border-bottom: none;
        }

        #purchaseFlowModal .modal-title {
            font-weight: 700;
            font-size: 1.4rem;
        }

        Visual Timeline Styles .visual-timeline {
            position: relative;
            height: 100%;
        }

        .timeline-progress {
            position: absolute;
            left: 50px;
            top: 0;
            bottom: 0;
            width: 3px;
            z-index: 1;
        }

        #timelineProgress {
            height: 0%;
            transition: height 0.5s ease;
        }

        .timeline-step {
            position: relative;
            margin-bottom: 30px;
            z-index: 2;
            display: flex;
            align-items: center;
        }

        .timeline-step:last-child {
            margin-bottom: 0;
        }

        .step-marker {
            position: relative;
            width: 50px;
            flex-shrink: 0;
        }

        .marker-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            border: 3px solid rgba(139, 69, 19, 0.3);
            transition: all 0.3s ease;
        }

        .marker-line {
            position: absolute;
            left: 9px;
            top: 20px;
            width: 2px;
            height: 40px;
            background: rgba(139, 69, 19, 0.3);
        }

        .timeline-step:last-child .marker-line {
            display: none;
        }

        .timeline-step.active .marker-circle {
            border-color: var(--primary-color);
            background: var(--primary-color);
        }

        .timeline-step.completed .marker-circle {
            border-color: var(--primary-color);
            background: var(--primary-color);
        }

        .step-preview {
            padding: 12px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.1);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            flex-grow: 1;
        }

        .timeline-step.active .step-preview,
        .timeline-step.completed .step-preview {
            border-left: 3px solid var(--primary-color);
        }

        .step-preview i {
            font-size: 1.2rem;
            color: var(--primary-color);
            margin-right: 10px;
            width: 25px;
            text-align: center;
        }

        .step-preview span {
            font-weight: 600;
            color: var(--dark-color);
        }

        /* Step Content Styles */
        .step-content {
            display: none;
            height: 100%;
        }

        .step-content.active {
            display: block;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .step-header-modal .step-icon {
            width: 50px;
            height: 50px;
            background: rgba(139, 69, 19, 0.1);
            color: var(--primary-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .step-body-modal p {
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .step-body-modal ul {
            padding-left: 20px;
        }

        .step-body-modal ul li {
            margin-bottom: 8px;
        }

        .step-body-modal ol {
            padding-left: 20px;
        }

        .step-body-modal ol li {
            margin-bottom: 8px;
        }

        /* Navigation Controls */
        .step-navigation {
            padding-top: 20px;
        }

        .step-indicator {
            font-weight: 600;
            color: var(--text-light);
        }

        .step-indicator .current-step {
            color: var(--primary-color);
            font-weight: 700;
        }

        .btn-outline-primary-step {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary-step:hover {
            background: var(--primary-color);
            color: var(--light-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
            border: 2px solid transparent;
        }

        /* Responsive Styles */
        @media (max-width: 991.98px) {
            #purchaseFlowModal .modal-dialog {
                margin: 1rem auto;
            }

            .visual-timeline {
                display: none;
            }

            .step-body-modal {
                padding-left: 0;
            }
        }

        @media (max-width: 575.98px) {
            #purchaseFlowModal .modal-header {
                padding: 1rem;
            }

            .step-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .step-header .step-icon {
                margin-bottom: 15px;
            }

            .step-navigation {
                flex-direction: column;
                gap: 10px;
            }

            .step-indicator {
                order: -1;
                margin-bottom: 10px;
            }
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

        .education-section {
            position: relative;
        }

        .highlight-box {
            background-color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .highlight-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .gallery-item {
            transition: all 0.3s ease;
            height: 170px;
            overflow: hidden;
        }

        .gallery-item img {
            object-fit: fill height: 100%;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .btn-outline-primary-video {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary-video:hover {
            background: var(--primary-color);
            color: var(--light-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
            border: 2px solid transparent;
        }

        .about-section {
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        .about-img {
            height: 650px;
            width: auto;
            object-fit: cover;
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
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .feature-item {
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            min-height: 100%;
        }

        .feature-item>* {
            align-self: flex-start;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .feature-text {
            width: 100%;
            text-align: left;
        }

        .feature-text h5 {
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--primary-dark);
            font-size: 0.95rem;
        }

        .feature-text p {
            color: var(--text-light);
            font-size: 0.8rem;
            margin-bottom: 0;
            line-height: 1.4;
        }

        .btn-outline-primary-about {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary-about:hover {
            background: var(--primary-color);
            color: var(--light-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
            border: 2px solid transparent;
        }

        /* Responsive styles */
        @media (max-width: 767.98px) {
            .about-features {
                grid-template-columns: 1fr;
                /* Satu kolom di mobile */
            }

            .feature-item {
                padding: 20px;
                /* Lebih banyak ruang di mobile */
            }

            .feature-icon {
                width: 45px;
                height: 45px;
                /* Sedikit lebih besar di mobile */
                font-size: 1.1rem;
            }

            .feature-text h5 {
                font-size: 1rem;
                /* Sedikit lebih besar di mobile */
            }

            .feature-text p {
                font-size: 0.85rem;
                /* Sedikit lebih besar di mobile */
            }

            /* Tombol akan otomatis menumpuk karena grid 1 kolom */
        }

        /* Testimoni Styles - Improved */
        .testimonial-section {
            background-color: var(--light-color);
            padding: 100px 0;
        }

        .testimonial-container {
            position: relative;
            z-index: 1;
        }

        /* Improved Testimonial Slider Layout */
        .testimonial-section .row {
            position: relative;
            padding-bottom: 70px;
            /* Space for navigation buttons */
        }

        .swiper.mySwiper {
            width: 100%;
            overflow: visible;
        }

        .swiper-wrapper {
            padding: 20px 0 40px;
            /* Extra space for card shadows */
            box-sizing: border-box;
        }

        .swiper-slide {
            width: auto;
            /* Allow slides to take their natural width */
            height: auto;
            transition: transform 0.3s ease;
        }

        /* Navigation buttons positioning */
        .swiper-button-next,
        .swiper-button-prev {
            position: absolute;
            top: auto;
            bottom: 0;
            width: 48px;
            height: 48px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(139, 69, 19, 0.15);
            z-index: 10;
            transition: all 0.3s ease;
            color: var(--primary-color);
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 18px;
            font-weight: bold;
        }

        .swiper-button-prev {
            left: 50%;
            transform: translateX(calc(-50% - 30px));
        }

        .swiper-button-next {
            right: 50%;
            transform: translateX(calc(50% + 30px));
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: var(--primary-color);
            color: white;
            transform: translateX(calc(-50% - 30px)) scale(1.1);
        }

        .swiper-button-next:hover {
            transform: translateX(calc(50% + 30px)) scale(1.1);
        }

        @media (max-width: 768px) {
            .testimonial-section .row {
                padding-bottom: 60px;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 42px;
                height: 42px;
            }

            .swiper-button-prev {
                transform: translateX(calc(-50% - 25px));
            }

            .swiper-button-next {
                transform: translateX(calc(50% + 25px));
            }

            .swiper-button-next:hover,
            .swiper-button-prev:hover {
                transform: translateX(calc(-50% - 25px)) scale(1.1);
            }

            .swiper-button-next:hover {
                transform: translateX(calc(50% + 25px)) scale(1.1);
            }
        }

        .swiper {
            z-index: 99;
            width: 100%;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
        }

        .testimonial-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.1);
            height: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(139, 69, 19, 0.1);
        }

        .testimonial-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-primary);
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(139, 69, 19, 0.2);
        }

        .testimonial-content {
            padding: 35px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .testimonial-product-img {
            position: relative;
            margin-bottom: 25px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 150px;
        }

        .testimonial-product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .testimonial-card:hover .testimonial-product-img img {
            transform: scale(1.05);
        }

        .testimonial-text {
            font-style: italic;
            color: var(--text-color);
            margin-bottom: 25px;
            position: relative;
            line-height: 1.7;
            font-size: 16px;
            padding: 0 15px;
        }

        .testimonial-text::before,
        .testimonial-text::after {
            content: '"';
            font-size: 32px;
            color: var(--primary-color);
            opacity: 0.2;
            position: absolute;
            font-family: serif;
        }

        .testimonial-text::before {
            top: -15px;
            left: -5px;
        }

        .testimonial-text::after {
            bottom: -25px;
            right: -5px;
        }

        .testimonial-meta {
            margin-top: auto;
            text-align: center;
        }

        .testimonial-name {
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 18px;
            letter-spacing: 0.5px;
        }

        .testimonial-product {
            color: var(--accent-color);
            font-size: 15px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .testimonial-rating {
            margin-bottom: 15px;
        }

        .testimonial-rating .fas {
            font-size: 18px;
            margin: 0 2px;
        }

        .testimonial-date {
            color: var(--text-light);
            font-size: 13px;
            display: inline-block;
            padding: 5px 12px;
            background: rgba(139, 69, 19, 0.05);
            border-radius: 20px;
        }

        .testimonial-quote-icon {
            position: absolute;
            bottom: 20px;
            right: 20px;
            opacity: 0.1;
            font-size: 60px;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .testimonial-card:hover .testimonial-quote-icon {
            opacity: 0.2;
            transform: scale(1.1);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .testimonial-section {
                padding: 70px 0;
            }

            .testimonial-content {
                padding: 25px;
            }
        }

        @media (max-width: 768px) {
            .testimonial-section {
                padding: 50px 0;
            }

            .testimonial-card {
                width: 350px;
            }

            .testimonial-text {
                margin-bottom: 10px;
            }
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

        .footer-navbar {
            padding: 10px;
        }

        .footer-logo {
            width: auto;
            height: 95px;
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
            color: white;
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
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0;
            /* dihapus karena gap sudah mengatur jarak */
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            background: rgba(255, 255, 255, 0.1);
            padding: 12px 15px;
            border-radius: 8px;
            text-align: center;
            font-size: 0.9rem;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding-left: 15px;
            /* reset padding-left agar tidak bergeser */
        }

        /* Responsive */
        @media (max-width: 768px) {
            .footer-links ul {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .footer-links ul {
                grid-template-columns: 1fr;
            }
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

        /* Modern Bento Grid Styles */
        .modern-bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-auto-rows: 240px;
            gap: 1.5rem;
        }

        .bento-card {
            position: relative;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .content-card {
            grid-column: span 5;
            grid-row: span 2;
            background: white;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        }

        .image-card {
            grid-column: span 3;
            grid-row: span 1;
        }

        .image-card:nth-child(3) {
            grid-column: span 4;
        }

        .image-card:nth-child(5) {
            grid-column: span 2;
            grid-row: span 1;
        }

        .stats-card {
            grid-column: span 2;
            grid-row: span 1;
            box-shadow: 0 8px 24px rgba(78, 84, 200, 0.15);
        }

        .image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .image-card:hover img {
            transform: scale(1.05);
        }

        .image-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 100%);
            color: white;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            opacity: 0;
        }

        .image-card:hover .image-caption {
            transform: translateY(0);
            opacity: 1;
        }

        /* Custom Styles */
        .bg-soft-gradient {
            background: linear-gradient(to bottom, #f9f9ff 0%, #ffffff 100%);
        }

        .bg-primary {
            background: var(--primary-color) !important;
        }

        .bg-primary-soft {
            background: rgba(78, 84, 200, 0.1) !important;
        }

        .bg-primary-light {
            background: rgba(78, 84, 200, 0.08);
        }

        .feature-list-edukasi {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
        }

        .feature-item-edukasi {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .feature-icon-edukasi {
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .price-tag {
            border-left: 3px solid var(--dark-color);
        }

        @media (max-width: 1200px) {
            .modern-bento-grid {
                grid-auto-rows: 200px;
            }

            .content-card {
                grid-column: span 6;
            }
        }

        @media (max-width: 992px) {
            .modern-bento-grid {
                grid-template-columns: repeat(6, 1fr);
            }

            .content-card {
                grid-column: span 6;
                grid-row: span 1;
                min-height: 400px;
            }

            .image-card {
                grid-column: span 3;
            }

            .image-card:nth-child(3) {
                grid-column: span 3;
            }

            .image-card:nth-child(5) {
                grid-column: span 2;
            }

            .stats-card {
                grid-column: span 2;
            }
        }

        @media (max-width: 768px) {
            .modern-bento-grid {
                grid-template-columns: 1fr;
                grid-auto-rows: auto;
            }

            .bento-card {
                grid-column: span 1 !important;
                min-height: 300px;
            }

            .content-card {
                min-height: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid px-3 px-md-5">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('img/logo-reztis-batik.png') }}" alt="Reztis Batik" class="nav-logo">
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
                        <a class="nav-link" href="#edukasi">Layanan Edukasi</a>
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
                            <button class="dropdown-toggle nav-cta border-0" type="button" id="navbarDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div>
                                        {{ Auth::guard('pembeli')->user()->nama }}
                                    </div>
                                </div>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="navbarDropdown"
                                style="border: none; border-radius: 10px;">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-3"
                                        href="{{ route('pembeli.keranjang.index') }}">
                                        <i class="fas fa-shopping-cart me-2 text-primary"></i>
                                        <span>Keranjang Saya</span>
                                        <span class="badge rounded-pill ms-2 cart-badge"
                                            style="background-color: var(--primary-color);">0</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-3"
                                        href="{{ route('pembeli.pesanan.index') }}">
                                        <i class="fas fa-clipboard-list me-2 text-primary"></i>
                                        <span>Pesanan Saya</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-3"
                                        href="{{ route('pembeli.layanan-edukasi.index') }}">
                                        <i class="fas fa-calendar-check me-2 text-primary"></i>
                                        <span>Booking Saya</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-3"
                                        href="{{ route('pembeli.profile.index') }}">
                                        <i class="fas fa-user me-2 text-primary"></i>
                                        <span>Profile Saya</span>
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
                        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
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
                    <img src="{{ asset('img/logo-reztis-batik.png') }}" alt="Reztis Batik"
                        class="img-fluid hero-logo mb-3 animate__animated animate__fadeInDown" data-aos="fade-down"
                        data-aos-duration="1000">
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

    <!-- Purchase Flow Section -->
    <section id="alur-pembelian" class="section" style="background-color: #F9F5F0; padding-bottom: 50px;">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Alur Pembelian Mudah</h2>
                <p class="subtitle">Belanja produk batik premium kami dengan beberapa langkah sederhana</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Step 1 -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-card h-100">
                        <div class="step-header">
                            <div class="step-number">1</div>
                            <div class="step-icon">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <div class="step-body">
                            <h5>Login Terlebih Dahulu</h5>
                            <p>Anda harus login untuk menambahkan produk ke keranjang. Jika belum punya akun, daftar
                                sekarang.</p>
                        </div>
                        <div class="step-footer">
                            @auth('pembeli')
                                <span class="badge bg-success px-3 py-2"><i class="fas fa-check-circle me-1"></i>Anda
                                    sudah login</span>
                            @else
                                <a href="{{ route('pembeli.login') }}"
                                    class="btn btn-sm btn-outline-primary-step">Login/Daftar</a>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-card h-100">
                        <div class="step-header">
                            <div class="step-number">2</div>
                            <div class="step-icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </div>
                        <div class="step-body">
                            <h5>Tambahkan ke Keranjang</h5>
                            <p>Pilih produk yang diinginkan dan klik ikon keranjang. Anda juga bisa booking layanan
                                edukasi.</p>
                        </div>
                        <div class="step-footer">
                            <a href="#produk" class="btn btn-sm btn-outline-primary-step">Lihat Produk</a>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-card h-100">
                        <div class="step-header">
                            <div class="step-number">3</div>
                            <div class="step-icon">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                        </div>
                        <div class="step-body">
                            <h5>Proses Checkout</h5>
                            <p>Di halaman keranjang, centang produk yang ingin dibeli dan lanjutkan ke checkout.</p>
                        </div>
                        <div class="step-footer">
                            @auth('pembeli')
                                <a href="{{ route('pembeli.keranjang.index') }}"
                                    class="btn btn-sm btn-outline-primary-step">Ke Keranjang</a>
                            @else
                                <span class="text-muted small">Login terlebih dahulu</span>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-card h-100">
                        <div class="step-header">
                            <div class="step-number">4</div>
                            <div class="step-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                        </div>
                        <div class="step-body">
                            <h5>Pesanan Dikirim</h5>
                            <p>Setelah pembayaran dikonfirmasi, pesanan akan diproses dan dikirim ke alamat Anda.</p>
                        </div>
                        <div class="step-footer">
                            @auth('pembeli')
                                <a href="{{ route('pembeli.pesanan.index') }}"
                                    class="btn btn-sm btn-outline-primary-step">Lihat Pesanan</a>
                            @else
                                <span class="text-muted small">Login terlebih dahulu</span>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Steps Button - Now triggers modal -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <button class="btn btn-outline-primary-step btn-lg" data-bs-toggle="modal"
                        data-bs-target="#purchaseFlowModal">
                        <i class="fas fa-info-circle me-2"></i> Lihat Detail Alur Pembelian
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Purchase Flow Modal -->
    <div class="modal fade" id="purchaseFlowModal" tabindex="-1" aria-labelledby="purchaseFlowModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header" style="background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);">
                    <h5 class="modal-title text-white" id="purchaseFlowModalLabel">
                        <i class="fas fa-map-signs me-2"></i> Detail Alur Pembelian
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Left Side - Visual Timeline -->
                            <div class="col-lg-5 d-none d-lg-block" style="background-color: #F5F0E8;">
                                <div class="p-4 h-100 d-flex flex-column justify-content-center">
                                    <div class="visual-timeline">
                                        <div class="timeline-progress" id="timelineProgress"></div>
                                        <div class="timeline-step active" data-step="1">
                                            <div class="step-marker">
                                                <div class="marker-circle"></div>
                                                <div class="marker-line"></div>
                                            </div>
                                            <div class="step-preview">
                                                <i class="fas fa-user-lock me-2"></i>
                                                <span>Login</span>
                                            </div>
                                        </div>

                                        <div class="timeline-step" data-step="2">
                                            <div class="step-marker">
                                                <div class="marker-circle"></div>
                                                <div class="marker-line"></div>
                                            </div>
                                            <div class="step-preview">
                                                <i class="fas fa-cart-plus me-2"></i>
                                                <span>Keranjang</span>
                                            </div>
                                        </div>

                                        <div class="timeline-step" data-step="3">
                                            <div class="step-marker">
                                                <div class="marker-circle"></div>
                                                <div class="marker-line"></div>
                                            </div>
                                            <div class="step-preview">
                                                <i class="fas fa-user-circle me-2"></i>
                                                <span>Menu Akun</span>
                                            </div>
                                        </div>

                                        <div class="timeline-step" data-step="4">
                                            <div class="step-marker">
                                                <div class="marker-circle"></div>
                                                <div class="marker-line"></div>
                                            </div>
                                            <div class="step-preview">
                                                <i class="fas fa-shopping-basket me-2"></i>
                                                <span>Checkout</span>
                                            </div>
                                        </div>

                                        <div class="timeline-step" data-step="5">
                                            <div class="step-marker">
                                                <div class="marker-circle"></div>
                                                <div class="marker-line"></div>
                                            </div>
                                            <div class="step-preview">
                                                <i class="fas fa-credit-card me-2"></i>
                                                <span>Pembayaran</span>
                                            </div>
                                        </div>

                                        <div class="timeline-step" data-step="6">
                                            <div class="step-marker">
                                                <div class="marker-circle"></div>
                                                <div class="marker-line"></div>
                                            </div>
                                            <div class="step-preview">
                                                <i class="fas fa-truck me-2"></i>
                                                <span>Pengiriman</span>
                                            </div>
                                        </div>

                                        <div class="timeline-step" data-step="7">
                                            <div class="step-marker">
                                                <div class="marker-circle"></div>
                                            </div>
                                            <div class="step-preview">
                                                <i class="fas fa-star me-2"></i>
                                                <span>Rating</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side - Step Content -->
                            <div class="col-lg-7">
                                <div class="p-4">
                                    <!-- Step 1 Content -->
                                    <div class="step-content active" data-step="1">
                                        <div class="step-header-modal d-flex align-items-center mb-4">
                                            <div class="step-icon me-3">
                                                <i class="fas fa-user-lock"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">1. Login Terlebih Dahulu</h4>
                                                <p class="text-muted mb-0">Mulai proses belanja Anda</p>
                                            </div>
                                        </div>
                                        <div class="step-body-modal">
                                            <p>🔑 Anda harus login terlebih dahulu untuk bisa menambahkan produk ke
                                                keranjang.</p>
                                            <p>→ Jika belum punya akun, klik "Daftar Sekarang" untuk menuju halaman
                                                registrasi.</p>
                                            <div class="step-action mt-4">
                                                @auth('pembeli')
                                                    <span class="badge bg-success p-2"><i
                                                            class="fas fa-check-circle me-1"></i> Anda sudah login</span>
                                                @else
                                                    <a href="{{ route('pembeli.login') }}" class="btn btn-primary">
                                                        <i class="fas fa-sign-in-alt me-1"></i> Login/Daftar Sekarang
                                                    </a>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 2 Content -->
                                    <div class="step-content" data-step="2">
                                        <div class="step-header-modal d-flex align-items-center mb-4">
                                            <div class="step-icon me-3">
                                                <i class="fas fa-cart-plus"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">2. Tambahkan ke Keranjang</h4>
                                                <p class="text-muted mb-0">Pilih produk favorit Anda</p>
                                            </div>
                                        </div>
                                        <div class="step-body-modal">
                                            <p>🛍 Setelah login, Anda dapat memilih produk yang diinginkan, lalu klik
                                                ikon keranjang.</p>
                                            <p>✅ Akan muncul notifikasi: "Produk berhasil ditambahkan ke keranjang".</p>
                                            <p>→ Atau, Anda juga bisa melakukan booking layanan edukasi dengan klik
                                                "Daftar Sekarang" di layanan tersebut.</p>
                                            <div class="step-action mt-4">
                                                <a href="#produk" class="btn btn-primary" data-bs-dismiss="modal">
                                                    <i class="fas fa-shopping-bag me-1"></i> Lihat Produk
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 3 Content -->
                                    <div class="step-content" data-step="3">
                                        <div class="step-header-modal d-flex align-items-center mb-4">
                                            <div class="step-icon me-3">
                                                <i class="fas fa-user-circle"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">3. Akses Menu Akun Anda</h4>
                                                <p class="text-muted mb-0">Kelola pesanan dan keranjang</p>
                                            </div>
                                        </div>
                                        <div class="step-body-modal">
                                            <p>👤 Klik nama akun Anda di pojok kanan atas untuk membuka menu:</p>
                                            <ul class="list-unstyled ms-3">
                                                <li class="mb-2"><i
                                                        class="fas fa-shopping-cart me-2 text-primary"></i>
                                                    <strong>Keranjang Saya</strong> - untuk melihat produk yang ingin
                                                    dibeli
                                                </li>
                                                <li class="mb-2"><i
                                                        class="fas fa-clipboard-list me-2 text-primary"></i>
                                                    <strong>Pesanan Saya</strong> - untuk memantau status pesanan
                                                </li>
                                                <li class="mb-2"><i
                                                        class="fas fa-calendar-check me-2 text-primary"></i>
                                                    <strong>Booking Saya</strong> - untuk melihat layanan edukasi yang
                                                    dibooking
                                                </li>
                                                <li><i class="fas fa-user me-2 text-primary"></i> <strong>Profil
                                                        Saya</strong> - untuk melihat dan mengedit data pribadi</li>
                                            </ul>
                                            <div class="step-action mt-4">
                                                @auth('pembeli')
                                                    <a href="{{ route('pembeli.keranjang.index') }}"
                                                        class="btn btn-primary" data-bs-dismiss="modal">
                                                        <i class="fas fa-shopping-cart me-1"></i> Buka Keranjang
                                                    </a>
                                                @else
                                                    <span class="text-muted">Login terlebih dahulu untuk mengakses menu
                                                        ini</span>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 4 Content -->
                                    <div class="step-content" data-step="4">
                                        <div class="step-header-modal d-flex align-items-center mb-4">
                                            <div class="step-icon me-3">
                                                <i class="fas fa-shopping-basket"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">4. Proses Checkout</h4>
                                                <p class="text-muted mb-0">Selesaikan pembelian Anda</p>
                                            </div>
                                        </div>
                                        <div class="step-body-modal">
                                            <p>📦 Di halaman keranjang, centang produk yang ingin dibeli menggunakan
                                                checkbox.</p>
                                            <p>→ Setelah itu, klik "Checkout" untuk melanjutkan proses pembelian.</p>
                                            <div class="alert alert-primary mt-3">
                                                <i class="fas fa-info-circle me-2"></i> Pastikan alamat pengiriman
                                                sudah benar sebelum checkout.
                                            </div>
                                            <div class="step-action mt-4">
                                                @auth('pembeli')
                                                    <a href="{{ route('pembeli.keranjang.index') }}"
                                                        class="btn btn-primary" data-bs-dismiss="modal">
                                                        <i class="fas fa-arrow-right me-1"></i> Lanjut ke Checkout
                                                    </a>
                                                @else
                                                    <span class="text-muted">Login terlebih dahulu untuk mengakses fitur
                                                        ini</span>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 5 Content -->
                                    <div class="step-content" data-step="5">
                                        <div class="step-header-modal d-flex align-items-center mb-4">
                                            <div class="step-icon me-3">
                                                <i class="fas fa-credit-card"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">5. Pembayaran</h4>
                                                <p class="text-muted mb-0">Selesaikan transaksi Anda</p>
                                            </div>
                                        </div>
                                        <div class="step-body-modal">
                                            <p>💳 Di halaman checkout, Anda dapat:</p>
                                            <ul>
                                                <li class="mb-2">Mengganti alamat pengiriman jika memiliki lebih dari
                                                    satu</li>
                                                <li class="mb-2">Menambahkan alamat baru jika diperlukan</li>
                                                <li class="mb-2">Memilih metode pembayaran yang tersedia</li>
                                                <li>Upload bukti pembayaran di kotak yang tersedia</li>
                                            </ul>
                                            <p>→ Terakhir, klik "Buat Pesanan". Akan muncul notifikasi bahwa pesanan
                                                berhasil dibuat.</p>
                                            <div class="alert alert-warning mt-3">
                                                <i class="fas fa-exclamation-circle me-2"></i> Harap lakukan pembayaran
                                                dalam waktu 24 jam setelah pesanan dibuat.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 6 Content -->
                                    <div class="step-content" data-step="6">
                                        <div class="step-header-modal d-flex align-items-center mb-4">
                                            <div class="step-icon me-3">
                                                <i class="fas fa-truck"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">6. Pengiriman</h4>
                                                <p class="text-muted mb-0">Pesanan sedang dikirim</p>
                                            </div>
                                        </div>
                                        <div class="step-body-modal">
                                            <p>🚚 Jika status pesanan berubah menjadi "Proses Dikirim", berarti pesanan
                                                Anda sedang dalam perjalanan.</p>
                                            <p>→ Anda dapat melacak pengiriman melalui nomor resi yang tersedia di
                                                halaman detail pesanan.</p>
                                            <p>→ Setelah barang sampai, klik tombol hijau "Terima Pesanan" untuk
                                                mengonfirmasi bahwa barang telah diterima.</p>
                                            <div class="alert alert-info mt-3">
                                                <i class="fas fa-clock me-2"></i> Estimasi pengiriman 2-5 hari kerja
                                                tergantung lokasi pengiriman.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Step 7 Content -->
                                    <div class="step-content" data-step="7">
                                        <div class="step-header-modal d-flex align-items-center mb-4">
                                            <div class="step-icon me-3">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">7. Berikan Rating</h4>
                                                <p class="text-muted mb-0">Bagikan pengalaman Anda</p>
                                            </div>
                                        </div>
                                        <div class="step-body-modal">
                                            <p>⭐ Setelah barang diterima, Anda bisa memberikan ulasan dengan:</p>
                                            <ol>
                                                <li class="mb-2">Buka halaman "Pesanan Saya"</li>
                                                <li class="mb-2">Cari pesanan yang sudah diterima</li>
                                                <li class="mb-2">Klik tombol kuning "Beri Nilai Pesanan"</li>
                                                <li>Berikan rating dan ulasan tentang produk dan pengalaman belanja Anda
                                                </li>
                                            </ol>
                                            <div class="alert alert-success mt-3">
                                                <i class="fas fa-heart me-2"></i> Ulasan Anda sangat berarti bagi kami
                                                untuk meningkatkan kualitas pelayanan.
                                            </div>
                                            <div class="step-action mt-4">
                                                @auth('pembeli')
                                                    <a href="{{ route('pembeli.pesanan.index') }}"
                                                        class="btn btn-primary" data-bs-dismiss="modal">
                                                        <i class="fas fa-clipboard-list me-1"></i> Lihat Pesanan Saya
                                                    </a>
                                                @else
                                                    <span class="text-muted">Login terlebih dahulu untuk memberikan
                                                        rating</span>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Controls -->
                                    <div class="step-navigation d-flex justify-content-between mt-4 pt-3 border-top">
                                        <button class="btn btn-outline-secondary prev-step" disabled>
                                            <i class="fas fa-arrow-left me-2"></i> Sebelumnya
                                        </button>
                                        <div class="step-indicator">
                                            Langkah <span class="current-step">1</span> dari 7
                                        </div>
                                        <button class="btn btn-primary next-step">
                                            Selanjutnya <i class="fas fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Section -->
    <section id="produk" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Koleksi Eksklusif</h2>
                <p class="subtitle">Temukan batik berkualitas tinggi dengan motif tradisional dan modern</p>
            </div>

            @if ($products->isEmpty())
                <div class="text-center py-5" data-aos="fade-up">
                    <i class="fas fa-box-open fa-4x mb-3" style="color: var(--primary-color);"></i>
                    <h4>Belum ada produk tersedia</h4>
                    <p style="color: var(--primary-color)">Produk akan segera hadir. Silakan cek kembali nanti.</p>
                </div>
            @else
                <div class="row" id="product-container">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6 mb-4 product-item">
                            <div class="product-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                <div class="product-img-container">
                                    <img src="{{ asset($product->image) }}" class="product-img"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="product-content">
                                    <h5 class="product-title">{{ $product->name }}</h5>
                                    <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                                    <div class="product-actions">
                                        <div>
                                            <span class="product-price">Rp
                                                {{ number_format($product->price, 0, ',', '.') }}</span>
                                        </div>
                                        <button class="product-btn add-to-cart"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                    <div class="product-stock">
                                        <span class="stock-label">Stok Tersedia:</span>
                                        <span class="stock-quantity">{{ $product->stock }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if (count($products) >= 4 && !request()->has('show_all'))
                    <div class="text-center mt-2" data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ url()->current() }}?show_all=true" class="btn btn-primary px-5"
                            id="show-all-btn">Lihat Semua Produk</a>
                    </div>
                @endif
            @endif
        </div>
    </section>

    <!-- Modern Bento Grid for Batik Education -->
    <section id="edukasi" class="section bg-soft-gradient">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Edukasi Membatik</h2>
                <p class="subtitle">Pelajari seni warisan budaya dengan metode modern dari pembatik profesional</p>
            </div>

            <div class="modern-bento-grid">
                <!-- Main Content Card -->
                <div class="bento-card content-card rounded-4 p-5">
                    <div class="d-flex flex-column h-100">
                        <div class="mb-4">
                            <h3 class="fw-bold mb-3">Pengalaman Membatik Autentik</h3>
                            <p class="text-muted mb-4">Bimbingan langsung dari maestro batik dengan pendekatan
                                pembelajaran yang menyenangkan dan interaktif untuk semua usia.</p>

                            <div class="feature-list-edukasi mb-4">
                                <div class="feature-item-edukasi">
                                    <div class="feature-icon-edukasi">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <span>1-2 jam sesi intensif</span>
                                </div>
                                <div class="feature-item-edukasi">
                                    <div class="feature-icon-edukasi">
                                        <i class="fas fa-palette"></i>
                                    </div>
                                    <span>Semua peralatan disediakan</span>
                                </div>
                                <div class="feature-item-edukasi">
                                    <div class="feature-icon-edukasi">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span>Pengajar yang berkompeten</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-auto">
                            <div class="price-tag bg-white rounded-3 p-3 mb-4 shadow-sm">
                                <div
                                    class="price-action-wrapper d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                                    <div class="price-section mb-3 mb-md-0">
                                        <span class="text-muted small">Mulai dari</span>
                                        <h4 class="fw-bold mb-0">Rp 25.000</h4>
                                    </div>
                                    <button class="btn btn-primary add-service-education px-4">
                                        Daftar Sekarang <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Cards -->
                <div class="bento-card image-card rounded-4 overflow-hidden">
                    <img src="{{ asset('img/edukasi1.jpeg') }}" alt="Workshop membatik" class="img-fluid">
                    <div class="image-caption">
                        <p>Sesi praktik menggunakan canting</p>
                    </div>
                </div>

                <div class="bento-card image-card rounded-4 overflow-hidden">
                    <img src="{{ asset('img/edukasi2.jpeg') }}" alt="Hasil karya" class="img-fluid">
                    <div class="image-caption">
                        <p>Karya pertama peserta</p>
                    </div>
                </div>

                <div class="bento-card image-card rounded-4 overflow-hidden">
                    <img src="{{ asset('img/edukasi3.jpeg') }}" alt="Sesi kelompok" class="img-fluid">
                    <div class="image-caption">
                        <p>Belajar bersama teman</p>
                    </div>
                </div>

                <div class="bento-card image-card rounded-4 overflow-hidden">
                    <img src="{{ asset('img/edukasi4.jpeg') }}" alt="Proses pewarnaan" class="img-fluid">
                    <div class="image-caption">
                        <p>Teknik pewarnaan tradisional</p>
                    </div>
                </div>

                <div class="bento-card stats-card rounded-4 p-4 bg-primary text-white text-center shadow-sm">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 gap-2">
                        <i class="fas fa-user fs-1 fs-md-2 fs-lg-3 mb-1" style="font-size: large;"></i>
                        <h2 class="fw-bold mb-0" style="color: var(--light-color);">500+</h2>
                        <h4 class="text-uppercase fw-bold mb-0" style="color: var(--light-color);">Peserta</h4>
                        <p class="small opacity-75 mb-0">Telah mengikuti workshop kami</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Profile Section -->
    <section id="video-profile" class="section" style="background-color: #F5F0E8;">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Video Company Profile Rezti's Batik</h2>
                <p class="subtitle">Lihat sekilas tentang Reztis Batik Jember dalam video kami</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-lg"
                        style="box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15) !important;">
                        <iframe src="https://www.youtube.com/embed/o_4WiZVZM-4?si=7tXCbrmq5uOEvBFX"
                            title="Reztis Batik Jember Company Profile" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <div class="text-center mt-4">
                        <a href="https://www.youtube.com/watch?v=o_4WiZVZM-4" target="_blank"
                            class="btn btn-outline-primary-video">
                            <i class="fab fa-youtube me-2"></i> Tonton di YouTube
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="section about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <img src="{{ asset('img/about.jpg') }}" alt="Reztis Batik Jember" class="img-fluid about-img">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="text-start">
                        <h2>Tentang Reztis Batik</h2>
                    </div>
                    <p>Rezti’s merupakan perintis batik di Jember Selatan yang diawali dari pelatihan membatik dengan
                        dana PNPM Mandiri Perkotaan. Rezti’s Batik dirintis di akhir tahun 2012. Tahun 2014, merk
                        didaftarkan di Dirjen HKI (Hak Kekayaan Intelektual). Pada tahun 2015, Rezti’s Batik mendapat
                        Sertifikat Batik Mark dari Balai Besar Kerajinan Batik sebagai sebaran Batik Indonesia.</p>
                    <p>Produk batik yang dihasilkan meliputi: kain, pakaian, mukenah, udheng, syal, dan dompet. Selain
                        itu, Rezti’s Batik juga menyediakan:</p>
                    <div class="about-features">
                        <div class="feature-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="feature-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Wisata Edukasi</h5>
                                <p>Pengalaman belajar langsung tentang seni dan budaya batik tradisional</p>
                            </div>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-icon">
                                <i class="fas fa-paintbrush"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Batik Tulis</h5>
                                <p>Karya seni batik tulis premium dengan detail rumit buatan tangan</p>
                            </div>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-icon">
                                <i class="fas fa-stamp"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Batik Cap & Kombinasi</h5>
                                <p>Batik berkualitas dengan teknik cap modern dan kombinasi teknik tradisional</p>
                            </div>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Batik Zat Warna Alam</h5>
                                <p>Batik ramah lingkungan dengan pewarna alami dari tumbuhan</p>
                            </div>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Batik Zat Warna Sintetis</h5>
                                <p>Batik dengan warna-warna cerah dan tahan lama dari pewarna sintetis</p>
                            </div>
                        </div>

                        <div class="mt-4 d-flex flex-column" data-aos="fade-up" data-aos-delay="300">
                            <a href="#kontak" class="btn btn-primary mb-3">Hubungi Kami</a>
                            <a href="#produk" class="btn btn-outline-primary-about">Produk Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section id="testimoni" class="section testimonial-section">
        <div class="container testimonial-container">
            <div class="section-title" data-aos="fade-up">
                <h2>Apa Kata Pelanggan</h2>
                <p class="subtitle">Testimoni asli dari pelanggan yang sudah membeli produk kami</p>
            </div>
            <div class="row">
                <div class="col-12 px-0"> <!-- Full width container -->
                    @if ($ratings->count() > 0)
                        <div class="swiper mySwiper" data-aos="fade-up">
                            <div class="swiper-wrapper">
                                @foreach ($ratings as $rating)
                                    <div class="swiper-slide">
                                        <div class="testimonial-card">
                                            <div class="testimonial-content">
                                                <div class="testimonial-product-img">
                                                    <img src="{{ asset($rating->product->image) }}" class="img-fluid"
                                                        alt="{{ $rating->product->name }}">
                                                </div>

                                                <p class="testimonial-text">
                                                    {{ $rating->comment ?: 'Produk sangat bagus dan berkualitas' }}
                                                </p>

                                                <div class="testimonial-meta">
                                                    <h4 class="testimonial-name">{{ $rating->pembeli->nama }}</h4>
                                                    <p class="testimonial-product">{{ $rating->product->name }}</p>

                                                    <div class="testimonial-rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $rating->rating)
                                                                <i class="fas fa-star text-warning"></i>
                                                            @else
                                                                <i class="fas fa-star text-muted"></i>
                                                            @endif
                                                        @endfor
                                                    </div>

                                                    <span class="testimonial-date">
                                                        {{ $rating->created_at->format('d M Y') }}
                                                    </span>
                                                </div>

                                                <div class="testimonial-quote-icon">
                                                    <i class="fas fa-quote-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Navigation buttons outside swiper but inside container -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    @else
                        <div class="text-center py-5" data-aos="fade-up">
                            <i class="fas fa-comment-dots fa-4x mb-3" style="color: var(--primary-color);"></i>
                            <h4>Belum Ada Testimoni</h4>
                            <p style="color: var(--primary-color)">Jadilah yang pertama memberikan testimoni dengan
                                membeli produk kami</p>
                        </div>
                    @endif
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
                                <p style="opacity: 0.9; margin-bottom: 0;">081246833799</p>
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
                                <p style="opacity: 0.9; margin-bottom: 0;">reztisbatik@gmail.com</p>
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
                                <p style="opacity: 0.9; margin-bottom: 0;">Senin - Sabtu: 08.00–15.00 WIB</p>
                            </div>
                        </div>

                        <div class="mt-5 pt-3">
                            <h5 class="mb-3">Ikuti Kami</h5>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/reztisbatiktegalsari/" target="_blank"
                                    class="me-2"
                                    style="display: inline-flex; width: 40px; height: 40px; background: rgba(255,255,255,0.2); color: white; border-radius: 50%; align-items: center; justify-content: center; transition: all 0.3s ease;">
                                    <i class="fab fa-instagram"></i>
                                </a>

                                <a href="https://www.facebook.com/reztisbatik" target="_blank" class="me-2"
                                    style="display: inline-flex; width: 40px; height: 40px; background: rgba(255,255,255,0.2); color: white; border-radius: 50%; align-items: center; justify-content: center; transition: all 0.3s ease;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                                <a href="https://wa.me/6281246833799" target="_blank" class="me-2"
                                    style="display: inline-flex; width: 40px; height: 40px; background: rgba(255,255,255,0.2); color: white; border-radius: 50%; align-items: center; justify-content: center; transition: all 0.3s ease;">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="contact-form p-4 p-lg-5 h-100"
                        style=" background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                        <h3 class="mb-4" style="font-weight: 700;">Kirim Pesan</h3>
                        <p class="mb-4" style="color: #777;">Isi form berikut dan kami akan segera menghubungi Anda
                        </p>

                        <form id="whatsappForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-container">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Nama Lengkap"
                                            style="height: 55px; border-radius: 10px; border: 1px solid #e0e0e0; padding: 10px 15px;"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-container">
                                        <input type="tel" class="form-control" id="phone"
                                            placeholder="Nomor WhatsApp Anda"
                                            style="height: 55px; border-radius: 10px; border: 1px solid #e0e0e0; padding: 10px 15px;"required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-container mt-3">
                                <input type="text" class="form-control" id="subject" placeholder="Subjek"
                                    style="height: 55px; border-radius: 10px; border: 1px solid #e0e0e0; padding: 10px 15px;"
                                    required>
                            </div>

                            <div class="form-container mt-3">
                                <textarea class="form-control" id="message" placeholder="Pesan Anda"
                                    style="height: 150px; border-radius: 10px; border: 1px solid #e0e0e0;padding: 15px;" required></textarea>
                            </div>

                            <div class="mt-4 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary px-4 py-3"
                                    style=" background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); border: none; font-weight: 600; letter-spacing: 0.5px; border-radius: 10px;">
                                    <i class="fab fa-whatsapp me-2"></i> Kirim via WhatsApp
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
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="{{ route('index') }}" class="footer-brand mb-2"><img
                            src="{{ asset('img/logo-reztis-batik.png') }}" alt="Reztis Batik"
                            class="footer-logo"></a>
                    <p class="footer-about mt-2">Rezti’s merupakan perintis batik di Jember Selatan yang diawali dari
                        pelatihan membatik dengan dana PNPM Mandiri Perkotaan. Rezti’s Batik dirintis di akhir tahun
                        2012. Tahun 2014, merk didaftarkan di Dirjen HKI (Hak Kekayaan Intelektual). Pada tahun 2015,
                        Rezti’s Batik mendapat Sertifikat Batik Mark dari Balai Besar Kerajinan Batik sebagai sebaran
                        Batik Indonesia.</p>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/reztisbatiktegalsari/" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/reztisbatik" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/6281246833799" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 mb-md-0">
                    <div class="footer-links">
                        <h5>Link Cepat</h5>
                        <ul>
                            <li><a href="#home">Beranda</a></li>
                            <li><a href="#produk">Produk</a></li>
                            <li><a href="#edukasi">Layanan Edukasi</a></li>
                            <li><a href="#tentang">Tentang</a></li>
                            <li><a href="#testimoni">Testimoni</a></li>
                            <li><a href="#kontak">Kontak</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                }, // Tablet
                992: {
                    slidesPerView: 3
                } // Desktop
            }
        });
    </script>
    <script>
        document.getElementById('whatsappForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const subject = document.getElementById('subject').value.trim();
            const message = document.getElementById('message').value.trim();

            if (!name || !phone || !subject || !message) {
                alert('Harap lengkapi semua field!');
                return;
            }

            let formattedNoPengirim = phone.replace(/\D/g, '');

            if (formattedNoPengirim.startsWith('0')) {
                formattedNoPengirim = '62' + formattedNoPengirim.substring(1);
            } else if (!formattedNoPengirim.startsWith('62')) {
                formattedNoPengirim = '62' + formattedNoPengirim;
            }
            const pesan =
                `Halo, saya ${name} (https://wa.me/${formattedNoPengirim}).\n\nSubjek: ${subject}\n\nPesan:\n${message}\n\nDikirim melalui website.`;
            const encodedPesan = encodeURIComponent(pesan);
            const nomorTujuan = '6281246833799';
            window.open(`https://wa.me/${nomorTujuan}?text=${encodedPesan}`, '_blank');
            this.reset();
        });
    </script>
    <script>
        // Handle education service booking
        document.querySelector('.add-service-education').addEventListener('click', function(e) {
            e.preventDefault();

            @auth('pembeli')
                window.location.href = "{{ route('pembeli.layanan-edukasi.create') }}";
            @else
                Swal.fire({
                    title: 'Login Required',
                    text: 'Anda perlu login untuk melakukan booking layanan edukasi',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#8B4513',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Login Sekarang',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('pembeli.login') }}";
                    }
                });
            @endauth
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Add to cart functionality
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');

                    @auth('pembeli')
                        addToCart(productId);
                    @else
                        Swal.fire({
                            title: 'Login Required',
                            text: 'Anda perlu login untuk menambahkan produk ke keranjang',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#8B4513',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Login Sekarang',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('pembeli.login') }}";
                            }
                        });
                    @endauth
                });
            });

            // Function to add item to cart
            function addToCart(productId) {
                fetch("{{ route('pembeli.keranjang.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: 1
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateCartCount(data.cart_count);
                            Swal.fire({
                                title: 'Berhasil!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonColor: '#8B4513'
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonColor: '#8B4513'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan',
                            icon: 'error',
                            confirmButtonColor: '#8B4513'
                        });
                    });
            }

            // Function to update cart count in navbar
            function updateCartCount(count) {
                const cartBadges = document.querySelectorAll('.cart-badge');
                cartBadges.forEach(badge => {
                    badge.textContent = count;
                });
            }

            // Initialize cart count on page load
            @auth('pembeli')
                fetch("{{ route('pembeli.keranjang.count') }}")
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateCartCount(data.count);
                        }
                    });
            @endauth
        });
    </script>
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

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            updateActiveNavLink();
        });

        // Function to update active nav link
        function updateActiveNavLink() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link:not(.nav-cta)');

            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.offsetHeight;

                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');
                if (href === `#${currentSection}` || (href === '#home' && currentSection === '')) {
                    link.classList.add('active');
                }
            });
        }

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

                    // Update active nav link after scroll completes
                    setTimeout(updateActiveNavLink, 1000);
                }
            });
        });

        // Close mobile menu when clicking a link (except dropdown items)
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

        // Initialize active link on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateActiveNavLink();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize modal step navigation
            const modal = document.getElementById('purchaseFlowModal');
            if (modal) {
                modal.addEventListener('show.bs.modal', function() {
                    // Reset to first step when modal opens
                    showStep(1);
                });

                // Step navigation
                const prevBtn = modal.querySelector('.prev-step');
                const nextBtn = modal.querySelector('.next-step');

                prevBtn.addEventListener('click', function() {
                    const currentStep = parseInt(modal.querySelector('.step-content.active').dataset.step);
                    showStep(currentStep - 1);
                });

                nextBtn.addEventListener('click', function() {
                    const currentStep = parseInt(modal.querySelector('.step-content.active').dataset.step);
                    showStep(currentStep + 1);
                });
            }

            function showStep(stepNumber) {
                // Hide all steps
                document.querySelectorAll('.step-content').forEach(step => {
                    step.classList.remove('active');
                });

                // Show selected step
                const stepToShow = document.querySelector(`.step-content[data-step="${stepNumber}"]`);
                if (stepToShow) {
                    stepToShow.classList.add('active');

                    // Update timeline progress
                    const progressPercentage = ((stepNumber - 1) / 6) * 100;
                    document.getElementById('timelineProgress').style.height = `${progressPercentage}%`;

                    // Update timeline markers
                    document.querySelectorAll('.timeline-step').forEach(step => {
                        const stepValue = parseInt(step.dataset.step);
                        step.classList.remove('active', 'completed');

                        if (stepValue === stepNumber) {
                            step.classList.add('active');
                        } else if (stepValue < stepNumber) {
                            step.classList.add('completed');
                        }
                    });

                    // Update step indicator
                    document.querySelector('.current-step').textContent = stepNumber;

                    // Update button states
                    const prevBtn = document.querySelector('.prev-step');
                    const nextBtn = document.querySelector('.next-step');

                    prevBtn.disabled = stepNumber === 1;

                    if (stepNumber === 7) {
                        nextBtn.innerHTML = 'Selesai <i class="fas fa-check ms-2"></i>';
                        nextBtn.addEventListener('click', function() {
                            bootstrap.Modal.getInstance(document.getElementById('purchaseFlowModal'))
                                .hide();
                        }, {
                            once: true
                        });
                    } else {
                        nextBtn.innerHTML = 'Selanjutnya <i class="fas fa-arrow-right ms-2"></i>';
                    }
                }
            }
        });
    </script>
</body>

</html>
