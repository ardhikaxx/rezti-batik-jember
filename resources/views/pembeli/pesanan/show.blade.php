@extends('pembeli.app')

@section('title', 'Detail Pesanan')

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

        .order-timeline {
            position: relative;
            padding-left: 30px;
            list-style: none;
        }

        .order-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 10px;
            width: 2px;
            background-color: #e9ecef;
        }

        .order-timeline-item {
            position: relative;
            padding-bottom: 20px;
        }

        .order-timeline-item::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: var(--primary-color);
            border: 4px solid var(--light-color);
        }

        .order-timeline-item.completed::before {
            background-color: var(--primary-color);
        }

        .order-timeline-item.active::before {
            background-color: var(--primary-color);
            animation: pulse 1.5s infinite;
        }

        .order-timeline-item.pending::before {
            background-color: #6c757d;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(139, 69, 19, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(139, 69, 19, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(139, 69, 19, 0);
            }
        }

        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .payment-proof {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }
    </style>

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h1 class="fw-bold mb-1" style="color: var(--primary-dark);">
                    <i class="fas fa-clipboard-list me-2"></i>Detail Pesanan
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pembeli.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pembeli.pesanan.index') }}">Pesanan Saya</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pesanan</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Informasi Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset($item->product->image) }}" class="product-img me-3" alt="{{ $item->product->name }}">
                                                    <div>
                                                        <h6 class="mb-1">{{ $item->product->name }}</h6>
                                                        <p class="text-muted mb-0">Kode: {{ $item->product->code ?? 'N/A' }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Subtotal:</th>
                                        <th>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-end">Total:</th>
                                        <th>Rp {{ number_format($order->total, 0, ',', '.') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Status Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <ul class="order-timeline">
                            <li class="order-timeline-item {{ $order->status == 'completed' || $order->status == 'shipped' || $order->status == 'pending' ? 'completed' : '' }}">
                                <h6 class="mb-1">Pesanan Dibuat</h6>
                                <p class="text-muted mb-0">{{ $order->created_at->format('d M Y H:i') }}</p>
                            </li>
                            <li class="order-timeline-item {{ $order->status == 'completed' || $order->status == 'shipped' || $order->status == 'pending' ? 'completed' : '' }}">
                                <h6 class="mb-1">Pembayaran Diverifikasi</h6>
                                <p class="text-muted mb-0">{{ $order->created_at->format('d M Y H:i') }}</p>
                            </li>
                            <li class="order-timeline-item {{ $order->status == 'completed' || $order->status == 'shipped' ? 'completed' : ($order->status == 'pending' ? 'active' : 'pending') }}">
                                <h6 class="mb-1">Pesanan Diproses</h6>
                                @if($order->status == 'pending')
                                    <p class="text-muted mb-0">Sedang diproses</p>
                                @else
                                    <p class="text-muted mb-0">{{ $order->updated_at->format('d M Y H:i') }}</p>
                                @endif
                            </li>
                            <li class="order-timeline-item {{ $order->status == 'completed' || $order->status == 'shipped' ? ($order->status == 'shipped' ? 'active' : 'completed') : 'pending' }}">
                                <h6 class="mb-1">Pesanan Dikirim</h6>
                                @if($order->status == 'shipped')
                                    <p class="text-muted mb-0">Sedang dalam pengiriman</p>
                                @elseif($order->status == 'completed')
                                    <p class="text-muted mb-0">{{ $order->updated_at->format('d M Y H:i') }}</p>
                                @else
                                    <p class="text-muted mb-0">Menunggu proses</p>
                                @endif
                            </li>
                            <li class="order-timeline-item {{ $order->status == 'completed' ? 'completed' : 'pending' }}">
                                <h6 class="mb-1">Pesanan Selesai</h6>
                                @if($order->status == 'completed')
                                    <p class="text-muted mb-0">{{ $order->updated_at->format('d M Y H:i') }}</p>
                                @else
                                    <p class="text-muted mb-0">Menunggu konfirmasi</p>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Informasi Pengiriman</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-2">{{ $order->shippingAddress->recipient_name }}</h6>
                        <p class="mb-1">{{ $order->shippingAddress->phone_number }}</p>
                        <p class="mb-1">{{ $order->shippingAddress->address }}</p>
                        <p class="mb-1">
                            {{ $order->shippingAddress->district }}, 
                            {{ $order->shippingAddress->city }}, 
                            {{ $order->shippingAddress->province }}
                        </p>
                        <p class="mb-0">Kode Pos: {{ $order->shippingAddress->postal_code }}</p>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Informasi Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6 class="mb-1">Metode Pembayaran</h6>
                            <p class="mb-0">{{ $order->payment_method }}</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="mb-1">Status Pembayaran</h6>
                            <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : 'success' }}">
                                {{ $order->status == 'pending' ? 'Menunggu Verifikasi' : 'Terverifikasi' }}
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-2">Bukti Pembayaran</h6>
                            <img src="{{ $order->payment_proof_url }}" alt="Bukti Pembayaran" class="payment-proof img-fluid">
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Aksi</h5>
                    </div>
                    <div class="card-body">
                        @if($order->status == 'pending')
                            <form action="{{ route('pembeli.pesanan.update-status', $order->id) }}" method="POST" class="mb-2">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                    Batalkan Pesanan
                                </button>
                            </form>
                        @elseif($order->status == 'shipped')
                            <form action="{{ route('pembeli.pesanan.update-status', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" class="btn btn-outline-success btn-sm w-100" onclick="return confirm('Apakah pesanan sudah sampai?')">
                                    Konfirmasi Pesanan Diterima
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('pembeli.pesanan.index') }}" class="btn btn-outline-primary btn-sm w-100 mt-2">
                            Kembali ke Daftar Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection