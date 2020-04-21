<?php

namespace App\View\Components\Main;

use App\Models\Category;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $categories;
    public $recentComments;
    public $showCategories;

    /**
     * Create a new component instance.
     *
     * @param array $categories
     * @param bool $showCategories
     * @param array $recentComments
     */
    public function __construct($categories = [], $showCategories = true, $recentComments = [])
    {
        $this->categories = $categories;
        $this->showCategories = $showCategories;
        $this->recentComments = $recentComments;

        $this->handleCategories();
    }

    private function handleCategories()
    {
        if (empty($this->categories) && $this->showCategories) {
            $this->categories = Category::all(); // todo repository
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
