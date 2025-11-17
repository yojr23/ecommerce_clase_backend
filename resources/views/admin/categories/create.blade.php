@extends('admin.layout.app')

@section('title', 'Crear categoría')
@section('header', 'Categories')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-4">Add new category</h5>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">Name *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save category</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
