<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index() {
        return view('products.index');
    }

    function detail($id, $category = null) {
        if($category != null) {
            return view('products.detail',[
                'myId' => $id,
                 'myCategory' => $category]);
        } else {
            return view('products.detail',[
                'myId' => $id,
                'myCategory' => 'No category']);
        }
        
    }

    function create() {
        return view('products.create');
    }
}
