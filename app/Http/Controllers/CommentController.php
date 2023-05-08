<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $comments = $post->comments()->whereNull('parent_id')->with('replies')->get();
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'author' => 'required',
            'email' => 'required|email',
            'text' => 'required',
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::create($request->all());
        return response()->json($comment, 201);
    }

    public function like($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->increment('likes');
        return response()->json($comment);
    }
}
