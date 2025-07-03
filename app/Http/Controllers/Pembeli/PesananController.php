<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PesananController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items.rating','items.product', 'shippingAddress'])
            ->where('pembeli_id', auth('pembeli')->id())
            ->latest()
            ->get();

        return view('pembeli.pesanan.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Ensure the order belongs to the authenticated pembeli
        if ($order->pembeli_id !== auth('pembeli')->id()) {
            abort(403);
        }

        // Load relationships
        $order->load(['items.product', 'shippingAddress']);

        return view('pembeli.pesanan.show', compact('order'));
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

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'shipping_address_id' => 'required|exists:shipping_addresses,id,pembeli_id,' . auth('pembeli')->id(),
            'payment_method' => 'required|string|max:255',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'cart_ids' => 'required|array',
            'cart_ids.*' => 'exists:carts,id,pembeli_id,' . auth('pembeli')->id()
        ]);

        // Ambil item keranjang yang dipilih
        $cartItems = Cart::with('product')
            ->whereIn('id', $validated['cart_ids'])
            ->where('pembeli_id', auth('pembeli')->id())
            ->get();

        // Validasi stok produk
        foreach ($cartItems as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()
                    ->with('error', 'Stok produk ' . $item->product->name . ' tidak mencukupi')
                    ->withInput();
            }
        }

        // Hitung total
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $total = $subtotal;

        // Upload bukti pembayaran
        $paymentProof = $request->file('payment_proof');
        $paymentProofPath = $this->uploadPaymentProof($paymentProof);

        if (!$paymentProofPath) {
            return redirect()->back()
                ->with('error', 'Gagal mengupload bukti pembayaran')
                ->withInput();
        }

        // Buat pesanan
        $order = Order::create([
            'order_number' => 'ORD-' . Str::upper(Str::random(10)),
            'pembeli_id' => auth('pembeli')->id(),
            'shipping_address_id' => $validated['shipping_address_id'],
            'subtotal' => $subtotal,
            'total' => $total,
            'payment_method' => $validated['payment_method'],
            'payment_proof' => $paymentProofPath,
            'status' => 'pending'
        ]);

        // Buat item pesanan dan kurangi stok
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);

            // Kurangi stok produk
            $product = Product::find($item->product_id);
            $product->stock -= $item->quantity;
            $product->save();
        }

        // Hapus item keranjang
        Cart::whereIn('id', $validated['cart_ids'])
            ->where('pembeli_id', auth('pembeli')->id())
            ->delete();

        return redirect()->route('pembeli.pesanan.index')
            ->with('success', 'Pesanan berhasil dibuat. Menunggu konfirmasi pembayaran.');
    }

    private function uploadPaymentProof($file)
    {
        try {
            // Buat direktori jika belum ada
            $uploadPath = public_path('proof');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            // Generate nama file unik
            $fileName = 'proof_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder public/proof
            $file->move($uploadPath, $fileName);

            // Return path relatif untuk disimpan di database
            return 'proof/' . $fileName;
        } catch (\Exception $e) {
            return false;
        }
    }
}