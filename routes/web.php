<?php

use Illuminate\Support\Facades\Route;

// --- HALAMAN UTAMA (Landing Page) ---
Route::get('/', function () {
    return view('welcome');
});

// --- GROUP KHUSUS PETSHOP ---
Route::prefix('petshop')->name('petshop.')->group(function () {

    Route::get('/dashboard', function () {
        return view('petshop.dashboard');
    })->name('dashboard');

    Route::get('/layanan', function () {
        return view('petshop.layanan');
    })->name('layanan');

    Route::get('/pesanan', function () {
        return view('petshop.pesanan');
    })->name('pesanan');

});

// --- GROUP KHUSUS CUSTOMER (DISINI YANG TADI ERROR) ---
Route::prefix('customer')->name('customer.')->group(function () {

    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard'); // <--- Tadi kurang tutup kurung ini "});"

    // Kalau mau tambah pesanan customer, buka komentar di bawah ini:
    /*
    Route::get('/pesanan', function () {
        return view('customer.pesanan'); 
    })->name('pesanan');
    */

}); // <--- Dan kurang tutup group ini "});"

// --- ROUTE LOGIN ---
Route::get('/petshop/login', function () {
    return view('petshop.auth.login');
})->name('petshop.login');