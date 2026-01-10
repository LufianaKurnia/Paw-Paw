<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Petshop;

class PetshopProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $petshop = $user->petshop;
        return view('petshop.profile', compact('petshop', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            // Tambahkan Validasi Nama & HP
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:15',

            // Validasi Toko
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:5120',
            'profile_photo' => 'nullable|image|max:5120'
        ]);

        // ==========================================
        // 1. UPDATE DATA DIRI OWNER (NAMA & HP) <--- INI YANG KURANG TADI
        // ==========================================
        $user->name = $request->name;
        $user->phone = $request->phone;

        // Cek Foto Profil
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $user->profile_photo = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $user->save(); // Simpan perubahan User (Nama, HP, Foto)

        // ==========================================
        // 2. UPDATE DATA TOKO
        // ==========================================
        $petshop = $user->petshop ?? new Petshop(['user_id' => $user->id]);
        $petshop->nama_toko = $request->nama_toko;
        $petshop->alamat = $request->alamat;
        $petshop->deskripsi = $request->deskripsi;

        if ($request->hasFile('logo')) {
            if ($petshop->logo) {
                Storage::disk('public')->delete($petshop->logo);
            }
            $petshop->logo = $request->file('logo')->store('petshop-logos', 'public');
        }

        // Upload Banner (LOGIKA BARU)
        if ($request->hasFile('banner')) {
            if ($petshop->banner) Storage::disk('public')->delete($petshop->banner);
            $petshop->banner = $request->file('banner')->store('petshop-banners', 'public');
        }

        $user->petshop()->save($petshop);

        return redirect()->route('petshop.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}