<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments')->orderBy('id', 'DESC')->paginate(10);
        $categories = Category::all();

        return view('pages.main.posts.index', compact('posts', 'categories'));
    }
}
