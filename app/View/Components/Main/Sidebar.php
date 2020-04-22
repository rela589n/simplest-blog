<?php

namespace App\View\Components\Main;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $categories;
    public $showCategories;

    public $recentComments;
    public $showRecentComments;

    /**
     * Create a new component instance.
     *
     * @param array $categories
     * @param bool $showCategories
     * @param array $recentComments
     * @param bool $showRecentComments
     */
    public function __construct($categories = [], $showCategories = true, $recentComments = [], $showRecentComments = true)
    {
        $this->categories = $categories;
        $this->showCategories = $showCategories;

        $this->recentComments = $recentComments;
        $this->showRecentComments = $showRecentComments;

        $this->handleCategories();
        $this->handleComments();
    }

    private function handleCategories()
    {
        if ($this->showCategories && empty($this->categories)) {
            $this->categories = Category::all(); // todo repository
        }
    }

    private function handleComments()
    {
        if ($this->showRecentComments && empty($this->recentComments)) {
            $this->recentComments = Comment::with('commentable')
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.main.sidebar');
    }
}
