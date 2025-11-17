<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeCatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_displays_products_and_categories_from_database(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['name' => 'Electrónica Pro']);
        $brand = Brand::factory()->create(['name' => 'Brand X']);
        Product::factory()->count(3)->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
        ]);

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertOk();
        $response->assertSee('Catálogo de productos');
        $response->assertSee('Electrónica Pro');
        $response->assertSee('Brand X');
    }

    public function test_home_filters_products_by_category(): void
    {
        $user = User::factory()->create();
        $brand = Brand::factory()->create();
        $categoryA = Category::factory()->create(['name' => 'Gaming']);
        $categoryB = Category::factory()->create(['name' => 'Audio']);

        $productA = Product::factory()->create([
            'name' => 'Consola Z',
            'category_id' => $categoryA->id,
            'brand_id' => $brand->id,
        ]);

        $productB = Product::factory()->create([
            'name' => 'Parlante Y',
            'category_id' => $categoryB->id,
            'brand_id' => $brand->id,
        ]);

        $response = $this->actingAs($user)->get(route('home', ['category_id' => $categoryA->id]));

        $response->assertOk();
        $response->assertSee($productA->name);
        $response->assertDontSee($productB->name);
        $response->assertViewHas('selectedCategoryId', $categoryA->id);
    }
}
