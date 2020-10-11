<div class="table-responsive fz-1">
    <table class="table mb-2">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                    <a href="{{ route('main.posts.show', ['post' => $post->uri_alias]) }}">
                        {{ $post->name }}
                    </a>
                </td>
                <td><p>{{ $post->excerpt }}</p></td>
                <td class="no-wrap">{{ $post->uri_alias }}</td>
                <td class="no-wrap">
                    @can('update', $post)
                        <a href="{{ route('dashboard.posts.edit', $post) }}"><i class="far fa-edit"></i></a>
                    @elsecan('view', $post)
                        <a href="{{ route('main.posts.show', ['post' => $post->uri_alias]) }}">
                            <i class="far fa-eye"></i>
                        </a>
                    @endcan

                    @can('delete', $post)
                        <a href="{{ route('dashboard.posts.destroy', $post) }}"
                           onclick="event.preventDefault(); $('#dashboard-post-delete-{{$post->id}}').submit();">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <x-delete-form
                            :id="'dashboard-post-delete-'. $post->id"
                            :action="route('dashboard.posts.destroy', $post)"/>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{ $posts->links() }}
