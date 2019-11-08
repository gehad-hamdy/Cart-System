<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";

    protected $fillable = [
        'item_id',
        'customer_id',
        'quantity'
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class,'cart_items');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
