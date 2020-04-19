<form id="{{ $id }}"
      action="{{ $action }}"
      method="post"
      style="display: none;">
    @csrf
    @method('DELETE')
</form>
