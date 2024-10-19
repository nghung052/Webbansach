<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

  

    protected $table = "product";
    const statusOn = 1;
    const statusOff = 0;

    protected $guarded = ['name'];
    
    protected $casts = [
        'imagedetail' => 'array'
    ];   

    protected $fillable = ['id_type', 'id_user', 'name', 'unit_price', 'promotion_price	', 'description', 'image', 'imagedetail', 'total_ra', 'total_number' ,'publisher', 'new', 'link'];

    public function productType()
    {
        return $this->belongsTo(ProductType::class,'id_type', 'id');
    }

    public function billIns()
    {
        return $this->belongsToMany(BillIn::class, 'bill_in_detail', 'id_product', 'id_bill_in');
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class, 'bill_detail', 'id_product', 'id_bill')->withPivot('quantity','unit_price')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user', 'id');
    }
    
    public function userComments()
    {
        return $this->belongsToMany(User::class, 'comment', 'id_product', 'id_user')->withPivot('body')->withTimestamps();
    }

    public function ratings()
    {
        return $this->belongsToMany(User::class, 'rating','id_product', 'id_user')->withPivot('body','ra_number')->withTimestamps();
    }

    public function productCompany()
    {
        return $this->belongsTo(Company::class,'id_company', 'id');
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'id_product', 'id');
    }

}
