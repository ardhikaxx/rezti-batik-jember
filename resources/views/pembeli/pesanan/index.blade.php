@extends('pembeli.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2>Pesanan Saya</h2>
            <hr>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Daftar pesanan akan ditampilkan di sini -->
                        <tr>
                            <td colspan="5" class="text-center">Anda belum memiliki pesanan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection