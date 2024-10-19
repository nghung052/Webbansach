<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = "store";

    protected $fillable = ['all_product_in_store','stored_product','sold_product', 'id_product'];

    public function productinbill()
    {
        return $this->belongsTo(BillDetail::class,'id_product', 'id_product');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'id_product', 'id');
    }
}
