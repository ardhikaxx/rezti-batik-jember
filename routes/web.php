<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
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

Route::get('/', function () {
    return view('pembeli.index');
});

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
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