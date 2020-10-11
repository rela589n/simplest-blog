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
        $this->authorize('viewAny', Post::class);

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
        $this->authorize('create', Post::class);

        $categories = Category::all();

        return view('pages.dashboard.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $this->authorize('create', Post::class);

        $attributes = $request->validated();
        $attributes['image_path'] = $this->storeImage($attributes['image']);

        Post::create($attributes);

        return redirect()->route('dashboard.posts.index');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();

        return view('pages.dashboard.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request)
    {
        $post = $request->blogPost();
        $attributes = $request->validated();

        $this->authorize('update', $post);

        if (isset($attributes['image'])) {
            $attributes['image_path'] = $this->storeImage($attributes['image']);
        }

        $post->update($attributes);

        return redirect()->route('main.posts.show', ['post' => $post->uri_alias]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->back();
    }

    private function storeImage(UploadedFile $image)
    {
        return $image->store('uploads', 'public');
    }
}
