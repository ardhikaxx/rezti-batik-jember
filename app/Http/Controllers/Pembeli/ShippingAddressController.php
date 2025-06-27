<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingAddressController extends Controller
{
    public function index()
    {
        $pembeli = Auth::guard('pembeli')->user();

        $addresses = ShippingAddress::where('pembeli_id', $pembeli->id)
            ->latest()
            ->get();
        return view('pembeli.shipping-address.index', compact('addresses'));
    }

    public function create()
    {
        return view('pembeli.shipping-address.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'province' => 'nullable|string',
            'city' => 'nullable|string',
            'district' => 'nullable|string',
            'postal_code' => 'nullable|string',
        ]);

        $pembeli = Auth::guard('pembeli')->user();

        $addressData = $request->only([
            'recipient_name',
            'phone_number',
            'address',
            'province',
            'city',
            'district',
            'postal_code'
        ]);

        $addressData['pembeli_id'] = $pembeli->id;

        // Gunakan count langsung dari query untuk menghindari masalah relasi
        if (ShippingAddress::where('pembeli_id', $pembeli->id)->count() === 0) {
            $addressData['is_default'] = true;
        }

        ShippingAddress::create($addressData);

        return redirect()->route('pembeli.shipping-address.index')
            ->with('success', 'Alamat pengiriman berhasil ditambahkan');
    }

    public function edit(ShippingAddress $shippingAddress)
    {
        $this->authorize('update', $shippingAddress);
        return view('pembeli.shipping-address.edit', compact('shippingAddress'));
    }

    public function update(Request $request, ShippingAddress $shippingAddress)
    {
        $this->authorize('update', $shippingAddress);

        $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'province' => 'nullable|string',
            'city' => 'nullable|string',
            'district' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'is_default' => 'sometimes|boolean',
        ]);

        $shippingAddress->update($request->all());

        if ($request->is_default) {
            ShippingAddress::where('pembeli_id', $shippingAddress->pembeli_id)
                ->where('id', '!=', $shippingAddress->id)
                ->update(['is_default' => false]);
        }

        return redirect()->route('pembeli.shipping-address.index')
            ->with('success', 'Alamat pengiriman berhasil diperbarui');
    }

    public function destroy(ShippingAddress $shippingAddress)
    {
        $this->authorize('delete', $shippingAddress);
        $pembeliId = $shippingAddress->pembeli_id;

        if ($shippingAddress->is_default) {
            $newDefault = ShippingAddress::where('pembeli_id', $pembeliId)
                ->where('id', '!=', $shippingAddress->id)
                ->first();

            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
        }

        $shippingAddress->delete();

        return redirect()->route('pembeli.shipping-address.index')
            ->with('success', 'Alamat pengiriman berhasil dihapus');
    }

    public function setDefault(ShippingAddress $shippingAddress)
    {
        $this->authorize('update', $shippingAddress);

        ShippingAddress::where('pembeli_id', $shippingAddress->pembeli_id)
            ->update(['is_default' => false]);

        $shippingAddress->update(['is_default' => true]);

        return back()->with('success', 'Alamat default berhasil diubah');
    }
}