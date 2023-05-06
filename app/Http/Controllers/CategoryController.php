<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function adminIndex() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Request $request, $slug) {
        //return all posts that belong to this category with filter var
        $filter = null;
        if ($request->query('filter')) {
            $filter = $request->query('filter');
            if ($filter == 'newest') {
                $posts = Category::where('slug', $slug)->first()->posts()->where('private', false)->orderBy('created_at', 'desc')->paginate(5);
            } elseif ($filter == 'oldest') {
                $posts = Category::where('slug', $slug)->first()->posts()->where('private', false)->orderBy('created_at', 'asc')->paginate(5);
            } elseif ($filter == 'alphabetical') {
                $posts = Category::where('slug', $slug)->first()->posts()->where('private', false)->orderBy('title', 'asc')->paginate(5);
            } elseif ($filter == 'reverse-alphabetical') {
                $posts = Category::where('slug', $slug)->first()->posts()->where('private', false)->orderBy('title', 'desc')->paginate(5);
            } else {
                $posts = Category::where('slug', $slug)->first()->posts()->where('private', false)->orderBy('created_at', 'desc')->paginate(5);
            }
        } else {
            $posts = Category::where('slug', $slug)->first()->posts()->where('private', false)->orderBy('created_at', 'desc')->paginate(5);
        }
        $category = Category::where('slug', $slug)->first();
        return view('categories.show', compact('posts', 'filter', 'category', 'request'));

    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories|max:50',
            'description' => 'required|unique:categories|max:150',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->image = $request->image;

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }
}
