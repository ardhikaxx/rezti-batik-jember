@extends('pembeli.auth.auth')

@section('title', 'Login Pembeli')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="auth-card animate__animated animate__fadeInUp">
                    <div class="auth-header">
                        <img src="{{ asset('img/logo-reztis-batik.png') }}" alt="Reztis Batik" class="auth-logo">
                        <h2>Masuk ke Akun Anda</h2>
                        <p>Silakan login untuk melanjutkan belanja</p>
                    </div>

                    <div class="auth-body">
                        <form method="POST" action="{{ route('pembeli.login') }}" class="needs-validation" novalidate>
                            @csrf

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', Cookie::get('remember_email')) }}" placeholder="name@example.com"
                                    required autocomplete="email" autofocus>
                                <label for="email"><i class="fas fa-envelope me-2"></i>Alamat Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password" required
                                    autocomplete="current-password">
                                <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                                <span class="password-toggle">
                                    <i class="fas fa-eye"></i>
                                </span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                        {{ old('remember') || Cookie::get('remember_email') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-semibold" style="color: var(--primary-dark)" for="remember">
                                        Ingat Saya
                                    </label>
                                </div>
                                <div class="form-forgot">
                                    <a href="{{ route('pembeli.password.request') }}" class="text-decoration-none">Lupa Password?</a>
                                </div>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <button type="submit" class="btn btn-auth w-100 text-white mb-2">
                                    <i class="fas fa-sign-in-alt me-2"></i> Masuk
                                </button>

                                <a href="{{ route('index') }}" type="submit" class="btn btn-back w-100">
                                    <span><i class="fas fa-home me-2"></i> Kembali ke Beranda</span>
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="auth-footer">
                        Belum punya akun? <a href="{{ route('pembeli.register') }}">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: `<ul class="text-left">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                confirmButtonColor: '#8B4513'
            });
        @endif
    </script>
@endsection