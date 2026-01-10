<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kita pakai fillable biar jelas kolom apa saja yang diizinkan
    protected $fillable = [
        'petshop_id',
        'name',
        'category',
        'description',
        'price',
        'stock',
        'image', // Pastikan ini ada
    ];

    // Relasi ke Petshop
    public function petshop()
    {
        return $this->belongsTo(Petshop::class);
    }
}