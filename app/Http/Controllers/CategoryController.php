<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function indexAdmin(): View
    {
        $categories = Category::orderByDesc('id')->paginate(10);

        return view('admin.categories.table', compact('categories'));
    }

    public function createAdmin(): View
    {
        return view('admin.categories.create');
    }

    public function storeAdmin(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Category::create($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('status', 'Categoría creada correctamente.');
    }

    public function destroyAdmin(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('status', 'Categoría eliminada correctamente.');
    }
}
