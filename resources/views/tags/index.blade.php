@extends('layouts.app')
@section('content')
    <div class="contentContainer">
        <header class="d-flex flex-row justify-content-center">
            <h1 class="text-center">All Tags</h1>
        </header>
        @foreach($tags as $tag)
            <div class="my-3" ><a href="{{ route('tags.show', $tag->name) }}" class="btn btn-outline-dark">{{ $tag->name }}</a></div>
        @endforeach
    </div>
@endsection
