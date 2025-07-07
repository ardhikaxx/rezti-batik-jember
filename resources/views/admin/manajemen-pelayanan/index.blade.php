@extends('admin.app')

@section('title', 'Manajemen Pelayanan Edukasi')
@section('page-title', 'Daftar Booking Edukasi')

@section('content')
    <div class="col-xl-3 col-md-6 mb-2">
        <div class="card stat-card bg-primary-gradient shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white text-uppercase mb-1">Total Pelayanan Bulan Ini</h6>
                        <h3 class="text-white mb-0">Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}</h3>
                        <span class="text-white-50 small">{{ now()->translatedFormat('F Y') }}</span>
                    </div>
                    <div class="bg-white-10 p-3 rounded">
                        <i class="fas fa-wallet text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div
            class="card-header bg-white border-0 d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center py-3">
            <h6 class="mb-2 mb-md-0 fw-bold">Daftar Booking Edukasi Batik</h6>
            <div class="d-flex flex-column flex-md-row">
                <form action="{{ route('admin.manajemen-pelayanan.index') }}" method="GET"
                    class="d-flex flex-column flex-md-row">
                    <div class="input-group me-3 mb-2 mb-md-0" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama pelanggan..."
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div class="btn-group me-3 mb-2 mb-md-0" role="group">
                        <a href="{{ route('admin.manajemen-pelayanan.index', ['sort' => 'latest'] + request()->except('sort')) }}"
                            class="btn btn-outline-secondary {{ request('sort', 'latest') === 'latest' ? 'active' : '' }}">
                            <i class="fas fa-sort-amount-down me-1"></i> Terbaru
                        </a>
                        <a href="{{ route('admin.manajemen-pelayanan.index', ['sort' => 'oldest'] + request()->except('sort')) }}"
                            class="btn btn-outline-secondary {{ request('sort') === 'oldest' ? 'active' : '' }}">
                            <i class="fas fa-sort-amount-up me-1"></i> Terlama
                        </a>
                    </div>

                    <div class="input-group me-3 mb-2 mb-md-0" style="width: 200px;">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Terkonfirmasi
                            </option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan
                            </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
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
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->booking_date->format('d M Y') }} {{ $booking->booking_time }}</td>
                                <td>{{ $booking->pembeli->nama }}</td>
                                <td>{{ $booking->participant_count }}</td>
                                <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                <td>
                                    @if ($booking->status == 'pending')
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
                                    <div class="d-flex">
                                        <a href="{{ route('admin.manajemen-pelayanan.show', $booking->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2" title="Lihat Detail">
                                            <i class="fas fa-eye me-0 me-md-1"></i>
                                            <span class="d-none d-sm-inline">Detail</span>
                                        </a>

                                        <button
                                            onclick="sendWhatsAppMessage(
                    '{{ $booking->pembeli->no_hp }}',
                    '{{ $booking->pembeli->nama }}',
                    '{{ $booking->booking_date->format('d M Y') }}',
                    '{{ $booking->booking_time }}',
                    '{{ $booking->participant_count }}',
                    '{{ number_format($booking->price_per_person, 0, ',', '.') }}',
                    '{{ number_format($booking->total_price, 0, ',', '.') }}',
                    '{{ ucfirst(str_replace('_', ' ', $booking->payment_method)) }}'
                )"
                                            class="btn btn-sm btn-success" title="Hubungi via WhatsApp">
                                            <i class="fab fa-whatsapp me-0 me-md-1"></i>
                                            <span class="d-none d-sm-inline">WhatsApp</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada booking ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($bookings->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($bookings->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $bookings->previousPageUrl() }}"
                                        rel="prev">&laquo;</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                                @if ($page == $bookings->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link"
                                            style="color: var(--light-color);">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($bookings->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $bookings->nextPageUrl() }}" rel="next">&raquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">&raquo;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>

    <script>
        function sendWhatsAppMessage(noHp, nama, tanggal, jam, jumlahOrang, hargaPerOrang, totalHarga, metodePembayaran) {
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
                `Status booking Anda saat ini: ${document.querySelector(`tr:has(button[onclick*="${noHp}"]) .badge`).textContent}\n\n` +
                `Terima kasih telah memilih layanan edukasi batik kami.`;

            // Encode the message for URL
            let encodedPesan = encodeURIComponent(pesan);

            // Open WhatsApp with the message
            window.open(`https://wa.me/${formattedNoHp}?text=${encodedPesan}`, '_blank');
        }
    </script>
@endsection
