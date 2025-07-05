<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\EducationServiceController;
use App\Http\Controllers\Admin\ManajemenAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route utama untuk halaman depan
Route::get('/', [\App\Http\Controllers\ViewPageController::class, 'index'])->name('index');

// Routes untuk pembeli
Route::prefix('pembeli')->name('pembeli.')->group(function () {
    // Auth routes (unauthenticated)
    Route::middleware('guest:pembeli')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Pembeli\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Pembeli\AuthController::class, 'login']);
        Route::get('/register', [\App\Http\Controllers\Pembeli\AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [\App\Http\Controllers\Pembeli\AuthController::class, 'register']);
    });

    // Logout route (accessible when authenticated)
    Route::post('/logout', [\App\Http\Controllers\Pembeli\AuthController::class, 'logout'])->name('logout');

    // Protected routes (authenticated only)
    Route::middleware('auth:pembeli')->group(function () {
        Route::get('/', [\App\Http\Controllers\ViewPageController::class, 'index'])->name('index');

        // Profile Routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [\App\Http\Controllers\Pembeli\ProfileController::class, 'index'])->name('profile.index');
            Route::get('/edit', [\App\Http\Controllers\Pembeli\ProfileController::class, 'edit'])->name('profile.edit');
            Route::put('/', [\App\Http\Controllers\Pembeli\ProfileController::class, 'update'])->name('profile.update');
            Route::put('/password', [\App\Http\Controllers\Pembeli\ProfileController::class, 'updatePassword'])->name('profile.update-password');
        });

        // Keranjang
        Route::prefix('keranjang')->name('keranjang.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'index'])->name('index');
            Route::post('/', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'store'])->name('store');
            Route::put('/{id}', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'update'])->name('update');
            Route::delete('/{id}', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'destroy'])->name('destroy');
            Route::get('/count', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'count'])->name('count');
            Route::post('/destroy-multiple', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'destroyMultiple'])->name('destroy-multiple');
            Route::match(['get', 'post'], '/checkout', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'checkout'])->name('checkout');
        });

        // Pesanan
        Route::prefix('pesanan')->name('pesanan.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Pembeli\PesananController::class, 'index'])->name('index');
            Route::get('/{order}', [\App\Http\Controllers\Pembeli\PesananController::class, 'show'])->name('show');
            Route::post('/{id}/update-status', [OrderController::class, 'updateStatus'])->name('update-status');
            Route::post('/', [\App\Http\Controllers\Pembeli\PesananController::class, 'store'])->name('store');
            
            // Rating
            Route::get('/{order_id}/rating', [\App\Http\Controllers\Pembeli\RatingController::class, 'index'])->name('rating.index');
            Route::post('/{order_id}/rating', [\App\Http\Controllers\Pembeli\RatingController::class, 'store'])->name('rating.store');
        });

        // Pelayanan Edukasi
        Route::prefix('pelayanan-edukasi')->name('layanan-edukasi.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Pembeli\PelayananController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Pembeli\PelayananController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Pembeli\PelayananController::class, 'store'])->name('store');
            Route::get('/{id}', [\App\Http\Controllers\Pembeli\PelayananController::class, 'show'])->name('show');
            Route::post('/{id}/cancel', [\App\Http\Controllers\Pembeli\PelayananController::class, 'cancel'])->name('cancel');
        });

        // Alamat Pengiriman
        Route::prefix('shipping-address')->name('shipping-address.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Pembeli\ShippingAddressController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Pembeli\ShippingAddressController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Pembeli\ShippingAddressController::class, 'store'])->name('store');
            Route::get('/{shippingAddress}/edit', [\App\Http\Controllers\Pembeli\ShippingAddressController::class, 'edit'])->name('edit');
            Route::put('/{shippingAddress}', [\App\Http\Controllers\Pembeli\ShippingAddressController::class, 'update'])->name('update');
            Route::delete('/{shippingAddress}', [\App\Http\Controllers\Pembeli\ShippingAddressController::class, 'destroy'])->name('destroy');
            Route::put('/{shippingAddress}/set-default', [\App\Http\Controllers\Pembeli\ShippingAddressController::class, 'setDefault'])->name('set-default');
        });
    });
});

// Routes untuk admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes (unauthenticated)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Logout route (accessible when authenticated)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected routes (authenticated only)
    Route::middleware('auth:admin')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Produk Batik
        Route::prefix('data-barang')->name('data-barang.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/', [ProductController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProductController::class, 'update'])->name('update');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
        });

        // Data Pembeli
        Route::prefix('data-pembeli')->name('data-pembeli.')->group(function () {
            Route::get('/', [CustomerController::class, 'index'])->name('index');
            Route::get('/{id}', [CustomerController::class, 'show'])->name('show');
        });

        // Manajemen Pesanan
        Route::prefix('manajemen-pesanan')->name('manajemen-pesanan.')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/{id}', [OrderController::class, 'show'])->name('show');
            Route::post('/{id}/update-status', [OrderController::class, 'updateStatus'])->name('update-status');
        });

        // Manajemen Pelayanan
        Route::prefix('manajemen-pelayanan')->name('manajemen-pelayanan.')->group(function () {
            Route::get('/', [EducationServiceController::class, 'index'])->name('index');
            Route::get('/{id}', [EducationServiceController::class, 'show'])->name('show');
            Route::post('/{id}/update-status', [EducationServiceController::class, 'updateStatus'])->name('update-status');
        });

        // Manajemen Admin
        Route::prefix('manajemen-admin')->name('manajemen-admin.')->group(function () {
            Route::get('/', [ManajemenAdminController::class, 'index'])->name('index');
            Route::get('/create', [ManajemenAdminController::class, 'create'])->name('create');
            Route::post('/', [ManajemenAdminController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ManajemenAdminController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ManajemenAdminController::class, 'update'])->name('update');
            Route::delete('/{id}', [ManajemenAdminController::class, 'destroy'])->name('destroy');
        });
    });
});