<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reztis Batik - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    @stack('styles')
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
    </style>
</head>
<body>
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>