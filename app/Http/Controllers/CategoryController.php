<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
            'slug' => 'required|unique:categories|max:150',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }
}
