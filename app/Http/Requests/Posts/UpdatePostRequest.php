<?php

namespace App\Http\Requests\Posts;

use App\Models\Post;
use App\Rules\Containers\PostRulesContainer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function blogPostId()
    {
        return $this->route('post');
    }

    public function blogPost()
    {
        $id = $this->blogPostId();

        return Post::findOrFail($id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param PostRulesContainer $rules
     * @return array
     */
    public function rules(PostRulesContainer $rules)
    {
        $rules = $rules->getRules();

        $rules['image'][] = 'sometimes';
        $rules['uri_alias'][] = Rule::unique(Post::tableName())
            ->ignore($this->blogPostId());

        return $rules;
    }
}
