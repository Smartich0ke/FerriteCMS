@if(Route::currentRouteName() != 'root')
    <div class="mt-2 mb-2">
        <hr class="mx-5">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex flex-row justify-content-center gap-2 mb-0">
                <a class="text-decoration-none text-dark" href="{{ url('/feed') }}"><iconify-icon icon="mdi:rss-box" width="2em" height="2em"></iconify-icon></a>
            </div>

            <div class="text-muted text-center ">
                <a class="text-muted" href="https://github.com/Smartich0ke/FerriteCMS">Ferrite</a> Content
                Management System v1.4.1 by Nikolai Patrick.
                <a class="text-muted me-auto" href="{{ route('login') }}">login</a></div>
        </div>

    </div>
@endif
