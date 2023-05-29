<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addItem($productId) {
        $cart = Cart::where('user_id', Auth::id())->first();
        if(!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->save();
        }
        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = Product::where('pchome_id', $productId)->first()->id;
        $cartItem->save();
        return redirect()->route('cart');
    }

    public function showCart()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        if(!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->save();
        }
        $items = $cart->cartItems;
        $total = 0;
        foreach($items as $item) {
            $total += $item->product->price;
        }
        return view('cart', ['items' => $items, 'total' => $total]);
    }

    public function removeItem($id)
    {
        CartItem::destroy($id);
        return redirect()->route('cart');
    }
}
