<ol class="comments first_level">
    @forelse($comments as $comment)
        <li>
            <x-comments.representations.full :comment="$comment"/>
        </li>
    @empty
        <li class="no-comments">
            <p>No comments yet. You can leave the first one!</p>
        </li>
    @endforelse
</ol>
