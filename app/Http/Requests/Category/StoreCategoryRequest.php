<?php

namespace App\Http\Requests\Category;

use App\Rules\Containers\CategoryRulesContainer;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param CategoryRulesContainer $rules
     * @return array
     */
    public function rules(CategoryRulesContainer $rules)
    {
        $rules = $rules->getRules();
        $rules['uri_alias'][] = 'unique:categories';

        return $rules;
    }
}
