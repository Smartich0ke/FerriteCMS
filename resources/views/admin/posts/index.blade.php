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
                        <td>{{ fetchActiveUsersByUrl(parse_url( postURL($post) , PHP_URL_PATH), \Spatie\Analytics\Period::months(6)) }}</td>
                        <td>{{ $post->comments()->count() }}</td>
                        <td>{{ formatShortDate($post->created_at) }}</td>
                        <td>{{ formatShortDate($post->updated_at) }}</td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('admin.posts.edit', $post->slug) }}" class="d-inline btn btn-sm btn-outline-primary me-1">Edit</a>
                            @if($post->private)
                                <form class="d-inline me-1" action="{{ route('admin.posts.publish', $post) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-success">Public</button>
                                </form>
                            @else
                                <form class="d-inline me-1" action="{{ route('admin.posts.private', $post) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-warning">Private</button>
                                </form>
                            @endif
                            <form class="d-inline me-1" action="{{ route('admin.posts.private', $post) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
@endsection
