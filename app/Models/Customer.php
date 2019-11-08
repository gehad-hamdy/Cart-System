<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    /**
     * Get the phone record associated with the user.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
