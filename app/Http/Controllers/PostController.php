<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request) {
        //If a get query for "filter" is set, sort by newest, oldest, a-z, z-a
        $filter = null;
        if ($request->query('filter')) {
            $filter = $request->query('filter');
            if ($filter == 'newest') {
                $posts = Post::where('private', false)->orderBy('created_at', 'desc')->paginate(5);
            } elseif ($filter == 'oldest') {
                $posts = Post::where('private', false)->orderBy('created_at', 'asc')->paginate(5);
            } elseif ($filter == 'alphabetical') {
                $posts = Post::where('private', false)->orderBy('title', 'asc')->paginate(5);
            } elseif ($filter == 'reverse-alphabetical') {
                $posts = Post::where('private', false)->orderBy('title', 'desc')->paginate(5);
            } else {
                $posts = Post::where('private', false)->orderBy('created_at', 'desc')->paginate(5);
            }
        } else {
            $posts = Post::where('private', false)->orderBy('created_at', 'desc')->paginate(5);
        }
        return view('posts.index', compact('posts', 'filter', 'request'));
    }

    public function adminIndex() {
        $posts = Post::paginate('5')->sortBy(['created_at', 'desc']);
        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function makePrivate($id) {
        $post = Post::findOrFail($id);
        $post->private = true;
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    public function makePublic($id) {
        $post = Post::findOrFail($id);
        $post->private = false;
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create' , compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
//            'category' => 'required',
//          'tags' => 'required',
            'image' => 'required',
            'banner_colour' => 'required',
            'body' => 'required|min:10',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->category()->associate($request->category);
//      $post->tags = $request->tags;
        $post->user()->associate(auth()->user());
        $post->banner_colour = $request->banner_colour;
        $post->image = $request->image;
        $post->body = $request->body;
        $post->slug = Str::of($request->title)->slug('-');
        if ($request->make_private == 'on') {
            $post->private = true;
        } else {
            $post->private = false;
        }

        $post->save();

        $post->attachTags($request->tags);

        return redirect()->route('posts.index');
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->get()->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function uploadBannerImage(Request $request) {
        //image is sent as a file

        $imageName = uniqid().'.'.'webp';
        $imagePath = 'img/';
        $fullPath = $imagePath.$imageName;

        Storage::disk('public')->put($fullPath, file_get_contents($request->file));

        return response()->json([
            'success'=>'Image Uploaded Successfully',
            'path'=>$fullPath,
        ]);
    }
}
