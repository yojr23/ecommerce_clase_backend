@extends('layouts.app')

@section('title', 'Crear Producto - TechStore')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-12">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">
                ✨ Agregar Nuevo Producto
            </h1>
            <p class="text-gray-600">Completa la información del producto tecnológico</p>
        </div>

        <!-- Form Card -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Información del Producto
                    </h2>
                </div>

                <!-- Form Body -->
                <form action="/products" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Nombre del Producto -->
                            <div class="form-group">
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    📱 Nombre del Producto *
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('name') border-red-500 @enderror"
                                       placeholder="Ej: iPhone 15 Pro Max"
                                       required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Precio -->
                            <div class="form-group">
                                <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                                    💰 Precio (USD) *
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500 font-semibold">$</span>
                                    <input type="number" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price') }}"
                                           step="0.01"
                                           min="0"
                                           class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('price') border-red-500 @enderror"
                                           placeholder="1299.99"
                                           required>
                                </div>
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Categoría -->
                            <div class="form-group">
                                <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                                    📂 Categoría *
                                </label>
                                <select id="category" 
                                        name="category" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('category') border-red-500 @enderror"
                                        required>
                                    <option value="">Selecciona una categoría</option>
                                    <option value="smartphones" {{ old('category') == 'smartphones' ? 'selected' : '' }}>📱 Smartphones</option>
                                    <option value="laptops" {{ old('category') == 'laptops' ? 'selected' : '' }}>💻 Laptops</option>
                                    <option value="tablets" {{ old('category') == 'tablets' ? 'selected' : '' }}>📲 Tablets</option>
                                    <option value="audio" {{ old('category') == 'audio' ? 'selected' : '' }}>🎧 Audio</option>
                                    <option value="gaming" {{ old('category') == 'gaming' ? 'selected' : '' }}>🎮 Gaming</option>
                                    <option value="smartwatches" {{ old('category') == 'smartwatches' ? 'selected' : '' }}>⌚ Smartwatches</option>
                                    <option value="accessories" {{ old('category') == 'accessories' ? 'selected' : '' }}>🔌 Accesorios</option>
                                </select>
                                @error('category')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Marca -->
                            <div class="form-group">
                                <label for="brand" class="block text-sm font-semibold text-gray-700 mb-2">
                                    🏷️ Marca *
                                </label>
                                <select id="brand" 
                                        name="brand" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('brand') border-red-500 @enderror"
                                        required>
                                    <option value="">Selecciona una marca</option>
                                    <option value="Apple" {{ old('brand') == 'Apple' ? 'selected' : '' }}>🍎 Apple</option>
                                    <option value="Samsung" {{ old('brand') == 'Samsung' ? 'selected' : '' }}>📱 Samsung</option>
                                    <option value="Sony" {{ old('brand') == 'Sony' ? 'selected' : '' }}>🎮 Sony</option>
                                    <option value="Dell" {{ old('brand') == 'Dell' ? 'selected' : '' }}>💻 Dell</option>
                                    <option value="HP" {{ old('brand') == 'HP' ? 'selected' : '' }}>🖥️ HP</option>
                                    <option value="Lenovo" {{ old('brand') == 'Lenovo' ? 'selected' : '' }}>💼 Lenovo</option>
                                    <option value="Microsoft" {{ old('brand') == 'Microsoft' ? 'selected' : '' }}>🪟 Microsoft</option>
                                    <option value="Google" {{ old('brand') == 'Google' ? 'selected' : '' }}>🔍 Google</option>
                                    <option value="Nintendo" {{ old('brand') == 'Nintendo' ? 'selected' : '' }}>🎮 Nintendo</option>
                                    <option value="Otra" {{ old('brand') == 'Otra' ? 'selected' : '' }}>❓ Otra</option>
                                </select>
                                @error('brand')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Imagen del Producto -->
                            <div class="form-group">
                                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                                    🖼️ Imagen del Producto
                                </label>
                                
                                <!-- Upload Area -->
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-500 transition-colors duration-200 @error('image') border-red-500 @enderror">
                                    <div id="upload-area" class="cursor-pointer">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="text-sm text-gray-600 mb-2">
                                            <span class="font-semibold text-blue-600">Click para subir</span> o arrastra la imagen aquí
                                        </p>
                                        <p class="text-xs text-gray-500">PNG, JPG, JPEG hasta 2MB</p>
                                    </div>
                                    
                                    <input type="file" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*"
                                           class="hidden"
                                           onchange="previewImage(event)">
                                    
                                    <!-- Preview -->
                                    <div id="image-preview" class="hidden mt-4">
                                        <img id="preview-img" src="" alt="Preview" class="mx-auto max-w-full h-48 object-cover rounded-lg shadow-md">
                                        <button type="button" onclick="removeImage()" class="mt-2 text-red-600 text-sm hover:text-red-800">
                                            ❌ Remover imagen
                                        </button>
                                    </div>
                                </div>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- URL de Imagen Alternativa -->
                            <div class="form-group">
                                <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">
                                    🔗 O URL de Imagen
                                </label>
                                <input type="url" 
                                       id="image_url" 
                                       name="image_url" 
                                       value="{{ old('image_url') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('image_url') border-red-500 @enderror"
                                       placeholder="https://ejemplo.com/imagen.jpg">
                                <p class="mt-1 text-xs text-gray-500">Si proporcionas una URL, se usará en lugar de la imagen subida</p>
                                @error('image_url')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Descripción (Full Width) -->
                    <div class="mt-8">
                        <div class="form-group">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                📝 Descripción del Producto *
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none @error('description') border-red-500 @enderror"
                                      placeholder="Describe las características principales del producto, especificaciones técnicas, y beneficios para el usuario..."
                                      required>{{ old('description') }}</textarea>
                            <div class="flex justify-between mt-1">
                                @error('description')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @else
                                    <p class="text-xs text-gray-500">Mínimo 20 caracteres</p>
                                @enderror
                                <span id="char-count" class="text-xs text-gray-400">0 caracteres</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-200">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold py-4 px-8 rounded-xl hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Crear Producto
                        </button>
                        
                        <a href="/products" 
                           class="flex-1 sm:flex-initial bg-gray-100 text-gray-700 font-semibold py-4 px-8 rounded-xl hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 text-center flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Animaciones personalizadas */
