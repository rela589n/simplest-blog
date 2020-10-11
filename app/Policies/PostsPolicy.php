<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function view(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        return $user->isAdmin()
            || $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function delete(User $user, Post $post)
    {
        return $user->isAdmin()
            || $post->user_id === $user->id;
    }

}
