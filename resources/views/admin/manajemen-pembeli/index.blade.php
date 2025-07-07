@extends('admin.app')

@section('title', 'Data Pelanggan')
@section('page-title', 'Manajemen Pelanggan')

@section('content')
    <div class="card shadow-sm border-0">
        <div
            class="card-header bg-white border-0 d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center py-3">
            <h6 class="mb-2 mb-md-0 fw-bold">Daftar Pelanggan</h6>
            <form action="{{ route('admin.data-pembeli.index') }}" method="GET" class="ms-md-3">
                <div class="input-group" style="width: 300px;">
                    <input type="text" name="search" class="form-control" placeholder="Cari pelanggan..."
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Total Pesanan</th>
                            <th>Total Belanja</th>
                            <th>Bergabung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}</td>
                                <td>{{ $customer->nama }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->no_hp }}</td>
                                <td>{{ $customer->orders_count }}</td>
                                <td>Rp {{ number_format($customer->orders_sum_total ?? 0, 0, ',', '.') }}</td>
                                <td>{{ $customer->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.data-pembeli.show', $customer->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-0 me-md-1"></i>
                                        <span class="d-none d-sm-inline">Detail</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada pelanggan ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($customers->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($customers->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $customers->previousPageUrl() }}"
                                        rel="prev">&laquo;</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($customers->getUrlRange(1, $customers->lastPage()) as $page => $url)
                                @if ($page == $customers->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link" style="color: var(--light-color);">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($customers->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $customers->nextPageUrl() }}" rel="next">&raquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">&raquo;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
@endsection
