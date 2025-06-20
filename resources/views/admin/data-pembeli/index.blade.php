@extends('admin.app')

@section('title', 'Data Pelanggan')
@section('page-title', 'Manajemen Pelanggan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 fw-bold">Daftar Pelanggan</h6>
        <div class="input-group" style="width: 300px;">
            <input type="text" class="form-control" placeholder="Cari pelanggan...">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="customersTable">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Total Pesanan</th>
                        <th>Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/'.$customer['avatar']) }}" alt="{{ $customer['name'] }}" width="40" height="40" class="rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">{{ $customer['name'] }}</h6>
                                    <small class="text-muted">ID: {{ $customer['id'] }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $customer['email'] }}</td>
                        <td>{{ $customer['phone'] ?? '-' }}</td>
                        <td>
                            <span class="fw-bold">{{ $customer['total_orders'] }}</span> pesanan<br>
                            <small class="text-muted">Rp {{ number_format($customer['total_spent'], 0, ',', '.') }}</small>
                        </td>
                        <td>{{ $customer['joined_at'] }}</td>
                        <td>
                            <a href="{{ route('admin.data-pembeli.show', $customer['id']) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye me-1"></i> Detail
                            </a>
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
        $('#customersTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari pelanggan...",
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