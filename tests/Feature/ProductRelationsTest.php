<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductRelationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_has_brand_and_category_relations(): void
    {
        $brand = Brand::factory()->create();
        $category = Category::factory()->create();
        $product = Product::factory()->create([
            'brand_id' => $brand->id,
            'category_id' => $category->id,
        ]);

        $this->assertInstanceOf(Brand::class, $product->brand);
        $this->assertInstanceOf(Category::class, $product->category);
    }

    public function test_brand_has_many_products(): void
    {
        $brand = Brand::factory()->create();
        $category = Category::factory()->create();
        Product::factory()->count(3)->create([
            'brand_id' => $brand->id,
            'category_id' => $category->id,
        ]);

        $this->assertTrue($brand->products->count() >= 3);
    }
}
