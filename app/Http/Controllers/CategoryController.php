<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
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
