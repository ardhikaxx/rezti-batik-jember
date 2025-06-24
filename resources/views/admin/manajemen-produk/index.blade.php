@extends('admin.app')

@section('title', 'Produk Batik')
@section('page-title', 'Manajemen Produk Batik')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 fw-bold">Daftar Produk Batik</h6>
        <div class="d-flex">
            <div class="input-group me-3" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Cari produk...">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <a href="{{ route('admin.data-barang.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Produk
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="productsTable">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$product['image']) }}" alt="{{ $product['name'] }}" width="50" class="rounded">
                        </td>
                        <td>
                            <h6 class="mb-0">{{ $product['name'] }}</h6>
                            <small class="text-muted">SKU: {{ $product['sku'] }}</small>
                        </td>
                        <td>{{ $product['category'] }}</td>
                        <td>
                            <span class="fw-bold">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            @if($product['discount'])
                                <br>
                                <small class="text-danger"><s>Rp {{ number_format($product['original_price'], 0, ',', '.') }}</s> ({{ $product['discount'] }}%)</small>
                            @endif
                        </td>
                        <td>{{ $product['stock'] }}</td>
                        <td>
                            @if($product['status'] == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.data-barang.edit', $product['id']) }}" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.data-barang.destroy', $product['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#productsTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari produk...",
                paginate: {
                    previous: "<i class='fas fa-chevron-left'></i>",
                    next: "<i class='fas fa-chevron-right'></i>"
                }
            }
        });
    });
</script>
@endpush

@endsection