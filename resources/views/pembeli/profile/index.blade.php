@extends('pembeli.app')

@section('title', 'Profil Saya')

@section('content')
    <style>
        :root {
            --primary-color: #8B4513;
            --primary-light: #B68D65;
            --primary-dark: #5D2906;
            --secondary-color: #D2B48C;
            --light-color: #F9F5F0;
            --dark-color: #3E2723;
            --gradient: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .profile-container {
            min-height: 100vh;
        }

        .profile-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-header {
            background: var(--gradient);
            padding: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
        }

        .detail-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--secondary-color);
            transition: all 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .detail-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(139, 69, 19, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-color);
        }

        .btn-edit {
            background: var(--gradient);
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        }

        .btn-address {
            background: var(--primary-dark);
            border: none;
            border-radius: 10px;
            padding: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-address:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(93, 41, 6, 0.3);
        }

        .member-badge {
            background-color: rgba(210, 180, 140, 0.3);
            color: var(--light-color);
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .custom-alert {
            border-left: 4px solid var(--primary-color);
            background-color: rgba(139, 69, 19, 0.1);
            border-radius: 8px;
        }
    </style>

    <div class="profile-container">
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="profile-card mb-5">
                        <div class="profile-header text-center">
                            <h2 class="fw-bold mb-1">{{ $pembeli->nama }}</h2>
                            <span class="member-badge">
                                <i class="fas fa-calendar-alt me-1"></i> 
                                Member sejak {{ $pembeli->created_at->format('d M Y') }}
                            </span>
                        </div>
                        
                        <div class="card-body p-3">
                            @if (session('success'))
                                <div class="alert custom-alert alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
                                    <i class="fas fa-check-circle me-2" style="color: var(--primary-color); font-size: 1.5rem;"></i>
                                    <div class="flex-grow-1">{{ session('success') }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            <div class="d-flex justify-content-end mb-3">
                                <a href="{{ route('pembeli.profile.edit') }}" class="btn btn-edit text-white">
                                    <i class="fas fa-edit me-1"></i> Edit Profil
                                </a>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="detail-card h-auto">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="detail-icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <h5 class="mb-0 fw-bold" style="color: var(--dark-color);">Email</h5>
                                        </div>
                                        <p class="ps-5 mb-0">{{ $pembeli->email }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-2">
                                    <div class="detail-card h-auto">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="detail-icon">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <h5 class="mb-0 fw-bold" style="color: var(--dark-color);">Nomor Telepon</h5>
                                        </div>
                                        <p class="ps-5 mb-0">{{ $pembeli->no_hp }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-2">
                                <a href="{{ route('pembeli.shipping-address.index') }}" class="btn btn-address text-white">
                                    <i class="fas fa-map-marker-alt me-2"></i> Kelola Alamat Pengiriman
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection