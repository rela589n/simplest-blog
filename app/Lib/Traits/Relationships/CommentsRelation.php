<?php


namespace App\Lib\Traits\Relationships;


use App\Models\Comment;

trait CommentsRelation
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getCommentsCountAttribute(&$count)
    {
        if ($count !== null) {
            return $count;
        }

        if ($this->relationLoaded('comments')) {
            $count = $this->comments->count();
        } else {
            $count = $this->comments()->count();
        }

        return $this->comments_count = $count;
    }
}
