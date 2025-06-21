<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        return view('pembeli.keranjang.index');
    }
}