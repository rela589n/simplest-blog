<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);

        return view('pages.dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.dashboard.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $attributes = $request->validated();
        $attributes['image_path'] = $attributes['image']->store('uploads', 'public');

        Post::create($attributes);

        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->back();
    }

}
