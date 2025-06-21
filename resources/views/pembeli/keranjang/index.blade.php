@extends('pembeli.app')

@section('title', 'Keranjang Saya')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2>Keranjang Belanja</h2>
            <hr>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item keranjang akan ditampilkan di sini -->
                        <tr>
                            <td colspan="5" class="text-center">Keranjang Anda masih kosong</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Total</td>
                            <td colspan="2">Rp 0</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('pembeli.index') }}" class="btn btn-outline-primary">Lanjut Belanja</a>
                <button class="btn btn-primary" disabled>Checkout</button>
            </div>
        </div>
    </div>
</div>
@endsection