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
        $this->authorize('viewAny', Category::class);

        $categories = Category::withCount('posts')->orderBy('id', 'DESC')->paginate(7);

        return view('pages.dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);

        return view('pages.dashboard.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        Category::create($request->validated());

        return redirect()->route('dashboard.categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $this->authorize('delete', $category);

        $category->delete();

        return redirect()->route('dashboard.categories.index');
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('pages.dashboard.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request)
    {
        $category = $request->category();

        $this->authorize('update', $category);

        $category->update($request->validated());

        return redirect()->route('dashboard.categories.index');
    }
}
