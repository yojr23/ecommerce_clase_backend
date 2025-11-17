<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBrandTableTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_paginated_brand_table(): void
    {
        $user = User::factory()->admin()->create();
        Brand::factory()->count(25)->create();

        $response = $this->actingAs($user)->get(route('admin.brands.index'));

        $response->assertOk();
        $response->assertSee('List Brands');
        $response->assertSee('page=2');
    }

    public function test_admin_can_delete_brand_from_table(): void
    {
        $user = User::factory()->admin()->create();
        $brand = Brand::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.brands.destroy', $brand));

        $response->assertRedirect(route('admin.brands.index'));
        $response->assertSessionHas('status');
        $this->assertDatabaseMissing('brand', ['id' => $brand->id]);
    }
}
