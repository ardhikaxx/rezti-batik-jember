@extends('admin.app')

@section('title', 'Detail Booking Edukasi')
@section('page-title', 'Detail Booking Edukasi')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 fw-bold">Informasi Booking</h6>
                    <span
                        class="badge bg-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'confirmed' ? 'primary' : ($booking->status == 'completed' ? 'success' : 'secondary')) }}">
                        {{ $booking->status_label }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold">Detail Pelanggan</h6>
                            <p class="mb-1">{{ $booking->pembeli->nama }}</p>
                            <p class="mb-1">{{ $booking->pembeli->email }}</p>
                            <p class="mb-1">{{ $booking->pembeli->no_hp }}</p>
                            <p class="mb-1">{{ $booking->pembeli->alamat }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold">Detail Booking</h6>
                            <p class="mb-1"><strong>Tanggal:</strong> {{ $booking->booking_date->format('d M Y') }}</p>
                            <p class="mb-1"><strong>Waktu:</strong> {{ $booking->booking_time }}</p>
                            <p class="mb-1"><strong>Jumlah Orang:</strong> {{ $booking->participant_count }}</p>
                            <p class="mb-1"><strong>Harga per Orang:</strong> Rp
                                {{ number_format($booking->price_per_person, 0, ',', '.') }}</p>
                            <p class="mb-1"><strong>Total:</strong> Rp
                                {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            <p class="mb-1"><strong>Metode Pembayaran:</strong>
                                {{ ucfirst(str_replace('_', ' ', $booking->payment_method)) }}</p>
                        </div>
                    </div>

                    @if ($booking->notes)
                        <div class="mb-4">
                            <h6 class="fw-bold">Catatan Tambahan</h6>
                            <p>{{ $booking->notes }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold">Bukti Pembayaran</h6>
                </div>
                <div class="card-body text-center">
                    @if ($booking->payment_proof)
                        <img src="{{ $booking->payment_proof_url }}" alt="Bukti Pembayaran" class="img-fluid mb-3"
                            style="max-height: 200px;">
                        <a href="{{ $booking->payment_proof_url }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fas fa-download me-1"></i> Download
                        </a>
                    @else
                        <p class="text-muted">Belum ada bukti pembayaran</p>
                    @endif
                </div>
            </div>

            @if (in_array($booking->status, ['pending', 'confirmed']))
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 fw-bold">Update Status</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.manajemen-pelayanan.update-status', $booking->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>
                                        Terkonfirmasi</option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                        Dibatalkan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Status</button>
                        </form>
                    </div>
                </div>
            @endif

            <div class="card shadow-sm mt-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold">Hubungi Pelanggan</h6>
                </div>
                <div class="card-body text-center">
                    <button
                        onclick="sendWhatsAppMessage(
            '{{ $booking->pembeli->no_hp }}',
            '{{ $booking->pembeli->nama }}',
            '{{ $booking->booking_date->format('d M Y') }}',
            '{{ $booking->booking_time }}',
            '{{ $booking->participant_count }}',
            '{{ number_format($booking->price_per_person, 0, ',', '.') }}',
            '{{ number_format($booking->total_price, 0, ',', '.') }}',
            '{{ ucfirst(str_replace('_', ' ', $booking->payment_method)) }}',
            '{{ $booking->status_label }}'
        )"
                        class="btn btn-success w-100">
                        <i class="fab fa-whatsapp me-2"></i> WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendWhatsAppMessage(noHp, nama, tanggal, jam, jumlahOrang, hargaPerOrang, totalHarga, metodePembayaran,
            status) {
            // Format nomor HP (remove +62 if exists and replace with 62)
            let formattedNoHp = noHp.replace(/^\+62/, '62').replace(/^0/, '62');

            // Create the message template
            let pesan = `Halo ${nama},\n\n` +
                `Berikut detail booking edukasi batik Anda:\n\n` +
                `- Tanggal: ${tanggal}\n` +
                `- Waktu: ${jam}\n` +
                `- Jumlah Orang: ${jumlahOrang} orang\n` +
                `- Harga per Orang: Rp ${hargaPerOrang}\n` +
                `- Total Harga: Rp ${totalHarga}\n` +
                `- Metode Pembayaran: ${metodePembayaran}\n\n` +
                `Status booking Anda saat ini: ${status}\n\n` +
                `Terima kasih telah memilih layanan edukasi batik kami.`;

            // Encode the message for URL
            let encodedPesan = encodeURIComponent(pesan);

            // Open WhatsApp with the message
            window.open(`https://wa.me/${formattedNoHp}?text=${encodedPesan}`, '_blank');
        }
    </script>
@endsection
