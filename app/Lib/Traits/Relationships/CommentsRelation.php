<?php


namespace App\Lib\Traits\Relationships;


use App\Models\Comment;

trait CommentsRelation
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
