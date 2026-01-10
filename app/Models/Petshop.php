<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petshop extends Model
{
    use HasFactory;

    // Supaya semua kolom bisa diisi (kecuali ID)
    protected $guarded = ['id'];

    // Relasi Balik: Petshop milik User siapa?
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Petshop punya banyak Produk (Barang & Jasa)
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Petshop punya banyak Pesanan
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}