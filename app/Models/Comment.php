<?php

namespace App\Models;

use App\Lib\Traits\Attributes\ExcerptBySubstring;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $author_name
 * @property string $content
 * @property string $commentable_type
 * @property int $commentable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $commentable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereAuthorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $date_readable
 * @property-read mixed $author_image_url
 * @property-read mixed $commentable_link
 * @property-read mixed $excerpt
 */
class Comment extends Model
{
    use ExcerptBySubstring;
    private $excerptAttribute = 'content';
    private $excerptSize = 7;

    protected $fillable = ['author_name', 'content', 'commentable_type', 'commentable_id'];
    protected $appends = ['date_readable', 'author_image_url'];

    /**
     * Get the owning commentable model.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function getDateReadableAttribute()
    {
        return sprintf('<span class="date">%s</span><span class="time">%s</span>',
            $this->created_at->format('M jS, Y'),
            $this->created_at->format('h:i a')
        );
    }

    public function getAuthorImageUrlAttribute()
    {
        return asset('img/avator.png');
    }

    public function getCommentableLinkAttribute()
    {
        $plural = Str::plural($this->commentable_type);

        return route("main.${plural}.show", [$this->commentable_type => $this->commentable->uri_alias]);
    }
}
