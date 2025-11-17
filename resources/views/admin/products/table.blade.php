@extends('admin.layout.app')

@section('title', 'Products')
@section('header', 'Products')

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">List Products</h5>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add new product</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>
                                    <div>{{ optional($product->category)->name ?? 'Sin categoría' }}</div>
                                    <small class="text-muted">ID: {{ $product->category_id }}</small>
                                </td>
                                <td>
                                    <div>{{ optional($product->brand)->name ?? 'Sin marca' }}</div>
                                    <small class="text-muted">ID: {{ $product->brand_id }}</small>
                                </td>
                                <td>{{ optional($product->created_at)->format('d/m/Y H:i') }}</td>
                                <td>{{ optional($product->updated_at)->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No hay productos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $products->links() }}
        </div>
    </div>
@endsection
