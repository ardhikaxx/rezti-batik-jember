@extends('pembeli.app')

@section('title', 'Detail Booking')

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
            color: #333;
        }

        .booking-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .booking-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 20px;
        }

        .detail-section {
            padding: 25px;
            background-color: white;
        }

        .section-title {
            color: var(--primary-dark);
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-color);
        }

        .detail-item {
            display: flex;
            margin-bottom: 15px;
            align-items: flex-start;
        }

        .detail-icon {
            width: 36px;
            height: 36px;
            background-color: rgba(139, 69, 19, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-color);
            flex-shrink: 0;
        }

        .detail-label {
            font-weight: 600;
            color: var(--dark-color);
            width: 150px;
            flex-shrink: 0;
        }

        .detail-value {
            color: #555;
            flex-grow: 1;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-pending {
            background-color: #FFF3CD;
            color: #856404;
        }

        .status-confirmed {
            background-color: #D4EDDA;
            color: #155724;
        }

        .status-cancelled {
            background-color: #F8D7DA;
            color: #721C24;
        }

        .notes-card {
            background-color: rgba(210, 180, 140, 0.1);
            border-left: 4px solid var(--primary-color);
            border-radius: 0 8px 8px 0;
            padding: 15px;
            margin: 20px 0;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
        }

        .breadcrumb-item.active {
            color: var(--primary-color);
            font-weight: 500;
        }
    </style>

    <div class="container py-5">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 gap-md-0 mb-5">
            <div>
                <h2 class="fw-bold mb-1" style="color: var(--primary-dark);">
                    <i class="fas fa-calendar-check me-2"></i> Detail Booking
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('pembeli.layanan-edukasi.index') }}">Booking Saya</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}
                        </li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('pembeli.layanan-edukasi.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                <span class="d-none d-sm-inline">Kembali</span>
                <span class="d-inline d-sm-none">Back</span>
            </a>
        </div>

        <div class="booking-card">
            <div class="booking-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Booking #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</h4>
                        <p class="mb-0 text-white-50">Dibuat pada {{ $booking->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <div>
                        @if ($booking->status == 'pending')
                            <span class="status-badge status-pending">
                                <span class="d-none d-md-inline">Menunggu Konfirmasi</span>
                                <span class="d-inline d-md-none">Pending</span>
                            </span>
                        @elseif($booking->status == 'confirmed')
                            <span class="status-badge status-confirmed">
                                <span class="d-none d-md-inline">Terkonfirmasi</span>
                                <span class="d-inline d-md-none">Confirmed</span>
                            </span>
                        @else
                            <span class="status-badge status-cancelled">
                                <span class="d-none d-md-inline">Dibatalkan</span>
                                <span class="d-inline d-md-none">Batal</span>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="detail-section">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="section-title">
                            <i class="fas fa-info-circle me-2"></i> Informasi Booking
                        </h5>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <div class="detail-label">Tanggal</div>
                            <div class="detail-value">{{ $booking->booking_date->format('d M Y') }}</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="detail-label">Waktu</div>
                            <div class="detail-value">{{ $booking->booking_time }}</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="detail-label">Jumlah Peserta</div>
                            <div class="detail-value">{{ $booking->participant_count }} orang</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-tag"></i>
                            </div>
                            <div class="detail-label">Status</div>
                            <div class="detail-value">
                                @if ($booking->status == 'pending')
                                    <span class="status-badge status-pending">
                                        <span class="d-none d-md-inline">Menunggu Konfirmasi</span>
                                        <span class="d-inline d-md-none">Pending</span>
                                    </span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="status-badge status-confirmed">
                                        <span class="d-none d-md-inline">Terkonfirmasi</span>
                                        <span class="d-inline d-md-none">Confirmed</span>
                                    </span>
                                @else
                                    <span class="status-badge status-cancelled">
                                        <span class="d-none d-md-inline">Dibatalkan</span>
                                        <span class="d-inline d-md-none">Batal</span>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h5 class="section-title">
                            <i class="fas fa-credit-card me-2"></i> Informasi Pembayaran
                        </h5>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div class="detail-label">Metode Pembayaran</div>
                            <div class="detail-value">{{ $booking->payment_method }}</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="detail-label">Harga per Orang</div>
                            <div class="detail-value">Rp {{ number_format($booking->price_per_person, 0, ',', '.') }}</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <div class="detail-label">Total Harga</div>
                            <div class="detail-value">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-receipt"></i>
                            </div>
                            <div class="detail-label">Bukti Pembayaran</div>
                            <div class="detail-value">
                                <a href="{{ $booking->payment_proof_url }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>
                                    <span class="d-none d-md-inline">Lihat Bukti</span>
                                    <span class="d-inline d-md-none">Lihat</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($booking->notes)
                    <div class="notes-card">
                        <h6 class="mb-2" style="color: var(--primary-dark);">
                            <i class="fas fa-sticky-note me-2"></i> Catatan Tambahan
                        </h6>
                        <p class="mb-0">{{ $booking->notes }}</p>
                    </div>
                @endif

                @if ($booking->status == 'pending')
                    <div class="mt-4 pt-3 border-top text-end">
                        <form action="{{ route('pembeli.layanan-edukasi.cancel', $booking->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin membatalkan booking?')">
                                <i class="fas fa-times me-2"></i> Batalkan Booking
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add any interactive JavaScript here if needed
        });
    </script>
@endsection
