<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['pembeli', 'items.product'])
            ->latest()
            ->paginate(10);

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
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
            'tracking_number' => 'nullable|string|max:255'
        ]);

        $order->update([
            'status' => $request->status,
            'tracking_number' => $request->tracking_number
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}