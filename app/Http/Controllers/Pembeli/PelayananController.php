<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\EducationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelayananController extends Controller
{
    public function index()
    {
        $bookings = EducationService::where('pembeli_id', auth('pembeli')->id())
            ->latest()
            ->paginate(10);

        return view('pembeli.pelayanan.index', compact('bookings'));
    }

    public function create()
    {
        return view('pembeli.pelayanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required',
            'participant_count' => 'required|integer|min:1|max:20',
            'payment_method' => 'required|in:transfer_bank,ewallet',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'notes' => 'nullable|string|max:500'
        ]);

        $pricePerPerson = 25000; // Harga per orang
        $totalPrice = $pricePerPerson * $request->participant_count;

        // Upload bukti pembayaran
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        EducationService::create([
            'pembeli_id' => auth('pembeli')->id(),
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'participant_count' => $request->participant_count,
            'price_per_person' => $pricePerPerson,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
            'payment_proof' => $paymentProofPath,
            'status' => 'pending',
            'notes' => $request->notes
        ]);

        return redirect()->route('pembeli.pelayanan.index')
            ->with('success', 'Booking edukasi batik berhasil dibuat. Menunggu konfirmasi.');
    }

    public function show($id)
    {
        $booking = EducationService::where('pembeli_id', auth('pembeli')->id())
            ->findOrFail($id);

        return view('pembeli.pelayanan.show', compact('booking'));
    }

    public function cancel($id)
    {
        $booking = EducationService::where('pembeli_id', auth('pembeli')->id())
            ->where('status', 'pending')
            ->findOrFail($id);

        $booking->update(['status' => 'cancelled']);

        return back()->with('success', 'Booking edukasi batik berhasil dibatalkan');
    }
}