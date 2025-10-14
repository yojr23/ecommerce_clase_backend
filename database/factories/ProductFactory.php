<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'original_price' => $this->faker->randomFloat(2, 10, 1000),
            'image_url' => $this->faker->imageUrl(640,480, 'products', true),
            'brand' => $this->faker->company(), 
            'stock' => $this->faker->numberBetween(0, 100),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'reviews_count' => $this->faker->numberBetween(0, 500),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
