<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryStoredInDay extends Model
{
    use HasFactory;

    protected $table = "history_stored_in_day";

    protected $fillable = ['stored_product_in_day'];

    public function storeInHistory()
    {
        return $this->belongsTo(Store::class,'id_stored', 'id');
    }

}
