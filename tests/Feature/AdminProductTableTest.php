<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductTableTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_paginated_product_table(): void
    {
        $this->seed();
        $user = User::factory()->admin()->create();

        $response = $this->actingAs($user)->get(route('admin.products.index'));

        $response->assertOk();
        $response->assertSee('List Products');
        $response->assertSee('Add new product');
        $response->assertSee('page=2');

        $secondPage = $this->actingAs($user)->get(route('admin.products.index', ['page' => 2]));
        $secondPage->assertOk();
        $this->assertNotSame($response->getContent(), $secondPage->getContent());
    }

    public function test_admin_can_delete_product_from_table(): void
    {
        $user = User::factory()->admin()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.products.destroy', $product));

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('status');
        $this->assertDatabaseMissing('product', ['id' => $product->id]);
    }
}
