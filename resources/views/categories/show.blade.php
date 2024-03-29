@extends('layouts.app')
@section('content')
    <div class="contentContainer">
        <header class="d-flex flex-row justify-content-center">
            <h1 class="text-center">Articles in category "{{ $category->name }}"</h1>
        </header>


        <section>
            <!-- Sort-by dropdown -->
            <div class="dropdown d-flex flex-row gap-2">
                <form action="{{ route('categories.show', $category->slug ) }}" method="GET">
                    <input type="hidden" name="page" value="{{ $request->page }}" >
                    <select name="filter" id="filterSelect" class="form-select d-inline-block" style="width: fit-content;">
                        <option value="newest" @if($filter == 'newest') selected @endif>Newest</option>
                        <option value="oldest" @if($filter == 'oldest') selected @endif>Oldest</option>
                        <option value="alphabetical" @if($filter == 'alphabetical') selected @endif>A-Z</option>
                        <option value="reverse-alphabetical" @if($filter == 'reverse-alphabetical') selected @endif>Z-A</option>
                    </select>
                </form>
            </div>

        </section>
        @foreach($posts as $post)
            <article class="card p-4 cardLink my-3" onclick="window.location='{{ postURL($post) }}';">
                <div class="d-flex flex-row justify-content-between">
                    <h2 class="">{{ $post->title }}</h2>
                    <div>{{ formatShortDate($post->updated_at) }}</div>
                </div>
                <div class="d-flex flex-row justify-content-start gap-2 flex-wrap">
                    <div class="text-sm text-muted">In: <a class="link lightLink" href="">{{ $post->category->name }}</a></div>
                    <div class="text-sm text-muted">Tags: <a class="link lightLink" href="">tag</a>,
                        <a class="link lightLink" href="http://">another-tag</a>,
                        <a class="link lightLink" href="http://">other-tag</a>,
                    </div>
                </div>
                <hr class="mt-1 mb-3">
                <p>
                    {{ $post->excerpt }}
                </p>
            </article>
        @endforeach

        <div class="d-flex flex-row justify-content-center">
            {{ $posts->links() }}
        </div>

    </div>
@endsection
@section('post-app')
    <script>window.addEventListener("DOMContentLoaded", (event) => {
            document.getElementById("filterSelect").addEventListener("change", ({target}) => target.form.submit());
        });</script>
@endsection
@section('meta-tags')
    <meta name="description" content="{{ $category->description }}">
    <meta property="og:description" content="{{ $category->description }}">
    <meta name="keywords" content="Nikolai Patrick, software, engineering, photography, personal website, blog, australia, sa, {{ $category->name }}">
@endsection
@section('page-title')
{{ $category->name }}
@endsection
