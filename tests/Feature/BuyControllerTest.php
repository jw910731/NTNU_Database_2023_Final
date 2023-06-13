<?php

namespace Tests\Feature;

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
    use RefreshDatabase;

    public function test_buy_cart_all(): void
    {
        $occupation = Occupation::factory()->create();
        $user = User::factory()->create([
            'occupation_id' => $occupation->id,
        ]);
        $payment = Payment::factory()->create();
        $itemCount = rand(3,6);
        CartItem::factory()->count($itemCount)->make()->each(function (CartItem $item) use (&$user) {
            $item->product()->associate(Product::factory()->create());
            $item->user()->associate($user);
            $item->save();
        });
        $response = $this->actingAs($user)->post(route('cart.buy'), [
            'payment'=> $payment->id,
            'address'=> $this->faker->streetAddress(),
        ]);
        $response->assertSuccessful();
        $user->refresh();
        $this->assertEmpty($user->cartItems);
        $this->assertNotEmpty($user->buyHistory);
    }

    public function test_buy_cart(): void
    {
        $occupation = Occupation::factory()->create();
        $user = User::factory()->create([
            'occupation_id' => $occupation->id,
        ]);
        $payment = Payment::factory()->create();
        $itemCount = rand(3,6);
        $items = CartItem::factory()->count($itemCount)->make()->each(function (CartItem $item) use (&$user) {
            $item->product()->associate(Product::factory()->create());
            $item->user()->associate($user);
            $item->save();
        });
        $selectedItems = array_rand($items->toArray(), rand(2, $itemCount));
        $selectedItems = array_map(function ($key) use (&$items) {
            return $items[$key]->id;
        }, $selectedItems);
        $response = $this->actingAs($user)->post(route('cart.buy'), [
            'items'=> $selectedItems,
            'payment'=> $payment->id,
            'address'=> $this->faker->streetAddress(),
        ]);
        $response->assertSuccessful();
        $user->refresh();
        $this->assertEmpty($user
                            ->cartItems()
                            ->whereIn('id', $selectedItems)
                            ->get());
        $this->assertNotEmpty($user->buyHistory);
    }
}
