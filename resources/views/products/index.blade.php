@extends('layouts.app')

@section('title', 'Productos Tecnológicos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Productos Tecnológicos</h1>
        <p class="text-gray-600">Descubre nuestra amplia gama de productos tecnológicos de última generación</p>
    </div>

    <!-- Filtros y búsqueda -->
    <div class="mb-8 flex flex-wrap gap-4 items-center">
        <div class="flex-1 min-w-64">
            <input type="text" placeholder="Buscar productos..." 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Todas las categorías</option>
            <option value="smartphones">Smartphones</option>
            <option value="laptops">Laptops</option>
            <option value="tablets">Tablets</option>
            <option value="audio">Audio</option>
            <option value="gaming">Gaming</option>
            <option value="smartwatch">Smartwatches</option>
        </select>
    </div>

    <!-- Grid de productos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        
        @php
        $products = [
            [
                'id' => 1,
                'name' => 'iPhone 15 Pro Max',
                'category' => 'Smartphones',
                'price' => 1299.99,
                'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=300&fit=crop',
                'brand' => 'Apple',
                'description' => 'El smartphone más avanzado de Apple con chip A17 Pro'
            ],
            [
                'id' => 2,
                'name' => 'MacBook Pro 16"',
                'category' => 'Laptops',
                'price' => 2499.99,
                'image' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=400&h=300&fit=crop',
                'brand' => 'Apple',
                'description' => 'Laptop profesional con chip M3 Max para máximo rendimiento'
            ],
            [
                'id' => 3,
                'name' => 'Samsung Galaxy S24 Ultra',
                'category' => 'Smartphones',
                'price' => 1199.99,
                'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&h=300&fit=crop',
                'brand' => 'Samsung',
                'description' => 'Smartphone premium con S Pen integrado y cámara de 200MP'
            ],
            [
                'id' => 4,
                'name' => 'iPad Pro 12.9"',
                'category' => 'Tablets',
                'price' => 1099.99,
                'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400&h=300&fit=crop',
                'brand' => 'Apple',
                'description' => 'Tablet profesional con chip M2 y pantalla Liquid Retina XDR'
            ],
            [
                'id' => 5,
                'name' => 'Sony WH-1000XM5',
                'category' => 'Audio',
                'price' => 399.99,
                'image' => 'https://images.unsplash.com/photo-1484704849700-f032a568e944?w=400&h=300&fit=crop',
                'brand' => 'Sony',
                'description' => 'Audífonos inalámbricos con cancelación de ruido líder en la industria'
            ],
            [
                'id' => 6,
                'name' => 'Dell XPS 13',
                'category' => 'Laptops',
                'price' => 1299.99,
                'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop',
                'brand' => 'Dell',
                'description' => 'Ultrabook premium con procesador Intel de 12va generación'
            ],
            [
                'id' => 7,
                'name' => 'PlayStation 5',
                'category' => 'Gaming',
                'price' => 499.99,
                'image' => 'https://images.unsplash.com/photo-1606813907291-d86efa9b94db?w=400&h=300&fit=crop',
                'brand' => 'Sony',
                'description' => 'Consola de videojuegos de nueva generación con gráficos 4K'
            ],
            [
                'id' => 8,
                'name' => 'Apple Watch Series 9',
                'category' => 'Smartwatches',
                'price' => 399.99,
                'image' => 'https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?w=400&h=300&fit=crop',
                'brand' => 'Apple',
                'description' => 'Smartwatch avanzado con chip S9 y pantalla Always-On más brillante'
            ]
        ];
        @endphp

        @foreach($products as $product)
            @include('products.components.product-card', ['product' => $product])
        @endforeach

    </div>

    <!-- Paginación -->
    <div class="mt-12 flex justify-center">
        <nav class="flex items-center space-x-2">
            <button class="px-3 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition-colors">
                Anterior
            </button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-lg">1</button>
            <button class="px-3 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition-colors">2</button>
            <button class="px-3 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition-colors">3</button>
            <button class="px-3 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition-colors">
                Siguiente
            </button>
        </nav>
    </div>
</div>

<style>
/* Estilos adicionales para hover effects */
.product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.product-image {
    transition: transform 0.3s ease;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}
</style>
@endsection