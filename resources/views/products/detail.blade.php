@extends('layouts.app')

@php
// Simulamos datos del producto basados en el ID para la demostración
$products = [
    1 => [
        'id' => 1,
        'name' => 'iPhone 15 Pro Max',
        'category' => 'Smartphones',
        'price' => 1299.99,
        'original_price' => 1399.99,
        'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800&h=600&fit=crop',
        'brand' => 'Apple',
        'description' => 'El iPhone más avanzado hasta la fecha, con el revolucionario chip A17 Pro, sistema de cámaras Pro de última generación y construcción en titanio aeroespacial.',
        'stock' => 15,
        'rating' => 4.8,
        'reviews_count' => 2847,
        'features' => [
            'Chip A17 Pro con GPU de 6 núcleos',
            'Sistema de cámaras Pro triple de 48MP',
            'Pantalla Super Retina XDR de 6.7"',
            'Construcción en titanio con Ceramic Shield',
            'Puerto USB-C con Thunderbolt',
            'Face ID avanzado',
            'Resistente al agua IP68'
        ],
        'specifications' => [
            'Pantalla' => '6.7" Super Retina XDR OLED, 2796×1290px',
            'Procesador' => 'Apple A17 Pro (3nm)',
            'RAM' => '8GB',
            'Almacenamiento' => '256GB / 512GB / 1TB',
            'Cámara Principal' => '48MP f/1.78, estabilización óptica',
            'Cámara Ultra Gran Angular' => '12MP f/2.2, 120°',
            'Cámara Telefoto' => '12MP f/2.8, zoom óptico 5x',
            'Batería' => 'Hasta 29 horas de video',
            'Dimensiones' => '159.9 × 76.7 × 8.25 mm',
            'Peso' => '221g',
            'Conectividad' => '5G, Wi-Fi 6E, Bluetooth 5.3',
            'Sistema Operativo' => 'iOS 17'
        ],
        'gallery' => [
            'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1580910051074-3eb694886505?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1556656793-08538906a9f8?w=800&h=600&fit=crop'
        ]
    ],
    // Agrega más productos aquí según sea necesario
];

$product = $products[$myId] ?? [
    'id' => $myId,
    'name' => 'Producto ' . $myId,
    'category' => $myCategory,
    'price' => 999.99,
    'image' => 'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=800&h=600&fit=crop',
    'brand' => 'TechBrand',
    'description' => 'Descripción del producto tecnológico avanzado.',
    'stock' => 10,
    'rating' => 4.5,
    'reviews_count' => 150,
    'features' => ['Característica 1', 'Característica 2', 'Característica 3'],
    'specifications' => ['Especificación' => 'Valor'],
    'gallery' => ['https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=800&h=600&fit=crop']
];
@endphp

