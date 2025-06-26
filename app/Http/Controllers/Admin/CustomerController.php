<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Pembeli::withCount(['orders', 'educationServices'])
            ->withSum('orders', 'total')
            ->latest()
            ->paginate(10);

        return view('admin.manajemen-pembeli.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Pembeli::with(['orders', 'educationServices'])
            ->withCount(['orders', 'educationServices'])
            ->withSum('orders', 'total')
            ->findOrFail($id);

        $orders = $customer->orders()->latest()->paginate(5);
        $bookings = $customer->educationServices()->latest()->paginate(5);

        return view('admin.manajemen-pembeli.show', compact('customer', 'orders', 'bookings'));
    }
}