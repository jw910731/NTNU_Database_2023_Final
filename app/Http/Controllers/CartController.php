<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addItem($productId)
    {
        $cartItem = new CartItem();
        $cartItem->user_id = Auth::id();
        $cartItem->product_id = Product::where('pchome_id', $productId)->first()->id;
        $cartItem->quantity = 1;
        $cartItem->save();
        return redirect()->route('cart');
    }

    public function showCart()
    {
        $items = Auth::user()->cartItems;
        $total = DB::table('cart_items')
                ->where('user_id', '=', Auth::id())
                ->leftJoin('products', 'cart_items.product_id', '=', 'products.id')
                ->sum(DB::raw('cart_items.quantity * products.price'));
        return view('cart', ['items' => $items, 'total' => $total]);
    }

    public function removeItem($id)
    {
        CartItem::destroy($id);
        return redirect()->route('cart');
    }
}
