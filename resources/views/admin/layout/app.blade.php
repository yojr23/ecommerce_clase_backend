<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel de Administración')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="Panel Admin">
                <span>TechStore Admin</span>
            </div>
            <nav class="admin-nav">
                <a href="{{ route('admin.products.create') }}"
                    class="{{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                    Products
                </a>
                <a href="{{ route('admin.products.index') }}"
                    class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                    Listado
                </a>
            </nav>
        </aside>
        <main class="admin-main">
            <header class="admin-header">
                <h1>@yield('header', 'Administración')</h1>
            </header>
            <section class="admin-content">
                @yield('content')
            </section>
        </main>
    </div>
    <script src="{{ asset('assets/js/admin.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
