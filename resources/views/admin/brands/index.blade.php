@extends('admin.main')

@section('title', 'brands')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Brands</h2>
            <a href="{{ route('brands.create') }}" class="btn btn-primary">Create Brand</a>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $index => $brand)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('brands.edit', $brand->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    {{-- <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No brands found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>@endsection
