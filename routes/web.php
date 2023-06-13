<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BuyController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\RecordProductView;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [SearchController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/add-cart', [SearchController::class, 'addToCart'])->name('add-cart');
    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/buy', [BuyController::class, 'buy'])->name('cart.buy');

    // route get payment page
    Route::get('/cart/payment', [BuyController::class, 'payment'])->name('payment');
    Route::get('/product/{product:pchome_id}', [ProductController::class, 'show'])
        ->name('product.show')
        ->middleware(RecordProductView::class);
    Route::middleware([
        IsAdmin::class
    ])->group(function (){
        Route::get('/chart', function(){
           return view('admin.panel');
        })->name('admin.panel');
    });
});
