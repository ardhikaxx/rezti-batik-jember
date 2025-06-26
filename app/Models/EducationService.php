<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationService extends Model
{
    use HasFactory;

    protected $fillable = [
        'pembeli_id',
        'booking_date',
        'booking_time',
        'participant_count',
        'price_per_person',
        'total_price',
        'payment_method',
        'payment_proof',
        'status',
        'notes'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'price_per_person' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    public function getPaymentProofUrlAttribute()
    {
        return $this->payment_proof ? asset('storage/'.$this->payment_proof) : null;
    }

    public function getStatusLabelAttribute()
    {
        $statuses = [
            'pending' => 'Menunggu Konfirmasi',
            'confirmed' => 'Terkonfirmasi',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan'
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    public function getBookingDateTimeAttribute()
    {
        return $this->booking_date->format('d M Y') . ' ' . $this->booking_time;
    }
}