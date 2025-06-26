<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Pembeli;
use App\Models\EducationService;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total penjualan bulan ini
        $currentMonthSales = Order::where('status', 'completed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total');

        // Total pesanan bulan ini
        $currentMonthOrders = Order::whereMonth('created_at', Carbon::now()->month)
            ->count();

        // Total produk terjual bulan ini
        $currentMonthProductsSold = OrderItem::whereHas('order', function($query) {
                $query->where('status', 'completed')
                    ->whereMonth('created_at', Carbon::now()->month);
            })
            ->sum('quantity');

        // Grafik penjualan 6 bulan terakhir
        $salesData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $sales = Order::where('status', 'completed')
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->sum('total');

            $salesData[] = [
                'month' => $month->format('M Y'),
                'sales' => $sales
            ];
        }

        // Data untuk chart
        $chartLabels = collect($salesData)->pluck('month')->toArray();
        $chartData = collect($salesData)->pluck('sales')->toArray();

        // Pesanan terbaru
        $recentOrders = Order::with('pembeli')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Booking edukasi terbaru
        $recentBookings = EducationService::with('pembeli')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Statistik lainnya
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();
        $outOfStockProducts = Product::where('stock', 0)->count();
        $totalCustomers = Pembeli::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $pendingBookings = EducationService::where('status', 'pending')->count();

        return view('admin.dashboard.index', compact(
            'currentMonthSales',
            'currentMonthOrders',
            'currentMonthProductsSold',
            'chartLabels',
            'chartData',
            'recentOrders',
            'recentBookings',
            'totalProducts',
            'activeProducts',
            'outOfStockProducts',
            'totalCustomers',
            'pendingOrders',
            'pendingBookings'
        ));
    }
}