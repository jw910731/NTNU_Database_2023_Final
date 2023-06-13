<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show()
    {
        $items = Auth::user()->cartItems()->orderBy('created_at')->get();
        return view('cart', ['items'=> $items]);
    }
}
