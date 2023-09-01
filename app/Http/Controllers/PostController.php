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
        $filter = $request->query('filter');

        $query = Post::where('private', false);

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

        return view('posts.index', compact('posts', 'filter', 'request'));
    }


    public function adminIndex() {
        $posts = Post::paginate('20')->sortBy(['created_at', 'desc']);
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

    public function search() {
        //Search in the title, excerpt, then body. Prioritize the title, then excerpt, then body, with title being at the top, then excerpt, then body.
        return view('posts.search', [
        'posts' => Post::where(
            'title', 'LIKE', '%' . request('query') . '%'
        )->orWhere(
            'excerpt', 'LIKE', '%' . request('query') . '%'
        )->orWhere(
            'body', 'LIKE', '%' . request('query') . '%'
        )->get(),
        
        'search' => request('query'),
        ]);
    }

    public function update(Request $request, $slug) {

        $post = Post::where('slug', $slug)->get()->firstOrFail();
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'category' => 'required',
//          'tags' => 'required',
            'image' => 'nullable',
            'banner_colour' => 'required',
            'body' => 'required|min:10',
        ]);

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->category()->associate($request->category);
//      $post->tags = $request->tags;
        $post->banner_colour = $request->banner_colour;
        $post->body = $request->body;
        $post->slug = Str::of($request->title)->slug('-');
        if ($request->make_private == 'on') {
            $post->private = true;
        } else {
            $post->private = false;
        }
        if ($request->image) {
            $post->image = $request->image;
        }
        $post->save();

        return redirect()->route('admin.posts.index');
    }

    public function edit($slug) {
        $post = Post::where('slug', $slug)->get()->firstOrFail();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
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
        if ($post->private && !auth()->check()) {
            //return 404
            abort(404);
        }
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
