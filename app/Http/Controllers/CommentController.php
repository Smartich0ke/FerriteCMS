<?php

namespace App\Http\Controllers;

use App\Models\CommentLike;
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
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required',
            'parent_id' => 'nullable|exists:comments,id',
            'post_id' => 'required|exists:posts,id'
        ]);

        $comment = new Comment();
        $comment->author = $request->name;
        $comment->email = $request->email;
        $comment->text = $request->text;
        $comment->parent_id = $request->parent_id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return back();
    }

    public function like($id)
    {
        $existing_like = CommentLike::where('comment_id', $id)->where('ip_address', request()->ip())->first();
        if($existing_like){
            $existing_like->delete();
            return response()->json([
                'success' => true,
                'liked' => false,
                'likes' => $existing_like->comment->likes()->count(),
                'message' => 'Comment unliked successfully'
            ]);
        }
        else{
            $comment= new CommentLike();
            $comment->comment_id = $id;
            $comment->ip_address = request()->ip();
            $comment->save();
            return response()->json([
                'success' => true,
                'liked' => true,
                'likes' => $comment->comment->likes()->count(),
                'message' => 'Comment liked successfully'
            ]);
        }

    }

    public function likes($id)
    {
        $comment = Comment::find($id);
        $likes = $comment->likes()->count();
        return response()->json([
            'success' => 'true',
            'likes' => $likes
        ]);
    }
}
