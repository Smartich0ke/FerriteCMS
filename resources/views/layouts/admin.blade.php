<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ferrite | Dashboard</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite('resources/js/app.js')

    <!-- Styles -->
    @vite('resources/sass/app.scss')
</head>
<body>
<div id="app">
    <div class="d-flex flex-row justify-content-start" style="height: 100vh; width: 100vw;">
        <nav style="width: 20%">

            <div class="d-flex flex-column flex-shrink-0 text-white bg-dark sideBar" >
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:cog-box" width="32" height="32"></iconify-icon>
                    <span class="fs-4">Admin Panel</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="">
                        <a href="#" class="nav-link text-white d-flex flex-row align-items-center gap-2" aria-current="page">
                            <iconify-icon icon="material-symbols:home" width="16" height="16"></iconify-icon>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white d-flex flex-row align-items-center gap-2 active">
                            <iconify-icon icon="mdi:view-dashboard" width="16" height="16"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white d-flex flex-row align-items-center gap-2">
                            <iconify-icon icon="mdi:note-text" width="16" height="16"></iconify-icon>
                            Posts
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white d-flex flex-row align-items-center gap-2">
                            <iconify-icon icon="mdi:comment-text-multiple" width="16" height="16"></iconify-icon>
                            Comments
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white d-flex flex-row align-items-center gap-2">
                            <iconify-icon icon="mdi:image-multiple" width="16" height="16"></iconify-icon>
                            Images
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white d-flex flex-row align-items-center gap-2">
                            <iconify-icon icon="mdi:file-multiple" width="16" height="16"></iconify-icon>
                            File Storage
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/Smartich0ke.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>{{ auth()->user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New Post...</a></li>
                        <li><a class="dropdown-item" href="#">New Gallery Image...</a></li>
                        <li><a class="dropdown-item" href="#">Profile Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="p-0" style="width: 80%">
            @yield('content')
        </main>
    </div>
</div>
@yield('post-app')
</body>

</html>
