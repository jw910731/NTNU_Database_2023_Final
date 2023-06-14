<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $category = Category::where('prefix', Str::substr($product->pchome_id, 0, 4))
            ->first();
        return view('product', [
            'product'=> $product,
            'category' => $category
        ]);
    }
}
