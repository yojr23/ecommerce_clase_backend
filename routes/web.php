<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return "List products";
});

Route::get('/products/{id}/{category?}', function ($name,$category = null) {
    if ($category != null) {
        return "Detail products" . $name . " With category: " . $category;
    } else{
        return "Detail products" . $name;
    }
});