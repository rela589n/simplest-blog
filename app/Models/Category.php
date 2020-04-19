<?php

namespace App\Models;

use App\Lib\Traits\Attributes\ExcerptBySubstring;
use App\Lib\Traits\Relationships\CommentsRelation;
use App\Lib\Traits\TableNameAccessor;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CommentsRelation;
    use TableNameAccessor;
    use ExcerptBySubstring;

    protected $excerptAttribute = 'description';

    protected $fillable = ['name', 'description', 'uri_alias'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
