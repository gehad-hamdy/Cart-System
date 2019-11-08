<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";

    protected $fillable = ['customer_id', 'address', 'telephone', 'total'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
