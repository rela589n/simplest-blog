<?php

namespace App\Models;

use App\Lib\Traits\Attributes\DateReadable;
use App\Lib\Traits\Attributes\ExcerptBySubstring;
use App\Lib\Traits\Relationships\CountRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $uri_alias
 * @property string $image_path
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $excerpt
 * @property-read mixed $image_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUriAlias($value)
 * @mixin \Eloquent
 * @property-read mixed $comments_count_readable
 * @property-read mixed $date_readable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($slug)
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUserId($value)
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post byUser(\App\Models\User $user)
 */
class Post extends Model
{
    use CountRelations;
    use DateReadable;
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

    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset("storage/$this->image_path") : null;
    }

    public function getCommentsCountReadableAttribute()
    {
        return $this->comments_count.' '.Str::plural('comment', $this->comments_count);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getCommentsCountAttribute($count)
    {
        return $this->getRelationsCount('comments', $count);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}
