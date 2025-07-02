<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reztis Batik - Keranjang Belanja</title>
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    @stack('styles')
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

        @font-face {
            font-family: 'Sriwedari';
            src: url('font/Sriwedari.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .text-header {
            font-family: 'Sriwedari', sans-serif;
            color: var(--primary-dark);
        }

        .cart-item {
            transition: all 0.3s ease;
        }

        .cart-item:hover {
            background-color: rgba(249, 245, 240, 0.5);
        }

        .product-img-container {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-img:hover {
            transform: scale(1.05);
        }

        .product-title {
            font-weight: 600;
            color: var(--dark-color);
        }

        .product-code {
            font-size: 0.8rem;
            color: #777;
        }

        .current-price {
            font-weight: 600;
            color: var(--primary-color);
        }

        .quantity-selector {
            display: flex;
            align-items: center;
        }

        .btn-quantity {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            background-color: white;
            color: var(--dark-color);
            transition: all 0.2s ease;
        }

        .btn-quantity:hover {
            background-color: var(--light-color);
            color: var(--primary-color);
        }

        .btn-quantity:active {
            transform: scale(0.95);
        }

        .quantity-input {
            width: 50px;
            height: 32px;
            text-align: center;
            border-left: none;
            border-right: none;
            border-color: #ddd;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            transition: all 0.2s ease;
        }

        .btn-action:hover {
            background-color: rgba(220, 53, 69, 0.2);
        }

        .btn-action.delete:active {
            transform: scale(0.9);
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
        }

        .btn-checkout {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        }

        .btn-checkout:active {
            transform: translateY(0);
        }

        .summary-item {
            font-size: 0.95rem;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .product-img-container {
                width: 70px;
                height: 70px;
            }

            .cart-item {
                padding: 1.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .product-img-container {
                width: 60px;
                height: 60px;
            }

            .product-title {
                font-size: 1rem;
            }

            .btn-checkout {
                padding: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <main>
        <div class="container py-5">
            <!-- Header with back button and title -->
            <div class="d-flex align-items-center justify-content-between h-auto mb-4">
                <a href="{{ route('index') }}" class="btn btn-primary rounded-2 me-3 border-0 px-3 py-2"
                    style="background-color: var(--primary-color)">
                    <i class="fas fa-chevron-left me-2"></i> Kembali
                </a>
                <h1 class="fw-bold text-header">
                    <i class="fas fa-shopping-cart me-2"></i>Keranjang Belanja
                </h1>
                <span class="badge rounded-pill ms-3 px-3 py-2 fs-6"
                    style="background-color: var(--primary-color)">{{ $cartItems->sum('quantity') }} Item</span>
            </div>

            <!-- Main Cart Content -->
            <div class="row g-4">
                <!-- Cart Items Column -->
                <div class="col-lg-12">
                    @if ($cartItems->isEmpty())
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center py-5">
                                <i class="fas fa-shopping-cart fa-4x mb-3" style="color: var(--primary-dark);"></i>
                                <h2 class="fw-bold" style="color: var(--primary-dark)">Keranjang Anda Kosong</h2>
                                <p class="h4 fw-medium" style="color: var(--primary-color)">Mulai belanja sekarang!</p>
                                <a href="{{ route('index') }}" class="btn mt-3" style="background-color: var(--primary-dark); color: var(--light-color);">
                                    <i class="fas fa-store me-2"></i> Belanja Sekarang
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- Cart Actions -->
                        <div class="card shadow-sm mb-4 border-0">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll"
                                            style="width: 1.25em; height: 1.25em;">
                                        <label class="form-check-label fw-semibold ms-2" for="selectAll">
                                            Pilih Semua
                                        </label>
                                    </div>
                                    <button class="btn btn-outline-danger btn-sm px-3" id="delete-selected">
                                        <i class="fas fa-trash-alt me-1"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Items List -->
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-0">
                                @foreach ($cartItems as $item)
                                    <div class="cart-item p-4 border-bottom" data-cart-id="{{ $item->id }}">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="form-check">
                                                    <input class="form-check-input item-checkbox" type="checkbox"
                                                        id="product{{ $item->id }}"
                                                        style="width: 1.25em; height: 1.25em;">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="product-img-container">
                                                    <img src="{{ asset($item->product->image) }}" class="product-img"
                                                        alt="{{ $item->product->name }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="product-title mb-1">{{ $item->product->name }}</h5>
                                                <p class="product-code mb-2">Stok: {{ $item->product->stock }}</p>
                                                <div class="product-price d-lg-none mb-2">
                                                    <span class="current-price">Rp
                                                        {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                                </div>
                                                <div class="quantity-selector d-lg-none">
                                                    <button class="btn btn-quantity minus">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input type="text" class="form-control quantity-input"
                                                        value="{{ $item->quantity }}"
                                                        data-cart-id="{{ $item->id }}"
                                                        data-max="{{ $item->product->stock }}">
                                                    <button class="btn btn-quantity plus">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <div class="product-price">
                                                    <span class="current-price">Rp
                                                        {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <div class="quantity-selector">
                                                    <button class="btn btn-quantity minus">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input type="text" class="form-control quantity-input"
                                                        value="{{ $item->quantity }}"
                                                        data-cart-id="{{ $item->id }}"
                                                        data-max="{{ $item->product->stock }}">
                                                    <button class="btn btn-quantity plus">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <div class="product-total">
                                                    <span>Rp
                                                        {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-action delete"
                                                    data-cart-id="{{ $item->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Order Summary Column -->
                @if (!$cartItems->isEmpty())
                    <div class="col-lg-12">
                        <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-4">Ringkasan Belanja</h5>

                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <span class="text-muted">Subtotal ({{ $cartItems->sum('quantity') }}
                                        Produk)</span>
                                    <span class="fw-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0 fw-bold">Total Pembayaran</h5>
                                    <h4 class="mb-0 text-gradient-primary">Rp {{ number_format($total, 0, ',', '.') }}
                                    </h4>
                                </div>

                                <form action="{{ route('pembeli.keranjang.checkout') }}" method="POST"
                                    id="checkout-form">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100 btn-checkout py-3 fw-bold"
                                        id="checkout-button">
                                        <i class="fas fa-credit-card me-2"></i> Checkout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <script>
            document.getElementById('checkout-form').addEventListener('submit', function(event) {
                event.preventDefault();

                // Mengambil semua checkbox yang tercentang
                const selectedItems = Array.from(document.querySelectorAll('.item-checkbox:checked')).map(checkbox => {
                    return checkbox.closest('.cart-item').getAttribute('data-cart-id');
                });

                // Mengecek apakah ada produk yang dipilih
                if (selectedItems.length === 0) {
                    Swal.fire({
                        title: 'Tidak Ada Item Dipilih',
                        text: 'Silakan pilih item yang ingin dibeli.',
                        icon: 'warning',
                        confirmButtonColor: '#8B4513'
                    });
                    return;
                }

                // Tambahkan input untuk cart_ids
                selectedItems.forEach(id => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'cart_ids[]';
                    input.value = id;
                    this.appendChild(input);
                });

                // Submit form
                this.submit();
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Select all functionality
                const selectAll = document.getElementById('selectAll');
                const checkboxes = document.querySelectorAll('.item-checkbox');

                if (selectAll) {
                    selectAll.addEventListener('change', function() {
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = selectAll.checked;
                        });
                    });
                }

                // Quantity controls
                document.querySelectorAll('.btn-quantity').forEach(button => {
                    button.addEventListener('click', function() {
                        const input = this.closest('.quantity-selector').querySelector(
                            '.quantity-input');
                        let value = parseInt(input.value);
                        const max = parseInt(input.getAttribute('data-max'));
                        const cartId = input.getAttribute('data-cart-id');

                        if (this.classList.contains('minus')) {
                            if (value > 1) {
                                input.value = value - 1;
                                updateCartItem(cartId, input.value);
                            }
                        } else {
                            if (value < max) {
                                input.value = value + 1;
                                updateCartItem(cartId, input.value);
                            } else {
                                Swal.fire({
                                    title: 'Stok Tidak Cukup',
                                    text: 'Jumlah melebihi stok yang tersedia',
                                    icon: 'warning',
                                    confirmButtonColor: '#8B4513'
                                });
                            }
                        }
                    });
                });

                // Input change event
                document.querySelectorAll('.quantity-input').forEach(input => {
                    input.addEventListener('change', function() {
                        const max = parseInt(this.getAttribute('data-max'));
                        const cartId = this.getAttribute('data-cart-id');

                        if (this.value < 1) {
                            this.value = 1;
                        }

                        if (this.value > max) {
                            Swal.fire({
                                title: 'Stok Tidak Cukup',
                                text: 'Jumlah melebihi stok yang tersedia',
                                icon: 'warning',
                                confirmButtonColor: '#8B4513'
                            });
                            this.value = max;
                        }

                        updateCartItem(cartId, this.value);
                    });
                });

                // Function to update cart item quantity
                function updateCartItem(cartId, quantity) {
                    fetch("{{ route('pembeli.keranjang.update', '') }}/" + cartId, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                quantity: quantity
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Reload page to update totals
                                window.location.reload();
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: data.message || 'Gagal memperbarui jumlah',
                                    icon: 'error',
                                    confirmButtonColor: '#8B4513'
                                });
                                window.location.reload();
                            }
                        });
                }

                // Delete button functionality
                document.querySelectorAll('.btn-action.delete').forEach(button => {
                    button.addEventListener('click', function() {
                        const cartId = this.getAttribute('data-cart-id');

                        Swal.fire({
                            title: 'Hapus Item?',
                            text: 'Anda yakin ingin menghapus item ini dari keranjang?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#8B4513',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch("{{ route('pembeli.keranjang.destroy', '') }}/" +
                                        cartId, {
                                            method: 'DELETE',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            }
                                        })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Remove item from DOM
                                            const cartItem = document.querySelector(
                                                `.cart-item[data-cart-id="${cartId}"]`);
                                            if (cartItem) {
                                                cartItem.classList.add('animate__animated',
                                                    'animate__fadeOut');
                                                setTimeout(() => {
                                                    cartItem.remove();
                                                    window.location.reload();
                                                }, 300);
                                            }
                                        }
                                    });
                            }
                        });
                    });
                });

                // Delete selected items
                const deleteSelectedBtn = document.getElementById('delete-selected');
                if (deleteSelectedBtn) {
                    deleteSelectedBtn.addEventListener('click', function() {
                        const selectedItems = Array.from(document.querySelectorAll('.item-checkbox:checked'))
                            .map(checkbox => {
                                return checkbox.closest('.cart-item').getAttribute('data-cart-id');
                            });

                        if (selectedItems.length === 0) {
                            Swal.fire({
                                title: 'Tidak Ada Item Dipilih',
                                text: 'Silakan pilih item yang ingin dihapus',
                                icon: 'warning',
                                confirmButtonColor: '#8B4513'
                            });
                            return;
                        }

                        Swal.fire({
                            title: 'Hapus Item Terpilih?',
                            text: `Anda yakin ingin menghapus ${selectedItems.length} item dari keranjang?`,
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#8B4513',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch("{{ route('pembeli.keranjang.destroy-multiple') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            cart_ids: selectedItems
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Reload page
                                            window.location.reload();
                                        }
                                    });
                            }
                        });
                    });
                }
            });
        </script>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>
