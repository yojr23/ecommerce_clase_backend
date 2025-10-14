<!-- Navbar -->
<nav class="bg-white shadow-lg border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <a href="{{ url('/') }}" class="flex items-center space-x-2 hover:opacity-80 transition-opacity">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        TechStore
                    </span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Inicio</a>
                <a href="{{ url('/products') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Productos</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Categorías</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Contacto</a>
            </div>

            <!-- Cart & User Actions -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <button class="p-2 text-gray-600 hover:text-blue-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                
                <!-- Cart -->
                <button class="relative p-2 text-gray-600 hover:text-blue-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5"></path>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </button>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-600 hover:text-blue-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <div class="flex flex-col space-y-2">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 font-medium py-2 transition-colors">Inicio</a>
                <a href="{{ url('/products') }}" class="text-gray-600 hover:text-blue-600 font-medium py-2 transition-colors">Productos</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium py-2 transition-colors">Categorías</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium py-2 transition-colors">Contacto</a>
            </div>
        </div>
    </div>
</nav>
