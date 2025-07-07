@extends('admin.app')

@section('title', 'Produk Batik')
@section('page-title', 'Daftar Produk Batik')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center py-3">
            <h6 class="mb-2 mb-md-0 fw-bold">Daftar Produk Batik</h6>
            <div class="d-flex">
                <form action="{{ route('admin.data-barang.index') }}" method="GET" class="me-3">
                    <div class="input-group" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <a href="{{ route('admin.data-barang.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-md-2"></i>
                    <span class="d-none d-md-inline">Tambah Produk</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="65"
                                        height="65" class="rounded" style="object-fit: cover;">
                                </td>
                                <td>
                                    <h6 class="mb-0">{{ $product->name }}</h6>
                                </td>
                                <td>
                                    <span class="fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                </td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    @if ($product->status == 'active')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.data-barang.edit', $product->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.data-barang.destroy', $product->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger delete-btn">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada produk ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if ($products->hasPages())
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($products->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
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
                        @if ($products->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a>
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

    <script>
        // Delete confirmation with SweetAlert
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data produk akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection