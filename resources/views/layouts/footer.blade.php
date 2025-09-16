<!-- Footer -->
<footer class="bg-gray-900 text-white py-12 mt-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold">TechStore</span>
                </div>
                <p class="text-gray-400">
                    Tu destino para la mejor tecnología. Productos de calidad con la mejor atención al cliente.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Enlaces Rápidos</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Sobre Nosotros</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Productos</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Ofertas</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contacto</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Categorías</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Smartphones</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Laptops</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Audio</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Gaming</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>info@techstore.com</span>
                    </li>
                    <li class="flex items-center space-x-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>+57 300 123 4567</span>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-gray-800 my-8">
        
        <div class="text-center text-gray-400">
            <p>&copy; {{ date('Y') }} TechStore. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
