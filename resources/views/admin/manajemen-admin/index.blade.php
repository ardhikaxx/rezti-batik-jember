@extends('admin.app')

@section('title', 'Manajemen Admin')
@section('page-title', 'Manajemen Admin')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
            <h6 class="m-0 fw-bold">Daftar Admin</h6>
            <div class="d-flex">
                <form action="{{ route('admin.manajemen-admin.index') }}" method="GET" class="me-3">
                    <div class="input-group" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari Admin..."
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <a href="{{ route('admin.manajemen-admin.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Admin
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="adminsTable">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration + ($admins->currentPage() - 1) * $admins->perPage() }}</td>
                                <td>{{ $admin->nama_lengkap }}</td>
                                <td>{{ $admin->telepon }}</td>
                                <td>{{ $admin->jenis_kelamin }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.manajemen-admin.edit', $admin->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.manajemen-admin.destroy', $admin->id) }}"
                                            method="POST" class="delete-form">
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
                                <td colspan="6" class="text-center">Tidak ada data admin</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $admins->links() }}
            </div>
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
                    text: "Data admin akan dihapus secara permanen!",
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