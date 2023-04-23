@extends('layouts.app')
@section('content')
    <header class="d-flex justify-content-center align-items-center " id="heroTitle">
        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
            <h1 class="display-4 text-dark text-center">Nikolai Patrick</h1>
            <h2 class="text-center">Software development, engineering, photography</h2>
            <div class="d-flex flex-row gap-2 justify-content-center align-items-center">
                <iconify-icon height="48" width="48" icon="mdi:instagram"></iconify-icon>
                <iconify-icon height="48" width="48" icon="mdi:github"></iconify-icon>
                <iconify-icon height="48" width="48" icon="mdi:youtube"></iconify-icon>
                <iconify-icon height="48" width="48" icon="mdi:discord"></iconify-icon>
            </div>
        </div>
    </header>
@endsection
