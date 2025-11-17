<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCategoryTableTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_paginated_category_table(): void
    {
        $user = User::factory()->admin()->create();
        Category::factory()->count(25)->create();

        $response = $this->actingAs($user)->get(route('admin.categories.index'));

        $response->assertOk();
        $response->assertSee('List Categories');
        $response->assertSee('page=2');
    }

    public function test_admin_can_delete_category_from_table(): void
    {
        $user = User::factory()->admin()->create();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.categories.destroy', $category));

        $response->assertRedirect(route('admin.categories.index'));
        $response->assertSessionHas('status');
        $this->assertDatabaseMissing('category', ['id' => $category->id]);
    }
}
