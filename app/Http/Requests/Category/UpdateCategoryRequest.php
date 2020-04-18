<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use App\Rules\Containers\CategoryRulesContainer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function categoryId()
    {
        return $this->route('category');
    }

    public function category()
    {
        $id = $this->categoryId();

        return Category::findOrFail($id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param CategoryRulesContainer $rules
     * @return array
     */
    public function rules(CategoryRulesContainer $rules)
    {
        $rules = $rules->getRules();
        $rules['uri_alias'][] = Rule::unique('categories')
            ->ignore($this->categoryId());

        return $rules;
    }
}
