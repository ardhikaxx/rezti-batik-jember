<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('pembeli_id', auth('pembeli')->id())
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('pembeli.keranjang.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check stock availability
        if ($product->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok tidak mencukupi'
            ]);
        }

        // Cek apakah produk sudah ada di keranjang
        $cartItem = Cart::where('pembeli_id', auth('pembeli')->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $request->quantity;
            if ($product->stock < $newQuantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stok tidak mencukupi untuk jumlah yang diminta'
                ]);
            }
            
            $cartItem->update([
                'quantity' => $newQuantity
            ]);
        } else {
            Cart::create([
                'pembeli_id' => auth('pembeli')->id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        $cartCount = Cart::where('pembeli_id', auth('pembeli')->id())->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang',
            'cart_count' => $cartCount
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::with('product')
            ->where('pembeli_id', auth('pembeli')->id())
            ->findOrFail($id);

        // Check stock availability
        if ($cartItem->product->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok tidak mencukupi'
            ]);
        }

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Jumlah produk berhasil diperbarui'
        ]);
    }

    public function destroy($id)
    {
        $cartItem = Cart::where('pembeli_id', auth('pembeli')->id())
            ->findOrFail($id);

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus dari keranjang'
        ]);
    }

    public function count()
    {
        $count = Cart::where('pembeli_id', auth('pembeli')->id())->sum('quantity');
        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }

    public function destroyMultiple(Request $request)
    {
        $request->validate([
            'cart_ids' => 'required|array',
            'cart_ids.*' => 'exists:carts,id'
        ]);

        Cart::whereIn('id', $request->cart_ids)
            ->where('pembeli_id', auth('pembeli')->id())
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item terpilih berhasil dihapus'
        ]);
    }
}