<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_create_form(): void
    {
        $user = User::factory()->admin()->create();
        Category::factory()->count(3)->create();
        Brand::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('admin.products.create'));

        $response->assertOk();
        $response->assertViewIs('admin.products.create');
        $response->assertViewHasAll(['categories', 'brands']);
    }

    public function test_admin_can_store_product(): void
    {
        $user = User::factory()->admin()->create();
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();

        $payload = [
            'name' => 'Laptop Pro',
            'description' => 'Equipo de alto rendimiento',
            'price' => 1999.99,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
        ];

        $response = $this->actingAs($user)->post(route('admin.products.store'), $payload);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('product', [
            'name' => 'Laptop Pro',
            'category_id' => $category->id,
            'brand_id' => $brand->id,
        ]);
    }

    public function test_validation_errors_are_returned_for_missing_fields(): void
    {
        $user = User::factory()->admin()->create();

        $response = $this->actingAs($user)->post(route('admin.products.store'), []);

        $response->assertSessionHasErrors([
            'name',
            'price',
            'category_id',
            'brand_id',
        ]);
        $this->assertSame(0, Product::count());
    }

    public function test_create_form_contains_all_category_and_brand_options(): void
    {
        $user = User::factory()->admin()->create();
        $categories = Category::factory()->count(4)->create();
        $brands = Brand::factory()->count(5)->create();

        $response = $this->actingAs($user)->get(route('admin.products.create'));
        $content = $response->getContent();

        $this->assertSame($categories->count(), substr_count($content, 'data-type="category-option"'));
        $this->assertSame($brands->count(), substr_count($content, 'data-type="brand-option"'));

        $categories->each(function ($category) use ($content) {
            $this->assertStringContainsString(
                sprintf('value="%d" data-type="category-option"', $category->id),
                $content
            );
        });
        $brands->each(function ($brand) use ($content) {
            $this->assertStringContainsString(
                sprintf('value="%d" data-type="brand-option"', $brand->id),
                $content
            );
        });
    }

    public function test_old_input_is_preserved_after_validation_error(): void
    {
        $user = User::factory()->admin()->create();
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();

        $payload = [
            'name' => 'Tablet X',
            'description' => 'Pantalla 4K',
            'price' => 'invalid',
            'category_id' => $category->id,
            'brand_id' => $brand->id,
        ];

        $this->actingAs($user)
            ->from(route('admin.products.create'))
            ->post(route('admin.products.store'), $payload)
            ->assertSessionHasErrors(['price']);

        $response = $this->actingAs($user)->get(route('admin.products.create'));
        $content = $response->getContent();

        $this->assertStringContainsString('value="Tablet X"', $content);
        $this->assertStringContainsString('Pantalla 4K', $content);
        $this->assertStringContainsString('value="invalid"', $content);
        $this->assertStringContainsString(
            sprintf('value="%d" data-type="category-option" selected', $category->id),
            $content
        );
        $this->assertStringContainsString(
            sprintf('value="%d" data-type="brand-option" selected', $brand->id),
            $content
        );
    }

    public function test_menu_marks_products_link_as_active_on_create_route(): void
    {
        $user = User::factory()->admin()->create();

        $response = $this->actingAs($user)->get(route('admin.products.create'));
        $content = $response->getContent();

        $this->assertMatchesRegularExpression(
            sprintf('/<a\s+href="%s"\s+class="active">/m', preg_quote(route('admin.products.create'), '/')),
            $content
        );
    }

    public function test_admin_can_view_products_index(): void
    {
        $user = User::factory()->admin()->create();
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();
        $product = Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
        ]);

        $response = $this->actingAs($user)->get(route('admin.products.index'));

        $response->assertOk();
        $response->assertViewIs('admin.products.table');
        $response->assertSee($product->name);
        $response->assertSee($category->name);
        $response->assertSee($brand->name);
    }
}
