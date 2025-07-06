@extends('pembeli.app')

@section('title', 'Pesanan Saya')

@section('content')
    <style>
        /* Custom Styles */
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

        .text-gradient-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
            border: none;
        }

        .card-header {
            background-color: rgba(249, 245, 240, 0.7);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-tabs-wrapper {
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
        }

        .nav-tabs-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .nav-tabs-wrapper::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }

        .nav-tabs {
            flex-wrap: nowrap;
            white-space: nowrap;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
        }

        .nav-tabs .nav-item {
            flex-shrink: 0;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
            font-weight: 500;
            padding: 0.75rem 1.25rem;
            position: relative;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            background-color: transparent;
        }

        .nav-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        }

        .nav-tabs .nav-link:hover:not(.active) {
            color: var(--dark-color);
        }

        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
        }

        .badge.bg-warning {
            color: #000;
        }

        .shipping-info {
            background-color: rgba(249, 245, 240, 0.5);
            border-left: 3px solid var(--primary-color);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .dropdown-item.active,
        .dropdown-item:active {
            background-color: rgba(139, 69, 19, 0.1);
            color: var(--primary-color);
        }

        .btn-outline-secondary {
            border-color: #dee2e6;
        }

        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .nav-tabs .nav-link {
                padding: 0.5rem 0.75rem;
                font-size: 0.85rem;
            }

            .card-body .row>div {
                margin-bottom: 1rem;
            }

            .shipping-info div {
                margin-bottom: 0.5rem;
            }
        }
    </style>

    <div class="container py-4">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div>
                <h1 class="fw-bold mb-1 text-gradient-primary">
                    <i class="fas fa-clipboard-list me-2"></i>Pesanan Saya
                </h1>
                <p class="text-muted mb-0">Riwayat dan status pesanan Anda</p>
            </div>
        </div>

        <!-- Order Tabs -->
        <div class="nav-tabs-wrapper mb-4">
            <ul class="nav nav-tabs flex-nowrap" id="orderTabs" role="tablist" style="min-width: max-content;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                        type="button">
                        Semua
                        <span class="badge ms-2" style="background-color: var(--primary-dark)">
                            {{ $orders->count() }}
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing"
                        type="button">
                        Diproses
                        <span class="badge bg-info ms-2">
                            {{ $orders->where('status', 'pending')->count() }}
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped" type="button">
                        Dikirim
                        <span class="badge bg-primary ms-2">
                            {{ $orders->where('status', 'shipped')->count() }}
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed"
                        type="button">
                        Selesai
                        <span class="badge bg-success ms-2">
                            {{ $orders->where('status', 'completed')->count() }}
                        </span>
                    </button>
                </li>
            </ul>
        </div>

        <!-- Order Content -->
        <div class="tab-content" id="orderTabsContent">
            <!-- All Orders Tab -->
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                @if ($orders->isEmpty())
                    <div class="text-center py-5">
                        <i class="fas fa-box-open fa-5x mb-4" style="color: var(--primary-dark)"></i>
                        <h5 class="fw-bold mb-2">Belum ada pesanan</h5>
                        <p class="text-muted">Pesanan yang Anda buat akan muncul di sini</p>
                        <a href="{{ route('pembeli.index') }}" class="btn mt-3"
                            style="background-color: var(--primary-dark); color: var(--light-color);">
                            <i class="fas fa-shopping-bag me-2"></i> Belanja Sekarang
                        </a>
                    </div>
                @else
                    @foreach ($orders as $order)
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column flex-md-row">
                                    <span
                                        class="badge bg-{{ $order->status == 'pending' ? 'info' : ($order->status == 'shipped' ? 'primary' : ($order->status == 'completed' ? 'success' : 'warning')) }} me-2">
                                        {{ $order->status_label }}
                                    </span>
                                    <span class="text-muted">#{{ $order->order_number }}</span>
                                </div>
                                <small class="text-muted">{{ $order->created_at->format('d M Y') }}</small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        @foreach ($order->items as $item)
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset($item->product->image) }}" class="rounded-3"
                                                        width="80" height="80" alt="{{ $item->product->name }}">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">{{ $item->product->name }}</h6>
                                                    <p class="text-muted mb-1">Kode: {{ $item->product->code ?? 'N/A' }}
                                                    </p>
                                                    <p class="mb-0">{{ $item->quantity }} Item × Rp
                                                        {{ number_format($item->price, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-2">
                                                <span class="text-muted">Total Pesanan:</span>
                                                <h5 class="mb-0 fw-bold">Rp {{ number_format($order->total, 0, ',', '.') }}
                                                </h5>
                                            </div>
                                            <div class="mt-auto d-flex gap-2">
                                                {{-- Tombol Detail --}}
                                                <a href="{{ route('pembeli.pesanan.show', $order->id) }}"
                                                    class="btn btn-outline-primary btn-sm flex-grow-1">
                                                    <i class="fas fa-eye me-1"></i>
                                                    <span class="d-none d-md-inline">Detail Pesanan</span>
                                                    <span class="d-inline d-md-none">Detail</span>
                                                </a>

                                                {{-- Jika pesanan masih pending, tampilkan tombol batal --}}
                                                @if ($order->status == 'pending')
                                                    <form action="{{ route('pembeli.pesanan.update-status', $order->id) }}"
                                                        method="POST" class="flex-grow-1">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="status" value="cancelled">
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm w-100 confirm-button"
                                                            data-title="Batalkan Pesanan"
                                                            data-text="Apakah Anda yakin ingin membatalkan pesanan ini?"
                                                            data-confirm-text="Ya, Batalkan Pesanan"
                                                            data-cancel-text="Batal">
                                                            <i class="fas fa-times-circle me-1"></i>
                                                            <span class="d-none d-md-inline">Batalkan Pesanan</span>
                                                            <span class="d-inline d-md-none">Batalkan</span>
                                                        </button>
                                                    </form>

                                                    {{-- Jika pesanan dikirim, tampilkan tombol terima --}}
                                                @elseif($order->status == 'shipped')
                                                    <form
                                                        action="{{ route('pembeli.pesanan.update-status', $order->id) }}"
                                                        method="POST" class="flex-grow-1">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="status" value="completed">
                                                        <button type="submit"
                                                            class="btn btn-outline-success btn-sm w-100 confirm-button"
                                                            data-title="Konfirmasi Pesanan"
                                                            data-text="Apakah pesanan sudah sampai?"
                                                            data-confirm-text="Ya, Sudah Sampai" data-cancel-text="Belum">
                                                            <i class="fas fa-check-circle me-1"></i>
                                                            <span class="d-none d-md-inline">Terima Pesanan</span>
                                                            <span class="d-inline d-md-none">Terima</span>
                                                        </button>
                                                    </form>

                                                    {{-- Jika pesanan selesai --}}
                                                @elseif($order->status == 'completed')
                                                    @if ($order->items->every(fn($item) => $item->rating))
                                                        <span class="btn btn-success btn-sm flex-grow-1">
                                                            <i class="fas fa-check-circle me-1"></i>
                                                            <span class="d-none d-md-inline">Rating Diberikan</span>
                                                            <span class="d-inline d-md-none">Selesai</span>
                                                        </span>
                                                    @else
                                                        <a href="{{ route('pembeli.rating.index', $order->id) }}"
                                                            class="btn btn-warning btn-sm flex-grow-1 text-white">
                                                            <i class="fas fa-star me-1"></i>
                                                            <span class="d-none d-md-inline">Beri Nilai Pesanan</span>
                                                            <span class="d-inline d-md-none">Nilai</span>
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Processing Orders Tab -->
            <div class="tab-pane fade" id="processing" role="tabpanel">
                @php $processingOrders = $orders->where('status', 'pending'); @endphp
                @if ($processingOrders->isEmpty())
                    <div class="text-center py-5">
                        <i class="fas fa-box-open fa-5x mb-4" style="color: var(--primary-dark)"></i>
                        <h5 class="fw-bold mb-2">Tidak ada pesanan yang diproses</h5>
                        <p class="text-muted">Anda belum memiliki pesanan yang sedang diproses</p>
                        <a href="{{ route('pembeli.index') }}" class="btn mt-3"
                            style="background-color: var(--primary-dark); color: var(--light-color);">
                            <i class="fas fa-shopping-bag me-2"></i> Belanja Sekarang
                        </a>
                    </div>
                @else
                    @foreach ($processingOrders as $order)
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column flex-md-row">
                                    <span class="badge bg-info me-2">
                                        {{ $order->status_label }}
                                    </span>
                                    <span class="text-muted">#{{ $order->order_number }}</span>
                                </div>
                                <small class="text-muted">{{ $order->created_at->format('d M Y') }}</small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        @foreach ($order->items as $item)
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset($item->product->image) }}" class="rounded-3"
                                                        width="80" height="80" alt="{{ $item->product->name }}">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">{{ $item->product->name }}</h6>
                                                    <p class="text-muted mb-1">Kode: {{ $item->product->code ?? 'N/A' }}
                                                    </p>
                                                    <p class="mb-0">{{ $item->quantity }} Item × Rp
                                                        {{ number_format($item->price, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-2">
                                                <span class="text-muted">Total Pesanan:</span>
                                                <h5 class="mb-0 fw-bold">Rp
                                                    {{ number_format($order->total, 0, ',', '.') }}</h5>
                                            </div>
                                            <div class="mt-auto d-flex gap-2">
                                                {{-- Tombol Detail --}}
                                                <a href="{{ route('pembeli.pesanan.show', $order->id) }}"
                                                    class="btn btn-outline-primary btn-sm flex-grow-1">
                                                    <i class="fas fa-eye me-1"></i>
                                                    <span class="d-none d-md-inline">Detail Pesanan</span>
                                                    <span class="d-inline d-md-none">Detail</span>
                                                </a>

                                                {{-- Tombol Batalkan --}}
                                                <form action="{{ route('pembeli.pesanan.update-status', $order->id) }}"
                                                    method="POST" class="flex-grow-1">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="status" value="cancelled">
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-sm w-100 confirm-button"
                                                        data-title="Batalkan Pesanan"
                                                        data-text="Apakah Anda yakin ingin membatalkan pesanan ini?"
                                                        data-confirm-text="Ya, Batalkan Pesanan" data-cancel-text="Batal">
                                                        <i class="fas fa-times-circle me-1"></i>
                                                        <span class="d-none d-md-inline">Batalkan Pesanan</span>
                                                        <span class="d-inline d-md-none">Batalkan</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Shipped Orders Tab -->
            <div class="tab-pane fade" id="shipped" role="tabpanel">
                @php $shippedOrders = $orders->where('status', 'shipped'); @endphp
                @if ($shippedOrders->isEmpty())
                    <div class="text-center py-5">
                        <i class="fas fa-box-open fa-5x mb-4" style="color: var(--primary-dark)"></i>
                        <h5 class="fw-bold mb-2">Tidak ada pesanan yang dikirim</h5>
                        <p class="text-muted">Anda belum memiliki pesanan yang sedang dikirim</p>
                        <a href="{{ route('pembeli.index') }}" class="btn mt-3"
                            style="background-color: var(--primary-dark); color: var(--light-color);">
                            <i class="fas fa-shopping-bag me-2"></i> Belanja Sekarang
                        </a>
                    </div>
                @else
                    @foreach ($shippedOrders as $order)
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column flex-md-row">
                                    <span class="badge bg-primary me-2">
                                        {{ $order->status_label }}
                                    </span>
                                    <span class="text-muted">#{{ $order->order_number }}</span>
                                </div>
                                <small class="text-muted">{{ $order->created_at->format('d M Y') }}</small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        @foreach ($order->items as $item)
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset($item->product->image) }}" class="rounded-3"
                                                        width="80" height="80" alt="{{ $item->product->name }}">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">{{ $item->product->name }}</h6>
                                                    <p class="text-muted mb-1">Kode: {{ $item->product->code ?? 'N/A' }}
                                                    </p>
                                                    <p class="mb-0">{{ $item->quantity }} Item × Rp
                                                        {{ number_format($item->price, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-2">
                                                <span class="text-muted">Total Pesanan:</span>
                                                <h5 class="mb-0 fw-bold">Rp
                                                    {{ number_format($order->total, 0, ',', '.') }}</h5>
                                            </div>
                                            <div class="mt-auto d-flex gap-2">
                                                {{-- Tombol Detail --}}
                                                <a href="{{ route('pembeli.pesanan.show', $order->id) }}"
                                                    class="btn btn-outline-primary btn-sm flex-grow-1">
                                                    <i class="fas fa-eye me-1"></i>
                                                    <span class="d-none d-md-inline">Detail Pesanan</span>
                                                    <span class="d-inline d-md-none">Detail</span>
                                                </a>

                                                {{-- Tombol Terima Pesanan --}}
                                                <form action="{{ route('pembeli.pesanan.update-status', $order->id) }}"
                                                    method="POST" class="flex-grow-1">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="status" value="completed">
                                                    <button type="submit"
                                                        class="btn btn-outline-success btn-sm w-100 confirm-button"
                                                        data-title="Konfirmasi Pesanan"
                                                        data-text="Apakah pesanan sudah sampai?"
                                                        data-confirm-text="Ya, Sudah Sampai" data-cancel-text="Belum">
                                                        <i class="fas fa-check-circle me-1"></i>
                                                        <span class="d-none d-md-inline">Terima Pesanan</span>
                                                        <span class="d-inline d-md-none">Terima</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Completed Orders Tab -->
            <div class="tab-pane fade" id="completed" role="tabpanel">
                @php $completedOrders = $orders->where('status', 'completed'); @endphp
                @if ($completedOrders->isEmpty())
                    <div class="text-center py-5">
                        <i class="fas fa-box-open fa-5x mb-4" style="color: var(--primary-dark)"></i>
                        <h5 class="fw-bold mb-2">Belum ada pesanan yang selesai</h5>
                        <p class="text-muted">Pesanan yang sudah selesai akan muncul di sini</p>
                        <a href="{{ route('pembeli.index') }}" class="btn mt-3"
                            style="background-color: var(--primary-dark); color: var(--light-color);">
                            <i class="fas fa-shopping-bag me-2"></i> Belanja Sekarang
                        </a>
                    </div>
                @else
                    @foreach ($completedOrders as $order)
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column flex-md-row">
                                    <span class="badge bg-success me-2">
                                        {{ $order->status_label }}
                                    </span>
                                    <span class="text-muted">#{{ $order->order_number }}</span>
                                </div>
                                <small class="text-muted">{{ $order->created_at->format('d M Y') }}</small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        @foreach ($order->items as $item)
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset($item->product->image) }}" class="rounded-3"
                                                        width="80" height="80" alt="{{ $item->product->name }}">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">{{ $item->product->name }}</h6>
                                                    <p class="text-muted mb-1">Kode: {{ $item->product->code ?? 'N/A' }}
                                                    </p>
                                                    <p class="mb-0">{{ $item->quantity }} Item × Rp
                                                        {{ number_format($item->price, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-2">
                                                <span class="text-muted">Total Pesanan:</span>
                                                <h5 class="mb-0 fw-bold">Rp
                                                    {{ number_format($order->total, 0, ',', '.') }}</h5>
                                            </div>
                                            <div class="mt-auto d-flex gap-2">
                                                {{-- Tombol Detail --}}
                                                <a href="{{ route('pembeli.pesanan.show', $order->id) }}"
                                                    class="btn btn-outline-primary btn-sm flex-grow-1">
                                                    <i class="fas fa-eye me-1"></i>
                                                    <span class="d-none d-md-inline">Detail Pesanan</span>
                                                    <span class="d-inline d-md-none">Detail</span>
                                                </a>

                                                @if ($order->status == 'completed')
                                                    @if ($order->items->every(fn($item) => $item->rating))
                                                        {{-- Rating sudah diberikan --}}
                                                        <span class="btn btn-success btn-sm flex-grow-1">
                                                            <i class="fas fa-check-circle me-1"></i>
                                                            <span class="d-none d-md-inline">Rating Diberikan</span>
                                                            <span class="d-inline d-md-none">Selesai</span>
                                                        </span>
                                                    @else
                                                        {{-- Tombol untuk beri rating --}}
                                                        <a href="{{ route('pembeli.rating.index', $order->id) }}"
                                                            class="btn btn-warning btn-sm flex-grow-1 text-white">
                                                            <i class="fas fa-star me-1"></i>
                                                            <span class="d-none d-md-inline">Beri Nilai Pesanan</span>
                                                            <span class="d-inline d-md-none">Nilai</span>
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SweetAlert confirmation for all buttons with confirm-button class
            document.querySelectorAll('.confirm-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: this.dataset.title || 'Konfirmasi',
                        text: this.dataset.text || 'Apakah Anda yakin?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#5D2906',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: this.dataset.confirmText || 'Ya',
                        cancelButtonText: this.dataset.cancelText || 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching functionality
            const urlParams = new URLSearchParams(window.location.search);
            const activeTab = urlParams.get('tab');

            if (activeTab) {
                const tabTrigger = document.querySelector(`#${activeTab}-tab`);
                if (tabTrigger) {
                    new bootstrap.Tab(tabTrigger).show();
                }
            }

            // Update URL when tab changes
            document.querySelectorAll('#orderTabs button[data-bs-toggle="tab"]').forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('id').replace('-tab', '');
                    const newUrl = window.location.pathname + '?tab=' + tabId;
                    window.history.replaceState(null, null, newUrl);
                });
            });
        });
    </script>
@endsection
