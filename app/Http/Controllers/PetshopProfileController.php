<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:5120',
            'profile_photo' => 'nullable|image|max:5120'
        ]);

        // 1. UPDATE USER
        $user->name = $request->name;
        $user->phone = $request->phone;

        // --- Cek Foto Profil (CLOUDINARY) ---
        if ($request->hasFile('profile_photo')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('profile_photo')->getRealPath())->getSecurePath();
            $user->profile_photo = $uploadedFileUrl;
        }

        $user->save();

        // 2. UPDATE TOKO
        $petshop = $user->petshop ?? new Petshop(['user_id' => $user->id]);
        $petshop->nama_toko = $request->nama_toko;
        $petshop->alamat = $request->alamat;
        $petshop->deskripsi = $request->deskripsi;

        // --- Upload Logo (CLOUDINARY) ---
        if ($request->hasFile('logo')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('logo')->getRealPath())->getSecurePath();
            $petshop->logo = $uploadedFileUrl;
        }

        // --- Upload Banner (CLOUDINARY) ---
        if ($request->hasFile('banner')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('banner')->getRealPath())->getSecurePath();
            $petshop->banner = $uploadedFileUrl;
        }

        $user->petshop()->save($petshop);

        return redirect()->route('petshop.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}