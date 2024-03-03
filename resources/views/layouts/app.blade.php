<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('ANALYTICS_MEASUREMENT_ID') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ env('ANALYTICS_MEASUREMENT_ID') }}');
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') | {{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite('resources/js/app.js')

    <!-- Styles -->
    @vite('resources/sass/app.scss')
    <!-- If its the homepage fill body with background image -->
    @if (Route::currentRouteName() == 'root')
        <style>
            body {
                background-image: url(/static/img/root_background.webp);
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: 50%;
            }
        </style>
    @endif

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nikolai Patrick">

    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:title" content="@yield('page-title')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    @yield('meta-tags')


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Nikolai Patrick</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'root') active @endif" aria-current="page" href="{{ route('root') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'about') active @endif" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'gallery.index') active @endif" href="{{ route('gallery.index') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'pc-repair') active @endif" href="{{ route('pc-repair') }}">PC Repair</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Articles
                            </a>
                            <ul class="dropdown-menu nav-drop"  aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('posts.index') }}">All Articles</a></li>
                                <li><a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a></li>
                                <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a></li>
                            </ul>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Sites</a>--}}
{{--                        </li>--}}
                    </ul>
                    <form class="d-flex" method="get" action="{{ route('posts.search.index') }}">
                        <input class="form-control me-2" name="query" type="search" placeholder="Search articles" aria-label="Search">
                        <button class="btn @if(Route::currentRouteName() == 'root') btn-outline-light @else btn-outline-dark @endif" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="p-3">
            @yield('content')
        </main>

        @if(Route::currentRouteName() != 'root')
            <footer class="mt-2 mb-0">
                <hr class="mx-5">
                <div class="text-muted text-center "><a class="text-muted" href="https://github.com/Smartich0ke/FerriteCMS">Ferrite</a> Content Management System v1.1.1 by Nikolai Patrick. <a class="text-muted me-auto" href="{{ route('login') }}">Admin login</a></div>
            </footer>
        @endif
    </div>
@yield('post-app')
</body>

</html>
