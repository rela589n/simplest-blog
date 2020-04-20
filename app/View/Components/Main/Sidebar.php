<?php

namespace App\View\Components\Main;

use App\Models\Category;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $categories;
    public $recentComments;

    /**
     * Create a new component instance.
     *
     * @param $categories
     * @param array $recentComments
     */
    public function __construct($categories = [], $recentComments = [])
    {
        $this->categories = $categories;
        $this->recentComments = $recentComments;

        $this->handleCategories();
    }

    private function handleCategories()
    {
        if (empty($this->categories)) {
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
