@forelse($posts as $post)
    <x-posts.representations.in-category :post="$post"
                                         :class="($loop->last) ? 'post_box_last' : ''"/>
@empty
    <h3>Unfortunately, there are no posts for you..</h3>
@endforelse
