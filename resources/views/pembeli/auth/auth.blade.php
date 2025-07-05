<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Reztis Batik</title>
    <link rel="shortcut icon" href="{{ asset('img/logo-brand.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #8B4513;
            --primary-light: #B68D65;
            --primary-dark: #5D2906;
            --secondary-color: #D2B48C;
            --light-color: #F9F5F0;
            --dark-color: #3E2723;
            --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('{{ asset('img/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .auth-container {
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .auth-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.5s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .auth-header {
            background: var(--gradient-primary);
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .auth-header h2 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            font-size: 1.8rem;
        }

        .auth-header p {
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .auth-logo {
            width: auto;
            height: 85px;
            margin-bottom: 1rem;
            border-radius: 50%;
            border: 3px solid rgba(255,255,255,0.2);
            padding: 10px;
            background-color: rgba(255,255,255,0.1);
            transition: all 0.5s ease;
        }

        .auth-body {
            padding: 2.5rem;
        }

        .form-control {
            height: 50px;
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px 15px;
            transition: all 0.3s ease;
            background-color: rgba(255,255,255,0.8);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.15);
            background-color: white;
        }

        .input-group-text {
            background-color: rgba(255,255,255,0.8);
            border-right: none;
            color: var(--primary-color);
        }

        .form-floating label {
            color: #777;
        }

        .btn-auth {
            background: var(--gradient-primary);
            border: none;
            height: 50px;
            font-weight: 600;
            border-radius: 10px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-auth:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(139, 69, 19, 0.3);
        }

        .btn-auth:active {
            transform: translateY(1px);
        }

        .btn-back {
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            height: 50px;
            color: #8B4513;
            background: transparent;
            border: solid 2px #8B4513;
            border-radius: 10px;
            text-transform: uppercase;
            font-size: 0.9rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-back, span {
            justify-content: center;
            align-items: center;
        }

        .btn-back:hover {
            transform: translateY(-3px);
            border: solid 2px #8B4513;
            color: #8B4513;
            box-shadow: 0 10px 20px rgba(139, 69, 19, 0.3);
        }

        .btn-back:active {
            border: solid 2px #8B4513;
            color: #8B4513;
        }

        .btn-back:active {
            transform: translateY(1px);
            border: solid 2px #8B4513;
            color: #8B4513;
        }

        .auth-footer {
            text-align: center;
            padding: 1.5rem;
            background-color: rgba(249, 245, 240, 0.8);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .auth-footer a {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .auth-footer a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
            z-index: 5;
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        .form-floating {
            position: relative;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-forgot a {
            font-weight: 600;
            color: var(--primary-dark);
        }

        /* Responsive adjustments */
        @media (max-width: 575.98px) {
            .auth-body {
                padding: 1.5rem;
            }
            
            .auth-header {
                padding: 1.5rem;
            }
            
            .auth-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Toggle password visibility
        document.querySelectorAll('.password-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.closest('.form-floating').querySelector('input');
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>

</html>