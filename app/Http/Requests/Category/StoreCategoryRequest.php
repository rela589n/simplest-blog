<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use App\Rules\Containers\CategoryRulesContainer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $rules['uri_alias'][] = Rule::unique('categories');

        return $rules;
    }
}
