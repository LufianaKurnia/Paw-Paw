<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Pesanan ini masuk ke Petshop mana?
    public function petshop()
    {
        return $this->belongsTo(Petshop::class);
    }
}