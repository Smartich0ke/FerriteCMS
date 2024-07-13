@extends('layouts.app')
@section('content')
    <header class="d-flex justify-content-center align-items-center " id="heroTitle">
        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
            <h1 class="display-4 text-dark text-center">Nikolai Patrick</h1>
            <h2 class="text-center">Software development, engineering, photography</h2>
            <div class="d-flex flex-row gap-3 justify-content-center align-items-center">
                @foreach($socialLinks as $socialLink)
                    <a href="{{ $socialLink->url }}" class="text-dark" ><iconify-icon height="24" width="24" icon="{{ $socialLink->icon }}" title="{{ $socialLink->platform }}"></iconify-icon></a>
                @endforeach
            </div>
        </div>
    </header>
@endsection

@section('meta-tags')
    <meta name="description" content="Nikolai Patrick's personal website. Software development, engineering, photography.">
    <meta property="og:description" content="Nikolai Patrick's personal website. Software development, engineering, photography.">
    <meta name="keywords" content="Nikolai Patrick, software, engineering, photography, personal website, blog, australia, sa">
@endsection
@section('page-title')
Home
@endsection
