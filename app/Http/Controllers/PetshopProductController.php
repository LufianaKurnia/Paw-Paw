<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\GroomingService; // Pastikan baris ini ada

class PetshopProductController extends Controller
{
    public function index()
    {
        $petshop = Auth::user()->petshop;

        if (!$petshop) {
            return redirect()->route('petshop.profile')
                ->with('error', 'Silakan lengkapi profil toko terlebih dahulu.');
        }

        // Ambil Data Produk & Service
        $products = Product::where('petshop_id', $petshop->id)->latest()->get();

        // Ambil Data Grooming
        $services = GroomingService::where('petshop_id', $petshop->id)->latest()->get();

        // Riwayat Grooming (Dummy dulu)
        $groomingHistory = [];

        return view('petshop.layanan', compact('products', 'services', 'groomingHistory', 'petshop'));
    }

    // --- SIMPAN PRODUK BARU (BARANG) ---
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
        ]);

        $data = $request->all();
        $data['petshop_id'] = Auth::user()->petshop->id;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil ditambahkan!');
    }

    // --- UPDATE PRODUK (EDIT) ---
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->where('petshop_id', Auth::user()->petshop->id)->firstOrFail();

        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil diperbarui!');
    }

    // --- HAPUS PRODUK ---
    public function destroy($id)
    {
        $product = Product::where('id', $id)->where('petshop_id', Auth::user()->petshop->id)->firstOrFail();

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil dihapus!');
    }

    // --- SIMPAN GROOMING (JASA) ---
    public function storeGrooming(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'pet_type' => 'required', // Enum Kucing/Anjing/dll
            'price' => 'required|numeric',
        ]);

        GroomingService::create([
            'petshop_id' => Auth::user()->petshop->id,
            'name' => $request->name,
            'pet_type' => $request->pet_type,
            'price' => $request->price,
        ]);

        return redirect()->route('petshop.layanan')->with('success', 'Layanan Grooming berhasil ditambahkan!');
    }
    // --- UPDATE GROOMING (EDIT JASA) ---
    public function updateGrooming(Request $request, $id)
    {
        $service = GroomingService::where('id', $id)
            ->where('petshop_id', Auth::user()->petshop->id)
            ->firstOrFail();

        $request->validate([
            'name' => 'required|max:255',
            'pet_type' => 'required',
            'price' => 'required|numeric',
        ]);

        $service->update([
            'name' => $request->name,
            'pet_type' => $request->pet_type,
            'price' => $request->price,
        ]);

        return redirect()->route('petshop.layanan')
            ->with('success', 'Layanan Grooming berhasil diperbarui!');
    }

    // --- HAPUS GROOMING ---
    public function destroyGrooming($id)
    {
        $service = GroomingService::where('id', $id)
            ->where('petshop_id', Auth::user()->petshop->id)
            ->firstOrFail();

        $service->delete();

        return redirect()->route('petshop.layanan')
            ->with('success', 'Layanan Grooming berhasil dihapus!');
    }
}