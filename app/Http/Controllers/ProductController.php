<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index');
    }

    public function detail($id, $category = null): View
    {
        if ($category !== null) {
            return view('products.detail', [
                'myId' => $id,
                'myCategory' => $category,
            ]);
        }

        return view('products.detail', [
            'myId' => $id,
            'myCategory' => 'No category',
        ]);
    }

    public function indexAdmin(): View
    {
        $products = Product::with(['category', 'brand'])
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.products.table', compact('products'));
    }

    public function createAdmin(): View
    {
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function storeAdmin(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:category,id'],
            'brand_id' => ['required', 'exists:brand,id'],
        ]);

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Producto creado correctamente.');
    }

    public function destroyAdmin(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Producto eliminado correctamente.');
    }
}
