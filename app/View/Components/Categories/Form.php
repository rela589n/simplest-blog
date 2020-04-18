<?php

namespace App\View\Components\Categories;

use App\Models\Category;
use Illuminate\View\Component;

class Form extends Component
{
    public $submitButtonText;
    public $sendMethod;
    public $sendAction;
    public $submitSize;
    public $category;

    /**
     * Create a new component instance.
     *
     * @param string $submitButtonText
     * @param string $sendMethod
     * @param string $sendAction
     * @param int $submitSize
     * @param Category|null $category
     */
    public function __construct($submitButtonText, $sendMethod = 'POST', $sendAction = '', $submitSize = 12, $category = null)
    {
        $this->submitButtonText = $submitButtonText;
        $this->sendMethod = $sendMethod;
        $this->sendAction = $sendAction;
        $this->submitSize = $submitSize;
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.categories.form');
    }
}
