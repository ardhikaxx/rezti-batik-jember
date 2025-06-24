@extends('admin.app')

@section('title', 'Detail Pelanggan')
@section('page-title', 'Detail Pelanggan')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body text-center">
                <div class="avatar-profile mb-3 mx-auto">
                    <img src="{{ asset('storage/'.$customer['avatar']) }}" alt="{{ $customer['name'] }}" class="rounded-circle" width="120" height="120">
                </div>
                <h4 class="mb-1">{{ $customer['name'] }}</h4>
                <p class="text-muted mb-3">ID: {{ $customer['id'] }}</p>
                
                <div class="d-flex justify-content-center mb-3">
                    <div class="px-3 text-center">
                        <h5 class="mb-0">{{ $customer['total_orders'] }}</h5>
                        <small class="text-muted">Total Pesanan</small>
                    </div>
                    <div class="px-3 text-center">
                        <h5 class="mb-0">Rp {{ number_format($customer['total_spent'], 0, ',', '.') }}</h5>
                        <small class="text-muted">Total Belanja</small>
                    </div>
                </div>
                
                <div class="d-flex justify-content-center">
                    <span class="badge bg-success rounded-pill">
                        <i class="fas fa-circle me-1 small"></i> Aktif
                    </span>
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
                                <p class="mb-0">{{ $customer['email'] }}</p>
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
                                <p class="mb-0">{{ $customer['phone'] ?? '-' }}</p>
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
                                <p class="mb-0">{{ $customer['address'] ?? '-' }}</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-footer bg-white border-0 py-3">
                <small class="text-muted">
                    <i class="far fa-clock me-1"></i> Bergabung pada {{ $customer['joined_at'] }}
                </small>
            </div>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                <h6 class="m-0 fw-bold">Riwayat Pesanan</h6>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
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
                @if(count($customer['orders']) > 0)
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
                                @foreach($customer['orders'] as $order)
                                <tr>
                                    <td>
                                        <a href="#" class="text-primary fw-bold">#{{ $order['number'] }}</a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($order['date'])->format('d M Y') }}</td>
                                    <td>{{ count($order['items']) }} item</td>
                                    <td>Rp {{ number_format($order['amount'], 0, ',', '.') }}</td>
                                    <td>
                                        @if($order['status'] == 'completed')
                                            <span class="badge bg-success">Selesai</span>
                                        @elseif($order['status'] == 'processing')
                                            <span class="badge bg-primary">Diproses</span>
                                        @elseif($order['status'] == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($order['status'] == 'cancelled')
                                            <span class="badge bg-danger">Dibatalkan</span>
                                        @elseif($order['status'] == 'shipped')
                                            <span class="badge bg-info">Dikirim</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetail{{ $loop->index }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
@foreach($customer['orders'] as $order)
<div class="modal fade" id="orderDetail{{ $loop->index }}" tabindex="-1" aria-labelledby="orderDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetailLabel">Detail Pesanan #{{ $order['number'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="mb-3">Informasi Pesanan</h6>
                        <p class="mb-1"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order['date'])->format('d M Y H:i') }}</p>
                        <p class="mb-1"><strong>Status:</strong> 
                            @if($order['status'] == 'completed')
                                <span class="badge bg-success">Selesai</span>
                            @elseif($order['status'] == 'processing')
                                <span class="badge bg-primary">Diproses</span>
                            @elseif($order['status'] == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($order['status'] == 'cancelled')
                                <span class="badge bg-danger">Dibatalkan</span>
                            @elseif($order['status'] == 'shipped')
                                <span class="badge bg-info">Dikirim</span>
                            @endif
                        </p>
                        <p class="mb-1"><strong>Total:</strong> Rp {{ number_format($order['amount'], 0, ',', '.') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">Informasi Pelanggan</h6>
                        <p class="mb-1"><strong>Nama:</strong> {{ $customer['name'] }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $customer['email'] }}</p>
                        <p class="mb-1"><strong>Telepon:</strong> {{ $customer['phone'] ?? '-' }}</p>
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
                            @foreach($order['items'] as $item)
                            <tr>
                                <td>{{ $item['product'] }}</td>
                                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>Rp {{ number_format($item['total'], 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total</th>
                                <th>Rp {{ number_format($order['amount'], 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Cetak Invoice</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@push('styles')
<style>
    .avatar-profile {
        border: 4px solid #f8f9fa;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .icon-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush

@endsection