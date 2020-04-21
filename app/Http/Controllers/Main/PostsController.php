<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments')->with('category')->orderBy('id', 'DESC')->paginate(10);

        return view('pages.main.posts.index', compact('posts'));
    }

    public function show(Request $request)
    {
        $post = Post::whereSlug($request->route('post'))->with('comments')->firstOrFail();

        return view('pages.main.posts.show', compact('post'));
    }
}
