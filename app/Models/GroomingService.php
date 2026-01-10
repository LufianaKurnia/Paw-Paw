<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroomingService extends Model
{
    use HasFactory;

    protected $guarded = ['id']; // Biarkan semua kolom bisa diisi kecuali ID

    // Relasi ke Petshop (Opsional, tapi bagus buat masa depan)
    public function petshop()
    {
        return $this->belongsTo(Petshop::class);
    }
}