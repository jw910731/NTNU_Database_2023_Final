<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartTotalMoney extends Component
{
    public int $total;
    protected $listeners = [
        'moneyRefresh' => 'refresh',
    ];

    public function mount(): void
    {
        $this->refresh();
    }

    public function refresh(): void
    {
        $this->total = DB::table('cart_items')
            ->where('user_id', '=', Auth::id())
            ->leftJoin('products', 'cart_items.product_id', '=', 'products.id')
            ->sum(DB::raw('cart_items.quantity * products.price'));
    }

    public function render()
    {
        return view('livewire.cart-total-money');
    }
}
