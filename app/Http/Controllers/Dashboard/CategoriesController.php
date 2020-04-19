<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->orderBy('id', 'DESC')->paginate(7);

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

    public function edit(Category $category)
    {
        return view('pages.dashboard.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request)
    {
        $category = $request->category();
        $category->update($request->validated());

        return redirect()->route('dashboard.categories.index');
    }
}
