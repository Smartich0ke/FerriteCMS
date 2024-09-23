<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') | {{ env('APP_NAME') }}</title>

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
            @include('layouts.nav')
        </nav>

        <main class="p-3">
            @yield('content')
        </main>

        <footer>
            @include('layouts.footer')
        </footer>

        <x-toast />

    </div>

    @yield('post-app')
</body>

</html>
