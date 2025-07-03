<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Layanan Edukasi - Reztis Batik</title>
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            color: #333;
        }

        .booking-container {
            max-width: 1000px;
            margin: 50px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .booking-header {
            background-color: var(--primary-color);
            color: white;
            padding: 25px 30px;
        }

        .booking-header h2 {
            font-weight: 700;
            margin: 0;
        }

        .booking-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
        }

        .form-control,
        .form-select {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
        }

        .price-display {
            background-color: rgba(210, 180, 140, 0.1);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .price-total {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--primary-dark);
            border-top: 1px solid #eee;
            padding-top: 10px;
            margin-top: 10px;
        }

        .payment-method {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
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
            width: 50px;
            height: 50px;
            object-fit: contain;
            margin-right: 15px;
        }

        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.5);
            margin-bottom: 20px;
        }

        .upload-area:hover {
            border-color: var(--primary-light);
            background-color: rgba(210, 180, 140, 0.1);
        }

        .upload-icon {
            font-size: 2.5rem;
            color: var(--primary-light);
            margin-bottom: 15px;
        }

        .btn-submit {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .time-slot {
            display: inline-block;
            padding: 8px 15px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .time-slot:hover {
            border-color: var(--primary-light);
        }

        .time-slot.selected {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .time-slots-container {
            margin-top: 10px;
        }

        .invalid-feedback {
            display: block;
            margin-top: 5px;
        }

        .preview-image {
            max-width: 100%;
            max-height: 200px;
            margin-top: 15px;
            display: none;
        }

        .upload-preview {
            text-align: center;
        }

        .upload-preview img {
            max-height: 150px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .file-info {
            margin-bottom: 10px;
        }

        .file-size {
            font-size: 0.8rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="booking-container">
        <div class="booking-header">
            <h2><i class="fas fa-calendar-alt me-2"></i> Booking Layanan Edukasi Membatik</h2>
        </div>

        <div class="booking-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pembeli.layanan-edukasi.store') }}" method="POST" enctype="multipart/form-data" id="bookingForm">
                @csrf

                <!-- Tanggal Booking -->
                <div class="mb-4">
                    <label for="booking_date" class="form-label">Tanggal Booking <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="booking_date" name="booking_date" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                    <div class="invalid-feedback">Silakan pilih tanggal booking</div>
                </div>

                <!-- Waktu Booking -->
                <div class="mb-4">
                    <label class="form-label">Waktu Booking <span class="text-danger">*</span></label>
                    <div class="time-slots-container">
                        @php
                            $start_time = strtotime('08:00');
                            $end_time = strtotime('15:00');
                            $interval = 60 * 60; // 1 hour interval
                        @endphp

                        @for ($time = $start_time; $time <= $end_time; $time += $interval)
                            <div class="time-slot" data-time="{{ date('H:i', $time) }}">
                                {{ date('H:i', $time) }} - {{ date('H:i', $time + $interval) }}
                            </div>
                        @endfor
                    </div>
                    <input type="hidden" name="booking_time" id="booking_time" required>
                    <div class="invalid-feedback">Silakan pilih waktu booking</div>
                </div>

                <!-- Jumlah Peserta -->
                <div class="mb-4">
                    <label for="participant_count" class="form-label">Jumlah Peserta <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="participant_count" name="participant_count" min="1" max="20" required value="1">
                    <div class="invalid-feedback">Silakan masukkan jumlah peserta (minimal 1)</div>
                </div>

                <!-- Harga -->
                <div class="mb-4 price-display">
                    <div class="price-item">
                        <span>Harga per orang:</span>
                        <span>Rp 25.000</span>
                    </div>
                    <div class="price-item price-total">
                        <span>Total Harga:</span>
                        <span id="total_price">Rp 25.000</span>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div class="mb-4">
                    <label class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>

                    <div class="payment-method active" data-method="Transfer Bank BCA">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1200px-Bank_Central_Asia.svg.png" class="payment-icon" alt="BCA">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Transfer Bank BCA</h6>
                            <p class="small text-muted mb-0">Rek: 3320-4720-15 a/n LESTARI KUSUMAWATI</p>
                        </div>
                    </div>

                    <div class="payment-method" data-method="Transfer Bank Mandiri">
                        <img src="https://upload.wikimedia.org/wikipedia/id/thumb/f/fa/Bank_Mandiri_logo.svg/2880px-Bank_Mandiri_logo.svg.png" class="payment-icon" alt="Mandiri">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Transfer Bank Mandiri</h6>
                            <p class="small text-muted mb-0">Rek: 1430-0154-9338-8 a/n LESTARI KUSUMAWATI</p>
                        </div>
                    </div>

                    <div class="payment-method" data-method="Transfer Bank BRI">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/252px-BANK_BRI_logo.svg.png" class="payment-icon" alt="BRI">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Transfer Bank BRI</h6>
                            <p class="small text-muted mb-0">Rek: 1161-0100-6551-531 a/n TAMARA REZTI SYAFIRA</p>
                        </div>
                    </div>

                    <div class="payment-method" data-method="DANA">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/1200px-Logo_dana_blue.svg.png" class="payment-icon" alt="DANA">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">DANA</h6>
                            <p class="small text-muted mb-0">0823-1030-1199 a/n TAMARA REZTI SYAFRIANA</p>
                        </div>
                    </div>

                    <div class="payment-method" data-method="GoPay">
                        <img src="https://logos-world.net/wp-content/uploads/2023/03/GoPay-Logo.png" class="payment-icon" alt="GoPay">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">GoPay</h6>
                            <p class="small text-muted mb-0">0823-1030-1199 a/n TAMARA REZTI SYAFRIANA</p>
                        </div>
                    </div>

                    <input type="hidden" name="payment_method" id="payment_method" value="Transfer Bank BCA" required>
                    <div class="invalid-feedback">Silakan pilih metode pembayaran</div>
                </div>

                <!-- Bukti Pembayaran -->
                <div class="mb-4">
                    <label class="form-label">Upload Bukti Pembayaran <span class="text-danger">*</span></label>
                    <div class="upload-area" id="uploadArea">
                        <input type="file" name="payment_proof" id="payment_proof" accept="image/*" hidden required>
                        <div id="uploadContent">
                            <div class="upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <h5 id="uploadText">Seret dan lepas file disini</h5>
                            <p class="text-muted mb-3">atau</p>
                            <button type="button" class="btn btn-primary" id="triggerUpload">Pilih File</button>
                            <p class="small text-muted mt-2">Format: JPG, PNG (Maks. 2MB)</p>
                        </div>
                        <div id="uploadPreview" class="upload-preview" style="display: none;">
                            <img id="previewImage" src="#" alt="Preview Bukti Pembayaran">
                            <div class="file-info">
                                <p id="fileName" class="mb-1"></p>
                                <p id="fileSize" class="file-size"></p>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger" id="reuploadBtn">
                                <i class="fas fa-redo me-1"></i> Unggah Ulang
                            </button>
                        </div>
                    </div>
                    <div class="invalid-feedback">Silakan upload bukti pembayaran</div>
                </div>

                <!-- Catatan -->
                <div class="mb-4">
                    <label for="notes" class="form-label">Catatan (Opsional)</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Masukkan catatan tambahan jika ada"></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-4">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane me-2"></i> Submit Booking
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Time slot selection
            const timeSlots = document.querySelectorAll('.time-slot');
            timeSlots.forEach(slot => {
                slot.addEventListener('click', function() {
                    timeSlots.forEach(s => s.classList.remove('selected'));
                    this.classList.add('selected');
                    document.getElementById('booking_time').value = this.getAttribute('data-time');
                });
            });

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

            // Calculate total price when participant count changes
            const participantCount = document.getElementById('participant_count');
            participantCount.addEventListener('input', function() {
                const count = parseInt(this.value) || 0;
                const pricePerPerson = 25000;
                const total = count * pricePerPerson;
                document.getElementById('total_price').textContent = 'Rp ' + total.toLocaleString('id-ID');
            });

            // Upload area interaction
            const uploadArea = document.getElementById('uploadArea');
            const paymentProofInput = document.getElementById('payment_proof');
            const uploadText = document.getElementById('uploadText');
            const triggerUpload = document.getElementById('triggerUpload');
            const uploadContent = document.getElementById('uploadContent');
            const uploadPreview = document.getElementById('uploadPreview');
            const previewImage = document.getElementById('previewImage');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const reuploadBtn = document.getElementById('reuploadBtn');

            triggerUpload.addEventListener('click', function(e) {
                e.stopPropagation();
                paymentProofInput.click();
            });

            paymentProofInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    handleFileUpload(this.files[0]);
                }
            });

            function handleFileUpload(file) {
                // Validate file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire({
                        title: 'File terlalu besar',
                        text: 'Ukuran file maksimal 2MB',
                        icon: 'error',
                        confirmButtonColor: '#8B4513'
                    });
                    return;
                }

                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validTypes.includes(file.type)) {
                    Swal.fire({
                        title: 'Format tidak valid',
                        text: 'Hanya menerima file JPG, JPEG, atau PNG',
                        icon: 'error',
                        confirmButtonColor: '#8B4513'
                    });
                    return;
                }

                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    uploadContent.style.display = 'none';
                    uploadPreview.style.display = 'block';
                    previewImage.src = e.target.result;
                    fileName.textContent = file.name;
                    fileSize.textContent = formatFileSize(file.size);
                }
                reader.readAsDataURL(file);
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            reuploadBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                paymentProofInput.value = '';
                uploadContent.style.display = 'block';
                uploadPreview.style.display = 'none';
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
                    handleFileUpload(e.dataTransfer.files[0]);
                    paymentProofInput.files = e.dataTransfer.files;
                }
            });

            // Form validation
            const bookingForm = document.getElementById('bookingForm');
            bookingForm.addEventListener('submit', function(e) {
                let isValid = true;

                // Validate booking date
                if (!document.getElementById('booking_date').value) {
                    isValid = false;
                    document.getElementById('booking_date').classList.add('is-invalid');
                } else {
                    document.getElementById('booking_date').classList.remove('is-invalid');
                }

                // Validate booking time
                if (!document.getElementById('booking_time').value) {
                    isValid = false;
                    document.querySelector('.time-slots-container').nextElementSibling.style.display = 'block';
                } else {
                    document.querySelector('.time-slots-container').nextElementSibling.style.display = 'none';
                }

                // Validate participant count
                if (!document.getElementById('participant_count').value || 
                    parseInt(document.getElementById('participant_count').value) < 1) {
                    isValid = false;
                    document.getElementById('participant_count').classList.add('is-invalid');
                } else {
                    document.getElementById('participant_count').classList.remove('is-invalid');
                }

                // Validate payment proof
                if (!document.getElementById('payment_proof').files.length) {
                    isValid = false;
                    document.querySelector('#uploadArea').nextElementSibling.style.display = 'block';
                } else {
                    document.querySelector('#uploadArea').nextElementSibling.style.display = 'none';
                }

                if (!isValid) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Form tidak lengkap',
                        text: 'Silakan lengkapi semua field yang wajib diisi',
                        icon: 'warning',
                        confirmButtonColor: '#8B4513'
                    });
                }
            });

            function resetUploadArea() {
                uploadContent.style.display = 'block';
                uploadPreview.style.display = 'none';
                paymentProofInput.value = '';
            }
        });
    </script>
</body>

</html>