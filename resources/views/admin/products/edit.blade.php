@extends('admin.main')

@section('title', 'product edit')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Edit Product</h2>
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
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- name --}}
                    <div class="form-group mt-3">
                        <label for="name">Product name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name',$product->name) }}">
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
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_id', $product->category_id == $cat->id) ? 'selected' : '' }}>
                                    {{ $cat->name }}
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
                        <label for="brand_id">Product brand</label>
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option value="">Select brand</option>
                            @foreach ($brand as $bran)
                                <option value="{{ $bran->id }}"
                                    {{ old('brand_id', $product->brand_id == $bran->id) ? 'selected' : '' }}>
                                    {{ $bran->name }}
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
                            value="{{ old('price', $product->price) }}">
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
                            value="{{ old('stock', $product->stock) }}">
                    </div>
                    @error('stock')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- image --}}
                    <div class="form-group mt-3">
                        <label for="image">Product image</label>

                        <!-- Check if there's an old image or existing image -->
                        @if ($product->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="img-thumbnail"
                                    width="150">
                            </div>
                        @endif

                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    {{-- desc --}}
                    <div class="form-group mt-3">
                        <label for="stock">Product description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3">{{ old('description', $product->description) }}</textarea>
                    </div>

                    {{-- active --}}
                    <div class="form-group mt-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
                                {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
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
