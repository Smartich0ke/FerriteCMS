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

    public function showIndex() {
        //show all post tags to public
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function show(Request $request, $tag) {
        //show all posts with a specific tag to public. Include sorting options
        $posts = Post::withAnyTags([$tag])->get();
        $filter = null;
        if ($request->query('filter')) {
            $filter = $request->query('filter');
            if ($filter == 'newest') {
                $posts = Post::withAnyTags([$tag])->orderBy('created_at', 'desc')->paginate(5);
            } elseif ($filter == 'oldest') {
                $posts = Post::withAnyTags([$tag])->orderBy('created_at', 'asc')->paginate(5);
            } elseif ($filter == 'alphabetical') {
                $posts = Post::withAnyTags([$tag])->orderBy('title', 'asc')->paginate(5);
            } elseif ($filter == 'reverse-alphabetical') {
                $posts = Post::withAnyTags([$tag])->orderBy('title', 'desc')->paginate(5);
            } else {
                $posts = Post::withAnyTags([$tag])->orderBy('created_at', 'desc')->paginate(5);
            }
        } else {
            $posts = Post::withAnyTags([$tag])->orderBy('created_at', 'desc')->paginate(5);
        }

        return view('tags.show', compact('posts', 'filter', 'request', 'tag'));
    }
}

