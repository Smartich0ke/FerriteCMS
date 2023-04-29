@extends('layouts.admin')
@section('content')
  <div class="m-5">
    <h1>All Posts</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary ">Create Post</a>
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
                      <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                      <button class="btn btn-sm btn-outline-warning me-2">Make Private</button>
                      <button class="btn btn-sm btn-outline-danger">Move to Rubbish Bin</button>
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
                      <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                      <button class="btn btn-sm btn-outline-success me-2">Make Public</button>
                      <button class="btn btn-sm btn-outline-danger">Move to Rubbish Bin</button>
                  </td>
              </tr>
              </tbody>
          </table>
      </div>
  </div>
@endsection
