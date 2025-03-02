<li class="list-group-item">
    {{ $category->name }} {{ $category->is_active ? '' : '(Inactive)' }}
    <div class="float-right">
        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-primary">Edit</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"
                onclick="return confirm('Are you sure you want to delete this category and all its subcategories?')">
                Delete
            </button>
        </form>
    </div>

    @if ($category->children->count() > 0)
        <ul class="list-group mt-2">
            @foreach ($category->children as $child)
                @include('admin.category.category-tree', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
