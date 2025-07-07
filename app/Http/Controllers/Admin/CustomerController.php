<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $customers = Pembeli::when($search, function($query) use ($search) {
                return $query->where('nama', 'like', '%'.$search.'%');
            })
            ->withCount(['orders'])
            ->withSum('orders', 'total')
            ->latest()
            ->paginate(5);

        return view('admin.manajemen-pembeli.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Pembeli::with([
                'orders' => function($query) {
                    $query->with(['items.product', 'shippingAddress']);
                }, 
                'shippingAddresses'
            ])
            ->withCount(['orders'])
            ->withSum('orders', 'total')
            ->findOrFail($id);

        $orders = $customer->orders()
            ->with(['items.product', 'shippingAddress'])
            ->latest()
            ->paginate(5);

        return view('admin.manajemen-pembeli.show', [
            'customer' => $customer,
            'orders' => $orders,
            'defaultAddress' => $customer->defaultAddress
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        
        $customers = Pembeli::where('nama', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('no_hp', 'like', "%{$search}%")
            ->withCount(['orders'])
            ->withSum('orders', 'total')
            ->latest()
            ->paginate(10);

        return view('admin.manajemen-pembeli.index', compact('customers'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive'
        ]);

        $customer = Pembeli::findOrFail($id);
        $customer->update(['status' => $request->status]);

        return back()->with('success', 'Status pelanggan berhasil diperbarui');
    }

    public function export()
    {
        $customers = Pembeli::withCount(['orders'])
            ->withSum('orders', 'total')
            ->latest()
            ->get();

        return response()->streamDownload(function() use ($customers) {
            $handle = fopen('php://output', 'w');
            
            // Header
            fputcsv($handle, [
                'ID',
                'Nama',
                'Email', 
                'Telepon',
                'Total Pesanan',
                'Total Belanja',
                'Tanggal Bergabung'
            ]);

            // Data
            foreach ($customers as $customer) {
                fputcsv($handle, [
                    $customer->id,
                    $customer->nama,
                    $customer->email,
                    $customer->no_hp,
                    $customer->orders_count,
                    $customer->orders_sum_total ?? 0,
                    $customer->created_at->format('Y-m-d')
                ]);
            }

            fclose($handle);
        }, 'daftar-pelanggan-' . date('Y-m-d') . '.csv');
    }
}