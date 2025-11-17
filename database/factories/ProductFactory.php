<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        $categoryId = Category::inRandomOrder()->value('id') ?? Category::factory()->create()->id;
        $brandId = Brand::inRandomOrder()->value('id') ?? Brand::factory()->create()->id;

        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 5000),
            'original_price' => $this->faker->randomFloat(2, 10, 5000),
            'stock' => $this->faker->numberBetween(0, 500),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'reviews_count' => $this->faker->numberBetween(0, 2000),
            'category_id' => $categoryId,
            'brand_id' => $brandId,
        ];
    }
}
