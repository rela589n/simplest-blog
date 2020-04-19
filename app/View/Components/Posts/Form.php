<?php

namespace App\View\Components\Posts;

use App\Models\Post;
use Illuminate\View\Component;

class Form extends Component
{
    public $post;
    public $submitButtonText;
    public $sendMethod;
    public $sendAction;
    public $submitSize;
    public $categories;

    /**
     * Create a new component instance.
     * @param $categories
     * @param string $submitButtonText
     * @param Post|null $post
     * @param string $sendMethod
     * @param string $sendAction
     * @param int $submitSize
     */
    public function __construct($categories,
                                string $submitButtonText,
                                $post = null,
                                string $sendMethod = 'POST',
                                string $sendAction = '',
                                int $submitSize = 12)
    {
        $this->post = $post;
        $this->categories = $categories;
        $this->submitButtonText = $submitButtonText;
        $this->sendMethod = $sendMethod;
        $this->sendAction = $sendAction;
        $this->submitSize = $submitSize;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('components.posts.form');
    }
}
