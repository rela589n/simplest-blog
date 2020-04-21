<?php

namespace App\Http\Requests\Comments;

use App\Rules\AuthorName;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCommentRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'author_name' => Str::title(
                preg_replace('/\s+/', ' ', $this->author_name)
            ),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author_name'      => [
                'required',
                'string',
                'min:5',
                'max:200',
                new AuthorName()
            ],
            'content'          => [
                'required',
                'string',
                'min:5',
                'max:65000'
            ],
            'commentable_type' => [
                'required',
                'string',
                'in:post,category'
            ],
            'commentable_id'   => [
                'required',
                'integer',
                'min:1',
                sprintf('exists:%s,id', Relation::$morphMap[$this->input('commentable_type')])
            ]
        ];
    }
}
