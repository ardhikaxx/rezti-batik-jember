<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;

class ViewPageController extends Controller
{
    public function index()
    {
        $products = Product::active()->latest()->take(8)->get();
        $ratings = Rating::with(['product', 'pembeli'])
            ->latest()
            ->take(10)
            ->get();
            
        return view('index', compact('products', 'ratings'));
    }
}