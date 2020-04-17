<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'content',
        'uri_alias',
        'image_path',
        'category_id'
    ];
}
