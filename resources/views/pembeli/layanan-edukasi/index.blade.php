@extends('pembeli.app')

@section('title', 'Booking Saya')

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
        transition: all 0.3s ease;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .booking-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .booking-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 20px;
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

    .booking-detail {
        padding: 20px;
        background-color: white;
    }

    .detail-label {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 5px;
    }

    .detail-value {
        color: #555;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
    }

    .empty-icon {
        font-size: 4rem;
        color: var(--primary-light);
        margin-bottom: 20px;
    }

    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .pagination .page-link {
        color: var(--primary-color);
    }
</style>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold mb-1" style="color: var(--primary-dark);">
                <i class="fas fa-calendar-alt me-2"></i> Booking Layanan Edukasi
            </h2>
            <p class="text-muted mb-0">Daftar booking layanan edukasi membatik Anda</p>
        </div>
        <a href="{{ route('pembeli.layanan-edukasi.create') }}" class="btn btn-primary" style="background-color: var(--primary-color); border: none;">
            <i class="fas fa-plus me-2"></i> Booking Baru
        </a>
    </div>

    @if ($bookings->isEmpty())
        <div class="booking-card">
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-calendar-times"></i>
                </div>
                <h4 class="mb-3" style="color: var(--primary-dark);">Belum Ada Booking</h4>
                <p class="text-muted mb-4">Anda belum memiliki booking layanan edukasi membatik</p>
                <a href="{{ route('pembeli.layanan-edukasi.create') }}" class="btn btn-primary" style="background-color: var(--primary-color); border: none;">
                    <i class="fas fa-plus me-2"></i> Buat Booking Baru
                </a>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($bookings as $booking)
                <div class="col-lg-6">
                    <div class="booking-card">
                        <div class="booking-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0">Booking #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</h5>
                                <p class="mb-0 text-white-50">{{ $booking->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div>
                                @if($booking->status == 'pending')
                                    <span class="status-badge status-pending">Menunggu Konfirmasi</span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="status-badge status-confirmed">Terkonfirmasi</span>
                                @else
                                    <span class="status-badge status-cancelled">Dibatalkan</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="booking-detail">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="detail-label">Tanggal Booking</div>
                                    <div class="detail-value">
                                        <i class="fas fa-calendar-day me-2" style="color: var(--primary-color);"></i>
                                        {{ $booking->booking_date->format('d M Y') }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-label">Waktu</div>
                                    <div class="detail-value">
                                        <i class="fas fa-clock me-2" style="color: var(--primary-color);"></i>
                                        {{ $booking->booking_time }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="detail-label">Jumlah Peserta</div>
                                    <div class="detail-value">
                                        <i class="fas fa-users me-2" style="color: var(--primary-color);"></i>
                                        {{ $booking->participant_count }} orang
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-label">Total Harga</div>
                                    <div class="detail-value">
                                        <i class="fas fa-tag me-2" style="color: var(--primary-color);"></i>
                                        Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <div>
                                    <a href="{{ route('pembeli.layanan-edukasi.show', $booking->id) }}" class="action-btn btn me-2" style="background-color: var(--primary-dark); color: var(--light-color);" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($booking->status == 'pending')
                                        <form action="{{ route('pembeli.layanan-edukasi.cancel', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="action-btn btn btn-danger" title="Batalkan" onclick="return confirm('Yakin ingin membatalkan booking?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div>
                                    <small class="text-muted">Terakhir diperbarui: {{ $booking->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $bookings->links() }}
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any interactive JavaScript here if needed
    });
</script>
@endsection