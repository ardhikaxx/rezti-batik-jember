<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ViewPageController extends Controller
{
    public function index()
    {
        $products = Product::active()->latest()->take(8)->get();
        return view('index', compact('products'));
    }
}