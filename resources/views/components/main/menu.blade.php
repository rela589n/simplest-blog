@section('main-menu')
    <div id="tooplate_menu">
        <ul>
            <li>
                <a href="{{ route('main.home') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('main.categories.index') }}"
                   class="@ifroute('categories') current @endifroute">Categories</a>
            </li>
            <li>
                <a href="{{ route('main.posts.index') }}" class="@ifroute('posts') current @endifroute">Posts</a>
            </li>
            <li>
                <a href="{{ route('dashboard.home') }}" class="last @ifroute('dashboard') current @endifroute">Dashboard</a>
            </li>
        </ul>
    </div>
@show
