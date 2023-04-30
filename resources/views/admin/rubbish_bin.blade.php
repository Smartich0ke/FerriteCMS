@extends('layouts.admin')
@section('content')
    <div class="m-5">
        <h1>Rubbish Bin</h1>

        <h2>Posts</h2>
        <!-- Posts -->
        <div class="">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col" >Post</th>
                    <th scope="col" >Slug</th>
                    <th scope="col" >Author</th>
                    <th scope="col" >Views</th>
                    <th scope="col" >Comments</th>
                    <th scope="col" >Created</th>
                    <th scope="col" >Updated</th>
                    <th scope="col" >Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="my-5">
                    <th scope="row">Post Title</th>
                    <td>post-title</td>
                    <td>Author Name</td>
                    <td>100</td>
                    <td>50</td>
                    <td>2021-01-01</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">Delete Permanently</button>
                    </td>
                </tr>
                <tr class="my-5">
                    <th scope="row">Post Title</th>
                    <td>post-title</td>
                    <td>Author Name</td>
                    <td>100</td>
                    <td>50</td>
                    <td>2021-01-01</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">Delete Permanently</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2>Comments</h2>
        <div class="">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Author</th>
                    <th scope="col" >Text</th>
                    <th scope="col" >Post</th>
                    <th scope="col" >Likes</th>
                    <th scope="col" >Created</th>

                    <th scope="col" >Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="my-5">
                    <th scope="row">1234</th>
                    <td>Some Name</td>
                    <td>this is a pretty good comment i like the way its formatted and everything.</td>
                    <td>Some Post</td>
                    <td>50</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">Delete Permanently</button>
                    </td>
                </tr>
                <tr class="my-5">
                    <th scope="row">1234</th>
                    <td>Some Name</td>
                    <td>this is a pretty good comment i like the way its formatted and everything.</td>
                    <td>Some Post</td>
                    <td>50</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">Delete Permanently</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
