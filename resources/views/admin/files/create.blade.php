@extends('layouts.admin')
@section('content')
    <div class="m-5">
        <a href="{{ route('admin.categories.index') }}" class="d-flex flex-row justify-content-start link btn btn-link align-items-start text-decoration-none p-0 mb-1">
            <iconify-icon icon="mdi:arrow-left" width="20" height="20"></iconify-icon>
            <h5 class=" text-decoration-none text-lg">All Files</h5>
        </a>
        <h1>Upload file</h1>
        <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Upload file</label>
                <input type="file" class="form-control-file form-control @error('file') is-invalid @enderror " id="file" name="file" placeholder="upload file">
                @error('file') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Upload file</button>

        </form>
    </div>
@endsection
