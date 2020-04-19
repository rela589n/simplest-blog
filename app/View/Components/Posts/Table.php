<?php

namespace App\View\Components\Posts;

use App\Models\Post;
use Illuminate\View\Component;

class Table extends Component
{
    public $posts;

    /**
     * Create a new component instance.
     *
     * @param Post[] $posts
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.posts.table');
    }
}
