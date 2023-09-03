@extends('layouts.app')
@section('content')
    <div class="contentContainer">
        <header class="d-flex flex-row justify-content-center">
            <h1 class="text-center">Search results for "{{ $search }}"</h1>
        </header>

        @foreach($posts as $post)
            <article class="card p-4 cardLink my-3" onclick="window.location='{{ postURL($post) }}';">
                <div class="d-flex flex-row justify-content-between">
                    <h2 class="">{{ $post->title }}</h2>
                    <div>{{ formatShortDate($post->updated_at) }}</div>
                </div>
                <div class="d-flex flex-row justify-content-start gap-2 flex-wrap">
                    <div class="text-sm text-muted">In: <a class="link lightLink" href="">{{ $post->category->name }}</a></div>
                    <div class="text-sm text-muted">Tags:
                        @foreach($post->tags as $tag)
                            <a class="link lightLink" href="{{ route('tags.show', $tag->name) }}">{{ $tag->name }}</a> @if(!$loop->last),@endif
                        @endforeach
                    </div>
                </div>
                <hr class="mt-1 mb-3">
                <p>
                    {{ $post->excerpt }}
                </p>
            </article>
        @endforeach
        @if($posts->count() == 0)
            <div class="d-flex flex-row justify-content-center">
                <div class="text-muted mt-5 text-center">
                    Hmmm... No results found for "{{ $search }}". Try searching for something else.
                </div>
            </div>
        @endif

{{--        @if($posts->count() > 0)--}}
{{--            <div class="d-flex flex-row justify-content-center">--}}
{{--                {{ $posts->links() }}--}}
{{--            </div>--}}
{{--        @endif--}}

    </div>
@endsection
@section('post-app')
    <script>window.addEventListener("DOMContentLoaded", (event) => {
            document.getElementById("filterSelect").addEventListener("change", ({target}) => target.form.submit());
        });</script>
@endsection
