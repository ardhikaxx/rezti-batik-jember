<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function index($order_id)
    {
        $order = Order::where('id', $order_id)
            ->where('pembeli_id', Auth::guard('pembeli')->id())
            ->where('status', 'completed')
            ->firstOrFail();

        $items = $order->items()->with('product')->get();

        return view('pembeli.rating.index', compact('order', 'items'));
    }

    public function store(Request $request, $order_id)
    {
        $order = Order::where('id', $order_id)
            ->where('pembeli_id', Auth::guard('pembeli')->id())
            ->where('status', 'completed')
            ->firstOrFail();

        $request->validate([
            'ratings' => 'required|array',
            'ratings.*.rating' => 'required|integer|between:1,5',
            'ratings.*.comment' => 'nullable|string|max:500',
        ]);

        foreach ($request->ratings as $item_id => $ratingData) {
            $item = OrderItem::where('id', $item_id)
                ->where('order_id', $order->id)
                ->first();

            if ($item) {
                Rating::updateOrCreate(
                    [
                        'order_id' => $order->id,
                        'order_item_id' => $item->id,
                        'product_id' => $item->product_id,
                        'pembeli_id' => Auth::guard('pembeli')->id(),
                    ],
                    [
                        'rating' => $ratingData['rating'],
                        'comment' => $ratingData['comment'] ?? null,
                    ]
                );
            }
        }

        return redirect()->route('pembeli.pesanan.index')
            ->with('success', 'Terima kasih! Rating dan ulasan Anda telah berhasil disimpan.');
    }
}