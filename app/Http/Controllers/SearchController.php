<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if(property_exists($request, 'keyword') || strlen($request->keyword) == 0){
            return view('dashboard', [
                "result" => [],
                "error" => false,
                "keyword" => $request->get('keyword', ''),
            ]);
        }

        SearchHistory::create([
            'user_id'=> Auth::id(),
            'keyword'=> $request->keyword
        ]);

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

        $products = [];
        foreach ($response['prods'] as &$prod) {
            $dbProduct = Product::where('pchome_id', $prod["Id"]);
            if (!$dbProduct->exists()) {
                $product = new Product;
                $product->pchome_id = $prod["Id"];
                $product->name = $prod["name"];
                $product->describe = $prod["describe"];
                $product->img = "https://cs-d.ecimg.tw" . $prod["picB"];
                $product->price = $prod["price"];
                $product->origin_price = $prod["originPrice"];
                $product->amount = random_int(10, 50);
                $product->save();
                $dbProduct = $product;
            }
            else {
                $dbProduct = $dbProduct->distinct()->get()->first();
            }
            $products[] = $dbProduct;
        }

        return view('dashboard', [
            "result" => $products,
            "error" => false,
            'keyword' => $request->keyword
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
           'product' => 'required|exists:products,pchome_id',
        ]);
        $product = Product::where('pchome_id', $request->product)->distinct()->get()->first();
        $quantity = $request->get('quantity', 1);
        $cartItem = CartItem::where('product_id', $product->id)->distinct()->get()->first();
        if(is_null($cartItem)) {
            $cartItem = new CartItem();
            $cartItem->user_id = Auth::id();
            $cartItem->product_id = $product->id;
        }
        $cartItem->quantity += $quantity;
        if($cartItem->quantity > 20)
            $cartItem->quantity = 20;
        $cartItem->save();
        return redirect()->route('cart');
    }
}
