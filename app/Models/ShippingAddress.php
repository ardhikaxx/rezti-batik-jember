<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $guard = 'pembeli';

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
        $parts = [
            $this->address,
            $this->district,
            $this->city,
            $this->province,
            $this->postal_code
        ];

        return implode(', ', array_filter($parts));
    }

    protected static function booted()
    {
        static::creating(function ($address) {
            // Gunakan query langsung untuk menghindari circular dependency
            if (!ShippingAddress::where('pembeli_id', $address->pembeli_id)->exists()) {
                $address->is_default = true;
            }
        });

        static::updated(function ($address) {
            if ($address->is_default) {
                // Gunakan query langsung untuk menghindari circular dependency
                ShippingAddress::where('pembeli_id', $address->pembeli_id)
                    ->where('id', '!=', $address->id)
                    ->update(['is_default' => false]);
            }
        });

        static::deleted(function ($address) {
            if ($address->is_default) {
                // Jika alamat default dihapus, set alamat lain sebagai default
                $newDefault = ShippingAddress::where('pembeli_id', $address->pembeli_id)
                    ->first();
                
                if ($newDefault) {
                    $newDefault->update(['is_default' => true]);
                }
            }
        });
    }
}