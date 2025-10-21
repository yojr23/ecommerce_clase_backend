<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'TechStore - E-commerce')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,500,600,700" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Bootstrap CSS (para componentes auth) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Configuración de Tailwind personalizada */
        @layer utilities {
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        }

        /* Estilos personalizados para navbar y footer */
        .navbar-custom {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        }

        .footer-custom {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }

        /* Animaciones suaves */
        .transition-transform {
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }

        /* Dropdown del usuario */
        .user-dropdown {
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .user-dropdown.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Estilos para auth */
        .auth-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }

        .auth-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .auth-card-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .auth-card-body {
            padding: 2.5rem;
            background-color: white;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(30, 58, 138, 0.3);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    <div id="app" class="flex flex-col min-h-screen">
        <!-- Navbar Mejorado con diseño de CLASS -->
        <nav class="navbar-custom sticky top-0 z-50 shadow-lg">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between py-4">
                    <!-- Logo y Marca -->
                    <a class="flex items-center gap-3 text-white text-2xl font-bold hover:opacity-90 transition-opacity" href="{{ url('/') }}">
                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-shopping-bag text-white text-xl"></i>
                        </div>
                        <span class="hidden sm:inline">TechStore</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden text-white text-2xl" type="button" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center space-x-8">
                        <!-- Navigation Links -->
                        <a class="text-white hover:text-yellow-400 transition-colors font-medium flex items-center gap-2" href="{{ url('/') }}">
                            <i class="fas fa-home"></i>
                            <span>Inicio</span>
                        </a>
                        <a class="text-white hover:text-yellow-400 transition-colors font-medium flex items-center gap-2" href="{{ url('/products') }}">
                            <i class="fas fa-box"></i>
                            <span>Productos</span>
                        </a>
                        <a class="text-white hover:text-yellow-400 transition-colors font-medium flex items-center gap-2" href="#">
                            <i class="fas fa-tag"></i>
                            <span>Ofertas</span>
                        </a>

                        <!-- Auth Links -->
                        @guest
                            @if (Route::has('login'))
                                <a class="text-white border-2 border-white px-6 py-2 rounded-lg hover:bg-white hover:text-blue-900 transition-all font-semibold flex items-center gap-2" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Iniciar Sesión</span>
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-6 py-2 rounded-lg hover:from-yellow-500 hover:to-orange-600 transition-all font-semibold flex items-center gap-2 shadow-lg" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Registrarse</span>
                                </a>
                            @endif
                        @else
                            <a class="text-white hover:text-yellow-400 relative transition-colors" href="#">
                                <i class="fas fa-shopping-cart text-xl"></i>
                                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">0</span>
                            </a>
                            
                            <div class="relative">
                                <button onclick="toggleUserDropdown()" class="flex items-center space-x-2 text-white hover:text-yellow-400 transition-colors">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center font-bold text-white shadow-lg">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <span class="font-medium">{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down text-sm"></i>
                                </button>

                                <div id="user-dropdown" class="user-dropdown absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 z-50">
                                    <a class="block px-4 py-3 text-gray-800 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-colors flex items-center gap-3" href="#">
                                        <i class="fas fa-user text-blue-600"></i>
                                        <span>Mi Perfil</span>
                                    </a>
                                    <a class="block px-4 py-3 text-gray-800 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-colors flex items-center gap-3" href="#">
                                        <i class="fas fa-shopping-bag text-blue-600"></i>
                                        <span>Mis Pedidos</span>
                                    </a>
                                    <a class="block px-4 py-3 text-gray-800 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-colors flex items-center gap-3" href="#">
                                        <i class="fas fa-heart text-blue-600"></i>
                                        <span>Lista de Deseos</span>
                                    </a>
                                    <div class="border-t border-gray-200 my-2"></div>
                                    <a class="block px-4 py-3 text-red-600 hover:bg-red-50 transition-colors flex items-center gap-3" 
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Cerrar Sesión</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden lg:hidden pb-4">
                    <div class="flex flex-col space-y-3">
                        <a class="text-white hover:text-yellow-400 py-2 flex items-center gap-2" href="{{ url('/') }}">
                            <i class="fas fa-home"></i>
                            <span>Inicio</span>
                        </a>
                        <a class="text-white hover:text-yellow-400 py-2 flex items-center gap-2" href="{{ url('/products') }}">
                            <i class="fas fa-box"></i>
                            <span>Productos</span>
                        </a>
                        <a class="text-white hover:text-yellow-400 py-2 flex items-center gap-2" href="#">
                            <i class="fas fa-tag"></i>
                            <span>Ofertas</span>
                        </a>
                        
                        @guest
                            @if (Route::has('login'))
                                <a class="text-white hover:text-yellow-400 py-2 flex items-center gap-2" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Iniciar Sesión</span>
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a class="text-white hover:text-yellow-400 py-2 flex items-center gap-2" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Registrarse</span>
                                </a>
                            @endif
                        @else
                            <a class="text-white hover:text-yellow-400 py-2 flex items-center gap-2" href="#">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Carrito</span>
                            </a>
                            <a class="text-white hover:text-yellow-400 py-2 flex items-center gap-2" href="#">
                                <i class="fas fa-user"></i>
                                <span>Mi Perfil</span>
                            </a>
                            <a class="text-white hover:text-yellow-400 py-2 flex items-center gap-2" 
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Cerrar Sesión</span>
                            </a>
                            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer Mejorado con diseño de CLASS -->
        <footer class="footer-custom mt-auto">
            <div class="container mx-auto px-4 py-12">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Sobre Nosotros -->
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-shopping-bag text-white text-xl"></i>
                            </div>
                            <h5 class="text-yellow-400 font-bold text-lg">TechStore</h5>
                        </div>
                        <p class="text-gray-300 leading-relaxed mb-4 text-sm">
                            Tu tienda en línea de confianza. Ofrecemos los mejores productos tecnológicos con la mejor calidad y servicio excepcional.
                        </p>
                        <div class="flex space-x-3">
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-gradient-to-r hover:from-yellow-400 hover:to-orange-500 flex items-center justify-center text-white transition-all duration-300 hover:scale-110">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-gradient-to-r hover:from-yellow-400 hover:to-orange-500 flex items-center justify-center text-white transition-all duration-300 hover:scale-110">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-gradient-to-r hover:from-yellow-400 hover:to-orange-500 flex items-center justify-center text-white transition-all duration-300 hover:scale-110">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-gradient-to-r hover:from-yellow-400 hover:to-orange-500 flex items-center justify-center text-white transition-all duration-300 hover:scale-110">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Enlaces Rápidos -->
                    <div>
                        <h5 class="text-yellow-400 font-bold text-lg mb-4">Enlaces Rápidos</h5>
                        <ul class="space-y-2">
                            <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Inicio</a></li>
                            <li><a href="{{ url('/products') }}" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Productos</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Ofertas</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Novedades</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Blog</a></li>
                        </ul>
                    </div>

                    <!-- Servicio al Cliente -->
                    <div>
                        <h5 class="text-yellow-400 font-bold text-lg mb-4">Servicio al Cliente</h5>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Mi Cuenta</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Seguir Pedido</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Devoluciones</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Preguntas Frecuentes</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i>Contáctanos</a></li>
                        </ul>
                    </div>

                    <!-- Contacto -->
                    <div>
                        <h5 class="text-yellow-400 font-bold text-lg mb-4">Contacto</h5>
                        <ul class="space-y-3">
                            <li class="text-gray-300 flex items-start gap-2 text-sm">
                                <i class="fas fa-map-marker-alt text-yellow-400 mt-1"></i>
                                <span>Calle Principal #123, Ciudad</span>
                            </li>
                            <li>
                                <a href="tel:+573001234567" class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center gap-2 text-sm">
                                    <i class="fas fa-phone text-yellow-400"></i>
                                    <span>+57 300 123 4567</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@techstore.com" class="text-gray-300 hover:text-yellow-400 transition-colors flex items-center gap-2 text-sm">
                                    <i class="fas fa-envelope text-yellow-400"></i>
                                    <span>info@techstore.com</span>
                                </a>
                            </li>
                            <li class="text-gray-300 flex items-start gap-2 text-sm">
                                <i class="fas fa-clock text-yellow-400 mt-1"></i>
                                <span>Lun - Sáb: 9:00 AM - 6:00 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Métodos de Pago -->
                <div class="border-t border-gray-700 mt-8 pt-8">
                    <div class="flex flex-wrap justify-center gap-4 mb-6">
                        <span class="bg-white text-gray-800 px-4 py-2 rounded-lg font-semibold text-sm shadow-lg hover:scale-105 transition-transform">
                            <i class="fab fa-cc-visa text-blue-600"></i> VISA
                        </span>
                        <span class="bg-white text-gray-800 px-4 py-2 rounded-lg font-semibold text-sm shadow-lg hover:scale-105 transition-transform">
                            <i class="fab fa-cc-mastercard text-red-600"></i> Mastercard
                        </span>
                        <span class="bg-white text-gray-800 px-4 py-2 rounded-lg font-semibold text-sm shadow-lg hover:scale-105 transition-transform">
                            <i class="fab fa-cc-paypal text-blue-600"></i> PayPal
                        </span>
                        <span class="bg-white text-gray-800 px-4 py-2 rounded-lg font-semibold text-sm shadow-lg hover:scale-105 transition-transform">
                            <i class="fas fa-money-bill-wave text-green-600"></i> Efectivo
                        </span>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-700 pt-6 text-center text-gray-400 text-sm">
                    <p>&copy; {{ date('Y') }} TechStore. Todos los derechos reservados.</p>
                    <p class="mt-2">
                        <a href="#" class="hover:text-yellow-400 transition-colors mx-3">Términos y Condiciones</a>
                        |
                        <a href="#" class="hover:text-yellow-400 transition-colors mx-3">Política de Privacidad</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        }

        function toggleUserDropdown() {
            const dropdown = document.getElementById('user-dropdown');
            dropdown.classList.toggle('active');
        }

        // Cerrar dropdown al hacer click fuera
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('user-dropdown');
            const button = event.target.closest('button[onclick="toggleUserDropdown()"]');
            
            if (dropdown && !dropdown.contains(event.target) && !button) {
                dropdown.classList.remove('active');
            }
        });
    </script>
</body>
</html>
