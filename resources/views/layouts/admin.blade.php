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
    <div class="d-flex flex-row justify-content-start admin-panel">

        <nav class="d-flex flex-column flex-shrink-0 text-white bg-dark sideBar admin-nav">
            <a aria-label="homepage" href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none d-flex align-items-center gap-2">
                <iconify-icon icon="mdi:cog-box" width="32" height="32"></iconify-icon>
                <span class="fs-4">Admin Panel</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="">
                    <a href="{{ route('root') }}" class="nav-link text-white d-flex flex-row align-items-center gap-2
                    @if(isActiveRoute('root')) active @endif " @if(isActiveRoute('root')) aria-current="page" @endif  >
                        <iconify-icon icon="material-symbols:home" width="16" height="16"></iconify-icon>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white d-flex flex-row align-items-center gap-2
                    @if(isActiveRoute('admin.dashboard')) active @endif " @if(isActiveRoute('admin.dashboard')) aria-current="page" @endif >
                        <iconify-icon icon="mdi:view-dashboard" width="16" height="16"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.index') }}" class="nav-link text-white d-flex flex-row align-items-center gap-2
                    @if (isActiveRoute('admin.posts.*')) active @endif " @if(isActiveRoute('admin.posts.*')) aria-current="page" @endif >
                        <iconify-icon icon="mdi:note-text" width="16" height="16"></iconify-icon>
                        Posts
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link text-white d-flex flex-row align-items-center gap-2
                    @if (isActiveRoute('admin.categories.*')) active @endif " @if(isActiveRoute('admin.categories.*')) aria-current="page" @endif >
                        <iconify-icon icon="mdi:shape" width="16" height="16"></iconify-icon>
                        Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.comments.index') }}" class="nav-link text-white d-flex flex-row align-items-center gap-2
                       @if (isActiveRoute('admin.comments.*')) active @endif " @if(isActiveRoute('admin.comments.*')) aria-current="page" @endif >
                        <iconify-icon icon="mdi:comment-text-multiple" width="16" height="16"></iconify-icon>
                        Comments
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.images.index') }}" class="nav-link text-white d-flex flex-row align-items-center gap-2
                    @if (isActiveRoute('admin.images.*')) active @endif " @if(isActiveRoute('admin.images.*')) aria-current="page" @endif >
                        <iconify-icon icon="mdi:image-multiple" width="16" height="16"></iconify-icon>
                        Images
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.files.index') }}" class="nav-link text-white d-flex flex-row align-items-center gap-2
                    @if (isActiveRoute('admin.files.*')) active @endif " @if(isActiveRoute('admin.files.*')) aria-current="page" @endif >
                        <iconify-icon icon="mdi:file-multiple" width="16" height="16"></iconify-icon>
                        File Storage
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rubbish-bin.index') }}" class="nav-link text-white d-flex flex-row align-items-center gap-2
                    @if (isActiveRoute('admin.rubbish-bin.index')) active @endif " @if(isActiveRoute('admin.rubbish-bin.index')) aria-current="page" @endif >
                        <iconify-icon icon="mdi:trash" width="16" height="16"></iconify-icon>
                        Rubbish Bin
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ gravatarProfileImage(auth()->user()->email, '32') }}" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>{{ auth()->user()->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('admin.posts.create') }}">New Post...</a></li>
                    <li><a class="dropdown-item" href="{{ route('images.create') }}">New Gallery Image...</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </nav>

        <!-- Nav buffer -->
        <div class="nav-buffer"></div>

        <!-- Mini Nav -->
        <nav class="admin-nav-mini d-flex flex-column flex-shrink-0 bg-dark">
            <a href="/" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                <svg class="bi" width="40" height="32">
                    <use xlink:href="#bootstrap"/>
                </svg>
                <span class="visually-hidden">Icon-only</span>
            </a>
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                <li class="nav-item">
                    <a href="{{ route('root') }}" class="nav-link py-3
                    @if(isActiveRoute('root')) active @endif " @if(isActiveRoute('root')) aria-current="page" @endif title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                        <iconify-icon icon="material-symbols:home" width="24" height="24"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-link py-3 @if(isActiveRoute('admin.dashboard')) active @endif " @if(isActiveRoute('admin.dashboard')) aria-current="page" @endif title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                        <iconify-icon icon="mdi:view-dashboard" width="24" height="24"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.index') }}" class="nav-link py-3
                     @if (isActiveRoute('admin.posts.*')) active @endif " @if(isActiveRoute('admin.posts.*')) aria-current="page" @endif title="Posts" data-bs-toggle="tooltip" data-bs-placement="right">
                        <iconify-icon icon="mdi:note-text" width="24" height="24"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link py-3
                     @if (isActiveRoute('admin.categories.*')) active @endif " @if(isActiveRoute('admin.categories.*')) aria-current="page" @endif title="Categories" data-bs-toggle="tooltip" data-bs-placement="right">
                        <iconify-icon icon="mdi:shape" width="24" height="24"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.comments.index') }}" class="nav-link py-3
                    @if (isActiveRoute('admin.comments.*')) active @endif " @if(isActiveRoute('admin.comments.*')) aria-current="page" @endif title="comments" data-bs-toggle="tooltip" data-bs-placement="right">
                        <iconify-icon icon="mdi:comment-text-multiple" width="24" height="24"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.images.index') }}" class="nav-link py-3
                     @if (isActiveRoute('admin.images.*')) active @endif " @if(isActiveRoute('admin.images.*')) aria-current="page" @endif title="Images" data-bs-toggle="tooltip" data-bs-placement="right">
                        <iconify-icon icon="mdi:image-multiple" width="24" height="24"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.files.index') }}" class="nav-link py-3
                     @if (isActiveRoute('admin.files.*')) active @endif " @if(isActiveRoute('admin.files.*')) aria-current="page" @endif title="Files" data-bs-toggle="tooltip" data-bs-placement="right">
                        <iconify-icon icon="mdi:file-multiple" width="24" height="24"></iconify-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3
                     @if (isActiveRoute('')) active @endif " @if(isActiveRoute('')) aria-current="page" @endif title="Rubbish Bin" data-bs-toggle="tooltip" data-bs-placement="right">
                        <iconify-icon icon="mdi:trash" width="24" height="24"></iconify-icon>
                    </a>
                </li>
            </ul>
            <div class="dropdown border-top">
                <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ gravatarProfileImage(auth()->user()->email, '32') }}" alt="mdo" width="24" height="24" class="rounded-circle">
                </a>
                <ul class="dropdown-menu-dark dropdown-menu text-small shadow bg-dark " aria-labelledby="dropdownUser3">
                    <li><a class="dropdown-item " href="{{ route('admin.posts.create') }}">New post...</a></li>
                    <li><a class="dropdown-item " href="{{ route('images.create') }}">New Gallery Image...</a></li>
                    <li><a class="dropdown-item " href="{{ route('profile') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider ">
                    </li>
                    <li><a class="dropdown-item " href="#">Sign out</a></li>
                </ul>
            </div>
        </nav>
        <main class="p-0 admin-content">
            @yield('content')
        </main>
    </div>
</div>
@yield('post-app')
</body>
</html>
