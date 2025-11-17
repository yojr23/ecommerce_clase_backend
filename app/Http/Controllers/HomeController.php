<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request): View
    {
        $categories = Category::orderBy('name')->get();
        $productsQuery = Product::with(['category', 'brand'])->orderByDesc('created_at');
        $selectedCategoryId = $request->input('category_id');

        if (! empty($selectedCategoryId)) {
            $productsQuery->where('category_id', $selectedCategoryId);
        }

        $products = $productsQuery->paginate(12)->withQueryString();

        return view('home', [
            'categories' => $categories,
            'products' => $products,
            'selectedCategoryId' => $selectedCategoryId,
        ]);
    }

    public function welcome()
    {
        return view('welcome');
    }
}
