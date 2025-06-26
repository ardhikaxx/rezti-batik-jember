<aside class="sidebar px-0">
    <div class="sidebar-header d-flex align-items-center justify-content-between p-4">
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('admin/img/logo.png') }}" alt="Logo" height="30" class="me-2">
            <span class="fs-5 fw-bold">Reztis Batik</span>
        </a>
        <button class="sidebar-toggle d-lg-none">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link @if (Request::is('admin/dashboard')) active @endif">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.data-barang.index') }}"
                    class="nav-link @if (Request::is('admin/data-barang*')) active @endif">
                    <i class="fas fa-tshirt me-2"></i>
                    <span>Produk Batik</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.data-pembeli.index') }}"
                    class="nav-link @if (Request::is('admin/data-pembeli*')) active @endif">
                    <i class="fas fa-users me-2"></i>
                    <span>Pelanggan</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('admin.manajemen-pesanan.index') }}"
                    class="nav-link @if (Request::is('admin/manajemen-pesanan*')) active @endif">
                    <i class="fas fa-shopping-bag me-2"></i>
                    <span>Manajemen Pesanan</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('admin.manajemen-pelayanan.index') }}"
                    class="nav-link @if (Request::is('admin/manajemen-pelayanan*')) active @endif">
                    <i class="fas fa-calendar-check me-2"></i>
                    <span>Manajemen Pelayanan</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('admin.manajemen-admin.index') }}"
                    class="nav-link @if (Request::is('admin/manajemen-admin*')) active @endif">
                    <i class="fas fa-user-cog me-2"></i>
                    <span>Manajemen Admin</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-footer p-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-user-shield me-2 text-dark"></i>
            <h6 class="mb-0 fw-semibold text-dark">{{ Auth::user()->nama_lengkap }}</h6>
        </div>
    </div>
</aside>