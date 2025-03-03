@extends('admin.main')

@section('title', 'product create')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Create Product</h2>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back product</a>

        </div>
        <div class="card">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- name --}}
                    <div class="form-group mt-3">
                        <label for="name">Product name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- category --}}
                    <div class="form-group mt-3">
                        <label for="category_id">Product category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- brand --}}
                    <div class="form-group mt-3">
                        <label for="brand_id">Product category</label>
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option value="">Select category</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- price --}}
                    <div class="form-group mt-3">
                        <label for="price">Product price</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ old('price') }}">
                    </div>
                    @error('price')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- stock --}}
                    <div class="form-group mt-3">
                        <label for="stock">Product stock</label>
                        <input type="number" name="stock" id="stock" class="form-control"
                            value="{{ old('stock') }}">
                    </div>
                    @error('stock')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- image --}}
                    <div class="form-group mt-3">
                        <label for="image">Product image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    {{-- desc --}}
                    <div class="form-group mt-3">
                        <label for="stock">Product description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3">{{ old('description') }}</textarea>
                    </div>

                    {{-- active --}}
                    <div class="form-group mt-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
                                {{ old('is_active', 1) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>
            </div>
            <div class="d-flex justify-content-end mt-4 gap-3">
                <button type="submit" class="btn btn-success">Save Brand</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>

            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
