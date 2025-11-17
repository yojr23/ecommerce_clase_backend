@extends('layouts.app')

@section('title', 'Productos Tecnológicos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Productos Tecnológicos</h1>
        <p class="text-gray-600">Explora nuestro catálogo actualizado desde la base de datos.</p>
    </div>

    <form method="GET" action="{{ route('products.index') }}" class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex flex-col">
            <label for="search" class="text-sm text-gray-600 mb-2">Buscar productos</label>
            <input id="search" type="text" name="q" value="{{ $search ?? '' }}"
                placeholder="Nombre o descripción" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex flex-col">
            <label for="category_id" class="text-sm text-gray-600 mb-2">Categoría</label>
            <select id="category_id" name="category_id"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Todas las categorías</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected((string) $selectedCategoryId === (string) $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex items-end">
            <button type="submit"
                class="w-full md:w-auto px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Aplicar filtros
            </button>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($products as $product)
            @include('products.components.product-card', ['product' => $product])
        @empty
            <div class="col-span-full">
                <div class="bg-white border border-gray-200 rounded-lg p-6 text-center text-gray-500">
                    No hay productos que coincidan con los filtros seleccionados.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-12 flex justify-center">
        {{ $products->links() }}
    </div>
</div>
@endsection
