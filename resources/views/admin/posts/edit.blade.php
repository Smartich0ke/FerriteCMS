@extends('layouts.admin')
@section('content')

    <div class="m-5">
        <a href="{{ route('admin.posts.index') }}" class="d-flex flex-row justify-content-start link btn btn-link align-items-start text-decoration-none p-0 mb-1">
            <iconify-icon icon="mdi:arrow-left" width="20" height="20"></iconify-icon>
            <h5 class=" text-decoration-none text-lg">All Posts</h5>
        </a>
        <h1>Edit Post "{{ $post->title }}"</h1>
        <form action="{{ route('admin.posts.update', $post->slug) }}" method="POST" >
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{ $post->title }}" placeholder="Post Title">
                @error('title') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Post Category</label>
                <select class="form-select @error('category') is-invalid @enderror " id="category" name="category">
                    <option disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($post->category->id == $category->id) selected @endif >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="">Tags</label>
                <live-tags-input item-id="{{ $post->id }}" ></live-tags-input>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Post Excerpt</label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror " id="excerpt" name="excerpt" rows="3">{{ $post->excerpt }}</textarea>
                @error('excerpt') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label ">Post Body</label>
                @error('body') <div class="text-danger">{{ $message }}</div> @enderror
                <milkdowneditor-wrapper :postbody='{{ json_encode($post->body) }}' ></milkdowneditor-wrapper>
            </div>
            <div class="mb-3">

                <div for="banner_image" class="form-label">Banner Image</div>
                @error('banner_image') <div class="text-danger">{{ $message }}</div> @enderror
                <banner-image-cropper ></banner-image-cropper>
            </div>

            <div class="mb-3">
                <label for="banner_colour" class="form-label">Banner Colour</label>
                <input type="color" class="form-control @error('banner_colour') is-invalid @enderror " style="width: 5rem;" id="banner_colour" value="{{ $post->banner_colour }}" name="banner_colour" placeholder="Post Title">
                @error('banner_colour') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-check my-3">
                <input class="form-check-input" type="checkbox" name="make_private" value="" id="makePrivate" @if(!$post->private) checked @endif>
                <label class="form-check-label" for="makePrivate">
                    Publish post on creation
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>

    </div>
@endsection
@section('post-app')

<script>
    window.addEventListener("DOMContentLoaded", (event) => {
        document.getElementById('mdOutput').innerHTML = `{{ $post->body }}`;
    });
</script>
@endsection
