<?php

namespace App\Http\Controllers;

use App\Models\BuyHistory;
use App\Models\BuyRecord;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyController extends Controller
{
    public function payment(Request $request)
    {
        $cartItems = Auth::user()->cartItems()->orderBy('created_at')->get();
        return view('payment', [
            'cartItems' => $cartItems,
        ]);
    }

    public function buy(Request $request)
    {
        $validated = $request->validate([
            'payment'=> 'required|exists:payments,id|integer',
            'items'=> 'array',
            'items.*'=> 'required|exists:cart_items,id'
        ]);
        $itemIDs = $request->get('items', []);
        $payment = $request->get('payment');

        DB::transaction(function() use (&$itemIDs) {
            // Get buy item
            if(empty($itemIDs))
                $buyItems = Auth::user()->cartItems;
            else
                $buyItems = Auth::user()->cartItems()->whereIn('id', $itemIDs);

            // Create new buy history
            $buyHistory = BuyHistory::create([
                'user_id'=> Auth::id(),
                'payment_id'=> 1,
                'address'=> '動物園',
            ]);

            // Create buy record by cart items and destroy cart item at the same time
            foreach($buyItems as $item) {
                $record = BuyRecord::create([
                    'buy_history_id'=> $buyHistory->id,
                    'product_id'=> $item->product,
                    'quantity'=> $item->quantity,
                ]);

                CartItem::destroy($item->id);
            }
        });
        return response()->noContent();
    }
}
