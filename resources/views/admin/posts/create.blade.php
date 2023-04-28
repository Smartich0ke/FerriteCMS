@extends('layouts.admin')
@section('content')

    <div class="m-5">
        <a href="{{ route('posts.index') }}" class="d-flex flex-row justify-content-start link btn btn-link align-items-start text-decoration-none p-0 mb-1">
            <iconify-icon icon="mdi:arrow-left" width="20" height="20"></iconify-icon>
            <h5 class=" text-decoration-none text-lg">All Posts</h5>
        </a>
        <h1>Create Post</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Post Category</label>
                <select class="form-select" id="category" name="category">
                    <option selected disabled>Select Category</option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Post Body</label>
                    <milkdowneditor-wrapper></milkdowneditor-wrapper>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
