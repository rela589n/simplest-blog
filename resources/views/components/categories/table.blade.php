<div class="table-responsive">
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
                <td><a href="">{{ $category->name }}</a></td>
                <td><p>{{ $category->excerpt }}</p></td>
                <td class="no-wrap">{{ $category->uri_alias }}</td>
                <td>{{ $category->posts_count }}</td>
                <td>
                    <a href="{{ route('dashboard.categories.edit', $category) }}"><i class="far fa-edit"></i></a>
                    <a href="{{ route('dashboard.categories.destroy', $category) }}"
                       onclick="event.preventDefault(); $('#dashboard-category-delete-{{$category->id}}').submit();">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <x-categories.delete-form :category="$category"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{ $categories->links() }}