.form-group {
    animation: fadeInUp 0.6s ease-out;
}

.form-group:nth-child(1) { animation-delay: 0.1s; }
.form-group:nth-child(2) { animation-delay: 0.2s; }
.form-group:nth-child(3) { animation-delay: 0.3s; }
.form-group:nth-child(4) { animation-delay: 0.4s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Efectos de hover mejorados */
.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    transform: translateY(-1px);
}

/* Upload area hover effect */
#upload-area:hover {
    background-color: rgba(59, 130, 246, 0.05);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for description
    const description = document.getElementById('description');
    const charCount = document.getElementById('char-count');
    
    description.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count + ' caracteres';
        
        if (count < 20) {
            charCount.classList.add('text-red-400');
            charCount.classList.remove('text-gray-400', 'text-green-400');
        } else if (count > 500) {
            charCount.classList.add('text-red-400');
            charCount.classList.remove('text-gray-400', 'text-green-400');
        } else {
            charCount.classList.add('text-green-400');
            charCount.classList.remove('text-gray-400', 'text-red-400');
        }
    });
    
    // Upload area click handler
    document.getElementById('upload-area').addEventListener('click', function() {
        document.getElementById('image').click();
    });
    
    // Drag and drop functionality
    const uploadArea = document.getElementById('upload-area');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });
    
    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });
    
    uploadArea.addEventListener('drop', handleDrop, false);
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    function highlight(e) {
        uploadArea.classList.add('border-blue-500', 'bg-blue-50');
    }
    
    function unhighlight(e) {
        uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
    }
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        if (files.length > 0) {
            document.getElementById('image').files = files;
            previewImage({ target: { files: files } });
        }
    }
});

// Image preview function
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    const uploadArea = document.getElementById('upload-area');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
            uploadArea.querySelector('div').classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
}

// Remove image function
function removeImage() {
    const preview = document.getElementById('image-preview');
    const uploadArea = document.getElementById('upload-area');
    const fileInput = document.getElementById('image');
    
    preview.classList.add('hidden');
    uploadArea.querySelector('div').classList.remove('hidden');
    fileInput.value = '';
}
</script>
@endsection