@extends('pembeli.app')

@section('title', 'Edit Profil')

@section('content')
<style>
    :root {
            --primary-color: #8B4513;
            --primary-light: #B68D65;
            --primary-dark: #5D2906;
            --secondary-color: #D2B48C;
            --light-color: #F9F5F0;
            --dark-color: #3E2723;
        }

    .form-control:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
    }
    
    .input-group-text {
        transition: all 0.3s ease;
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    
    hr {
        opacity: 1;
    }
    
    .was-validated .form-control:valid {
        border-color: #198754;
    }
    
    .was-validated .form-control:invalid {
        border-color: #dc3545;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4" style="border-color: var(--secondary-color) !important;">
                <div class="card-header py-3" style="background: linear-gradient(to right, var(--primary-color), var(--primary-light)); border-radius: 0.375rem 0.375rem 0 0 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 fw-bold text-white">
                            <i class="fas fa-user-edit me-2"></i>Edit Profil
                        </h4>
                        <a href="{{ route('pembeli.profile.index') }}" class="btn btn-sm" style="background-color: var(--primary-dark); color: white;">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: var(--light-color);">
                    <form method="POST" action="{{ route('pembeli.profile.update') }}" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama" class="form-label fw-medium" style="color: var(--dark-color);">
                                <i class="fas fa-user me-2" style="color: var(--primary-light);"></i>Nama Lengkap
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $pembeli->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium" style="color: var(--dark-color);">
                                <i class="fas fa-envelope me-2" style="color: var(--primary-light);"></i>Email
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $pembeli->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="no_hp" class="form-label fw-medium" style="color: var(--dark-color);">
                                <i class="fas fa-phone-alt me-2" style="color: var(--primary-light);"></i>Nomor Telepon
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $pembeli->no_hp) }}" required>
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg rounded-3 shadow-sm" style="background-color: var(--primary-dark); color: white;">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                    <hr class="my-4" style="border-top: 2px dashed var(--secondary-color);">

                    <h5 class="mb-4 fw-bold" style="color: var(--dark-color);">
                        <i class="fas fa-key me-2" style="color: var(--primary-light);"></i>Ubah Password
                    </h5>
                    <form method="POST" action="{{ route('pembeli.profile.update-password') }}" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="current_password" class="form-label fw-medium" style="color: var(--dark-color);">Password Saat Ini</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                                <button class="btn" type="button" id="toggleCurrentPassword" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-medium" style="color: var(--dark-color);">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                <button class="btn" type="button" id="togglePassword" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text">Minimal 8 karakter</div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-medium" style="color: var(--dark-color);">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                <button class="btn" type="button" id="togglePasswordConfirmation" style="background-color: var(--secondary-color); color: white;">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg rounded-3 shadow-sm" style="background-color: var(--primary-color); color: white;">
                                <i class="fas fa-key me-1"></i> Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    document.getElementById('toggleCurrentPassword').addEventListener('click', function() {
        togglePasswordVisibility('current_password', this);
    });
    
    document.getElementById('togglePassword').addEventListener('click', function() {
        togglePasswordVisibility('password', this);
    });
    
    document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
        togglePasswordVisibility('password_confirmation', this);
    });
    
    function togglePasswordVisibility(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    
    // Form validation
    (function () {
        'use strict'
        
        var forms = document.querySelectorAll('.needs-validation')
        
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection