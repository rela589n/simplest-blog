@forelse($categories as $category)
    <x-categories.representations.excerpt :category="$category"
                                       :class="($loop->last) ? 'post_box_last' : ''"/>
@empty
    <h3>Unfortunately, there are no categories yet..</h3>
@endforelse
