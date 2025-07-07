<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'latest');
        
        $orders = Order::with(['pembeli', 'items.product'])
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
            ->paginate(5);

        return view('admin.manajemen-pesanan.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['pembeli', 'shippingAddress', 'items.product'])
            ->findOrFail($id);

        return view('admin.manajemen-pesanan.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,shipped,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}