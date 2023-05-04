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
                <tr class="my-5">
                    <th scope="row">1234</th>
                    <td>Some Name</td>
                    <td>Some description</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">Move to Rubbish Bin</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
