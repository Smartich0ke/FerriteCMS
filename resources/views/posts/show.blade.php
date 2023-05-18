@extends('layouts.app')
@section('content')

    <article class="contentContainer p-0">
        <header class="d-flex flex-row justify-content-center align-items-center article-banner">
            <div class="article-banner-image" style="background-image: url('{{ Storage::url($post->image) }}')"></div>
            <h1 class="text-center article-banner-text" style="color: {{ $post->banner_colour }};">{{ $post->title }}</h1>
        </header>

        <div class="p-5">
            <div class="text-muted">Last updated: {{ formatPostDateAndTime($post->updated_at) }}</div>
            <div class="d-flex flex-row gap-2">
                <div class="text-sm text-muted">In: <a class="link lightLink" href="">{{ $post->category->name }}</a>
                </div>
                <div class="text-sm text-muted">Tags:
                    @foreach($post->tags as $tag)
                        <a class="link lightLink" href="{{ route('tags.show', $tag->name) }}">{{ $tag->name }}</a> @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </div>
            </div>
            <milkdown-renderer-wrapper :postbody='{{ json_encode($post->body) }}'></milkdown-renderer-wrapper>
        </div>

        <div class="px-5 pb-5">
            <h3>Comments</h3>
            <div class="">
                <form action="{{ route('comments.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="d-flex flex-row gap-2">
                        <div class="flex-grow-1">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="flex-grow-1">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="mt-2">
                        <textarea class="form-control" name="text" placeholder="Comment" rows="4"></textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>
            <div class="pt-3">
                <div class="d-flex flex-row gap-1">
                    <img src="https://via.placeholder.com/64" height="64" width="64" alt="" class="rounded-2">
                    <div class="d-flex flex-column justify-content-start align-items-start">
                        <div class="d-flex flex-row align-items-center gap-2">
                            <strong class="">Some User</strong>
                            <div style="font-size: 0.85rem" class="text-muted">13/02/2008</div>
                            <iconify-icon icon="mdi:cards-heart-outline" height="20" width="20" style="color: #6c757d;"></iconify-icon>
                        </div>
                        <div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque aut consequatur
                            eaque eveniet fugit itaque modi mollitia, pariatur quaerat quis repellendus tenetur totam!
                            Amet commodi cum eveniet fugit quidem.
                        </div>
                        <div>
                            <post-reply></post-reply>
                            <view-replies></view-replies>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </article>
@endsection
