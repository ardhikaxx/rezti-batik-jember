<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reztis Batik - Checkout</title>
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.png') }}" type="image/x-icon">
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
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .text-header {
            color: var(--primary-dark);
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
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item:hover {
            background-color: rgba(249, 245, 240, 0.3);
        }

        .product-img-container {
            width: 100px;
            height: 100px;
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
            font-size: 1.1rem;
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
            padding: 2rem;
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
            font-size: 2.5rem;
            color: var(--primary-light);
            margin-bottom: 1rem;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .summary-total {
            font-weight: 600;
            font-size: 1.2rem;
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
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-checkout:active {
            transform: translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .product-img-container {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 767.98px) {
            .product-img-container {
                width: 70px;
                height: 70px;
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
            <div class="d-flex align-items-center justify-content-start mb-5">
                <div>
                    <h1 class="fw-bold mb-1 text-header">
                        <i class="fas fa-shopping-cart me-2"></i>Checkout
                    </h1>
                    <p class="text-muted mb-0">Lengkapi informasi berikut untuk menyelesaikan pesanan Anda</p>
                </div>
            </div>

            <!-- Alamat Pengiriman -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-map-marker-alt me-2"></i>Alamat Pengiriman</span>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#addressModal">Ubah Alamat Pengiriman</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Alamat Utama -->
                        <div class="col-md-12 mb-3">
                            <div class="card address-card active p-3 h-100">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="mb-0 fw-bold">
                                        {{ $shippingAddresses->where('is_default', true)->first()->recipient_name ?? 'Belum ada alamat' }}
                                    </h5>
                                    @if ($shippingAddresses->where('is_default', true)->first())
                                        <span class="badge bg-primary">Utama</span>
                                    @endif
                                </div>
                                @if ($shippingAddresses->where('is_default', true)->first())
                                    <div class="address-details">
                                        <p class="mb-1">
                                            <strong>{{ $shippingAddresses->where('is_default', true)->first()->recipient_name }}</strong>
                                            ({{ $shippingAddresses->where('is_default', true)->first()->phone_number }})
                                        </p>
                                        <p class="mb-1 text-muted small">
                                            {{ $shippingAddresses->where('is_default', true)->first()->address }}
                                        </p>
                                        <p class="mb-1 text-muted small">
                                            {{ $shippingAddresses->where('is_default', true)->first()->district }},
                                            {{ $shippingAddresses->where('is_default', true)->first()->city }}
                                        </p>
                                        <p class="mb-0 text-muted small">
                                            {{ $shippingAddresses->where('is_default', true)->first()->province }},
                                            {{ $shippingAddresses->where('is_default', true)->first()->postal_code }}
                                        </p>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-sm btn-outline-secondary me-2" data-bs-toggle="modal"
                                            data-bs-target="#addressModal">Ubah Alamat Pengiriman</button>
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
            </div>

            <!-- Address Selection Modal -->
            <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addressModalLabel">Pilih Alamat Pengiriman</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach ($shippingAddresses as $address)
                                    <div class="col-md-6 mb-3">
                                        <div class="card address-card {{ $address->is_default ? 'active' : '' }} p-3 h-100">
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
                                                            <i class="fas fa-check-circle me-1"></i> Jadikan Alamat Pengiriman
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
                                        <img src="{{ $item->product->image_url }}" class="product-img"
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

                            <div class="payment-method active">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/252px-BANK_BRI_logo.svg.png"
                                    class="payment-icon" alt="BRI">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Transfer Bank BRI</h6>
                                    <p class="small text-muted mb-0">Rek: 1234-5678-9012-3456 a/n Reztis Batik</p>
                                </div>
                                <i class="fas fa-check-circle text-success ms-2"></i>
                            </div>

                            <div class="payment-method">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1200px-Bank_Central_Asia.svg.png"
                                    class="payment-icon" alt="BCA">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Transfer Bank BCA</h6>
                                    <p class="small text-muted mb-0">Rek: 9876-5432-1098-7654 a/n Reztis Batik</p>
                                </div>
                            </div>

                            <div class="payment-method">
                                <img src="https://upload.wikimedia.org/wikipedia/id/thumb/f/fa/Bank_Mandiri_logo.svg/2880px-Bank_Mandiri_logo.svg.png"
                                    class="payment-icon" alt="Mandiri">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Transfer Bank Mandiri</h6>
                                    <p class="small text-muted mb-0">Rek: 5678-1234-9012-3456 a/n Reztis Batik</p>
                                </div>
                            </div>

                            <div class="payment-method">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/1200px-Logo_dana_blue.svg.png"
                                    class="payment-icon" alt="DANA">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">DANA</h6>
                                    <p class="small text-muted mb-0">0812-3456-7890 a/n Reztis Batik</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3">Upload Bukti Pembayaran</h5>
                            <div class="upload-area" id="uploadArea">
                                <input type="file" name="payment_proof" id="payment_proof" accept="image/*" hidden
                                    required>
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
                    {{-- Ringkasan Pesanan --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-receipt me-2"></i>Ringkasan Pesanan
                        </div>
                        <form action="{{ route('pembeli.pesanan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="shipping_address_id"
                                value="{{ $shippingAddresses->where('is_default', true)->first()->id ?? '' }}">
                            <input type="hidden" name="payment_method" id="payment_method" value="">

                            @foreach ($cartItems as $ci)
                                <input type="hidden" name="cart_ids[]" value="{{ $ci->id }}">
                            @endforeach

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
            // You can implement AJAX here to update the selected address
            // For now, we'll just close the modal
            $('#addressModal').modal('hide');

            // Show success message
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
            method.addEventListener('click', function () {
                document.querySelectorAll('.payment-method').forEach(m => {
                    m.classList.remove('active');
                    m.querySelector('.fa-check-circle')?.remove();
                });

                this.classList.add('active');

                const checkIcon = document.createElement('i');
                checkIcon.className = 'fas fa-check-circle text-success ms-2';
                this.appendChild(checkIcon);

                // Ambil teks dari elemen <h6> di dalam payment-method
                const selectedMethod = this.querySelector('h6')?.innerText || '';
                document.getElementById('payment_method').value = selectedMethod;
            });
        });



        // Upload area interaction
        const uploadArea = document.querySelector('.upload-area');
        uploadArea.addEventListener('click', function () {
            // Trigger file input click
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';
            fileInput.click();

            fileInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        uploadArea.innerHTML = `
                            <img src="${e.target.result}" class="img-fluid mb-2" style="max-height: 150px;">
                            <p class="mb-1">${fileInput.files[0].name}</p>
                            <p class="small text-muted">${(fileInput.files[0].size / 1024 / 1024).toFixed(2)} MB</p>
                            <button class="btn btn-sm btn-outline-danger mt-2">Unggah Ulang</button>
                        `;
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>