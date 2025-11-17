<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function indexAdmin(): View
    {
        $brands = Brand::orderByDesc('id')->paginate(10);

        return view('admin.brands.table', compact('brands'));
    }

    public function createAdmin(): View
    {
        return view('admin.brands.create');
    }

    public function storeAdmin(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Brand::create($validated);

        return redirect()
            ->route('admin.brands.index')
            ->with('status', 'Marca creada correctamente.');
    }

    public function destroyAdmin(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()
            ->route('admin.brands.index')
            ->with('status', 'Marca eliminada correctamente.');
    }
}
