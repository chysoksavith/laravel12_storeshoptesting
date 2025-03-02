@extends('admin.main')

@section('title', 'categories')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Categories</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
        </div>
        <div class="card">
            <div class="card-body">
                <ul class="list-group">
                    @forelse ($categories as $category)
                        @include('admin.category.category-tree', ['category' => $category])
                    @empty
                        <li class="list-group-item">No categories found</li>
                    @endforelse
                </ul>
            </div>
        </div>
</div>@endsection
