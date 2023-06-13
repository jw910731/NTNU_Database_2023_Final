<?php

namespace Tests\Feature;

use App\Http\Controllers\BuyController;
use App\Models\CartItem;
use App\Models\Occupation;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuyControllerTest extends TestCase
{
    use WithFaker;

    public function test_buy_cart_all(): void
    {
        $occupation = Occupation::factory()->create();
        $user = User::factory()->create([
            'occupation_id' => $occupation->id,
        ]);
        $payment = Payment::factory()->create();
        $products = Product::factory()->count(rand(3,6));
        foreach ($products as $product) {
            CartItem::factory()->for($user)->for($product)->create();
        }
        $response = $this->actingAs($user)->post(route('cart.buy'), [
            'payment'=> $payment->id,
        ]);
        $response->assertSuccessful();
    }
}
