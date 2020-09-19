<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'name', 'price','gundang_id'
    ];

     // relasi
    public function productskasir()
    {
        return $this->hasMany(Cart::class,'product_id');
    }
    public function productsdetail()
    {
        return $this->hasMany(PurchaseDetail::class,'product_id');
    }
}
