<header class="navbar navbar-expand navbar-light sticky-top px-4 py-3 shadow-sm">
    <div class="navbar-collapse collapse">
        <div class="d-flex align-items-center">
            <i class="fas fa-bars sidebar-toggle me-3 d-lg-none" style="cursor: pointer;"></i>
            <h4 class="mb-0">@yield('page-title')</h4>
        </div>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" style="color: var(--primary-color);"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-shield" style="color: var(--primary-color);"></i>
                    <div class="flex-grow-1 ms-2 d-none d-lg-inline">
                        <span class="fw-bold"
                            style="color: var(--primary-color);">{{ Auth::user()->nama_lengkap }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg">
                    <li>
                        <a class="dropdown-item" style="color: var(--primary-color);"
                            href="{{ route('admin.profile.index') }}"
                            onmousedown="this.style.background='var(--primary-color)'; this.style.color='var(--light-color)';"
                            onmouseup="this.style.background=''; this.style.color='var(--primary-color)';">
                            <i class="fas fa-user me-2"></i> Profil Saya
                        </a>
                    </li>
                    <hr class="dropdown-divider">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}" style="color: #db1514;" id="logout-link" onmousedown="this.style.background='var(--primary-color)'; this.style.color='var(--light-color)';"
                            onmouseup="this.style.background=''; this.style.color='var(--primary-color)';">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Logout confirmation
        const logoutLink = document.getElementById('logout-link');
        const logoutForm = document.getElementById('logout-form');

        if (logoutLink) {
            logoutLink.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Konfirmasi Logout',
                    text: "Apakah Anda yakin ingin keluar dari sistem?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Keluar',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        logoutForm.submit();
                    }
                });
            });
        }
    });
</script>
