<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = \App\Models\File::all();
        return view('admin.files.index',
            [
                'files' => $files
            ]
        );
    }

    public function create()
    {
        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2000000'
        ]);

        $requestFile = $request->file('file');

        $file = new \App\Models\File();
        $user = Auth()->user();

        $fileName = uniqid(). '.' .File::extension($requestFile->getClientOriginalName());
        $filePath = 'resources/';
        $fullPath = $filePath.$fileName;

        $file->original_name = $requestFile->getClientOriginalName();
        $file->extension = $requestFile->getClientOriginalExtension();
        $file->mime_type = $requestFile->getClientMimeType();
        $file->size = $requestFile->getSize();
        $file->path = $fullPath;

        Storage::disk('public')->put($fullPath, file_get_contents($requestFile));

        $user->files()->save($file);

        return redirect()->route('admin.files.index');
    }

    public function download($id)
    {
        $file = \App\Models\File::find($id);
        return Storage::disk('public')->download($file->path, $file->original_name);
    }

    public function destroy($id)
    {
        $file = \App\Models\File::find($id);
        Storage::disk('public')->delete($file->path);
        $file->delete();
        return redirect()->route('admin.files.index');
    }
}
