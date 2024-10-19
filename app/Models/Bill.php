<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = "bills";

    const processing = 0;
    const receiving = 1;
    const delivered = 2;
    const fail =3;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'bill_detail', 'id_bill', 'id_product')->withPivot('quantity','unit_price')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user', 'id');
    }
}
