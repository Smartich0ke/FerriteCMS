@extends('layouts.app')
@section('content')
    <header class="d-flex justify-content-center align-items-center " id="heroTitle">
        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
            <h1 class="display-4 text-dark text-center">Nikolai Patrick</h1>
            <h2 class="text-center">Software development, engineering, photography</h2>
            <div class="d-flex flex-row gap-3 justify-content-center align-items-center">
                <a href="https://www.instagram.com/npatrick_photos/" class="text-dark" ><iconify-icon height="48" width="48" icon="simple-icons:instagram"></iconify-icon></a>
                <a href="https://github.com/Smartich0ke" class="text-dark" ><iconify-icon height="48" width="48" icon="simple-icons:github"></iconify-icon></a>
                <a href="https://mastodon.artichokenetwork.com/@artichoke" class="text-dark" ><iconify-icon height="48" width="48" icon="simple-icons:mastodon"></iconify-icon></a>
                <a href="https://matrix.to/#/@artichoke:artichokenetwork.com" class="text-dark" ><iconify-icon height="48" width="48" icon="simple-icons:element"></iconify-icon></a>
                <a href="" onclick="alert('Discord handle: artichoked_')" class="text-dark" ><iconify-icon height="48" width="48" icon="simple-icons:discord"></iconify-icon></a>
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
