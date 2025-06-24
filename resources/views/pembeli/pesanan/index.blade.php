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
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .nav-tabs {
        border-bottom: 2px solid rgba(0,0,0,0.05);
    }
    
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 0.75rem 1.25rem;
        position: relative;
        transition: all 0.3s ease;
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
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        border-radius: 10px;
        padding: 0.5rem;
    }
    
    .dropdown-item {
        border-radius: 6px;
        padding: 0.5rem 1rem;
        transition: all 0.2s ease;
    }
    
    .dropdown-item.active, .dropdown-item:active {
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
        
        .card-body .row > div {
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
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                <i class="fas fa-filter me-2"></i>Filter
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li><a class="dropdown-item active" href="#">Semua Pesanan</a></li>
                <li><a class="dropdown-item" href="#">Diproses</a></li>
                <li><a class="dropdown-item" href="#">Dikirim</a></li>
                <li><a class="dropdown-item" href="#">Selesai</a></li>
            </ul>
        </div>
    </div>

    <!-- Order Tabs -->
    <ul class="nav nav-tabs mb-4" id="orderTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button">
                Semua <span class="badge bg-primary ms-2">3</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing" type="button">
                Diproses <span class="badge bg-info ms-2">1</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped" type="button">
                Dikirim <span class="badge bg-primary ms-2">1</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button">
                Selesai <span class="badge bg-success ms-2">0</span>
            </button>
        </li>
    </ul>

    <!-- Order Content -->
    <div class="tab-content" id="orderTabsContent">
        <!-- All Orders Tab -->
        <div class="tab-pane fade show active" id="all" role="tabpanel">
            <!-- Order Card 1 -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-warning me-2">Belum Dibayar</span>
                        <span class="text-muted">#INV-20230615-001</span>
                    </div>
                    <small class="text-muted">15 Juni 2023</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" 
                                         class="rounded-3" width="80" height="80" alt="Batik Mega Mendung">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Batik Tulis Motif Dewa Ruci</h6>
                                    <p class="text-muted mb-1">Kode: BT001</p>
                                    <p class="mb-0">2 Item × Rp 250.000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-2">
                                    <span class="text-muted">Total Pesanan:</span>
                                    <h5 class="mb-0 fw-bold">Rp 500.000</h5>
                                </div>
                                <div class="mt-auto d-flex gap-2">
                                    <button class="btn btn-outline-danger btn-sm flex-grow-1">
                                        Batalkan Pesanan
                                    </button>
                                    <button class="btn btn-primary btn-sm flex-grow-1">
                                        Bayar Sekarang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Card 2 -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-info me-2">Diproses</span>
                        <span class="text-muted">#INV-20230610-001</span>
                    </div>
                    <small class="text-muted">10 Juni 2023</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1583744946564-b52d01e2da64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" 
                                         class="rounded-3" width="80" height="80" alt="Batik Parang">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Batik Tulis Motif Sekarjagat</h6>
                                    <p class="text-muted mb-1">Kode: BT002</p>
                                    <p class="mb-0">1 Item × Rp 320.000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-2">
                                    <span class="text-muted">Total Pesanan:</span>
                                    <h5 class="mb-0 fw-bold">Rp 320.000</h5>
                                </div>
                                <div class="mt-auto">
                                    <button class="btn btn-outline-secondary btn-sm w-100">
                                        Lacak Pesanan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Card 3 -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-primary me-2">Dikirim</span>
                        <span class="text-muted">#INV-20230605-001</span>
                    </div>
                    <small class="text-muted">5 Juni 2023</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" 
                                         class="rounded-3" width="80" height="80" alt="Batik Kawung">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Batik Tulis Motif Wanito Kinasih</h6>
                                    <p class="text-muted mb-1">Kode: BT003</p>
                                    <p class="mb-0">3 Item × Rp 280.000</p>
                                </div>
                            </div>
                            <div class="shipping-info bg-light p-3 rounded-2">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-truck me-2 text-primary"></i>
                                    <span class="fw-semibold">Informasi Pengiriman</span>
                                </div>
                                <div class="d-flex">
                                    <div class="me-4">
                                        <small class="text-muted">Kurir</small>
                                        <p class="mb-0">JNE - REG</p>
                                    </div>
                                    <div class="me-4">
                                        <small class="text-muted">No. Resi</small>
                                        <p class="mb-0">JNE000123456789</p>
                                    </div>
                                    <div>
                                        <small class="text-muted">Estimasi</small>
                                        <p class="mb-0">2-3 hari</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-2">
                                    <span class="text-muted">Total Pesanan:</span>
                                    <h5 class="mb-0 fw-bold">Rp 840.000</h5>
                                </div>
                                <div class="mt-auto d-flex gap-2">
                                    <button class="btn btn-outline-secondary btn-sm flex-grow-1">
                                        Lacak Pesanan
                                    </button>
                                    <button class="btn btn-success btn-sm flex-grow-1">
                                        Pesanan Diterima
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Processing Orders Tab -->
        <div class="tab-pane fade" id="processing" role="tabpanel">
            <!-- Processing orders will be shown here -->
            <div class="text-center py-5">
                <img src="{{ asset('admin/img/empty-order.svg') }}" alt="No orders" class="img-fluid mb-4" style="max-width: 300px;">
                <h5 class="fw-bold mb-2">Tidak ada pesanan yang di proses</h5>
                <p class="text-muted">Anda belum memiliki pesanan yang belum dibayar</p>
                <a href="{{ route('index') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-shopping-bag me-2"></i> Belanja Sekarang
                </a>
            </div>
        </div>

        <!-- Shipped Orders Tab -->
        <div class="tab-pane fade" id="shipped" role="tabpanel">
            <!-- Shipped orders will be shown here -->
        </div>

        <!-- Completed Orders Tab -->
        <div class="tab-pane fade" id="completed" role="tabpanel">
            <!-- Completed orders will be shown here -->
            <div class="text-center py-5">
                <img src="{{ asset('admin/img/empty-order.svg') }}" alt="No orders" class="img-fluid mb-4" style="max-width: 300px;">
                <h5 class="fw-bold mb-2">Belum ada pesanan yang selesai</h5>
                <p class="text-muted">Pesanan yang sudah selesai akan muncul di sini</p>
                <a href="{{ route('index') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-shopping-bag me-2"></i> Belanja Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
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