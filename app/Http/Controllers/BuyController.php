<?php

namespace App\Http\Controllers;

use App\Exceptions\LackofProductAmountException;
use App\Models\BuyHistory;
use App\Models\BuyRecord;
use App\Models\CartItem;
use App\Models\Product;
use http\Message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyController extends Controller
{
    public function payment(Request $request)
    {
        $cartItems = Auth::user()->cartItems()->orderBy('created_at')->get();
        if($cartItems->isEmpty()){
            return redirect()->route('dashboard');
        }
        return view('payment', [
            'cartItems' => $cartItems,
        ]);
    }

    public function buy(Request $request)
    {
        $validated = $request->validate([
            'payment' => 'required|exists:payments,id|integer',
            'items' => 'array',
            'items.*' => 'required|exists:cart_items,id',
            'city' => 'required|exists:cities,id|string',
            'address' => 'required|string',
        ]);
        $itemIDs = $request->get('items', []);
        $payment = $request->get('payment');
        $city = $request->get('city');
        $address = $request->get('address');

        $buyHistory = new BuyHistory();
        $buyHistory->user_id = Auth::id();
        $buyHistory->payment_id = $payment;
        $buyHistory->city_id = $city;
        $buyHistory->address = $address;

        if (empty($itemIDs))
            $buyItems = Auth::user()->cartItems;
        else
            $buyItems = Auth::user()->cartItems()->whereIn('id', $itemIDs)->get();
        if($buyItems->isEmpty()){
            return redirect()->route('dashboard');
        }

        try {
            DB::transaction(function () use (&$itemIDs, &$buyHistory) {
                // Get buy item
                if (empty($itemIDs))
                    $buyItems = Auth::user()->cartItems;
                else
                    $buyItems = Auth::user()->cartItems()->whereIn('id', $itemIDs)->get();
                // Create new buy history
                $buyHistory->save();

                // Create buy record by cart items and destroy cart item at the same time
                foreach ($buyItems as $item) {
                    BuyRecord::create([
                        'buy_history_id' => $buyHistory->id,
                        'product_id' => $item->product->id,
                        'quantity' => $item->quantity,
                    ]);
                    $product = Product::where('id', $item->product->id)->first();
                    // Check if the product amount is smaller than the item quantity
                    if ($product->amount < $item->quantity) {
                        throw new LackofProductAmountException();
                    }
                    $product->update(['amount'=>$product->amount-$item->quantity]);
                    $item->delete();
                }
            });
        } catch(LackofProductAmountException $e){
            $e->report();
            return redirect()->back()->with('error', __('含有庫存不足的商品！'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return view('bill', [
            'buyHistory' => $buyHistory,
        ]);
    }
}
