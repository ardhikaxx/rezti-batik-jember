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

        .profile-container {
            min-height: 100vh;
            padding: 2rem 0;
        }

        /* Profile Header */
        .profile-header {
            background: var(--gradient);
            padding: 2.5rem 1.5rem;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-radius: 15px 15px 0 0;
        }

        .profile-header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            transform: rotate(30deg);
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2.5rem;
            color: white;
            border: 3px solid white;
        }

        .member-badge {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            display: inline-block;
            margin-top: 0.5rem;
        }

        /* Profile Content */
        .profile-content {
            background: white;
            padding: 2rem;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .profile-details {
            margin: 1.5rem 0;
        }

        .profile-detail-item {
            padding: 1.25rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        }

        .profile-detail-item:last-child {
            border-bottom: none;
        }

        .detail-content {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .detail-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background-color: rgba(139, 69, 19, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1rem;
            flex-shrink: 0;
        }

        .detail-text {
            flex-grow: 1;
        }

        .detail-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
        }

        .detail-info {
            color: var(--dark-color);
            font-size: 1rem;
            word-break: break-word;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .profile-detail-item {
                padding: 1rem 0;
            }

            .detail-icon {
                width: 36px;
                height: 36px;
                font-size: 0.9rem;
            }

            .detail-label {
                font-size: 0.85rem;
            }

            .detail-info {
                font-size: 0.95rem;
            }
        }

        /* Buttons */
        .btn-edit {
            background: var(--gradient);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 200px;
        }

        .btn-edit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(139, 69, 19, 0.3);
        }

        .btn-address {
            background: var(--primary-dark);
            border: none;
            border-radius: 10px;
            padding: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-address:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(93, 41, 6, 0.3);
        }

        /* Alert */
        .custom-alert {
            border-left: 4px solid var(--primary-color);
            background-color: rgba(139, 69, 19, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .custom-alert i {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 767.98px) {
            .profile-header {
                padding: 1.5rem;
            }

            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }

            .profile-content {
                padding: 1.5rem;
            }

            .detail-card {
                padding: 1.25rem;
            }

            .detail-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .detail-value {
                padding-left: 56px;
                font-size: 1rem;
            }

            .btn-edit,
            .btn-address {
                padding: 0.75rem;
                font-size: 0.9rem;
            }
        }
    </style>

    <div class="profile-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Profile Card -->
                    <div class="profile-card">
                        <!-- Profile Header -->
                        <div class="profile-header">
                            <div class="profile-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $pembeli->nama }}</h2>
                            <span class="member-badge">
                                <i class="fas fa-calendar-alt me-1"></i>
                                Member sejak {{ $pembeli->created_at->format('d M Y') }}
                            </span>
                        </div>

                        <!-- Profile Content -->
                        <div class="profile-content">
                            @if (session('success'))
                                <div class="custom-alert">
                                    <i class="fas fa-check-circle"></i>
                                    <div>{{ session('success') }}</div>
                                </div>
                            @endif

                            <!-- Edit Profile Button -->
                            <div class="d-flex justify-content-center mb-4">
                                <a href="{{ route('pembeli.profile.edit') }}" class="btn btn-edit text-white">
                                    <i class="fas fa-edit me-2"></i> Edit Profil
                                </a>
                            </div>

                            <!-- Profile Details -->
                            <div class="profile-details">
                                <div class="profile-detail-item">
                                    <div class="detail-content">
                                        <div class="detail-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="detail-text">
                                            <div class="detail-label">Email</div>
                                            <div class="detail-info">{{ $pembeli->email }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-detail-item">
                                    <div class="detail-content">
                                        <div class="detail-icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="detail-text">
                                            <div class="detail-label">Nomor Telepon</div>
                                            <div class="detail-info">{{ $pembeli->no_hp }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Manage Address Button -->
                            <div class="mt-4">
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
