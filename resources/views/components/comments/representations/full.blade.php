<div class="comment_box commentbox1">
    <div class="gravatar">
        <img src="{{ asset('img/avator.png') }}" alt="author"/>
    </div>

    <div class="comment_text">
        <div class="comment_author">
            {{ $comment->author_name }} {!! $comment->date_readable !!}
        </div>
        <p>{{ $comment->content }}</p>
    </div>
    <div class="cleaner"></div>
</div>
