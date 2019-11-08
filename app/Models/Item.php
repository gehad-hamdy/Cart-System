<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    public function carts()
    {
        return $this->belongsTo(Cart::class);
    }
}
