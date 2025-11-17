@extends('admin.layout.app')

@section('title', 'Crear producto')
@section('header', 'Productos')

@section('content')
    <div class="card">
        <h2>Crear producto</h2>

        @if (session('status'))
            <div class="alert success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" class="admin-form">
            @csrf

            <div class="form-group">
                <label for="name">Nombre *</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="price">Precio *</label>
                    <input id="price" type="number" step="0.01" name="price" value="{{ old('price') }}" required>
                    @error('price')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Categoría *</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" data-type="category-option" @selected(old('category_id') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand_id">Marca *</label>
                    <select id="brand_id" name="brand_id" required>
                        <option value="">Selecciona una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" data-type="brand-option" @selected(old('brand_id') == $brand->id)>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-primary">Crear producto</button>
        </form>
    </div>
@endsection
