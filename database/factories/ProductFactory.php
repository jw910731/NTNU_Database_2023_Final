<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pchome_id'=> $this->faker->uuid(),
            'name'=> $this->faker->name(),
            'describe'=> $this->faker->text(),
            'img'=> $this->faker->imageUrl(width: 1, height: 1),
            'price'=> $this->faker->numberBetween(100, 10000),
            'origin_price'=> $this->faker->numberBetween(100, 10000),
            'amount'=> $this->faker->numberBetween(1, 10),
        ];
    }
}
