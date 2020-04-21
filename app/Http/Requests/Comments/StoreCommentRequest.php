<?php

namespace App\Http\Requests\Comments;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
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
                'max:200'
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
