<?php

namespace App\Models;

use App\Lib\Traits\Attributes\DateReadable;
use App\Lib\Traits\Attributes\ExcerptBySubstring;
use App\Lib\Traits\Relationships\CountRelations;
use App\Lib\Traits\TableNameAccessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $uri_alias
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $excerpt
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUriAlias($value)
 * @mixin \Eloquent
 * @property-read mixed $date_readable
 * @property-read mixed $posts_count_readable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($slug)
 */
class Category extends Model
{
    use CountRelations;
    use TableNameAccessor;

    use DateReadable;
    use ExcerptBySubstring;

    protected $excerptAttribute = 'description';

    protected $fillable = ['name', 'description', 'uri_alias'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getCommentsCountAttribute($count)
    {
        return $this->getRelationsCount('comments', $count);
    }

    public function getPostsCountAttribute($count)
    {
        return $this->getRelationsCount('posts', $count);
    }

    public function getPostsCountReadableAttribute()
    {
        return $this->posts_count . ' ' . Str::plural('post', $this->posts_count);
    }
}
