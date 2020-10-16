<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->withCount('comments')
            ->withCount('likes')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('pages.main.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('comments');
        $post->loadCount('likes');

        return view('pages.main.posts.show', compact('post'));
    }
}
