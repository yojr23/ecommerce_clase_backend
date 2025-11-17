<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;


Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}/{category?}', 'detail');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/products', [ProductController::class, 'indexAdmin'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'createAdmin'])->name('products.create');
        Route::post('/products', [ProductController::class, 'storeAdmin'])->name('products.store');
        Route::delete('/products/{product}', [ProductController::class, 'destroyAdmin'])->name('products.destroy');

        Route::get('/categories', [CategoryController::class, 'indexAdmin'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'createAdmin'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'storeAdmin'])->name('categories.store');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroyAdmin'])->name('categories.destroy');

        Route::get('/brands', [BrandController::class, 'indexAdmin'])->name('brands.index');
        Route::get('/brands/create', [BrandController::class, 'createAdmin'])->name('brands.create');
        Route::post('/brands', [BrandController::class, 'storeAdmin'])->name('brands.store');
        Route::delete('/brands/{brand}', [BrandController::class, 'destroyAdmin'])->name('brands.destroy');
    });
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
