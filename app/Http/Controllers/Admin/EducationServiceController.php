<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationService;
use Illuminate\Http\Request;

class EducationServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'latest');
        $status = $request->input('status');
        
        $monthlyRevenue = EducationService::where('status', 'confirmed')
            ->whereMonth('created_at', now()->month)
            ->sum('total_price');
            
        $bookings = EducationService::with('pembeli')
            ->when($search, function($query) use ($search) {
                return $query->whereHas('pembeli', function($q) use ($search) {
                    $q->where('nama', 'like', '%'.$search.'%');
                });
            })
            ->when($sort, function($query) use ($sort) {
                return $sort === 'latest' 
                    ? $query->latest() 
                    : $query->oldest();
            })
            ->when($status, function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->paginate(5);

        return view('admin.manajemen-pelayanan.index', [
            'bookings' => $bookings,
            'monthlyRevenue' => $monthlyRevenue
        ]);
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
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $booking->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status booking berhasil diperbarui');
    }
}