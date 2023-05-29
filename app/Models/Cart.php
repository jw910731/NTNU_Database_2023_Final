<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function cartItems()
    {
        return $this->hasMany('App\Models\CartItem');
    }
}
