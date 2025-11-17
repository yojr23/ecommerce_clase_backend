@extends('layouts.app')

@section('content')
<div class="container py-4">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="mb-0">Catálogo de productos</h2>
            <small class="text-muted">Explora los últimos productos creados en el sistema</small>
        </div>
        <form method="GET" action="{{ route('home') }}" class="d-flex gap-2 align-items-center">
            <label for="category_id" class="form-label mb-0">Filtrar por categoría:</label>
            <select name="category_id" id="category_id" class="form-select"
                onchange="this.form.submit()">
                <option value="">{{ __('Todas las categorías') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected((string) $selectedCategoryId === (string) $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <noscript>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </noscript>
        </form>
    </div>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/640x420?text=Producto" class="card-img-top" alt="Product image">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="text-muted mb-2">{{ optional($product->category)->name ?? 'Sin categoría' }}</p>
                        <p class="fw-bold fs-5 mb-3">${{ number_format($product->price, 2) }}</p>
                        <p class="card-text text-muted flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($product->description ?? 'Sin descripción', 80) }}
                        </p>
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <span class="badge text-bg-light">Marca: {{ optional($product->brand)->name ?? 'Sin marca' }}</span>
                            <a href="{{ url('/products/' . $product->id) }}" class="btn btn-outline-primary btn-sm">Ver detalle</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No se encontraron productos para la categoría seleccionada.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
