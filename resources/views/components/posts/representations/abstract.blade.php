@props(['post'])
<div {{ $attributes->merge(['class' => 'post_box']) }}>
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

        @yield('post-content')

        @yield('post-additions')
    </div>

    <div class="cleaner"></div>
</div>

