<?php

namespace App\Http\Livewire;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $rules = [
      'item.quantity' => 'integer|max:20',
    ];

    public CartItem $item;

    public function saveItem()
    {
        $this->item->save();
        $this->emit('moneyRefresh');
    }

    public function removeItem()
    {
        CartItem::destroy($this->item);
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
