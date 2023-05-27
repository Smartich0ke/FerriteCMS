@extends('layouts.admin')
@section('content')

    <div class="m-5">
        <a href="{{ route('admin.images.index') }}" class="d-flex flex-row justify-content-start link btn btn-link align-items-start text-decoration-none p-0 mb-1">
            <iconify-icon icon="mdi:arrow-left" width="20" height="20"></iconify-icon>
            <h5 class=" text-decoration-none text-lg">All Images</h5>
        </a>
        <h1>Upload Image</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="altText" class="form-label">Alt Text</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror " id="altText" name="alt_text" placeholder="Brief description of the image">
                @error('alt_text') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="orientation" class="form-label">Orientation</label>
                <select class="form-select" aria-label="Default select example" name="orientation">
                    <option value="landscape">Landscape</option>
                    <option value="portrait">Portrait</option>
                    <option value="square" selected>Square</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror " id="image" name="image" placeholder="Post Title">
                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add To Gallery</button>
        </form>

    </div>
@endsection
