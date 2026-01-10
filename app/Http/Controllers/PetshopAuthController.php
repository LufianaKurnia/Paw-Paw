<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Petshop; // <--- TAMBAHKAN INI

class PetshopAuthController extends Controller
{
    public function index()
    {
        return view('petshop.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('petshop.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('petshop.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        // 1. Simpan User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'mitra',
            'profile_photo' => null
        ]);

        // 2. OTOMATIS BUAT DATA TOKO KOSONG (KUNCI PERBAIKAN)
        Petshop::create([
            'user_id' => $user->id,
            'nama_toko' => 'Toko ' . $user->name, // Nama default
            'alamat' => 'Alamat belum diatur',
            'rating' => 0,
        ]);

        return redirect()->route('petshop.login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }
}