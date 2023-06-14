<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{

    protected $table = 'cities';

    protected $fillable = [
        'name'
    ];

    public function buyHistory(): HasMany
    {
        return $this->hasMany(BuyHistory::class);
    }
}
