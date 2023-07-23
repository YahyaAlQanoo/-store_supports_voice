<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word() ,
            'category_id' => Category::inRandomOrder()->first()->id,
            'store_id' => Store::inRandomOrder()->first()->id,
            'description' => $this->faker->sentence(10),
            'image' => $this->faker->imageUrl,  
            'price' => $this->faker->numberBetween(50, 500),
            'quantity' => $this->faker->numberBetween(0, 20),
            'status' => 'Inactive'

         ];
    }
}
