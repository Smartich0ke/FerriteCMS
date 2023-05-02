<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    public function create()
    {
        return view('admin.posts.create');
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
//        $post->category = $request->category;
//      $post->tags = $request->tags;
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

        return redirect()->route('posts.index');
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->firstOrFail();
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
