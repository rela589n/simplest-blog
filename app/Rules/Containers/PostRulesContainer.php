<?php


namespace App\Rules\Containers;


use App\Models\Category;
use App\Rules\UriSlug;

class PostRulesContainer implements RulesContainerInterface
{
    public function getRules()
    {
        return [
            'name'        => 'required|min:4|max:120',
            'content'     => 'required|min:20|max:65530',
            'uri_alias'   => [
                'required',
                'min:4',
                'max:60',
                new UriSlug()
            ],
            'category_id' => [
                'required',
                'integer',
                'min:1',
                sprintf('exists:%s,id', Category::class)
            ],
            'image'       => [
                'file',
                'image',
                'max:2048'
            ]
        ];
    }
}
