<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('products')->controller(ProductController::class)->group(function() {
    Route::get('/', ['index']);
    Route::get('/create', ['create']);
    Route::get('/{id}/{category?}', ['detail']);
});