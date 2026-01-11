<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Pastikan ini ada
use App\Models\Product;
use App\Models\GroomingService;

class PetshopProductController extends Controller
{
    public function index()
    {
        $petshop = Auth::user()->petshop;

        if (!$petshop) {
            return redirect()->route('petshop.profile')
                ->with('error', 'Silakan lengkapi profil toko terlebih dahulu.');
        }

        $products = Product::where('petshop_id', $petshop->id)->latest()->get();
        $services = GroomingService::where('petshop_id', $petshop->id)->latest()->get();
        $groomingHistory = [];

        return view('petshop.layanan', compact('products', 'services', 'groomingHistory', 'petshop'));
    }

    // --- STORE (Simpan Lokal) ---
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
            // Simpan ke folder public/storage/products
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil ditambahkan!');
    }

    // --- UPDATE (Simpan Lokal) ---
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
            // Hapus gambar lama
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil diperbarui!');
    }

    // --- DELETE ---
    public function destroy($id)
    {
        $product = Product::where('id', $id)->where('petshop_id', Auth::user()->petshop->id)->firstOrFail();

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil dihapus!');
    }

    // --- GROOMING (Tetap Sama) ---
    public function storeGrooming(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'pet_type' => 'required',
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

    public function updateGrooming(Request $request, $id)
    {
        $service = GroomingService::where('id', $id)->where('petshop_id', Auth::user()->petshop->id)->firstOrFail();
        $service->update($request->only(['name', 'pet_type', 'price']));
        return redirect()->route('petshop.layanan')->with('success', 'Layanan Grooming berhasil diperbarui!');
    }

    public function destroyGrooming($id)
    {
        $service = GroomingService::where('id', $id)->where('petshop_id', Auth::user()->petshop->id)->firstOrFail();
        $service->delete();
        return redirect()->route('petshop.layanan')->with('success', 'Layanan Grooming berhasil dihapus!');
    }
}