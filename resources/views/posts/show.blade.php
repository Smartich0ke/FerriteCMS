@extends('layouts.app')
@section('content')

    <article class="contentContainer p-0">
        <header class="d-flex flex-row justify-content-center align-items-center article-banner">
            <div class="article-banner-image" style="background-image: url('{{ Storage::url($post->image) }}')"></div>
            <h1 class="text-center article-banner-text" style="color: {{ $post->banner_colour }};">{{ $post->title }}</h1>
        </header>

        <div class="p-5">
            <div class="text-muted">Last updated: {{ formatPostDateAndTime($post->updated_at) }}</div>
            <milkdown-renderer-wrapper :postbody='{{ json_encode($post->body) }}' ></milkdown-renderer-wrapper>
        </div>

    </article>
@endsection
