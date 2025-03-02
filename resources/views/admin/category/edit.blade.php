@extends('admin.main')

@section('title', 'category create')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Edit Category {{ $category->name }}</h2>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Back Category</a>

        </div>
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- name --}}
                    <div class="form-group mt-3">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $category->name) }}">
                    </div>
                    {{-- parent category --}}
                    <div class="form-group mt-3">
                        <label for="parent_id">Parent Category</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">No Parent (Top Level)</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- desc --}}
                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
                    </div>
                    {{-- active --}}
                    <div class="form-group mt-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
                                {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>
            </div>
            <div class="d-flex justify-content-end mt-4 gap-3">
                <button type="submit" class="btn btn-success">Update Category</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>

            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
