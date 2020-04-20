@if(count($comments) > 0)
    <ol class="comments first_level">
        @foreach($comments as $comment)
            <li>
                <x-comments.representations.full :comment="$comment"/>
            </li>
        @endforeach
    </ol>
@else
    <p>No comments yet. You can leave the first one!</p>
@endif
