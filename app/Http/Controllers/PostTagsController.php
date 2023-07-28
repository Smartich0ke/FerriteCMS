<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Replace 'Post' with the name of your model
use Spatie\Tags\Tag;

class PostTagsController extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $validatedData = $request->validate([
            'tag' => 'required|string',
        ]);

        $post->attachTag($validatedData['tag']);

        return response()->json(['message' => 'Tag added successfully'], 200);
    }

    public function destroy(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $validatedData = $request->validate([
            'tag' => 'required|string',
        ]);

        $post->detachTag($validatedData['tag']);

        return response()->json(['message' => 'Tag removed successfully'], 200);
    }

    public function index($postId)
    {
        $post = Post::findOrFail($postId);

        $tags = $post->tags->pluck('name');

        return response()->json($tags, 200);
    }

    public function showIndex()
    {
        //show all post tags to public
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function show(Request $request, $tag)
    {
        $filter = $request->query('filter');

        $query = Post::withAnyTags([$tag])->where('private', false);

        if ($filter) {
            if ($filter == 'newest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($filter == 'oldest') {
                $query->orderBy('created_at', 'asc');
            } elseif ($filter == 'alphabetical') {
                $query->orderBy('title', 'asc');
            } elseif ($filter == 'reverse-alphabetical') {
                $query->orderBy('title', 'desc');
            } else {
                $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $posts = $query->paginate(5);

        return view('tags.show', compact('posts', 'filter', 'request', 'tag'));
    }

}
