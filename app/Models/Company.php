<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = "companies";
    public function bills()
    {
        return $this->belongsTo(BillIn::class,'id_company', 'id');
    }

    public function companys()
    {
        return $this->hasMany(User::class,'id_user', 'id');
    }


}
