<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
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
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::get('/addCartItem/{product:pchome_id}', [CartController::class, 'addItem'])->name('addCartItem');
    Route::get('/removeCartItem/{id}', [CartController::class, 'removeItem'])->name('removeCartItem');

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
