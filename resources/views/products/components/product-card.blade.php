{{-- resources/views/products/components/product-card.blade.php --}}

<div class="product-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <!-- Imagen del producto -->
    <div class="relative overflow-hidden h-48 bg-gray-50">
        <img src="{{ $product['image'] }}" 
             alt="{{ $product['name'] }}" 
             class="product-image w-full h-full object-cover">
        
        <!-- Badge de categoría -->
        <div class="absolute top-3 left-3">
            <span class="bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded-full">
                {{ $product['category'] }}
            </span>
        </div>

        <!-- Badge de marca -->
        <div class="absolute top-3 right-3">
            <span class="bg-gray-900 text-white text-xs font-semibold px-2 py-1 rounded-full">
                {{ $product['brand'] }}
            </span>
        </div>

        <!-- Overlay con botones en hover -->
        <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center opacity-0 hover:opacity-100">
            <div class="flex space-x-2">
                <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition-colors shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>
                <button class="bg-white text-red-500 p-2 rounded-full hover:bg-gray-100 transition-colors shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Contenido de la tarjeta -->
    <div class="p-5">
        <!-- Nombre del producto -->
        <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2">
            <a href="/products/{{ $product['id'] }}" class="hover:text-blue-600 transition-colors">
                {{ $product['name'] }}
            </a>
        </h3>

        <!-- Descripción -->
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            {{ $product['description'] }}
        </p>

        <!-- Info del producto -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-2">
                <span class="text-xs text-gray-500">Marca:</span>
                <span class="text-xs font-semibold text-gray-700">{{ $product['brand'] }}</span>
            </div>
            <div class="flex items-center">
                <div class="flex text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <span class="text-xs text-gray-500 ml-1">(4.8)</span>
            </div>
        </div>

        <!-- Precio y botones -->
        <div class="flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-2xl font-bold text-gray-900">
                    ${{ number_format($product['price'], 2) }}
                </span>
                @if(isset($product['original_price']))
                    <span class="text-sm text-gray-500 line-through">
                        ${{ number_format($product['original_price'], 2) }}
                    </span>
                @endif
            </div>

            <div class="flex space-x-2">
                <!-- Botón agregar al carrito -->
                <button onclick="addToCart({{ $product['id'] }})" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 text-sm font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 2.5M7 13l2.5 2.5m6-8V3a2 2 0 10-4 0v2"></path>
                    </svg>
                    <span class="hidden sm:inline">Agregar</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Badge de descuento (condicional) -->
    @if(isset($product['discount']) && $product['discount'] > 0)
        <div class="absolute top-0 left-0 bg-red-500 text-white text-xs font-bold px-2 py-1 transform -rotate-45 -translate-x-6 translate-y-4">
            -{{ $product['discount'] }}%
        </div>
    @endif
</div>

<script>
function addToCart(productId) {
    // Aquí puedes agregar la lógica para añadir al carrito
    // Por ejemplo, una llamada AJAX a tu controlador Laravel
    
    fetch(`/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            quantity: 1
        })
    })
    .then(response => response.json())
    .then(data => {
        // Mostrar notificación de éxito
        showNotification('Producto agregado al carrito', 'success');
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error al agregar el producto', 'error');
    });
}

function showNotification(message, type) {
    // Crear elemento de notificación
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-4 py-2 rounded-lg text-white ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    }`;
    notification.textContent = message;
    
    // Agregar al DOM
    document.body.appendChild(notification);
    
    // Remover después de 3 segundos
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>