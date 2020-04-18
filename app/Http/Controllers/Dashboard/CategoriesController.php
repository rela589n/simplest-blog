<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('pages.dashboard.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        dd($request->all());
    }
}
