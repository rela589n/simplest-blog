@props(['category'])
<div {{ $attributes->merge(['class' => 'post_box']) }}>
    <div class="date_box">
        <div class="date">{!! $category->date_readable !!}</div>
        <div class="post_comment">{{ $category->posts_count_readable }}</div>
    </div>

    <div class="post_box_right">
        <h2>{{ $category->name }}</h2>

        <p>{{ $category->excerpt }}</p>

        <a href="{{ route('main.categories.show', ['category' => $category->uri_alias]) }}" class="more float_r">View</a>
    </div>

    <div class="cleaner"></div>
</div>

