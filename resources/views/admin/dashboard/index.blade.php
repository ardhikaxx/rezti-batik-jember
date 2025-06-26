@extends('admin.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Statistik Utama -->
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card bg-primary-gradient shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white text-uppercase mb-1">Total Penjualan</h6>
                        <h3 class="text-white mb-0">Rp {{ number_format($currentMonthSales, 0, ',', '.') }}</h3>
                        <span class="text-white-50 small">Bulan Ini</span>
                    </div>
                    <div class="bg-white-10 p-3 rounded">
                        <i class="fas fa-wallet text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card bg-success-gradient shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white text-uppercase mb-1">Total Pesanan</h6>
                        <h3 class="text-white mb-0">{{ $currentMonthOrders }}</h3>
                        <span class="text-white-50 small">Bulan Ini</span>
                    </div>
                    <div class="bg-white-10 p-3 rounded">
                        <i class="fas fa-shopping-cart text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card bg-info-gradient shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white text-uppercase mb-1">Produk Terjual</h6>
                        <h3 class="text-white mb-0">{{ $currentMonthProductsSold }}</h3>
                        <span class="text-white-50 small">Bulan Ini</span>
                    </div>
                    <div class="bg-white-10 p-3 rounded">
                        <i class="fas fa-tshirt text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card bg-warning-gradient shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white text-uppercase mb-1">Pesanan Pending</h6>
                        <h3 class="text-white mb-0">{{ $pendingOrders }}</h3>
                        <span class="text-white-50 small">Menunggu diproses</span>
                    </div>
                    <div class="bg-white-10 p-3 rounded">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Grafik Penjualan -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow-sm mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan 6 Bulan Terakhir</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Produk -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow-sm mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Statistik Produk</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Total Produk <span class="float-right">{{ $totalProducts }}</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Produk Aktif <span class="float-right">{{ $activeProducts }}</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $totalProducts > 0 ? ($activeProducts / $totalProducts * 100) : 0 }}%" aria-valuenow="{{ $activeProducts }}" aria-valuemin="0" aria-valuemax="{{ $totalProducts }}"></div>
                </div>
                <h4 class="small font-weight-bold">Produk Habis <span class="float-right">{{ $outOfStockProducts }}</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $totalProducts > 0 ? ($outOfStockProducts / $totalProducts * 100) : 0 }}%" aria-valuenow="{{ $outOfStockProducts }}" aria-valuemin="0" aria-valuemax="{{ $totalProducts }}"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Pesanan Terbaru -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pesanan Terbaru</h6>
                <a href="{{ route('admin.manajemen-pesanan.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->pembeli->nama }}</td>
                                <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                <td>
                                    @if($order->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($order->status == 'processing')
                                        <span class="badge bg-info">Diproses</span>
                                    @elseif($order->status == 'shipped')
                                        <span class="badge bg-primary">Dikirim</span>
                                    @elseif($order->status == 'completed')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $order->status }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Edukasi Terbaru -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Booking Edukasi Terbaru</h6>
                <a href="{{ route('admin.manajemen-pelayanan.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentBookings as $booking)
                            <tr>
                                <td>{{ $booking->booking_date->format('d M Y') }}</td>
                                <td>{{ $booking->pembeli->nama }}</td>
                                <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                <td>
                                    @if($booking->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($booking->status == 'confirmed')
                                        <span class="badge bg-primary">Terkonfirmasi</span>
                                    @elseif($booking->status == 'completed')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $booking->status }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sales Chart
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Total Penjualan',
                data: @json($chartData),
                backgroundColor: 'rgba(139, 69, 19, 0.1)',
                borderColor: 'rgba(139, 69, 19, 1)',
                pointBackgroundColor: 'rgba(139, 69, 19, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(139, 69, 19, 1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.raw.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection