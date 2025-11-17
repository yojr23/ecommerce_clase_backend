@extends('admin.layout.app')

@section('title', 'Brands')
@section('header', 'Brands')

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">List Brands</h5>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Add new brand</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ optional($brand->created_at)->format('d/m/Y H:i') }}</td>
                                <td>{{ optional($brand->updated_at)->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar esta marca?');">
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
                                <td colspan="5" class="text-center">No hay marcas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $brands->links() }}
        </div>
    </div>
@endsection
