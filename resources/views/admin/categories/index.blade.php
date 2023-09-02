@extends('layouts.admin')
@section('content')
    <div class="m-5">
        <h1>Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary ">Create Category</a>
        <div class="">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Name</th>
                    <th scope="col" >Description</th>
                    <th scope="col" >Created</th>

                    <th scope="col" >Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="my-5">
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ formatShortDate($category->created_at) }}</td>
                            <td>
{{--                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-primary">Edit</a>--}}
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $category->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="delete-modal-{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                All posts belonging to this category will be deleted. Are you sure you want to delete this category?
                                                <br>
                                                <span class="text-danger bold">This action cannot be undone!</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

    </div>
@endsection
