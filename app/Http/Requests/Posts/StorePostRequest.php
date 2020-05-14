<?php

namespace App\Http\Requests\Posts;

use App\Models\Post;
use App\Rules\Containers\PostRulesContainer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param PostRulesContainer $rules
     * @return array
     */
    public function rules(PostRulesContainer $rules)
    {
        $rules = $rules->getRules();
        $rules['uri_alias'][] = Rule::unique('posts');
        $rules['image'][] = 'required';

        return $rules;
    }
}
