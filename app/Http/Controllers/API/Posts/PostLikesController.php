<?php


namespace App\Http\Controllers\API\Posts;


use App\Exceptions\AlreadyLikedException;
use App\Http\Controllers\Controller;
use App\Like;
use App\Models\Post;
use App\Models\User;

final class PostLikesController extends Controller
{
    public function like(Post $post)
    {
        /** @var User $user */
        $user = \Auth::user();

        if ($post->likes()
            ->whereUserId($user->id)
            ->delete()) {
            return [
                'change' => -1,
            ];
        }

        $like = new Like();
        $like->user()->associate($user);
        $like->likeable()->associate($post);
        $like->save();

        return [
            'change' => +1,
        ];
    }
}
