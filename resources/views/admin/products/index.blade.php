@extends('admin.layout.app')

@section('title', 'Productos')
@section('header', 'Listado de productos')

@section('content')
    <div class="card">
        <div class="table-header">
            <h2>Productos recientes</h2>
            <a href="{{ route('admin.products.create') }}" class="btn-primary small">Crear nuevo</a>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Creado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ optional($product->category)->name ?? '—' }}</td>
                            <td>{{ optional($product->brand)->name ?? '—' }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay productos registrados aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $products->links() }}
    </div>
@endsection
