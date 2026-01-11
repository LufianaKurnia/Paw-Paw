<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    // --- SIMPAN PRODUK BARU (MODIFIKASI CLOUDINARY) ---
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
            // UBAH KE CLOUDINARY
            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $data['image'] = $uploadedFileUrl;
        }

        Product::create($data);

        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil ditambahkan!');
    }

    // --- UPDATE PRODUK (MODIFIKASI CLOUDINARY) ---
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
            // UBAH KE CLOUDINARY (Langsung timpa URL lama)
            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $data['image'] = $uploadedFileUrl;
        }

        $product->update($data);

        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil diperbarui!');
    }

    // --- HAPUS PRODUK ---
    public function destroy($id)
    {
        $product = Product::where('id', $id)->where('petshop_id', Auth::user()->petshop->id)->firstOrFail();

        // Kita tidak perlu hapus file di Cloudinary secara manual untuk tugas ini (biar aman dan tidak error)
        $product->delete();

        return redirect()->route('petshop.layanan')->with('success', 'Produk berhasil dihapus!');
    }

    // --- BAGIAN GROOMING (TIDAK PERLU DIUBAH KARENA TIDAK ADA GAMBAR) ---
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

        return redirect()->route('petshop.layanan')->with('success', 'Layanan Grooming berhasil diperbarui!');
    }

    public function destroyGrooming($id)
    {
        $service = GroomingService::where('id', $id)
            ->where('petshop_id', Auth::user()->petshop->id)
            ->firstOrFail();

        $service->delete();

        return redirect()->route('petshop.layanan')->with('success', 'Layanan Grooming berhasil dihapus!');
    }
}