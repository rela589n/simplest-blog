@props(['post'])
<div {{ $attributes->merge(['class' => 'post_box']) }}>
    <div class="date_box">
        <div class="date">{!! $post->date_readable !!}</div>
        <div class="post_comment">{{ $post->comments_count_readable }}</div>
    </div>

    <div class="post_box_right">
        <h2>{{ $post->name }}</h2>

        @section('post-meta')
            <div class="post_meta">
                <a href="{{ route('main.categories.show', ['category' => $post->category->uri_alias]) }}">{{ $post->category->name }}</a>
            </div>
        @show

        <img src="{{ $post->image_url }}" alt="Image"/>

        @yield('post-content')

        @yield('post-additions')
    </div>

    <div class="cleaner"></div>
    <div>
        <a href="#"
           onclick="handleLike(event,'{{ csrf_token() }}', '{{route('api.posts.like', $post->id)}}', '#likes_count_{{$post->id}}')">
            <i class="far fa-thumbs-up"></i></a>:
        <span id="likes_count_{{$post->id}}">{{ $post->likes_count }}</span>
    </div>
    <script defer src="{{ asset('js/like-post.js') }}"></script>
</div>

