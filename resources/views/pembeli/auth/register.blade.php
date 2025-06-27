@extends('pembeli.auth.auth')

@section('title', 'Register Pembeli')

@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="auth-card animate__animated animate__fadeInUp">
                    <div class="auth-header">
                        <img src="{{ asset('admin/img/logo-white.png') }}" alt="Reztis Batik" class="auth-logo">
                        <h2>Buat Akun Baru</h2>
                        <p>Bergabunglah dengan komunitas Reztis Batik</p>
                    </div>

                    <div class="auth-body">
                        <form method="POST" action="{{ route('pembeli.register') }}" class="needs-validation" novalidate>
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap"
                                    required autocomplete="name" autofocus>
                                <label for="nama"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com"
                                    required autocomplete="email">
                                <label for="email"><i class="fas fa-envelope me-2"></i>Alamat Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control @error('no_hp') is-invalid @enderror"
                                    id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="081234567890"
                                    required>
                                <label for="no_hp"><i class="fas fa-phone me-2"></i>Nomor Telepon</label>
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                    placeholder="Alamat Lengkap" required style="height: 100px">{{ old('alamat') }}</textarea>
                                <label for="alamat"><i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap</label>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password" required
                                    autocomplete="new-password">
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

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="password-confirm"
                                    name="password_confirmation" placeholder="Konfirmasi Password" required
                                    autocomplete="new-password">
                                <label for="password-confirm"><i class="fas fa-lock me-2"></i>Konfirmasi Password</label>
                                <span class="password-toggle">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>

                            <button type="submit" class="btn btn-auth w-100 text-white">
                                <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                            </button>
                        </form>
                    </div>

                    <div class="auth-footer">
                        Sudah punya akun? <a href="{{ route('pembeli.login') }}">Masuk Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
