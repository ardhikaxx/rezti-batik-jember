<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reztis Batik - Checkout</title>
    <link rel="shortcut icon" href="{{ asset('img/logo-brand.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    @stack('styles')
    <style>
        :root {
            --primary-color: #8B4513;
            --primary-light: #B68D65;
            --primary-dark: #5D2906;
            --secondary-color: #D2B48C;
            --light-color: #F9F5F0;
            --dark-color: #3E2723;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .text-header {
            color: var(--primary-dark);
        }

        /* Improved Header Styles */
        .page-header {
            position: relative;
            padding: 1rem 0;
            margin-bottom: 1.5rem;
        }

        .back-btn {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background-color: var(--primary-dark);
            transform: translateX(-3px);
        }

        .back-btn-text {
            display: none;
        }

        .checkout-title {
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* Address Edit Button Styles */
        .address-edit-btn {
            background-color: var(--primary-color);
            color: var(--light-color);
            display: flex;
            align-items: center;
            padding: 0.35rem 0.75rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .address-edit-btn:hover {
            border: 2px solid var(--primary-color);
        }

        .address-edit-icon {
            display: none;
            font-size: 0.9rem;
        }

        .address-edit-text {
            display: inline;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .address-edit-text {
                display: none;
            }

            .address-edit-icon {
                display: inline;
            }

            .address-edit-btn {
                width: 36px;
                height: 36px;
                padding: 0;
                border-radius: 50%;
                justify-content: center;
            }

            .address-card {
                padding: 1rem !important;
            }

            .address-details p {
                margin-bottom: 0.5rem !important;
                font-size: 0.85rem;
            }
        }

        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            color: var(--primary-dark);
            padding: 1rem 1.5rem;
            border-radius: 12px 12px 0 0 !important;
        }

        .cart-item {
            transition: all 0.3s ease;
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item:hover {
            background-color: rgba(249, 245, 240, 0.3);
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
            margin-bottom: 0.25rem;
        }

        .product-code {
            font-size: 0.8rem;
            color: #777;
        }

        .current-price {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1rem;
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

        .address-card {
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .address-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .address-card.active {
            border-left: 4px solid var(--primary-dark);
            background-color: rgba(139, 69, 19, 0.05);
        }

        .payment-method {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .payment-method:hover {
            border-color: var(--primary-light);
        }

        .payment-method.active {
            border-color: var(--primary-color);
            background-color: rgba(139, 69, 19, 0.05);
        }

        .payment-icon {
            width: 40px;
            height: 40px;
            object-fit: contain;
            margin-right: 1rem;
        }

        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.5);
        }

        .upload-area:hover {
            border-color: var(--primary-light);
            background-color: rgba(210, 180, 140, 0.1);
        }

        .upload-icon {
            font-size: 2rem;
            color: var(--primary-light);
            margin-bottom: 0.75rem;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .summary-total {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--primary-dark);
        }

        .btn-checkout {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
            border: none;
        }

        .btn-checkout:hover {
            color: white;
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-checkout:active {
            transform: translateY(0);
        }

        /* Responsive adjustments */
        @media (min-width: 768px) {
            .back-btn {
                width: auto;
                padding: 0.5rem 1rem;
                border-radius: 8px;
            }

            .back-btn-text {
                display: inline;
                margin-left: 0.5rem;
            }

            .checkout-title {
                font-size: 1.75rem;
            }

            .product-img-container {
                width: 100px;
                height: 100px;
            }

            .payment-icon {
                width: 60px;
                height: 60px;
            }

            .upload-area {
                padding: 2rem;
            }

            .upload-icon {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .page-header {
                padding: 0.75rem 0;
                margin-bottom: 1rem;
            }

            .cart-item {
                padding: 0.75rem;
            }

            .product-img-container {
                width: 60px;
                height: 60px;
            }

            .product-title {
                font-size: 0.95rem;
            }

            .current-price {
                font-size: 0.9rem;
            }

            .payment-method {
                padding: 0.5rem;
            }

            .payment-icon {
                width: 30px;
                height: 30px;
                margin-right: 0.75rem;
            }

            .upload-area {
                padding: 1rem;
            }

            .upload-icon {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <main>
        <div class="container py-3 py-md-4 py-lg-5">
            <!-- Improved Header with back button and title -->
            <div class="page-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('pembeli.keranjang.index') }}" class="back-btn me-2 me-md-3">
                            <i class="fas fa-chevron-left"></i>
                            <span class="back-btn-text">Kembali</span>
                        </a>
                        <div>
                            <h1 class="checkout-title mb-0">
                                <i class="fas fa-shopping-cart me-2"></i>Checkout
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Alamat Pengiriman -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-map-marker-alt me-2"></i>Alamat Pengiriman</span>
                    <button class="btn address-edit-btn" data-bs-toggle="modal"
                        data-bs-target="#addressModal">
                        <span class="address-edit-text"><i class="fas fa-pencil-alt me-2"></i>Ubah Alamat</span>
                        <i class="fas fa-pencil-alt address-edit-icon"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Alamat Utama -->
                        <div class="col-md-12 mb-3">
                            @if ($defaultAddress = $shippingAddresses->where('is_default', true)->first())
                                <div class="card address-card active p-3 h-100">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="mb-0 fw-bold">{{ $defaultAddress->recipient_name }}</h5>
                                        <span class="badge bg-primary">Utama</span>
                                    </div>
                                    <div class="address-details">
                                        <p class="mb-1">
                                            <strong>{{ $defaultAddress->recipient_name }}</strong>
                                            ({{ $defaultAddress->phone_number }})
                                        </p>
                                        <p class="mb-1 text-muted small">{{ $defaultAddress->address }}</p>
                                        <p class="mb-1 text-muted small">
                                            {{ $defaultAddress->district }}, {{ $defaultAddress->city }}
                                        </p>
                                        <p class="mb-0 text-muted small">
                                            {{ $defaultAddress->province }}, {{ $defaultAddress->postal_code }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning mb-0">
                                    Anda belum memiliki alamat pengiriman. Silakan tambahkan alamat terlebih dahulu.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Selection Modal -->
            <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addressModalLabel">Pilih Alamat Pengiriman</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach ($shippingAddresses as $address)
                                    <div class="col-md-6 mb-3">
                                        <div
                                            class="card address-card {{ $address->is_default ? 'active' : '' }} p-3 h-100">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h5 class="mb-0 fw-bold">{{ $address->recipient_name }}</h5>
                                                @if ($address->is_default)
                                                    <span class="badge bg-primary">Utama</span>
                                                @endif
                                            </div>
                                            <div class="address-details">
                                                <p class="mb-1"><strong>{{ $address->recipient_name }}</strong>
                                                    ({{ $address->phone_number }})
                                                </p>
                                                <p class="mb-1 text-muted small">{{ $address->address }}</p>
                                                <p class="mb-1 text-muted small">{{ $address->district }},
                                                    {{ $address->city }}
                                                </p>
                                                <p class="mb-0 text-muted small">{{ $address->province }},
                                                    {{ $address->postal_code }}
                                                </p>
                                            </div>
                                            <div class="mt-3 d-flex justify-content-between">
                                                @if (!$address->is_default)
                                                    <form
                                                        action="{{ route('pembeli.shipping-address.set-default', $address->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm w-100 rounded-3"
                                                            style="background-color: var(--secondary-color); color: var(--dark-color);">
                                                            <i class="fas fa-check-circle me-1"></i> Jadikan Alamat
                                                            Pengiriman
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if ($shippingAddresses->isEmpty())
                                <div class="alert alert-info">
                                    Anda belum memiliki alamat pengiriman. Silakan tambahkan alamat terlebih dahulu.
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('pembeli.shipping-address.create') }}" class="btn btn-primary">Tambah
                                Alamat</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produk yang Dipesan -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-box-open me-2"></i>Produk Dipesan
                </div>
                <div class="card-body p-0">
                    @foreach ($cartItems as $item)
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-md-2 col-4">
                                    <div class="product-img-container">
                                        <img src="{{ asset($item->product->image) }}" class="product-img"
                                            alt="{{ $item->product->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <h5 class="product-title mb-1">{{ $item->product->name }}</h5>
                                    <p class="product-code mb-2">Kode: {{ $item->product->code }}</p>
                                    <div class="d-md-none">
                                        <span class="current-price">Rp
                                            {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                        <span class="text-muted ms-2">x {{ $item->quantity }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2 d-none d-md-block text-center">
                                    <span class="current-price">Rp
                                        {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="col-md-2 d-none d-md-block text-center">
                                    <span>{{ $item->quantity }}</span>
                                </div>
                                <div class="col-md-2 d-none d-md-block text-center">
                                    <span class="current-price">Rp
                                        {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-credit-card me-2"></i>Metode Pembayaran
                        </div>
                        <div class="card-body">
                            <h5 class="mb-3">Pilih Metode Pembayaran</h5>

                            <div class="payment-method active" data-method="Transfer Bank BCA">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1200px-Bank_Central_Asia.svg.png"
                                    class="payment-icon" alt="BCA">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Transfer Bank BCA</h6>
                                    <p class="small text-muted mb-0">Rek: 3320-4720-15 a/n LESTARI KUSUMAWATI</p>
                                </div>
                            </div>

                            <div class="payment-method" data-method="Transfer Bank Mandiri">
                                <img src="https://upload.wikimedia.org/wikipedia/id/thumb/f/fa/Bank_Mandiri_logo.svg/2880px-Bank_Mandiri_logo.svg.png"
                                    class="payment-icon" alt="Mandiri">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Transfer Bank Mandiri</h6>
                                    <p class="small text-muted mb-0">Rek: 1430-0154-9338-8 a/n LESTARI KUSUMAWATI</p>
                                </div>
                            </div>

                            <div class="payment-method" data-method="Transfer Bank BRI">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/252px-BANK_BRI_logo.svg.png"
                                    class="payment-icon" alt="BRI">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Transfer Bank BRI</h6>
                                    <p class="small text-muted mb-0">Rek: 1161-0100-6551-531 a/n TAMARA REZTI SYAFIRA
                                    </p>
                                </div>
                            </div>

                            <div class="payment-method" data-method="DANA">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/1200px-Logo_dana_blue.svg.png"
                                    class="payment-icon" alt="DANA">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">DANA</h6>
                                    <p class="small text-muted mb-0">0823-1030-1199 a/n TAMARA REZTI SYAFRIANA</p>
                                </div>
                            </div>

                            <div class="payment-method" data-method="GoPay">
                                <img src="https://logos-world.net/wp-content/uploads/2023/03/GoPay-Logo.png"
                                    class="payment-icon" alt="GoPay">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">GoPay</h6>
                                    <p class="small text-muted mb-0">0823-1030-1199 a/n TAMARA REZTI SYAFRIANA</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3">Upload Bukti Pembayaran</h5>
                            <div class="upload-area" id="uploadArea">
                                <input type="file" name="payment_proof" id="payment_proof" accept="image/*"
                                    hidden required>
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <h5 id="uploadText">Seret dan lepas file disini</h5>
                                <p class="text-muted mb-3">atau</p>
                                <button type="button" class="btn btn-primary" id="triggerUpload">Pilih File</button>
                                <p class="small text-muted mt-2">Format: JPG, PNG (Maks. 5MB)</p>
                            </div>

                            <div class="alert alert-info mt-3">
                                <i class="fas fa-info-circle me-2"></i> Setelah mengupload bukti pembayaran, pesanan
                                Anda akan diverifikasi dalam 1x24 jam.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-receipt me-2"></i>Ringkasan Pesanan
                        </div>
                        <form action="{{ route('pembeli.pesanan.store') }}" method="POST"
                            enctype="multipart/form-data" id="orderForm">
                            @csrf

                            <input type="hidden" name="shipping_address_id"
                                value="{{ $defaultAddress->id ?? '' }}">
                            <input type="hidden" name="payment_method" id="payment_method"
                                value="Transfer Bank BRI">

                            @foreach ($cartItems as $ci)
                                <input type="hidden" name="cart_ids[]" value="{{ $ci->id }}">
                            @endforeach

                            <input type="file" name="payment_proof" id="payment_proof_input" accept="image/*"
                                hidden required>

                            <div class="card-body">
                                <div class="summary-item">
                                    <span>Subtotal Produk</span>
                                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="summary-item summary-total">
                                    <span>Total Pembayaran</span>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>

                                <button type="submit" class="btn btn-checkout mt-4">
                                    <i class="fas fa-paper-plane me-2"></i>Buat Pesanan
                                </button>

                                <div class="alert alert-warning mt-3 small">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Pastikan data pesanan sudah benar sebelum melakukan pembayaran.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Function to handle address selection
        function selectAddress(addressId) {
            $('#addressModal').modal('hide');

            Swal.fire({
                icon: 'success',
                title: 'Alamat berhasil diubah',
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
    <script>
        // Payment method selection
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function() {
                document.querySelectorAll('.payment-method').forEach(m => {
                    m.classList.remove('active');
                    m.querySelector('.fa-check-circle')?.remove();
                });

                this.classList.add('active');

                const checkIcon = document.createElement('i');
                checkIcon.className = 'fas fa-check-circle text-success ms-2';
                this.appendChild(checkIcon);

                // Set payment method value
                document.getElementById('payment_method').value = this.getAttribute('data-method');
            });
        });

        // Upload area interaction
        const uploadArea = document.getElementById('uploadArea');
        const paymentProofInput = document.getElementById('payment_proof_input');
        const uploadText = document.getElementById('uploadText');
        const triggerUpload = document.getElementById('triggerUpload');

        triggerUpload.addEventListener('click', function(e) {
            e.stopPropagation();
            paymentProofInput.click();
        });

        paymentProofInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                // Validasi ukuran file
                if (this.files[0].size > 5 * 1024 * 1024) {
                    Swal.fire({
                        title: 'File terlalu besar',
                        text: 'Ukuran file maksimal 5MB',
                        icon: 'error',
                        confirmButtonColor: '#8B4513'
                    });
                    return;
                }

                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validTypes.includes(this.files[0].type)) {
                    Swal.fire({
                        title: 'Format tidak valid',
                        text: 'Hanya menerima file JPG, JPEG, atau PNG',
                        icon: 'error',
                        confirmButtonColor: '#8B4513'
                    });
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    uploadArea.innerHTML = `
                    <img src="${e.target.result}" class="img-fluid mb-2" style="max-height: 150px;">
                    <p class="mb-1">${paymentProofInput.files[0].name}</p>
                    <p class="small text-muted">${(paymentProofInput.files[0].size / 1024 / 1024).toFixed(2)} MB</p>
                    <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="reuploadBtn">Unggah Ulang</button>
                `;

                    // Handle reupload button
                    document.getElementById('reuploadBtn').addEventListener('click', function(e) {
                        e.stopPropagation();
                        paymentProofInput.value = '';
                        resetUploadArea();
                    });
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Drag and drop functionality
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#8B4513';
            this.style.backgroundColor = 'rgba(210, 180, 140, 0.1)';
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#ddd';
            this.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#ddd';
            this.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';

            if (e.dataTransfer.files.length) {
                paymentProofInput.files = e.dataTransfer.files;
                const event = new Event('change');
                paymentProofInput.dispatchEvent(event);
            }
        });

        // Form validation before submission
        document.getElementById('orderForm').addEventListener('submit', function(e) {
            const shippingAddressId = document.querySelector('input[name="shipping_address_id"]').value;
            const paymentProof = document.getElementById('payment_proof_input').files;

            if (!shippingAddressId) {
                e.preventDefault();
                Swal.fire({
                    title: 'Alamat Pengiriman Diperlukan',
                    text: 'Silakan pilih alamat pengiriman terlebih dahulu',
                    icon: 'warning',
                    confirmButtonColor: '#8B4513'
                });
                return;
            }

            if (!paymentProof || paymentProof.length === 0) {
                e.preventDefault();
                Swal.fire({
                    title: 'Bukti Pembayaran Diperlukan',
                    text: 'Silakan upload bukti pembayaran terlebih dahulu',
                    icon: 'warning',
                    confirmButtonColor: '#8B4513'
                });
            }
        });

        function resetUploadArea() {
            uploadArea.innerHTML = `
            <div class="upload-icon">
                <i class="fas fa-cloud-upload-alt"></i>
            </div>
            <h5 id="uploadText">Seret dan lepas file disini</h5>
            <p class="text-muted mb-3">atau</p>
            <button type="button" class="btn btn-primary" id="triggerUpload">Pilih File</button>
            <p class="small text-muted mt-2">Format: JPG, PNG (Maks. 5MB)</p>
        `;

            // Re-attach event listeners
            document.getElementById('triggerUpload').addEventListener('click', function(e) {
                e.stopPropagation();
                paymentProofInput.click();
            });
        }
    </script>
    @stack('scripts')
</body>

</html>
