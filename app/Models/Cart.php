<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'qty',
    ];

     // relasi
    public function CartKasir()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
