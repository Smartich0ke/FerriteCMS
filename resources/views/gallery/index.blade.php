@extends('layouts.app')
@section('content')

    <article class="contentContainer">
        <h1 class="text-center mb-3">Gallery</h1>
        <div class="responsiveGrid">
{{--            @foreach($images as $image)--}}
{{--                <div class="gridItem--}}
{{--                    @if($image->image_orientation == 'landscape')--}}
{{--                        gridItem-wide--}}
{{--                    @elseif($image->image_orientation == 'portrait')--}}
{{--                        gridItem-tall--}}
{{--                    @else--}}
{{--                    @endif--}}
{{--                    "--}}
{{--                     style="background-image: url({{ Storage::url($image->image)}});" title="{{ $image->alt_text }}"></div>--}}
{{--            @endforeach--}}

            @foreach($images as $image)
                <image-modal image="{{ Storage::url($image->image)}}" alttext="{{ $image->alt_text }}" orientation="{{ $image->image_orientation }}"></image-modal>
            @endforeach

            <!-- if there isnt images -->
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
