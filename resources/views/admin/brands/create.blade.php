@extends('admin.main')

@section('title', 'brand create')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Create Brand</h2>
            <a href="{{ route('brands.index') }}" class="btn btn-primary">Back brand</a>

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
                <form action="{{ route('brands.store') }}" method="POST">
                    @csrf
                    {{-- name --}}
                    <div class="form-group mt-3">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
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
