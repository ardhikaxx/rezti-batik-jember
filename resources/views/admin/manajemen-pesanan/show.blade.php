@extends('admin.app')

@section('title', 'Detail Pesanan')
@section('page-title', 'Detail Pesanan')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 fw-bold">Informasi Pesanan</h6>
                    <span
                        class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'processing' ? 'info' : ($order->status == 'shipped' ? 'primary' : ($order->status == 'completed' ? 'success' : 'secondary'))) }}">
                        {{ $order->status_label }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold">Detail Pelanggan</h6>
                            <p class="mb-1">{{ $order->pembeli->nama }}</p>
                            <p class="mb-1">{{ $order->pembeli->email }}</p>
                            <p class="mb-1">{{ $order->pembeli->no_hp }}</p>
                            <button class="btn btn-success">Hubungi Pelanggan</button>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold">Informasi Pesanan</h6>
                            <p class="mb-1"><strong>No. Pesanan:</strong> {{ $order->order_number }}</p>
                            <p class="mb-1"><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                            <p class="mb-1"><strong>Metode Pembayaran:</strong>
                                {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                            <p class="mb-1"><strong>Status Pembayaran:</strong> {{ ucfirst($order->payment_status) }}</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-md-12 alert alert-warning mt-3 small d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle me-3"></i>
                                <div>
                                    Pastikan data pelanggan lengkap dan valid. Admin harus segera menghubungi pelanggan
                                    untuk
                                    memberikan informasi terkait ongkos kirim berdasarkan alamat yang telah diberikan.
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3">Produk yang Dipesan</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset($item->product->image) }}"
                                                    alt="{{ $item->product->name }}" width="50" class="me-3">
                                                <div>
                                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                    <small class="text-muted">{{ $item->product->description }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold">Alamat Pengiriman</h6>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>{{ $order->shippingAddress->recipient_name }}</strong></p>
                    <p class="mb-1">{{ $order->shippingAddress->phone_number }}</p>
                    <p class="mb-1">{{ $order->shippingAddress->address }}</p>
                    <p class="mb-1">{{ $order->shippingAddress->district }}, {{ $order->shippingAddress->city }},
                        {{ $order->shippingAddress->province }}</p>
                    <p class="mb-1">{{ $order->shippingAddress->postal_code }}</p>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold">Ringkasan Pesanan</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total:</span>
                        <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold">Bukti Pembayaran</h6>
                </div>
                <div class="card-body text-center">
                    @if ($order->payment_proof)
                        <img src="{{ $order->payment_proof_url }}" alt="Bukti Pembayaran" class="img-fluid mb-3"
                            style="max-height: 200px;">
                        <a href="{{ $order->payment_proof_url }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fas fa-download me-1"></i> Download
                        </a>
                    @else
                        <p class="text-muted">Belum ada bukti pembayaran</p>
                    @endif
                </div>
            </div>

            @if (in_array($order->status, ['pending', 'processing', 'shipped']))
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 fw-bold">Update Status</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.manajemen-pesanan.update-status', $order->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Dikirim
                                    </option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Selesai
                                    </option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Dibatalkan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Status</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#status').change(function() {
                    if ($(this).val() == 'shipped') {
                        $('#trackingNumberField').show();
                    } else {
                        $('#trackingNumberField').hide();
                    }
                });
            });
        </script>
    @endpush
@endsection
