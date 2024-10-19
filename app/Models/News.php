<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = "tnews";
    const statusOn = 1;
    const statusOff = 0;

    protected $casts = [
        'imagedetail' => 'array'
    ];  

    protected $fillable = [ 'name', 'content', 'image', 'imagedetail'];
}
