<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillIn extends Model
{
    use HasFactory;
    protected $table = "bill_in";

    public function billIns()
    {
        return $this->belongsToMany(Product::class, 'bill_in_detail', 'id_bill_in', 'id_product');
    }

    public function bills()
    {
        return $this->hasMany(Supplier::class,'id_supplier', 'id');
    }
}
