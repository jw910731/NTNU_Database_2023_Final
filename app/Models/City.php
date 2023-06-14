<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{

    protected $table = 'cities';

    protected $fillable = [
        'name'
    ];

    public function buyHistory(): BelongsTo
    {
        return $this->belongsTo(BuyHistory::class);
    }
}
