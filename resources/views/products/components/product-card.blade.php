{{-- resources/views/products/components/product-card.blade.php --}}

@php
    $categoryName = optional($product->category)->name ?? 'Sin categoría';
    $brandName = optional($product->brand)->name ?? 'Sin marca';
    $description = $product->description ?? 'Sin descripción disponible';
    $price = $product->price ?? 0;
    $originalPrice = $product->original_price;
    $imageUrl = asset('assets/img/product-placeholder.svg');
@endphp

<div class="product-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <div class="relative overflow-hidden h-48 bg-gray-50">
        <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="product-image w-full h-full object-cover">

        <div class="absolute top-3 left-3">
            <span class="bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded-full">
                {{ $categoryName }}
            </span>
        </div>

        <div class="absolute top-3 right-3">
            <span class="bg-gray-900 text-white text-xs font-semibold px-2 py-1 rounded-full">
                {{ $brandName }}
            </span>
        </div>
    </div>

    <div class="p-5">
        <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2">
            <a href="{{ route('products.detail', $product->id) }}" class="hover:text-blue-600 transition-colors">
                {{ $product->name }}
            </a>
        </h3>

        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            {{ \Illuminate\Support\Str::limit($description, 120) }}
        </p>

        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-2">
                <span class="text-xs text-gray-500">Marca:</span>
                <span class="text-xs font-semibold text-gray-700">{{ $brandName }}</span>
            </div>
            <div class="flex items-center">
                <div class="flex text-yellow-400">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <span class="text-xs text-gray-500 ml-1">(4.8)</span>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-2xl font-bold text-gray-900">
                    ${{ number_format($price, 2) }}
                </span>
                @if (!empty($originalPrice))
                    <span class="text-sm text-gray-500 line-through">
                        ${{ number_format($originalPrice, 2) }}
                    </span>
                @endif
            </div>

            <div class="flex space-x-2">
                <button onclick="addToCart({{ $product->id }})"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 text-sm font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 2.5M7 13l2.5 2.5m6-8V3a2 2 0 10-4 0v2"></path>
                    </svg>
                    <span class="hidden sm:inline">Agregar</span>
                </button>
            </div>
        </div>
    </div>
</div>
