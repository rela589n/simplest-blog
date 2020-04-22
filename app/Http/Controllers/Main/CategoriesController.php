<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();

        return view('pages.main.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::whereSlug($id)->firstOrFail();
        $posts = $category->posts()->paginate(5);

        return view('pages.main.categories.show', compact('category', 'posts'));
    }
}
