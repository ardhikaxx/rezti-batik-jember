@extends('admin.app')

@section('title', 'Profile saya')
@section('page-title', 'Profile Saya')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="profile-picture mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::guard('admin')->user()->nama_lengkap) }}&background=random&size=150"
                            class="rounded-circle" alt="Profile Picture">
                    </div>
                    <h4 class="mb-1">{{ Auth::guard('admin')->user()->nama_lengkap }}</h4>
                    <p class="text-muted mb-3">{{ Auth::guard('admin')->user()->email }}</p>
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit me-1"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Informasi Profile</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">Nama Lengkap:</div>
                        <div class="col-sm-9">{{ Auth::guard('admin')->user()->nama_lengkap }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">Email:</div>
                        <div class="col-sm-9">{{ Auth::guard('admin')->user()->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">Nomor Telepon:</div>
                        <div class="col-sm-9">{{ Auth::guard('admin')->user()->telepon }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">Jenis Kelamin:</div>
                        <div class="col-sm-9">{{ Auth::guard('admin')->user()->jenis_kelamin }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">Bergabung Pada:</div>
                        <div class="col-sm-9">{{ Auth::guard('admin')->user()->created_at->format('d F Y H:i') }}</div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Ubah Password</h5>
                </div>
                <div class="card-body">
                    <form id="changePasswordForm" action="{{ route('admin.profile.change-password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Saat Ini</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                       id="current_password" name="current_password" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                                       id="new_password" name="new_password" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Minimal 8 karakter, mengandung huruf besar, kecil, angka, dan simbol</small>
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new_password_confirmation"
                                    name="new_password_confirmation" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Password Baru
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            document.querySelectorAll('.toggle-password').forEach(function(button) {
                button.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('input');
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

            // Show success message from redirect
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif
        });
    </script>
@endsection