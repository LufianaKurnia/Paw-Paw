<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetshopAuthController;
use App\Http\Controllers\PetshopProfileController;
use App\Http\Controllers\PetshopProductController;

Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// 1. GROUP UNTUK TAMU (YANG BELUM LOGIN)
// ==========================================
// Middleware 'guest' akan menendang orang yg sudah login ke Dashboard
Route::middleware(['guest'])->group(function () {

    Route::get('/petshop/login', [PetshopAuthController::class, 'index'])->name('petshop.login');
    Route::post('/petshop/login', [PetshopAuthController::class, 'authenticate'])->name('petshop.authenticate');

    // Register
    Route::post('/petshop/register', [PetshopAuthController::class, 'register'])->name('petshop.register');
});

// ==========================================
// 2. ROUTE LOGOUT (Bisa diakses jika login)
// ==========================================
Route::post('/petshop/logout', [PetshopAuthController::class, 'logout'])
    ->middleware('auth')
    ->name('petshop.logout');


// ==========================================
// 3. GROUP KHUSUS MEMBER (SUDAH LOGIN)
// ==========================================
Route::middleware(['auth'])->prefix('petshop')->name('petshop.')->group(function () {

    // --- DASHBOARD & HALAMAN UMUM ---
    Route::get('/dashboard', function () { return view('petshop.dashboard'); })->name('dashboard');
    Route::get('/pesanan', function () {
    // Nanti kalau sudah ada database, tinggal ganti baris ini jadi:
    // $orders = Order::where('user_id', auth()->id())->get();

    $orders = []; // <--- KITA KOSONGIN DULU (Biar natural)

    return view('petshop.pesanan', compact('orders'));
    })->name('pesanan');
    Route::get('/penghasilan', function () { return view('petshop.penghasilan'); })->name('penghasilan');
    Route::get('/promosi', function () { return view('petshop.promosi'); })->name('promosi');

    // --- PROFILE ---
    Route::get('/profile', [PetshopProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [PetshopProfileController::class, 'update'])->name('profile.update');

    // --- LAYANAN & PRODUK ---
    Route::get('/layanan', [PetshopProductController::class, 'index'])->name('layanan');

    // Produk (Barang)
    Route::post('/layanan/produk', [PetshopProductController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/produk/{id}', [PetshopProductController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/produk/{id}', [PetshopProductController::class, 'destroy'])->name('layanan.destroy');

    // Grooming (Jasa)
    Route::post('/layanan/grooming', [PetshopProductController::class, 'storeGrooming'])->name('layanan.grooming.store');
    Route::put('/layanan/grooming/{id}', [PetshopProductController::class, 'updateGrooming'])->name('layanan.grooming.update');
    Route::delete('/layanan/grooming/{id}', [PetshopProductController::class, 'destroyGrooming'])->name('layanan.grooming.destroy');

});