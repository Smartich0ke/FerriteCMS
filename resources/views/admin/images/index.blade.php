@extends('layouts.admin')
@section('content')
    <div class="m-5">
        <h1>All Images</h1>
        <a href="{{ route('images.create') }}" class="btn btn-primary">New Image</a>
        <div class="">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Alt Text</th>
                    <th scope="col" >Created</th>
                    <th scope="col" >Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($images as $image)
                        <tr class="my-5">
                            <th scope="row">{{ $image->id }}</th>
                            <td>{{ $image->alt_text }}</td>
                            <td>{{ formatShortDate($image->created_at) }}</td>
                            <td>
                                <a class="btn btn-sm btn-outline-primary me-1" target="_blank" href="{{ Storage::url($image->image) }}">View</a>
                                <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                <form class="d-inline" action="{{ route('images.destroy', $image->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete Permanently" class="btn btn-sm btn-outline-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
