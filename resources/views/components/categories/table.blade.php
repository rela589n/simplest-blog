<div class="table-responsive fz-1">
    <table class="table mb-2">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Slug</th>
            <th scope="col">Posts</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>
                    <a href="{{ route('main.categories.show', ['category' => $category->uri_alias]) }}">
                        {{ $category->name }}
                    </a>
                </td>
                <td><p>{{ $category->excerpt }}</p></td>
                <td class="no-wrap">{{ $category->uri_alias }}</td>
                <td>{{ $category->posts_count }}</td>
                <td class="no-wrap">
                    <a href="{{ route('dashboard.categories.edit', $category) }}"><i class="far fa-edit"></i></a>
                    <a href="{{ route('dashboard.categories.destroy', $category) }}"
                       onclick="event.preventDefault(); $('#dashboard-category-delete-{{$category->id}}').submit();">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <x-delete-form
                        :id="'dashboard-category-delete-'. $category->id"
                        :action="route('dashboard.categories.destroy', $category)"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{ $categories->links() }}
