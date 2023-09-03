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
        @if($categories->count() == 0)
            <div class="d-flex flex-row justify-content-center">
                <div class="text-muted mt-5">Looks like there's not much here at the moment.</div>
            </div>
        @endif
    </div>
@endsection
@section('meta-tags')
    <meta name="description" content="All categories on Nikolai Patrick's personal website.">
    <meta property="og:description" content="">
    <meta name="keywords" content="Nikolai Patrick, software, engineering, photography, personal website, blog, australia, sa, categories">

@section('page-title')
All Categories
@endsection
