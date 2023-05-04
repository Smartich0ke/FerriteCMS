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
                                <button class="btn btn-sm btn-outline-danger">Move to Rubbish Bin</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
