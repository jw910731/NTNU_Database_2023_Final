<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BuyHistory extends Model
{
    use HasFactory;
    protected $table = 'buy_histories';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function buyRecord(): HasMany
    {
        return $this->hasMany(BuyRecord::class);
    }
}
