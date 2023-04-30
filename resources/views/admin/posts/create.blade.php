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

                <div>
                    <banner-image-cropper></banner-image-cropper>
                </div>
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

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: fit-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crop Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <banner-image-cropper></banner-image-cropper>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
