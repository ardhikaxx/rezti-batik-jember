<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'pembeli_id',
        'shipping_address_id',
        'subtotal',
        'total',
        'status',
        'payment_method',
        'payment_proof',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getPaymentProofUrlAttribute()
    {
        return $this->payment_proof ? asset($this->payment_proof) : null;
    }

    public function getStatusLabelAttribute()
    {
        $statuses = [
            'pending' => 'Menunggu Pembayaran',
            'shipped' => 'Proses Dikirim',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan'
        ];

        return $statuses[$this->status] ?? $this->status;
    }
}