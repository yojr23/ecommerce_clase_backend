@extends('layouts.app')

@section('content')
<section class="bg-light py-5 mb-4">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-7">
                <p class="text-uppercase text-primary fw-semibold mb-2">Bienvenido a TechStore</p>
                <h1 class="display-5 fw-bold mb-3">Descubre los mejores productos de tecnología</h1>
                <p class="text-muted mb-4">
                    Explora nuestro catálogo curado de dispositivos, accesorios y gadgets. Filtra por categoría y
                    encuentra rápidamente lo que necesitas.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Crear cuenta</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">Iniciar sesión</a>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <img src="https://via.placeholder.com/420x280?text=TechStore" class="img-fluid rounded-4 shadow"
                    alt="TechStore hero">
            </div>
        </div>
    </div>
</section>

<div class="container pb-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="mb-0">Explorar catálogo</h2>
            <small class="text-muted">Selecciona una categoría para filtrar los productos</small>
        </div>
        <form method="GET" action="{{ route('welcome') }}" class="d-flex gap-2 align-items-center">
            <label for="category_id_welcome" class="form-label mb-0">Categoría:</label>
            <select name="category_id" id="category_id_welcome" class="form-select"
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
