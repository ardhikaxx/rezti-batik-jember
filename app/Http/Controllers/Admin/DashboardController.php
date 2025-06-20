<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Auth::guard('admin')->user();

        // Dummy data for dashboard
        $data = [
            'currentMonthSales' => 12450000,
            'currentMonthOrders' => 42,
            'productsSold' => 78,
            'pendingOrders' => 5,
            'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            'salesData' => [8500000, 9200000, 10500000, 12450000, 9800000, 11200000],
            'bestSellers' => [
                [
                    'name' => 'Batik Mega Mendung',
                    'image' => 'products/batik1.jpg',
                    'price' => 250000,
                    'sold' => 25,
                    'rating' => 4.5
                ],
                [
                    'name' => 'Batik Parang Jember',
                    'image' => 'products/batik2.jpg',
                    'price' => 320000,
                    'sold' => 18,
                    'rating' => 4.2
                ],
                [
                    'name' => 'Batik Kawung',
                    'image' => 'products/batik3.jpg',
                    'price' => 280000,
                    'sold' => 15,
                    'rating' => 4.7
                ],
                [
                    'name' => 'Batik Sogan',
                    'image' => 'products/batik4.jpg',
                    'price' => 200000,
                    'sold' => 12,
                    'rating' => 4.0
                ],
                [
                    'name' => 'Batik Tulis Jember',
                    'image' => 'products/batik5.jpg',
                    'price' => 450000,
                    'sold' => 8,
                    'rating' => 4.8
                ]
            ],
            'recentOrders' => [
                [
                    'number' => 'ORD-2023-0012',
                    'customer' => 'Sarah Wijaya',
                    'status' => 'completed',
                    'total' => 750000
                ],
                [
                    'number' => 'ORD-2023-0011',
                    'customer' => 'Budi Santoso',
                    'status' => 'shipped',
                    'total' => 1120000
                ],
                [
                    'number' => 'ORD-2023-0010',
                    'customer' => 'Dewi Kartika',
                    'status' => 'processing',
                    'total' => 640000
                ],
                [
                    'number' => 'ORD-2023-0009',
                    'customer' => 'Andi Setiawan',
                    'status' => 'cancelled',
                    'total' => 320000
                ],
                [
                    'number' => 'ORD-2023-0008',
                    'customer' => 'Rina Permata',
                    'status' => 'pending',
                    'total' => 890000
                ]
            ],
            'recentActivities' => [
                [
                    'title' => 'Pesanan Selesai',
                    'description' => 'Pesanan #ORD-2023-0012 dari Sarah Wijaya telah selesai',
                    'time' => '5 menit lalu',
                    'color' => 'success'
                ],
                [
                    'title' => 'Produk Baru',
                    'description' => 'Batik Parang Jember ditambahkan ke katalog',
                    'time' => '1 jam lalu',
                    'color' => 'primary'
                ],
                [
                    'title' => 'Pembayaran Diterima',
                    'description' => 'Pembayaran untuk pesanan #ORD-2023-0011 telah diterima',
                    'time' => '3 jam lalu',
                    'color' => 'warning'
                ],
                [
                    'title' => 'Pesanan Baru',
                    'description' => 'Pesanan baru #ORD-2023-0013 diterima dari Budi Santoso',
                    'time' => '5 jam lalu',
                    'color' => 'info'
                ]
            ]
        ];

        return view('admin.dashboard.index', $data);
    }
}