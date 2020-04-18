<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryForm extends Component
{
    public $submitButtonText;
    public $sendMethod;
    public $sendAction;
    public $submitSize;

    /**
     * Create a new component instance.
     *
     * @param string $submitButtonText
     * @param string $sendMethod
     * @param string $sendAction
     * @param int $submitSize
     */
    public function __construct($submitButtonText = 'Create', $sendMethod = 'POST', $sendAction = '', $submitSize = 12)
    {
        $this->submitButtonText = $submitButtonText;
        $this->sendMethod = $sendMethod;
        $this->sendAction = $sendAction;
        $this->submitSize = $submitSize;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category-form');
    }
}
