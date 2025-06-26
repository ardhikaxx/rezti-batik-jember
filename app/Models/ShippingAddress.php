<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'pembeli_id',
        'recipient_name',
        'phone_number',
        'address',
        'province',
        'city',
        'district',
        'postal_code',
        'is_default'
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getFullAddressAttribute()
    {
        return "{$this->address}, {$this->district}, {$this->city}, {$this->province}, {$this->postal_code}";
    }
}