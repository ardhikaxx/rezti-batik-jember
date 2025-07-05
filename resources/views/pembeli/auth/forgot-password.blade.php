@extends('pembeli.auth.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="auth-card animate__animated animate__fadeInUp">
                    <div class="auth-header">
                        <img src="{{ asset('img/logo-reztis-batik.png') }}" alt="Reztis Batik" class="auth-logo">
                        <h2>Reset Password</h2>
                        <p>Masukkan password baru Anda</p>
                    </div>

                    <div class="auth-body">
                        <form method="POST" action="{{ route('pembeli.password.update') }}" class="needs-validation" novalidate>
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password Baru" required
                                    autocomplete="new-password">
                                <label for="password"><i class="fas fa-lock me-2"></i>Password Baru</label>
                                <span class="password-toggle">
                                    <i class="fas fa-eye"></i>
                                </span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control"
                                    id="password_confirmation" name="password_confirmation" 
                                    placeholder="Konfirmasi Password" required autocomplete="new-password">
                                <label for="password_confirmation"><i class="fas fa-lock me-2"></i>Konfirmasi Password</label>
                                <span class="password-toggle">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <button type="submit" class="btn btn-auth w-100 text-white mb-2">
                                    <i class="fas fa-sync-alt me-2"></i> Reset Password
                                </button>

                                <a href="{{ route('pembeli.login') }}" class="btn btn-back w-100">
                                    <span><i class="fas fa-arrow-left me-2"></i> Kembali ke Login</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection