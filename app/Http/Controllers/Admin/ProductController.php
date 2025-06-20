<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Batik Mega Mendung',
                'sku' => 'BTK-MM-001',
                'image' => 'products/batik1.jpg',
                'category' => 'Batik Cap',
                'price' => 250000,
                'original_price' => 300000,
                'discount' => 17,
                'stock' => 25,
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Batik Parang Jember',
                'sku' => 'BTK-PJ-002',
                'image' => 'products/batik2.jpg',
                'category' => 'Batik Tulis',
                'price' => 320000,
                'original_price' => 320000,
                'discount' => 0,
                'stock' => 18,
                'status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Batik Kawung',
                'sku' => 'BTK-KW-003',
                'image' => 'products/batik3.jpg',
                'category' => 'Batik Printing',
                'price' => 280000,
                'original_price' => 330000,
                'discount' => 15,
                'stock' => 15,
                'status' => 'active'
            ],
            [
                'id' => 4,
                'name' => 'Batik Sogan',
                'sku' => 'BTK-SG-004',
                'image' => 'products/batik4.jpg',
                'category' => 'Batik Cap',
                'price' => 200000,
                'original_price' => 200000,
                'discount' => 0,
                'stock' => 12,
                'status' => 'active'
            ],
            [
                'id' => 5,
                'name' => 'Batik Tulis Jember',
                'sku' => 'BTK-TJ-005',
                'image' => 'products/batik5.jpg',
                'category' => 'Batik Tulis',
                'price' => 450000,
                'original_price' => 450000,
                'discount' => 0,
                'stock' => 8,
                'status' => 'active'
            ],
            [
                'id' => 6,
                'name' => 'Batik Sekar Jagad',
                'sku' => 'BTK-SJ-006',
                'image' => 'products/batik6.jpg',
                'category' => 'Batik Printing',
                'price' => 275000,
                'original_price' => 350000,
                'discount' => 21,
                'stock' => 0,
                'status' => 'inactive'
            ],
            [
                'id' => 7,
                'name' => 'Batik Sidomukti',
                'sku' => 'BTK-SM-007',
                'image' => 'products/batik7.jpg',
                'category' => 'Batik Tulis',
                'price' => 380000,
                'original_price' => 380000,
                'discount' => 0,
                'stock' => 7,
                'status' => 'active'
            ],
            [
                'id' => 8,
                'name' => 'Batik Truntum',
                'sku' => 'BTK-TR-008',
                'image' => 'products/batik8.jpg',
                'category' => 'Batik Cap',
                'price' => 220000,
                'original_price' => 250000,
                'discount' => 12,
                'stock' => 14,
                'status' => 'active'
            ]
        ];

        return view('admin.data-barang.index', ['products' => $products]);
    }
}