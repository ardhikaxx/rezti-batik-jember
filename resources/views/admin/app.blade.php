<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Reztis Batik - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/logo-brand.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

    @stack('styles')
</head>

<body class="admin-dashboard">
    <div class="wrapper">
        <!-- Sidebar -->
        @include('admin.sidebar')

        <!-- Overlay untuk mobile -->
        <div class="sidebar-overlay"></div>

        <div class="main">
            <!-- Header -->
            @include('admin.header')

            <main class="content">
                <div class="container-fluid p-4">
                    @yield('content')
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-center">
                            <p class="mb-0">
                                &copy; {{ date('Y') }} <strong>Reztis Batik Jember</strong> - All Rights Reserved
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin/js/script.js') }}"></script>

    @stack('scripts')
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JS for SweetAlert notifications -->
    <script>
        // Success message
        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        // Error message
        @if (Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ Session::get('error') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        // Sidebar toggle for mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const barsToggle = document.querySelector('.fa-bars.sidebar-toggle');
            const sidebarClose = document.querySelector('.btn-close-sidebar');
            const overlay = document.querySelector('.sidebar-overlay');

            // Toggle sidebar when hamburger menu is clicked
            if (barsToggle) {
                barsToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.add('show');
                    overlay.classList.add('active');
                    document.body.style.overflow = 'hidden'; // Prevent scrolling when sidebar is open
                });
            }

            // Close sidebar when close button is clicked
            if (sidebarClose) {
                sidebarClose.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.remove('show');
                    overlay.classList.remove('active');
                    document.body.style.overflow = ''; // Re-enable scrolling
                });
            }

            // Close sidebar when overlay is clicked
            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('active');
                    document.body.style.overflow = ''; // Re-enable scrolling
                });
            }

            // Close sidebar when clicking on nav links (mobile)
            const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        sidebar.classList.remove('show');
                        overlay.classList.remove('active');
                        document.body.style.overflow = ''; // Re-enable scrolling
                    }
                });
            });
        });
    </script>
</body>

</html>
