<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\isNull;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if(property_exists($request, 'keyword') || strlen($request->keyword) == 0){
            return view('dashboard', [
                "result" => [],
                "error" => false,
            ]);
        }
        $response = Http::get('https://ecshweb.pchome.com.tw/search/v3.3/all/results', [
            'q' => $request->keyword,
            'page' => 1,
            'sort'=>'sale/dc'
        ])->json();
        if(is_null($response) || !key_exists('prods',$response)) {
            return view('dashboard', [
                "result" => [],
                "error" => true,
            ]);
        }
        foreach ($response['prods'] as &$prod) {
            $product = new Product;
            $product->pchome_id = $prod["Id"];
            $product->name = $prod["name"];
            $product->describe = $prod["describe"];
            $product->img = "https://cs-d.ecimg.tw" . $prod["picB"];
            $product->price = $prod["price"];
            $product->origin_price = $prod["originPrice"];
            if (!Product::where('pchome_id', $product->pchome_id)->exists()) {
                $product->save();
            }
            $prod["pchome_id"] = $product->pchome_id;
            $prod["img"] = $product->img;
            $prod["origin_price"] = $product->origin_price;
        }

        return view('dashboard', [
            "result" => $response['prods'],
            "error" => false,
        ]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('pchome_id', $request->product)->distinct()->get()->first();
        $quantity = $request->get('quantity', 1);
        $cartItem = CartItem::where('product_id', $product->id)->distinct()->get()->first();
        if(is_null($cartItem)) {
            $cartItem = new CartItem();
            $cartItem->user_id = Auth::id();
            $cartItem->product_id = $product->id;
        }
        $cartItem->quantity += $quantity;
        $cartItem->save();
        return redirect()->route('cart');
    }
}
