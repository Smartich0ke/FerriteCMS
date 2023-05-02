@extends('layouts.app')
@section('content')

    <article class="contentContainer">
        <header class="d-flex flex-row justify-content-center align-items-center article-banner">
            <div class="article-banner-image" style="background-image: url('{{ Storage::url($post->image) }}')"></div>
            <h1 class="text-center article-banner-text" style="color: #dee2e6;">{{ $post->title }}</h1>
        </header>
        <div class="text-muted">{{ $post->updated_at }}</div>
        <div class="p-4">
            <milkdown-renderer-wrapper :postbody='{{ json_encode($post->body) }}' ></milkdown-renderer-wrapper>
        </div>

    </article>
@endsection
