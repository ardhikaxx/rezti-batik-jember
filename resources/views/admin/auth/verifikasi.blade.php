<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email - Reztis Batik Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo-brand.png') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #8B4513;
            --primary-light: #B68D65;
            --primary-dark: #5D2906;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .login-header h3 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-body {
            padding: 2rem;
            background-color: white;
        }

        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            height: 50px;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .login-footer {
            text-align: center;
            padding: 1rem;
            background-color: #f8f9fa;
            border-top: 1px solid #e0e0e0;
        }

        .input-group-text {
            background-color: white;
            border-right: none;
        }

        .email-input {
            border-left: none;
        }

        .logo {
            width: 80px;
            margin-bottom: 1rem;
        }

        .back-to-login {
            text-align: center;
            margin-top: 1rem;
        }

        .back-to-login a {
            color: var(--primary-dark);
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-card mx-auto">
                    <div class="login-header">
                        <img src="{{ asset('img/logo-reztis-batik.png') }}" alt="Reztis Batik" class="logo">
                        <h3>Reset Password Admin</h3>
                        <p>Masukkan email untuk verifikasi</p>
                    </div>

                    <div class="login-body">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.password.email') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email"
                                        class="form-control email-input @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-check-circle me-2"></i> Verifikasi Email
                                </button>
                            </div>
                        </form>

                        <div class="back-to-login">
                            <a href="{{ route('admin.login') }}"><i class="fas fa-arrow-left me-2"></i>Kembali ke Login</a>
                        </div>
                    </div>

                    <div class="login-footer">
                        <p class="mb-0">© {{ date('Y') }} Reztis Batik. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonColor: '#8B4513',
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if ($errors->any()))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: `<ul class="text-left">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                confirmButtonColor: '#8B4513'
            });
        @endif
    </script>
</body>

</html>