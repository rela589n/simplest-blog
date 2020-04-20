@forelse($posts as $post)
    <x-posts.representations.excerpt :post="$post"
                                     :class="($loop->last) ? 'post_box_last' : ''" @endif/>
@empty
    <h3>Unfortunately, there are no posts for you..</h3>
@endforelse
