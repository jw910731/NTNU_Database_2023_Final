<?php

namespace App\Http\Livewire;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShoppingCart extends Component
{
    public Collection $items;
    public int $total;

    // TODO: take this from the database
    public int $quantity = 1;

    public function modifyItem(CartItem $item)
    {
        $item->quantity = $this->quantity;
        $item->save();
    }

    public function removeItem(CartItem $item)
    {
        CartItem::destroy($item->id);
        $this->items = Auth::user()->cartItems;
    }

    public function render()
    {
        $this->items = Auth::user()->cartItems;
        $this->total = DB::table('cart_items')
            ->where('user_id', '=', Auth::id())
            ->leftJoin('products', 'cart_items.product_id', '=', 'products.id')
            ->sum(DB::raw('cart_items.quantity * products.price'));
        return view('livewire.shopping-cart');
    }
}
