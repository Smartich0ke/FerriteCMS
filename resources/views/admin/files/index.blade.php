@extends('layouts.admin')
@section('content')
    <div class="m-5">
        <h1>File Uploads</h1>
        <div class="mb-4">
            <a href="{{ route('admin.files.create') }}" class="btn btn-primary">Upload new file</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Uploaded by</th>
                    <th scope="col">File name</th>
                    <th scope="col">URL</th>
                    <th scope="col">Created</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <th scope="row">{{ $file->id }}</th>
                        <td>{{ $file->user->name }}</td>
                        <td>{{ $file->original_name }}</td>
                        <td>
                            <div class="d-flex">
                            <div class="d-flex flex-row align-items-center">
                            <copy-to-clipboard text="{{ env('APP_URL') }}{{ Storage::url($file->path) }}"></copy-to-clipboard>
                                <input type="text" class="form-control mr-2" value="{{ env('APP_URL') }}{{ Storage::url($file->path) }}" readonly>
                            </div>
                                <a target="_blank" href="{{ route('files.download', $file->id) }}" class="btn btn-outline-success ms-1">Direct download</a>

                            </div>
                        </td>
                        <td>{{ formatShortDate($file->created_at) }}</td>
                        <td>
                            <form action="{{ route('admin.files.destroy', $file->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
