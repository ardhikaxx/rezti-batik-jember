@extends('pembeli.auth.auth')

@section('title', 'Lupa Password')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="auth-card animate__animated animate__fadeInUp">
                    <div class="auth-header">
                        <img src="{{ asset('img/logo-reztis-batik.png') }}" alt="Reztis Batik" class="auth-logo">
                        <h2>Lupa Password</h2>
                        <p>Masukkan email Anda untuk verifikasi</p>
                    </div>

                    <div class="auth-body">
                        <form method="POST" action="{{ route('pembeli.password.email') }}" class="needs-validation"
                            novalidate>
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com"
                                    required autocomplete="email" autofocus>
                                <label for="email"><i class="fas fa-envelope me-2"></i>Alamat Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <button type="submit" class="btn btn-auth w-100 text-white mb-2">
                                    <i class="fas fa-check-circle me-2"></i> Verifikasi Email
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

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if ($errors->has('email'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ $errors->first('email') }}',
                confirmButtonColor: '#8B4513'
            });
        @endif
    </script>
@endsection
