<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DatabaseStructureTest extends TestCase
{
    use RefreshDatabase;

    public function test_brand_table_and_columns_exist(): void
    {
        $this->assertTrue(Schema::hasTable('brand'));
        $this->assertTrue(Schema::hasColumn('brand', 'name'));
    }

    public function test_product_table_has_brand_id_and_no_legacy_image_column(): void
    {
        $this->assertTrue(Schema::hasColumn('product', 'brand_id'));
        $this->assertFalse(Schema::hasColumn('product', 'image'));
        $this->assertFalse(Schema::hasColumn('product', 'image_url'));
    }
}
