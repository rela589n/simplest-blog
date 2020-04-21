@section('main-sidebar')
    <div id="tooplate_sidebar">
        <div class="sidbar_box">
            <a href="#"><img src="{{ asset('img/tooplate_250x250_ad.jpg') }}" alt="250x250 ad"/></a>
        </div>

        @if($showCategories && count($categories) > 0)
            <x-main.shallow.sidebar-box title="Categories">
                <ul class="tooplate_list">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('main.categories.show', ['category' => $category->uri_alias]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </x-main.shallow.sidebar-box>
        @endif

        @if($showRecentComments && count($recentComments) > 0)
            <x-main.shallow.sidebar-box title="Recent comments">
                @foreach($recentComments as $comment)
                    <div class="recent_comment_box @if($loop->last) last_recent_comment_box @endif">
                        <a href="{{ $comment->commentable_link }}">{{ $comment->commentable->name }}</a> {{-- todo link --}}
                        <p>{{ $comment->excerpt }}</p>
                    </div>
                @endforeach
            </x-main.shallow.sidebar-box>
        @endif

        <div class="cleaner"></div>
    </div>
@show

