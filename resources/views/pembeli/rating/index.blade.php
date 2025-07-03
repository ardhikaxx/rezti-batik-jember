@extends('pembeli.app')

@section('title', 'Beri Rating Produk')

@section('content')
    <style>
        .rating-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .rating-card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .rating-header {
            background-color: #8B4513;
            color: white;
            padding: 15px;
        }
        
        .rating-body {
            padding: 20px;
            background-color: white;
        }
        
        .product-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
        }
        
        .product-info {
            flex-grow: 1;
        }
        
        .rating-stars {
            display: flex;
            margin: 15px 0;
        }
        
        .rating-stars input[type="radio"] {
            display: none;
        }
        
        .rating-stars label {
            font-size: 24px;
            color: #ddd;
            cursor: pointer;
            margin-right: 5px;
        }
        
        .rating-stars input[type="radio"]:checked ~ label {
            color: #ffc107;
        }
        
        .rating-stars label:hover,
        .rating-stars label:hover ~ label {
            color: #ffc107;
        }
        
        .form-control {
            border-radius: 8px;
        }
        
        .btn-submit {
            background-color: #8B4513;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .btn-submit:hover {
            background-color: #5D2906;
            color: white;
        }
    </style>

    <div class="container py-4">
        <div class="rating-container">
            <div class="rating-card">
                <div class="rating-header">
                    <h4 class="mb-0"><i class="fas fa-star me-2"></i> Beri Rating Pesanan #{{ $order->order_number }}</h4>
                </div>
                <div class="rating-body">
                    <form action="{{ route('pembeli.rating.store', $order->id) }}" method="POST">
                        @csrf
                        
                        @foreach($items as $item)
                        <div class="product-item">
                            <img src="{{ asset($item->product->image) }}" class="product-image" alt="{{ $item->product->name }}">
                            <div class="product-info">
                                <h5>{{ $item->product->name }}</h5>
                                <p class="mb-1">Jumlah: {{ $item->quantity }}</p>
                                <p class="mb-0">Harga: Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h6>Beri Rating:</h6>
                            <div class="rating-stars">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="rating-{{ $item->id }}-{{ $i }}" name="ratings[{{ $item->id }}][rating]" value="{{ $i }}" {{ optional($item->rating)->rating == $i ? 'checked' : '' }}>
                                    <label for="rating-{{ $item->id }}-{{ $i }}">★</label>
                                @endfor
                            </div>
                            
                            <div class="form-group mt-3">
                                <label for="comment-{{ $item->id }}">Ulasan (opsional):</label>
                                <textarea class="form-control" id="comment-{{ $item->id }}" name="ratings[{{ $item->id }}][comment]" rows="3" placeholder="Bagaimana pengalaman Anda dengan produk ini?">{{ optional($item->rating)->comment }}</textarea>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="text-end">
                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Rating
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection