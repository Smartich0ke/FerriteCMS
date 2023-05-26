<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index() {
        $images = Image::all();
        return view('admin.images.index', compact('images'));
    }

    public function create() {
        return view('admin.images.create');
    }

    public function store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048',
            'alt_text' => 'required|string|max:125'
        ]);

        $imageName = uniqid().'.'.$request->image->extension();
        $imagePath = 'img/';
        $fullPath = $imagePath.$imageName;

        \Storage::disk('public')->put($fullPath, file_get_contents($request->image));

        $image = new Image();
        $image->image = $fullPath;
        $image->alt_text = $request->alt_text;
        $image->save();

        return back()
            ->with('success', 'Image added to gallery successfully.')
            ->with('image', $imageName);
    }


}
