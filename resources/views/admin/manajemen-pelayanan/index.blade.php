@extends('admin.app')

@section('title', 'Manajemen Pelayanan Edukasi')
@section('page-title', 'Daftar Booking Edukasi')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 fw-bold">Daftar Booking Edukasi Batik</h6>
        <div class="d-flex">
            <div class="input-group me-3" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Cari booking...">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="bookingsTable">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal Booking</th>
                        <th>Pelanggan</th>
                        <th>Jumlah Orang</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_date->format('d M Y') }} {{ $booking->booking_time }}</td>
                        <td>{{ $booking->pembeli->nama }}</td>
                        <td>{{ $booking->participant_count }}</td>
                        <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        <td>
                            @if($booking->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="badge bg-success">Terkonfirmasi</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="badge bg-danger">Batal</span>
                            @else
                                <span class="badge bg-secondary">{{ $booking->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.manajemen-pelayanan.show', $booking->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="https://wa.me/{{ $booking->pembeli->no_hp }}" target="_blank" class="btn btn-sm btn-success">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#bookingsTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari booking...",
                paginate: {
                    previous: "<i class='fas fa-chevron-left'></i>",
                    next: "<i class='fas fa-chevron-right'></i>"
                }
            }
        });
    });
</script>
@endpush
@endsection