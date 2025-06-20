@extends('admin.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4">
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
                <div class="mt-3">
                    <span class="badge bg-white text-primary">+12.5% dari bulan lalu</span>
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
                <div class="mt-3">
                    <span class="badge bg-white text-success">+8.3% dari bulan lalu</span>
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
                        <h3 class="text-white mb-0">{{ $productsSold }}</h3>
                        <span class="text-white-50 small">Bulan Ini</span>
                    </div>
                    <div class="bg-white-10 p-3 rounded">
                        <i class="fas fa-tshirt text-white"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="badge bg-white text-info">+15.2% dari bulan lalu</span>
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
                <div class="mt-3">
                    <a href="" class="text-white small">Lihat Pesanan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <!-- Grafik Penjualan -->
    <div class="col-xl-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                <h6 class="m-0 fw-bold">Grafik Penjualan 6 Bulan Terakhir</h6>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                        Bulan Ini
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                        <li><a class="dropdown-item" href="#">Tahun Lalu</a></li>
                        <li><a class="dropdown-item" href="#">Custom</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="salesChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="m-0 fw-bold"></h6>
            </div>
            <div class="card-body p-0">
                
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Total Penjualan',
                data: @json($salesData),
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
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.raw.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        }
                    }
                }
            }
        }
    });
</script>
@endpush

@endsection