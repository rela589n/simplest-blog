<?php

namespace App\Rules\Containers;

use App\Rules\UriSlug;

class CategoryRulesContainer implements RulesContainerInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function getRules()
    {
        return [
            'name'        => 'required|min:4|max:120',
            'description' => 'required|min:20|max:65530',
            'uri_alias'   => [
                'required',
                'min:4',
                'max:60',
                new UriSlug()
            ],
        ];
    }
}
