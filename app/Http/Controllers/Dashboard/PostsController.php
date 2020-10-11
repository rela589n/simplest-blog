<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\UploadedFile;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);

        return view('pages.dashboard.posts.index', compact('posts'));
    }

    public function own()
    {
        $posts = Post
            ::byUser(\Auth::user())
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('pages.dashboard.posts.own', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.dashboard.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $attributes = $request->validated();
        $attributes['image_path'] = $this->storeImage($attributes['image']);

        Post::create($attributes);

        return redirect()->route('dashboard.posts.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('pages.dashboard.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request)
    {
        $attributes = $request->validated();

        if (isset($attributes['image'])) {
            $attributes['image_path'] = $this->storeImage($attributes['image']);
        }

        $post = $request->blogPost();
        $post->update($attributes);

        return redirect()->route('main.posts.show', ['post' => $post->uri_alias]);
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->back();
    }

    private function storeImage(UploadedFile $image)
    {
        return $image->store('uploads', 'public');
    }
}
