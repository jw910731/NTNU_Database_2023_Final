<?php

namespace App\Http\Middleware;

use App\Models\ProductView;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RecordProductView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ProductView::create([
            'user_id'=> Auth::id(),
            'product_id'=> $request->product->id,
        ]);
        return $next($request);
    }
}
