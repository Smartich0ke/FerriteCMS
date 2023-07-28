@extends('layouts.app')
@section('content')

    <article class="contentContainer">
        <h1 class="text-center mb-3">Gallery</h1>
        <div class="responsiveGrid">
            @foreach($images as $image)
                <div class="gridItem
                    @if($image->image_orientation == 'landscape')
                        gridItem-wide
                    @elseif($image->image_orientation == 'portrait')
                        gridItem-tall
                    @else
                    @endif
                    "
                     style="background-image: url({{ Storage::url($image->image)}});"></div>
            @endforeach
            @if($images->count() == 0)
                <div class="d-flex flex-row justify-content-center">
                    <div class="text-muted mt-5">Looks like there's not much here at the moment.</div>
                </div>
            @endif
        </div>
        <div class="text-sm text-muted text-center m-3">See more on my Instagram: <a href="#" class="link">@npatrick_photos</a></div>
    </article>
</div>
@endsection
