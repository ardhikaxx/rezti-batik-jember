@extends('admin.app')

@section('title', 'Detail Pelanggan')
@section('page-title', 'Detail Pelanggan')

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

        i {
            color: var(--primary-dark)
        }
    </style>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body text-center">
                    <div class="profile-picture mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->nama) }}&background=random&size=150"
                            class="rounded-circle" alt="Profile Picture">
                    </div>
                    <h4 class="mb-2">{{ $customer->nama }}</h4>
                    <div class="d-flex justify-content-center mb-3">
                        <div class="px-3 text-center">
                            <h5 class="mb-0">{{ $customer->orders_count }}</h5>
                            <small class="text-muted">Total Pesanan</small>
                        </div>
                        <div class="px-3 text-center">
                            <h5 class="mb-0">Rp {{ number_format($customer->orders_sum_total ?? 0, 0, ',', '.') }}</h5>
                            <small class="text-muted">Total Belanja</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="m-0 fw-bold">Informasi Kontak</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-light text-primary me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 small text-muted">Email</h6>
                                    <p class="mb-0">{{ $customer->email }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-light text-primary me-3">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 small text-muted">Telepon</h6>
                                    <p class="mb-0">{{ $customer->no_hp ?? '-' }}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-light text-primary me-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 small text-muted">Alamat</h6>
                                    <p class="mb-0">{{ $customer->alamat ?? '-' }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer bg-white border-0 py-3">
                    <small class="text-muted">
                        <i class="far fa-clock me-1"></i> Bergabung pada {{ $customer->created_at->format('d M Y H:i') }}
                    </small>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 fw-bold">Riwayat Pesanan</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown">
                            Semua Pesanan
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Terbaru</a></li>
                            <li><a class="dropdown-item" href="#">Tertinggi</a></li>
                            <li><a class="dropdown-item" href="#">Terendah</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    @if ($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>No. Pesanan</th>
                                        <th>Tanggal</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <p class="fw-bold" style="color: var(--primary-dark)">#{{ $order->order_number }}</p>
                                            </td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>{{ $order->items->count() }} item</td>
                                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($order->status == 'completed')
                                                    <span class="badge bg-success">Selesai</span>
                                                @elseif($order->status == 'shipped')
                                                    <span class="badge bg-info">Dikirim</span>
                                                @elseif($order->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($order->status == 'cancelled')
                                                    <span class="badge bg-danger">Dibatalkan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#orderDetail{{ $order->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $orders->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-shopping-cart fa-3x text-muted"></i>
                            </div>
                            <h5 class="text-muted">Belum ada pesanan</h5>
                            <p class="text-muted">Pelanggan ini belum melakukan pesanan apapun</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Order Detail Modals -->
    @foreach ($orders as $order)
        <div class="modal fade" id="orderDetail{{ $order->id }}" tabindex="-1" aria-labelledby="orderDetailLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderDetailLabel">Detail Pesanan #{{ $order->order_number }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="mb-3">Informasi Pesanan</h6>
                                <p class="mb-1"><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}
                                </p>
                                <p class="mb-1"><strong>Status:</strong>
                                    @if ($order->status == 'completed')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif($order->status == 'shipped')
                                        <span class="badge bg-info">Dikirim</span>
                                    @elseif($order->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($order->status == 'cancelled')
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    @endif
                                </p>
                                <p class="mb-1"><strong>Total:</strong> Rp
                                    {{ number_format($order->total, 0, ',', '.') }}</p>
                                <p class="mb-1"><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">Alamat Pengiriman</h6>
                                <p class="mb-1"><strong>Penerima:</strong> {{ $order->shippingAddress->recipient_name }}
                                </p>
                                <p class="mb-1"><strong>Telepon:</strong> {{ $order->shippingAddress->phone_number }}
                                </p>
                                <p class="mb-1"><strong>Alamat:</strong> {{ $order->shippingAddress->full_address }}</p>
                            </div>
                        </div>

                        <h6 class="mb-3">Items Pesanan</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Subtotal</th>
                                        <th>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-end">Total</th>
                                        <th>Rp {{ number_format($order->total, 0, ',', '.') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
