<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->paginate(7);

        return view('pages.dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.dashboard.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('dashboard.categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->route('dashboard.categories.index');
    }

}