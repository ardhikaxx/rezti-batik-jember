<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [
            [
                'id' => 'CUST-001',
                'name' => 'Sarah Wijaya',
                'email' => 'sarah.wijaya@example.com',
                'phone' => '081234567890',
                'avatar' => 'avatars/avatar1.jpg',
                'total_orders' => 12,
                'total_spent' => 3850000,
                'joined_at' => '15 Jan 2022'
            ],
            [
                'id' => 'CUST-002',
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'phone' => '082345678901',
                'avatar' => 'avatars/avatar2.jpg',
                'total_orders' => 8,
                'total_spent' => 2450000,
                'joined_at' => '22 Feb 2022'
            ],
            [
                'id' => 'CUST-003',
                'name' => 'Dewi Kartika',
                'email' => 'dewi.kartika@example.com',
                'phone' => '083456789012',
                'avatar' => 'avatars/avatar3.jpg',
                'total_orders' => 5,
                'total_spent' => 1750000,
                'joined_at' => '10 Mar 2022'
            ],
            [
                'id' => 'CUST-004',
                'name' => 'Andi Setiawan',
                'email' => 'andi.setiawan@example.com',
                'phone' => '084567890123',
                'avatar' => 'avatars/avatar4.jpg',
                'total_orders' => 3,
                'total_spent' => 950000,
                'joined_at' => '05 Apr 2022'
            ],
            [
                'id' => 'CUST-005',
                'name' => 'Rina Permata',
                'email' => 'rina.permata@example.com',
                'phone' => '085678901234',
                'avatar' => 'avatars/avatar5.jpg',
                'total_orders' => 7,
                'total_spent' => 2100000,
                'joined_at' => '18 Mei 2022'
            ],
            [
                'id' => 'CUST-006',
                'name' => 'Fajar Nugroho',
                'email' => 'fajar.nugroho@example.com',
                'phone' => '086789012345',
                'avatar' => 'avatars/avatar6.jpg',
                'total_orders' => 4,
                'total_spent' => 1250000,
                'joined_at' => '30 Jun 2022'
            ],
            [
                'id' => 'CUST-007',
                'name' => 'Lina Susanti',
                'email' => 'lina.susanti@example.com',
                'phone' => '087890123456',
                'avatar' => 'avatars/avatar7.jpg',
                'total_orders' => 9,
                'total_spent' => 2950000,
                'joined_at' => '12 Jul 2022'
            ],
            [
                'id' => 'CUST-008',
                'name' => 'Hendra Kurniawan',
                'email' => 'hendra.kurniawan@example.com',
                'phone' => '088901234567',
                'avatar' => 'avatars/avatar8.jpg',
                'total_orders' => 2,
                'total_spent' => 650000,
                'joined_at' => '25 Agu 2022'
            ]
        ];

        return view('admin.data-pembeli.index', ['customers' => $customers]);
    }

    public function show($id)
    {
        $customers = [
            'CUST-001' => [
                'id' => 'CUST-001',
                'name' => 'Sarah Wijaya',
                'email' => 'sarah.wijaya@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 123, Jember',
                'avatar' => 'avatars/avatar1.jpg',
                'total_orders' => 12,
                'total_spent' => 3850000,
                'joined_at' => '15 Jan 2022',
                'orders' => [
                    [
                        'id' => 'ORD-001',
                        'number' => 'ORD-2023-0012',
                        'date' => '2023-05-15',
                        'amount' => 750000,
                        'status' => 'completed',
                        'items' => [
                            [
                                'product' => 'Batik Mega Mendung',
                                'price' => 250000,
                                'quantity' => 2,
                                'total' => 500000
                            ],
                            [
                                'product' => 'Batik Sogan',
                                'price' => 200000,
                                'quantity' => 1,
                                'total' => 200000
                            ],
                            [
                                'product' => 'Batik Kawung',
                                'price' => 280000,
                                'quantity' => 1,
                                'total' => 280000
                            ]
                        ]
                    ],
                    [
                        'id' => 'ORD-002',
                        'number' => 'ORD-2023-0005',
                        'date' => '2023-04-10',
                        'amount' => 450000,
                        'status' => 'completed',
                        'items' => [
                            [
                                'product' => 'Batik Parang Jember',
                                'price' => 320000,
                                'quantity' => 1,
                                'total' => 320000
                            ],
                            [
                                'product' => 'Batik Truntum',
                                'price' => 220000,
                                'quantity' => 1,
                                'total' => 220000
                            ]
                        ]
                    ]
                ]
            ],
        ];

        $customer = $customers[$id] ?? null;

        if (!$customer) {
            abort(404);
        }

        return view('admin.data-pembeli.show', ['customer' => $customer]);
    }
}