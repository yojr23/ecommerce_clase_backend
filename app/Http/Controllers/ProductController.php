<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index() {
        return "List products";
    }

    function detail($id, $category = null) {
        if($category) {
            return "Product detail: $id, category: $category";
        } else {
            return "Product detail: $id, no category";
        }
    }

    function create() {
        return "FORM FOR CREATE PRODUCTS";
    }
}
