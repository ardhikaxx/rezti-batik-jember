@extends('admin.app')

@section('title', 'Manajemen Pesanan')
@section('page-title', 'Daftar Pesanan')

@section('content')
    <div class="card shadow-sm border-0">
        <div
            class="card-header bg-white border-0 d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center py-3">
            <h6 class="mb-2 mb-md-0 fw-bold">Daftar Pesanan</h6>
            <div class="d-flex">
                <form action="{{ route('admin.manajemen-pesanan.index') }}" method="GET"
                    class="d-flex flex-column flex-md-row">
                    <div class="input-group me-3 mb-2 mb-md-0" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama pelanggan..."
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.manajemen-pesanan.index', ['sort' => 'latest'] + request()->except('sort')) }}"
                            class="btn btn-outline-secondary {{ request('sort', 'latest') === 'latest' ? 'active' : '' }}">
                            <i class="fas fa-sort-amount-down me-1"></i> Terbaru
                        </a>
                        <a href="{{ route('admin.manajemen-pesanan.index', ['sort' => 'oldest'] + request()->except('sort')) }}"
                            class="btn btn-outline-secondary {{ request('sort') === 'oldest' ? 'active' : '' }}">
                            <i class="fas fa-sort-amount-up me-1"></i> Terlama
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->pembeli->nama }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($order->status == 'shipped')
                                        <span class="badge bg-primary">Dikirim</span>
                                    @elseif($order->status == 'completed')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.manajemen-pesanan.show', $order->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-0 me-md-1"></i>
                                        <span class="d-none d-sm-inline">Detail</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada pesanan ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($orders->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($orders->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $orders->previousPageUrl() }}" rel="prev">&laquo;</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                @if ($page == $orders->currentPage())
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
                            @if ($orders->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $orders->nextPageUrl() }}" rel="next">&raquo;</a>
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
@endsection
