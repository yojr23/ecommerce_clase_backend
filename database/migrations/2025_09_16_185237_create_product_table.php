<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 14, 2);
            $table->decimal('original_price', 14, 2)->nullable();
            $table->string('image')->nullable(); // imagen principal
            $table->string('brand')->nullable(); // marca
            $table->integer('stock')->default(0); // cantidad en inventario
            $table->decimal('rating', 3, 1)->default(0); // rating promedio, hasta 5.0
            $table->integer('reviews_count')->default(0); // cantidad de reseñas
            $table->json('features')->nullable(); // lista de características
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
