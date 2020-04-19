@forelse($posts as $post)
    <div class="post_box @if($loop->last) post_box_last @endif">
        <div class="date_box">
            <div class="date">{!! $post->date_readable !!}</div>
            <div class="post_comment">{{ $post->comments_count_readable }}</div>
        </div>

        <div class="post_box_right">
            <h2>{{ $post->name }}</h2>
            <div class="post_meta">
                <a href="{{ route('main.categories.show', ['category' => $post->category->uri_alias]) }}">{{ $post->category->name }}</a>
            </div>
            <img src="{{ $post->image_url }}" alt="Image"/>
            <p>{{ $post->excerpt }}</p>
            <a href="{{ route('main.posts.show', ['post' => $post->uri_alias]) }}" class="more float_r">Continue Reading</a>
        </div>

        <div class="cleaner"></div>
    </div>
@empty
    <h3>Unfortunately, there are no posts for you..</h3>
@endforelse
