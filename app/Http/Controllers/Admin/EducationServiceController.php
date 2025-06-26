<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationService;
use Illuminate\Http\Request;

class EducationServiceController extends Controller
{
    public function index()
    {
        $bookings = EducationService::with('pembeli')
            ->latest()
            ->paginate(10);

        return view('admin.manajemen-pelayanan.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = EducationService::with('pembeli')
            ->findOrFail($id);

        return view('admin.manajemen-pelayanan.show', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = EducationService::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        $booking->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status booking berhasil diperbarui');
    }
}