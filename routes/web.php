<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


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
    });
Auth::routes();

Route::get('/prodcuts', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
