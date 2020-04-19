<?php

namespace App\Models;

use App\Lib\Traits\Attributes\ExcerptBySubstring;
use App\Lib\Traits\Relationships\CommentsRelation;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use CommentsRelation;
    use ExcerptBySubstring;

    protected $excerptAttribute = 'content';

    protected $fillable = [
        'name',
        'content',
        'uri_alias',
        'image_path',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
