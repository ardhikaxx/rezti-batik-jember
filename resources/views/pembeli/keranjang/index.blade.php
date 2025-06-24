@extends('pembeli.app')

@section('title', 'Keranjang Saya')

@section('content')

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

        .text-gradient-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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

    <div class="container py-5">
        <!-- Header with back button and title -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('index') }}" class="btn btn-primary rounded-2 me-3 border-0 px-3 py-2"
                style="background-color: var(--primary-color)">
                <i class="fas fa-chevron-left me-2"></i> Kembali
            </a>
            <h1 class="fw-bold mb-0 text-gradient-primary">
                <i class="fas fa-shopping-cart me-2"></i>Keranjang Belanja
            </h1>
            <span class="badge rounded-pill ms-3 px-3 py-2 fs-6" style="background-color: var(--primary-color)">3 Item</span>
        </div>

        <!-- Main Cart Content -->
        <div class="row g-4">
            <!-- Cart Items Column -->
            <div class="col-lg-8">
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
                            <button class="btn btn-outline-danger btn-sm px-3">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Cart Items List -->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <!-- Product 1 -->
                        <div class="cart-item p-4 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="product1" checked
                                            style="width: 1.25em; height: 1.25em;">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="product-img-container">
                                        <img src="{{ asset('img/batik-1.jpg') }}"
                                            class="product-img" alt="Batik Mega Mendung">
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="product-title mb-1">Batik Tulis Motif Dewa Ruci</h5>
                                    <p class="product-code mb-2">Kode: BT001</p>
                                    <div class="product-price d-lg-none mb-2">
                                        <span class="current-price">Rp 250.000</span>
                                    </div>
                                    <div class="quantity-selector d-lg-none">
                                        <button class="btn btn-quantity minus">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control quantity-input" value="2">
                                        <button class="btn btn-quantity plus">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="product-price">
                                        <span class="current-price">Rp 250.000</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="quantity-selector">
                                        <button class="btn btn-quantity minus">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control quantity-input" value="2">
                                        <button class="btn btn-quantity plus">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="product-total">
                                        <span>Rp 500.000</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-action delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div class="cart-item p-4 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="product2" checked
                                            style="width: 1.25em; height: 1.25em;">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="product-img-container">
                                        <img src="{{ asset('img/batik-2.jpg') }}" class="product-img" alt="Batik Parang">
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="product-title mb-1">Batik Tulis Motif Sekarjagat</h5>
                                    <p class="product-code mb-2">Kode: BT002</p>
                                    <div class="product-price d-lg-none mb-2">
                                        <span class="current-price">Rp 320.000</span>
                                    </div>
                                    <div class="quantity-selector d-lg-none">
                                        <button class="btn btn-quantity minus">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control quantity-input" value="1">
                                        <button class="btn btn-quantity plus">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="product-price">
                                        <span class="current-price">Rp 320.000</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="quantity-selector">
                                        <button class="btn btn-quantity minus">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control quantity-input" value="1">
                                        <button class="btn btn-quantity plus">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="product-total">
                                        <span>Rp 320.000</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-action delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3 -->
                        <div class="cart-item p-4">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="product3"
                                            style="width: 1.25em; height: 1.25em;">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="product-img-container">
                                        <img src="{{ asset('img/batik-3.jpg') }}" class="product-img" alt="Batik Kawung">
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="product-title mb-1">Batik Tulis Motif Wanito Kinasih</h5>
                                    <p class="product-code mb-2">Kode: BT003</p>
                                    <div class="product-price d-lg-none mb-2">
                                        <span class="current-price">Rp 280.000</span>
                                    </div>
                                    <div class="quantity-selector d-lg-none">
                                        <button class="btn btn-quantity minus">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control quantity-input" value="3">
                                        <button class="btn btn-quantity plus">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="product-price">
                                        <span class="current-price">Rp 280.000</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="quantity-selector">
                                        <button class="btn btn-quantity minus">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control quantity-input" value="3">
                                        <button class="btn btn-quantity plus">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-none d-lg-block">
                                    <div class="product-total">
                                        <span>Rp 840.000</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-action delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Column -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-4">Ringkasan Belanja</h5>

                        <div class="summary-item d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal (3 Produk)</span>
                            <span class="fw-semibold">Rp 1,660,000</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0 fw-bold">Total Pembayaran</h5>
                            <h4 class="mb-0 text-gradient-primary">Rp 1,635,000</h4>
                        </div>

                        <button class="btn btn-primary w-100 btn-checkout py-3 fw-bold">
                            <i class="fas fa-credit-card me-2"></i> Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all functionality
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.cart-item .form-check-input');

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
            });

            // Quantity controls
            document.querySelectorAll('.btn-quantity').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.closest('.quantity-selector').querySelector(
                        '.quantity-input');
                    let value = parseInt(input.value);

                    if (this.classList.contains('minus')) {
                        if (value > 1) {
                            input.value = value - 1;
                        }
                    } else {
                        input.value = value + 1;
                    }

                    // Here you would update the total price
                    console.log('Quantity updated:', input.value);
                });
            });

            // Delete button functionality
            document.querySelectorAll('.btn-action.delete').forEach(button => {
                button.addEventListener('click', function() {
                    const cartItem = this.closest('.cart-item');
                    cartItem.classList.add('animate__animated', 'animate__fadeOut');

                    setTimeout(() => {
                        cartItem.remove();
                        console.log('Item removed from cart');
                        // Here you would update the cart summary
                    }, 300);
                });
            });
        });
    </script>
@endsection
