<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

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
                background-image: url('{{ env('IMAGE_CDN_URL') . 'DSC_2330.JPG' }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: 50%;
            }
        </style>
    @endif
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Nikolai Patrick</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('root') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery.index') }}">Gallery</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sites</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn @if(Route::currentRouteName() == 'root') btn-outline-light @else btn-outline-dark @endif" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="p-2">
            @yield('content')
        </main>

        <footer class="mt-2 mb-0">
            <hr class="mx-5">
            <div class="text-muted text-sm-center "><a class="text-muted" href="https://github.com/Smartich0ke/FerriteCMS">Ferrite</a> Content Management System v1.0.0 by Nikolai Patrick. <a class="text-muted me-auto" href="{{ route('login') }}">Admin login</a></div>
        </footer>
    </div>
@yield('post-app')
</body>

</html>
