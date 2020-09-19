<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'uuid_purchase',
        'qty',
    ];
    public function detailtransaction()
    {
        return $this->belongsTo(Purchase::class,'uuid_purchase','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
