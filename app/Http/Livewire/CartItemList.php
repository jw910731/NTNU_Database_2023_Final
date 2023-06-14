<?php

namespace App\Http\Livewire;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartItemList extends Component
{
    public $items;
    protected $listeners = [
        'itemRefresh'=> 'refresh',
    ];

    public function refresh()
    {
        $this->items = Auth::user()->cartItems()->orderBy('created_at')->get();
    }

    public function render()
    {
        return view('livewire.cart-item-list');
    }
}
