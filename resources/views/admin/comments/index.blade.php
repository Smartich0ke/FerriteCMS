@extends('layouts.admin')
@section('content')
    <div class="m-5">
        <h1>Comments</h1>
        <!-- Posts -->
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
                @foreach($comments as $comment)
                    <tr class="my-5">
                        <th scope="row">{{ $comment->id }}</th>
                        <td>{{ $comment->author }}</td>
                        <td>{{ Str::limit($comment->text, 13, $end='...') }}</td>
                        <td>{{ $comment->post()->title }}</td>
                        <td>{{ $comment->likes()->count() }}</td>
                        <td>{{ formatShortDate($comment->created_at) }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
