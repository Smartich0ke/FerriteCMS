@extends('layouts.app')
@section('content')

    <div class="contentContainer">
        <header class="d-flex flex-row justify-content-center">
            <h1 class="text-center">All Categories</h1>
        </header>
        @foreach($categories as $category)
            <div class="card p-3 my-3 cardLink" style="font-size: 1rem" onclick="window.location='{{ route('categories.show', $category->slug) }}';">
                <div class="d-flex flex-row justify-content-left">
                    <h2 class="">{{ $category->name }}</h2>
                </div>
                <hr class="mt-1 mb-3 ">
                <p class="d-inline-block">
                    {{ $category->description }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
