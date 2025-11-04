<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/',[ProductController::class, 'index'])->name('index');

Route::prefix('products')->controller(ProductController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/{id}/{category?}', 'detail');
});
Auth::routes();

Route::get('/prodcuts', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
