<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items.product', 'shippingAddress'])
            ->where('pembeli_id', auth('pembeli')->id())
            ->latest()
            ->paginate(10);

        return view('pembeli.pesanan.index', compact('orders'));
    }

    public function create()
    {
        $cartItems = Cart::with('product')
            ->where('pembeli_id', auth('pembeli')->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('pembeli.keranjang.index')
                ->with('error', 'Keranjang belanja Anda kosong');
        }

        $shippingAddresses = ShippingAddress::where('pembeli_id', auth('pembeli')->id())
            ->orderBy('is_default', 'desc')
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('pembeli.pesanan.create', compact('cartItems', 'shippingAddresses', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address_id' => 'required|exists:shipping_addresses,id',
            'payment_method' => 'required|in:transfer_bank,ewallet',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $cartItems = Cart::with('product')
            ->where('pembeli_id', auth('pembeli')->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang belanja Anda kosong');
        }

        // Hitung total
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shippingCost = 0; // Bisa dihitung berdasarkan alamat pengiriman
        $total = $subtotal + $shippingCost;

        // Upload bukti pembayaran
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        // Buat pesanan
        $order = Order::create([
            'order_number' => 'INV-' . Str::upper(Str::random(8)),
            'pembeli_id' => auth('pembeli')->id(),
            'shipping_address_id' => $request->shipping_address_id,
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'payment_proof' => $paymentProofPath,
            'payment_status' => 'pending'
        ]);

        // Tambahkan item pesanan
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);

            // Kurangi stok produk
            $product = $item->product;
            $product->stock -= $item->quantity;
            $product->save();
        }

        // Kosongkan keranjang
        Cart::where('pembeli_id', auth('pembeli')->id())->delete();

        return redirect()->route('pembeli.pesanan.index')
            ->with('success', 'Pesanan berhasil dibuat. Menunggu konfirmasi pembayaran.');
    }

    public function show($id)
    {
        $order = Order::with(['items.product', 'shippingAddress'])
            ->where('pembeli_id', auth('pembeli')->id())
            ->findOrFail($id);

        return view('pembeli.pesanan.show', compact('order'));
    }

    public function cancel($id)
    {
        $order = Order::where('pembeli_id', auth('pembeli')->id())
            ->where('status', 'pending')
            ->findOrFail($id);

        $order->update(['status' => 'cancelled']);

        // Kembalikan stok produk
        foreach ($order->items as $item) {
            $product = $item->product;
            $product->stock += $item->quantity;
            $product->save();
        }

        return back()->with('success', 'Pesanan berhasil dibatalkan');
    }

    public function complete($id)
    {
        $order = Order::where('pembeli_id', auth('pembeli')->id())
            ->where('status', 'shipped')
            ->findOrFail($id);

        $order->update(['status' => 'completed']);

        return back()->with('success', 'Pesanan telah diselesaikan. Terima kasih!');
    }
}