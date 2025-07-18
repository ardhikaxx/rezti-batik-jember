@extends('pembeli.app')

@section('title', 'Alamat Pengiriman')

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

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .address-detail {
            transition: all 0.3s ease;
            border-left: 3px solid var(--secondary-color);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
        }

        .dropdown-item:active {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        @media (max-width: 576px) {

            h4,
            h5 {
                font-size: 1.1rem;
            }

            .address-detail {
                padding: 0.75rem !important;
            }

            .card-body {
                padding: 1rem !important;
            }
        }
    </style>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 rounded-3 shadow-sm" style="background-color: var(--light-color);">
                    <div class="card-header py-3"
                        style="background: linear-gradient(to right, var(--primary-color), var(--primary-light)); border-radius: 0.375rem 0.375rem 0 0;">
                        <div
                            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                            <h4 class="mb-0 fw-bold text-white">
                                <i class="fas fa-map-marker-alt me-2"></i>Daftar Alamat Pengiriman
                            </h4>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('pembeli.profile.index') }}" class="btn btn-sm"
                                    style="background-color: var(--primary-dark); color: white;">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    <span class="d-none d-sm-inline">Kembali</span>
                                    <span class="d-inline d-sm-none">Back</span>
                                </a>
                                <a href="{{ route('pembeli.shipping-address.create') }}" class="btn btn-sm"
                                    style="background-color: var(--primary-dark); color: white;">
                                    <i class="fas fa-plus me-1"></i>
                                    <span class="d-none d-sm-inline">Tambah Alamat</span>
                                    <span class="d-inline d-sm-none">Tambah</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body rounded-3" style="background-color: var(--light-color);">
                        @if (session('success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: '{{ session('success') }}',
                                        confirmButtonColor: '#8B4513'
                                    });
                                });
                            </script>
                        @endif

                        <div class="row g-4">
                            @forelse($addresses as $address)
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm rounded-3 p-3"
                                        style="{{ $address->is_default ? 'border-left: 4px solid var(--primary-color);' : '' }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div>
                                                    <h5 class="card-title fw-bold" style="color: var(--dark-color);">
                                                        {{ $address->recipient_name }}
                                                        @if ($address->is_default)
                                                            <span class="badge ms-2"
                                                                style="background-color: var(--primary-color);">Default</span>
                                                        @endif
                                                    </h5>
                                                    <p class="text-muted small mb-0">
                                                        <i class="fas fa-phone me-1"></i> {{ $address->phone_number }}
                                                    </p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm p-0" type="button"
                                                        id="dropdownMenuButton{{ $address->id }}" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fs-5"
                                                            style="color: var(--primary-light);"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton{{ $address->id }}">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('pembeli.shipping-address.edit', $address->id) }}">
                                                                <i class="fas fa-edit me-2"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form
                                                                action="{{ route('pembeli.shipping-address.destroy', $address->id) }}"
                                                                method="POST" class="d-inline delete-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="dropdown-item text-danger delete-btn">
                                                                    <i class="fas fa-trash me-2"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="address-detail p-3 rounded-2 mb-3" style="background-color: white;">
                                                <p class="mb-2">
                                                    <i class="fas fa-map-marker-alt me-2"
                                                        style="color: var(--primary-light);"></i>
                                                    {{ $address->address }}
                                                </p>
                                                @if ($address->province || $address->city || $address->district)
                                                    <p class="text-muted small mb-0">
                                                        {{ $address->district }}, {{ $address->city }},
                                                        {{ $address->province }} {{ $address->postal_code }}
                                                    </p>
                                                @endif
                                            </div>

                                            @if (!$address->is_default)
                                                <form
                                                    action="{{ route('pembeli.shipping-address.set-default', $address->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm w-100 rounded-3"
                                                        style="background-color: var(--secondary-color); color: var(--dark-color);">
                                                        <i class="fas fa-check-circle me-1"></i> Jadikan Default
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info text-center py-4">
                                        <i class="fas fa-info-circle fa-2x mb-3" style="color: var(--primary-light);"></i>
                                        <h5 class="fw-bold">Belum ada alamat pengiriman</h5>
                                        <p class="mb-0">Tambahkan alamat pengiriman untuk mempermudah proses checkout</p>
                                        <a href="{{ route('pembeli.shipping-address.create') }}" class="btn mt-3"
                                            style="background-color: var(--primary-color); color: white;">
                                            <i class="fas fa-plus me-1"></i> Tambah Alamat
                                        </a>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: 'Data alamat ini akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#aaa',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            btn.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
