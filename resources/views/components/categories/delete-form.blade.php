<form id="dashboard-category-delete-{{ $category->id }}"
      action="{{ route('dashboard.categories.destroy', $category) }}"
      method="post"
      style="display: none;">
    @csrf
    @method('DELETE')
</form>
