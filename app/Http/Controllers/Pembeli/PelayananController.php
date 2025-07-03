<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\EducationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PelayananController extends Controller
{
    // Constants for configuration
    const PRICE_PER_PERSON = 25000;
    const OPERATIONAL_HOURS = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00'];
    const MAX_PARTICIPANTS = 20;
    const PAYMENT_METHODS = [
        'Transfer Bank BCA',
        'Transfer Bank Mandiri',
        'Transfer Bank BRI',
        'DANA',
        'GoPay'
    ];

    public function index()
    {
        $bookings = EducationService::where('pembeli_id', auth('pembeli')->id())
            ->with('pembeli')
            ->latest()
            ->paginate(10);

        return view('pembeli.layanan-edukasi.index', compact('bookings'));
    }

    public function create()
    {
        return view('pembeli.layanan-edukasi.create', [
            'timeSlots' => self::OPERATIONAL_HOURS,
            'maxParticipants' => self::MAX_PARTICIPANTS,
            'pricePerPerson' => self::PRICE_PER_PERSON,
            'paymentMethods' => self::PAYMENT_METHODS
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required|in:' . implode(',', self::OPERATIONAL_HOURS),
            'participant_count' => 'required|integer|min:1|max:' . self::MAX_PARTICIPANTS,
            'payment_method' => 'required|in:' . implode(',', self::PAYMENT_METHODS),
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'notes' => 'nullable|string|max:500'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $paymentProofPath = $this->uploadPaymentProof($request->file('payment_proof'));
            
            if (!$paymentProofPath) {
                throw new \Exception('Gagal mengupload bukti pembayaran');
            }

            EducationService::create([
                'pembeli_id' => auth('pembeli')->id(),
                'booking_date' => $request->booking_date,
                'booking_time' => $request->booking_time,
                'participant_count' => $request->participant_count,
                'price_per_person' => self::PRICE_PER_PERSON,
                'total_price' => self::PRICE_PER_PERSON * $request->participant_count,
                'payment_method' => $request->payment_method,
                'payment_proof' => $paymentProofPath,
                'status' => 'pending',
                'notes' => $request->notes
            ]);

            return redirect()->route('pembeli.layanan-edukasi.index')
                ->with('success', 'Booking edukasi batik berhasil dibuat. Menunggu konfirmasi admin.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    private function uploadPaymentProof($file)
    {
        try {
            $uploadPath = public_path('proof-education');
            
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $fileName = 'proof_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);

            return 'proof-education/' . $fileName;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function show($id)
    {
        $booking = EducationService::where('pembeli_id', auth('pembeli')->id())
            ->with('pembeli')
            ->findOrFail($id);

        return view('pembeli.layanan-edukasi.show', compact('booking'));
    }

    public function cancel($id)
    {
        $booking = EducationService::where('pembeli_id', auth('pembeli')->id())
            ->where('status', 'pending')
            ->findOrFail($id);

        try {
            $booking->update(['status' => 'cancelled']);
            
            // Optionally delete the payment proof file
            // File::delete(public_path($booking->payment_proof));
            
            return back()->with('success', 'Booking edukasi batik berhasil dibatalkan');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membatalkan booking');
        }
    }
}