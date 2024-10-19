<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_role','id_company',
        'full_name', 'username',
        'email', 'address', 'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class,'id_user', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id_user', 'id');
    }

    public function productComments()
    {
        return $this->belongsToMany(Product::class, 'comment','id_user', 'id_product')->withPivot('body')->withTimestamps();
    }

    public function ratings()
    {
        return $this->belongsToMany(Product::class, 'rating','id_user', 'id_product')->withPivot('body','ra_number')->withTimestamps();
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'id_role', 'id');
    }

    public function companys()
    {
        return $this->belongsTo(Company::class,'id_company', 'id');
    }


}
