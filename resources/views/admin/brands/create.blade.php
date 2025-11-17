@extends('admin.layout.app')

@section('title', 'Crear marca')
@section('header', 'Brands')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-4">Add new brand</h5>
            <form action="{{ route('admin.brands.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">Name *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save brand</button>
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
