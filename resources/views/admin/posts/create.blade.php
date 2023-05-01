@extends('layouts.admin')
@section('content')

    <div class="m-5">
        <a href="{{ route('admin.posts.index') }}" class="d-flex flex-row justify-content-start link btn btn-link align-items-start text-decoration-none p-0 mb-1">
            <iconify-icon icon="mdi:arrow-left" width="20" height="20"></iconify-icon>
            <h5 class=" text-decoration-none text-lg">All Posts</h5>
        </a>
        <h1>Create Post</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" placeholder="Post Title">
                @error('title') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Post Category</label>
                <select class="form-select @error('category') is-invalid @enderror " id="category" name="category">
                    <option selected disabled>Select Category</option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                </select>
                @error('category') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Post Excerpt</label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror " id="excerpt" name="excerpt" rows="3"></textarea>
                @error('excerpt') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label ">Post Body</label>
                    @error('body') <div class="text-danger">{{ $message }}</div> @enderror
                    <milkdowneditor-wrapper></milkdowneditor-wrapper>
            </div>
            <div class="mb-3">

                <div for="banner_image" class="form-label">Banner Image</div>
                    @error('banner_image') <div class="text-danger">{{ $message }}</div> @enderror
                    <banner-image-cropper ></banner-image-cropper>
            </div>

            <div class="form-check my-3">
                <input class="form-check-input" type="checkbox" name="make_private" value="" id="makePrivate">
                <label class="form-check-label" for="makePrivate">
                    Publish post on creation
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>

    </div>
@endsection
