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
