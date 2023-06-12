<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show()
    {
        $items = Auth::user()->cartItems;
        return view('cart', ['items'=> $items]);
    }
}
