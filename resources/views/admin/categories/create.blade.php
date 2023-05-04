@extends('layouts.admin')
@section('content')
    <div class="m-5">
        <a href="{{ route('admin.categories.index') }}" class="d-flex flex-row justify-content-start link btn btn-link align-items-start text-decoration-none p-0 mb-1">
            <iconify-icon icon="mdi:arrow-left" width="20" height="20"></iconify-icon>
            <h5 class=" text-decoration-none text-lg">All Categories</h5>
        </a>
        <h1>Create Category</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" placeholder="Category Name">
                @error('title') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Category Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror " id="description" name="description" rows="3"></textarea>
                @error('excerpt') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection
