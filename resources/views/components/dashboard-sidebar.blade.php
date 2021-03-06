<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="{{ route('dashboard.home') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main.home') }}">
                            <i class="fas fa-globe"></i> Go to site
                        </a>
                    </li>
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.home') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.posts.index') }}" data-toggle="collapse"
                           aria-expanded="false"
                           data-target="#submenu-2" aria-controls="submenu-2">
                            <i class="far fa-newspaper"></i>
                            Posts</a>
                        <div id="submenu-2" class="submenu collapse @ifroute('posts') show @endifroute">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link @ifroute('posts.index') active @endifroute"
                                       href="{{ route('dashboard.posts.index') }}">All posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @ifroute('posts.own') active @endifroute"
                                       href="{{ route('dashboard.posts.own') }}">Your posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  @ifroute('posts.create') active @endifroute"
                                       href="{{ route('dashboard.posts.create') }}">Add new</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.categories.index') }}" data-toggle="collapse"
                           aria-expanded="false"
                           data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-stream"></i>
                            Categories</a>
                        <div id="submenu-3" class="submenu collapse @ifroute('categories') show @endifroute">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link @ifroute('categories.index') active @endifroute"
                                       href="{{ route('dashboard.categories.index') }}">All categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @ifroute('categories.own') active @endifroute"
                                       href="{{ route('dashboard.categories.own') }}">Your categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @ifroute('categories.create') active @endifroute"
                                       href="{{ route('dashboard.categories.create') }}">Add new</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{__('Logout')}}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
