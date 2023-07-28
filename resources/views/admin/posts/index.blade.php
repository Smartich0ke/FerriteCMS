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
                @foreach($posts as $post)
                    <tr class="my-5">
                        <th scope="row"><a class="text-dark" href="{{ postURL($post) }}">{{ $post->title }}</a></th>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>100</td>
                        <td>{{ $post->comments()->count() }}</td>
                        <td>{{ formatShortDate($post->created_at) }}</td>
                        <td>{{ formatShortDate($post->updated_at) }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            @if($post->private)
                                <form class="d-inline me-2" action="{{ route('admin.posts.publish', $post) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-success">Make Public</button>
                                </form>
                            @else
                                <form class="d-inline me-2" action="{{ route('admin.posts.private', $post) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-warning">Make Private</button>
                                </form>
                            @endif
                            <button class="btn btn-sm btn-outline-danger">Move to Rubbish Bin</button>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
@endsection
