<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\StoreCommentRequest;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        return Comment::create($request->validated());
    }
}
