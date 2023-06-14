<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BuyRecord extends Model
{
    use HasFactory;
    protected $table = 'buy_records';
    protected $fillable = [
        'buy_history_id',
        'product_id',
        'quantity',
    ];

    public function buyHistory(): BelongsTo
    {
        return $this->belongsTo(BuyRecord::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
