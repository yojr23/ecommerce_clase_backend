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
        return view('home', $this->catalogData($request));
    }

    public function welcome(Request $request): View
    {
        return view('welcome', $this->catalogData($request));
    }

    /**
     * @return array<string, mixed>
     */
    protected function catalogData(Request $request): array
    {
        $categories = Category::orderBy('name')->get();
        $productsQuery = Product::with(['category', 'brand'])->orderByDesc('created_at');
        $selectedCategoryId = $request->input('category_id');

        if (! empty($selectedCategoryId)) {
            $productsQuery->where('category_id', $selectedCategoryId);
        }

        $products = $productsQuery->paginate(12)->withQueryString();

        return [
            'categories' => $categories,
            'products' => $products,
            'selectedCategoryId' => $selectedCategoryId,
        ];
    }
}
