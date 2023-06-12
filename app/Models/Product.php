<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'pchome_id',
        'name',
        'describe',
        'img',
        'price',
        'origin_price',
    ];

   public function cartItem(): HasMany
   {
       return $this->hasMany(CartItem::class);
   }
}
