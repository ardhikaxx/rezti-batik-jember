<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ViewPageController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->has('show_all') ? null : 4; 
        
        $products = Product::active()->latest();
        if ($limit) {
            $products = $products->take($limit);
        }
        $products = $products->get();
        
        $ratings = Rating::with(['product', 'pembeli'])
            ->latest()
            ->take(10)
            ->get();
            
        return view('index', compact('products', 'ratings'));
    }
}