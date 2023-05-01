@extends('layouts.app')
@section('content')

    <article class="contentContainer">
        <header class="d-flex flex-row justify-content-center p-5 align-items-center article-banner" style="background-image: url('{{ Storage::url($post->image) }}')">
            <h1 class="text-center">{{ $post->title }}</h1>
        </header>
        <div class="text-muted">{{ $post->updated_at }}</div>
        <div class="p-4">
            <milkdown-renderer-wrapper :postbody='{{ json_encode($post->body) }}' ></milkdown-renderer-wrapper>
        </div>

    </article>
@endsection
