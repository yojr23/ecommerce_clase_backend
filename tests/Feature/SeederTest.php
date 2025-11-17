<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeders_populate_expected_counts(): void
    {
        $this->seed();

        $this->assertSame(20, Category::count());
        $this->assertSame(20, Brand::count());
        $this->assertGreaterThanOrEqual(1000, Product::count());
    }

    public function test_seeders_use_predefined_name_lists(): void
    {
        $this->seed();

        $allowedCategories = collect(config('catalog.categories'));
        $allowedBrands = collect(config('catalog.brands'));

        $this->assertTrue(Category::pluck('name')->diff($allowedCategories)->isEmpty());
        $this->assertTrue(Brand::pluck('name')->diff($allowedBrands)->isEmpty());
    }
}
