<?php

use Illuminate\Support\Facades\Route;

// --- HALAMAN UTAMA (Landing Page) ---
Route::get('/', function () {
    return view('welcome'); // Atau nanti diganti jadi halaman login
});

// --- GROUP KHUSUS PETSHOP ---
// Semua URL di sini akan berawalan /petshop
// Contoh: paw-paw.test/petshop/dashboard
Route::prefix('petshop')->name('petshop.')->group(function () {

    // 1. Dashboard Petshop
    Route::get('/dashboard', function () {
        // Ini akan mencari file di resources/views/petshop/dashboard.blade.php
        return view('petshop.dashboard');
    })->name('dashboard'); // Nama panggilannya: route('petshop.dashboard')

    // 2. Layanan
    Route::get('/layanan', function () {
        // Pastikan file resources/views/petshop/layanan.blade.php sudah dibuat
        return view('petshop.layanan');
    })->name('layanan');

    // 3. Pesanan (Contoh tambah menu baru)
    Route::get('/pesanan', function () {
        return view('petshop.pesanan');
    })->name('pesanan');

});

// --- GROUP KHUSUS CUSTOMER ---
// Semua URL di sini akan berawalan /customer
Route::prefix('customer')->name('customer.')->group(function () {

    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

});