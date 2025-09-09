<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products',[ProductController::class, 'index']);


Route::get('/products/create',[ProductController::class, 'create']);

Route::get('/products/{id}/{category?}',[ProductController::class, 'detail']);

