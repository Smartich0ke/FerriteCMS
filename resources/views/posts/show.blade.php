@extends('layouts.app')
@section('content')

    <article class="contentContainer p-0">
        <header class="d-flex flex-row justify-content-center align-items-center article-banner">
            <div class="article-banner-image" style="background-image: url('{{ Storage::url($post->image) }}')"></div>
            <h1 class="text-center article-banner-text" style="color: {{ $post->banner_colour }};">{{ $post->title }}</h1>
        </header>

        <div class="px-2 px-sm-5 py-5">
            <div class="pb-3">
                <div class="text-muted d-inline">Last updated:
                    <browser-time-stamp utc-time="{{ $post->updated_at }}"></browser-time-stamp>
                </div>

                <div class="d-flex flex-row gap-2">
                    <div class="text-sm text-muted">In:
                        <a class="link lightLink" href="{{ route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a>
                    </div>
                    <div class="text-sm text-muted">Tags:
                        @foreach($post->tags as $tag)
                            <a class="link lightLink" href="{{ route('tags.show', $tag->name) }}">{{ $tag->name }}</a> @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
                <milkdown-renderer-wrapper :postbody='{{ json_encode($post->body) }}'></milkdown-renderer-wrapper>
            </div>

            <div class="">
                <h3>Comments</h3>

                <div class="">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        @if(!auth()->user())
                            <div class="text-muted">No sign-up required - no junk email</div>
                            <div class="d-flex flex-row gap-2">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control" name="email" placeholder="Email (not shown publicly)">
                                </div>
                            </div>
                        @endif
                        <div class="mt-2">
                            <textarea class="form-control @error('text') is-invalid @enderror" name="text" placeholder="Comment" rows="3"></textarea>
                            @error('text')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @error('post_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @error('parent_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>
                @foreach($post->comments as $comment)
                    @include('comments.comments', ['comments' => $comment])
                @endforeach
            </div>
        </div>

    </article>
@endsection
@section('meta-tags')
    <meta name="description" content="{{ $post->excerpt }}">
    <meta property="og:description" content="{{ $post->excerpt }}">
    <meta name="keywords" content="@foreach($post->tags as $tag){{ $tag->name }}@if(!$loop->last), @endif
@endforeach">
@endsection
@section('page-title')
{{ $post->title }}
@endsection
