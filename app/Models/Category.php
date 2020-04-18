<?php

namespace App\Models;

use App\Lib\Traits\Relationships\CommentsRelation;
use App\Lib\Traits\TableNameAccessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use CommentsRelation;
    use TableNameAccessor;

    protected $fillable = ['name', 'description', 'uri_alias'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getExcerptAttribute()
    {
        return Str::words($this->description, 25);
    }
}
