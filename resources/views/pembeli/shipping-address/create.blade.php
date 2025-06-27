@extends('pembeli.app')

@section('title', 'Tambah Alamat Pengiriman')

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

        .form-control:focus,
        .form-select:focus {
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

        .was-validated .form-control:valid {
            border-color: #198754;
        }

        .was-validated .form-control:invalid {
            border-color: #dc3545;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4" style="border-color: var(--secondary-color) !important;">
                    <div class="card-header py-3"
                        style="background: linear-gradient(to right, var(--primary-color), var(--primary-light)); border-radius: 0.375rem 0.375rem 0 0 !important;">
                        <h4 class="mb-0 fw-bold text-white">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Alamat Pengiriman
                        </h4>
                    </div>

                    <div class="card-body" style="background-color: var(--light-color);">
                        <form method="POST" action="{{ route('pembeli.shipping-address.store') }}" class="needs-validation"
                            novalidate>
                            @csrf

                            <div class="mb-4">
                                <label for="recipient_name" class="form-label fw-medium" style="color: var(--dark-color);">
                                    <i class="fas fa-user me-2" style="color: var(--primary-light);"></i>Nama Penerima
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="background-color: var(--secondary-color); color: white;">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control @error('recipient_name') is-invalid @enderror"
                                        id="recipient_name" name="recipient_name"
                                        value="{{ old('recipient_name', auth('pembeli')->user()->nama) }}" required>
                                    @error('recipient_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="phone_number" class="form-label fw-medium" style="color: var(--dark-color);">
                                    <i class="fas fa-phone-alt me-2" style="color: var(--primary-light);"></i>Nomor Telepon
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="background-color: var(--secondary-color); color: white;">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" name="phone_number"
                                        value="{{ old('phone_number', auth('pembeli')->user()->no_hp) }}" required>
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="address" class="form-label fw-medium" style="color: var(--dark-color);">
                                    <i class="fas fa-map-marker-alt me-2" style="color: var(--primary-light);"></i>Alamat
                                    Lengkap
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text align-items-start"
                                        style="background-color: var(--secondary-color); color: white;">
                                        <i class="fas fa-map-marker-alt mt-2"></i>
                                    </span>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                        required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="province" class="form-label fw-medium" style="color: var(--dark-color);">
                                        <i class="fas fa-map me-2" style="color: var(--primary-light);"></i>Provinsi
                                    </label>
                                    <input type="text" class="form-control" id="province" name="province"
                                        value="{{ old('province') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label fw-medium" style="color: var(--dark-color);">
                                        <i class="fas fa-city me-2" style="color: var(--primary-light);"></i>Kota/Kabupaten
                                    </label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        value="{{ old('city') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="district" class="form-label fw-medium" style="color: var(--dark-color);">
                                        <i class="fas fa-map-pin me-2" style="color: var(--primary-light);"></i>Kecamatan
                                    </label>
                                    <input type="text" class="form-control" id="district" name="district"
                                        value="{{ old('district') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="postal_code" class="form-label fw-medium" style="color: var(--dark-color);">
                                        <i class="fas fa-mail-bulk me-2" style="color: var(--primary-light);"></i>Kode Pos
                                    </label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code"
                                        value="{{ old('postal_code') }}">
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="{{ route('pembeli.shipping-address.index') }}"
                                    class="btn btn-lg rounded-3 shadow-sm me-md-2"
                                    style="background-color: var(--secondary-color); color: var(--dark-color);">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-lg rounded-3 shadow-sm"
                                    style="background-color: var(--primary-dark); color: white;">
                                    <i class="fas fa-save me-1"></i> Simpan Alamat
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form validation
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
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
