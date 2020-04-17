<?php

namespace App\Models;

use App\Lib\Traits\Relationships\CommentsRelation;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CommentsRelation;

    protected $fillable = ['name', 'description', 'uri_alias'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
