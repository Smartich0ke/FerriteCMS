<div class="comment">

    <div class="pt-3">
        <div class="d-flex flex-row gap-3">
            <img src="@if($comment->user_id) {{ gravatarProfileImage($comment->user()->get()->first()->email, 64) }} @else {{ gravatarProfileImage($comment->email, 64) }} @endif" height="64" width="64" alt="" class="rounded-2 border">
            <div class="d-flex flex-column justify-content-start align-items-start w-100">
                <div class="d-flex flex-row align-items-center gap-2">
                    <strong class="">@if($comment->user_id) {{ $comment->user()->get()->first()->name }} @else {{ $comment->author }} @endif</strong>
                    @if($comment->user_id == $post->user_id)
                        <span class="badge bg-primary d-flex flex-row align-items-center"><iconify-icon class="me-1" icon="mdi:wrench"></iconify-icon>author</span>
                    @endif
                    <div style="font-size: 0.85rem" class="text-muted">{{ formatShortDate($comment->created_at) }}</div>
                </div>
                <div>
                    {{ $comment->text }}
                </div>
                <post-reply :initial-like-status='@if($comment->hasBeenLikedByClient() ) true @else false @endif ' :initial-likes-count='{{ $comment->likes()->count() }}' commentid="{{ $comment->id }}" postid="{{ $post->id }}" parentid="{{ $comment->id }}" csrf="{{ csrf_token() }}"></post-reply>
                @if($comment->replies->count() > 0)
                    <view-replies>
                        @foreach($comment->replies as $reply)
                            @include('comments.comments', ['comment' => $reply])
                        @endforeach
                    </view-replies>
                @endif
            </div>
        </div>
    </div>

</div>