@section('title', $product['name'] . ' - TechStore')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">

    <!-- Breadcrumb -->
    <nav class="bg-white border-b border-gray-200 py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="/" class="text-gray-500 hover:text-blue-600 transition-colors">Inicio</a>
                <span class="text-gray-400">/</span>
                <a href="/products" class="text-gray-500 hover:text-blue-600 transition-colors">Productos</a>
                <span class="text-gray-400">/</span>
                <a href="/products?category={{ strtolower($product['category']) }}" class="text-gray-500 hover:text-blue-600 transition-colors">{{ $product['category'] }}</a>
                <span class="text-gray-400">/</span>
                <span class="text-gray-800 font-medium">{{ $product['name'] }}</span>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <!-- Product Header -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
            
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="aspect-square">
                        <img id="main-image" 
                             src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    
                    <!-- Discount Badge -->
                    @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                        <div class="absolute top-4 left-4">
                            <span class="bg-red-500 text-white font-bold px-3 py-1 rounded-full text-sm">
                                -{{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}%
                            </span>
                        </div>
                    @endif

                    <!-- Stock Status -->
                    <div class="absolute top-4 right-4">
                        @if($product['stock'] > 10)
                            <span class="bg-green-500 text-white font-semibold px-3 py-1 rounded-full text-sm">
                                ✅ En Stock
                            </span>
                        @elseif($product['stock'] > 0)
                            <span class="bg-yellow-500 text-white font-semibold px-3 py-1 rounded-full text-sm">
                                ⚠️ Pocas unidades
                            </span>
                        @else
                            <span class="bg-red-500 text-white font-semibold px-3 py-1 rounded-full text-sm">
                                ❌ Agotado
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Thumbnail Gallery -->
                @if(isset($product['gallery']) && count($product['gallery']) > 1)
                <div class="flex space-x-3 overflow-x-auto">
                    @foreach($product['gallery'] as $index => $image)
                        <button onclick="changeMainImage('{{ $image }}')" 
                                class="thumbnail flex-shrink-0 w-20 h-20 bg-white rounded-lg shadow-md overflow-hidden border-2 border-transparent hover:border-blue-500 transition-all duration-200 {{ $index === 0 ? 'border-blue-500' : '' }}">
                            <img src="{{ $image }}" alt="Vista {{ $index + 1 }}" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <!-- Brand & Category -->
                <div class="flex items-center space-x-4">
                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">
                        🏷️ {{ $product['brand'] }}
                    </span>
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                        📱 {{ $product['category'] }}
                    </span>
                </div>

                <!-- Product Name -->
                <h1 class="text-4xl font-bold text-gray-900 leading-tight">
                    {{ $product['name'] }}
                </h1>

                <!-- Rating & Reviews -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-1">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= $product['rating'] ? 'text-yellow-400' : 'text-gray-300' }} fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <span class="text-lg font-semibold text-gray-700 ml-2">{{ $product['rating'] }}</span>
                    </div>
                    <span class="text-gray-500">({{ number_format($product['reviews_count']) }} reseñas)</span>
                </div>

                <!-- Price -->
                <div class="flex items-baseline space-x-4">
                    <span class="text-4xl font-bold text-gray-900">
                        ${{ number_format($product['price'], 2) }}
                    </span>
                    @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                        <span class="text-xl text-gray-500 line-through">
                            ${{ number_format($product['original_price'], 2) }}
                        </span>
                        <span class="text-lg text-green-600 font-semibold">
                            Ahorras ${{ number_format($product['original_price'] - $product['price'], 2) }}
                        </span>
                    @endif
                </div>

                <!-- Description -->
                <div class="prose prose-gray">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        {{ $product['description'] }}
                    </p>
                </div>

                <!-- Key Features -->
                @if(isset($product['features']) && count($product['features']) > 0)
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Características Destacadas
                    </h3>
                    <ul class="grid grid-cols-1 gap-2">
                        @foreach($product['features'] as $feature)
                            <li class="flex items-center text-gray-700">
                                <span class="text-green-500 mr-2">✓</span>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Purchase Actions -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                    <div class="space-y-4">
                        <!-- Quantity Selector -->
                        <div class="flex items-center space-x-4">
                            <label class="text-sm font-medium text-gray-700">Cantidad:</label>
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button onclick="decreaseQuantity()" class="px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <input id="quantity" type="number" value="1" min="1" max="{{ $product['stock'] }}" class="w-16 text-center border-none focus:outline-none">
                                <button onclick="increaseQuantity()" class="px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </button>
                            </div>
                            <span class="text-sm text-gray-500">{{ $product['stock'] }} disponibles</span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button onclick="addToCart({{ $product['id'] }})" 
                                    class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold py-4 px-6 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5"></path>
                                </svg>
                                Agregar al Carrito
                            </button>
                            
                            <button class="bg-green-600 text-white font-bold py-4 px-6 rounded-xl hover:bg-green-700 transition-all duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Comprar Ahora
                            </button>
                            
                            <button onclick="toggleWishlist({{ $product['id'] }})" class="bg-gray-100 text-gray-700 p-4 rounded-xl hover:bg-gray-200 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Specifications -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m0-8v8m6-8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2m0-8v8M9 5a2 2 0 012-2h2a2 2 0 012 2v0M9 5a2 2 0 012 2v0"></path>
                </svg>
                Especificaciones Técnicas
            </h2>
            
            @if(isset($product['specifications']) && count($product['specifications']) > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($product['specifications'] as $spec => $value)
                        <div class="flex justify-between py-3 border-b border-gray-100 last:border-b-0">
                            <span class="font-medium text-gray-700">{{ $spec }}:</span>
                            <span class="text-gray-900">{{ $value }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Related Products -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Productos Relacionados</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Aquí puedes incluir productos relacionados -->
                @for($i = 1; $i <= 4; $i++)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="aspect-square bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=300&h=300&fit=crop" 
                                 alt="Producto relacionado" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 mb-2">Producto Relacionado {{ $i }}</h3>
                            <p class="text-gray-600 text-sm mb-2">{{ $product['brand'] }}</p>
                            <p class="text-lg font-bold text-gray-900">${{ number_format(rand(200, 800), 2) }}</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<script>
// Change main product image
function changeMainImage(imageSrc) {
    const mainImage = document.getElementById('main-image');
    mainImage.src = imageSrc;
    
    // Update thumbnail active state
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('border-blue-500');
        thumb.classList.add('border-transparent');
    });
    
    // Find and activate the clicked thumbnail
    const clickedThumb = Array.from(document.querySelectorAll('.thumbnail img'))
        .find(img => img.src === imageSrc);
    if (clickedThumb) {
        clickedThumb.parentElement.classList.add('border-blue-500');
        clickedThumb.parentElement.classList.remove('border-transparent');
    }
}

// Quantity controls
function increaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    const maxValue = parseInt(quantityInput.max);
    
    if (currentValue < maxValue) {
        quantityInput.value = currentValue + 1;
    }
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
}

// Add to cart functionality
function addToCart(productId) {
    const quantity = document.getElementById('quantity').value;
    
    // Simulamos agregar al carrito
    fetch(`/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        showNotification('¡Producto agregado al carrito!', 'success');
    })
    .catch(error => {
        showNotification('Error al agregar el producto', 'error');
    });
}

// Toggle wishlist
function toggleWishlist(productId) {
    showNotification('Agregado a favoritos', 'success');
}

// Show notification
function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg text-white ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } transform translate-x-full transition-transform duration-300`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Image zoom on hover (optional enhancement)
document.getElementById('main-image').addEventListener('mouseover', function() {
    this.style.cursor = 'zoom-in';
});
</script>

<style>
/* Custom animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.container > * {
    animation: fadeIn 0.6s ease-out;
}

/* Smooth transitions for all interactive elements */
button, .thumbnail {
    transition: all 0.2s ease-in-out;
}

/* Custom scrollbar for thumbnail gallery */
.overflow-x-auto::-webkit-scrollbar {
    height: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>
@endsection