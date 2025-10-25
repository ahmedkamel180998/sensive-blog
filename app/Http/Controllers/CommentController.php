<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        if (Comment::create($validated)) {
            return back()->with('storeCommentSuccess', 'Your comment was sent successfully');
        }
        return back()->with('storeCommentFail', 'Failed to send comment. Please try again.');
    }
}
